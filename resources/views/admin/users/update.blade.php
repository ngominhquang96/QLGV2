@extends('admin.layout.index')
@section('content')

<div class="col-sm-9" id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">USER | 
                    <small>Update {{$user->fullname}}</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-7" style="padding-bottom:120px; margin: auto;">

                @if(count($errors) >0)
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $err)
                            {{$err}}<br>
                        @endforeach
                    </div>
                @endif
                @if (session('notification'))
                    <div class="alert alert-success">
                        {{session('notification')}}
                    </div>
                @endif
                <form  method="POST" id="form-update">
                   <!--  <input type="hidden" name = "_token" value="{{csrf_token()}}"/> -->
                     <div class="alert alert-danger success" style="display: none">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <p style="color: red; display: none" class="success"></p>
                    </div>

                    <div class="alert alert-danger error  errorUpdateUser" style="display: none">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <p style="color: red; display: none" class="error errorLogin"></p>
                    </div>

                    <div class="form-group">
                        <label>Full Name</label>
                        <input class="form-control" id="fullname" name="fullname" placeholder="Nguyen Van A" value="{{$user->fullname}}" />
                        <p style="color: red ; display: none" class="error errorName"></p>
                    </div>


                    <div class="form-group">
                        <label>Email</label>
                        <input class="form-control" id="email" name="email" placeholder="somebody@example.com"  value="{{$user->email}}" readonly="" />
                        <p style="color: red ; display:  none" class="error errorEmail"></p>
                    </div>

                    <div class="form-group">
                        <label>Password</label>
                        <input type="password"  class="form-control password" id="password" name="password" placeholder="Password"  readonly="" />
                        <p style="color: red ; display: none" class="error errorPassword"></p>
                    </div>

                    <div class="form-group">
                        <label>Phone Number</label>
                        <input type="text"  class="form-control " id="phoneNumber" name="phoneNumber" placeholder="0123******"  />
                        <p style="color: red ; display: none" class="error errorPassword"></p>
                    </div>

                    <div class="form-group">
                        <label class="">Date of Birth</label>
                        <div> 
                            <select id="year" name="year" class="browser-default custom-select col-sm-2">
                                <?php 
                                    $start_year = 2018;
                                    $end_year   = 1900;
                                    for( $j=$start_year; $j>=$end_year; $j-- ) {
                                         echo '<option value='.$j.'>'.$j.'</option>';
                                    }
                                ?>
                            </select>           
                            <select id="month" name="month" class="browser-default custom-select col-sm-3">
                                <option value="1">January</option>
                                <option value="2">February</option>
                                <option value="3">March</option>
                                <option value="4">April</option>
                                <option value="5">May</option>
                                <option value="6">June</option>
                                <option value="7">July</option>
                                <option value="8">August</option>
                                <option value="9">September</option>
                                <option value="10">October</option>
                                <option value="11">November</option>
                                <option value="12">December</option>
                            </select> 

                            <select id="day" name="day" class="browser-default custom-select col-sm-2">
                                <?php 
                                    $start_day = 1;
                                    $end_day   = 31;
                                    for( $j=$start_day; $j<=$end_day; $j++ ) {
                                         echo '<option value='.$j.'>'.$j.'</option>';
                                    }
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>User Level</label>
                        <div>
                            <label class="radio-inline">
                                <input name="level" value="1" 
                                @if ($user->level ==1)
                                    {{"checked"}}
                                @endif
                                 type="radio">Admin
                            </label>
                            <label class="radio-inline">
                                <input name="level" value="0" 
                                @if($user->level ==0)
                                    {{"checked"}}
                                @endif
                                type="radio">Member
                             </label>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-default"  style="margin: 0 43%;">UPDATE</button>
                <form>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
@endsection
@section('script')
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.17.0/dist/jquery.validate.min.js" ></script>
<script>
    $(function(){

        $('#form-update').validate({
            rules : {
                    'fullname' : {
                        required : true,
                        minlength : 5,
                        maxlength: 50
                    },
                    'email' : {
                        required : true,
                        email : true, 
                    },
                    // 'password' : {
                    //     required : true,
                    //     minlength : 6
                    // },
                    'phoneNumber' : {
                        required : true,
                        minlength : 10,
                        maxlength:10,
                    },
            },
            messages : {
                    'fullname' : {
                        required : "fullname la truong bat buoc",
                        minlength : "fullname phai co it nhat 5 ki tu",
                        maxlength : "fullname phai co nhieu nhat 50 ki tu"
                    },
                    'email' : {
                        required : "Email la truong bat buoc",
                        email : "Email phai dung dinh dang"
                    },
                    // 'password' : {
                    //     required : " Password la truong bat buoc",
                    //     minlength : " Password phai co it nhat 6 ki tu"
                    // },
                    'phoneNumber' : {
                        required : "phoneNumber la truong bat buoc",
                        'minlength' : 'phoneNumber phai co 10 so',
                        'maxlength' : 'phoneNumber phai co 10 so',
                    },
            },
            submitHandler:function(){
                $year = $('#year').val();
                $month= $('#month').val();
                $day = $('#day').val();
                $birth = $year + '-' + $month + '-' + $day;
                $id = '{{$user->id}}';
                $url = $id;
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    'url' : $url,
                    'data' : {
                        'fullname' : $('#fullname').val(),
                        'email' : $('#email').val(),
                        // 'password' : $('#password').val(),
                        'phoneNumber' : $('#phoneNumber').val(),
                        'level' : $('[name="level"]:radio:checked').val(),
                        'birth' : $birth,

                    },
                    'type' : 'POST',
                    success:function(data){
                        console.log(data);
                        if (data.error == true) {
                        }else{
                            window.location.href = "http://localhost/QLGV/public/admin/users/list";
                        }
                    }
                });
            }
        });
    });
</script>
@endsection
