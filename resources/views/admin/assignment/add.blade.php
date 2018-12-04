@extends('admin.layout.index')

@section('content')
<!-- Page Content -->
<div class="col-sm-9" id="page-wrapper" >
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 labelList">
                <br>
                <h1 class="page-header">ASSIGNMENT |
                    <small>Create Assignment</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-sm-7" style="padding-bottom:120px; margin: auto;">
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
                <form  method="POST" role="form" id="form-addAssignment">
                       
                    <div class="alert alert-danger error  errorcreateAssignment" style="display: none">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <p style="color: red; display: none" class="error errorcreateAssignment "></p>
                    </div>

                    <div class="alert alert-success success  " style="display: none">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                         <p style="color: #00ff59; display: none" class="success"></p>
                    </div>

                    <!--  email -->
                    <div class="form-group">
                        <label>Full Name</label>
                        <select class="form-control" id="idUser" name="idUser" placeholder="Please Enter idUser">
                            @foreach(App\users::where('level',0)->get() as $user)
                            <option value="{{$user->id}}">{{$user->fullname}}</option>
                            @endforeach
                        </select>
                        <p style="color: red ; display:  none" class="error errorEmail"></p>

                    </div>

                    
                    <div class="form-group">
                        <label>Course</label>
                        <select type="text" class="form-control" id="idCourse" name="idCourse">
                            @foreach(App\courses::all() as $course)
                            <option value="{{$course->id}}">{{$course->nameCourse}}</option>
                            @endforeach
                        </select>
                        <p style="color: red ; display: none" class="error errorPassword"></p>
                    </div>
                    <div class="form-group">
                        <label>Time Start</label>
                        <div>  
                            <select id="yearStart" name="yearStart" class="browser-default custom-select col-sm-2">
                                       <?php 
                                            $start_year = 2015;
                                            $end_year   = 2050;
                                            for( $j=$start_year; $j<=$end_year; $j++ ) {
                                                 echo '<option value='.$j.'>'.$j.'</option>';
                                            }
                                       ?>
                            </select>         
                            <select id="monthStart" name="monthStart" class="browser-default custom-select col-sm-3">
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

                            <select id="dayStart" name="dayStart" class="browser-default custom-select col-sm-2">
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
                        <label>Time Finish</label>
                        <div>  
                            <select id="yearFinish" name="yearFinish" class="browser-default custom-select col-sm-2">
                                       <?php 
                                            $start_year = 2015;
                                            $end_year   = 2050;
                                            for( $j=$start_year; $j<=$end_year; $j++ ) {
                                                 echo '<option value='.$j.'>'.$j.'</option>';
                                            }
                                       ?>
                            </select>         
                            <select id="monthFinish" name="monthFinish" class="browser-default custom-select col-sm-3">
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

                            <select id="dayFinish" name="dayFinish" class="browser-default custom-select col-sm-2">
                                <?php 
                                    $start_day = 1;
                                    $end_day   = 31;

                                    for( $j=$start_day; $j<=$end_day; $j++ ) {
                                         echo '<option value='.$j.'>'.$j.'</option>';
                                    }
                                ?>
                            </select>
                            </div>
                        <p style="color: red ; display: none" class="error errorPassword"></p>
                    </div>
                    <div class="form-group">
                        <label>Time Detail</label>
                        <input type="text" class="form-control" id="timeDetail" name="timeDetail"/>
                        <p style="color: red ; display: none" class="error errorTimeDetail"></p>
                    </div>
                     <div class="form-group">
                        <label>Classroom</label>
                        <input type="text" class="form-control" id="classRoom" name="classRoom"/>
                        <p style="color: red ; display: none" class="error errorClassroom"></p>
                    </div>
                    <div class="form-submit">
                        <!-- <input id="create" class="btn" type="submit" value="User Add" >
                        <input type="reset" class="btn btn-default" value="Reset" > -->
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
        $('#form-addAssignment').validate({
            rules : {
                    'timeDetail' : {
                        required : true,
                        minlength: 6,
                        maxlength: 13,
                    },
                    'classRoom' : {
                        required: true,
                        minlength:5,
                        maxlength:13,
                    }
            },
            messages : {
                    'timeDetail' : {
                        required : " timeDetail la truong bat buoc",
                        minlength: " timeDetail co it nhat 6 ki tu",
                        maxlength: " timeDetail co nhieu nhat 13 ki tu",
                    },
                    'classRoom' : {
                        required : " classRoom la truong bat buoc",
                        minlength: " classRoom co it nhat 5 ki tu",
                        maxlength: " classRoom co nhieu nhat 13 ki tu",
                    },
            },
             submitHandler:function(){
                $yearStart = $('#yearStart').val();
                $monthStart= $('#monthStart').val();
                $dayStart = $('#dayStart').val();
                $timeStart = $yearStart + '-' + $monthStart+ '-' + $dayStart;

                $yearFinish = $('#yearFinish').val();
                $monthFinish= $('#monthFinish').val();
                $dayFinish = $('#dayFinish').val();
                $timeFinish = $yearFinish + '-' + $monthFinish+ '-' + $dayFinish;
                $url = '';
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    'url' : $url,
                    'data' : {
                        'idUser' : $('#idUser').val(),
                        'idCourse' : $('#idCourse').val(),
                        'timeStart' : $timeStart,
                        'timeFinish' : $timeFinish,
                        'timeDetail' : $('#timeDetail').val(),
                        'classRoom' : $('#classRoom').val(),
                    },
                    'type' : 'POST',
                    success:function(data){
                        console.log(data);
                        //console.log('vdr');
                        if (data.error == true) {
                            $('.error').hide();
                            if (data.message.timeDetail != undefined) {
                                $('.errorTimeDetail').show().text(data.message.timeDetail[0]);
                            }
                            if (data.message.classRoom != undefined) {
                                $('.errorClassroom').show().text(data.message.classRoom[0]);
                            }
                            if (data.message.errorcreateAssignment != undefined) {
                                $('.errorcreateAssignment').show().text(data.message.errorcreateAssignment[0]);
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
