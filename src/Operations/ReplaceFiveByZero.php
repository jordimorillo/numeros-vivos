<?php

declare(strict_types=1);

namespace NumerosVivos\Operations;

class ReplaceFiveByZero
{
    public function handle(int $int): int
    {
        $result = str_replace('5', '0', (string)$int);
        return (int)$result;
    }
}