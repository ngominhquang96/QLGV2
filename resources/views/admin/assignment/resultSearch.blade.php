@extends('admin.layout.index')
@section('content')
<div class="disDB col-sm-9">
	<br>
	<div class="labelList">
		<h1>Danh sách phân công nhiệm vụ  </h1>
	</div>
	<br>
	<div>
		<div style="float: right; margin-right: 5%;">
			<form  method="POST" action="search" role="form" id="form-searchUser">
				<div class="row searchDB">
					<span>Search : </span>
					<input id="nameUser" class="col-sm-8" type="text" name="nameUser">
					{!! csrf_field() !!}
					<button class="col-sm-1" type="submit" name="search">
				</div>
			</form>
		</div>
		<div style="clear: both;"></div>
		<br>
		<table class="table table-striped">
			<tr>
				<td>Name USer</td>
				<td>Name Course</td>
				<td>Time Start</td>
				<td>Time Finish</td>
				<td>Time Detail</td>
				<td>Classroom</td>
				<td>Delete</td>
				<td>Edit</td>
			</tr>
			<tbody>
                @if($assignment !=null)
                    @foreach($assignment as $ass )
                        <tr class="odd gradeX" align="center">
                            <!-- <td>{{$ass->idUser}}</td> -->
                            @foreach (App\users::where('id',$ass->idUser)->get() as $var)
								<td>
								{{$var->fullname}}
								</td>
							@endforeach
                            <!-- <td>{{$ass->idCourse}}</td> -->
                            @foreach (App\courses::where('id',$ass->idCourse)->get() as $var)
								<td>
								{{$var->nameCourse}}
								</td>
							@endforeach
                            <td>{{$ass->timeStart}}</td>
                            <td>{{$ass->timeFinish}}</td>
                            <td>{{$ass->timeDetail}}</td>
                            <td>{{$ass->classRoom}}</td>
                            <td>
                            	<img src="../../../images/delete.png">
								<a href="delete/{{$ass->id}}/">Delete</a>
							</td>
							<td>
								<img src="../../../images/edit.png">
								<a href="update/{{$ass->id}}">Edit</a>
							</td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
		</table>
	</div>
</div>
@endsection