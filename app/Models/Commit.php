<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Commit extends Model
{
    use HasFactory;

    protected $fillable = ['hash', 'message', 'author', 'repository_id'];

    public function repository(): BelongsTo
    {
        return $this->belongsTo(Repository::class);
    }

    public function user(): User
    {
        return $this->repository()->user();
    }

    public function commitsByDate(array $commits)
    {
        return sort($commits);
    }
}
