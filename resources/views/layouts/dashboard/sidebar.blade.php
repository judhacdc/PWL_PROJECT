<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="dashboard.html">
        <div class="sidebar-brand-icon">
            <i class="fas fa-laptop-medical"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Smart Pharmacy Product</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="/dashboard">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    @if(Auth::user()->role_id == 1 || Auth::user()->role_id == 2)
    <!-- Nav Item - Items Menu -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('product.index') }}">
            <i class="fas fa-fw fa-prescription-bottle-alt"></i>
            <span>Items</span></a>
    </li>
    @endif

</ul>
<!-- End of Sidebar -->
