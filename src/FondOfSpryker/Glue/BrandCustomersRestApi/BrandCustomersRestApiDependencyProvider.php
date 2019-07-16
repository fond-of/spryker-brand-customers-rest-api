<?php

namespace FondOfSpryker\Glue\BrandCustomersRestApi;

use FondOfSpryker\Glue\BrandCustomersRestApi\Dependency\Client\BrandCustomersRestApiToBrandCustomerClientBridge;
use Spryker\Glue\Kernel\AbstractBundleDependencyProvider;
use Spryker\Glue\Kernel\Container;

class BrandCustomersRestApiDependencyProvider extends AbstractBundleDependencyProvider
{
    public const CLIENT_BRAND_CUSTOMER = 'CLIENT_BRAND_CUSTOMER';

    /**
     * @param \Spryker\Glue\Kernel\Container $container
     *
     * @return \Spryker\Glue\Kernel\Container
     */
    public function provideDependencies(Container $container): Container
    {
        $container = parent::provideDependencies($container);

        $container = $this->addBrandCustomerClient($container);

        return $container;
    }

    /**
     * @param \Spryker\Glue\Kernel\Container $container
     *
     * @return \Spryker\Glue\Kernel\Container
     */
    protected function addBrandCustomerClient(Container $container): Container
    {
        $container[static::CLIENT_BRAND_CUSTOMER] = function (Container $container) {
            return new BrandCustomersRestApiToBrandCustomerClientBridge(
                $container->getLocator()->brandCustomer()->client()
            );
        };

        return $container;
    }
}
