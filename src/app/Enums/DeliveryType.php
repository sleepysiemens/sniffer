<?php

namespace App\Enums;

enum DeliveryType: string
{
    case Pickup = 'pickup';
    case CDEK = 'cdek';

    case Post = 'post';
    case Ozon = 'ozon';
}
