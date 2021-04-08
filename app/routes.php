<?php
    $router->get("", 'PagesController@index');
    $router->get('about', 'PagesController@about');
    $router->get('asociados', 'AsociadoController@index');
    $router->post('asociado/nuevo', 'AsociadoController@save');
    $router->get('blog', 'PagesController@blog');
    $router->get('contact', 'MensajeController@index');
    $router->post('contact/nuevo', 'MensajeController@save');
    $router->get('imagenes-galeria', 'ImagenGaleriaController@index');
    $router->post('imagenes-galeria/nueva', 'ImagenGaleriaController@save');
    $router->get('post', 'PagesController@post');



