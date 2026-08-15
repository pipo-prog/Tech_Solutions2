<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Usuario extends Authenticatable
{
    use Notifiable;

    protected $table = 'usuarios';

    protected $fillable = [
        'nombre',
        'correo',
        'clave',
    ];

    protected $hidden = [
        'clave',
        'remember_token',
    ];

    /**
     * Get the password for the user.
     * Overrides standard method to map to our custom 'clave' column.
     */
    public function getAuthPassword()
    {
        return $this->clave;
    }

    /**
     * Get the name of the unique identifier for the user.
     */
    public function getEmailForPasswordReset()
    {
        return $this->correo;
    }

    /**
     * Relationship: A user has many projects.
     */
    public function proyectos()
    {
        return $this->hasMany(Proyecto::class, 'created_by');
    }
}
