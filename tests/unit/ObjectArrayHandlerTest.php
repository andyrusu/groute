<?php
use Handler\Parsers\Handlers\ObjectArray as Handler;

class ObjectArrayHandlerTest extends \Codeception\TestCase\Test
{
    /**
     * @var \UnitTester
     */
    protected $tester;

    protected function _before()
    {
    }

    protected function _after()
    {
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function testInvalidParams()
    {
        Handler::translate(1);
        Handler::translate(1.5);
        Handler::translate(true);
    }
    
    /**
     * @expectedException InvalidArgumentException
     */
    public function testEmptyArrayNoConfig()
    {
        //Handler::translate([]);
        //Handler::translate(['acme']);
    }
    
    public function testValidCallable()
    {
        
    }

}