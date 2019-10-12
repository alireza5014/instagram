@foreach($posts as $post)
    <tr>
        <td><img class="img-thumbnail img-responsive" src="{{url($post->image_path)}}" width="100px" /> </td>

        <td class="d-flex align-items-center justify-content-center">

            <div class="text-left">
                <div class="text-success">{{$post->publish}}</div>
                 <div class="text-dark"><i class="fa fa-heart mr-2"></i> {{$post->likes_count}}     </div>
                <div class="text-dark"><i class="fa fa-comment mr-2"></i>  {{$post->comments_count}}     </div>
                <div class="text-dark"><i class="fa fa-eye mr-2"></i>  {{$post->views_count}}     </div>
                <div class="text-dark"><i class="fa fa-clock-o mr-2"> </i> {{$post->created_at}}     </div>

            </div>
        </td>
        <td>{{$post->title}}</td>
        <td>{{$post->abstract}}   </td>

        <td>
            <ul class="d-flex justify-content-center">
                <li class="mr-3">
                    <a href="{{route('user.post.edit',['id'=>$post->id])}}" class="btn btn-inverse-secondary"><i
                                class="fa fa-edit"></i></a>
                </li>
                <li>
                    <button type="button" class="btn btn-inverse-danger"><i
                                class="ti-trash"></i></button>
                </li>
            </ul>
        </td>
    </tr>
@endforeach
