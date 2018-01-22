<?php

namespace App\Foundation\Blueprints;

/**
 * The Coordinates interface.
 *
 * @package App\Foundation\Blueprints
 * @author  Inon Baguio <inonbaguio@gmail.com>
 */
class Coordinates
{
    /**
     * @var float
     */
    private $latitude;

    /**
     * @var float
     */
    private $longitude;

    /**
     * Coordinates constructor.
     *
     * @param float $latitude
     * @param float $longitude
     */
    public function __construct(float $latitude, float $longitude)
    {
        $this->latitude = $latitude;
        $this->longitude = $longitude;
    }

    /**
     * @return mixed
     */
    public function getLatitude()
    {
        return $this->latitude;
    }

    /**
     * @param mixed $latitude
     */
    public function setLatitude($latitude): void
    {
        $this->latitude = $latitude;
    }

    /**
     * @return mixed
     */
    public function getLongitude()
    {
        return $this->longitude;
    }

    /**
     * @param mixed $longitude
     */
    public function setLongitude($longitude): void
    {
        $this->longitude = $longitude;
    }
}
