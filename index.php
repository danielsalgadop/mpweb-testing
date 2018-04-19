<?php

require('vendor/autoload.php');
use Mpweb\FizzBuzz\Solver\FizzBuzzSolver;
use Mpweb\FizzBuzz\Solver\FizzSolver;
use Mpweb\FizzBuzz\Solver\BuzzSolver;

$fs = new FizzSolver();
// $fbs = new FizzBuzzSolver();
$bs = new BuzzSolver();


$f = new FizzBuzzSolver([$bs,$fs]);
$r = $f->solve(15);
print $r;
