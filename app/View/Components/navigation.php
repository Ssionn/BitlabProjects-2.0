<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Route;
use Illuminate\View\Component;

class navigation extends Component
{
    public $currentRouteName;

    public function __construct()
    {
        $this->currentRouteName = Route::currentRouteName();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.navigation');
    }
}
