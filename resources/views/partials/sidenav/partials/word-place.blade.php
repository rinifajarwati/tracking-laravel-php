{{-- Heading (Data Master) --}}

<div class="sidenav-menu-heading">File</div>
{{-- Menu (Employees) --}}
<a class="nav-link {{ Request::is('warehouse') || Request::is('rma') || Request::is('delivery-order') || Request::is('letter-retur') ? '' : 'collapsed' }}" href="javascript:void(0);" data-bs-toggle="collapse" data-bs-target="#collapseLayoutsFile"
    aria-expanded="false" aria-controls="collapseLayoutsFile">
    <div class="nav-link-icon"><i class="fa-regular fa-folder-open"></i></div>
    File
    <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
</a>

<div class="collapse  {{ Request::is('warehouse') ||  Request::is('rma') ||  Request::is('delivery-order') ||  Request::is('letter-retur') ? 'show' : '' }}" id="collapseLayoutsFile"
    data-bs-parent="#accordionSidenav">
    <nav class="sidenav-menu-nested nav accordion" id="accordionSidenavLayout">
        {{-- Menu (role) --}}
        @php $checks = ['developer', 'sales', 'warehouse', 'logistics']; @endphp
        @if (count(array_intersect($checks, $permissions)) > 0)
            <a class="nav-link {{ Request::is('warehouse') ? 'active' : '' }}" href="/warehouse">
                <div class="nav-link-icon">
                    <i class="fa-solid fa-file-pdf"></i></i>
                </div>
                SO Gudang
            </a>
        @endif

        @php $checks = ['developer', 'technician', 'qc']; @endphp
        @if (count(array_intersect($checks, $permissions)) > 0)
            <a class="nav-link {{ Request::is('rma') ? 'active' : '' }}" href="/rma">
                <div class="nav-link-icon">
                    <i class="fa-solid fa-file-pdf"></i>
                </div>
                Surat Perintah Kerja
            </a>
        @endif

        @php $checks = ['developer', 'qc', 'logistics']; @endphp
        @if (count(array_intersect($checks, $permissions)) > 0)
            <a class="nav-link {{ Request::is('delivery-order') ? 'active' : '' }}" href="/delivery-order">
                <div class="nav-link-icon">
                    <i class="fa-solid fa-file-pdf"></i>
                </div>
                Delivery Order
            </a>
        @endif

        @php $checks = ['developer','sales', 'warehouse', 'scm', 'technician']; @endphp
        @if (count(array_intersect($checks, $permissions)) > 0)
            <a class="nav-link {{ Request::is('letter-retur') ? 'active' : '' }}" href="/letter-retur">
                <div class="nav-link-icon">
                    <i class="fa-solid fa-file-pdf"></i>
                </div>
                Surat Retur
            </a>
        @endif
        
        @php $checks = ['developer','sales']; @endphp
        @if (count(array_intersect($checks, $permissions)) > 0)
            <a class="nav-link {{ Request::is('soharga') ? 'active' : '' }}" href="/soharga">
                <div class="nav-link-icon">
                    <i class="fa-solid fa-file-pdf"></i>
                </div>
                SO Harga
            </a>
        @endif
    </nav>
</div>
