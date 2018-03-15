<?php

// Home


// Home
Breadcrumbs::register('home', function ($breadcrumbs) {
    $breadcrumbs->push('Home', route('home'));
});

// Home > About
Breadcrumbs::register('denuncia', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Denuncias', route('denuncias'));
});

// Home > Blog
Breadcrumbs::register('chat', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Chat', route('chat'));
});

// Home > Blog > [Category]
Breadcrumbs::register('crear', function ($breadcrumbs) {
    $breadcrumbs->parent('denuncia');
    $breadcrumbs->push('Crear Denuncias', route('crear'));
});

Breadcrumbs::register('crear1', function ($breadcrumbs) {
    $breadcrumbs->parent('noticia');
    $breadcrumbs->push('Crear Noticia', route('crear1'));
});


Breadcrumbs::register('noticia', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Noticias', route('noticia'));
});

Breadcrumbs::register('ExamenM6', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('ExamenM6', route('ExamenM6'));
});



