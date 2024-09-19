<?php

namespace App\Http\Controllers;

use App\Jobs\updateRepositories;
use App\Repositories\CommitRepository;
use App\Repositories\IssueRepository;
use App\Repositories\RepoRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function __construct(
        protected RepoRepository $repoRepository,
        protected IssueRepository $issueRepository,
        protected CommitRepository $commitRepository
    ) {
        $this->repoRepository = $repoRepository;
        $this->issueRepository = $issueRepository;
        $this->commitRepository = $commitRepository;
    }

    public function index(): View
    {
        $user = Auth::user();

        $repositories = $this->repoRepository->getRepositoriesByUserId($user);
        $issues = $this->issueRepository->getIssuesByRepositoryId($repositories);
        $commits = $this->commitRepository->getCommitsByRepositoryId($repositories);

        return view('dashboard', [
            'repositories' => $repositories,
            'issues' => $issues,
            'commits' => $commits,
        ]);
    }

    public function getRepositories(): JsonResponse
    {
        $user = Auth::user();

        updateRepositories::dispatch($user->username, $user->id);

        return response()->json(['message' => 'Data is being fetched...']);
    }
}
