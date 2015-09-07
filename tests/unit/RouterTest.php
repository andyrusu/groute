<?php
use Groute\Router;

class RouterTest extends \Codeception\TestCase\Test
{
    private $simpleRoutes = [];
    
    /**
     * @var \UnitTester
     */
    protected $tester;

    protected function _before()
    {
        $this->simpleRoutes = [
            'routes' => [
                [
                    'routes' => ['', 'index'],
                    'handler' => 'indexHandler'
                ]
            ],
        ];
    }

    protected function _after()
    {
    }

    // tests
    public function testInstance()
    {
        $this->assertInstanceOf('Groute\Router', new Router());
        $this->assertInstanceOf('Groute\Router', new Router([]));
    }
    
    public function testConstructor()
    {
        $emptyRouter = new Router();
        $this->assertEquals([], $emptyRouter->getRoutes());
        
        $notEmptyRouter = new Router(['group' => '']);
        $this->assertArrayHasKey('group', $notEmptyRouter->getRoutes());
    }
    
    public function testStrategyNone()
    {
        $router = new Router($this->simpleRoutes);
        $this->assertInternalType('array', $router->getRoutes());
    }
    
    public function testHandler()
    {
        $router = new Router($this->simpleRoutes);
        $this->assertInternalType('array', $router->handleRoute('/'));
    }
}