<?php

// Home
Breadcrumbs::register('home', function ($breadcrumbs) {
    $breadcrumbs->push('Dashboard', route('home'));
});

Breadcrumbs::register('home.admin', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Admin Dashboard', route('home.admin'));
});

Breadcrumbs::register('comment.moderation', function ($breadcrumbs) {
    $breadcrumbs->parent('home.admin');
    $breadcrumbs->push('Comment moderation queue', route('comments.moderation'));
});

Breadcrumbs::register('users.index', function ($breadcrumbs) {
    $breadcrumbs->parent('home.admin');
    $breadcrumbs->push('Manage all users', route('users.index'));
});

Breadcrumbs::register('menus.index', function ($breadcrumbs) {
    $breadcrumbs->parent('home.admin');
    $breadcrumbs->push('Manage all menus', route('menus.index'));
});

Breadcrumbs::register('menus.create', function ($breadcrumbs) {
    $breadcrumbs->parent('menus.index');
    $breadcrumbs->push('Creating new menu');
});

Breadcrumbs::register('menus.edit', function ($breadcrumbs, $menu) {
    $breadcrumbs->parent('menus.index');
    $breadcrumbs->push('Editing menu: ' . $menu->name, route('menus.show', $menu));
});

Breadcrumbs::register('admin.reports', function ($breadcrumbs) {
    $breadcrumbs->parent('home.admin');
    $breadcrumbs->push('All admin reports', route('admin.report'));
});

Breadcrumbs::register('admin.reports.show', function ($breadcrumbs, $report) {
    $breadcrumbs->parent('admin.reports');
    $breadcrumbs->push('Viewing report of ' . $report->from . ' - ' . $report->till);
});

Breadcrumbs::register('page.index', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Pages', route('page.index'));
});

Breadcrumbs::register('page.show', function ($breadcrumbs, $page) {
    $breadcrumbs->parent('page.index');
    $breadcrumbs->push($page->name, route('page.show', $page->slug));
});

Breadcrumbs::register('page.edit', function ($breadcrumbs, $page) {
    $breadcrumbs->parent('page.show', $page);
    $breadcrumbs->push('Editing page: ' . $page->name, route('page.show', $page->slug));
});

Breadcrumbs::register('page.create', function ($breadcrumbs) {
    $breadcrumbs->parent('page.index');
    $breadcrumbs->push('Creating new page');
});

Breadcrumbs::register('blog.index', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Blog', route('blog.index'));
});

Breadcrumbs::register('blog.show', function ($breadcrumbs, $post) {
    $breadcrumbs->parent('blog.index');
    $breadcrumbs->push($post->title, route('blog.show', $post->slug));
});

Breadcrumbs::register('blog.create', function ($breadcrumbs) {
    $breadcrumbs->parent('blog.index');
    $breadcrumbs->push('Creating new blog post');
});

Breadcrumbs::register('blog.update', function ($breadcrumbs, $post) {
    $breadcrumbs->parent('blog.show', $post);
    $breadcrumbs->push('Editing ' . $post->title);
});

Breadcrumbs::register('settings.index', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Settings', route('settings.index'));
});

Breadcrumbs::register('settings.password', function ($breadcrumbs) {
    $breadcrumbs->parent('settings.index');
    $breadcrumbs->push('Change your password');
});

Breadcrumbs::register('user.login', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Login');
});

Breadcrumbs::register('user.register', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Registering new account');
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

Breadcrumbs::register('recipes.create', function ($breadcrumbs) {
    $breadcrumbs->parent('recipes.index');
    $breadcrumbs->push('Submitting new recipe');
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

Breadcrumbs::register('groceries.index', function ($breadcrumbs) {
    $breadcrumbs->parent('foodplan.index');
    $breadcrumbs->push('Your grocery list for this week', route('groceries.index'));
});

Breadcrumbs::register('error-404', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('We cannot find that page! Error 404');
});

Breadcrumbs::register('error-500', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Something went wrong on our side! Error 500');
});