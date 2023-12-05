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
						
					</div>
				</div>
				<div class="col-lg-6">
					<div class="login_form_inner">
						<h3>Log in to enter</h3>
						<form class="row login_form" action="{{ route('store_signup') }}" method="post" id="contactForm" novalidate="novalidate" enctype="multipart/form-data">
							@csrf
							<div class="col-md-12 form-group">
								<input type="text" class="form-control" id="email" name="fname" placeholder="First name ">
							</div>
							@if($errors->has('fname'))
                                <span class="text-danger">{{ $errors->first('fname') }}</span>
                            @endif
                            <div class="col-md-12 form-group">
								<input type="text" class="form-control" id="email" name="lname" placeholder="Last name " >
							</div>
							@if($errors->has('lname'))
                                <span class="text-danger">{{ $errors->first('lname') }}</span>
                            @endif
                            <div class="col-md-12 form-group">
								<input type="email" class="form-control" id="email" name="email" placeholder="E-mail" >
							</div>
							@if($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                            @endif
                            <div class="col-md-12 form-group">
								<input type="number" class="form-control" id="email" name="phone" placeholder="Phone number " >
							</div>
							@if($errors->has('phone'))
                                <span class="text-danger">{{ $errors->first('phone') }}</span>
                            @endif
							<div class="col-md-12 form-group">
								<input type="password" class="form-control" id="password" name="password" placeholder="Password">
							</div>
                            @if($errors->has('password'))
                                <span class="text-danger">{{ $errors->first('password') }}</span>
                            @endif
                            <div class="col-md-12 form-group">
								<input type="password" class="form-control" id="password" name="c-password" placeholder="Confirm Password">
							</div>
                            @if($errors->has('c-password'))
                                <span class="text-danger">{{ $errors->first('c-password') }}</span>
                            @endif
                            <div class="col-md-12 form-group">
								<input type="text" class="form-control" id="email" name="city" placeholder="City" >
							</div>
							@if($errors->has('city'))
                                <span class="text-danger">{{ $errors->first('city') }}</span>
                            @endif
                            <div class="col-md-12 form-group">
								<input type="text" class="form-control" id="email" name="address" placeholder="Address" >
							</div>
							@if($errors->has('address'))
                                <span class="text-danger">{{ $errors->first('address') }}</span>
                            @endif
                            <div class="col-md-12 form-group">
                                <label for="photo">Your photo </label>
								<input type="file" class="form-control" id="email" name="photo" placeholder="Last name " >
							</div>
							@if($errors->has('lname'))
                                <span class="text-danger">{{ $errors->first('lname') }}</span>
                            @endif
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