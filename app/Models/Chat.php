<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Nette\Schema\Message;

class Chat extends Model
{
    protected $fillable = [
        'anuncio_id',
        'comprador_id',
        'vendedor_id',
    ];

    public function anuncio()
    {
        return $this->belongsTo(Anuncio::class);
    }

    public function comprador()
    {
        return $this->belongsTo(User::class, 'comprador_id');
    }

    public function vendedor()
    {
        return $this->belongsTo(User::class, 'vendedor_id');
    }

    public function messages()
    {
        return $this->hasMany(Message::class);
    }
}