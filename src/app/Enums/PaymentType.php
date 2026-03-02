<?php

namespace App\Enums;

enum PaymentType: string
{
    case Cash = 'cash';
    case Card = 'card';

    public function label(): string
    {
        return match ($this) {
            self::Cash => 'Наличными при получении',
            self::Card => 'Банковской картой',
        };
    }
}
