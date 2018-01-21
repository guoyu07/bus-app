<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * The BusStop class.
 *
 * @package App\Models
 * @author  Inon Baguio <inonbaguio@gmail.com>
 */
class BusStop extends Model
{
    const DEFAULT_RADIUS = 5;
    /**
     * @var string
     */
    protected $table = 'bus_stops';

    /**
     * @var string
     */
    protected $primaryKey = 'id';
}