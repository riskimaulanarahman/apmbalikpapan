@php
	$headerClass = (!empty($headerInverse)) ? 'navbar-inverse ' : 'navbar-default ';
	$headerMenu = (!empty($headerMenu)) ? $headerMenu : '';
	$headerMegaMenu = (!empty($headerMegaMenu)) ? $headerMegaMenu : ''; 
	$headerTopMenu = (!empty($headerTopMenu)) ? $headerTopMenu : '';
@endphp
<!-- begin #header -->
<div id="header" class="header {{ $headerClass }}">
	<!-- begin navbar-header -->
	<div class="navbar-header">
		@if ($sidebarTwo)
		<button type="button" class="navbar-toggle pull-left" data-click="right-sidebar-toggled">
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>
		@endif
		<a href="/" class="navbar-brand"><img src="/assets/img/dishub.png" alt="" style="margin-right: 10px;"> <b style="color: gray;">APM | Institut Teknologi Kalimantan</b></a>
		@if ($headerMegaMenu)
			<button type="button" class="navbar-toggle pt-0 pb-0 mr-0" data-toggle="collapse" data-target="#top-navbar">
				<span class="fa-stack fa-lg text-inverse">
					<i class="far fa-square fa-stack-2x"></i>
					<i class="fa fa-cog fa-stack-1x"></i>
				</span>
			</button>
		@endif
		@if (!$sidebarHide && $topMenu)
			<button type="button" class="navbar-toggle pt-0 pb-0 mr-0 collapsed" data-click="top-menu-toggled">
				<span class="fa-stack fa-lg text-inverse">
					<i class="far fa-square fa-stack-2x"></i>
					<i class="fa fa-cog fa-stack-1x"></i>
				</span>
			</button>
		@endif
		@if (!$sidebarHide && !$headerTopMenu)
		<button type="button" class="navbar-toggle" data-click="sidebar-toggled">
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>
		@endif
		@if ($headerTopMenu)
			<button type="button" class="navbar-toggle" data-click="top-menu-toggled">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
		@endif
	</div>
	<!-- end navbar-header -->
	
	@includeWhen($headerMegaMenu, 'includes.header-mega-menu')
	
	<!-- begin header-nav -->
	<ul class="navbar-nav navbar-right">
		<!-- <li class="navbar-form">
			<form action="" method="POST" name="search_form">
				<div class="form-group">
					<input type="text" class="form-control" placeholder="Enter keyword" />
					<button type="submit" class="btn btn-search"><i class="fa fa-search"></i></button>
				</div>
			</form>
		</li> -->
		<!-- <li class="dropdown">
			<a href="#" data-toggle="dropdown" class="dropdown-toggle f-s-14">
				<i class="fa fa-bell"></i>
				<span class="label">5</span>
			</a>
			<div class="dropdown-menu media-list dropdown-menu-right">
				<div class="dropdown-header">NOTIFICATIONS (5)</div>
				<a href="javascript:;" class="dropdown-item media">
					<div class="media-left">
						<i class="fa fa-bug media-object bg-silver-darker"></i>
					</div>
					<div class="media-body">
						<h6 class="media-heading">Server Error Reports <i class="fa fa-exclamation-circle text-danger"></i></h6>
						<div class="text-muted f-s-10">3 minutes ago</div>
					</div>
				</a>
				<a href="javascript:;" class="dropdown-item media">
					<div class="media-left">
						<img src="/assets/img/user/user-1.jpg" class="media-object" alt="" />
						<i class="fab fa-facebook-messenger text-blue media-object-icon"></i>
					</div>
					<div class="media-body">
						<h6 class="media-heading">John Smith</h6>
						<p>Quisque pulvinar tellus sit amet sem scelerisque tincidunt.</p>
						<div class="text-muted f-s-10">25 minutes ago</div>
					</div>
				</a>
				<a href="javascript:;" class="dropdown-item media">
					<div class="media-left">
						<img src="/assets/img/user/user-2.jpg" class="media-object" alt="" />
						<i class="fab fa-facebook-messenger text-blue media-object-icon"></i>
					</div>
					<div class="media-body">
						<h6 class="media-heading">Olivia</h6>
						<p>Quisque pulvinar tellus sit amet sem scelerisque tincidunt.</p>
						<div class="text-muted f-s-10">35 minutes ago</div>
					</div>
				</a>
				<a href="javascript:;" class="dropdown-item media">
					<div class="media-left">
						<i class="fa fa-plus media-object bg-silver-darker"></i>
					</div>
					<div class="media-body">
						<h6 class="media-heading"> New User Registered</h6>
						<div class="text-muted f-s-10">1 hour ago</div>
					</div>
				</a>
				<a href="javascript:;" class="dropdown-item media">
					<div class="media-left">
						<i class="fa fa-envelope media-object bg-silver-darker"></i>
						<i class="fab fa-google text-warning media-object-icon f-s-14"></i>
					</div>
					<div class="media-body">
						<h6 class="media-heading"> New Email From John</h6>
						<div class="text-muted f-s-10">2 hour ago</div>
					</div>
				</a>
				<div class="dropdown-footer text-center">
					<a href="javascript:;">View more</a>
				</div>
			</div>
		</li> -->
		@isset($headerLanguageBar)
		<li class="dropdown navbar-language">
			<a href="#" class="dropdown-toggle pr-1 pl-1 pr-sm-3 pl-sm-3" data-toggle="dropdown">
				<span class="flag-icon flag-icon-us" title="us"></span>
				<span class="name d-none d-sm-inline">EN</span> <b class="caret"></b>
			</a>
			<div class="dropdown-menu">
				<a href="javascript:;" class="dropdown-item"><span class="flag-icon flag-icon-us" title="us"></span> English</a>
				<a href="javascript:;" class="dropdown-item"><span class="flag-icon flag-icon-cn" title="cn"></span> Chinese</a>
				<a href="javascript:;" class="dropdown-item"><span class="flag-icon flag-icon-jp" title="jp"></span> Japanese</a>
				<a href="javascript:;" class="dropdown-item"><span class="flag-icon flag-icon-be" title="be"></span> Belgium</a>
				<div class="dropdown-divider"></div>
				<a href="javascript:;" class="dropdown-item text-center">more options</a>
			</div>
		</li>
		@endisset
		<li class="dropdown navbar-user">
			<a href="#" class="dropdown-toggle" data-toggle="dropdown">
				{{-- <img src="/assets/img/user/user-12.jpg" alt="" />  --}}
				<b class="fa fa-user"></b>
				<span class="d-none d-md-inline">{{ Auth::user()->name }}</span> 
			</a>
			<div class="dropdown-menu dropdown-menu-right">
				{{-- @if(Auth::user()->role !== 'admin') --}}
				<a href="javascript:;" class="dropdown-item" data-toggle="modal" data-target="#modal-edit-password">Edit Password</a>
				{{-- @endif --}}
				{{-- <a href="javascript:;" class="dropdown-item"><span class="badge badge-danger pull-right">2</span> Inbox</a>
				<a href="javascript:;" class="dropdown-item">Calendar</a>
				<a href="javascript:;" class="dropdown-item">Setting</a> --}}
				<div class="dropdown-divider"></div>
				<a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Log Out</a>
				<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
					{{ csrf_field() }}
				</form>
			</div>
		</li>
		@if($sidebarTwo)
		<li class="divider d-none d-md-block"></li>
		<li class="d-none d-md-block">
			<a href="javascript:;" data-click="right-sidebar-toggled" class="f-s-14">
				<i class="fa fa-th"></i>
			</a>
		</li>
		@endif
	</ul>
	<!-- end header navigation right -->
</div>
<!-- end #header -->

<div class="modal fade" id="modal-edit-password">
	<div class="modal-dialog">
		<form method="post" action="{{ route('editpassword', ['id' => Auth::user()->id_users]) }}"  enctype="multipart/form-data">
			{{ csrf_field() }}
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Edit Password</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				</div>
				<div class="modal-body">
					<label class="control-label">New Password <span class="text-danger">*</span></label>
					<div class="row row-space-10 {{ $errors->has('password') ? ' has-error' : '' }}">
						<div class="col-md-12 m-b-15">
							<input type="text" id="password" name="password" class="form-control" required>
							@if ($errors->has('password'))
								<span class="help-block">
									<strong>{{ $errors->first('password') }}</strong>
								</span>
							@endif
						</div>
					</div>

				</div>
				<div class="modal-footer">
					<a href="javascript:;" class="btn btn-white" data-dismiss="modal">Close</a>
					<button type="submit" class="btn btn-warning">Submit</button>
				</div>
			</div>
		</form>
	</div>
</div>
