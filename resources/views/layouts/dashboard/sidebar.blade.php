    {{--  batas  --}}
    <div class="l-navbar" id="nav-bar">
        <nav class="nav">
            <div>
                <a href="{{ url('/dashboard/category') }}" class="nav_logo">
                    <i class='bx bxs-store-alt text-white'></i>
                    <span class="nav_logo-name">SayonaraSHOP</span>
                </a>
                <div class="nav_list">
                    <a href="{{ url('dashboard/category') }}"
                        class="nav_link {{ Request::is('dashboard/category') ? 'active' : '' }}">
                        <i class="bx bx-purchase-tag nav_icon"></i>
                        <span class="nav_name">Category</span>
                    </a>
                    <a href="{{ url('dashboard/product') }}"
                        class="nav_link {{ Request::is('dashboard/product') ? 'active' : '' }}">
                        <i class="bx bx-bowl-rice nav_icon"></i>
                        <span class="nav_name">Product</span>
                    </a>
                    <a href="{{ url('/') }}" class="nav_link {{ Request::is('/') ? 'active' : '' }}">
                        <i class="bx bxs-slideshow nav_icon"></i>
                        <span class="nav_name">User Side</span>
                    </a>
                </div>
            </div>
            <form action="/logout" method="POST">
                @csrf
                <button type="submit" class="nav_link bg-transparent border-0">
                    <i class="bx bx-log-out nav_icon"></i>
                    <span class="nav_name">Logout</span>
                </button>
            </form>
        </nav>
    </div>
    {{--  batas  --}}
