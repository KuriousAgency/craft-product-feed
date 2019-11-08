<?php
/**
 * Product Feed plugin for Craft CMS 3.x
 *
 * Craft CMS plugin for processing large product feeds via the console
 *
 * @link      https://kurious.agency
 * @copyright Copyright (c) 2019 Kurious Agency
 */

namespace kuriousagency\productfeed\models;

use kuriousagency\productfeed\ProductFeed;

use Craft;
use craft\base\Model;

/**
 * @author    Kurious Agency
 * @package   ProductFeed
 * @since     1.0.0
 */
class Settings extends Model
{
    // Public Properties
    // =========================================================================

    /**
     * @var string
     */
    public $template = '';

    // Public Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['template', 'required'],
        ];
    }
}
