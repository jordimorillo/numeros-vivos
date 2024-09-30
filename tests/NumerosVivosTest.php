<?php

declare(strict_types=1);

use NumerosVivos\Exceptions\InfiniteIterationsException;
use NumerosVivos\Operations\AdditionOperation;
use NumerosVivos\Operations\DivisionOperation;
use NumerosVivos\Operations\ReplaceFiveByZero;
use PHPUnit\Framework\TestCase;
use NumerosVivos\NumerosVivos;

class NumerosVivosTest extends TestCase
{
    public NumerosVivos $numerosVivos;

    public function setUp(): void
    {
        parent::setUp();
        $this->numerosVivos = new NumerosVivos(
            new AdditionOperation(),
            new DivisionOperation(),
            new ReplaceFiveByZero()
        );
    }

    public function testCanReturnTheTotalIterationsUntilPassedNumberBecomesOne(): void
    {
        $result = $this->numerosVivos->applyRules(8);
        self::assertEquals(3, $result);
    }

    public function dataProvider(): array
    {
        return [[0], [3]];
    }

    /**
     * @dataProvider dataProvider()
     */
    public function testCanThrowInfiniteIterationsException(int $number): void
    {
        $this->expectException(InfiniteIterationsException::class);
        $this->numerosVivos->applyRules($number);
    }
}
