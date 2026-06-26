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
    ];
}
