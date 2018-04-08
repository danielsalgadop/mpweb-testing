<?php
namespace Mpweb\Example;

class EmailClass {

    private $email;

    function __construct(string $email){

        if (! filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new \Exception("Not valid email");
        }
        $this->email = $email;
    }
    public function getEmail(){
        return $this->email;
    }
}

// $e = new EmailClass('asdsdf@asdf.com');
// print $e->getEmail();