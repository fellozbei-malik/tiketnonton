<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PriceComponent extends Model
{
    public const TYPE_FIXED = 'fixed';
    public const TYPE_PERCENTAGE = 'percentage';

    protected $fillable = [
        'name',
        'type',
        'value',
        'is_active',
        'sort_order',
    ];

    protected function casts(): array
    {
        return [
            'value' => 'decimal:2',
            'is_active' => 'boolean',
        ];
    }

    /**
     * Hitung nilai komponen dari subtotal.
     */
    public function calculateAmount(float $subtotal): float
    {
        if ($this->type === self::TYPE_FIXED) {
            return (float) $this->value;
        }
        return round($subtotal * ((float) $this->value / 100), 0);
    }

    /**
     * Scope: hanya yang aktif, urut by sort_order.
     */
    public function scopeActiveOrdered($query)
    {
        return $query->where('is_active', true)->orderBy('sort_order');
    }
}
