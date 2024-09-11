<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Repository extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'url',
        'owner',
        'default_branch',
        'visibility',
        'archived',
        'user_id',
        'first_created',
        'last_updated_at',
    ];

     public function issues(): HasMany
    {
        return $this->hasMany(Issue::class);
    }

    public function commits(): HasMany
    {
        return $this->hasMany(Commit::class);
    }

    public function pullRequests(): HasMany
    {
        return $this->hasMany(PullRequest::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function lastUpdatedAtFormatted(): string
    {
        return Carbon::parse($this->last_updated_at)->format('d-m-Y H:i');
    }

    public function readMe(): string
    {
        return $this->name . " (README)";
    }
}
