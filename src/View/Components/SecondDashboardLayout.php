<?php

namespace IvanAquino\JetAdmin\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class SecondDashboardLayout extends Component
{
    public function render(): View
    {
        return view('jet-admin::layouts.second-dashboard');
    }
}
