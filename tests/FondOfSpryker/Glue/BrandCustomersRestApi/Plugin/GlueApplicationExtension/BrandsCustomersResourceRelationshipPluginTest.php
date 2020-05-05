<?php

namespace FondOfSpryker\Glue\BrandCustomersRestApi\Plugin\GlueApplicationExtension;

use Codeception\Test\Unit;
use FondOfSpryker\Glue\BrandCustomersRestApi\BrandCustomersRestApiConfig;

class BrandsCustomersResourceRelationshipPluginTest extends Unit
{
    /**
     * @var \FondOfSpryker\Glue\BrandCustomersRestApi\Plugin\GlueApplicationExtension\BrandsCustomersResourceRelationshipPlugin
     */
    protected $brandsCustomersResourceRelationshipPlugin;

    /**
     * @return void
     */
    protected function _before(): void
    {
        parent::_before();

        $this->brandsCustomersResourceRelationshipPlugin = new BrandsCustomersResourceRelationshipPlugin();
    }

    /**
     * @return void
     */
    public function testGetRelationshipResourceType(): void
    {
        $this->assertSame(BrandCustomersRestApiConfig::RESOURCE_BRANDS, $this->brandsCustomersResourceRelationshipPlugin->getRelationshipResourceType());
    }
}
