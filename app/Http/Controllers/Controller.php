<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Route;
use View;

abstract class Controller extends BaseController
{

    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * Generic construction.
     */
    public function __construct()
    {
        //Get the current route
        if (!is_null(Route::current())) {
            $this->layoutVars['baseRoute'] = Route::current()->getPath();
        } else {
            $this->layoutVars['baseRoute'] = '/';
        }

        // Configure default layouts
        View::composer(
            'layouts.default',
            function ($view) {
                //Get the menu
                $this->layoutVars['locations'] = Location::getMapItems($this->layoutVars['baseRoute']);

                //Render variables to the layout
                $view->with($this->layoutVars);
            }
        );
    }
}
