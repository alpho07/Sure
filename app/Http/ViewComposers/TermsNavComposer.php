<?php

namespace App\Http\ViewComposers;

use App\Repositories\AdminMenuRepository;
use Illuminate\View\View;

class TermsNavComposer
{
    protected $menu;

    public function __construct(AdminMenuRepository $menu)
    {
        $this->menu = $menu;
    }

    public function compose(View $view)
    {
        $termsnav= $this->menu->getTermsNav();

        $view->with(compact('termsnav'));

    }
}