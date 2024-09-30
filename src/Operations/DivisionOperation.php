<?php

declare(strict_types=1);

namespace NumerosVivos\Operations;

use NumerosVivos\Exceptions\OddDividendException;

class DivisionOperation
{
    public function handle(int $dividend): int
    {
        if($dividend % 2 > 0) {
            return $dividend;
        }

        return $dividend / 2;
    }
}