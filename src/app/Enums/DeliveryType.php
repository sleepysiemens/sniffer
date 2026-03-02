<?php

namespace App\Enums;

enum DeliveryType: string
{
    case Pickup = 'pickup';
    case CDEK = 'cdek';

    case Post = 'post';
    case Ozon = 'ozon';

    public function label(): string
    {
        return match ($this) {
            self::Pickup => 'Самовывоз',
            self::CDEK   => 'CDEK',
            self::Post   => 'Почта России',
            self::Ozon   => 'OZON доставка',
        };
    }
}
