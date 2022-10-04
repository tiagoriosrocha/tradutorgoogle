<?php

Route::get('/', 'GoogleTradutorController@carregarFormulario');
Route::post('/traduzir','GoogleTradutorController@produzirTraducao');