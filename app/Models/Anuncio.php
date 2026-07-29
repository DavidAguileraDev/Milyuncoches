<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Anuncio extends Model
{
    /**
     * Atributos asignables masivamente.
     */
    protected $fillable = [
        'user_id',

        // Información principal
        'marca',
        'modelo',
        'anio',

        // Características del vehículo
        'kilometros',
        'combustible',
        'transmision',
        'potencia',
        'cilindrada',
        'tipo_vehiculo',
        'color',
        'puertas',
        'plazas',

        // Información comercial
        'precio',
        'estado',

        // Localización
        'provincia',
        'ciudad',

        // Información adicional
        'descripcion',

        // Imagen principal
        'foto_principal',
    ];

    /**
     * Un anuncio pertenece a un usuario.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function imagenes()
    {
        return $this->hasMany(ImagenesCoches::class)
            ->orderBy('orden');
    }
}
