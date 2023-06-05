<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ciudad extends Model
{
    use HasFactory;
    protected $table = 'ciudades';
    protected $primaryKey = 'id_ciudad';
    protected $fillable = [
        'id_ciudad',
        'descripcion_ciudad',
        'id_provincia'
    ];
    protected $hidden = [
        'created_at', 'updated_at',
    ];
}
