<?php get_header(); ?>
<!-- Begin page content -->
<main class="flex-shrink-0">

    <div class="container">
    <div class='row'>
        <div class='col-md-8'>
        <h1>Blog</h1>
        <?php
        if ( have_posts()) {
            while ( have_posts()) {
                the_post();
                ?>
                <article class='blog-entry'>

                <? the_post_thumbnail( 'thumbnail') ?>

                <div class='copy'>
                <h2><a href='<? the_permalink(); ?>'><? the_title(); ?></a></h2>
                <time><? the_date(); ?></time>
                <? the_excerpt(); ?>

                <div class="blogCategories">
                    <span class='label'>Categories:</span>
                    <?php
                        //get all the categoriess the post belongs to
                        $categories = wp_get_post_categories( get_the_ID() );

                        foreach ( $categories as $c ) {
                        //retrieve name
                        $cat_name=get_cat_name($c );

                        //retrieve link
                        $cat_link=get_category_link($c );

                        //print link
                        echo "<a href='$cat_link' class='catLink'>$cat_name</a>";
            
                        }
                    ?>
                </div>
                <p><a href='<? the_permalink(); ?>' class='readmore'>read more</a></p>
                </div>
                </article>
                <?
            } //end while
        } //end if
        ?>
        </div>

        <div class='col-md-4'>
        <?php dynamic_sidebar( "blog-sidebar" ); ?>
        </div>
    </div>
</main>
<?php get_footer(); ?>