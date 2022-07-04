<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="author" content="Kodinger">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<title>Register page</title>
	<link rel="stylesheet" href="bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/my-login.css">
</head>
<body class="my-login-page">
	<section class="h-100">
		<div class="container h-100">
			<div class="row justify-content-md-center h-100">
				<div class="card-wrapper">
				
					<div class="cardx fat mt-4">
						<img src="data:image/png;base64,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" alt="">
						<div class="card-body">
							
						
							<form method="POST" class="my-login-validation" autocomplete="off" action="{{ route('register') }}">

								@if ( Session::get('success'))
									 <div class="alert alert-success">
										 {{ Session::get('success') }}
									 </div>
								@endif
								@if ( Session::get('error'))
									 <div class="alert alert-danger">
										 {{ Session::get('error') }}
									 </div>
								@endif
                                @csrf
								<div class="form-group">
									<label for="name">Ad</label>
									<input id="name" type="text" class="form-control" name="name"  autofocus placeholder="Enter name" value="{{ old('name') }}">
									<span class="text-danger">@error('name'){{ $message }}@enderror</span>
								</div>

								<div class="form-group">
									<label for="email">E-Mail Adres</label>
									<input id="email" type="email" class="form-control" name="email"  placeholder="Enter email" value="{{ old('email') }}">
									<span class="text-danger">@error('email'){{ $message }}@enderror</span>
								</div>
								<div class="form-group">
									<label for="name">Telefon No </label>
									<input id="tel" type="number" class="form-control" name="tel"  autofocus placeholder="+9" value="{{ old('tel') }}">
									<span class="text-danger">@error('name'){{ $message }}@enderror</span>
								</div>
							<!--	<div class="form-group">
									<label for="name">Firma </label>
									<input id="tel" type="text" class="form-control" name="firm"  autofocus placeholder="Firma Adı" value="{{ old('firm') }}">
									<span class="text-danger">@error('name'){{ $message }}@enderror</span>
								</div> -->
                             

								<div class="form-group">
									<label for="password">Şifre</label>
									<input id="password" type="password" class="form-control" name="password"  data-eye placeholder="Enter password">
									<span class="text-danger">@error('password'){{ $message }}@enderror</span>
								</div>
                                <div class="form-group">
									<label for="password-confirm">Şifreyi Onayla</label>
									<input id="password-confirm" type="password" class="form-control" name="password_confirmation" required data-eye placeholder="Enter confirm password">
									<span class="text-danger">@error('password_confirmation'){{ $message }}@enderror</span>
                                    
								</div>

<?php
	//							<div class="form-group">
	//									<div class="custom-checkbox custom-control">
	//								<input type="checkbox" name="agree" id="agree" class="custom-control-input">
	//									<label for="agree" class="custom-control-label">I agree to the <a href="#">Terms and Conditions</a></label>
	//									<div class="invalid-feedback">
	//										You must agree with our Terms and Conditions
	//									</div>
	//								</div>
	//							</div>
	?>							

								<div class="form-group m-0">
									<button type="submit" class="btn btn-primary btn-block">
										Kayıt Ol
									</button>
								</div>
								<div class="mt-4 text-center">
									Üyeliğiniz Var Mı? <a href="{{route('login')}}">Giriş Yap</a>
								</div>
							</form>
						</div>
					</div>
			
				</div>
			</div>
		</div>
	</section>

<script src="jquery-3.4.1.min.js"></script>
	<script src="bootstrap/js/popper.js"></script>
	<script src="bootstrap/js/bootstrap.js"></script>
	<script src="js/my-login.js"></script>
</body>
</html>