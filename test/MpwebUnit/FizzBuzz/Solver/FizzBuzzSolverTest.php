<?php

namespace MpwebUnit\FizzBuzz\Solver;


use Mpweb\FizzBuzz\Solver\FizzBuzzSolver;
use Mpweb\FizzBuzz\Solver\Solver;

class FizzBuzzSolverTest extends \PHPUnit_Framework_TestCase
{

    private $fizzBuzz;

    private $solver;

    private $result;

    const NUMBER = 24;

    const FIZZ = "Fizz";

    const BUZZ = "Buzz";

    const COMPOSITE_RESULT = self::FIZZ . self::BUZZ;

    protected function setUp()
    {
        $this->solver = $this->getMockForAbstractClass(Solver::class);
    }

    protected function tearDown()
    {
        $this->fizzBuzz = null;
        $this->solver = null;
        $this->result = null;
    }

    /** @test */
    public function shouldReturnAnEmptyStringWhenThereAreNoSolvers()
    {
        $this->givenThatThereAreNoSolvers();
        $this->whenGettingTheFizzBuzzResult();
        $this->thenTheResultShouldBeAnEmptyString();
    }

    /** @test */
    public function shouldGetTheResultForASingleSolver()
    {
        $this->givenThatThereIsASingleSolver();
        $this->whenGettingTheFizzBuzzResult();
        $this->thenTheResultShouldBeTheOneFromTheSingleSolver();
    }

    /** @test */
    public function shouldGetTheResultWhenThereAreMoreThanOneSolver()
    {
        $this->givenThatThereIsMoreThanOneSolver();
        $this->whenGettingTheFizzBuzzResult();
        $this->thenTheResultShouldBeTheOneComposedFromAllSolvers();
    }

    private function givenThatThereAreNoSolvers()
    {
        $this->solver = null;
    }

    private function whenGettingTheFizzBuzzResult()
    {
        $this->fizzBuzz = new FizzBuzzSolver($this->solver);
        $this->result = $this->fizzBuzz->solve(self::NUMBER);
    }

    private function thenTheResultShouldBeAnEmptyString()
    {
        $this->assertEmpty($this->result);
    }

    private function givenThatThereIsASingleSolver()
    {
        $singleSolver = $this->getMockForAbstractClass(Solver::class);

        $singleSolver
            ->method("solve")
            ->with(self::NUMBER)
            ->willReturn(self::FIZZ);

        $this->solver = [$singleSolver];
    }

    private function thenTheResultShouldBeTheOneFromTheSingleSolver()
    {
        $this->assertEquals(self::FIZZ, $this->result);
    }

    private function givenThatThereIsMoreThanOneSolver()
    {
        $firstSolver = $this->getMockForAbstractClass(Solver::class);

        $firstSolver
            ->method("solve")
            ->willReturn(self::FIZZ);

        $firstSolver
            ->method("hasNext")
            ->willReturn(true);


        $secondSolver = $this->getMockForAbstractClass(Solver::class);

        $secondSolver
            ->method("solve")
            ->willReturn(self::BUZZ);

        $secondSolver
            ->method("hasNext")
            ->willReturn(true);

        $this->solver = [$secondSolver, $firstSolver];

    }

    public function thenTheResultShouldBeTheOneComposedFromAllSolvers()
    {
        $this->assertEquals(self::COMPOSITE_RESULT, $this->result);
    }

}