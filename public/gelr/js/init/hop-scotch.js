/* ========================================================================

HopScotch Init

=========================================================================
 */


"use strict";


/*======== Doucument Ready Function =========*/
var tour;
$(document).ready(function() {
    tour= {
        id: "hello-hopscotch",
        steps: [
            {
                title: "محل اعلانات",
                content: "این هشدار برای قالب است که شما می توانید اعلان را بررسی کنید.",
                target: ".navbar-nav-right",
                placement: "right"
            },
            {
                title: "ناحیه لوگو",
                content: "نقطه استفاده از لورم اپیزوم این است که توزیع نرمال از حروف را بیشتر یا کمتر، به عنوان مخالف.",
                target: ".rt_logo",
                placement: "bottom"
            },
            {
                title: "دکمه تور",
                content: "نقطه استفاده از لورم اپیزوم این است که توزیع نرمال از حروف را بیشتر یا کمتر، به عنوان مخالف",
                target: "startTourBtn",
                placement: "right"
            }
        ]
    }
});
$("#startTourBtn").on("click", function(t) {
    hopscotch.startTour(tour)
});
/*======== End Doucument Ready Function =========*/