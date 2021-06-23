<?php
function unikpostlayout_image($source, $img_size='full'){
    if ($source){
        return wp_get_attachment_image($source['id'], $img_size);
    }
}
function unikpostlayout_category_lists($tax='category') {

    $categories_obj = get_categories('taxonomy='.$tax.'');
    $categories = array();

    foreach ($categories_obj as $pn_cat) {
        $categories[$pn_cat->cat_ID] = $pn_cat->cat_name;
    }
    return $categories;
}
function unikpostlayout_get_category_link($style, $taxonomy='category'){

    global $post;
    $output='';
    $ids=  $taxonomy;
    $terms = wp_get_post_terms($post->ID, $ids);
    $separator = $style;
    if($terms){
        foreach($terms as $term) {
            $term_link = get_term_link($term);
            $output .='<a href="' . esc_url($term_link) . '">'.$term->name.'</a>'.$separator;
        }
    }
    return trim($output, $separator);
}
function unikpostlayout_post_lists($post_type='post'){
    $args = array(
        'numberposts' => -1,
        'post_type'   => $post_type
    );

    $posts = get_posts( $args );
    $list = array();
    foreach ($posts as $cpost){
        //  print_r($cform);
        $list[$cpost->ID] = $cpost->post_title;
    }
    return $list;
}
function unikpostlayout_image_sizes() {
    $image_sizes = get_intermediate_image_sizes();

    $addsizes = array(
        'full' => 'full',
        'custom' => 'custom',
    );
    $newsizes = array_merge($image_sizes, $addsizes);

    return array_combine($newsizes, $newsizes);
}
function unikpostlayout_post_class(){
    $post_class = get_post_class( 'post-layout', get_the_ID() );
    return esc_attr( implode( ' ', $post_class ) );
}
function unikpostlayout_link($link){

    $url = $link['url'] ? 'href='.esc_url($link['url']). '' : '';
    $ext = $link['is_external'] ? 'target= _blank' : '';
    $link = $url.' '.$ext;
    return $link;
}
function unikpostlayout_odd_even($data){
    if($data % 2 == 0){
        $data = "Even";
    }
    else{
        $data = "Odd";
    }
    return $data;
}
function unikpostlayout_comment(){
    if ( ! post_password_required() ) {
        $num_comments = get_comments_number(); // get_comments_number returns only a numeric value
        if ( comments_open() ) {
            if ( $num_comments == 0 ) {
                $comments = esc_attr__('0 Comment', 'unikpostlayout');
            } elseif ( $num_comments > 1 ) {
                $comments = $num_comments . esc_attr__('Comments', 'unikpostlayout');
            } else {
                $comments = esc_attr__('1 Comment','unikpostlayout');
            }
            $write_comments = $comments;
        } else {
            $write_comments =  esc_attr__('off', 'unikpostlayout');
        }
        return '<a href="'.get_the_permalink().'">'.$write_comments.'</a>';
    }
}
