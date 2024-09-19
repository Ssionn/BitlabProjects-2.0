<?php

namespace App\Repositories;

use App\Models\Commit;

class CommitRepository
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function getCommitsByRepositoryId($repositories)
    {
        return Commit::whereIn('repository_id', $repositories->pluck('id'))->get();
    }
}
