<?php

namespace App\Jobs;

use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Ssionn\GithubForgeLaravel\Facades\GithubForge;

class updateUserProfile implements ShouldQueue
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
        $githubUser = GithubForge::getUser($this->username);

        $user = User::find($this->userId);

        if (! $user) {
            return;
        }

        $user->update([
            'avatar_url' => $githubUser['avatar_url'],
            'github_url' => $githubUser['html_url'],
        ]);
    }
}
