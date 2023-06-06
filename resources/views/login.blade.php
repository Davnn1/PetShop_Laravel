<html>
<head>
    <title>Pet Shop &ndash; Kelompok 4 &ndash; Trusted</title>
    <link rel="stylesheet" type="text/css" href="{{ url('css/login.css') }}">
</head>
<body>
    @if($message = Session::get('failed'))
        <script>
            alert('Username atau Password Salah!');
        </script>
    @elseif ($message = Session::get('failedd'))
        <script>
            alert('Username telah ada dalam database!');
        </script>
    @elseif ($message = Session::get('success'))
        <script>
            alert('Berhasil Register!');
        </script>         
    @endif
    <div class="hero">
        <div class="form-box">                             
             <div class="button-box">
                 <div id="btn"></div>
                 <button type="button" class="toggle-btn" onclick="login()">Log In</button>
                 <button type="button" class="toggle-btn" onclick="register()">Register</button>
             </div>
             <div class="social-icons">
                 <a href="https://www.facebook.com"><img src="{{ url('image/fb.png') }}" ></a>
                 <a href="https://twitter.com/i/flow/login"><img src="{{ url('image/tw.png') }}"></a>
                 <a href="https://accounts.google.com/signin/v2/identifier?hl=in&flowName=GlifWebSignIn&flowEntry=ServiceLogin"><img src="{{ url('image/gp.png') }}"></a>
             </div>
             <form id="login" method="post" action="/login/process" class="input-g">  
                @csrf              
                    <input type="text" class="input-field" name="username" placeholder="Username" value="<?= empty(Request::cookie('cookieUser')) ? '' : Request::cookie('cookieUser'); ?>" required>
                    <input type="password" class="input-field" name="password" placeholder="Enter Password" value="<?= empty(Request::cookie('cookiePass')) ? '' : Request::cookie('cookiePass'); ?>" required>
                    <input class="chech-box" type="checkbox" name="remember" <?= empty(Request::cookie('cookieUser')) ? '' : 'checked'; ?>> <span>Remember Me</span>
                    <button type="submit" class="submit-btn">Log in</button>
             </form>

             <form id="register" method="post" action="/register" class="input-g">
                @csrf
                <input type="text" class="input-field" placeholder="User Id" name="username" value="{{old('username')}}" required>
                <input type="email" class="input-field" placeholder="Email" name="email" value="{{old('email')}}" required>
                <input type="password" class="input-field" placeholder="Enter Password" name="password" value="{{old('password')}}" required>
                <input type="checkbox" class="chech-box" required><span>I agree to the terms & conditions</span>
                <button type="submit" class="submit-btn">Register</button>
             </form>
        </div>
    </div>
    <script>
        var x = document.getElementById("login");
        var y = document.getElementById("register");
        var z = document.getElementById("btn");

        function register(){
            x.style.left = "-400px";
            y.style.left = "50px";
            z.style.left = "110px";
        }

        function login(){
            x.style.left = "50px";
            y.style.left = "450px";
            z.style.left = "0px";
        }

    </script>
</body>
</html>