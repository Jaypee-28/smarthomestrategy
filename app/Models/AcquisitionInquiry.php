<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AcquisitionInquiry extends Model
{
    use HasFactory;

    protected $fillable = [
        'full_name',
        'email',
        'organization',
        'job_title',
        'country',
        'website',
        'budget_range',
        'message',
        'ip_address',
        'user_agent',
    ];
}
