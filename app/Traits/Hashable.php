<?php

namespace App\Traits;

use Hashids\Hashids;

trait Hashable
{
    protected $hashids;

    public function __construct()
    {
        $this->hashids = new Hashids(config('hashids.salt'), config('hashids.min_length'));
    }

    public function getRouteKey()
    {
        return $this->hashids->encode($this->getKey());
    }

    public function resolveRouteBinding($value, $field = null)
    {
        $decoded = $this->hashids->decode($value);
        $id = $decoded ? $decoded[0] : null;

        return $this->where($field ?? $this->getRouteKeyName(), $id)->firstOrFail();
    }

    public function getHashidAttribute()
    {
        return $this->hashids->encode($this->getKey());
    }
}
