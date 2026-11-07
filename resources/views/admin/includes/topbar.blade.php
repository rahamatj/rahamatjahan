<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">

        <!-- Brand -->
        <a class="navbar-brand fw-bold" href="{{ route('home') }}">
            Home
        </a>

        <!-- Navbar Menu -->
        <div class="collapse navbar-collapse" id="mainNavbar">

            <ul class="navbar-nav ms-auto">

                <li class="nav-item">
                    <a class="nav-link active" href="{{ route('home') }}">Home</a>
                </li>

                <!-- Dropdown -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle"
                       href="#"
                       role="button"
                       data-bs-toggle="dropdown"
                       aria-expanded="false">
                        Categories
                    </a>

                    <ul class="dropdown-menu">
                        <li>
                            <a class="dropdown-item" href="{{ route('categories.index') }}">
                                All Categories
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ route('categories.create') }}">
                                New Category
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle"
                       href="#"
                       role="button"
                       data-bs-toggle="dropdown"
                       aria-expanded="false">
                        Sub Categories
                    </a>

                    <ul class="dropdown-menu">
                        <li>
                            <a class="dropdown-item" href="{{ route('sub-categories.index') }}">
                                All Sub-categories
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ route('sub-categories.create') }}">
                                New Sub-category
                            </a>
                        </li>
                    </ul>

                    <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle"
                       href="#"
                       role="button"
                       data-bs-toggle="dropdown"
                       aria-expanded="false">
                        Products
                    </a>

                    <ul class="dropdown-menu">
                        <li>
                            <a class="dropdown-item" href="{{ route('products.index') }}">
                                All Products
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ route('products.create') }}">
                                New 
                                Product
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle"
                       href="#"
                       role="button"
                       data-bs-toggle="dropdown"
                       aria-expanded="false">
                        {{ auth()->user()->name }}
                    </a>

                    <ul class="dropdown-menu">
                        <li>
                            <a class="dropdown-item" 
                            onclick="event.preventDefault
                            (); document.getElementById('logout').submit();" style="cursor:pointer;">
                                Logout
                            </a>
                            <form id="logout" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </li>
            </li>
            </ul>
        </div>
    </div>
</nav>