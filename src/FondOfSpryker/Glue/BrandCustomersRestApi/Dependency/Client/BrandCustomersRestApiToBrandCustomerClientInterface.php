<?php

namespace FondOfSpryker\Glue\BrandCustomersRestApi\Dependency\Client;

use Generated\Shared\Transfer\CustomerTransfer;

interface BrandCustomersRestApiToBrandCustomerClientInterface
{
    /**
     * @param \Generated\Shared\Transfer\CustomerTransfer $customerTransfer
     *
     * @return \Generated\Shared\Transfer\CustomerTransfer
     */
    public function expandCustomer(CustomerTransfer $customerTransfer): CustomerTransfer;
}
