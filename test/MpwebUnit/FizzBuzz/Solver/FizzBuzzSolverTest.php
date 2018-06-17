<?php

namespace MpwebUnit\FizzBuzz\Solver;


use Mpweb\FizzBuzz\Solver\FizzBuzzSolver;

class FizzBuzzSolverTest extends \PHPUnit_Framework_TestCase
{

    const FIZZ_WORD = "fizz";

    const BUZZ_WORD = "buzz";

    const FIZZ_BUZZ_WORD = "fizzbuzz";

    private $fizzBuzz;

    private $number;

    protected function setUp()
    {
        $this->fizzBuzz = new FizzBuzzSolver();
    }

    /**
     * @test
     * @dataProvider solutionFrom1to20Provider
     */
    public function sequenceTest($sequencial_numbers_from1to20)
    {
        foreach($sequencial_numbers_from1to20 as $number => $expected_result)
        {
            $result = $this->fizzBuzz->solve($number);
            $this->assertEquals($expected_result, $result);
        }
    }
    /**
     * @test
     * @dataProvider numberDivisibleByThreeProvider
     */
    public function shouldReturnFizzForNumbersThatCanBeDividedByThree($number)
    {
        $this->givenANumber($number);
        $this->thenItShouldReturnFizz();
    }


    /**
     * @test
     * @dataProvider numberNotDivisibleByThreeProvider
     */
    public function shouldReturnTheNumberIfItIsNotDivisibleByThree($number)
    {
        $this->givenANumber($number);
        $this->thenItShouldReturnTheNumber();
    }

    /**
     * @test
     * @dataProvider numberDivisibleByFiveProvider
     */
    public function shouldReturnBuzzForNumbersThatCanBeDividedByFive($number)
    {
        $this->givenANumber($number);
        $this->thenItShouldReturnBuzz();
    }

    /**
     * @test
     * @dataProvider numberDivisibleByThreeAndFiveProvider
     */
    public function shouldReturnFizzBuzzForNumbersThatCanBeDividedByThreeAndFive($number)
    {
        $this->givenANumber($number);
        $this->thenItShouldReturnFizzBuzz();
    }

    public function solutionFrom1to20Provider()
    {
        return [
            [
                [
                    1 =>1,
                    2 =>2,
                    3 =>self::FIZZ_WORD,
                    4 =>4,
                    5 =>self::BUZZ_WORD,
                    6 =>self::FIZZ_WORD,
                    7 =>7,
                    8 =>8,
                    9 =>self::FIZZ_WORD,
                    10 =>self::BUZZ_WORD,
                    11 =>11,
                    12 =>self::FIZZ_WORD,
                    13 =>13,
                    14 =>14,
                    15 =>self::FIZZ_BUZZ_WORD,
                    16 =>16,
                    17 =>17,
                    18 =>self::FIZZ_WORD,
                    19 =>19,
                    20 =>self::BUZZ_WORD,
                ]
            ]
        ];
    }

    public function numberDivisibleByThreeProvider()
    {
        return [
            [3], [6], [9], [12], [18], [24], [36], [48], [96], [102]
        ];
    }

    public function numberNotDivisibleByThreeProvider()
    {
        return [
            [2], [4], [7], [13], [22], [31], [32], [62], [97], [152]
        ];
    }

    public function numberDivisibleByFiveProvider()
    {
        return [
            [5], [10], [20], [35], [40], [50], [55], [80], [110], [160]
        ];
    }

    public function numberDivisibleByThreeAndFiveProvider()
    {
        return [
            [15], [30], [45], [60], [75], [90], [105]
        ];
    }

    private function givenANumber($number)
    {
        $this->number = $number;
    }

    private function thenItShouldReturnFizz()
    {
        $result = $this->fizzBuzz->solve($this->number);
        $this->assertEquals(self::FIZZ_WORD, $result);
    }

    private function thenItShouldReturnTheNumber()
    {
        $result = $this->fizzBuzz->solve($this->number);
        $this->assertEquals((string) $this->number, $result);
    }

    private function thenItShouldReturnBuzz()
    {
        $result = $this->fizzBuzz->solve($this->number);
        $this->assertEquals(self::BUZZ_WORD, $result);
    }

    private function thenItShouldReturnFizzBuzz()
    {
        $result = $this->fizzBuzz->solve($this->number);
        $this->assertEquals(self::FIZZ_BUZZ_WORD, $result);
    }

}