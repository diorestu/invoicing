<nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme d-print-none"
    id="layout-navbar">
    <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
        <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
            <i class="bx bx-menu bx-sm"></i>
        </a>
    </div>

    <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
        <!-- Search -->
        {{-- <div class="navbar-nav align-items-center">
			<div class="nav-item d-flex align-items-center">
				<i class="bx bx-search fs-4 lh-0"></i>
				<input type="text" class="form-control border-0 shadow-none" placeholder="Search..." aria-label="Search..." />
			</div>
		</div> --}}
        <!-- /Search -->

        <ul class="navbar-nav flex-row align-items-center ms-auto">
            <!-- Place this tag where you want the button to render. -->

            @auth
                <!-- User -->
                <li class="nav-item navbar-dropdown dropdown-user dropdown">
                    <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                        <div class="avatar avatar-online">
                            <img src="{{ asset('assets/img/no-staff.jpg') }}" alt class="w-px-40 h-auto rounded-circle" />
                        </div>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li>
                            <a class="dropdown-item" href="#">
                                <div class="d-flex">
                                    <div class="flex-shrink-0 me-3">
                                        <div class="avatar avatar-online">
                                            <img src="{{ asset('assets/img/no-staff.jpg') }}" alt
                                                class="w-px-40 h-auto rounded-circle" />
                                        </div>
                                    </div>
                                    <div class="flex-grow-1">
                                        <span class="fw-semibold d-block">
                                            {{ user()->nama }}
                                        </span>
                                        <small class="text-muted">
                                            {{ strtoupper(user()->roles[0]->name) }}
                                        </small>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <div class="dropdown-divider"></div>
                        </li>
                        @role('Admin')
                            <li>
                                <a class="dropdown-item" href="#">
                                    <i class="bx bx-cog me-2"></i>
                                    <span class="align-middle">Pengaturan</span>
                                </a>
                            </li>
                            <li>
                                <div class="dropdown-divider"></div>
                            </li>
                        @endrole
                        <li>
                            <a class="dropdown-item text-danger" href="javascript:;" onclick="logout()">
                                <i class="bx bx-power-off me-2"></i>
                                <span class="align-middle">Log Out</span>
                            </a>

                            <form action="{{ route('logout') }}" method="POST" class="d-none" id="logout-form">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </li>
                <!--/ User -->
            @endauth
        </ul>
    </div>
</nav>

@push('js')
    <script>
        function logout() {
            event.preventDefault()
            swalConfirm('Are you sure?', "This will stop your login session!", 'Yes, logout now!', () => {
                document.getElementById('logout-form').submit();
            });
        }
    </script>
@endpush
