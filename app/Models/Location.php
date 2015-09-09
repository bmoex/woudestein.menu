<?php
namespace App\Models;

/**
 *
 */
class Location extends \Eloquent
{

    /**
     * Get items from all locations
     *
     * @param string $currentRoute
     * @return array
     */
    public static function getMapItems($currentRoute = null)
    {
        return self::all();
    }
}