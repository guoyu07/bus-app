<?php

namespace App\Foundation\Requests;

/**
 * The BusStop class.
 *
 * @package App\Foundation\Requests
 * @author  Inon Baguio <inonbaguio@gmail.com>
 */
class BusStop extends AbstractRequest
{
    /**
     * @var string
     */
    private $roadName = '';

    /**
     * @return string
     */
    public function getRoadName(): string
    {
        return $this->roadName;
    }

    /**
     * @param string $roadName
     */
    public function setRoadName(string $roadName)
    {
        $this->roadName = $roadName;
    }

    /**
     * {@inheritdoc}
     */
    public function apiRequestSegment(): string
    {
        return 'BusStops';
    }

    /**
     * {@inheritdoc}
     */
    public function assembleRequest()
    {
        $this->setRoadName($this->payload['roadName'] ?? '');
    }

    /**
     * {@inheritdoc}
     */
    public function serializeRequest(): array
    {
        return [
            'RoadName' => $this->getRoadName()
        ];
    }
}
