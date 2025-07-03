<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RecuringTransaction extends Model
{
    /** @use HasFactory<\Database\Factories\RecuringTransactionFactory> */
    use HasFactory;

    protected $fillable = [
        'reason',
        'frequency',
        'amount',
        'user_id',
        'start_date',
        'end_date',
    ];

    protected function casts(): array
    {
        return [
            'reason' => 'string',
            'frequency' => 'integer',
            'amount' => 'integer',
            'user_id' => 'integer',
            'start_date' => 'datetime',
            'end_date' => 'datetime',
        ];
    }

    public function recipient(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
