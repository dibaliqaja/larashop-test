<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ url('/') }}">Larashop</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ url('/') }}">LS</a>
        </div>
        <ul class="sidebar-menu">
            <li>
                <a class="nav-link" href="{{ url('/home') }}"><i class="fas fa-fire"></i>
                    <span>Home</span>
                </a>
            </li>
            <li>
                <a class="nav-link" href="{{ route('products.index') }}"><i class="fas fa-box-open"></i>
                    <span>Data Products</span>
                </a>
            </li>
        </ul>

    </aside>
</div>
