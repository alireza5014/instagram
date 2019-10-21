@foreach($posts as $post)



    <div class="col-lg-3 col-md-4 mb-2 col-sm-12 grid-item">
        <figure class="article_card">
            <div class="image">

            @if(sizeof($post->medias)>1)
                <div class="row">

                    <div class="card">
                        <div class="card-body">

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
                                            <img class="d-block w-100" src="{{url($media1->file)}}"
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
                        </div>
                    </div>

                </div>
            @elseif(sizeof($post->medias)==1)

                         <img src="{{url($post->medias[0]['file'])}}" alt="">


                @else
                    <img src="{{url('images/cover.jpg')}}" alt="">


                    @endif
            </div>
            <figcaption>
                <h5>{{$post->category->title}}</h5>

                <a href="javascript:void(0)">
                    هر چیز زیبایی دارد، فقط همه ی آدم ها آن را نمی بینند
                </a>
                <hr/>

                <ul class="list-inline">
                    <li class="list-inline-item"><img src="{{url($post->account->profile_pic_url)}}"
                                                      style="width: 30px;"/></li>
                    <li class="list-inline-item">{{$post->account->username}}</li>

                </ul>


                <footer>
                    <div class="date">   {{$post->created_at}}</div>
                    <div class="icons">
                        <a class="views"><i class="ion-android-delete btn btn-sm  btn-danger"></i> </a>
                        <a class="views"><i class="ion-edit btn btn-sm  btn-warning"></i> </a>

                    </div>
                </footer>
            </figcaption>
        </figure>
    </div>

@endforeach

