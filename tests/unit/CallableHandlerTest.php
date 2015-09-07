<?php
use Groute\Parsers\Handlers\PhpCallable as Handler;
use Codeception\Util\Stub;

class CallableHandlerTest extends \Codeception\TestCase\Test
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
        Handler::translate('1');
        Handler::translate(true);
    }
    
    /**
     * @expectedException InvalidArgumentException
     */
    public function testInvalidCallable()
    {
        Handler::translate([]);
        Handler::translate(['acme']);
    }

    public function testValidCallable()
    {
        $handler = new IndexController;
        $this->assertEquals([$handler, 'actionIndex'], Handler::translate([$handler, 'actionIndex']));
    }
}

class IndexController {
    public function actionIndex() {}
}