<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ImagenesCoches extends Model
{
    protected $table = 'imagenes_coches';

    protected $fillable = [
        'anuncio_id',
        'ruta',
        'orden',
    ];

    public function anuncio()
    {
        return $this->belongsTo(Anuncio::class);
    }
}