<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Prospect extends Model
{
    protected $fillable = [
        'company',
        'contact_name',
        'title',
        'email',
        'niche',
        'template_id',
        'hook',
        'status',
        'follow_up_count',
        'last_contacted_at',
    ];

    protected $casts = [
        'last_contacted_at' => 'datetime',
    ];
}
