<?php
/**
* Template Name: Home Page
*
* This is the template that displays Home page by default.
* Please note that this is the WordPress construct of pages
* and that other 'pages' on your WordPress site may use a
* different template.
*
* @link https://codex.wordpress.org/Template_Hierarchy
*
* @package Blogdemo
*/
get_header(); ?>
<!-- Set up your HTML -->
<div class="owl-carousel home-page-carousel owl-theme">
  <?php
  
  $args= array(
  'numberposts' => 11,
  'order' => 'DESC',
  'orderby' => 'date',
  'category_name' => 'slider',
  );
  // The Query
  $the_query = new WP_Query( $args );
  
  // The Loop
  if ( $the_query->have_posts() ) {
  
  while ( $the_query->have_posts() ) { ?>
  <div class="slide">
    <?php
    $the_query->the_post();
    if ( has_post_thumbnail() ) {
      the_post_thumbnail();
      ?>
        <?php
        } ?>
        </div><!-- slide -->
        <?php
        }
        /* Restore original Post Data */
        wp_reset_postdata();
        } else {
        // no posts found
        }
        ?>
        </div><!-- homepage-carousel -->
        <div id="primary" class="content-area">
          <main id="main" class="site-main">
            <div class="clearfix"></div>
            <?php
            $args= array(
            'numberposts' => 11,
            'order' => 'DESC',
            'orderby' => 'date',
            'category_name' => 'home-page',
            );
            // The Query
            $the_query = new WP_Query( $args );
            
            // The Loop
            if ( $the_query->have_posts() ) {
              $count=0;
              while ( $the_query->have_posts() ) { ?>
                <?php if($count == 0 || $count == 9){?>
                <div class="outer-container">
                <div class="container">
                <?php } elseif($count == 2){?>
                <div class="container">
                <?php } ?>
                <?php if($count<2): ?>  
                <div class="single-post home-page one-half">
                <?php elseif($count<3): ?>
                <div class="single-post home-page full">
                <?php elseif($count<9): ?>
                <div class="single-post home-page one-third">
                <?php else: ?>
                <div class="single-post home-page one-half">          
                
                <?php endif; ?>
                <!-- for_large_post -->
                <?php if($count == 2){?>
                <?php $the_query->the_post(); ?>
                <?php if ( has_post_thumbnail() ) :?>
                <div class="image-large">
                <?php the_post_thumbnail();
                endif;
                $categories = get_the_category();
                            
                if (count( $categories )>=0) {
                $length = count($categories);
                for($i = 0; $i<$length;$i++){
                if($categories[$i]->name!="Home Page" && $categories[$i]->name != "Slider" ){ ?>
                <div class="meta cat-name <?php echo $categories[$i] -> name;?>">
                <?php echo esc_html( $categories[$i] -> name ); break; } } ?>
                </div><!-- meta cat-name -->
                <div class="large-contents">
                <?php the_title();?>
                <?php the_excerpt(); ?>
                </div><!-- large-contents -->
                <div class="date-n-author-large">
                <?php the_time('j F, Y') ?> |
                <?php the_author(); ?>
                </div><!-- date-n-author-large -->
                </div><!-- image-large -->
                </div><!-- large-post -->
                <?php } } //for_all_posts
                else{
                                  
                                  $the_query->the_post(); ?>
                                  <?php if ( has_post_thumbnail() ) {?>
                                  <div class="image-thumbs">
                                    <?php
                                    the_post_thumbnail();
                                    } ?>
                                    <?php
                                    $categories = get_the_category();
                                    
                                    if (count( $categories )>=0) { ?>
                                    <?php
                                    $length = count($categories);
                                    for($i = 0; $i<$length;$i++){
                                    if($categories[$i]->name!="Home Page" && $categories[$i]->name != "Slider" ){
                                    ?>
                                    <div class="meta cat-name <?php echo $categories[$i] -> name;?>">
                                      <?php
                                      echo esc_html( $categories[$i] -> name );
                                      
                                      }
                                      }
                                      ?>
                                      </div><!-- meta cat-name -->
                                      </div><!-- image-thumbs -->
                                      <?php the_excerpt(); ?>
                                      <?php the_time('j F, Y') ?> |
                                      <?php the_author(); ?>
                                      </div><!-- single-post -->
                                      <?php if($count == 1 || $count == 10){?>
                                      </div> <!-- container -->
                                      </div> <!-- outer-container -->
                                      
                                      <?php
                                      }elseif($count==8){
                                      ?>
                                      </div><!-- container -->
                                      <?php
                                      }
                                      ?>
                                      
                                      <?php }
                                      }?>
                                      <?php
                                      $count++;
                                      if( $count == 2 || $count == 3|| $count == 6 || $count == 9|| $count == 11){
                                      ?>
                                      <div class="clearfix"></div><!-- clearfix -->
                                      <?php
                                      }
                                      }
                                      
                                      /* Restore original Post Data */
                                      wp_reset_postdata();
                                      } else {
                                      // no posts found
                                      }
                                      ?>
                                      
                                      <div class="clearfix"> </div>
                                      <?php
                                      echo do_shortcode('[contact-form-7 id="77" title="Contact form 1"]');
                                      ?>
                                      </main><!-- #main -->
                                      </div><!-- #primary -->
                                      <div class="footer-social social-icon"><?php
                                        $social=array('social_facebook','social_twitter','social_youtube','social_linkedin','social_gplus','social_yelp','social_angieslist','social_bbb','social_gbl','social_custom1','social_custom2','social_custom3','social_custom4');
                                        foreach ($social as $soc):
                                        if( get_option($soc) !=""): ?>
                                        <a href="<?php echo get_option($soc); ?>" target="_blank" class="<?php echo $soc; ?>"></a>
                                        <?php
                                        endif;
                                        endforeach;
                                        ?>
                                      </div>
                                      <?php
                                      get_footer();