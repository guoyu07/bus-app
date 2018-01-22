<?php

namespace App\Foundation\Repositories;

use App\Foundation\Blueprints\Coordinates;
use App\Models\BusStop;
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
     * @param string $roadName
     *
     * @return BusStop|null
     */
    public function getBusStopByname(string $roadName)
    {
        return $this->model->where('deleted_at', null)
            ->where('road_name', 'like', '%' . $roadName . '%')
            ->first();
    }

    /**
     * @param Coordinates $coordinates
     * @param string $stopName
     *
     * @return BusStop|null
     */
    public function getBusStopsByRadius(Coordinates $coordinates)
    {
        $query = $this->model->where('deleted_at', null)
            ->selectRaw(sprintf(
                'code,
                road_name,
                description,
                latitude,
                longitude,
                (((ACOS(SIN(( %s * PI() / 180)) * SIN((latitude * PI() / 180)) + COS(( %s  * PI() / 180)) * COS((latitude * PI() / 180)) * COS((( %s - longitude) * PI() / 180)))) * 180 / PI()) * 60 * 1.1515 * 1.609344) AS distance',
                $coordinates->getLatitude(),
                $coordinates->getLatitude(),
                $coordinates->getLongitude()
            ))
            ->having('distance', '<=', self::DEFAULT_RADIUS);

        return $query
            ->orderBy('distance', 'ASC')
            ->limit(10)
            ->get();
    }
}
