<div class="container mt-2 mb-2">
	<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #e3f2fd;">
		<div class="col-8">
			@if (Auth::check())
				<p>{{ Auth::user()->name}}'s	Blog</p>
			@endif
		</div>
		<div class="collapse navbar-collapse" id="navbarNav">
	     <ul class="navbar-nav">
	       <li class="nav-item">
	         <a class="nav-link" href="{{route('home')}}">Home</a>
	       </li>
	       <li class="nav-item">
	         <a class="nav-link" href="{{route('blog')}}">Blog</a>
	       </li>
				 @if (Auth::check())
				 <li class="nav-item">
	         <a class="nav-link" href="{{route('createPost')}}">Create new post</a>
	       </li>
				 <li class="nav-item">
					 <form name="logout-form" action="{{ route('logout') }}" method="POST">
            	@csrf
    					<a class="nav-link" href="#" onclick="parentNode.submit();">Logout</a>
						</form>
	       </li>
				 @else
					 <li class="nav-item">
		         <a class="nav-link" href="{{route('login')}}">Login</a>
		       </li>
					 <li class="nav-item">
						<a class="nav-link" href="{{route('register')}}">Register</a>
					</li>
				 @endif
	     </ul>
	   </div>
	</nav>
</div>
