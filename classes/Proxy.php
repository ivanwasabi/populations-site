<?php
/**
 * Created by PhpStorm.
 * User: Dima Kruhlyi
 * Date: 5/29/2019
 * Time: 1:24 AM
 */



class SomeObject
{
    protected $message;

    public function __construct($message)
    {
        $this->message = $message;
    }

    protected function doSomething() {
        return $this->message;
    }
}
class Proxy extends SomeObject
{
    protected $proxied;
    public function __construct(SomeObject $o)
    {
        $this->proxied = $o;
    }

    public function doSomething()
    {
        return ucwords($this->proxied->doSomething());
    }
}


?>