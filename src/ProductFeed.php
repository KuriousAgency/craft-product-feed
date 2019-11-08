<?php
/**
 * Product Feed plugin for Craft CMS 3.x
 *
 * Craft CMS plugin for processing large product feeds via the console
 *
 * @link      https://kurious.agency
 * @copyright Copyright (c) 2019 Kurious Agency
 */

namespace kuriousagency\productfeed;

use kuriousagency\productfeed\variables\ProductFeedVariable;
use kuriousagency\productfeed\models\Settings;

use Craft;
use craft\base\Plugin;
use craft\services\Plugins;
use craft\events\PluginEvent;
use craft\console\Application as ConsoleApplication;
use craft\web\twig\variables\CraftVariable;

use yii\base\Event;

/**
 * Class ProductFeed
 *
 * @author    Kurious Agency
 * @package   ProductFeed
 * @since     1.0.0
 *
 */
class ProductFeed extends Plugin
{
    // Static Properties
    // =========================================================================

    /**
     * @var ProductFeed
     */
    public static $plugin;

    // Public Properties
    // =========================================================================

    /**
     * @var string
     */
    public $schemaVersion = '1.0.0';

    // Public Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
        self::$plugin = $this;

        if (Craft::$app instanceof ConsoleApplication) {
            $this->controllerNamespace = 'kuriousagency\productfeed\console\controllers';
        }

        Event::on(
            CraftVariable::class,
            CraftVariable::EVENT_INIT,
            function (Event $event) {
                /** @var CraftVariable $variable */
                $variable = $event->sender;
                $variable->set('productFeed', ProductFeedVariable::class);
            }
        );

        Event::on(
            Plugins::class,
            Plugins::EVENT_AFTER_INSTALL_PLUGIN,
            function (PluginEvent $event) {
                if ($event->plugin === $this) {
                }
            }
        );

        Craft::info(
            Craft::t(
                'product-feed',
                '{name} plugin loaded',
                ['name' => $this->name]
            ),
            __METHOD__
        );
    }

    // Protected Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    protected function createSettingsModel()
    {
        return new Settings();
    }

    /**
     * @inheritdoc
     */
    protected function settingsHtml(): string
    {
        return Craft::$app->view->renderTemplate(
            'product-feed/settings',
            [
                'settings' => $this->getSettings()
            ]
        );
    }
}
