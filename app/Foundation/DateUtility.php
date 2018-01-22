<?php

namespace App\Foundation;

use Carbon\Carbon;

/**
 * The Utilities class.
 *
 * @package App\Foundation
 * @author  Inon Baguio <inonbaguio@gmail.com>
 */
class DateUtility
{
    /**
     * @param string $date
     *
     * @return Carbon
     */
    public static function parse($date)
    {
        return Carbon::parse($date);
    }
}
