<?php

namespace MpwebIntegration\Example\Context;

use Behat\Behat\Context\Context;
use Mpweb\FizzBuzz\Solver\FizzBuzzSolver;
use PHPUnit_Framework_Assert;

final class ExampleContext implements Context
{
    public $fizzBuzzSolver;
    /**
     * @Given a value :value to run fizzbuzz
     */
    public function aValueToRunFizzbuzz($value)
    {
        $this->value = $value;
        // PHPUnit_Framework_Assert::assertTrue($this->value === $value);
        // $this->useless_value = $value;
    }

    /**
     * @When instancing and storing FizzBuzzSolver
     */
    public function instancingFizzBuzzSolver()
    {
        $fizzBuzzSolver = new FizzBuzzSolver();
        PHPUnit_Framework_Assert::assertInstanceOf(FizzBuzzSolver::class,$fizzBuzzSolver);
        $this->fizzBuzzSolver = $fizzBuzzSolver;
        // $this->useful = $value;
    }

    /**
     * @Then solving fizzBuzz
     */
    public function solvingFizzBuzz()
    {
        $result = $this->fizzBuzzSolver->solve((int)$this->value);
        var_dump($this->fizzBuzzSolver);
        var_dump($result);
        PHPUnit_Framework_Assert::assertEquals($result,"1,2,fizz,4,buzz");
    }

    /**
     * Then the result should be true
     */
    public function theResultShouldBeTrue()
    {
        PHPUnit_Framework_Assert::assertTrue($this->dummy_class_response);
    }

    /**
     * Then the temporary value should still be there
     */
    public function theTemporaryValueShouldStillBeThere()
    {
        PHPUnit_Framework_Assert::assertNotEmpty($this->useful);
    }
}