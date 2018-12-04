<header class="row">
	<div class="title col-sm-11">
			<h4>IAT-Quan Li Giao Vien</h4>
	</div>
	<div class="account dropdown col-sm-1">
		
		<h4 onclick="myFunction()" class="dropbtn dropdown-toggle"><i><button type="submit" name="account"></button></i></h4>
		
		<ul id="myItemNavL1" class="itemNavL1 dropdown-user dropdown-menu">
			@if (Auth::user()->level ==1)
                <li><a href="admin/users/list">Manage</a></li>
            @endif
            <li><a href="{{url('update')}}">UpdateAccount</a></li>
            <li><a href="{{url('logout')}}"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
		</ul>
	</div>
</header>


<!-- <div class="account dropdown col-sm-1">
		<h4 onclick="myFunction()" class="dropbtn dropdown-toggle"><i><button type="submit" name="account"></button></i></h4>
		<ul id="myItemNavL1" class="itemNavL1 dropdown-user dropdown-menu">
			@if (Auth::user()->level ==1)
                <li><a href="{{url('profile')}}">UseProfile</a></li>
            @endif
            <li><a href="{{url('logout')}}"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
		</ul>
	</div> -->