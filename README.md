# Product Feed plugin for Craft CMS 3.x

Craft CMS plugin for processing large product feeds from the console and storing in cache.

## Requirements

This plugin requires Craft CMS 3.0.0-beta.23 or later.

## Installation

To install the plugin, follow these instructions.

1. Open your terminal and go to your Craft project:

        cd /path/to/project

2. Then tell Composer to load the plugin:

        composer require KuriousAgency/product-feed

3. In the Control Panel, go to Settings → Plugins and click the “Install” button for Product Feed.

## Product Feed Overview

Create a cached version of a product feed using a console command. 

## Configuring Product Feed

Enter the path to the template that will be used for the feed.

## Using Product Feed

**To process the feed use the following console command**

`./craft product-feed/feed/run`

**You can now access the cached version of the feed in your template:**

```twig
{{ craft.productFeed.getFeed|raw }}
```

Brought to you by [Kurious Agency](https://kurious.agency)