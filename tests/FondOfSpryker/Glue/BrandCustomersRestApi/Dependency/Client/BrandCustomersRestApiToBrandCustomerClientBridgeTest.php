<?php

namespace FondOfSpryker\Glue\BrandCustomersRestApi\Dependency\Client;

use Codeception\Test\Unit;
use FondOfSpryker\Client\BrandCustomer\BrandCustomerClientInterface;
use Generated\Shared\Transfer\CustomerTransfer;

class BrandCustomersRestApiToBrandCustomerClientBridgeTest extends Unit
{
    /**
     * @var \FondOfSpryker\Glue\BrandCustomersRestApi\Dependency\Client\BrandCustomersRestApiToBrandCustomerClientBridge
     */
    protected $brandCustomersRestApiToBrandCustomerClientBridge;

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

        $this->brandCustomerClientInterfaceMock = $this->getMockBuilder(BrandCustomerClientInterface::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->customerTransferMock = $this->getMockBuilder(CustomerTransfer::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->brandCustomersRestApiToBrandCustomerClientBridge = new BrandCustomersRestApiToBrandCustomerClientBridge(
            $this->brandCustomerClientInterfaceMock
        );
    }

    /**
     * @return void
     */
    public function testExpandCustomer(): void
    {
        $this->brandCustomerClientInterfaceMock->expects($this->atLeastOnce())
            ->method('expandCustomer')
            ->willReturn($this->customerTransferMock);

        $this->assertInstanceOf(CustomerTransfer::class, $this->brandCustomersRestApiToBrandCustomerClientBridge->expandCustomer(
            $this->customerTransferMock
        ));
    }
}
