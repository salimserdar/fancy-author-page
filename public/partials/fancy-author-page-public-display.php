<?php

/**
 * Provide a public-facing view for the plugin
 *
 * This file is used to markup the public-facing aspects of the plugin.
 *
 * @link       https://github.com/salimserdar/
 * @since      1.0.0
 *
 * @package    Fancy_Author_Page
 * @subpackage Fancy_Author_Page/public/partials
 */
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->

<?

function render_author() {
    
    $args = array( 'role'=> 'author' );

    $authors = get_users( $args );

    foreach ($authors as $author) {

        $all_meta_for_user = get_user_meta( $author->ID );

        echo '<span class="user-name">' .  $author->display_name . '</span>';
        echo '<span class="user-email">' . $author->user_email . '</span>';

        echo '<div class="social-media">';

        if ( isset($all_meta_for_user["facebook"][0]) ) {
            echo '<span class="facebook">' . $all_meta_for_user["facebook"][0] . '</span>';
        }

        if ( isset($all_meta_for_user["twitter"][0]) ) {
            echo '<span class="twitter">' . $all_meta_for_user["twitter"][0] . '</span>';
        }

        if ( isset($all_meta_for_user["instagram"][0]) ) {
            echo '<span class="instagram">' . $all_meta_for_user["instagram"][0] . '</span>';
        }

        echo '</div>';
        
    }

}

render_author();

function author_page( $template ) {

	if ( is_author() ) {  
		$new_template = locate_template( array( 'authour-page-template.php' ) );
		if ( !empty( $new_template ) ) {
			return $new_template;
		}
	}

	return $template;
}

author_page();
