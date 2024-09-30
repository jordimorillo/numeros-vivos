<?php

declare(strict_types=1);

namespace NumerosVivos;

use NumerosVivos\Exceptions\InfiniteIterationsException;
use NumerosVivos\Operations\AdditionOperation;
use NumerosVivos\Operations\DivisionOperation;
use NumerosVivos\Operations\ReplaceFiveByZero;

class NumerosVivos
{
    private AdditionOperation $additionOperation;
    private DivisionOperation $divisionOperation;
    private ReplaceFiveByZero $replaceFiveByZero;

    public function __construct(
        AdditionOperation $additionOperation,
        DivisionOperation $divisionOperation,
        ReplaceFiveByZero $replaceFiveByZero
    ) {
        $this->additionOperation = $additionOperation;
        $this->divisionOperation = $divisionOperation;
        $this->replaceFiveByZero = $replaceFiveByZero;
    }

    /**
     * @throws InfiniteIterationsException
     */
    public function applyRules(int $number): int
    {
        $iteration = 0;
        $handlers = [
            $this->replaceFiveByZero,
            $this->divisionOperation,
            $this->additionOperation,
        ];

        while (!in_array($number, [0, 1, 3])) {
            $iteration++;

            foreach($handlers as $handler) {
                $newNumber = $handler->handle($number);
                if($newNumber !== $number) {
                    $number = $newNumber;
                    break;
                }
            }
        }

        if (in_array($number, [0, 3])) {
            throw new InfiniteIterationsException();
        }

        return $iteration;
    }
}