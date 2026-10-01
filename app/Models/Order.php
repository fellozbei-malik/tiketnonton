<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'transaction_code',
        'user_id',
        'total_amount',
        'status',
        'payment_proof_path',
    ];

    public const STATUS_PENDING = 'pending';
    public const STATUS_PENDING_VERIFICATION = 'pending_verification';
    public const STATUS_PAID = 'paid';
    public const STATUS_REJECTED = 'rejected';

    protected function casts(): array
    {
        return [
            'total_amount' => 'decimal:2',
        ];
    }

    /**
     * Relasi: Sebuah Order dimiliki oleh satu User.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relasi: Sebuah Order memiliki banyak item tiket (OrderItem).
     */
    public function items(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }
}