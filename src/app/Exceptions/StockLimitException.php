<?php

namespace App\Exceptions;

use DomainException;

class StockLimitException extends DomainException
{
    protected $message = 'Amount is incorrect';
}
