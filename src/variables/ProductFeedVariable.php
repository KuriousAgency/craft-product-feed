<?php
/**
 * Product Feed plugin for Craft CMS 3.x
 *
 * Craft CMS plugin for processing large product feeds via the console
 *
 * @link      https://kurious.agency
 * @copyright Copyright (c) 2019 Kurious Agency
 */

namespace kuriousagency\productfeed\variables;

use kuriousagency\productfeed\ProductFeed;

use Craft;

/**
 * @author    Kurious Agency
 * @package   ProductFeed
 * @since     1.0.0
 */
class ProductFeedVariable
{
    // Public Methods
    // =========================================================================

    /**
     * @param null $optional
     * @return string
     */
    public function getFeed()
    {
		if(Craft::$app->cache->get('productFeed')) {
			return Craft::$app->cache->get('productFeed');
		}

		return "";
	}
	
	public function getPrice($element)
	{
		
		$price = null;
		
		if(get_class($element) === Variant::class) {
			
			$price = $element->price;
			
			try {
				$price = $element->salePrice;
			} catch(\Exception $e) {

			}
		} elseif(get_class($element) == Product::class) {

			$price = $element->defaultVariant->price;

			try {
				$price = $element->defaultVariant->salePrice;
			} catch(\Exception $e) {

			}

		}

		return $price;
	}
}
