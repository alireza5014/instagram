@foreach($posts as $post)



    <div class="col-lg-3 col-md-4 mb-2 col-sm-12 grid-item">
        <figure class="article_card">
            <div class="image"><img src="{{url($post->file)}}" alt="Post Image"></div>
            <figcaption>
                <h5>{{$post->category->title}}</h5>

                    <a href="javascript:void(0)">
                        هر چیز زیبایی دارد، فقط همه ی آدم ها آن را نمی بینند
                    </a>
<hr/>

            <ul class="list-inline">
                <li class="list-inline-item"><img src="{{url($post->account->profile_pic_url)}}" style="width: 30px;"  /></li>
                <li class="list-inline-item">{{$post->account->username}}</li>

            </ul>





                <footer>
                    <div class="date">   {{$post->created_at}}</div>
                    <div class="icons">
                        <a class="views"><i class="ion-android-delete btn btn-sm  btn-danger"></i>  </a>
                        <a class="views"><i class="ion-edit btn btn-sm  btn-warning"></i> </a>

                    </div>
                </footer>
            </figcaption>
        </figure>
    </div>

@endforeach

