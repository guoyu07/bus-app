<?php

namespace App\Foundation\Repositories;

/**
 * The AbstractRepository class.
 *
 * @package App\Foundation\Repositories
 * @author  Inon Baguio <inonbaguio@gmail.com>
 */
abstract class AbstractRepository
{
    /**
     * @var int
     */
    const CACHE_EXPIRY = 1440;

    /**
     * AbstractRepository constructor.
     */
    public function __construct()
    {
        $this->model = new $this->model;
    }
}
