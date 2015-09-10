<?php
namespace App\Http\Controllers;

use App\Models\Location;
use View;

/**
 * Controller: Map
 *
 * @package App\Http\Controllers
 */
class MapController extends Controller
{

    /**
     * Default map output
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        return View::make('map/index', [
            'locations' => Location::getMapItems(),
        ]);
    }
}