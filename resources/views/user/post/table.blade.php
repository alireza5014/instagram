@foreach($posts as $post)


    <tr>
        <td>{{$post->id}}</td>
        <td>
            <ul class="list-inline mt-2">
                <li class="list-inline-item  "><img class="rounded-circle"
                                                    src="{{url($post->account->profile_pic_url)}}"
                                                    style="width: 30px;"/></li>
                <li class="list-inline-item">{{$post->account->username}}</li>

            </ul>

            <p>{{$post->category->title}}</p>
        </td>
        <td>
            <div class="image">

                @if(sizeof($post->medias)>1)


                    <div id="carouselExampleIndicators{{$post->id}}" class="carousel slide"
                         data-ride="carousel">
                        <ol class="carousel-indicators">
                            <?php $x = 0;$y = 0 ?>
                            @foreach($post->medias as $media)
                                <li data-target="#carouselExampleIndicators"
                                    class="@if($x==0) active @endif" data-slide-to="{{$x++}}"></li>

                            @endforeach

                        </ol>
                        <div class="carousel-inner">

                            @foreach($post->medias as $media1)
                                <div class="carousel-item @if($y==0) active @endif">
                                    <img class="   " style="width: 80px"
                                         src="{{url($media1->file)}}"
                                         data-container="{{$y++}}" alt="First slide">
                                </div>
                            @endforeach


                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleIndicators{{$post->id}}"
                           role="button"
                           data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">قبلی</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators{{$post->id}}"
                           role="button"
                           data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">بعدی</span>
                        </a>


                    </div>
                @elseif(sizeof($post->medias)==1)

                    <img style="width: 80px" class="rounded" src="{{url($post->medias[0]['file'])}}" alt="">


                @else
                    <img style="width: 80px" class="rounded" src="{{url('images/cover.jpg')}}" alt="">


                @endif


            </div>
        </td>


        <td>
            <p>{{$post->caption}}</p>
            {{str_replace(',',' #',$post->tags)}}
        </td>
        <td>
            زمان ثبت : <p dir="ltr"> {{$post->created_at}}</p>
            زمان ارسال : <p dir="ltr"> {{$post->sent_at}}</p>
        </td>

        <td>
            @if(\Carbon\Carbon::now()<$post->sent_at)
                <span class="badge badge-info">منتظر ارسال</span>

            @else

                <span class="badge badge-success">ارسال شده</span>

            @endif
        </td>
        <td>
            <ul class="d-flex justify-content-center">
                <li class="mr-3"><a href="#" class="text-primary"><i class="fa fa-edit"></i></a></li>
                <li><a href="#" class="text-danger"><i class="ti-trash"></i></a></li>
            </ul>
        </td>
    </tr>

@endforeach
