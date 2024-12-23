<?php

namespace Class_Related_Posts;

class Class_Related_Posts
{
    public function __construct()
    {
        add_filter('the_content', array($this, 'related_post_the_content'));
    }

    public function related_post_the_content($contents)
    {
        global $post;

        if ($post->post_type != 'post') {
            return $contents;
        }

        $categories = wp_get_post_categories(get_the_ID());

        if (empty($categories)) {
            return $contents; // Return content unchanged if no categories.
        }

        $Related_Posts = get_posts(array(
            'post_type'      => 'post',
            'posts_per_page' => 5,
            'category__in'   => $categories,
            'post__not_in'   => array(get_the_ID()),
            'orderby'        => 'rand',
        ));

        if ($Related_Posts) {
            ob_start();
            ?>
            <div class="related-posts">
                <h3>Related Posts</h3>
                <ul>
                    <?php foreach ($Related_Posts as $Related_Post) : ?>
                        <li>
                            <a href="<?php echo esc_url(get_permalink($Related_Post->ID)); ?>">
                                <?php
                                // Display post thumbnail if available.
                                if (has_post_thumbnail($Related_Post->ID)) {
                                    echo get_the_post_thumbnail($Related_Post->ID, 'thumbnail', array('alt' => esc_attr($Related_Post->post_title)));
                                }
                                ?>
                                <h4><?php echo esc_html($Related_Post->post_title); ?></h4>
                            </a>
                            <p><?php echo esc_html(wp_trim_words($Related_Post->post_content, 20, '...')); ?></p>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <?php
            $contents .= ob_get_clean();
        }

        return $contents;
    }
}
