<form method="POST" id="new_post" enctype="multipart/form-data">
    @csrf
    <div class="card" style="max-width: 1200px; margin: auto">
        <div class="card-body">
            <div class="row">


                <div class="col-md-6">

                    <div class="col-lg-12 mt-0 mb-4">

                        <div id="lfm" data-input="thumbnail" data-preview="holder" class="  text-center">
                            <div id="holder">
                                <img src="{{url('images/instagram/story.png')}}" width="150px" alt="Image" class="img-responsive">

                            </div>
                            <input id="thumbnail" class="form-control" type="hidden" name="filepath">


                        </div>
                      @include('user.post.new.fields')

                        <div class="col-lg-12 mr-4 ml-4">

                            <button type="button" id="new_post_btn"
                                    class="btn btn-success ladda-button ladda_btn mb-4 btn-block"
                                    data-style="expand-right">
                                <span class="ladda-label">ایجاد    </span>
                                <span class="ladda-spinner"></span></button>
                        </div>
                    </div>
                </div>


                <div class="col-md-6">
                    <div class="smartphone">
                        <div class="content">
                            <p class="text-center m-2">{{$type}}</p>

                            <div class="card bg-danger" id="__image"  >


                            </div>

                            <p id="_caption" class="text-right m-2"></p>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
</form>
<script>
    $('.selectpicker').selectpicker();

    var csrf_token = $('meta[name="csrf-token"]').attr('content');

    String.prototype.replaceAll = function (search, replacement) {
        var target = this;
        return target.replace(new RegExp(search, 'g'), replacement);
    };


    jQuery(document).ready(function () {

        $("#thumbnail").on("change", function (t) {

                var src = $(this).val();
                var myarr = src.split(',');
                if (myarr.length > 0) {

                    var html1 = '<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">  <ol class="carousel-indicators">';
                    var html2 = '<div class="carousel-inner">';

                    var status = '';
                    for (var i = 0; i < myarr.length; i++) {
                        var extension = myarr[i].substr((myarr[i].lastIndexOf('.') + 1));

                        if(i == 0) { status = "active"} else {status = ""};
                        html1 += ' <li data-target="#carouselExampleIndicators" data-slide-to="' + i + '" class="'+status+'"></li>';
                        if(extension=='mp4'){
                            html2 += ' <div class="carousel-item '+status+'">  <video  autoplay loop  style="height: 200px" class="d-block w-100"  > <source src="' + myarr[i] + '" /> </video> </div>';

                        }else{
                            html2 += ' <div class="carousel-item '+status+'">  <img  style="height: 200px" class="d-block w-100" src="' + myarr[i] + '" alt="First slide">  </div>';

                        }
                     }
                    html1 += "</ol>";
                    html2 += "</div>";
                    html2 += '<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev"> <span class="carousel-control-prev-icon" aria-hidden="true"></span>  <span class="sr-only">قبلی</span>  </a>  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">    <span class="carousel-control-next-icon" aria-hidden="true"></span>  <span class="sr-only">بعدی</span>  </a>  </div>';


                    $('#__image').html(html1 + html2);

                } else {
                    $('#__image').html('<img id="_image"  style="width: 100%"  src="'+myarr[0]+'"    onerror="this.onerror=null;this.src=\'http://localhost/instagram/public/my-files/files/user_1/plus-flat.png\';">');

                }

                setTimeout(function () {
                    $('#holder img').attr('src', "{{url('images/instagram/video.png')}}");


                }, 20)

            }
        );
        $("#caption").on("keyup", function (t) {


            var tags = $('#tags').val();

            $('#_caption').html('<span>' + $(this).val() + '</span>' + " " + '<span class="text-danger">' + tags.replaceAll(',', "#") + '</span>');


        });

        jQuery(document).on('change', "#tags", function (e) {


            var tags = $(this).val();

            $('#_caption').html('<span>' + $('#caption').val() + '</span>' + " " + '<span class="text-danger">' + tags.replaceAll(',', " #") + '</span>');

            e.preventDefault();
        });


        $("#new_post_btn").on("click", function (t) {

            var e = t.currentTarget,
                a = Ladda.create(e);

            a.start();

            $.ajax({
                url: 'create',
                method: 'POST',
                data: $('#new_post').serialize(),
                success: function (data, textStatus, jqXHR) {
                    if (textStatus === 'success') {
                        toastr.success(  "اطلاعات با موفقیت ثبت شد", "", {
                            progressBar: !0
                        });


                        $("#form_image_preview img").attr("src", "{{url('images/instagram/story.png')}}")
                        $('#new_post')[0].reset();
                        $('#__image').html('');
                        $('#holder').html('<img src="{{url('images/instagram/story.png')}}" width="150px" alt="Image" class="img-responsive">');
                        $("#tags").tagsinput('removeAll');
                    }


                },
                error: function (error) {

                    if (error.status === 422) {
                        var errors = $.parseJSON(error.responseText);
                        $.each(errors.errors, function (key, val) {

                            toastr.error(val[0], "خطا", {
                                progressBar: !0
                            });
                        });
                    } else {

                        console.log(error.responseText)
                        toastr.error("خطا در ثبت اطلاعات", "خطا ", {
                            progressBar: !0
                        });
                    }


                },

                complete: function () {
                    a.stop();
                }

            });


        })
    });


</script>
<script>
            {!! \File::get(base_path('vendor/unisharp/laravel-filemanager/public/js/stand-alone-button.js')) !!}
    var route_prefix = "{{ url('laravel-filemanager') }}";

    $('#lfm').filemanager('image', {prefix: route_prefix});
    $('#lfm2').filemanager('file', {prefix: route_prefix});

    $(document).ready(function () {

        // Define function to open filemanager window
        var lfm = function (options, cb) {
            var route_prefix = (options && options.prefix) ? options.prefix : '/laravel-filemanager';
            window.open(route_prefix + '?type=' + options.type || 'file', 'FileManager', 'width=900,height=600');
            window.SetUrl = cb;
        };

        // Define LFM summernote button
        var LFMButton = function (context) {
            var ui = $.summernote.ui;
            var button = ui.button({
                contents: '<i class="note-icon-picture"></i> ',
                tooltip: 'Insert image with filemanager',
                click: function () {

                    lfm({type: 'image', prefix: '/laravel-filemanager'}, function (lfmItems, path) {
                        lfmItems.forEach(function (lfmItem) {
                            context.invoke('insertImage', lfmItem.url);
                        });
                    });

                }
            });
            return button.render();
        };

        // Initialize summernote with LFM button in the popover button group
        // Please note that you can add this button to any other button group you'd like
        $('#summernote-editor').summernote({
            toolbar: [
                ['popovers', ['lfm']],
            ],
            buttons: {
                lfm: LFMButton
            }
        })
    });

</script>

