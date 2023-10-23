<html>
<head>
<link rel="stylesheet" type="text/css" href="{{ asset('css/signup.css') }}">
</head>
<body>
<h1>Register</h1>   

<form method="POST" action="{{ route('signup_off') }}">
@csrf
<div class="reg_Details">
  <label for="fname">Full name:</label>
  <input type="text" placeholder="Enter Full name" id="fname" name="name" value="{{ old('name') }}" ><br>
  @error('name')
            <span class="text-danger">{{ $message }}</span>
  @enderror<br>
  
  <label for="email">Email id:</label>
  <input type="text" placeholder="Enter email address" id="email" name="email" value="{{ old('email') }}"><br>
  @error('email')
            <span class="text-danger">{{ $message }}</span>
  @enderror<br>

  <label for="pwd">Password:</label>
  <input type="password" placeholder="Enter Password" id="pwd" name="password"><br>
  @error('password')
            <span class="text-danger">{{ $message }}</span>
  @enderror<br>

  <label for="confirmpwd">Confirm Password:</label>
  <input type="password" placeholder="Enter Password" id="confirmpwd" name="password_confirmation"><br>

  <button type="submit">Submit</button>
</div>
</form> 

@if (session('success'))
    <div class="success">
        {{ session('success') }}
    </div>
@endif

<div class="logIn">
  <a href="{{'login'}}">Login</a>
</div>

<!-- <div class="profPic">
  <a href="{{'profilePic'}}">ADD PROFILE PICTURE</a>
</div> -->

</body>
</html>