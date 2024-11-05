<div class="header-container">
    <header class="header">
        <div class="logo">
            <h1>FazbearsGoodies</h1>
        </div>
        <nav class="navigation">
            <ul>
                <li><a href="{{ route('home') }}">Home</a></li>
                <li><a href="{{ route('about') }}">About Us</a></li>
                <li><a href="{{ route('products.index') }}">Products</a></li>
                <li><a href="{{ route('contact') }}">Contact</a></li>
                <li><a href="{{ route('cart') }}">Cart</a></li>  
                @guest
                    <li><a href="{{ route('login') }}">Login</a></li>
                @else
                    <li><a href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                           document.getElementById('logout-form').submit();">Logout</a></li>
                    
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                @endguest
            </ul>
        </nav>
    </header>
    <div class="hero-banner">
        <h2>Your One-Stop Shop for Restaurant Essentials</h2>
        <p>Quality products at unbeatable prices!</p>
        <a href="{{ route('products.index') }}" class="cta-button">Shop Now</a>
    </div>
</div>

<style>
    .header-container {
        background-color: #4a4a4a;
        color: white;
        padding: 20px;
    }

    .header {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .logo h1 {
        font-size: 2.5em;
        margin: 0;
    }

    .logo p {
        font-size: 1.2em;
        margin: 5px 0;
    }

    .navigation ul {
        list-style: none;
        display: flex;
        margin: 0;
        padding: 0;
    }

    .navigation li {
        margin: 0 15px;
        border-radius: 10px;
        padding: 5px 10px;
    }

    .navigation a {
        color: white;
        text-decoration: none;
        font-size: 1.1em;
    }

    .navigation a:hover {
        color: #ffcc00;
    }

    .hero-banner {
        text-align: center;
        background-image: url('{{ asset('images/your-banner-image.jpg') }}');
        background-size: cover;
        padding: 50px 20px;
        margin-top: 20px;
    }

    .hero-banner h2 {
        font-size: 2em;
        margin: 0;
    }

    .hero-banner p {
        font-size: 1.2em;
    }

    .cta-button {
        background-color: #ffcc00;
        color: black;
        padding: 10px 20px;
        text-decoration: none;
        border-radius: 5px;
        transition: background-color 0.3s;
    }

    .cta-button:hover {
        color: white;
    }
</style>