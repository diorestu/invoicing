<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="/" class="app-brand-link">
            <span class="fw-bolder ms-2">
                OS
            </span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <!-- Dashboard -->
        <li class="menu-item {{ menuIsActive('home') }}">
            <a href="{{ route('home') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">
                    {{ __('Dashboard') }}
                </div>
            </a>
        </li>

        @hasanyrole('Management|Admin')
            <li class="menu-header small text-uppercase">
                <span class="menu-header-text">
                    {{ __('Master') }}
                </span>
            </li>
            <li class="menu-item {{ menuIsActive('users.*') }}">
                <a href="{{ route('users.index') }}" class="menu-link">
                    <i class="menu-icon tf-icons bx bxs-user-circle"></i>
                    <div data-i18n="Pengguna">
                        {{ __('Pengguna') }}
                    </div>
                </a>
            </li>
            <li class="menu-item {{ menuIsActive('vendor.*') }}">
                <a href="{{ route('vendor.index') }}" class="menu-link">
                    <i class="menu-icon tf-icons bx bxs-food-menu"></i>
                    <div data-i18n="Vendor">
                        {{ __('Vendor') }}
                    </div>
                </a>
            </li>
        @endhasanyrole

        @hasanyrole('Commercial|Admin')
            <li class="menu-item {{ menuIsActive('client.*') }}">
                <a href="{{ route('client.index') }}" class="menu-link">
                    <i class="menu-icon tf-icons bx bxs-buildings"></i>
                    <div data-i18n="Klien">
                        {{ __('Klien') }}
                    </div>
                </a>
            </li>
        @endhasanyrole

        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">
                {{ __('Kelola') }}
            </span>
        </li>
        @hasanyrole('Commercial|Finance|Management|Admin')
            <li class="menu-item {{ menuIsActive('contract.*') }} {{ menuIsOpen('contract.*') }}">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons bx bxs-inbox"></i>
                    <div class="text-truncate" data-i18n="Kontrak">Kontrak</div>
                </a>
                <ul class="menu-sub">
                    <li class="menu-item {{ menuIsActive('contract.index') }}">
                        <a href="{{ route('contract.index') }}" class="menu-link">
                            <div class="text-truncate" data-i18n="Kontrak SDM">Kontrak SDM</div>
                        </a>
                    </li>
                    <li class="menu-item {{ menuIsActive('contract.index-pekerjaan') }}">
                        <a href="{{ route('contract.index-pekerjaan') }}" class="menu-link">
                            <div class="text-truncate" data-i18n="Kontrak Pekerjaan">Kontrak Pekerjaan</div>
                        </a>
                    </li>
                    <li class="menu-item {{ menuIsActive('contract.history') }}">
                        <a href="{{ route('contract.history') }}" class="menu-link">
                            <div class="text-truncate" data-i18n="Riwayat Kontrak">Riwayat Kontrak</div>
                        </a>
                    </li>
                </ul>
            </li>
        @endhasanyrole

        @hasanyrole('Finance|Invoice|Admin')
            <li class="menu-item {{ menuIsActive('invoice.*') }}">
                <a href="{{ route('invoice.index') }}" class="menu-link">
                    {{-- <i class="menu-icon tf-icons bx bx-money-withdraw"></i> --}}
                    <i class='menu-icon tf-icons bx bxs-credit-card-front'></i>
                    <div data-i18n="Invoice">
                        {{ __('Invoice') }}
                    </div>
                </a>
            </li>
        @endhasanyrole

        <li class="menu-item {{ menuIsActive('laporan.*') }}">
            <a href="{{ route('laporan.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bxs-file"></i>
                <div data-i18n="Laporan">
                    {{ __('Laporan') }}
                </div>
            </a>
        </li>
        {{-- <li class="menu-item {{ menuIsActive('invoice.*') }}">
            <a href="{{ route('users.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bxs-wallet-alt"></i>
                <div data-i18n="Fee Management">
                    {{ __('Fee Management') }}
                </div>
            </a>
        </li> --}}


        <!-- <li class="menu-item">
   <a href="javascript:void(0);" class="menu-link menu-toggle">
    <i class="menu-icon tf-icons bx bx-cube-alt"></i>
    <div data-i18n="Misc">Misc</div>
   </a>
   <ul class="menu-sub">
    <li class="menu-item">
     <a href="javascript:void(0);" class="menu-link">
      <div data-i18n="Error">Error</div>
     </a>
    </li>
   </ul>
  </li> -->

    </ul>
</aside>
