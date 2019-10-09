/* ========================================================================

Toastr Init

=========================================================================
 */


"use strict";


/*======== Doucument Ready Function =========*/
jQuery(document).ready(function ($) {

    $('.toastr_success').on('click',function(){
        // Display a success toast, with a title
        toastr.success('لذت بردن از طوفان قلعه!', 'معجزه ماکس می گوید');
    });
    $('.toastr_error').on('click',function(){
        // Display an error toast, with a title
        toastr.error('من فکر نمی کنم این کلمه بدان معنی باشد که شما فکر می کنید.', 'غیر قابل تصور است!')
    });

    $('.toastr_warning').on('click',function(){
        // Display a warning toast, with no title
        toastr.warning('نام من اینیگو مونتویا است. پدرت را کشتی، آماده مرگ خواهی شد!')
    });

    $('.toastr_info').on('click',function(){
        // Display a success toast, with a title
        toastr.info('لذت بردن از طوفان قلعه!', 'معجزه ماکس می گوید');
    });

    $(".toastr_top_left_btn").on("click", function() {
        toastr.info("لورم ایپسوم متن ساختگی با تولید سادگی", "بالا چپ!", {
            positionClass: "toastr_top_left",
            containerId: "toastr_top_left",
            timeOut: "50000"
        })
    });

    $(".toastr_top_center_btn").on("click", function() {
        toastr.info("لورم ایپسوم متن ساختگی با تولید سادگی", "بالا مرکز!", {
            positionClass: "toastr_top_center",
            containerId: "toastr_top_center",
            timeOut: "50000"
        })
    });

    $(".toastr_top_right_btn").on("click", function() {
        toastr.info("لورم ایپسوم متن ساختگی با تولید سادگی", "بالا راست!", {
            positionClass: "toastr_top_right",
            containerId: "toastr_top_right",
            timeOut: "50000"
        })
    });

    $(".toastr_bottom_left_btn").on("click", function() {
        toastr.info("لورم ایپسوم متن ساختگی با تولید سادگی", "پایین چپ!", {
            positionClass: "toastr_bottom_left",
            containerId: "toastr_bottom_left",
            timeOut: "50000"
        })
    });

    $(".toastr_bottom_center_btn").on("click", function() {
        toastr.info("لورم ایپسوم متن ساختگی با تولید سادگی", "پایین مرکز!", {
            positionClass: "toastr_bottom_center",
            containerId: "toastr_bottom_center",
            timeOut: "50000"
        })
    });

    $(".toastr_bottom_right_btn").on("click", function() {
        toastr.info("لورم ایپسوم متن ساختگی با تولید سادگی", "پایین راست!", {
            positionClass: "toastr_bottom_right",
            containerId: "toastr_bottom_right",
            timeOut: "50000"
        })
    });

    $(".toast_close_btn").on("click", function() {
        toastr.error("لورم ایپسوم متن ساختگی با تولید سادگی", "دکمه بستن", {
            closeButton: !0
        })
    });

    $(".toast_progress_btn").on("click", function() {
        toastr.success("لورم ایپسوم متن ساختگی با تولید سادگی", "نوار پیشرفت", {
            progressBar: !0
        })
    });

    $(".toast_notification_btn").on("click", function() {
        toastr.warning("لورم ایپسوم متن ساختگی با تولید سادگی", "معجزه ماکس می گوید")
    });

    $(".toast_clear_btn").on("click", function() {
        toastr.error('پاک کردن خود<button type="button" class="btn btn-light mt-2 d-block">پاک کردن</button>', "دکمه توست")
    });

    $(".toast_show_btn").on("click", function() {
        toastr.info("لورم ایپسوم متن ساختگی با تولید سادگی", "معجزه ماکس می گوید")
    });

    $(".toast_remove_btn").on("click", function() {
        toastr.remove()
    });

    $(".toast_clear_toastr_btn").on("click", function() {
        toastr.clear()
    });

    $(".toast_slide_btn").on("click", function() {
        toastr.error("لورم ایپسوم متن ساختگی با تولید سادگی", "اثر اسلاید!", {
            showMethod: "slideDown",
            hideMethod: "slideUp",
        })
    });

    $(".toast_fade_btn").on("click", function() {
        toastr.success("لورم ایپسوم متن ساختگی با تولید سادگی", "افکت محو شدنی!", {
            showMethod: "fadeIn",
            hideMethod: "fadeOut",
        })
    })

});
/*======== End Doucument Ready Function =========*/