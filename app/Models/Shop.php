<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    use HasFactory;
    protected $casts = [
        'lat' => 'float',
        'lng' => 'float',
    ];

    protected $fillable = ['name', 'lat', 'lng'];

    public function barbers(){
        return $this->hasMany(Barber::class, 'shop_id', 'id');
    }
}
