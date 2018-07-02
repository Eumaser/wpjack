<?php // Search page. See http://codex.wordpress.org/Creating_a_Search_Page for more information. ?>    

<?php get_header(); ?>

<div class="container">
    <h1><?php printf( __( 'Search Results for: %s' ), '<span>' . get_search_query() . '</span>'); ?></h1>
    <?php if (have_posts()) :
    while (have_posts()) : the_post(); ?>
    <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a><br>
<?php endwhile;
endif; ?>
</div>

<?php get_footer(); ?>