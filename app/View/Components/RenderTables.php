<?php

namespace App\View\Components;

use App\Models\User;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class RenderTables extends Component
{
    /**
     * Create a new component instance.
     */
    public $users;
    public $role;

    /**
     * Create a new component instance.
     */
    public function __construct( $users,  $role)
    {
        $this->users = $users->map(function ($user) {
            return $user instanceof User ? $user : new User($user);
        });

        $this->role = $role;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.render-tables');
    }
}
