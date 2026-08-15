<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Proyecto extends Model
{
    protected $fillable = [
        'nombre',
        'fecha_inicio',
        'estado',
        'responsable',
        'monto',
        'created_by',
    ];

    /**
     * Relationship: A project belongs to a user (creator).
     */
    public function creador()
    {
        return $this->belongsTo(Usuario::class, 'created_by');
    }
}
