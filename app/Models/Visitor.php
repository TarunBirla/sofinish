<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visitor extends Model
{
    use HasFactory;

    protected $fillable = [
        'ip_address',
        'country',
        'country_code',
        'city',
        'region',
        'browser',
        'browser_version',
        'operating_system',
        'device_type',
        'visit_count',
        'first_visit_at',
        'last_visit_at',
        'user_agent',
    ];

    protected $casts = [
        'first_visit_at' => 'datetime',
        'last_visit_at' => 'datetime',
        'visit_count' => 'integer',
    ];

    public function pageViews()
    {
        return $this->hasMany(PageView::class)->orderBy('created_at', 'desc');
    }
}
