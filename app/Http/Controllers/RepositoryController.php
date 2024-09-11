<?php

namespace App\Http\Controllers;

use App\Models\Repository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class RepositoryController extends Controller
{
    public function index(): View
    {
        $user = Auth::user();

        $repositories = Repository::where('user_id', $user->id)
            ->paginate(8);

        return view('repository', [
            'repositories' => $repositories
        ]);
    }
}
