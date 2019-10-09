/* ========================================================================

Sweet Alert Init

=========================================================================
 */


"use strict";


/*======== Doucument Ready Function =========*/
jQuery(document).ready(function ($) {

    // Success Alert
    $(".sweet_success_btn").on("click", function () {
        swal({
            type: "success",
            title: "موفقیت!",
            text: "کار شما ذخیره شده است",
            buttonsStyling: !1,
            confirmButtonClass: "btn btn-success"
        })
    });

    // Info Alert
    $(".sweet_info_btn").on("click", function () {
        swal({
            type: "info",
            title: "هشدار اطلاعات!",
            text: "در اینجا متن هشدار اطلاعات است",
            buttonsStyling: !1,
            confirmButtonClass: "btn btn-info"
        })
    });

    // Warning Alert
    $(".sweet_warning_btn").on("click", function () {
        swal({
            type: "warning",
            title: "هشدار",
            text: "در اینجا متن هشدار است",
            buttonsStyling: !1,
            confirmButtonClass: "btn btn-warning"
        })
    });

    // Error Alert
    $(".sweet_danger_btn").on("click", function () {
        swal({
            type: "error",
            title: "ارور!",
            text: "چیزی اشتباه رفت!",
            confirmButtonText: "رد کردن",
            buttonsStyling: !1,
            confirmButtonClass: "btn btn-danger"
        })
    });

    // Basic Alert
    $(".sweet_basic_btn").on("click", function () {
        swal("چیزی وجود دارد.")
    });

    // Alert With Title
    $(".alert_title").on("click", function () {
        swal("اینرنت؟", "این چیز هنوز در اطراف است؟")
    });

    // Alert with Timer
    $(".sweet_alert_timer").on("click", function () {
        swal({
            title: "بسته شدن خودکار هشدار!", html: "من بسته خواهم شد در <strong>2</strong> ثانیه.", timer: 2e3
        }).then(t => {
            t.dismiss === swal.DismissReason.timer && console.log("من با تایمر بسته شدم")
        })
    });

    // Alert with Confirmation
    $(".sweet_alert_confirm").on("click", function () {
        swal({
            title: "شما مطمئن هستید؟",
            text: "شما قادر نخواهید بود این را دوباره برگردانید!",
            type: "warning",
            showCancelButton: !0,
            confirmButtonText: "بله، آن را حذف کنید!",
            cancelButtonText: "نه، لغو!",
            confirmButtonClass: "btn btn-success mr-5",
            cancelButtonClass: "btn btn-danger",
            buttonsStyling: !1
        }).then((result) => {
            if (result.value) {
                swal("حذف شده!", "فایل خیالی شما حذف شده است.", "success")
            } else if (
                // Read more about handling dismissals
                result.dismiss === Swal.DismissReason.cancel
            ) {
                swal("لغو شد", "فایل خیالی شما امن است :)", "error")
            }
        })
    });

    // Alert With RTL
    $(".alert_rtl").on("click", function () {
        swal({
            title: 'هل تريد الاستمرار؟',
            confirmButtonText:  'نعم',
            cancelButtonText:  'لا',
            showCancelButton: true,
            showCloseButton: true,
            target: document.getElementById('rtl-container')
        })
    });

    // Alert With Ajax Request
    $(".alert_ajax").on("click", function () {
        swal({
            title: 'نام کاربری گیتهاب خود را وارد کنید',
            input: 'text',
            inputAttributes: {
                autocapitalize: 'off'
            },
            showCancelButton: true,
            confirmButtonText: 'جستجو',
            showLoaderOnConfirm: true,
            preConfirm: (login) => {
                return fetch(`//api.github.com/users/${login}`)
                    .then(response => {
                        if (!response.ok) {
                            throw new Error(response.statusText)
                        }
                        return response.json()
                    })
                    .catch(error => {
                        Swal.showValidationMessage(
                            `Request failed: ${error}`
                        )
                    })
            },
            allowOutsideClick: () => !Swal.isLoading()
        }).then((result) => {
            if (result.value) {
                Swal.fire({
                    title: `${result.value.login}'s avatar`,
                    imageUrl: result.value.avatar_url
                })
            }
        })
    });

    // Alert With QUESTIONNAIRE
    $(".alert_question").on("click", function () {
        Swal.mixin({
            input: 'text',
            confirmButtonText: 'بعدی &rarr;',
            showCancelButton: true,
            progressSteps: ['1', '2', '3']
        }).queue([
            {
                title: 'سوال 1',
                text: 'Chaining swal2 modals is easy'
            },
            'سوال 2',
            'سوال 3'
        ]).then((result) => {
            if (result.value) {
                Swal.fire({
                    title: 'همه انجام شده است!',
                    html:
                        'پاسخ شما: <pre><code>' +
                        JSON.stringify(result.value) +
                        '</code></pre>',
                    confirmButtonText: 'دوست داشتني!'
                })
            }
        })
    });

    // Alert With Custom image
    $(".alert_image").on("click", function () {
        Swal.fire({
            title: 'شیرین!',
            text: 'مدال با یک تصویر سفارشی.',
            imageUrl: 'images/blog-listing/03.jpg',
            imageWidth: 400,
            imageHeight: 200,
            imageAlt: 'Custom image',
            animation: false
        })
    });
});
/*======== End Doucument Ready Function =========*/