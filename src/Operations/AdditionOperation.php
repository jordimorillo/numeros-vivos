<?php

declare(strict_types=1);

namespace NumerosVivos\Operations;

class AdditionOperation
{
    public function handle(int $int): int
    {
        if($int % 2 === 0) {
            return $int;
        }

        return $int + 3;
    }
}