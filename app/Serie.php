<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Serie extends Model
{
    public $timestamps = false;
    public $fillable = ['nome'];
    public $appends =['Links'];
    protected $perPage = 5;

    public function episodios()
    {
        return $this->hasMany(Episodios::class);
    }

    public function getLinksAttribute()
    {
        return [
            'Self' => '/api/series/' . $this->id,
            'episodios' => '/api/' . $this->id . '/episodios'
        ];
    }
}
