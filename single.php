<?php 
    get_header(); 
    $stylesheetDir = get_bloginfo( 'stylesheet_directory' );

?>
    <div id="postsContainer" class="container">
        <?php while(have_posts()) : the_post(); ?>
            <article class="row">
                <div class="metadata twocol">
                    <time pubdate date="<?php the_time("Y-m-d") ?>" class="datetime"><?php the_time(get_option('date_format')); ?><br/><?php the_time() ?></time>
                    <div class="categories"><?php the_category(', ') ?></div>
                </div>
                <div id="post-<?php echo the_ID() ?>" <?php post_class('post eightcol') ?>>
                    <?php the_content(); ?>
                </div>
                <div class="twocol last postLinks">
                    <div class="permalink"><a href="<?php the_permalink() ?>">(Permalink)</a></div>
                    <?php 
                        $commentsNumber = get_comments_number();
                        $commentNumberText = $commentsNumber > 0
                            ? number_format_i18n($commentsNumber)
                          . " comentario"
                          . ($commentsNumber > 1 ? "s" : "")
                      : "Sin comentarios a�n.";     
                    ?>
                    <div class="share"></div>
                    <script type="text/javascript">
                        var configuration = {
                            url: "<?php the_permalink() ?>",
                            title: "<?php the_title() ?>"
                        };
                        addthis.button('.share', configuration);
                    </script>
                    <div class="commentCount"><a href="<?php the_permalink() ?>#comments"><?php echo $commentNumberText ?></a></div>
                    <div class="tags"><p><?php 
                  echo get_the_tags()
                  ? the_tags()
                  : "(Sin tags)";
                    ?></p></div>
                </div>
            </article>
            <?php 
              comments_template(); 
              endwhile; // while (have_posts())
        ?>
    </div>
<?php get_footer(); ?>