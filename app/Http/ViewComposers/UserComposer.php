<?php

namespace App\Http\ViewComposers;

use App\User;
use Illuminate\View\View;

class UserComposer
{
    protected $recipes;
    /**
     * Create a recipe composer
     *
     */
    public function __construct(User $user)
    {
        $this->user = auth()->user();
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('user', $this->user);
    }
}