<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactUs extends Model
{
    use HasFactory;

    protected $table = 'contact_us';

    // Allow mass assignment for these fields
    protected $fillable = [
        'name',
        'email',
        'mobile',
        'message',
        'budget'
    ];
}
