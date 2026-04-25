<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Character extends Model
{
    public const UPDATED_AT = null;

    protected $table = 'characters';

    protected $fillable = [
        'user_id',
        'name',
        'class',
        'race',
        'realm',
        'mode',
        'level',
    ];

    protected function casts(): array
    {
        return [
            'created_at' => 'datetime',
            'level' => 'integer',
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
