<?php

namespace FondOfSpryker\Glue\BrandCustomersRestApi;

use Codeception\Test\Unit;
use FondOfSpryker\Glue\BrandCustomersRestApi\Dependency\Client\BrandCustomersRestApiToBrandCustomerClientInterface;
use FondOfSpryker\Glue\BrandCustomersRestApi\Processor\Expander\CustomerExpanderInterface;
use Spryker\Glue\Kernel\Container;

class BrandCustomersRestApiFactoryTest extends Unit
{
    /**
     * @var \FondOfSpryker\Glue\BrandCustomersRestApi\BrandCustomersRestApiFactory
     */
    protected $brandCustomersRestApiFactory;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Spryker\Glue\Kernel\Container
     */
    protected $containerMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\FondOfSpryker\Glue\BrandCustomersRestApi\Dependency\Client\BrandCustomersRestApiToBrandCustomerClientInterface
     */
    protected $brandCustomersRestApiToBrandCustomerClientInterfaceMock;

    /**
     * @return void
     */
    protected function _before(): void
    {
        parent::_before();

        $this->containerMock = $this->getMockBuilder(Container::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->brandCustomersRestApiToBrandCustomerClientInterfaceMock = $this->getMockBuilder(BrandCustomersRestApiToBrandCustomerClientInterface::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->brandCustomersRestApiFactory = new BrandCustomersRestApiFactory();
        $this->brandCustomersRestApiFactory->setContainer($this->containerMock);
    }

    /**
     * @return void
     */
    public function testCreateCustomerExpander(): void
    {
        $this->containerMock->expects($this->atLeastOnce())
            ->method('has')
            ->willReturn(true);

        $this->containerMock->expects($this->atLeastOnce())
            ->method('get')
            ->with(BrandCustomersRestApiDependencyProvider::CLIENT_BRAND_CUSTOMER)
            ->willReturn($this->brandCustomersRestApiToBrandCustomerClientInterfaceMock);

        $this->assertInstanceOf(CustomerExpanderInterface::class, $this->brandCustomersRestApiFactory->createCustomerExpander());
    }
}
