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


