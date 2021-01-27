<?php 
if ( ! function_exists( 'tr_iblogger_lite_breadcrumb' ) ) :

//For breadcrumb
function tr_iblogger_lite_breadcrumb() {
    if(is_home() || is_front_page()){
        return;
    }

    global $post;
    echo '<div id="breadcrumb">';
        echo '<div class="container">';
            echo '<div class="breadcrumb-area">';
                echo '<ul>';
                if (!is_home()) {
                    echo '<li><a href="';
                    echo esc_url( home_url() );
                    echo '">';
                    echo 'Home';
                    echo '</a></li><li class="separator"> / </li>';
                    if (is_category() || is_single()) {
                        echo '<li>';
                        the_category(' </li><li class="separator"> / </li><li> ');
                        if (is_single()) {
                            echo '</li><li class="separator"> / </li><li>';
                            the_title();
                            echo '</li>';
                        }
                    } elseif (is_page()) {
                        if($post->post_parent){
                            $anc = get_post_ancestors( $post->ID );
                            $title = get_the_title();
                            foreach ( $anc as $ancestor ) {
                                $output = '<li><a href="'.get_permalink($ancestor).'" title="'.get_the_title($ancestor).'">'.get_the_title($ancestor).'</a></li> <li class="separator">/</li>';
                            }
                            echo esc_html( $output );
                            echo '<strong title="'. esc_attr( $title ) .'"> '. esc_html( $title ) .'</strong>';
                        } else {
                            echo '<li><strong> '.get_the_title().'</strong></li>';
                        }
                
                    }elseif (is_author()) {echo"<li>";_e('Author Archive ','tr-iblogger-lite'); echo'</li>';}
                	 elseif (is_search()) {echo"<li>"; _e('Search Results ','tr-iblogger-lite'); echo'</li>';}
            		 elseif (is_month()) {echo"<li>";_e('Archive for ','tr-iblogger-lite');  the_time(get_option( 'date_format' )); echo'</li>';}
                	 elseif (is_404()) {echo"<li>";_e('404 page','tr-iblogger-lite'); echo'</li>';}
            		 elseif (is_tag()) {echo"<li>";single_tag_title();echo'</li>';}
            		 elseif (is_day()) {echo"<li>"; _e('Archive for ','tr-iblogger-lite');  the_time(get_option( 'date_format' )); echo'</li>';}
            	    elseif (is_year()) {echo"<li>";_e('Archive for ','tr-iblogger-lite');  the_time(get_option( 'date_format' )); echo'</li>';}
            	    elseif (isset($_GET['paged']) && !empty($_GET['paged'])) {echo "<li>"; _e('Blog Archives ','tr-iblogger-lite'); echo'</li>';}
            	    echo '</ul>';
                }
            echo '</div>'; //<!-- /.end of breadcrumb-area -->
        echo '</div>'; //<!-- /.end of container -->
    echo '</div>'; //<!-- /#end of breadcrumb section -->
    
}

endif;