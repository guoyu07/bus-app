<?php

namespace App\Foundation\Repositories;

use App\Foundation\Blueprints\Coordinates;
use App\Foundation\Requests\BusStop;
use Illuminate\Support\Facades\DB;

/**
 * The BusStopRepository class.
 *
 * @package App\Foundation\Repositories
 * @author  Inon Baguio <inonbaguio@gmail.com>
 */
class BusStopRepository extends AbstractRepository
{
    const DEFAULT_RADIUS = 5;

    /**
     * @var BusStop
     */
    protected $model = BusStop::class;

    /**
     * BusStopRepository constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @param Coordinates $coordinates
     * @param string $stopName
     *
     * @return BusStop|null
     */
    public function getBusStopsByRadius(Coordinates $coordinates, string $stopName = '')
    {
        $query = DB::table('bus_stops as d')
            ->where('d.deleted_at', null)
            ->selectRaw(
                sprintf(
                    'd.code,
                d.road_name,
                d.description,
                d.latitude,
                d.longitude,
                (((ACOS(SIN(( %s * PI() / 180)) * SIN((d.latitude * PI() / 180)) + COS(( %s  * PI() / 180)) * COS((d.latitude * PI() / 180)) * COS((( %s - d.longitude) * PI() / 180)))) * 180 / PI()) * 60 * 1.1515 * 1.609344) AS distance',
                $coordinates->getLatitude(),
                $coordinates->getLatitude(),
                $coordinates->getLongitude()
            ))
            ->having('distance', '<=', self::DEFAULT_RADIUS);

        if (!empty($stopName)) {
//            $query->where('d.road_name', 'like', sprintf('%%s%',$stopName));
        }

        return $query
            ->orderBy('distance', 'ASC')
            ->limit(10)
            ->get();
    }
}