<div class="row">
    <label for="caption"> کپشن :</label><br/>

    <textarea id="caption" name="caption" class="form-control" rows="8"></textarea>

    <div style="width: 100% !important;" class="form-group mt-3">
        <label for="tags"> تگ ها :</label><br/>

        <input type="text" id="tags" name="tags" value=""
               data-role="tagsinput" class="form-control"/>
    </div>

</div>
<div class="row">
    <div class="form-group col-md-6">
        <label>اکانت ها:</label>
        <select name="accounts[]" class="selectpicker form-control" multiple
                data-live-search="true">
            @foreach($accounts as $account)
                <option value="{{$account->id}}">{{$account->username}}</option>

            @endforeach

        </select>
    </div>

    <div class="form-group col-md-6">
        <label for="keywords"> زمان ارسال :</label><br/>
        <select id="sent_at" name="sent_at"
                class="form-control">


            @foreach($sent_at as $key=>$value)

                <option value="{{$value}}">{{$key}}</option>

            @endforeach
        </select>
    </div>
</div>