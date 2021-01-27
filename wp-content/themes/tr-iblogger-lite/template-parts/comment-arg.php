<?php 
$commenter = wp_get_current_commenter();
$req = get_option( 'require_name_email' );
$aria_req = ( $req ? " aria-required='true'" : '' );
?>
<div class="blog-submit">
<?php
$args = array(
  '<div class="row">',
    'fields' => apply_filters(
      'comment_form_default_fields', array(
        '<div class="col-md-6">',
          'author' =>'<label for="author"><i>' . __( 'Name', 'tr-iblogger-lite' ) . '</label> '. ( $req ? '<span class="required">:*</i></span>' : ':</i>' )  .'<div class="form-group">' . '<input id="author" placeholder="Your Name" name="author" type="text" class="form-control" value="'  .
            esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' />'.'</div>'
            ,
        '</div>',//end .col-md-6 
        '<div class="col-md-6">',
          'email'  =>'<label for="email"><i>' . __( 'Email', 'tr-iblogger-lite'  ) . '</label> '. ( $req ? '<span class="required">:*</i></span>' : ':</i>' )  .'<div class="form-group">' . '<input id="email" placeholder="Your Email" name="email" type="text" class="form-control" value="' . esc_attr(  $commenter['comment_author_email'] ) .
            '" size="30"' . $aria_req . ' />' . '</div>'
            ,
        '</div>',//end .col-md-6 

        '<div class="col-md-12">',
          'url'   => '<label for="url"><i>' . __( 'Your Website:', 'tr-iblogger-lite'  ) . '</i></label>'.'<div class="form-group">' .
           '<input id="url" name="url" placeholder="http://example.com" type="text" class="form-control" value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" /> '.
          '</div>',
        '</div>' //end .col-md-12 

      )
    ),

    
      'comment_field' => '<div class="col-md-12">'.'<div class="form-group comment-form-comment">' .
      '<label for="comment">' . __( 'Comments:', 'tr-iblogger-lite'  ) . '</label>' .
      '<textarea id="comment" class="form-control" name="comment" placeholder="Write Here..."  rows="13" aria-required="true"></textarea>' .
      '</div>'.'</div>', //end .col-md-12 

    
  '</div>',//end .row 
);
comment_form($args);
?>
</div><!-- /.submit-comment  -->