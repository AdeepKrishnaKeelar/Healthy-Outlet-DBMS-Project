<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <div class="hero">
        <div class="form-box">
            <div class="button-box">
                <div id="btn"></div>
                <button type="button" class="toggle-btn" onclick="login()">Login</button>
                <button type="button" class="toggle-btn" onclick="register()">Register</button>
            </div>
            <form id="login" class="input-group">
            <input type="text" class="input-field" placeholder="User ID" required>
            <input type="text" class="input-field" placeholder="Password" required> 
            <input type="checkbox" class="chech-box"><span>Remember Password </span>
            <button type="submit" class="submit-btn">Log In</button>
            </form>
            <form id="register" class="input-group">
            <input type="text" class="input-field" placeholder="User ID" required>
            <input type="email" class="input-field" placeholder="Email ID" required>
            <input type="text" class="input-field" placeholder="Enter Password" required> 
            <input type="checkbox" class="chech-box"><span>I agree to the terms and conditions</span>
            <button type="submit" class="submit-btn">Register</button>
            </form>
        </div>
    </div>

    <script>
        var x=document.getElementById("login");
        var y=document.getElementById("register");
        var z=document.getElementById("btn");

        function register() {
            x.style.left="-400px";
            y.style.left="50px";
            z.style.left="110px";
        }
        function login() {
            x.style.left="50px";
            y.style.left="450px";
            z.style.left="0px";
        }

    </script>

</body>
</html>