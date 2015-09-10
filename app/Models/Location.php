<?php
namespace App\Models;

/**
 *
 */
class Location extends \Eloquent
{

    /**
     * @var array
     */
    protected $fillable = array(
        'title',
        'description',
        'email',
        'website',
        'phone',
        'icon',
        'logo',
        'address',
        'postal_code',
        'city',
        'country',
        'latitude',
        'longitude',
        'created_by'
    );

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