@extends('admin.layout.index')

@section('content') 
<!-- Page Content -->
<div class="col-sm-9" id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 labelList">
                <br>
                <h1 class="page-header">USER | 
                    <small>Create Account</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->

            <div class="col-lg-7" style="padding-bottom:120px; margin: auto;">
            <br>
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
                <form  method="POST" role="form" id="form-addUser">
                       
                    <div class="alert alert-danger error  errorcreateaccount" style="display: none">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <p style="color: red; display: none" class="error errorcreateaccount "></p>
                    </div>

                    <div class="alert alert-success   success" style="display: none">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <p style="color: #00ff59; display: none" class="success"></p>
                    </div>

                    <!--  email -->
                    <div class="form-group">
                        <label>Email</label>
                        <input class="form-control" id="email" name="email" placeholder="somebody@example.com"  value="{{old('email')}}" />
                        <p style="color: red ; display:  none" class="error errorEmail"></p>
                    </div>

                    <!-- password -->
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" id="password" placeholder="Password" name="password" value="{{old('password')}}"  autocomplete="current-password"/>
                        <p style="color: red ; display: none" class="error errorPassword"></p>
                    </div>

                   <!--  name -->
                    <div class="form-group">
                        <label>Full Name</label>
                        <input class="form-control" id="fullname" name="fullname" placeholder="Nguyen Van A" value="{{old('fullname')}}" />
                        <p style="color: red ; display: none" class="error errorName"></p>
                    </div>

                    <div class="form-group">
                        <label>Gender</label><br>
                        <label class="radio-inline">
                            <input name="level" value="1" checked="" type="radio">Male
                        </label>
                        <label class="radio-inline">
                            <input name="level" value="0" type="radio">Female
                        </label>
                    </div>

                     <div class="form-group">
                        <label>Phone Number</label>
                        <input type="text"  class="form-control " id="phoneNumber" name="phoneNumber" placeholder="0123******"  />
                        <p style="color: red ; display: none" class="error errorPhoneNumber"></p>
                    </div>

                    <div class="form-group">
                        <label class="">Date of Birth</label>
                        <div>   
                            <select id="year" name="year" class="browser-default custom-select col-sm-2">
                                <?php 
                                    $start_year = 2018;
                                    $end_year   = 1950;
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


                    <!-- Level -->
                    <div class="form-group">
                        <label>User Level</label><br>
                        <label class="radio-inline">
                            <input name="level" value="1" checked="" type="radio">Admin
                        </label>
                        <label class="radio-inline">
                            <input name="level" value="0" type="radio">Member
                        </label>
                    </div>

                    <div class="form-submit">
                        <button type="submit" class="btn btn-default" style="margin: 0 43%;">CREATE</button>
                    </div>
                <form>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
     <!--end class content-->
    <div class="footer" style="text-align: center; color: blue;">
    © 2017  IAT Social Network, Inc. Powered by <a href="https://www.facebook.com/IA-Technology-Corporation-248433228915394/" style="font-weight: bold;">IA Technology</a>.     
    </div>
</div>
<!-- /#page-wrapper -->
@endsection
@section('script')
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.17.0/dist/jquery.validate.min.js" ></script>
<script>
    $(function(){
        $('#form-addUser').validate({
            rules : {
                    'email' : {
                        required : true,
                        email : true, 
                    },
                    'password' : {
                        required : true,
                        minlength : 6
                    },
                    'fullname' : {
                        required : true,
                        minlength : 6,
                        maxlength: 50
                    },
                    'phoneNumber' : {
                        required : true,
                        minlength : 10,
                        maxlength : 10,
                    },
            },
            messages : {
                    'email' : {
                        required : "Email la truong bat buoc",
                        email : "Email phai dung dinh dang"
                    },
                    'password' : {
                        required : " Password la truong bat buoc",
                        minlength : " Password phai co it nhat 6 ki tu"
                    },
                    'fullname' : {
                        required : "fullname la truong bat buoc",
                        minlength : "fullname phai co it nhat 6 ki tu",
                        maxlength : "fullname phai co nhieu nhat 50 ki tu"
                    },
                    'phoneNumber' : {
                        required : "phoneNumber la truong bat buoc",
                        minlength : "phoneNumber phai co 10 ki tu",
                        maxlength : "phoneNumber phai co 10 ki tu"
                    },
            },
             submitHandler:function(){
                $year = $('#year').val();
                $month= $('#month').val();
                $day = $('#day').val();
                $birth = $year + '-' + $month + '-' + $day;
                $url = '';
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    'url' : $url,
                    'data' : {
                        'email' : $('#email').val(),
                        'password' : $('#password').val(),
                        'fullname' : $('#fullname').val(),
                        'level' : $('[name="level"]:radio:checked').val(),
                        'phoneNumber' : $('#phoneNumber').val(),
                        'birthDay' : $birth,
                    },
                    'type' : 'POST',
                    success:function(data){
                        console.log(data);
                        if (data.error == true) {
                            $('.error').hide();
                            if (data.message.email != undefined) {
                                $('.errorEmail').show().text(data.message.email[0]);
                            }
                            if (data.message.password != undefined) {
                                $('.errorPassword').show().text(data.message.password[0]);
                            }
                            if (data.message.fullname != undefined) {
                                $('.errorName').show().text(data.message.fullname[0]);
                            }
                            if (data.message.phoneNumber != undefined) {
                                $('.errorPhoneNumber').show().text(data.message.phoneNumber[0]);
                            }
                            if (data.message.errorcreateaccount != undefined) {
                                $('.errorcreateaccount').show().text(data.message.errorcreateaccount[0]);
                            }
                        }else{
                            $('.success').show().text(data.message.success[0]);
                        }
                    }
                });
            }
        });
    });
</script>
@endsection
