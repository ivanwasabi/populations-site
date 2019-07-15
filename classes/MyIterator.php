<?php
/**
 * Created by PhpStorm.
 * User: Dima Kruhlyi
 * Date: 5/29/2019
 * Time: 2:25 AM
 */

class MyIterator implements  Iterator
{
    private $var;

    public function __construct($array)
    {
        if (is_object($array)) {
            $this->var = $array;
        }
    }

    public function rewind()
    {
        echo "rewind to start <br/>";
        reset($this->var);
    }

    public function current()
    {
        $var = current($this->var);
        echo "current: $var <br/>";
        return $var;
    }

    public function key()
    {
        $var = key($this->var);
        echo "key: $var <br/>";
        return $var;
    }

    public function next()
    {
        $var = next($this->var);
        echo "next: $var <br/>";
        return $var;
    }

    public function valid()
    {
        $key = key($this->var);
        $var = ($key !== NULL && $key !== FALSE);
        //echo "valid: $var <br/>";
        echo "======================== <br/>";
        return $var;
    }

}
