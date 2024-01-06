<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Assigne extends Model
{
    use HasFactory;

    /**
     * Get the assigne tasks.
    */
    public function tasks(): HasMany
    {
        return $this->hasMany(Task::class);
    }
}
