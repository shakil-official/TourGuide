





<nav class="[ navbar navbar-fixed-top ][ navbar-bootsnipp animate ]" role="navigation">
    	<div class="[ container ]">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="[ navbar-header ]">
				<button type="button" class="[ navbar-toggle ]" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="[ sr-only ]">Toggle navigation</span>
					<span class="[ icon-bar ]"></span>
					<span class="[ icon-bar ]"></span>
					<span class="[ icon-bar ]"></span>
				</button>
				  <div class="[ animbrand ]">
					<a class="[ navbar-brand ][ animate ]" href="{{ route('indexpage') }}"><span class="light">Tour</span>Guide</a>
				</div>
			</div>

			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="[ collapse navbar-collapse ]" id="bs-example-navbar-collapse-1">
				<ul class="[ nav navbar-nav navbar-right ]">
					<li class="[ visible-xs ]">




					</li>

					<li>

						<ul class="[ dropdown-menu ]" role="menu">

						</ul>
					</li>

					<li><a class="animate" href=" {{ route('indexpage') }}">Home </a></li>
          <li><a class="animate" href="{{ route('hotelFind') }}">Hotel</a></li>
          <li><a class="animate" href="{{ route('restaurantFind') }}">Restaurant</a></li>
					{{-- <li><a class="animate" href="#login">Login</a></li> --}}

          @if (Auth::guard('web')->check())
            {{-- <p class="text-success">
              You are Logged In as a <strong>USER</strong>
            </p> --}}
            <li><a class="animate" href="{{ route('user.logout') }}">Log out</a></li>
          @else
            {{-- <p class="text-danger">
              You are Logged Out as a <strong>USER</strong>
            </p> --}}
          @endif



				</ul>
			</div>
		</div>

	</nav>
