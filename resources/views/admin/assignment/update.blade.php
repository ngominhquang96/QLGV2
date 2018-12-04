@extends('admin.layout.index')

@section('content')
<!-- Page Content -->
<div class="col-sm-9" id="page-wrapper" >
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">ASSIGNMENT | 
                    <small>Update</small>
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
                <form  method="POST" role="form" id="form-addUser">
                       
                    <div class="alert alert-danger error  errorAddUser" style="display: none">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <p style="color: red; display: none" class="error errorAddUser "></p>
                    </div>

                    <!--  email -->
                    <div class="form-group">
                        <label>Id User</label>
                        <input class="form-control" id="idUser" name="idUser" placeholder="Please Enter idUser"  value="{{$assignment->idUser}}" readonly="">
                        <p style="color: red ; display:  none" class="error errorEmail"></p>
                    </div>

                    
                    <div class="form-group">
                        <label>Id Course</label>
                        <input type="text" class="form-control" id="idCourse" name="idCourse" value="{{$assignment->idCourse}}" readonly="" />
                        <p style="color: red ; display: none" class="error errorPassword"></p>
                    </div>
                    <div class="form-group">
                        <label>Time Start</label>
                        <input type="text" class="form-control" id="timeStart" name="timeStart" value="{{$assignment->timeStart}}"  autocomplete="current-password"/>
                        <p style="color: red ; display: none" ></p>
                    </div>
                    <div class="form-group">
                        <label>Time Finish</label>
                        <input type="text" class="form-control" id="timeFinish" name="timeFinish" value="{{$assignment->timeFinish}}"  />
                        <p style="color: red ; display: none" class="error errorPassword"></p>
                    </div>
                    <div class="form-group">
                        <label>Time Detail</label>
                        <input type="text" class="form-control" id="timeDetail" name="timeDetail" value="{{$assignment->timeDetail}}" />
                        <p style="color: red ; display: none" class="error errorPassword"></p>
                    </div>
                     <div class="form-group">
                        <label>Classroom</label>
                        <input type="text" class="form-control" id="classRoom" name="classRoom" value="{{$assignment->classRoom}}"  />
                        <p style="color: red ; display: none" class="error errorPassword"></p>
                    </div>
                    <div class="form-submit">
                        <!-- <input id="create" class="btn" type="submit" value="User Add" >
                        <input type="reset" class="btn btn-default" value="Reset" > -->
                        <button type="submit" class="btn btn-default" style="margin: 0 43%;">UPDATE</button>
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
                    'timeStart' : {
                        required : true,
                        minlength:10,
                        maxlength:10,
                    },
                    'timeFinish' : {
                        required : true,
                        minlength : 10,
                        maxlength:10,
                    },
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
                    'timeStart' : {
                        required : " timeStart la truong bat buoc",
                        minlength: " timeStart phai co 10 ki tu",
                        maxlength: " timeStart phai co 10 ki tu",
                    },
                    'timeFinish' : {
                        required : " timeFinish la truong bat buoc",
                        minlength: " timeFinish phai co 10 ki tu",
                        maxlength: " timeFinish phai co 10 ki tu",
                    },
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
                $classRoom = $('#timeDetail').val();
                console.log($classRoom);
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
                        'timeStart' : $('#timeStart').val(),
                        'timeFinish' : $('#timeFinish').val(),
                        'timeDetail' : $('#timeDetail').val(),
                        'classRoom' : $('#classRoom').val(),
                    },
                    'type' : 'POST',
                    success:function(data){
                        console.log(data);
                        //console.log('vdr');
                        if (data.error == true) {
                            
                        }else{
                            //window.location.href = "http://localhost/QLGV/public/admin/assignment/list";
                        }
                    }
                });
            }
        });
    });
</script>
@endsection
