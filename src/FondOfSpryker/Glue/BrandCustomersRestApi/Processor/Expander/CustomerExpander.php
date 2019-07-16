<?php

namespace FondOfSpryker\Glue\BrandCustomersRestApi\Processor\Expander;

use FondOfSpryker\Glue\BrandCustomersRestApi\Dependency\Client\BrandCustomersRestApiToBrandCustomerClientInterface;
use Generated\Shared\Transfer\CustomerTransfer;

class CustomerExpander implements CustomerExpanderInterface
{
    /**
     * @var \FondOfSpryker\Glue\BrandCustomersRestApi\Dependency\Client\BrandCustomersRestApiToBrandCustomerClientInterface
     */
    protected $brandCustomerClient;

    /**
     * @param \FondOfSpryker\Glue\BrandCustomersRestApi\Dependency\Client\BrandCustomersRestApiToBrandCustomerClientInterface $brandCustomerClient
     */
    public function __construct(BrandCustomersRestApiToBrandCustomerClientInterface $brandCustomerClient)
    {
        $this->brandCustomerClient = $brandCustomerClient;
    }

    /**
     * @param \Generated\Shared\Transfer\CustomerTransfer $customerTransfer
     *
     * @return \Generated\Shared\Transfer\CustomerTransfer
     */
    public function expand(CustomerTransfer $customerTransfer): CustomerTransfer
    {
        return $this->brandCustomerClient->expandCustomer($customerTransfer);
    }
}
