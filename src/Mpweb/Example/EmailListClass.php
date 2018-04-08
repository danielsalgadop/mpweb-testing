<?php
namespace Mpweb\Example;

class EmailListClass{

    private $list = [];

    function getIndex(int $index){
        if(! array_key_exists($index, $this->list)){
            return null;
        }
        return $this->list[$index];
    }

    function add(EmailClass $email){
        $this->list[] = $email;
    }

    function length() {
        return count($this->list);
    }
}