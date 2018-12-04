@extends('admin.layout.index')
@section('content')
<div class="disDB col-sm-9">
	<br>
	<div class="labelList">
		<h1>Danh sách giáo viên </h1>
	</div>
	<br>
	<div>
		<div style="float: right; margin-right: 5%;">
			<form  method="POST" action="search" role="form" id="form-searchUser">
				<div class="row searchDB">
					<span>Search : </span>
					<input id="infoUser" class="col-sm-8" type="text" name="infoUser" placeholder="Search by name">
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
				<td>Email</td>
				<td>Fullname</td>
				<td>Level</td>
				<td>Show Detail</td>
				<td>Delete</td>
				<td>Edit</td>
			</tr>
			<tbody>
				@if($users != null)
                    @foreach($users as $user )
                        <tr class="odd gradeX" align="center">
                            <td>{{$user->id}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->fullname}}</td>
                            <td>
                                @if ($user->level==1)
                                    {{"Giáo vụ "}}
                                @else
                                    {{"Lecturers"}}
                                @endif

                            </td>
                            <td>
								<a href="showinfo/{{$user->id}}">Show Info</a>
							</td>
                            <td>
                            	<img src="../../../images/delete.png">
                            	@if ($user->level==0)
								<a href="delete/{{$user->id}}">Delete</a>
								@else
								<!-- <p>Delete</p> -->
								@endif
							</td>
							<td>
								<img src="../../../images/edit.png">
								<a href="update/{{$user->id}}">Edit</a>
							</td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
		</table>
	</div>
</div>
@endsection
