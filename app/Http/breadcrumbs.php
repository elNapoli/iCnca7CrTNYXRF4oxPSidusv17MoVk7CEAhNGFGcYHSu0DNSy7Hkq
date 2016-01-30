<?php

// Home
Breadcrumbs::register('home', function($breadcrumbs)
{
    $breadcrumbs->push('Home', url('/'));
});

// Home > About
Breadcrumbs::register('paises', function($breadcrumbs)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('País', url('paises/'));
});

// Home > Blog
Breadcrumbs::register('paisesCrear', function($breadcrumbs)
{
    $breadcrumbs->parent('paises');
    $breadcrumbs->push('Crear', url('paises/create'));
});

// Home > Blog > [Category]
Breadcrumbs::register('paisesEditar', function($breadcrumbs, $pais)
{
    $breadcrumbs->parent('paises');
    $breadcrumbs->push($pais->nombre, url('paises/edit', $pais->id));
});



// Home > About
Breadcrumbs::register('ciudades', function($breadcrumbs)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Ciudad', url('ciudades/'));
});

// Home > Blog
Breadcrumbs::register('ciudadesCrear', function($breadcrumbs)
{
    $breadcrumbs->parent('ciudades');
    $breadcrumbs->push('Crear', url('ciudades/create'));
});

// Home > Blog > [Category]
Breadcrumbs::register('ciudadesEditar', function($breadcrumbs, $ciudad)
{
    $breadcrumbs->parent('paises');
    $breadcrumbs->push($ciudad->nombre, url('ciudades/edit', $ciudad->id));
});



// Home > About
Breadcrumbs::register('continentes', function($breadcrumbs)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Continentes', url('continentes/'));
});

// Home > Blog
Breadcrumbs::register('continentesCrear', function($breadcrumbs)
{
    $breadcrumbs->parent('continentes');
    $breadcrumbs->push('Crear', url('continentes/create'));
});

// Home > Blog > [Category]
Breadcrumbs::register('continenteEditar', function($breadcrumbs, $continente)
{
    $breadcrumbs->parent('continentes');
    $breadcrumbs->push($continente->nombre, url('continentes/edit', $continente->id));
});

Breadcrumbs::register('beneficios', function($breadcrumbs)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Beneficios', url('beneficios/'));
});

Breadcrumbs::register('beneficiosCrear', function($breadcrumbs)
{
    $breadcrumbs->parent('beneficios');
    $breadcrumbs->push('Crear', url('beneficios/create'));
});

Breadcrumbs::register('beneficioEditar', function($breadcrumbs, $beneficio)
{
    $breadcrumbs->parent('beneficios');
    $breadcrumbs->push($beneficio->nombre, url('beneficios/edit', $beneficio->id));
});

Breadcrumbs::register('asistentes', function($breadcrumbs)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Asistentes', url('asistentes/'));
});