# Related-Posts Plugin

## Description

The **Related-Posts** plugin enhances user engagement by displaying a list of related posts under each post based on its categories. It improves website navigation by offering readers additional relevant content, thus keeping them engaged longer.

## Features

- Retrieves and displays related posts from the same category as the current post.
- Displays up to **5 related posts** with small thumbnail images.
- Randomizes the order of related posts to provide variety.
- Built with Object-Oriented Programming (OOP) principles.
- Ensures compatibility with WordPress coding standards.
- Fully sanitized and secure output.

## Requirements

- **WordPress Version:** 5.0 or higher
- **PHP Version:** 7.4 or higher

## Installation

1. Download the plugin zip file or clone the repository.
2. Upload the plugin folder to the `/wp-content/plugins/` directory of your WordPress installation.
3. Activate the plugin through the **Plugins** menu in the WordPress admin dashboard.

## Usage

1. Ensure your WordPress site has categories and posts assigned to those categories.
2. Activate the plugin from the WordPress admin panel.
3. Visit any single post page to see related posts displayed at the bottom of the content.

## How It Works

1. The plugin hooks into the `the_content` filter to append related posts under each post's content.
2. It retrieves categories associated with the current post.
3. Queries up to 5 random posts from the same categories, excluding the current post.
4. Displays the related posts with:
   - Post titles linked to the full post.
   - Small thumbnail images for each related post.

## Development

This plugin is developed using modern OOP practices in PHP and adheres to WordPress coding standards.

### File Structure

- `class-related-posts.php`: Main plugin class containing the logic for fetching and displaying related posts.
- `readme.md`: Documentation for the plugin.

## Example Code

```php
add_filter('the_content', array($this, 'add_related_posts'));
