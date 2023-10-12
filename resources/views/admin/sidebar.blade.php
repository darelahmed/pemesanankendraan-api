<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3 sidebar-sticky">
        <ul class="nav flex-column">
            <li class="text-muted text-uppercase">
                <a class="nav-link" aria-current="page" href="">
                    <span class="align-text-bottom"></span>
                    Admin Pemesanan Kendaraan
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('vehicle.page') }}" selected>
                    <span data-feather="file" class="align-text-bottom"></span>
                    Vehicle
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('vehiclebooking.page') }}">
                    <span data-feather="shopping-cart" class="align-text-bottom"></span>
                    Vehicle Booking
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('vehicleapproval.page') }}">
                    <span data-feather="shopping-cart" class="align-text-bottom"></span>
                    Vehicle Approval
                </a>
            </li>
        </ul>

        <h6
            class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted text-uppercase">
            <span>Account Pages</span>
            <a class="link-secondary" href="#" aria-label="Add a new report">
                <span data-feather="plus-circle" class="align-text-bottom"></span>
            </a>
        </h6>
        <ul class="nav flex-column mb-2">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('profile.page', $profile->id) }}">
                    <span data-feather="file-text" class="align-text-bottom"></span>
                    Profile
                </a>
            </li>
        </ul>
    </div>
</nav>
