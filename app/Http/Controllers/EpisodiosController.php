<?php


namespace App\Http\Controllers;

use App\Episodios;

class EpisodiosController extends BaseController
{
    public function __construct()
    {
        $this->classe = Episodios::class;
    }

    public function buscarPorSerie($id)
    {
        $episodios = Episodios::query()->where('serie_id', $id)->get();
        return $episodios;
    }
}
