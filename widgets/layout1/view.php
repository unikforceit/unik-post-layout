<?php
$settings = $this->get_settings_for_display();
$per_page = $settings['posts_per_page'];
$id = $settings['id_query'];

$img_size = $settings['img_size'];
if(isset($settings['cs_img_size']['size'])){
    $cs_img_size = $settings['cs_img_size']['size'];
}
if ($img_size == 'custom'){
    $size = [$cs_img_size, $cs_img_size];
}else{
    $size = $settings['img_size'];
}

if ($settings['query_type'] == 'category'){
    $cat = $settings['cat_query'];
}
if ($settings['query_type'] == 'post_tag'){
    $cat = $settings['tag_query'];
}


if($settings['query_type'] == 'category'){
    $query_args = array(
        'post_type' => 'post',
        'posts_per_page' => $per_page,
        'tax_query' => array(
            array(
                'taxonomy' => 'category',
                'field' => 'term_id',
                'terms' => $cat,
            ) ,
        ) ,
    );
}
if($settings['query_type'] == 'post_tag'){
    $query_args = array(
        'post_type' => 'post',
        'posts_per_page' => $per_page,
        'tax_query' => array(
            array(
                'taxonomy' => 'post_tag',
                'field' => 'term_id',
                'terms' => $cat,
            ) ,
        ) ,
    );
}

if($settings['query_type'] == 'individual'){
    $query_args = array(
        'post_type' => 'post',
        'posts_per_page' => $per_page,
        'post__in' => $id,
        'orderby' => 'post__in'
    );
}

$wp_query = new \WP_Query($query_args);



echo '<!-- Start of service section
	============================================= -->
	<section id="post-style-1" class="post-style-1">';
            if( $wp_query->have_posts() ) {
                while( $wp_query->have_posts() ) {
                    $wp_query->the_post();
                    echo '<article class="' . unikpostlayout_post_class() . '">
									<div class="post1-img">';
                                        if (has_post_thumbnail()) {
                                            the_post_thumbnail($size);
                                        }
                      echo '</div>
									<div class="post1-content-wrapper position-relative">
									<div class="post1-auth-cat">
                                        <div class="post1-category position-absolute">
                                        '.unikpostlayout_get_category_link(' ').'
                                        </div>
                                         <div class="post1-author-info position-absolute">
                                            <a href="'. get_author_posts_url( get_the_author_meta( 'ID' ) ) .'">'.get_avatar( get_the_author_meta( 'ID' ), 40 ).' <span>'.esc_html('by ') . get_the_author_meta( 'display_name' ).'</span></a>
                                        </div>
                                    </div>
                                        <div class="post1-title">
                                            <h3><a href="' . get_the_permalink() . '">' . get_the_title() . '</a></h3>
                                        </div>
                                          <div class="post1-excerpt">
                                            <p>'.wp_trim_words(get_the_content(),  $settings['trim']['size']).'</p>
                                        </div>
                                       <div class="post1-meta  d-flex">
                                        <div class="post1-comment">
                                        <i class="far fa-comments"></i> '. unikpostlayout_comment() .'
                                        </div>
                                          <div class="post1-post-date">
                                                <i class="fas fa-calendar-alt"></i> '.get_the_date( ' F j, Y' ).'
                                           </div>                                      
                                    </div>
                                         
                                     </div>
						</article>';
                        }
                        wp_reset_postdata();
                    }
           echo'
	</section>				
<!-- End of service section
	============================================= -->';
