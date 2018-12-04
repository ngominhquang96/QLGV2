@extends('admin.layout.index')
@section('content')
<div class="disDB col-sm-9">
	<br>
	<div class="detailInfo">FullName:</div>
	<div class="detailInfoContent">{{$user->fullname}}</div>	
	<div style="clear: both;"></div>
	<div class="detailInfo">Email:</div>
	<div class="detailInfoContent"> {{$user->email}}</div>	
	<div style="clear: both;"></div>
	<div class="detailInfo">Position:</div>
	<div class="detailInfoContent">
		<!-- @if (Auth::user()->level==1)
            {{"Giáo vụ "}}
        @else
            {{"Lecturers"}}
        @endif -->
        Lecturers
	</div>
	<div style="clear: both;"></div>
	<div class="detailInfo">Birth:</div>
	<div>{{$user->birthDay}}</div>
	<div style="clear: both;"></div>
	<div class="detailInfo">Phone Number:</div>
	<div>{{$user->phoneNumber}}</div>
	<div style="clear: both;"></div>
	<br>
	<table class="table table-bordered">
		<thead>
			<tr>
				<td>Index</td>
				<td>Teaching Subject</td>
				<td>Time Start</td>
				<td>Time Finish</td>
				<td>Time Detail</td>
				<td>Classroom</td>
			</tr>
		</thead>
		<tbody>
			@foreach($assignments as $ass)
				<tr>
					<td>{{$index++ }} </td>
					@foreach (App\courses::where('id',$ass->idCourse)->get() as $var)
					<td>
						{{$var->nameCourse}}
					</td>
					@endforeach
					<td>{{$ass->timeStart}}</td>
					<td>{{$ass->timeFinish}}</td>
					<td>{{$ass->timeDetail}}</td>
					<td>{{$ass->classRoom}}</td>
				</tr>
			@endforeach
		</tbody>
	</table>
</div>
@endsection

