@extends('admin.layout.index')
@section('content')
<div class="disDB col-sm-9">
	<br>
	<div class="labelList">
		<h1>Danh sách môn học </h1>
	</div>
	<br>
	<div>
		<div style="float: right; margin-right: 5%;">
			<form  method="POST" action="search" role="form" id="form-searchUser">
				<div class="row searchDB">
					<span>Search : </span>
					<input id="nameCourse" class="col-sm-8" type="text" name="nameCourse">
					{!! csrf_field() !!}
					<button class="col-sm-1" type="submit" name="search">
				</div> 
			</form> 
		</div>
		<div style="clear: both;"></div>
		<br>
		<table class="table table-striped">
			<tr>
				<td>ID</td>
				<td>NameCourse</td>
				<td>NumberOfCredits</td>
				<td>Delete</td>
				<td>Edit</td>
			</tr>
			<tbody>
				@if($courses != null)
                    @foreach($courses as $course )
                        <tr class="odd gradeX" align="center">
                            <td>{{$course->id}}</td>
                            <td>{{$course->nameCourse}}</td>
                            <td>{{$course->numberOfCredits}}</td>
                         
                            <td>
								<img src="../../../images/delete.png">
								<a href="delete/{{$course->id}}">Delete</a>
							</td>
							<td>
								<img src="../../../images/edit.png">
								<a href="update/{{$course->id}}">Edit</a>
							</td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
		</table>
	</div>
</div>
@endsection