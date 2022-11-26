<?php
/**
 * Template part for displaying posts
 *
 * @link https://artistudio.xyz
 */

/** Global Variable */
global $post;

/** Get Post & Featured Image */
$post->featured = get_the_post_thumbnail_url($post->ID, 'full');
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <?php get_template_part('template-parts/elements/section-hero-heading', null, []) ?>

    <div class="container mx-auto md:-mt-32 relative">

        <?php if($post->featured){ ?>
            <div class="mx-auto text-center pt-0 md:pt-4 pb-10 relative w-full max-w-5xl md:-mt-44">
                <img src="<?php echo esc_url( $post->featured ) ?>"
                     class="post-featured-image mx-auto bg-white md:shadow-md"
                     alt="<?php echo esc_attr( $post->post_title ) ?>">
            </div>
        <?php } else { ?>
            <div class="mx-auto text-center py-6 relative w-full max-w-5xl">
            </div>
        <?php } ?>

        <div class="max-w-4xl mx-auto">
            <h1 class="font-bold text-4xl px-6 md:px-2 md:text-4xl text-gray-800">
                <?php if($post->post_status!='publish'): ?>
                    <i class="fas fa-lock"></i>
                <?php endif; ?>
                <?php echo esc_attr( $post->post_title ) ?>
            </h1>
            <div class="post-info max-w-prose content-center overflow-hidden px-6 md:px-2 pt-6 mb-6 text-sm md:text-md">
                <div class="pr-3 overflow-hidden lg:my-1 text-gray-400 border-r border-gray-200 inline-block">
                    <?php echo esc_attr( date('M j, Y', strtotime($post->post_modified)) ) ?>
                </div>
                <div class="px-3 overflow-hidden lg:my-1 text-gray-400 border-r border-gray-200 inline-block">
                    <?php $typeUrl = ($post->post_type=='docs') ? '/docs' : '/blog'; ?>
                    <a href="<?php echo esc_url( home_url() . $typeUrl ) ?>">
                        <?php echo esc_html ( ucwords($post->post_type) ) ?>
                    </a>
                </div>
                <?php
                    $categories = [];
                    if($post->post_type=='docs'){
                        $ancestors = get_post_ancestors(get_the_ID());
                        $ancestors = array_reverse($ancestors);
                        /** Get  Title */
                        $data = isset($ancestors[0]) ? get_post($ancestors[0]) : $post;
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
                    <div class="px-3 overflow-hidden lg:my-1 text-gray-400 border-r border-gray-200 inline-block">
                        <?php foreach($categories as $category): ?>
                            <a href="<?php echo esc_url( $category['url'] ) ?>">
                                <?php echo esc_html( $category['name'] ) ?>
                            </a>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
                <div class="px-3 overflow-hidden lg:my-1 inline-block">
                    <?php
                        $user = get_userdata($post->post_author);
                        $user = isset($user->data) ? $user->data : $user;
                        $user->link = get_author_posts_url($post->post_author);
                        $user->label = sprintf("%s", ucwords($user->display_name));
                    ?>
                    <a href="<?php echo esc_url($user->link) ?>" class="text-gray-400" style="text-decoration: none;">
                        <?php echo esc_html($user->label) ?>
                    </a>
                </div>
            </div>
        </div>

        <div class="max-w-4xl mx-auto overflow-hidden">
            <div class="prose max-w-none entry-content overflow-hidden px-8 lg:my-2 lg:px-2 w-full">

                <div class="py-4 border-t border-gray-200">
                    
                    <div class="single-content-container">
                        <?php the_content(); ?>
                    </div>
                    

                    <div class="inpage-pagination">
                        <?php
                        wp_link_pages(
                            array(
                                'before'   => '<nav class="page-links py-6 text-center" aria-label="' . esc_attr__( 'Page', 'bingopress' ) . '">',
                                'after'    => '</nav>',
                                'pagelink' => esc_html__( '%', 'bingopress' ),
                            )
                        );
                        ?>
                    </div>

                    <?php if ( has_tag() ) : ?>
                        <div class="single_post_tags post-tags">
                            <?php the_tags('<b>Tags : </b><br>', ' ' ); ?>
                        </div>
                    <?php endif; ?>
                    
                </div>
                <?php dynamic_sidebar( 'bingopress-single-content-widget' ) ?>
            </div>
        </div>
    </div>

</article><!-- #post-<?php the_ID(); ?> -->
