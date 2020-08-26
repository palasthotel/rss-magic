## RSS Magic

This Plugin works with RSS-Feeds and helps you to show them on your website.

## Recommended services

- [RSS.app](https://rss.app) This can help you to use social media feeds

## Templates

Feed templates are fully customizable. You can use `plugin-parts` folder in your theme or any subfolder in that folder to provide tempaltes or use the plugin filter `rss_magic_template_paths` to add more template folders.

Templates will be looked up with the following naming convention in order top to down.

### Feed template

- rss-magic-feed__`<feedname>`.php
- rss-magic-feed.php

### Feed item template

- rss-magic-feed-item__`<feedname>`--`<source>`.php
- rss-magic-feed-item__`<feedname>`.php
- rss-magic-feed-item--`<source>`.php
- rss-magic-feed-item.php