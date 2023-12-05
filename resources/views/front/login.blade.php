@include('front.includes.head') 
<body>

	<!-- Start Header Area -->
	@include('front.includes.nav') 
	<!-- End Header Area -->

	<!-- Start Banner Area -->
	<section class="banner-area organic-breadcrumb">
		<div class="container">
			<div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
				<div class="col-first">
					<h1>Login/Register</h1>
					<nav class="d-flex align-items-center">
						<a href="index.html">Home<span class="lnr lnr-arrow-right"></span></a>
						<a href="category.html">Login/Register</a>
					</nav>
				</div>
			</div>
		</div>
	</section>
	<!-- End Banner Area -->

	<!--================Login Box Area =================-->
	{{-- @include('front.includes.messeges') --}}
	<section class="login_box_area section_gap">
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
					<div class="login_box_img">
						<img class="img-fluid" src="front/img/usy.png" alt="">
						<div class="hover">
							<h4>New to our website?</h4>
							<p>There are advances being made in science and technology everyday, and a good example of this is the</p>
							<a class="primary-btn" href="/usersignup">Create an Account</a>
						</div>
					</div>
				</div>
				<div class="col-lg-6">
					@if (\Session::has('success'))
							<div class="alert alert-success " id="success-alert">
								<p>{{ \Session::get('success') }}</p>
							</div>
			 
							<script>
								var milliseconds = 3500;
								setTimeout(function () {
								document.getElementById('success-alert').remove();
								}, milliseconds);
								</script>
						@endif
						
					<div class="login_form_inner">
						<h3>Log in to enter</h3>
						<form class="row login_form" action="{{ route('customer_login_submit') }}" method="post" id="contactForm" novalidate="novalidate" enctype="multipart/form-data">
							@csrf
							<div class="col-md-12 form-group">
								<input type="email" class="form-control" id="email" name="email" placeholder="E-mail" onfocus="this.placeholder = ''" onblur="this.placeholder = 'E-mail'">
							</div>
							@if($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                            @endif

							

						
							<div class="col-md-12 form-group">
								<input type="password" class="form-control" id="password" name="password" placeholder="Password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Password'">
							</div>
							<div class="col-md-12 form-group">
								<div class="creat_account">
									<input type="checkbox" id="f-option2" name="selector">
									<label for="f-option2">Keep me logged in</label>
								</div>
							</div>
							<div class="col-md-12 form-group">
								<button type="submit" value="submit" class="primary-btn">Log In</button>
								<a href="#">Forgot Password?</a>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--================End Login Box Area =================-->

	<!-- start footer Area -->
	@include('front.includes.footer') 