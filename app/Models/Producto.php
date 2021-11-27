<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Venta;

class Producto extends Model
{
    use HasFactory;
    protected $fillable = ['nombre', 'descripcion', 'precio', 'stock', 'estado', 'foto'];

    public function venta() {
        return $this->belongsToMany(Venta::class);
    }
}
