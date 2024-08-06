<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelListas extends Model
{
    use HasFactory;

    protected $table = 'tbl_listas';
    protected $primaryKey = 'lst_id';
    protected $fillable = ['lst_nombre'];

    // definición de la relación uno a muchos
    // Definir la relación con ModelListaCanciones
    public function listaCanciones()
    {
        return $this->hasMany(ModelListaCanciones::class, 'lc_lst_id', 'lst_id');
    }

}
