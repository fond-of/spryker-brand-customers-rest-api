<?php

namespace FondOfSpryker\Glue\BrandCustomersRestApi\Plugin\GlueApplicationExtension;

use FondOfSpryker\Glue\BrandCustomersRestApi\BrandCustomersRestApiConfig;
use Spryker\Glue\GlueApplication\Rest\Request\Data\RestRequestInterface;
use Spryker\Glue\GlueApplicationExtension\Dependency\Plugin\ResourceRelationshipPluginInterface;
use Spryker\Glue\Kernel\AbstractPlugin;

/**
 * @method \FondOfSpryker\Glue\BrandCustomersRestApi\BrandCustomersRestApiFactory getFactory()
 */
class BrandsCustomersResourceRelationshipPlugin extends AbstractPlugin implements ResourceRelationshipPluginInterface
{
    /**
     * @api
     *
     * {@inheritdoc}
     *
     * @param \Spryker\Glue\GlueApplication\Rest\JsonApi\RestResourceInterface[] $resources
     * @param \Spryker\Glue\GlueApplication\Rest\Request\Data\RestRequestInterface $restRequest
     *
     * @return void
     */
    public function addResourceRelationships(array $resources, RestRequestInterface $restRequest): void
    {
        $this->getFactory()->createBrandsCustomersResourceRelationshipExpander()
            ->addResourceRelationships($resources, $restRequest);
    }

    /**
     * @api
     *
     * {@inheritdoc}
     *
     * @return string
     */
    public function getRelationshipResourceType(): string
    {
        return BrandCustomersRestApiConfig::RESOURCE_BRANDS;
    }
}
