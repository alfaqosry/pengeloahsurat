<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Allownotifikasi extends Model
{
    use HasFactory;

    protected $fillable = [
        'email_user',
        'wanotif',
        'emailnotif'
    ];
}
