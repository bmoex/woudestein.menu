<?php
namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use View;

/**
 * Abstract Controller
 *
 * @package App\Http\Controllers
 */
abstract class Controller extends BaseController
{

    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * @var string
     */
    protected $layout = 'layouts.default';

    /**
     * @var array
     */
    protected $layoutVars = [];

    /**
     * Generic construction
     */
    public function __construct()
    {
        // Configure default layouts
        View::composer(
            $this->layout,
            function ($view) {
                // Render variables to the layout
                $view->with($this->layoutVars);
            }
        );
    }
}
