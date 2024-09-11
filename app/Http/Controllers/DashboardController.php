<?php

namespace App\Http\Controllers;

use App\Jobs\updateRepositories;
use App\Models\Commit;
use App\Models\Issue;
use App\Models\Repository;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        $this->getRepositories();

        $repositories = Repository::where('user_id', Auth::id())->get();

        $issues = Issue::whereIn('repository_id', $repositories->pluck('id'))->get();
        $commits = Commit::whereIn('repository_id', $repositories->pluck('id'))->get();

        $authUsername = Auth::user()->username;

        $commits->transform(function ($commit) use ($authUsername) {
            if ($commit->author === $authUsername) {
                $commit->author = $commit->author . " (You)";
            }

            return $commit;
        });

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

        return response()->json(['message' => 'Job dispatched successfully!']);
    }
}
