@extends('layouts.app')

@section('header')

    @parent


    <title>{{ trans('laravel-filemanager::lfm.title-page') }}</title>
    <link rel="shortcut icon" type="image/png" href="{{ url('vendor/laravel-filemanager/img/72px color.png') }}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">

    <link rel="stylesheet" href="{{ url('vendor/laravel-filemanager/css/cropper.min.css') }}">
    <link rel="stylesheet" href="{{ url('vendor/laravel-filemanager/css/dropzone.min.css') }}">
    <link rel="stylesheet" href="{{ url('vendor/laravel-filemanager/css/mime-icons.min.css') }}">
    <style>{!! \File::get(base_path('vendor/unisharp/laravel-filemanager/public/css/lfm.css')) !!}</style>
@endsection

@section('content')
    <div class="vz_main_content">

    @include('user.file_manager.content')
    </div>
@endsection

@section('foot')

    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <script src="{{ asset('vendor/laravel-filemanager/js/cropper.min.js') }}"></script>
    <script src="{{ asset('vendor/laravel-filemanager/js/dropzone.min.js') }}"></script>
    <script>
        var lang = {!! json_encode(trans('laravel-filemanager::lfm')) !!};
        var actions = [
            {
              name: 'use',
              icon: 'check',
              label: 'Confirm',
              multiple: true
            },
            {
                name: 'rename',
                icon: 'edit',
                label: lang['menu-rename'],
                multiple: false
            },
            {
                name: 'download',
                icon: 'download',
                label: lang['menu-download'],
                multiple: true
            },
            // {
            //   name: 'preview',
            //   icon: 'image',
            //   label: lang['menu-view'],
            //   multiple: true
            // },
            {
                name: 'move',
                icon: 'paste',
                label: lang['menu-move'],
                multiple: true
            },
            {
                name: 'resize',
                icon: 'arrows-alt',
                label: lang['menu-resize'],
                multiple: false
            },
            {
                name: 'crop',
                icon: 'crop',
                label: lang['menu-crop'],
                multiple: false
            },
            {
                name: 'trash',
                icon: 'trash',
                label: lang['menu-delete'],
                multiple: true
            },
        ];

        var sortings = [
            {
                by: 'alphabetic',
                icon: 'sort-alpha-down',
                label: lang['nav-sort-alphabetic']
            },
            {
                by: 'time',
                icon: 'sort-numeric-down',
                label: lang['nav-sort-time']
            }
        ];
    </script>
    <script>{!! \File::get(base_path('vendor/unisharp/laravel-filemanager/public/js/script.js')) !!}</script>
    {{-- Use the line below instead of the above if you need to cache the script. --}}
    {{-- <script src="{{ asset('vendor/laravel-filemanager/js/script.js') }}"></script> --}}
    <script>
        Dropzone.options.uploadForm = {
            paramName: "upload[]", // The name that will be used to transfer the file
            uploadMultiple: false,
            parallelUploads: 5,
            timeout:0,
            clickable: '#upload-button',
            dictDefaultMessage: lang['message-drop'],
            init: function() {
                var _this = this; // For the closure
                this.on('success', function(file, response) {
                    if (response == 'OK') {
                        loadFolders();
                    } else {
                        this.defaultOptions.error(file, response.join('\n'));
                    }
                });
            },
            headers: {
                'Authorization': 'Bearer ' + getUrlParam('token')
            },

            {{--acceptedFiles: "{{ implode(',', $helper->availableMimeTypes()) }}",--}}
            {{--maxFilesize: ('{{ $helper->maxUploadSize() }}' / 1000)--}}
        }
    </script>
    @endsection
