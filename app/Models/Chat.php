<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    protected $fillable = [
        'anuncio_id',
        'user1_id',
        'user2_id',
    ];

    public function user1()
    {
        return $this->belongsTo(User::class, 'user1_id');
    }

    public function user2()
    {
        return $this->belongsTo(User::class, 'user2_id');
    }

    public function mensajes()
    {
        return $this->hasMany(Mensaje::class)
            ->orderBy('created_at', 'asc');
    }

    public function anuncio()
    {
        return $this->belongsTo(Anuncio::class);
    }
}
