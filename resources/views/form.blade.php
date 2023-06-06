<html>
<head>
    <title>Pet Shop &ndash; Kelompok 4 &ndash; Trusted</title>
    <link rel="stylesheet" type="text/css" href="{{ url('css/style.css') }}">
</head>
<body>
    <div class="hero">
        <div class="form-box">                             
             <div class="button-box">
                 <div id="btn"></div>
             </div>
             <div class="social-icons">
                 <a href="https://www.facebook.com"><img src="image/fb.png" ></a>
                 <a href="https://twitter.com/i/flow/login"><img src="image/tw.png"></a>
                 <a href="https://accounts.google.com/signin/v2/identifier?hl=in&flowName=GlifWebSignIn&flowEntry=ServiceLogin"><img src="image/gp.png"></a>
             </div>
             <form id="login" action="/view" class="input-g">
                <input type="text" class="input-field" placeholder="Nama Penerima" required>
                <input type="text" class="input-field" placeholder="Alamat" required>
                <input type="text" class="input-field" placeholder="No.Hp" required>
                <input type="text" class="input-field" placeholder="Jumlah Pembelian" required>
                <button type="submit" class="submit-btn" onclick="alert('Pembelian berhasil!')">Beli</button>
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