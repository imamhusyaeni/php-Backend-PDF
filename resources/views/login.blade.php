<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
		<link href="https://getbootstrap.com/docs/4.0/examples/sign-in/signin.css" rel="stylesheet">

    <title>Login</title>
  </head>
  <body>
    <div class="container">
			<form class="form-signin" method="post" action="{{ route('login') }}">
				@csrf
				<h1 class="h3 mb-3 font-weight-normal">Login</h1>
				<label for="inputEmail" class="sr-only">Email address</label>
				<input type="text" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" placeholder="Email" name="email">
				@if ($errors->has('email'))
          <div class="invalid-feedback">
            {{ $errors->first('email') }}
          </div>
        @endif
				<label for="inputPassword" class="sr-only">Password</label>
				<input type="password" class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" placeholder="Password" name="password">
				@if ($errors->has('password'))
          <div class="invalid-feedback">
            {{ $errors->first('password') }}
          </div>
        @endif
				<button class="btn btn-lg btn-primary" type="submit">Login</button>
				<a href="{{ route('register') }}"><button class="btn btn-lg btn-primary" type="button">Register</button></a>
			</form>
  </div>
  </body>
</html>