<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelCanciones extends Model
{
    // php artisan make:model ModelCanciones
    use HasFactory;
    protected $table = 'tbl_canciones';
    protected $primaryKey = 'can_id';
    protected $fillable = [
        'can_nombre',
        'can_banda_cantante',
        'can_tonalidad',
        'can_letra',
        'can_cifrado',
        'can_id_video',
    ];

    // definición de la relación uno a muchos
    // Definir la relación con ModelListaCanciones
    public function listaCanciones()
    {
        return $this->hasMany(ModelListaCanciones::class, 'lc_can_id', 'can_id');
    }

}
