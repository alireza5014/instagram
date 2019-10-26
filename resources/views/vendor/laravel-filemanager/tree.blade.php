<div class="m-3 d-block d-lg-none">
  <h1 style="font-size: 1.5rem;">مدیریت فایل    </h1>
  {{--<small class="d-block">Ver 2.0</small>--}}
  <div class="row mt-3">
    <div class="col-4">
      <img src="{{ asset('vendor/laravel-filemanager/img/152px color.png') }}" class="w-100">
    </div>

    <div class="col-8">
      <p>فضای دیسک</p>

      <?php
        $current_size=getFolderSize(public_path('my-files/files/'.getUser('id')));
      $current_size=getFolderSize();
      $total_size=getUser('disk_size');
        $percent_usage=$current_size/$total_size*100;
      ?>
      <p dir="ltr">{{$current_size}} Mb (Max : {{$total_size}} Mb)</p>


    </div>
  </div>
  <div class="progress mt-3" style="height: .5rem;">
    <div class="progress-bar progress-bar-striped progress-bar-animated  bg-main" role="progressbar" style="width: {{$percent_usage}}%"  aria-valuemin="0" aria-valuemax="100"></div>
  </div>
</div>

<ul class="nav nav-pills flex-column">
  @foreach($root_folders as $root_folder)
    <li class="nav-item">
      <a class="nav-link" href="#" data-type="0" data-path="{{ $root_folder->url }}">
        <i class="fa fa-folder fa-fw"></i> {{ $root_folder->name }}
      </a>
    </li>
    @foreach($root_folder->children as $directory)
    <li class="nav-item sub-item">
      <a class="nav-link" href="#" data-type="0" data-path="{{ $directory->url }}">
        <i class="fa fa-folder fa-fw"></i> {{ $directory->name }}
      </a>
    </li>
    @endforeach
  @endforeach
</ul>
