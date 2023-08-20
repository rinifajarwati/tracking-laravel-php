{{-- Heading (Data Master) --}}

<div class="sidenav-menu-heading">Works Place</div>
{{-- Menu (Employees) --}}
<a class="nav-link collapsed" href="javascript:void(0);" data-bs-toggle="collapse" data-bs-target="#collapseLayoutsFirst"
    aria-expanded="false" aria-controls="collapseLayoutsFirst">
    <div class="nav-link-icon"><i class="fa-solid fa-folder-tree"></i></div>
    Works Place
    <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
</a>

<div class="collapse  {{ Request::is('warehouse') ? 'show' : '' }}" id="collapseLayoutsFirst"
    data-bs-parent="#accordionSidenav">
    <nav class="sidenav-menu-nested nav accordion" id="accordionSidenavLayout">
        {{-- Menu (role) --}}
        @php $checks = ['developer', 'sales', 'warehouse', 'logistics']; @endphp
        @if (count(array_intersect($checks, $permissions)) > 0)
            <a class="nav-link {{ Request::is('warehouse') ? 'active' : '' }}" href="/warehouse">
                <div class="nav-link-icon">
                    <i class="fa-solid fa-users-between-lines"></i>
                </div>
                Warehouse
            </a>
        @endif

        @php $checks = ['developer', 'sales', 'technician', 'qc']; @endphp
        @if (count(array_intersect($checks, $permissions)) > 0)
       
            <a class="nav-link {{ Request::is('rma') ? 'active' : '' }}" href="/rma">
                <div class="nav-link-icon">
                    <i class="fa-solid fa-users-between-lines"></i>
                </div>
                rma
            </a>
        @endif

        @php $checks = ['developer', 'sales', 'qc', 'logistics']; @endphp
        @if (count(array_intersect($checks, $permissions)) > 0)
       
            <a class="nav-link {{ Request::is('delivery-order') ? 'active' : '' }}" href="/delivery-order">
                <div class="nav-link-icon">
                    <i class="fa-solid fa-users-between-lines"></i>
                </div>
                Delivery Order
            </a>
        @endif

        @php $checks = ['developer','sales', 'warehouse', 'marketing']; @endphp
        @if (count(array_intersect($checks, $permissions)) > 0)
            <a class="nav-link {{ Request::is('letter-retur') ? 'active' : '' }}" href="/letter-retur">
                <div class="nav-link-icon">
                    <i class="fa-solid fa-users-between-lines"></i>
                </div>
                Letter Retur
            </a>
        @endif
    </nav>
</div>
