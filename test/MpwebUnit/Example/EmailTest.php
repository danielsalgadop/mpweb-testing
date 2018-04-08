<?php

namespace MpwebUnit\Example;

use Mpweb\Example\EmailClass;
use PHPUnit_Framework_TestCase;

final class EmailTest extends PHPUnit_Framework_TestCase
{

    private $string_correct_email = 'correct@email.com';
    private $string_wrong_email = 'wrong_value';
    public $emailClassNOES_VISIBLE_EN_RESTO_DE_TEST;  // <<<<<<<< Curioso, esto no tiene visibilidad esperada
    public $emailClass;

    public function setUp()
    {
        $this->emailClass =new EmailClass($this->string_correct_email);  // <<<<<<< esta es el sitio para que sea visible en resto de clase
    }
    /** @test */
    public function correctStringReturnEmailClass()
    {
        $this->emailClassNOES_VISIBLE_EN_RESTO_DE_TEST = new EmailClass($this->string_correct_email);   // <<<<< este $this->emailClassNOES_VISIBLE_EN_RESTO_DE_TEST
        self::assertInstanceOf(EmailClass::class, $this->emailClassNOES_VISIBLE_EN_RESTO_DE_TEST);
    }
    /** @test
    * @expectedException     Exception
     */
    public function incorrectStringRaisesException(){
        $email = new EmailClass($this->string_wrong_email);
        $this->expectException(Exception::class);
    }

    /** @test */
    public function getEmailReturnsCorrectValue(){
        // no tengo manera de acceder a $emailClassNOES_VISIBLE_EN_RESTO_DE_TEST
        // var_dump($this->emailClassNOES_VISIBLE_EN_RESTO_DE_TEST->getEmail());
        self::assertEquals($this->string_correct_email, $this->emailClass->getEmail() );
    }
}