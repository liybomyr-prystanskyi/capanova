<?php
/**
 * Description: here is function for all extra user fields and roles
 */

/* add new user role-teacher */
function add_roles_on_plugin_activation() {
    $rules = array(
        'read' => true, // true allows this capability
        'edit_posts' => true, // Allows user to edit their own posts
        'edit_pages' => true, // Allows user to edit pages
        'edit_others_posts' => true, // Allows user to edit others posts not just their own
        'create_posts' => true, // Allows user to create new posts
        'manage_categories' => true, // Allows user to manage post categories
        'publish_posts' => true, // Allows the user to publish, otherwise posts stays in draft mode'edit_themes' => false, // false denies this capability. User can’t edit your theme
        'edit_files' => true,
        'edit_theme_options'=>true,
        'manage_options'=>true,
        'moderate_comments'=>true,
        'manage_links'=>true,
        'edit_others_pages'=>true,
        'edit_published_pages'=>true,
        'publish_pages'=>true,
        'delete_pages'=>true,
        'delete_others_pages'=>true,
        'delete_published_pages'=>true,
        'delete_others_posts'=>true,
        'delete_private_posts'=>true,
        'edit_private_posts'=>true,
        'read_private_posts'=>true,
        'delete_private_pages'=>true,
        'edit_private_pages'=>true,
        'read_private_pages'=>true,
        'unfiltered_html'=>true,
        'edit_published_posts'=>true,
        'upload_files'=>true,
        'delete_published_posts'=>true,
        'delete_posts'=>true,
        'install_plugins' => false, // User cant add new plugins
        'update_plugin' => false, // User can’t update any plugins
        'update_core' => false // user cant perform core updates
    );
    add_role(
        'teacher',
        __( 'Teacher', 'luxeacademy' ),
        $rules
    );
}
register_activation_hook( __FILE__, 'add_roles_on_plugin_activation' );
/* end of add new user role-teacher */

/* save user courser progress data in ACF fields */
add_action( 'wp_ajax_nopriv_save_user_progress', 'save_user_progress_callback' );
add_action( 'wp_ajax_save_user_progress', 'save_user_progress_callback' );
function save_user_progress_callback() {
    // Ensure we have the data we need to continue
    if( ! isset( $_POST ) || empty( $_POST ) || ! is_user_logged_in() ) {
        // If we don't - return custom error message and exit
        header( 'HTTP/1.1 400 Empty POST Values' );
        echo 'Could Not Verify POST Values.';
        exit;
    }
    $user_id = get_current_user_id();                            // Get our current user ID
    $course_id = sanitize_text_field( $_POST['course_id'] );      // Sanitize our user meta value
    $array_progress = $_POST['progress'];      // Sanitize our user email field
    $post_id = 'user_'.$user_id;

    $flag = 0;
    $progress_value = array();
    $value = array();
    foreach($array_progress as $p){
        $value = array(
            'sec_name' => $p["section"],
            'les_name' => $p["lesson"],
            'done' => ($p["done"] === "true") ? true : false,
        );
        array_push($progress_value, $value);
    }

    if( have_rows('user_progress', $post_id) ):
        // if there is any User Course Progress in memory
        $i = 0;
        while(have_rows('user_progress', $post_id)): the_row();
            if(get_sub_field('course_id') == $course_id) {
                // update row
                $flag = 1;
                if(count(get_sub_field('array_course_pr')) == count($progress_value)){
                    update_sub_row( 'user_progress', $i, $progress_value );
                }else{
                    $sum = count($progress_value) - count(get_sub_field('array_course_pr'));
                    var_dump(count($progress_value) - count(get_sub_field('array_course_pr')));
                    if($sum < 0){
                        // TODO: need to delete extra rows. Now it is leaving empty fields
                    }else{
                        while($sum){
                            add_sub_row( 'array_course_pr', $value );
                            $sum--;
                        }
                    }
                }
            }
            $i++;
        endwhile;
    endif;

    if($flag == 0):
        // create new User Progress row
        $value = array(
            'course_id' => $course_id,
            'array_course_pr' => $progress_value
        );
        add_row( 'user_progress', $value, $post_id );
    endif;

    if( have_rows('user_progress', $post_id) ):
        while( have_rows('user_progress', $post_id) ): the_row();
            if(get_sub_field('course_id') == $course_id) {
                $i = 0;
                if(have_rows('array_course_pr')):
                    while(have_rows('array_course_pr')): the_row();
                        $value_section = $array_progress[$i]["section"];
                        update_sub_field('sec_name', $value_section);
                        $value_lesson = $array_progress[$i]["lesson"];
                        update_sub_field('les_name', $value_lesson);
                        $value_done = ($array_progress[$i]["done"] === "true") ? true : false;
                        update_sub_field('done', $value_done);
                        $i++;
                    endwhile;
                endif;
            }
        endwhile;
    endif;

    // выход нужен для того, чтобы в ответе не было ничего лишнего, только то что возвращает функция
    wp_die();
}

// find field done inside user data progress
function set_user_progress($user_id, $course_id){
    $post_id = 'user_'.$user_id;
    $progress = array();
    if( have_rows('user_progress', $post_id)){
        while( have_rows('user_progress', $post_id)):the_row();
            if(get_sub_field('course_id') == $course_id) {
                if(have_rows('array_course_pr')):
                    while(have_rows('array_course_pr')): the_row();
                        array_push($progress, array(
                            'user_id' => $user_id,
                            'course_id' => $course_id,
                            'section_name' => get_sub_field('sec_name'),
                            'lesson_name' => get_sub_field('les_name'),
                            'done' => get_sub_field('done')
                        ));
                    endwhile;
                endif;
            } else {
                continue;
            }
        endwhile;
    }else{
        return false;
    }
    return $progress;
}

// find User Progress for the Lesson
function find_user_progress($progress, $user_id, $course_id, $section_name, $lesson_name){
    foreach($progress as $el){
        if(($el["user_id"] == $user_id) &&($el["course_id"] == $course_id) &&($el["section_name"] == $section_name) &&($el["lesson_name"] == $lesson_name))
            return $el["done"];
    }
    return false;
}
/* end of save user courser progress data in ACF fields */

/* send to User the Certificate */
add_action( 'wp_ajax_nopriv_course_certificate', 'course_certificate_callback' );
add_action( 'wp_ajax_course_certificate', 'course_certificate_callback' );
function course_certificate_callback() {
    // Ensure we have the data we need to continue
    if( ! isset( $_POST ) || empty( $_POST ) || ! is_user_logged_in() ) {
        // If we don't - return custom error message and exit
        header( 'HTTP/1.1 400 Empty POST Values' );
        echo 'Could Not Verify POST Values.';
        exit;
    }

    $user_id = get_current_user_id();                            // Get our current user ID
    $course_id = sanitize_text_field( $_POST['course_id'] );      // Sanitize our user meta value
    $post_id = 'user_'.$user_id;
    $make_mail = false;

    if( have_rows('user_progress', $post_id) ):
        while(have_rows('user_progress', $post_id)): the_row();
            if(get_sub_field('course_id') == $course_id){
                if(get_sub_field('certificate_given')){
                    echo 'User already have the Certificate';
                }else{
                    // store in user profile information about finished Course
                    $make_mail = true;
                }
            }
        endwhile;
    endif;
    if($make_mail){
        $make_mail = make_mail($course_id);
        if($make_mail){
            // if success, store in user profile information about finished Course
            if( have_rows('user_progress', $post_id) ):
                while(have_rows('user_progress', $post_id)): the_row();
                    if(get_sub_field('course_id') == $course_id){
                        update_sub_field('certificate_given', true);
                    }
                endwhile;
            endif;
        }else{
            var_dump("error email");
        }
    }
    // выход нужен для того, чтобы в ответе не было ничего лишнего, только то что возвращает функция
    wp_die();
}

// send mail function
add_filter( 'wp_mail_content_type', function($content_type){
    return "text/html";
});

function get_certificate_param($name, $name_general, $course_id = false){
    $value = false;
    if($course_id){
        if(have_rows('spec_set', 'option')){
            while(have_rows('spec_set', 'option')): the_row();
                if(get_sub_field('course') == $course_id)
                    $value = get_sub_field($name);
            endwhile;
        }
    }
    if(!$value){
        $value = get_field($name_general, 'option');
        if(!$value)
            switch($name){
                case('from_name'):
                    $value = get_bloginfo('name').' team';
                    break;
                case('spec_subject'):
                    $value = __('Certificate Luxe Academy', "luxeacademy");
                    break;
                case('message'):
                    $value = "<strong>Congratulations!</strong><br/>You finished the Course. Here is your Certificate!<br/><br/><em>Best regards, the <a href='http://localhost/test/wordpress'>Luxe Academy</a> team.</em>";
                    break;
                case('spec_bcc_text'):
                    $value = "";
                    break;
                case('spec_from_address'):
                    $value = get_home_url();
                    break;
                case('attachment'):
                    $custom_logo_id = get_theme_mod('custom_logo');
                    $custom_logo_image = wp_get_attachment_image_src( $custom_logo_id , 'full' );
                    $value = $custom_logo_image[0];
                    break;
            }
    }
    return $value;
}

add_filter( 'wp_mail_from_name', function($from_name){
    $from_name = get_certificate_param('spec_from_name', 'from_name', get_queried_object_id());
    return $from_name; //  return 'Мое имя, а не WordPress'; тут можно указать свою почту: asd@asd.ru
});

function make_mail($course_id){
    $user_id = get_current_user_id();
    $to = get_userdata( $user_id )->user_email;
    $subject = get_certificate_param('spec_subject', 'subject', $course_id);
    $message = get_certificate_param('message', 'default_message', $course_id);
    $headers = array(
        'from' => get_certificate_param('spec_from_address', 'from_name', $course_id),
        'content-type' => 'text/html',
        'bcc' => get_certificate_param('spec_bcc_text', 'bcc_text', $course_id)
    );
    $attachments = get_certificate_param('attachment', 'default_attachment', $course_id);
    $result = wp_mail( $to, $subject, $message, $headers, $attachments);
    return $result;
}
/* end of send to User the Certificate */