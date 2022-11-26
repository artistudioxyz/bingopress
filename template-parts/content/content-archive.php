<?php
/**
 * Template part for displaying posts
 *
 * @link https://artistudio.xyz
 */

/** Global Variables */
global $post;

/** Get Post & Featured Image */
$post->featured = get_the_post_thumbnail_url($post->ID, 'full');
?>

<div class="grid-item pb-2">
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <div class="transition-all shadow-md hover:shadow-xl duration-300 bg-white border border-gray-100 rounded-md relative">
            <?php if($post->featured){ ?>
                <div class="mx-auto text-center w-full relative px-4 pt-4">
                    <a href="<?php echo esc_attr(get_permalink($post->ID)) ?>">
                        <img src="<?php echo esc_url($post->featured) ?>"
                             class="grid-featured-image w-full mx-auto bg-white rounded-md"
                             alt="<?php echo esc_attr($post->post_title) ?>">
                    </a>
                </div>
            <?php } ?>
            <div class="overflow-hidden px-4">
                <div class="max-w-none entry-content overflow-hidden lg:my-4 lg:px-2 w-full">
                    <div class="prose mx-auto text-center w-full max-w-4xl">
                        <h3>
                            <a href="<?php echo esc_attr(get_permalink($post->ID)) ?>">
                                <?php echo esc_attr($post->post_title) ?>
                            </a>
                        </h3>
                    </div>
                    <div class="prose post-info mx-auto text-center max-w-prose content-center overflow-hidden">
                        <div class="px-4 py-2 overflow-hidden lg:my-1 lg:px-4 text-gray-400 inline-block text-sm">
                            <span class="pr-2 mr-2 border-r border-gray-200">
                                <?php echo esc_html(date('M j, Y', strtotime($post->post_modified))) ?>
                            </span>
                            <?php
                                $categories = [];
                                if($post->post_type=='docs'){
                                    $ancestors = get_post_ancestors(get_the_ID());
                                    $ancestors = array_reverse($ancestors);
                                    $data = get_post($ancestors[0]);
                                    /** Get Title */
                                    $bingopress_title = (get_field('sidebar_title', $data->ID)) ?
                                        get_field('sidebar_title', $data->ID) : $data->post_name;
                                    $bingopress_title = preg_replace('/[^\p{L}\p{N}\s]/u', ' ', $bingopress_title);
                                    $categories = [
                                        ['url' => get_permalink($data->ID), 'name' => ucwords($bingopress_title)]
                                    ];
                                } else {
                                    $data = get_the_category();
                                    foreach($data as $value){
                                        $tmp = [];
                                        $tmp['url'] = get_term_link($value->term_id);
                                        $tmp['name'] = $value->name;
                                        $categories[] = $tmp;
                                    }
                                }
                            ?>
                            <?php if($categories): ?>
                                <span class="pr-2 mr-2 border-r border-gray-200">
                                    <?php foreach($categories as $category): ?>
                                        <a href="<?php echo esc_attr($category['url']) ?>" style="color: rgba(156, 163, 175, 1);">
                                            <?php echo esc_attr($category['name']) ?>
                                        </a>
                                    <?php endforeach; ?>
                                </span>
                            <?php endif; ?>
                            <span>
                                <?php
                                    $user = get_userdata($post->post_author);
                                    $user = isset($user->data) ? $user->data : $user;
                                ?>
                                <a href="<?php echo esc_attr( get_author_posts_url($post->post_author) ) ?>" class="text-gray-400" style="text-decoration: none;">
                                    <?php echo esc_attr( sprintf("%s", ucwords($user->display_name)) ); ?>
                                </a>
                            </span>
                        </div>
                    </div>

                    <?php if($post->post_content): ?>
                        <div class="prose px-4 pt-4 pb-6 border-t border-gray-200">

                            <?php the_excerpt(); ?>

                            <?php if ( has_tag() ) : ?>
                                <div class="single_post_tags post-tags">
                                    <?php the_tags('<b>Tags : </b><br>', ' ' ); ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>

                </div>
            </div>
        </div>
    </article><!-- #post-<?php the_ID(); ?> -->
</div>