<?php

namespace MpwebUnit\Example;

use Mpweb\Example\EmailListClass;
use Mpweb\Example\EmailClass;
use PHPUnit_Framework_TestCase;

final class EmailListTest extends PHPUnit_Framework_TestCase
{

    private $arr_correct_emails = ['correcto0@email.com','correcto1@email.com','correcto2@email.com','correcto3@email.com','correcto4@email.com','correcto5@email.com'];
    private $string_correct_email;
    private $string_wrong_email;
    private $emailList;
    /**
     * @See https://phpunit.de/manual/current/en/fixtures.html
     */
    protected function setUp()
    {
        $emailList = new EmailListClass();
        foreach ($this->arr_correct_emails as $email_string) {
            $emailClass = new EmailClass($email_string);
            $emailList->add($emailClass);
        }
        $this->emailList = $emailList;
    }

    /** @test */
    public function lengthMethodCountsCorrectly() {
        $this->assertEquals(count($this->arr_correct_emails),$this->emailList->length());
    }

    /** @test */
    public function getIndexReturnsCorrectElemet()
    {
        foreach ($this->arr_correct_emails as $key => $email_string) {
            $emailClass = $this->emailList->getIndex($key);
            self::assertEquals($email_string , $emailClass->getEmail());
        }
    }
}