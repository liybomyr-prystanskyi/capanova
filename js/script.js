/*
* Description: script for all final settings. It is last script file in Footer
* */
AOS.init();

if (jQuery("body").data('admin') == "is-admin") {
    jQuery(".header-info-line").css({
        "top": "32px"
    });

    jQuery(".nav_wrapper").css({
        "top": "32px"
    });
}

else {
    jQuery(".header-info-line").css({
        "top": "0"
    });

    jQuery(".nav_wrapper").css({
        "top": "0"
    });
}

/* main page slider init */
$('.slider-wrap').slick({
    dots: false,
    infinite: true,
    speed: 700,
    fade: true,
    arrows: true,
    autoplay: true,
    nextArrow: '<img class="slick-next slick-arrow" src="'+wpData.html_template_directory+'assets/img/right-arrow.png" />',
    prevArrow: '<img class="slick-prev slick-arrow" src="'+wpData.html_template_directory+'assets/img/left-arrow.png" />',
    cssEase: 'linear',
    responsive: [{
        breakpoint: 768,
        settings: {
            arrows: false
        }
    }]
});
/* end of main page slider init */

/* work with video duration for lessons */
// data to time format
function formatDuration(seconds, addNull) {
    var sec = Math.ceil( seconds );
    var min = Math.floor( sec / 60 );
    sec = Math.ceil( sec % 60 );
    sec = sec >= 10 ? sec : '0' + sec;
    min = (addNull && (min >= 10)) ? min : '0' + min;
    return min + ':' + sec;
}

function getDuration(video, el) {
    var b = setInterval(()=>{
        if(video.readyState >= 3){
            // do whatever you want done here
            let duration = video.duration;
            showDuration(el, duration);
            //you can now stop checking every half second
            clearInterval(b);
        }
    },500);
}

function showDuration(el, duration){
    el.text(formatDuration(duration, true));
}

$(document).ready(function(){
    $(".video-duration").each(function(){
        let el = $(this);
        let video = el.closest(".single-lesson").find("video");
        video.each(function(){
            getDuration(this, el);
        });
    });
});
/* end of work with video duration for lessons */

/* save user progress data */
function checkBoxImitate(checkbox){
    let checkOff = checkbox.find(".not-done");
    let checkOn = checkbox.find(".done");
    if(checkOn.is(".active")){
        checkOn.removeClass("active");
        checkOn.addClass("hidden");
        checkOff.addClass("active");
        checkOff.removeClass("hidden");
    }else{
        checkOff.removeClass("active");
        checkOff.addClass("hidden");
        checkOn.addClass("active");
        checkOn.removeClass("hidden");
    }
}

function getUserCourseProgress(){
    let progress = new Array();
    let section, lesson, done;
    $(".single-section").each(function(){
        section = $(this).find(".section-title").text();
        $(this).find(".single-lesson").each(function(){
            lesson = $(this).find(".lesson-name").text();
            done = ($(this).find(".checkbox .done.active").length) ? true : false;
            progress.push({
                section: section,
                lesson: lesson,
                done: done
            });
        });
    });
    return progress;
}

function updateUserProgress(){
    let lessons = [];
    lessons[0] = 0;
    lessons[1] = 0;
    $(".single-section").each(function(){
        $(this).find(".single-lesson").each(function(){
             if($(this).find(".checkbox .done.active").length)
                 lessons[0]++;
             lessons[1]++;
        });
    });
    return lessons;
}

function sendCertificate(course_id){
    $.ajax({
        url : wpData.ajax_url,                 // Use our localized variable that holds the AJAX URL
        type: 'POST',                   // Declare our ajax submission method ( GET or POST )
        cache: false,
        data: {                         // This is our data object
            action: 'course_certificate', // AJAX POST Action
            course_id: course_id,       // Replace `um_key` with your user_meta key name
        }
    }).success( function(data) {
        console.log('User owner the Certificate!');
        console.log(data);
        // update user progress line

    }).fail( function( data ) {
        console.log( data.responseText );
        console.log( 'Request failed: ' + data.statusText );
    });
}

$(document).ready(function(){
    $('body').on('click', '.icon-wrap.checkbox', function(){
        // imitate checkbox
        checkBoxImitate($(this));

        // get course progress data
        let course_id = $(".single-courses-content").attr('id').replace("product-", "");
        let progress = getUserCourseProgress();

        $.ajax({
            url : wpData.ajax_url,                 // Use our localized variable that holds the AJAX URL
            type: 'POST',                   // Declare our ajax submission method ( GET or POST )
            cache: false,
            data: {                         // This is our data object
                action: 'save_user_progress', // AJAX POST Action
                course_id: course_id,       // Replace `um_key` with your user_meta key name
                progress: progress,
            }
        }).success( function(data) {
            console.log('User Meta Updated!');
            console.log(data);
            // update user progress line
            let done = updateUserProgress();
            console.log(done);
            $(".progress-course > .progress-main").attr("value",(done[0]/done[1])*100);
            $(".progress-course #procent-progress").text((done[0]/done[1])*100);
            if( (done[0] / done[1]) == 1 ){
                // the user has just finished the Course
                alert("NOT READY\n\nCongratulations!\n\nCheck your mail - You've just got a Certificate!");
                sendCertificate(course_id);
            }

        }).fail( function( data ) {
            console.log( data.responseText );
            console.log( 'Request failed: ' + data.statusText );
        });
    });
});
/* end of save user progress data */

/* validation for comment form */
// validation functions
jQuery.extend(jQuery.fn, {
    // check if field value length more than 3 symbols ( for name and comment )
    validate: function () {
        if (jQuery(this).val().length < 3) {
            jQuery(this).addClass('error');return false;
        } else {
            jQuery(this).removeClass('error');return true;
        }
    },
    // check if email is correct
    // add to your CSS the styles of .error field, for example border-color:red;
    validateEmail: function () {
        var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/,
            emailToValidate = jQuery(this).val();
        if (!emailReg.test( emailToValidate ) || emailToValidate == "") {
            jQuery(this).addClass('error');return false
        } else {
            jQuery(this).removeClass('error');return true
        }
    },
});
jQuery(function($){
    // On blog comment form submit
    $( '#single-post-type-comment' ).submit(function(){
        // define some vars
        var button = $('#single-post-type-comment-submit'), // submit button
            respond = $('#respond'), // comment form container
            emailfield = $(this).find('#email'),
            authorfield = $(this).find('#author'),
            commentfield = $(this).find('#comment'),
            commentlist = $('.all-comments-container .container .title-h2-default '); // comment list container
            // cancelreplylink = $('#cancel-comment-reply-link');

        // if user is logged in, do not validate author and email fields
        if( authorfield.length )
            authorfield.validate();
        if( emailfield.length )
            emailfield.validateEmail();
        // validate comment in any case
        commentfield.validate();
        // if comment form isn't in process, submit it
        if ( !button.hasClass( 'loadingform' ) && !authorfield.hasClass( 'error' ) && !emailfield.hasClass( 'error' ) && !commentfield.hasClass( 'error' ) ){
            // ajax request
            $.ajax({
                type : 'POST',
                url : wpData.ajax_url, // admin-ajax.php URL
                data: $(this).serialize() + '&action=ajaxcomments', // send form data + action parameter
                beforeSend: function(xhr){
                    // what to do just after the form has been submitted
                    button.addClass('loadingform').val('Loading...');
                },
                error: function (request, status, error) {
                    if( status == 500 ){
                        alert( 'Error while adding comment' );
                    } else if( status == 'timeout' ){
                        alert('Error: Server doesn\'t respond.');
                    } else {
                        // process WordPress errors
                        var wpErrorHtml = request.responseText.split("<p>"),
                            wpErrorStr = wpErrorHtml[1].split("</p>");
                        alert( wpErrorStr[0] );
                    }
                },
                success: function ( addedCommentHTML ) {
                    // if this post already has comments
                    if( commentlist.find("[rel='author']").length == 0 ){
                        // if no comments yet
                        commentlist.removeClass("hidden");
                    }
                    // simple comment
                    commentlist.after( $(addedCommentHTML) );
                    $([document.documentElement, document.body]).animate({
                        scrollTop: ($(".all-comments-container").offset().top)
                    }, 2000);
                    // clear textarea field
                    commentfield.val('');
                },
                complete: function(){
                    // what to do after a comment has been added
                    button.removeClass( 'loadingform' ).val( 'Submit' );
                }
            });
        }
        return false;
    });
    // On course comment form submit
    $( '#single-product-comment-form' ).submit(function(){
        // define some vars
        var button = $('#submit'), // submit button
            respond = $('#respond'), // comment form container
            emailfield = $(this).find('#email'),
            authorfield = $(this).find('#author'),
            commentfield = $(this).find('#comment'),
            commentlist = $('#reviews'); // comment list container
            // cancelreplylink = $('#cancel-comment-reply-link');

        // if user is logged in, do not validate author and email fields
        if( authorfield.length )
            authorfield.validate();
        if( emailfield.length )
            emailfield.validateEmail();
        // validate comment in any case
        commentfield.validate();
        // if comment form isn't in process, submit it
        if ( !button.hasClass( 'loadingform' ) && !authorfield.hasClass( 'error' ) && !emailfield.hasClass( 'error' ) && !commentfield.hasClass( 'error' ) ){
            // ajax request
            $.ajax({
                type : 'POST',
                url : wpData.ajax_url, // admin-ajax.php URL
                data: $(this).serialize() + '&action=ajaxreviews', // send form data + action parameter
                beforeSend: function(xhr){
                    // what to do just after the form has been submitted
                    button.addClass('loadingform').val('Loading...');
                },
                error: function (request, status, error) {
                    if( status == 500 ){
                        alert( 'Error while adding comment' );
                    } else if( status == 'timeout' ){
                        alert('Error: Server doesn\'t respond.');
                    } else {
                        // process WordPress errors
                        var wpErrorHtml = request.responseText.split("<p>"),
                            wpErrorStr = wpErrorHtml[1].split("</p>");
                        alert( wpErrorStr[0] );
                    }
                },
                success: function ( addedCommentHTML ) {
                    // if this post already has comments
                    if( commentlist.find("[rel='author']").length == 0 ){
                        // if no comments yet
                       $(".woocommerce-noreviews").hide();
                    }
                    // simple comment
                    commentlist.prepend( $(addedCommentHTML) );
                    $([document.documentElement, document.body]).animate({
                        scrollTop: (commentlist.find(".review-comments__item:first-child").offset().top - commentlist.find(".review-comments__item:first-child").outerHeight()-100)
                    }, 2000);
                    // clear textarea field
                    commentfield.val('');
                },
                complete: function(){
                    // what to do after a comment has been added
                    button.removeClass( 'loadingform' ).val( 'Submit' );
                }
            });
        }
        return false;
    });

    // forum comment submit
    function formValidate(form){
        let button = form.find("[type='submit']"), // submit button
            emailfield = form.find('#email'),
            authorfield = form.find('#author'),
            commentfield = form.find('#comment');

        if( authorfield.length )
            authorfield.validate();
        if( emailfield.length )
            emailfield.validateEmail();
        // validate comment in any case
        commentfield.validate();
        // if comment form isn't in process, submit it
        return (!button.hasClass( 'loadingform' )&&!authorfield.hasClass( 'error' )&&!emailfield.hasClass( 'error' )&&!commentfield.hasClass('error')) ? true : false;
    }

    function formSend(form){
        // define some vars
        var button = form.find("[type='submit']"), // submit button
            respond = form.closest(".topic-item").find(".add-question-block"), // comment form container
            commentfield = form.find('#comment');

        // if comment form isn't in process, submit it
        if (formValidate(form)){
            // ajax request
            $.ajax({
                type : 'POST',
                url : wpData.ajax_url, // admin-ajax.php URL
                data: form.serialize() + '&action=ajaxforum', // send form data + action parameter
                beforeSend: function(xhr){
                    // what to do just after the form has been submitted
                    button.addClass('loadingform').val('Loading...');
                },
                error: function (request, status, error) {
                    if( status == 500 ){
                        alert( 'Error while adding comment' );
                    } else if( status == 'timeout' ){
                        alert('Error: Server doesn\'t respond.');
                    } else {
                        // process WordPress errors
                        var wpErrorHtml = request.responseText.split("<p>"),
                            wpErrorStr = wpErrorHtml[1].split("</p>");
                        alert( wpErrorStr[0] );
                    }
                },
                success: function ( addedCommentHTML ) {
                    if($(addedCommentHTML).hasClass("comment-parent")){
                        // it was form for parent comment
                        respond.after($(addedCommentHTML));
                        let comment_id = $(addedCommentHTML).attr("id");
                        let form_child = cloneTopicReplyForm(comment_id);
                        $("#"+comment_id).find(".comment-child").append(form_child);
                        $("#"+comment_id).find(".comment-child form").submit(function(){
                            formSend($(this));
                        });
                    }else{
                        // it was child comment
                        let parent_comment_id = $(addedCommentHTML).attr("data-parent-comment");
                        $("#"+parent_comment_id).find(".answer-comment").before($(addedCommentHTML));
                    }
                    // clear textarea field
                    commentfield.val('');
                },
                complete: function(){
                    // what to do after a comment has been added
                    button.removeClass( 'loadingform' ).val( 'Send' );
                }
            });
        }
    }

    $(".single-topic-comment-form").submit(function(){
        formSend($(this));
        return false;
    });
});

// clone comment form
function cloneTopicReplyForm(comment_id){
    let $form = $("#"+comment_id).closest(".topic-item").find(".add-question-block.parent-form").clone();
    if($form.length){
        $form.removeClass("add-question-block parent-form");
        $form.addClass("answer-comment");
        let auhor = $form.find("h2").text();
        $form.find("h2").after("<h3>"+auhor+"</h3>");
        $form.find("h2").remove();
        $form.find("#comment").val('');
        $form.find("[name='comment_parent']").val(comment_id.replace("comment-",""));
        $form.find("[type='submit']").removeClass( 'loadingform' ).val( 'Send' );
        $form.find("#respond").attr("id", "respond-"+comment_id);
        let form_id = $form.find("form").attr("id");
        $form.find("form").attr("id", form_id+"-"+comment_id);
    }
    return $form;
}
/* end of validation for comment form */

/* validation of add topic form */
$(".add-topic-form").submit(function(){
    var button = $('.form-topic-submit'), // submit button
        title = $(this).find("[name='topic-name']"), // topic title
        description = $(this).find("[name='topic-description']"), // topic content
        topiclist = $('.nacc'), // container list topic
        topiclist_menu = $('.menu'), // container list topic sidebar
        message = $(this).find(".add-topic-notifications"), // form message field
        close_btn = $(this).closest(".modal-content").find(".close"), // close popup button
        filefield = $(this).find("[type='file']"); // form field with file

    console.log($(this).serialize());

    // clear form message field
    message.empty();

    // validate fields
    title.validate();
    description.validate();

    // if topic form isn't in process, submit it
    if ( !button.hasClass( 'loadingform' ) && !title.hasClass( 'error' ) && !description.hasClass( 'error' ) ){
        // var form_data = new FormData();
        // var file_data = filefield.prop('files')[0];
        // // console.log(file_data);
        // // form_data.append('file', file_data);
        // form_data.append('topic-name', title);
        // form_data.append('topic-description', description);
        // form_data.append('action', 'ajaxforum_topic_add');

        // ajax request
        $.ajax({
            type : 'POST',
            url : wpData.ajax_url, // admin-ajax.php URL
            // data: form_data,
            // contentType:false,
            // processData:false,
            data: $(this).serialize() + '&action=ajaxforum_topic_add', // send form data + action parameter
            beforeSend: function(xhr){
                // what to do just after the form has been submitted
                button.addClass('loadingform').val('Loading...');
            },
            error: function (request, status, error) {
                if( status == 500 ){
                    alert( 'Error while adding topic' );
                } else if( status == 'timeout' ){
                    alert('Error: Server doesn\'t respond.');
                } else {
                    // process WordPress errors
                    var wpErrorHtml = request.responseText.split("<p>"),
                        wpErrorStr = wpErrorHtml[1].split("</p>");
                    alert( wpErrorStr[0] );
                }
            },
            success: function ( addedTopicHTML ) {
                if($(addedTopicHTML).hasClass("error")){
                    message.append(addedTopicHTML);
                }else{
                    close_btn.click();

                    topiclist_menu.find(".active").removeClass("active");
                    topiclist.find("li.active").removeClass("active");

                    topiclist_menu.prepend( $(addedTopicHTML).find(".new-topic-item-menu") );
                    topiclist.prepend( $(addedTopicHTML).find(".new-topic-item-full") );
                }
                // clear topic fields
                title.val('');
                description.val('');
            },
            complete: function(){
                // what to do after a comment has been added
                button.removeClass( 'loadingform' ).val( 'Submit' );
            }
        });
    }
    return false;
});
/* end of validation of add topic form */

/* form topic comment form */
// $(".single-topic-comment-form").submit(function(){
//     // define some vars
//     var button = $(this).find("[type='submit']"), // submit button
//         respond = $(this).closest(".topic-item").find(".add-question-block"), // comment form container
//         emailfield = $(this).find('#email'),
//         authorfield = $(this).find('#author'),
//         commentfield = $(this).find('#comment'),
//         commentlist = $(this).closest(".topic-item").find('.comment-list'), // comment list container
//         cancelreplylink = $(this).closest(".topic-item").find('#cancel-comment-reply-link');
//
//     var parent_comment_id = ($(this).find("[name='parent-comment']").length) ? $(this).find("[name='parent-comment']").val() : 0;
//
//     // validation check
//     if( authorfield.length )
//         authorfield.validate();
//     if( emailfield.length )
//         emailfield.validateEmail();
//     // validate comment in any case
//     commentfield.validate();
//     // if comment form isn't in process, submit it
//     if ( !button.hasClass( 'loadingform' ) && !authorfield.hasClass( 'error' ) && !emailfield.hasClass( 'error' ) && !commentfield.hasClass( 'error' ) ){
//         // there is no validation errors
//         console.log($(this).serialize() + '&action=ajaxforumcomments');
//         // ajax request
//         $.ajax({
//             type : 'POST',
//             url : wpData.ajaxurl, // admin-ajax.php URL
//             data: $(this).serialize() + '&action=ajaxforumcomments', // send form data + action parameter
//             beforeSend: function(xhr){
//                 // what to do just after the form has been submitted
//                 button.addClass('loadingform').val('Loading...');
//             },
//             error: function (request, status, error) {
//                 if( status == 500 ){
//                     alert( 'Error while adding comment' );
//                 } else if( status == 'timeout' ){
//                     alert('Error: Server doesn\'t respond.');
//                 } else {
//                     // process WordPress errors
//                     var wpErrorHtml = request.responseText.split("<p>"),
//                         wpErrorStr = wpErrorHtml[1].split("</p>");
//
//                     alert( wpErrorStr[0] );
//                 }
//             },
//             success: function ( dataCommentHTML ) {
//                 console.log(dataCommentHTML);
//                 // clear textarea field
//                 commentfield.val('');
//             },
//             complete: function(){
//                 // what to do after a comment has been added
//                 button.removeClass( 'loadingform' ).val( 'Post Comment' );
//             }
//         });
//     }
//
//     return false;
// });
/* end of form topic comment form */