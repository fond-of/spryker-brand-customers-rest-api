<?php

namespace FondOfSpryker\Glue\BrandCustomersRestApi\Processor\Expander;

use FondOfSpryker\Glue\BrandCustomersRestApi\BrandCustomersRestApiConfig;
use Generated\Shared\Transfer\CustomerTransfer;
use Generated\Shared\Transfer\RestBrandsResponseAttributesTransfer;
use Spryker\Glue\GlueApplication\Rest\JsonApi\RestResourceBuilderInterface;
use Spryker\Glue\GlueApplication\Rest\Request\Data\RestRequestInterface;

class BrandsCustomersResourceRelationshipExpander implements BrandsCustomersResourceRelationshipExpanderInterface
{
    /**
     * @var \Spryker\Glue\GlueApplication\Rest\JsonApi\RestResourceBuilderInterface
     */
    protected $restResourceBuilder;

    /**
     * @param \Spryker\Glue\GlueApplication\Rest\JsonApi\RestResourceBuilderInterface $restResourceBuilder
     */
    public function __construct(RestResourceBuilderInterface $restResourceBuilder)
    {
        $this->restResourceBuilder = $restResourceBuilder;
    }

    /**
     * @param \Spryker\Glue\GlueApplication\Rest\JsonApi\RestResourceInterface[] $resources
     * @param \Spryker\Glue\GlueApplication\Rest\Request\Data\RestRequestInterface $restRequest
     *
     * @return void
     */
    public function addResourceRelationships(array $resources, RestRequestInterface $restRequest): void
    {
        foreach ($resources as $resource) {
            $payload = $resource->getPayload();

            if ($payload === null || !($payload instanceof CustomerTransfer)) {
                continue;
            }

            $brandCollectionTransfer = $payload->getBrandCollection();

            if ($brandCollectionTransfer === null) {
                continue;
            }

            $brandTransfers = $brandCollectionTransfer->getBrands();

            if ($brandTransfers->count() === 0) {
                continue;
            }

            foreach ($brandTransfers as $brandTransfer) {
                $restBrandsResponseAttributesTransfer = (new RestBrandsResponseAttributesTransfer())->fromArray(
                    $brandTransfer->toArray(),
                    true
                );

                $brandResource = $this->restResourceBuilder->createRestResource(
                    BrandCustomersRestApiConfig::RESOURCE_BRANDS,
                    $brandTransfer->getUuid(),
                    $restBrandsResponseAttributesTransfer
                );

                $resource->addRelationship($brandResource);
            }
        }
    }
}
