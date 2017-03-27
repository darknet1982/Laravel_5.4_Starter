<?php
namespace App\Composers;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;

/**
 *
 * Attaches a count of pending players to the admin sidebar
 *
 * @package App\Composers
 */
class SidebarComposer
{
    public function compose(View $view)
    {
        $user = null;
        if (Auth::check()) {
            $user = Auth::user();
        }

        $view->with('user', $user);
    }
}