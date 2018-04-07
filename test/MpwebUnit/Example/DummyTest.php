<?php

namespace MpwebUnit\Example;

use Mpweb\Example\DummyClass;
use PHPUnit_Framework_TestCase;

final class DummyTest extends PHPUnit_Framework_TestCase
{

    private $dummy;

    /**
     * @See https://phpunit.de/manual/current/en/fixtures.html
     */
    protected function setUp()
    {
        $this->dummy = new DummyClass();
    }

    /**
     * @See https://phpunit.de/manual/current/en/fixtures.html
     */
    protected function tearDown()
    {
        $this->dummy = null;
    }

    /** @test */
    public function shouldReturnTrue()
    {
        $dummy = new DummyClass();

        self::assertTrue($dummy->getTrue(), "Dummy::getTrue method did not return true");
    }
    /** @test
     * @expectedException     Exception
     */
    public function shouldThrowException()
    {
        $dummy = new DummyClass();
        $dummy->throwException();
        $this->expectException(InvalidArgumentException::class);
    }

}