<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactInquiry extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'company',
        'service',
        'budget',
        'message',
        'ip_address',
        'status',
    ];

    protected $casts = [
        'created_at' => 'datetime',
    ];
}
