<?php

namespace MpwebIntegration\Example\Context;

use Behat\Behat\Context\Context;
use Mpweb\Example\DummyClass;
use PHPUnit_Framework_Assert;

final class ExampleContext implements Context
{
    /**
     * @Given /a value (\b.+\b) that I don't really need/
     */
    public function aValueXThatIDontReallyNeed($value)
    {
        $this->useless_value = $value;
    }

    /**
     * @Given /temporary storing another value (\b.+\b)/
     */
    public function temporaryStoringAnotherValueY($value)
    {
        $this->temp_value = $value;
    }

    /**
     * @When executing the dummy class
     */
    public function executingTheDummyClass()
    {
        $this->dummy = new DummyClass();
        // throw new PendingException();
    }

    /**
     * @Then the result should be true
     */
    public function theResultShouldBeTrue()
    {
        $result = $this->dummy->getTrue();
        PHPUnit_Framework_Assert::assertTrue($result);
    }

    /**
     * @Then the temporary value should still be there
     */
    public function theTemporaryValueShouldStillBeThere()
    {
        PHPUnit_Framework_Assert::assertNotEmpty($this->useless_value);
    }

}