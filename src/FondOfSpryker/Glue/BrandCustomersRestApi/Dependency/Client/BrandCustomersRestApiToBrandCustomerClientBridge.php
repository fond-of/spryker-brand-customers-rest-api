<?php

namespace FondOfSpryker\Glue\BrandCustomersRestApi\Dependency\Client;

use FondOfSpryker\Client\BrandCustomer\BrandCustomerClientInterface;
use Generated\Shared\Transfer\CustomerTransfer;

class BrandCustomersRestApiToBrandCustomerClientBridge implements BrandCustomersRestApiToBrandCustomerClientInterface
{
    /**
     * @var \FondOfSpryker\Client\BrandCustomer\BrandCustomerClientInterface
     */
    protected $brandCustomerClient;

    /**
     * @param \FondOfSpryker\Client\BrandCustomer\BrandCustomerClientInterface $brandCustomerClient
     */
    public function __construct(BrandCustomerClientInterface $brandCustomerClient)
    {
        $this->brandCustomerClient = $brandCustomerClient;
    }

    /**
     * @param \Generated\Shared\Transfer\CustomerTransfer $customerTransfer
     *
     * @return \Generated\Shared\Transfer\CustomerTransfer
     */
    public function expandCustomer(CustomerTransfer $customerTransfer): CustomerTransfer
    {
        return $this->brandCustomerClient->expandCustomer($customerTransfer);
    }
}
