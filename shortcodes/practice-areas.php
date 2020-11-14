<?php
function practice_areas(){
    $query = new WP_query(
        array(
            'post_type' => 'practice-areas',
            'post_status' => 'publish',
            'post_per_page' => '-1',
            'order' => 'ASC',
            'orderby' => 'menu_order'
        )
    );
    $i = 1;
    $str = '<div class="elementor-row">';
    while($query->have_posts()):
        $query->the_post();
        $str .='<div class="elementor-column-wrap elementor-element-populated">
        <div class="elementor-widget-wrap">
    <div class="elementor-element elementor-element-19f931c elementor-widget elementor-widget-heading" data-id="19f931c" data-element_type="widget" id="#projects" data-widget_type="heading.default">
<div class="elementor-widget-container">
<h2 class="elementor-heading-title elementor-size-default"><a id="projects" href="#projects" projects="">PROJECTS</a></h2>		</div>
</div>
    </div>
</div>';
        if($i % 3  == 0):
            $str .= '</div>';
            $str .= '<div class="elementor-row">';
        endif;
    endwhile;
    wp_reset_postdata();
    return $str;
} 

add_shortcode('practice_areas', 'practice_areas'); 

function practice_areas_link(){
    $query = new WP_query(
        array(
            'post_type' => 'practice-areas',
            'post_status' => 'publish',
            'post_per_page' => '-1',
            'order' => 'ASC',
            'orderby' => 'menu_order'
        )
    );
    $links = '';
    while($query->have_posts()):
        $query->the_post();
        $links .= '<a href="'.get_the_permalink().'"title"'.get_the_title().'">'.get_the_title().'</a><br>';
    endwhile;
    wp_reset_postdata();
    return $links;
    
}

add_shortcode('practice_areas_link', 'practice_areas_link'); 
?>

