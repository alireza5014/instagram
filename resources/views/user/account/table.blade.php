@foreach($accounts as $account)



<div class="col-lg-4 col-md-6  mb-3 col-sm-12 grid-item">
    <div class="team_member">
        <img src="{{$account->profile_pic_url}}" alt="Team Member">
        <div class="member_name">
            <h3>  {{$account->username}}</h3>
            <span>    {{$account->full_name}}  </span>
        </div>
        <p style="min-height: 100px">{{$account->biography}}</p>

        <ul>
            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
        </ul>
    </div>
</div>


@endforeach
