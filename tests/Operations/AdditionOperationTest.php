<?php

declare(strict_types=1);

namespace Tests\Operations;

use NumerosVivos\Operations\AdditionOperation;
use PHPUnit\Framework\TestCase;

class AdditionOperationTest extends TestCase
{
    private AdditionOperation $additionOperation;

    public function setUp(): void
    {
        parent::setUp();
        $this->additionOperation = new AdditionOperation();
    }

    public function testCanInstantiate(): void
    {
        self::assertInstanceOf(AdditionOperation::class, $this->additionOperation);
    }

    public function testCanAddThree(): void
    {
        $result = $this->additionOperation->handle(1);
        self::assertEquals(4, $result);
    }

    public function testCanRemainStillWhenPassedNumberIsPair(): void
    {
        $result = $this->additionOperation->handle(2);
        self::assertEquals(2, $result);
    }
}