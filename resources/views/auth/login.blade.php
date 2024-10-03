@extends("layout.default")
@section("title","login")
@section("content")
<style>
body {
    font-family: Arial, sans-serif;
    background-color: #FF9933;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin: 0;
}

.container {
    background-color: #000000;
    border-radius: 20px;
    padding: 30px;
    display: flex;
    width: 80%;
    max-width: 800px;
}

.logo-section {
    flex: 1;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
}

.form-section {
    flex: 1;
    color: white;
}

.logo {
    width: 150px;
    height: auto;
}

h1 {
    font-size: 24px;
    margin-bottom: 20px;
}

input {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    border: none;
    border-bottom: 1px solid white;
    background: transparent;
    color: white;
}

.signup-btn {
    background-color: #FF9933;
    color: white;
    border: none;
    padding: 10px 20px;
    border-radius: 20px;
    cursor: pointer;
    width: 100%;
    font-size: 16px;
}

.login-text {
    font-size: 12px;
    margin-top: 10px;
}

.login-link {
    color: #FF9933;
    text-decoration: none;
}

.social-icons {
    display: flex;
    justify-content: center;
    margin-top: 20px;
}

.social-icon {
    width: 30px;
    height: 30px;
    margin: 0 10px;
}
</style>
</head>

<body>
    <div class="container">
        <div class="logo-section">
            <img src="logo.jpg" alt="Quizzly Logo" class="logo">
            <h5 style="color: white; margin-top: 10px;">Test your knowledge, beat the clock, and conquer the quiz!</h5>
        </div>
        <div class="form-section">
            <h1>LOGIN</h1>
            <form method="POST" action="{{ route('login.post') }}">
                @csrf
                <input type="email" name="email" placeholder="email" required>
                <input type="password" name="password" placeholder="password" required>
                <button type="submit" class="signup-btn">LOGIN</button>
            </form>
            <br>
            <p class="login-text">DON"T HAVE AN ACCOUNT? <a href="{{route("register")}}" class="login-link">REGISTER</a>
            </p>

        </div>
    </div>
    @endsection