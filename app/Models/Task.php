<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Task extends Model
{
    use HasFactory;

    // public function tasks(): HasMany
    // {
    //     return $this->hasMany(task::class);
    // }
    protected $fillable = [
        'tasks',
        'status',
        'user_id',
    ];

    protected $attributes= [
        'status'=>"In progress"
    ];

      public function user(): BelongsTo
      {
          return $this->BelongsTo(user::class);
      }
}
