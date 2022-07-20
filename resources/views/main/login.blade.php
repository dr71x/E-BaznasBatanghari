<!doctype html>
<html lang="en">
  <head>
  	<title> BAZNAS BatangHari</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="{{ asset('new') }}/css/style.css">

	</head>
	<body>
		@if (session('status'))
		<span class="alert alert-success" role="alert">
				{{ session('status') }}
			</span>
		@endif
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-7 col-lg-5">
					<div class="login-wrap p-4 p-md-5">
		      	<div class="icon d-flex align-items-center justify-content-center">
		      		<img src="{{ asset('soft') }}/assets/img/baznas.png" width="50px">
		      	</div>
		      	<h3 class="text-center mb-4">BAZNAS Kabupaten BatangHari</h3>
						<form action="{{ url('/prosesLogin') }}" method="POST" class="login-form">
                            @csrf
		      		<div class="form-group">
		      			<input type="text" name="email" class="form-control rounded-left" placeholder="Username" required>
		      		</div>
	            <div class="form-group d-flex">
	              <input type="password" name="password" id="password" class="form-control rounded-left" placeholder="Password" required>
	            </div>
				<div class="form-group d-md-flex">
	            	<div class="w-50">
	            		<label class="checkbox-wrap checkbox-primary">show Pasword
									  <input type="checkbox" id="show">
									  <span class="checkmark"></span>
									</label>
								</div>
	            </div>
	            <div class="form-group">
	            	<button type="submit" class="form-control btn btn-primary rounded submit px-3">Login</button>
	            </div>
	            <div class="form-group d-md-flex">
	            	<div class="w-50">
	            		<label class="checkbox-wrap checkbox-primary">Remember Me
									  <input type="checkbox" checked>
									  <span class="checkmark"></span>
									</label>
								</div>
								<div class="w-50 text-md-right">
									<a href="#">Forgot Password</a>
								</div>
	            </div>
				<div class="form-group d-md-flex">
	            	<div class="w-50">
								<div class=" text-md-left">
									<a href="#">Belum Punya Akun</a>
								</div>
					</div>
					<div class="w-50 text-md-left">
						<a href="{{ route('register') }}"><u>Klik Disini</u></a>
					</div>				
	          </form>
	        </div>
				</div>
			</div>
		</div>
	</section>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	<script>
		$(document).ready(function(){
			$('#show').click(function(){
				if($(this).is(':checked')){
					$('#password').attr('type','text');
				}else{
					$('#password').attr('type','password');
				}
			});
		});
	</script>
    <script>
        @if (session('errorse'))
            Swal.fire({
            icon: 'error',
            title: 'Maaf !!',
            text: "{{ session('errorse') }}",
            });
        @endif
		@if (session('success'))
            Swal.fire({
            icon: 'success',
            title: 'Berhasil !!',
            text: "{{ session('success') }}",
            });
        @endif
    </script>
	<script src="{{ asset('new') }}/js/jquery.min.js"></script>
	<script src="{{ asset('new') }}/js/popper.js"></script>
	<script src="{{ asset('new') }}/js/bootstrap.min.js"></script>
	<script src="{{ asset('new') }}/js/main.js"></script>

	</body>
</html>
