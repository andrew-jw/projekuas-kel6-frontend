<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - SuShoes</title>
    <link rel="stylesheet" href="{{ asset('css/adminLogin.css') }}">
    <!-- JQuery script -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <link rel="icon" href="{{ asset('img/brand-logo.png') }}" type="image/png" />
</head>
<body>
    <!-- Navigation Bar Start-->
    <nav class="navbar fade-in blur">
        <div class="navbar-logo">
            <a href="{{ route('home') }}">
                <img src="{{ asset('img/brand-logo.png') }}" id="navbar-logo">    
            </a>
        </div>
        <div class="navbar-menu">
            <div class="close-button" id="close-button">&times;</div>
            <ul>
                <li><h3>Administration</h3></a></li>
            </ul>
            <!-- Mobile Icons -->
            <div class="mobile-icons">
                <a><div class="icon-container"><a href="{{ route('home') }}" id="home-button"><img class="icon" src="{{ asset('img/home.png') }}"></div></a> </a>
            </div>
        </div>        
        <!-- Destkop Icons -->
        <div class="icons">
            <a><div class="icon-container"><a href="{{ route('home') }}" id="home-button"><img class="icon" src="{{ asset('img/home.png') }}"></div></a> </a>
        </div>
        <div class="burger-menu" id="burger-menu">
            <div class="line"></div>
            <div class="line"></div>
            <div class="line"></div>
        </div>
    </nav>
    <!-- Navigation Bar End -->

    <!-- Contact Form Start -->
    <div class="modal fade-in blur">
        <div class="modal-overlay"></div>
        <div class="modal-content">
            <h2>Administrator Login</h2>
            <form>
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="username" id="username" name="username" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" required></input>
                </div>
                <button type="submit">Login ></button>
            </form>
        </div>
    </div>

    <footer class="footer fade-in blur">
        <div class="footer-content">
            <div class="logo">
                <img src="{{ asset('img/brand-logo.png') }}"/>
            </div>
        </div>
        <div class="copyright">
            Copyright &copy; 2024 SuShoes Co.
        </div>
    </footer>
    <!-- Footer End -->
    <script src="{{ asset('js/adminLogin.js') }}"></script>
</body>
</html>