<?php

namespace FondOfSpryker\Glue\BrandCustomersRestApi;

use FondOfSpryker\Glue\BrandCustomersRestApi\Dependency\Client\BrandCustomersRestApiToBrandCustomerClientInterface;
use FondOfSpryker\Glue\BrandCustomersRestApi\Processor\Expander\BrandsCustomersResourceRelationshipExpander;
use FondOfSpryker\Glue\BrandCustomersRestApi\Processor\Expander\BrandsCustomersResourceRelationshipExpanderInterface;
use FondOfSpryker\Glue\BrandCustomersRestApi\Processor\Expander\CustomerExpander;
use FondOfSpryker\Glue\BrandCustomersRestApi\Processor\Expander\CustomerExpanderInterface;
use Spryker\Glue\Kernel\AbstractFactory;

class BrandCustomersRestApiFactory extends AbstractFactory
{
    /**
     * @return \FondOfSpryker\Glue\BrandCustomersRestApi\Processor\Expander\BrandsCustomersResourceRelationshipExpanderInterface
     */
    public function createBrandsCustomersResourceRelationshipExpander(): BrandsCustomersResourceRelationshipExpanderInterface
    {
        return new BrandsCustomersResourceRelationshipExpander($this->getResourceBuilder());
    }

    /**
     * @return \FondOfSpryker\Glue\BrandCustomersRestApi\Processor\Expander\CustomerExpanderInterface
     */
    public function createCustomerExpander(): CustomerExpanderInterface
    {
        return new CustomerExpander($this->getBrandCustomerClient());
    }

    /**
     * @throws
     *
     * @return \FondOfSpryker\Glue\BrandCustomersRestApi\Dependency\Client\BrandCustomersRestApiToBrandCustomerClientInterface
     */
    protected function getBrandCustomerClient(): BrandCustomersRestApiToBrandCustomerClientInterface
    {
        return $this->getProvidedDependency(BrandCustomersRestApiDependencyProvider::CLIENT_BRAND_CUSTOMER);
    }
}
