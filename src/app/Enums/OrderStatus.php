<?php

namespace App\Enums;

enum OrderStatus: string
{
    case Created = 'created';
    case Canceled = 'canceled';
    case ReadyForDelivery = 'ready for delivery';
    case IsDelivering = 'is delivering';
    case Delivered = 'delivered';
    case Received = 'received';
}
