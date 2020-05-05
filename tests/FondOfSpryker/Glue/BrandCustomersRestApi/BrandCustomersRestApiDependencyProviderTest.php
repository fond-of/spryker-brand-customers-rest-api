<?php

namespace FondOfSpryker\Glue\BrandCustomersRestApi;

use Codeception\Test\Unit;
use Spryker\Glue\Kernel\Container;

class BrandCustomersRestApiDependencyProviderTest extends Unit
{
    /**
     * @var \FondOfSpryker\Glue\BrandCustomersRestApi\BrandCustomersRestApiDependencyProvider
     */
    protected $brandCustomersRestApiDependencyProvider;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Spryker\Glue\Kernel\Container
     */
    protected $containerMock;

    /**
     * @return void
     */
    protected function _before(): void
    {
        parent::_before();

        $this->containerMock = $this->getMockBuilder(Container::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->brandCustomersRestApiDependencyProvider = new BrandCustomersRestApiDependencyProvider();
    }

    /**
     * @return void
     */
    public function testProvideDependencies(): void
    {
        $this->assertInstanceOf(Container::class, $this->brandCustomersRestApiDependencyProvider->provideDependencies($this->containerMock));
    }
}
