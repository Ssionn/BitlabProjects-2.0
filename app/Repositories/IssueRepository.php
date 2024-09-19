<?php

namespace App\Repositories;

use App\Models\Issue;
use Illuminate\Database\Eloquent\Collection;

class IssueRepository
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function getIssuesByRepositoryId($repositories): Collection
    {
        return Issue::whereIn('repository_id', $repositories->pluck('id'))->get();
    }
}
