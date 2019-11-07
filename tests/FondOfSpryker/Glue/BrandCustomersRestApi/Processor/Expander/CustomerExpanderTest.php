<?php

namespace FondOfSpryker\Glue\BrandCustomersRestApi\Processor\Expander;

use Codeception\Test\Unit;
use FondOfSpryker\Glue\BrandCustomersRestApi\Dependency\Client\BrandCustomersRestApiToBrandCustomerClientInterface;
use Generated\Shared\Transfer\CustomerTransfer;

class CustomerExpanderTest extends Unit
{
    /**
     * @var \FondOfSpryker\Glue\BrandCustomersRestApi\Processor\Expander\CustomerExpander
     */
    protected $customerExpander;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\FondOfSpryker\Glue\BrandCustomersRestApi\Dependency\Client\BrandCustomersRestApiToBrandCustomerClientInterface
     */
    protected $brandCustomersRestApiToBrandCustomerClientInterfaceMock;

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

        $this->brandCustomersRestApiToBrandCustomerClientInterfaceMock = $this->getMockBuilder(BrandCustomersRestApiToBrandCustomerClientInterface::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->customerTransferMock = $this->getMockBuilder(CustomerTransfer::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->customerExpander = new CustomerExpander($this->brandCustomersRestApiToBrandCustomerClientInterfaceMock);
    }

    /**
     * @return void
     */
    public function testExpand(): void
    {
        $this->assertInstanceOf(CustomerTransfer::class, $this->customerExpander->expand($this->customerTransferMock));
    }
}
