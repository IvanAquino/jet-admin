<?php

namespace IvanAquino\JetAdmin\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class DashboardLayout extends Component
{
    public function render(): View
    {
        return view('jet-admin::layouts.dashboard');
    }
}
