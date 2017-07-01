<?php
/**
* Adding metabox to posts and pages
*/

function wps2a_meta_box() {

    $screens = array( 'post', 'page');
    foreach ( $screens as $screen ) {
        add_meta_box(
            'global-notice',
            __( 'Element to look for (#myelement)', 'wps2a' ),
            'wps2a_meta_box_callback',
            $screen,
            'side',
            'high'
        );
    }
}
add_action( 'add_meta_boxes', 'wps2a_meta_box' );


function wps2a_meta_box_callback( $post ) {
    // Add a nonce field so we can check for it later.
    wp_nonce_field( 'wps2a_nonce', 'wps2a_nonce' );

    $value = get_post_meta( $post->ID, '_wps2a-selector', true );
    echo '<textarea style="width:100%" id="global_notice" name="global_notice">' . esc_attr( $value ) . '</textarea>';
}

function save_wps2a_meta_box_data( $post_id ) {

    // Check if our nonce is set.
    if ( ! isset( $_POST['wps2a_nonce'] ) ) {
        return;
    }

    // Verify that the nonce is valid.
    if ( ! wp_verify_nonce( $_POST['wps2a_nonce'], 'wps2a_nonce' ) ) {
        return;
    }

    // If this is an autosave, our form has not been submitted, so we don't want to do anything.
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return;
    }

    // Check the user's permissions.
    if ( isset( $_POST['post_type'] ) && 'page' == $_POST['post_type'] ) {

        if ( ! current_user_can( 'edit_page', $post_id ) ) {
            return;
        }

    }
    else {

        if ( ! current_user_can( 'edit_post', $post_id ) ) {
            return;
        }
    }

    // Make sure that it is set.
    if ( ! isset( $_POST['global_notice'] ) ) {
        return;
    }

    // Sanitize user input.
    $my_data = sanitize_text_field( $_POST['global_notice'] );

    // Update the meta field in the database.
    update_post_meta( $post_id, '_wps2a-selector', $my_data );
}

add_action( 'save_post', 'save_wps2a_meta_box_data' );