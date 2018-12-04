@extends('admin.layout.index')

@section('content')
<!-- Page Content -->
<div class="col-sm-9" id="page-wrapper" >
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 labelList">
                <br>
                <h1 class="page-header">COURSE | 
                    <small>Create Course</small>
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
                       
                    <div class="alert alert-danger error  errorcreateCourse" style="display: none">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <p style="color: red; display: none" class="error errorcreateCourse "></p>
                    </div>

                    <!--  email -->
                    <div class="form-group">
                        <label>Name of Course</label>
                        <input class="form-control" id="nameCourse" name="nameCourse" placeholder="Cơ sở dữ liệu"  value="{{old('nameCourse')}}" />
                        <p style="color: red ; display:  none" class="error errorNameCourse"></p>
                    </div>

                    <!-- password -->
                    <div class="form-group">
                        <label>Credits</label>
                        <input type="text" class="form-control" id="numberOfCredits" name="numberOfCredits" value="{{old('numberOfCredits')}}"  autocomplete="current-password"/>
                        <p style="color: red ; display: none" class="error errorNumberOfCredits"></p>
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
        $('#form-addUser').validate({
            rules : {
                    'nameCourse' : {
                        required : true,
                        minlength : 4, 
                    },
                    'numberOfCredits' : {
                        required : true,
                    },
            },
            messages : {
                    'nameCourse' : {
                        required : "nameCourse la truong bat buoc",
                        minlength : "nameCourse phai co it nhat 4 ki tu"
                    },
                    'numberOfCredits' : {
                        required : " numberOfCredits la truong bat buoc",
                    },
            },
             submitHandler:function(){
                $url = '';
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    'url' : $url,
                    'data' : {
                        'nameCourse' : $('#nameCourse').val(),
                        'numberOfCredits' : $('#numberOfCredits').val(),
                    },
                    'type' : 'POST',
                    success:function(data){
                        console.log('a');
                        console.log(data);
                        console.log('b');
                        if (data.error == true) {
                            $('.error').hide();
                            if (data.message.nameCourse != undefined) {
                                $('.errorNameCourse').show().text(data.message.nameCourse[0]);
                            }
                            if (data.message.password != undefined) {
                                $('.errorNumberOfCredits').show().text(data.message.password[0]);
                            }
                            if (data.message.errorcreateCourse != undefined) {
                                $('.errorcreateCourse').show().text(data.message.errorcreateCourse[0]);
                            }
                        }else{
                            //window.location.href = "http://localhost/IAT-Connect/admin/users/list";
                        }
                    }
                });
            }
        });
    });
</script>
@endsection
