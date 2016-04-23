@extends('master')
@section('center_page')
        {{--{{var_dump($user)}}--}}
    <?php
        $background2 = "none";
        $background = "green" ;
        if ($user->image != null){
            $background = "url('" . url($user->image) . "')";
            $background2 = "url('" . url($user->image) . "')";
        }
        $current_user = Session::get('user');
    ?>
    <div class="row padding solidborder" style="background: none;border-radius: 10px;">

        <div class="row">
            <div class="col-md-4 text-center">
                <div class="" style="border: 0px dashed pink;background: transparent;border-radius: 5px;padding: 30px;">
                    <div class="" style="border:black 2px solid;min-height: 440px;background: center {{$background}} ; background-size: cover"></div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="" style="padding: 30px;border : 0px dashed black;background: center {{$background2}} ; background-size: cover;-webkit-filter: sepia(80%);border-radius: 10px">
                    <div class="" style="border:red 2px dashed;min-height: 440px;padding: 30px;font-size: 16px;background:rgba(0,0,0,0.2);color:black;position: relative;">
                        <h1>Profile</h1>
                        <p>First name : {{$user->Fname}}</p>
                        <p>Last name : {{$user->Lname}}</p>
                        <p>Email : {{$user->email}}</p>
                        <p>Gender : {{$user->gender}}</p>
                        <p>Birthday : {{$user->birthday}}</p>
                        <p>Nationality : {{$user->nationality}}</p>
                        <p>Account type : {{$user->type}}</p>
                        <p>Join date : {{$user->created_at}}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12"  >
                <div style="border-top: 3px white solid;height: 3px;margin: 30px 0px;"> </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <h1>History Review</h1>
            </div>
            <div class="col-md-12" style="padding: 30px">
                <table class="table">
                    <thead>
                    <tr>
                        <th>Review id</th>
                        <th>Title</th>
                        <th>Content</th>
                        <th>Created date</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($review as $rev)
                    <tr>
                        <td>{{$rev->review_id}}</td>
                        <td>{{$rev->title}}</td>
                        <td>" {{ mb_substr($rev->content,0,40)}}..."</td>
                        <td>{{$rev->created_at}}</td>
                        @if(isset($current_user))
                            @if($current_user[5]==$rev->link_user_id)
                                    <td><span><button class="btn btn-danger" onclick="removev({{$rev->review_id}})">Remove</button></span></td>
                            @endif
                        @endif
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
        <script>
            function removev(review_id) {
                post('/remove_review',{review_id:review_id},'post');
            };
            function post(path, params, method) {
                method = method || "post"; // Set method to post by default if not specified.

                // The rest of this code assumes you are not using a library.
                // It can be made less wordy if you use one.
                var form = document.createElement("form");
                form.setAttribute("method", method);
                form.setAttribute("action", path);

                for(var key in params){
                    if(params.hasOwnProperty(key)) {
                        var hiddenField = document.createElement("input");
                        hiddenField.setAttribute("type", "hidden");
                        hiddenField.setAttribute("name", key);
                        hiddenField.setAttribute("value", params[key]);

                        form.appendChild(hiddenField);
                    }
                }

                document.body.appendChild(form);
                form.submit();
            }
        </script>

@stop