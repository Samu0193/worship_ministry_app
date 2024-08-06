<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB; // PARA EL INNER

class ModelListaCanciones extends Model
{
    use HasFactory;

    protected $table = 'tbl_lista_canciones';
    protected $primaryKey = 'lc_lst_id';
    protected $fillable = [
        'lc_lst_id',
        'lc_can_posicion',
        'lc_can_id',
        'lc_can_tono_actual'
    ];

    // Definir la relación con ModelCanciones
    public function canciones()
    {
        return $this->belongsTo(ModelCanciones::class, 'lc_can_id', 'can_id');
    }

    // Definir la relación con ModelListas
    public function listas()
    {
        return $this->belongsTo(ModelListas::class, 'lc_lst_id', 'lst_id');
    }

    /**
     * Obtiene canciones por lista.
     *
     * @param int $listaId
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public static function obtenerCancionesPorLista($listaId)
    {
        return DB::table('tbl_canciones as c')
            ->join('tbl_lista_canciones as lc', 'c.can_id', '=', 'lc.lc_can_id')
            ->join('tbl_listas as l', 'lc.lc_lst_id', '=', 'l.lst_id')
            ->select(
                'c.can_id',
                'c.can_nombre',
                'c.can_banda_cantante',
                'c.can_cifrado',
                'c.can_letra',
                'c.can_tonalidad',
                'lc.lc_can_tono_actual',
                'lc.lc_can_posicion'
            )
            ->where('l.lst_id', $listaId)
            ->orderBy('lc.lc_can_posicion')
            ->get();
    }

}
