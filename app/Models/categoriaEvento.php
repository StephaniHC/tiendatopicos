<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class categoriaEvento extends Model
{
    use HasFactory;
    protected $fillable = ['nombre','descripcion'];

    public function eventos(){
        return $this->hasMany(Evento::class, 'id');
    }
}
