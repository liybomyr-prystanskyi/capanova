<?php
/**
 * Description: this file create setting for Product rating in Comments
 */
//Create the rating interface.
//add_action( 'comment_form_logged_in_after', 'ci_comment_rating_rating_field' );
//add_action( 'comment_form_after_fields', 'ci_comment_rating_rating_field' );
//function ci_comment_rating_rating_field () { ?>
<!--    <label for="rating">Rating<span class="required">*</span></label>-->
<!--    <fieldset class="comments-rating">-->
<!--		<span class="rating-container">-->
<!--			--><?php //for ( $i = 5; $i >= 1; $i-- ) : ?>
<!--                <input type="radio" id="rating---><?php //echo esc_attr( $i ); ?><!--" name="rating" value="--><?php //echo esc_attr( $i ); ?><!--" /><label for="rating---><?php //echo esc_attr( $i ); ?><!--">--><?php //echo esc_html( $i ); ?><!--</label>-->
<!--            --><?php //endfor; ?>
<!--            <input type="radio" id="rating-0" class="star-cb-clear" name="rating" value="0" /><label for="rating-0">0</label>-->
<!--		</span>-->
<!--    </fieldset>-->
<!--    --><?php
//}
//
////Save the rating submitted by the user.
//add_action( 'comment_post', 'ci_comment_rating_save_comment_rating' );
//function ci_comment_rating_save_comment_rating( $comment_id ) {
//    if ( ( isset( $_POST['rating'] ) ) && ( '' !== $_POST['rating'] ) )
//        $rating = intval( $_POST['rating'] );
//    add_comment_meta( $comment_id, 'rating', $rating );
//}
//
////Make the rating required.
//add_filter( 'preprocess_comment', 'ci_comment_rating_require_rating' );
//function ci_comment_rating_require_rating( $commentdata ) {
//    if ( ! is_admin() && ( ! isset( $_POST['rating'] ) || 0 === intval( $_POST['rating'] ) ) )
//        wp_die( __( 'Error: You did not add a rating. Hit the Back button on your Web browser and resubmit your comment with a rating.' ) );
//    return $commentdata;
//}
//
////Display the rating on a submitted comment.
//add_filter( 'comment_text', 'ci_comment_rating_display_rating');
//function ci_comment_rating_display_rating( $comment_text ){
//    if ( $rating = get_comment_meta( get_comment_ID(), 'rating', true ) ) {
//        $stars = '<p class="stars">';
//        for ( $i = 1; $i <= $rating; $i++ ) {
//            $stars .= '<span class="dashicons dashicons-star-filled"></span>';
//        }
//        $stars .= '</p>';
//        $comment_text = $comment_text . $stars;
//        return $comment_text;
//    } else {
//        return $comment_text;
//    }
//}
//
////Get the average rating of a post.
//function ci_comment_rating_get_average_ratings( $id ) {
//    $comments = get_approved_comments( $id );
//    if ( $comments ) {
//        $i = 0;
//        $total = 0;
//        foreach( $comments as $comment ){
//            $rate = get_comment_meta( $comment->comment_ID, 'rating', true );
//            if( isset( $rate ) && '' !== $rate ) {
//                $i++;
//                $total += $rate;
//            }
//        }
//        if ( 0 === $i )
//            return false;
//        else
//            return round( $total / $i, 1 );
//    } else {
//        return false;
//    }
//}
//
////Display the average rating above the content.
//add_filter( 'the_content', 'ci_comment_rating_display_average_rating' );
//function ci_comment_rating_display_average_rating( $content ) {
//    global $post;
//    if ( false === ci_comment_rating_get_average_ratings( $post->ID ) )
//        return $content;
//    $stars   = '';
//    $average = ci_comment_rating_get_average_ratings( $post->ID );
//    for ( $i = 1; $i <= $average + 1; $i++ ) {
//        $width = intval( $i - $average > 0 ? 20 - ( ( $i - $average ) * 20 ) : 20 );
//        if ( 0 === $width ) {
//            continue;
//        }
//        $stars .= '<span style="overflow:hidden; width:' . $width . 'px" class="dashicons dashicons-star-filled"></span>';
//        if ( $i - $average > 0 ) {
//            $stars .= '<span style="overflow:hidden; position:relative; left:-' . $width .'px;" class="dashicons dashicons-star-empty"></span>';
//        }
//    }
//    $custom_content  = '<p class="average-rating">This post\'s average rating is: ' . $average .' ' . $stars .'</p>';
//    $custom_content .= $content;
//    return $custom_content;
//}