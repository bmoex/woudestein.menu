<?php
namespace App\Http\Controllers;

use App\Models\Location;

/**
 * Controller: Location
 *
 * @package App\Http\Controllers
 */
class LocationController extends Controller
{

    /**
     * Show location detail
     *
     * @param integer $identifier
     * @return string<json>
     */
    public function show($identifier = null)
    {
        $location = Location::find($identifier);
        exit($identifier);
    }
}