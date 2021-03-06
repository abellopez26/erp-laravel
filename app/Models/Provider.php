<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
    protected $table = 'provider';

    protected $fillable = ['name', 'lastname', 'email', 'company_name', 'address', 'phonenumber'];
    
    use HasFactory;
}
