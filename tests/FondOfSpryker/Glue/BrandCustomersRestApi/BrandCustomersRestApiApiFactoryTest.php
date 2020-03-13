<?php

namespace FondOfSpryker\Glue\BrandCompanyUsersRestApi;

use Codeception\Test\Unit;
use FondOfSpryker\Glue\BrandCustomersRestApi\BrandCustomersRestApiDependencyProvider;
use FondOfSpryker\Glue\BrandCustomersRestApi\BrandCustomersRestApiFactory;
use FondOfSpryker\Glue\BrandCustomersRestApi\Dependency\Client\BrandCustomersRestApiToBrandCustomerClientInterface;
use FondOfSpryker\Glue\BrandCustomersRestApi\Processor\Expander\CustomerExpanderInterface;
use Spryker\Glue\Kernel\Container;

class BrandCustomersRestApiApiFactoryTest extends Unit
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
     * @var \PHPUnit\Framework\MockObject\MockObject|\FondOfSpryker\Client\BrandCustomer\BrandCustomerClientInterface
     */
    protected $brandCustomerClientInterfaceMock;

    /**
     * @return void
     */
    protected function _before(): void
    {
        parent::_before();

        $this->containerMock = $this->getMockBuilder(Container::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->brandCustomerClientInterfaceMock = $this->getMockBuilder(BrandCustomersRestApiToBrandCustomerClientInterface::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->brandCustomersRestApiFactory = new BrandCustomersRestApiFactory();
        $this->brandCustomersRestApiFactory->setContainer($this->containerMock);
    }

    /**
     * @return void
     */
   /* public function testCreateBrandsCustomerResourceRelationshipExpander(): void
    {
        $this->assertInstanceOf(
            BrandsCustomersResourceRelationshipExpanderInterface::class,
            $this->brandCustomersRestApiFactory->createBrandsCustomersResourceRelationshipExpander()
        );
    }*/

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
            ->willReturn($this->brandCustomerClientInterfaceMock);

        $this->assertInstanceOf(
            CustomerExpanderInterface::class,
            $this->brandCustomersRestApiFactory->createCustomerExpander()
        );
    }

    /**
     * @return void
     */
    public function testGetBrandCustomerClient(): void
    {
        $this->containerMock->expects($this->atLeastOnce())
            ->method('has')
            ->willReturn(true);

        $this->containerMock->expects($this->atLeastOnce())
            ->method('get')
            ->with(BrandCustomersRestApiDependencyProvider::CLIENT_BRAND_CUSTOMER)
            ->willReturn($this->brandCustomerClientInterfaceMock);

        $this->assertInstanceOf(
            BrandCustomersRestApiToBrandCustomerClientInterface::class,
            $this->brandCustomersRestApiFactory->getBrandCustomerClient()
        );
    }
}
