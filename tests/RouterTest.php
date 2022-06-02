<?php

class RouterTest extends \PHPUnit\Framework\TestCase {

    public function testConstructorInterface() {
        $this->expectException(PHPUnit_Framework_Error::class);
        new \Router\Router($this->url);
    }
}