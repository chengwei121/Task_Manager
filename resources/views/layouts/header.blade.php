<header class="glass-header">
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid px-4">
            <!-- Brand -->
            <a class="navbar-brand d-flex align-items-center" href="{{ url('/') }}">
                <div class="brand-icon-wrapper me-2">
                    <i class="bi bi-check2-square"></i>
                </div>
                <span class="brand-text">TaskFlow</span>
            </a>

            <!-- Mobile Toggle -->
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <i class="bi bi-list"></i>
            </button>

            <!-- Main Navigation -->
            <div class="collapse navbar-collapse" id="navbarNav">
                <!-- Center Menu Items -->
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('tasks.index') }}">
                            <i class="bi bi-house"></i> Dashboard
                        </a>
                    </li>
                    @auth
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('tasks.create') }}">
                                <i class="bi bi-plus-circle"></i> New Task
                            </a>
                        </li>
                    @endauth
                </ul>

                <!-- Right Side Items -->
                <div class="d-flex align-items-center gap-3">
                    @auth
                        <!-- User Menu -->
                        <div class="dropdown">
                            <button class="btn d-flex align-items-center gap-2 user-menu" data-bs-toggle="dropdown">
                                <div class="avatar-wrapper">
                                    <img src="{{ Auth::user()->avatar ?? 'https://ui-avatars.com/api/?name=' . urlencode(Auth::user()->name) }}" 
                                         alt="User avatar">
                                </div>
                                <span class="d-none d-md-inline">{{ Auth::user()->name }}</span>
                                <i class="bi bi-chevron-down"></i>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><a class="dropdown-item" href="#"><i class="bi bi-person me-2"></i>Profile</a></li>
                                <li><a class="dropdown-item" href="#"><i class="bi bi-gear me-2"></i>Settings</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li>
                                    <form action="{{ route('logout') }}" method="POST">
                                        @csrf
                                        <button class="dropdown-item text-danger">
                                            <i class="bi bi-box-arrow-right me-2"></i>Logout
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    @else
                        <div class="auth-buttons">
                            <a href="{{ route('login') }}" class="btn btn-outline-primary">Login</a>
                            <a href="{{ route('register') }}" class="btn btn-primary">Register</a>
                        </div>
                    @endauth
                </div>
            </div>
        </div>
    </nav>
</header>

<style>
.glass-header {
    background: rgba(255, 255, 255, 0.95);
    backdrop-filter: blur(10px);
    border-bottom: 1px solid rgba(231, 231, 231, 0.8);
    position: sticky;
    top: 0;
    z-index: 1000;
}

.dropdown-menu-end[data-bs-popper] {
    right: 0;
}

.navbar {
    padding: 1rem 0;
}

.brand-icon-wrapper {
    width: 35px;
    height: 35px;
    background: linear-gradient(45deg, #4CAF50, #8BC34A);
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 1.2rem;
}

.brand-text {
    font-weight: 700;
    background: linear-gradient(45deg, #2c3e50, #3498db);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
}

.nav-link {
    padding: 0.5rem 1rem;
    color: #666;
    border-radius: 8px;
    transition: all 0.3s ease;
}

.nav-link:hover {
    color: #4CAF50;
    background: rgba(76, 175, 80, 0.1);
}

.nav-link i {
    margin-right: 0.5rem;
}

.btn-icon {
    width: 40px;
    height: 40px;
    padding: 0;
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #666;
    background: transparent;
    transition: all 0.3s ease;
}

.btn-icon:hover {
    background: rgba(0, 0, 0, 0.05);
    color: #4CAF50;
}

.avatar-wrapper {
    width: 35px;
    height: 35px;
    border-radius: 10px;
    overflow: hidden;
}

.avatar-wrapper img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.search-wrapper {
    position: relative;
    padding: 1rem 0;
}

.search-wrapper i {
    position: absolute;
    left: 1rem;
    top: 50%;
    transform: translateY(-50%);
    color: #666;
}

.search-wrapper .form-control {
    padding: 1rem 3rem;
    border-radius: 10px;
    border: 1px solid rgba(0, 0, 0, 0.1);
}

.search-wrapper .btn-link {
    position: absolute;
    right: 1rem;
    top: 50%;
    transform: translateY(-50%);
    color: #666;
}

@media (max-width: 768px) {
    .navbar-nav {
        padding: 1rem 0;
    }
    
    .nav-link {
        padding: 0.75rem 1rem;
    }
    
    .auth-buttons {
        display: flex;
        flex-direction: column;
        gap: 0.5rem;
        width: 100%;
        margin-top: 1rem;
    }
}
</style>
