<?php

namespace App\Services;

use Illuminate\Support\Str;

class OrderService
{
    public function generateOrderCode($prefix = 'ORD')
    {
        $now = now();
        $timeString = $now->format('YmdHis');
        $randomString = Str::upper(Str::random(5));

        return $prefix . $timeString . $randomString;
    }
}
