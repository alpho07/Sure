<?php

namespace App\Http\ViewComposers;

use App\Repositories\AdminMenuRepository;
use Illuminate\View\View;

class TermsComposer
{
    protected $menu;

    public function __construct(AdminMenuRepository $menu)
    {
        $this->menu = $menu;
    }

    public function compose(View $view)
    {
        $terms= $this->menu->getTerms();

        $view->with(compact('terms'));
    }
}