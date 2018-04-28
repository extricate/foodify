<?php

// Home
Breadcrumbs::register('home', function ($breadcrumbs) {
    $breadcrumbs->push('Dashboard', route('home'));
});

Breadcrumbs::register('page.show', function ($breadcrumbs, $page) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push($page->name, route('page.show', $page->slug));
});


Breadcrumbs::register('user.show', function ($breadcrumbs, $viewinguser) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push($viewinguser->name . '\'s plan for this week');
});

Breadcrumbs::register('recipes.index', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Recipes', route('recipes.index'));
});

Breadcrumbs::register('recipes.show', function ($breadcrumbs, $recipe) {
    $breadcrumbs->parent('recipes.index');
    $breadcrumbs->push($recipe->name, route('recipes.show', $recipe->slug));
});

Breadcrumbs::register('recipes.edit', function ($breadcrumbs, $recipe) {
    $breadcrumbs->parent('recipes.index');
    $breadcrumbs->push($recipe->name, route('recipes.show', $recipe->slug));
    $breadcrumbs->push('Editing ' . $recipe->name);
});

Breadcrumbs::register('favorites.index', function ($breadcrumbs) {
    $breadcrumbs->parent('recipes.index');
    $breadcrumbs->push('Your favorites', route('favorites.index'));
});

Breadcrumbs::register('foodplan.index', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Your foodplan', route('plan.index'));
});

Breadcrumbs::register('history.index', function ($breadcrumbs) {
    $breadcrumbs->parent('foodplan.index');
    $breadcrumbs->push('Your saved history', route('history.index'));
});

Breadcrumbs::register('error-404', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('We cannot find that page! Error 404');
});

Breadcrumbs::register('error-500', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Something went wrong on our side! Error 500');
});