<html>
<head>
<link rel="stylesheet" type="text/css" href="{{ asset('css/loginStyle.css') }}">
</head>
<body>
<h1>Todo App</h1>
<h2>Log in to continue</h2>


<form method="POST" action="{{ route('login_off') }}">  
@csrf
<div class="userDetails">
<label for="email">Email id:</label>
<input type="text" placeholder="Enter email address" id="email" name="email"><br>
@error('email')
            <span class="text-danger">{{ $message }}</span>
@enderror<br>
 

  <label for="password">Password:</label><br>
  <input type="password" placeholder="Enter Password" id="password" name="password"><br>
  @error('password')
            <span class="text-danger">{{ $message }}</span>
  @enderror<br>


  <button type="submit">Login</button>
</div>
</form> 
<h3>Don't have an account?</h3>
<div class="signup">
  <a href="{{'signup'}}">Sign up</a>
</div>
</body>
</html>