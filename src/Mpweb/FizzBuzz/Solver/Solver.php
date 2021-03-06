<?php

namespace Mpweb\FizzBuzz\Solver;


abstract class Solver
{

    protected $nextSolver;

    public abstract function solve($input);

    public function setNext(Solver $solver)
    {
        $this->nextSolver = $solver;
        return $this->nextSolver;
    }

    public function hasNext()
    {
        return $this->nextSolver != null;
    }

}