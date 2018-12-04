
<div class="menu col-sm-3">
	<div class="input-search row" style="padding-left: 15px;">
		<input class="col-sm-10" type="text" name="">
		<button class="col-sm-1" type="submit" name="search">
			
		</button>
	</div>
	<div style="clear: both;"></div>
	<br>
	<ul>
		<li>
			<div>
				<h4 class="itemNav">Dashboard</h4>
			</div>
		</li>
		<li>
			<div class="dropdown">
				<h4 class="">User</h4>
				<ul id="myItemNavL1" class="itemNavL1">
					<li><a href="{{url('admin/users/list')}}">ShowList</a></li>
					<li><a href="{{url('admin/users/add')}}">Add</a></li>
				</ul>
			</div>
		</li>
		<li>				
			<div>
				<h4 class="">Course</h4>
				<ul id="myItemNavL3" class="itemNavL3">
					<li><a href="{{url('admin/courses/list')}}">ShowList</a></li>
					<li><a href="{{url('admin/courses/add')}}">Add</a></li>
				</ul>
			</div>
		</li>
		<li>				
			<div>
				<h4 class="">Assigment</h4>
				<ul id="myItemNavL3" class="itemNavL3">
					<li><a href="{{url('admin/assignment/list')}}">ShowList</a></li>
					<li><a href="{{url('admin/assignment/add')}}">Add</a></li>
				</ul>
			</div>
		</li>
		
	</ul>
</div>