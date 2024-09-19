<?php

namespace App\Repositories;

use App\Models\Repository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class RepoRepository
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function RepoitoriesPaginated($user): LengthAwarePaginator
    {
        return Repository::where('user_id', $user->id)
            ->paginate(8);
    }

    public function getRepositoriesByUserId($user): Collection
    {
        return Repository::where('user_id', $user->id)->get();
    }

    public function getRepositoryById($id): Repository
    {
        return Repository::findOrFail($id);
    }
}
