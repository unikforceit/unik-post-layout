<?php
$settings = $this->get_settings_for_display();
$layout = $settings['layout'];

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
	<section id="post-style-2" class="post-style-2">
					';
            if( $wp_query->have_posts() ) {
                $index = 0;
                while( $wp_query->have_posts() ) {
                    $wp_query->the_post();
                    $index++;
                    if ($layout == 'layout1'){
                        if (unikpostlayout_odd_even($index) == 'Even'){
                            $class = 'flex-row-reverse';
                        }else{
                            $class = '';
                        }
                    }elseif ($layout == 'layout2'){
                        $class = 'flex-row-reverse';
                    }else{
                        $class = '';
                    }

                    echo '<article class="' . unikpostlayout_post_class() . '">
                    <div class="row '.$class.'">
	                    <div class="col-md-6">
									<div class="post-img">';
                                        if (has_post_thumbnail()) {
                                            the_post_thumbnail($size);
                                        }
                      echo '</div>
                                    </div>
                                    
									<div class="col-md-6">
									<div class="post2-content-wrapper">
                                        <div class="post2-category">
                                        '.unikpostlayout_get_category_link(' | ').'
                                        </div>
                                        <div class="post2-title">
                                            <h3><a href="' . get_the_permalink() . '">' . get_the_title() . '</a></h3>
                                        </div>
                                        <div class="post2-author-info">
                                        <div class="post2-author-img">
                                            '.get_avatar( get_the_author_meta( 'ID' ), 32 ).'
                                        </div>
                                        <div class="post2-author">
                                            <div class="post2-author-name">
                                             '.get_the_author_posts_link().'
                                            </div>
                                            <div class="post2_post_date">
                                                '.get_the_date( ' F j, Y' ).'
                                            </div>
                                        </div>
                                        </div>
                                        <div class="post2-excerpt">
                                            <p>'.wp_trim_words(get_the_content(),  $settings['trim']['size']).'</p>
                                        </div>	
                                        <div class="post2-read-more">
										    <a href="' . get_the_permalink() . '">'.esc_html('Read More').'</a>
									    </div>
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