<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'product';

    protected $fillable = ['name', 'description', 'price', 'provider_id'];

    public function provider() {

        return $this->belongsTo(Provider::class);
    }

    use HasFactory;
}
