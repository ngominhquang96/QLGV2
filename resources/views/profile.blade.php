@extends('layout.index')
@section('content')
	<br>
	<div style="width: 65%; margin: auto;">
		<div class="page-header">
		    <h1>Profile | 
		        <small>{{Auth::user()->fullname}}</small>
		    </h1>
		</div>
		<br>
		<form class="form-horizontal">
			<div class="row form-group">
				<label class="control-label ">Full Name  </label>
				<div class="showInfo">
					<p>{{Auth::user()->fullname}}</p>
				</div>
			</div>
			<div class="row form-group">
				<label class="control-label ">Gender  </label>
				<div class="showInfo">
					<p>
					@if (Auth::user()->gender==1)
	            		{{"Male"}}
	        		@else
	            		{{"Female"}}
	        		@endif
					</p>
				</div>
			</div>
			<div class="row form-group">
				<label class="control-label ">Email  </label>
				<div class="showInfo">
					<p>{{Auth::user()->email}}</p>
				</div>
			</div>
			<div class="row form-group">
				<label class="control-label ">Position  </label>
				<div class="showInfo">
					<p>
					@if (Auth::user()->level==1)
	            		{{"Giáo vụ "}}
	        		@else
	            		{{"Lecturers"}}
	        		@endif
					</p>
				</div>
			</div>	
			<div class="row form-group">
				<label class="control-label ">Date Of Birth  </label>
				<div class="showInfo">
					<p>{{Auth::user()->birthDay}}</p>
				</div>      
			</div>		

			<div class="row form-group">
				<label class="control-label ">Phone Number  </label>
				<div class="showInfo">
					<p>{{Auth::user()->phoneNumber}}</p>
				</div>
			</div>		
			<div class="row form-group">
				<label class="control-label ">Hometown  </label>
				<div class="showInfo">
					<p>{{Auth::user()->homeTown}}</p>
				</div>
			</div>	
			<div class="row form-group">
				<label class="control-label ">Assignment  </label>
			</div>	
		</form>
	</div>
	@if (Auth::user()->level==0)
		<table class="table table-striped">
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
	@endif	
@endsection




