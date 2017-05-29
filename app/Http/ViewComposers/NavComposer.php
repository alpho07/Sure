<?php

namespace App\Http\ViewComposers;

use App\Repositories\AdminMenuRepository;
use Illuminate\View\View;

class NavComposer
{
    protected $menu;

    public function __construct(AdminMenuRepository $menu)
    {
        $this->menu = $menu;
    }

    public function compose(View $view)
    {
        $sides= $this->menu->getSideBar();

        $view->with(compact('sides'));
    }
}