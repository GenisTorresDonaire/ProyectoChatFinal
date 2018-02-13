<?php

// Home
Breadcrumbs::register('home', function ($breadcrumbs) {
    $breadcrumbs->push('Home', route('/home'));
});

// Home > About
Breadcrumbs::register('chat', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Chat', route('/chat'));
});

// Home > Blog
Breadcrumbs::register('denuncias', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Denuncias', route('/denuncias'));
});
