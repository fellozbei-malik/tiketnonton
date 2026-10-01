<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HelpCenterMessage extends Model
{
    protected $fillable = [
        'name',
        'email',
        'subject',
        'message',
        'status',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
}
