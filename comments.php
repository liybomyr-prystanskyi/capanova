<?php
/**
 * Description: the template displaying Comments and Comment Form.
 *              The area of the page that contains comments and the comment form.
 *
 * If the current post is protected by a password and the visitor has not yet
 * entered the password we will return early without loading the comments.
 */
if ( post_password_required() )
    return;

if(is_forum()): ?>
    <!--- post comment form --->
    <div class="add-question-block parent-form">
        <?php
        $author = wp_get_current_user();
        echo '<h2>'.$author->display_name.'</h2>';
        get_template_part( 'partials/molecules/comment', 'form' );
        ?>
    </div>
    <!--- end of post comment form --->
    <!--- list of comments --->
    <?php get_template_part( 'partials/organisms/comments', 'list' ); ?>
    <!--- end list of comments --->
<?php else: ?>
    <!--- post comment form --->
    <section class="add-comment-container" data-aos="fade-up" data-aos-offset="700">
        <div class="container">
            <div class="row justify-content-center">
                <div class="add-comment col-12 col-md-6 d-flex justify-content-center flex-column align-items-center">
                    <?php get_template_part( 'partials/molecules/comment', 'form' ); ?>
                </div>
            </div>
        </div>
    </section>
    <!--- end of post comment form --->
    <!--- list of comments --->
    <section class="all-comments-container">
        <div class="container">
            <?php if ( have_comments() ) : ?>
                <h2 class="title-h2-default "><?php _e("Recent comments", "luxeacademy"); ?></h2>
                <?php // show comments list ?>
                <?php get_template_part( 'partials/organisms/comments', 'list' ); ?>
            <?php else: ?>
                <h2 class="title-h2-default hidden"><?php _e("Recent comments", "luxeacademy"); ?></h2>
            <?php endif; ?>
        </div>
    </section>
    <!--- end list of comments --->
<?php endif; ?>