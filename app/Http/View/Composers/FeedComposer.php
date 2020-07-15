<?php

namespace App\Http\View\Composers;

use App\User;
use Illuminate\View\View;

class FeedComposer
{
    /**
     * The user repository implementation.
     *
     * @var User
     */
    protected $users;

    /**
     * Create a new profile composer.
     *
     * @param  User  $users
     * @return void
     */
    public function __construct(User $users)
    {
        // Dependencies automatically resolved by service container...
        $this->users = $users;
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('count', $this->users);
    }
}
