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

    public function label(): string
    {
        return match ($this) {
            self::Created          => 'Создан',
            self::Canceled         => 'Отменен',
            self::ReadyForDelivery => 'Готов к доставке',
            self::IsDelivering     => 'Доставляется',
            self::Delivered        => 'Доставлен',
            self::Received         => 'Получен',
        };
    }
}
