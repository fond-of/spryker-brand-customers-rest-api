<?php

namespace FondOfSpryker\Glue\BrandCompanyUsersRestApi\Processor\Expander;

use Codeception\Test\Unit;
use FondOfSpryker\Glue\BrandCustomersRestApi\Dependency\Client\BrandCustomersRestApiToBrandCustomerClientInterface;
use FondOfSpryker\Glue\BrandCustomersRestApi\Processor\Expander\CustomerExpander;
use Generated\Shared\Transfer\CustomerTransfer;
use Spryker\Glue\Kernel\Container;

class CustomerExpanderTest extends Unit
{
    /**
     * @var \FondOfSpryker\Glue\BrandCustomersRestApi\Processor\Expander\CustomerExpander
     */
    protected $customerExpander;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Spryker\Glue\Kernel\Container
     */
    protected $containerMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\FondOfSpryker\Client\BrandCustomer\BrandCustomerClientInterface
     */
    protected $brandCustomerClientInterfaceMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Generated\Shared\Transfer\CustomerTransfer
     */
    protected $customerTransferMock;

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

        $this->customerTransferMock = $this->getMockBuilder(CustomerTransfer::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->customerExpander = new CustomerExpander(
            $this->brandCustomerClientInterfaceMock
        );
    }

    /**
     * @return void
     */
    public function testExpand(): void
    {
        $this->brandCustomerClientInterfaceMock->expects($this->atLeastOnce())
            ->method('expandCustomer')
            ->willReturn($this->customerTransferMock);

        $this->assertInstanceOf(
            CustomerTransfer::class,
            $this->customerExpander->expand($this->customerTransferMock)
        );
    }
}
