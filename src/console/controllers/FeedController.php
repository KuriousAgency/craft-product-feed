<?php
/**
 * Product Feed plugin for Craft CMS 3.x
 *
 * Craft CMS plugin for processing large product feeds via the console
 *
 * @link      https://kurious.agency
 * @copyright Copyright (c) 2019 Kurious Agency
 */

namespace kuriousagency\productfeed\console\controllers;

use kuriousagency\productfeed\ProductFeed;

use Craft;
use yii\console\Controller;
use yii\helpers\Console;

/**
 * Default Command
 *
 * @author    Kurious Agency
 * @package   ProductFeed
 * @since     1.0.0
 */
class FeedController extends Controller
{
    // Public Methods
    // =========================================================================

    /**
     * Handle product-feed/default console commands
     *
     * @return mixed
     */
    public function actionRun()
    {
		
		$template = ProductFeed::$plugin->getSettings()->template;

		if(!$template) {
			$error = $this->ansiFormat("Error: Please set a template before running the feed\n", Console::FG_RED);
			exit($error);
		}
		
		$view = Craft::$app->getView();
		$oldTemplateMode = $view->getTemplateMode();
		$view->setTemplateMode($view::TEMPLATE_MODE_SITE);

		// Does the template exist?
		if(Craft::$app->getView()->doesTemplateExist($template)) {
			$html = $view->renderTemplate($template);
			Craft::$app->cache->set('productFeed', $html, 172800); //expire after 2 days
		}
		
		// Restore the original template mode
		$view->setTemplateMode($oldTemplateMode);

		exit("Finished");
    }
}
