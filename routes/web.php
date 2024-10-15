<?php

use App\Http\Controllers\controllerteste;
use Illuminate\Support\Facades\Route;

Route::get('/top', function () {
    return view('welcome');
});

route::get('/', [controllerteste::class, 'visao'])->name('index.site');

route::get('/forum', [controllerteste::class, 'forum'])->name('index.forum');

route::post('/postados', [controllerteste::class, 'envios'])->name('index.postados');

route::get('/envios', [controllerteste::class, 'consulta'])->name('index.envios');

route::get('/edição/{id}', [controllerteste::class, 'editar'])->name('index.edit');

Route::put('/atualização/{id}', [Controllerteste::class, 'atualizar'])->name('index.atualizar');

route::delete('/delete/{id}', [controllerteste::class, 'deletar'])->name('index.delete');

