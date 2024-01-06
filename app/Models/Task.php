<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Task extends Model
{
    use HasFactory;


    /**
     * Get the admin created the task.
    */
    public function admin(): BelongsTo
    {
        return $this->belongsTo(Admin::class);
    }

    /**
     * Get the assigne for the task.
    */
    public function assigne(): BelongsTo
    {
        return $this->belongsTo(Assigne::class);
    }
}
