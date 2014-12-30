<?php
/**
 * @copyright Copyright (c) 2014 X.commerce, Inc. (http://www.magentocommerce.com)
 */

namespace Magento\Catalog\Test\Constraint;

use Magento\Catalog\Test\Page\Product\CatalogProductView;
use Mtf\Client\BrowserInterface;
use Mtf\Constraint\AbstractConstraint;
use Mtf\Fixture\FixtureInterface;

/**
 * Class AssertProductInStock
 */
class AssertProductInStock extends AbstractConstraint
{
    /* tags */
    const SEVERITY = 'low';
    /* end tags */

    /**
     * Text value for checking Stock Availability
     */
    const STOCK_AVAILABILITY = 'in stock';

    /**
     * Assert that In Stock status is displayed on product page
     *
     * @param CatalogProductView $catalogProductView
     * @param BrowserInterface $browser
     * @param FixtureInterface $product
     * @return void
     */
    public function processAssert(
        CatalogProductView $catalogProductView,
        BrowserInterface $browser,
        FixtureInterface $product
    ) {
        // TODO fix initialization url for frontend page
        $browser->open($_ENV['app_frontend_url'] . $product->getUrlKey() . '.html');
        \PHPUnit_Framework_Assert::assertEquals(
            self::STOCK_AVAILABILITY,
            $catalogProductView->getViewBlock()->stockAvailability(),
            'Control "' . self::STOCK_AVAILABILITY . '" is not visible.'
        );
    }

    /**
     * Returns a string representation of the object
     *
     * @return string
     */
    public function toString()
    {
        return 'In stock control is visible.';
    }
}
