<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OrderItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'event_id',
        'user_id',
        'ticket_id',
        'attendee_id',
        'ticket_code',
        'price',
        'is_scanned',
        'scanned_at',
        'scanned_by',
    ];

    protected function casts(): array
    {
        return [
            'price' => 'decimal:2',
            'is_scanned' => 'boolean',
            'scanned_at' => 'datetime',
        ];
    }

    /**
     * Relasi: Sebuah OrderItem dimiliki oleh satu Order.
     */
    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }

    /**
     * Relasi: Sebuah OrderItem merujuk ke satu Event.
     */
    public function event(): BelongsTo
    {
        return $this->belongsTo(Event::class);
    }

    /**
     * Relasi: Sebuah OrderItem merujuk ke satu jenis Tiket.
     */
    public function ticket(): BelongsTo
    {
        return $this->belongsTo(Ticket::class);
    }

        /**
     * Relasi: Sebuah OrderItem merujuk ke satu attendee.
     */
    public function attendee(): BelongsTo
    {
        return $this->belongsTo(Attendee::class);
    }

    /**
     * Nama attendee dari relasi (first_name + last_name).
     * Digunakan di admin dan tampilan yang membutuhkan label nama.
     */
    public function getAttendeeNameAttribute(): string
    {
        if (!$this->attendee) {
            return '-';
        }
        return trim($this->attendee->first_name . ' ' . $this->attendee->last_name);
    }

    /**
     * Relasi: Sebuah OrderItem dimiliki oleh satu User.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Admin yang melakukan scan (approve) tiket.
     */
    public function scannedByUser(): BelongsTo
    {
        return $this->belongsTo(User::class, 'scanned_by');
    }
}