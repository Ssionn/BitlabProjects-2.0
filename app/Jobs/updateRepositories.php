<?php

namespace App\Jobs;

use App\Models\Issue;
use App\Models\Repository;
use Carbon\Carbon;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Ssionn\GithubForgeLaravel\Facades\GithubForge;

class updateRepositories implements ShouldQueue
{
    use Queueable;

    private $token;
    private $username;
    private $userId;

    /**
     * Create a new job instance.
     */
    public function __construct($username, $userId)
    {
        $this->token = config('github-forge.token');
        $this->username = $username;
        $this->userId = $userId;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $repos = GithubForge::getRepositories($this->username, 'all', 'full_name', 'asc', 50, 1);
        foreach ($repos as $repo) {
            $repository = Repository::updateOrCreate(
                ['name' => $repo['name'], 'user_id' => $this->userId],
                [
                    'url' => $repo['html_url'],
                    'owner' => $repo['owner']['login'],
                    'default_branch' => $repo['default_branch'],
                    'visibility' => $repo['visibility'],
                    'archived' => $repo['archived'],
                    'first_created' => Carbon::parse($repo['created_at']),
                    'last_updated_at' => Carbon::parse($repo['updated_at']),
                ]
            );

            $issues = GithubForge::getIssues($repo['owner']['login'], $repo['name']);
            foreach ($issues as $issueData) {
                $repository->issues()->updateOrCreate(
                    ['repository_id' => $repository->id],
                    [
                        'title' => $issueData['title'],
                        'description' => $issueData['body'] ?? 'Unknown',
                        'status' => $issueData['state'],
                    ]
                );
            }

            $commits = GithubForge::getCommitsFromRepository($repo['owner']['login'], $repo['name']);
            foreach ($commits as $commitData) {
                $repository->commits()->updateOrCreate(
                    [
                        'hash' => $commitData['sha'],
                        'repository_id' => $repository->id,
                    ],
                    [
                        'message' => $commitData['commit']['message'] ?? '',
                        'author' => $commitData['commit']['author']['name'],
                        'committed_at' => $commitData['commit']['author']['date'],
                    ]
                );
            }
        }
    }
}
