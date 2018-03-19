<?php

namespace elementary\core\Singleton\Test;

use elementary\core\Singleton\SingletonInterface;
use elementary\core\Singleton\SingletonTrait;
use PHPUnit_Framework_MockObject_MockObject as MockObject;
use PHPUnit\Framework\TestCase;

/**
 * @coversDefaultClass \elementary\core\Singleton\SingletonTrait
 */
class SingletonTraitTest extends TestCase
{
    /**
     * @return  MockObject|SingletonTrait
     */
    protected function buildMock()
    {
        return $this->getMockBuilder(SingletonTrait::class)->setMethods(null)->getMockForTrait();
    }

    /**
     * @test
     * @covers ::me()
     */
    public function me()
    {
        fwrite(STDOUT, "\n". __METHOD__);

        $this->assertInstanceOf(SingletonInterface::class, Singleton::me());

        $mock = $this->buildMock();

        $this->assertEquals(get_class($mock::me()), get_class($mock::me()));

        $this->assertEquals(Singleton::class, get_class(SingletonCh2::me()));
        $this->assertNotEquals(get_class(Singleton::me()), SingletonCh2::class);

        $this->assertNotEquals(get_class(Singleton::me()), get_class(SingletonCh1::me()));
        $this->assertEquals(SingletonCh1::class, get_class(SingletonCh1::me()));
    }
}

class Singleton implements SingletonInterface
{
    use SingletonTrait;
}

class SingletonCh1 extends Singleton
{
    protected static $instance = null;
}

class SingletonCh2 extends Singleton
{

}