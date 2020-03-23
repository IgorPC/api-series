<?php


namespace App;


use Illuminate\Database\Eloquent\Model;

class Episodios extends Model
{
    public $timestamps = false;
    public $fillable = ['temporada', 'numero', 'assistido', 'serie_id'];
    public $appends = ['Links'];

    public function serie()
    {
        $this->belongsTo(Serie::class);
    }

    public function getAssistidoAttribute($valor) :bool
    {
        return $valor;
    }

    public function getLinksAttribute()
    {
        return [
            'Self' => '/api/episodios/' . $this->id,
            'Serie' => '/api/series/' . $this->serie_id
        ];
    }
}
