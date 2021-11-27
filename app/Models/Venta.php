<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Producto;
use App\Models\User;

class Venta extends Model
{
    use HasFactory;

    public function productos()
    {
        return $this->belongsToMany(Producto::class)->withPivot('cantidad', 'precio');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
