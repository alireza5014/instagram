@foreach($posts as $post)
    <tr>
        <td class="d-flex align-items-center justify-content-center">
            <span class="dot_vz dot_vz_success"></span>
            <div class="text-left">
                <div class="text-success">تکمیل شده</div>
                <div class="text-dark">23 دی 1398</div>
            </div>
        </td>
        <td>{{$post->title}}</td>
        <td>آیپد لنوو 310</td>
        <td>14-06-2019</td>
        <td>50000تومان</td>
        <td>
            <ul class="d-flex justify-content-center">
                <li class="mr-3">
                    <button type="button" class="btn btn-inverse-secondary"><i
                                class="fa fa-edit"></i></button>
                </li>
                <li>
                    <button type="button" class="btn btn-inverse-danger"><i
                                class="ti-trash"></i></button>
                </li>
            </ul>
        </td>
    </tr>
@endforeach