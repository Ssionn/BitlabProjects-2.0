<?php

namespace App\Http\Controllers;

use App\Repositories\CommitRepository;
use App\Repositories\RepoRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class RepositoryController extends Controller
{
    public function __construct(
        protected RepoRepository $repoRepository,
        protected CommitRepository $commitRepository,
    ) {
        $this->repoRepository = $repoRepository;
        $this->commitRepository = $commitRepository;
    }

    public function index(): View
    {
        $user = Auth::user();

        $repositories = $this->repoRepository->RepoitoriesPaginated($user);

        return view('repository.index', [
            'repositories' => $repositories
        ]);
    }

    public function show($id): View
    {
        $repository = $this->repoRepository->getRepositoryById($id);

        return view('repository.show', [
            'repository' => $repository,
        ]);
    }
}
