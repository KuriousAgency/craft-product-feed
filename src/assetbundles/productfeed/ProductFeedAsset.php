<?php
/**
 * Product Feed plugin for Craft CMS 3.x
 *
 * Craft CMS plugin for processing large product feeds via the console
 *
 * @link      https://kurious.agency
 * @copyright Copyright (c) 2019 Kurious Agency
 */

namespace kuriousagency\productfeed\assetbundles\ProductFeed;

use Craft;
use craft\web\AssetBundle;
use craft\web\assets\cp\CpAsset;

/**
 * @author    Kurious Agency
 * @package   ProductFeed
 * @since     1.0.0
 */
class ProductFeedAsset extends AssetBundle
{
    // Public Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public function init()
    {
        $this->sourcePath = "@kuriousagency/productfeed/assetbundles/productfeed/dist";

        $this->depends = [
            CpAsset::class,
        ];

        $this->js = [
            'js/ProductFeed.js',
        ];

        $this->css = [
            'css/ProductFeed.css',
        ];

        parent::init();
    }
}
