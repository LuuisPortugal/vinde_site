<?php

$rotasLivre = Cache::remember('rotasLivre', \Carbon\Carbon::now()->addMinutes(1), function () {
    return \App\Rotas::where('restrito', false)->get()->toArray();
});
foreach ($rotasLivre as $rota) {
    Route::match([$rota['metodo']], $rota['url'], [
        'as' => $rota['nome'],
        'uses' => $rota['destino']
    ]);
}

Route::group(['middleware' => 'auth'], function () {

    $rotasRestritas = Cache::remember('rotasRestritas', \Carbon\Carbon::now()->addMinutes(1), function () {
        return \App\Rotas::where('restrito', true)->get()->toArray();
    });
    foreach ($rotasRestritas as $rota) {
        Route::match([$rota['metodo']], $rota['url'], [
            'as' => $rota['nome'],
            'uses' => $rota['destino']
        ]);
    }
});
