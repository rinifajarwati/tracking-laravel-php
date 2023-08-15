{{-- Heading (Data Master) --}}

<div class="sidenav-menu-heading">Word Place</div>
{{-- Menu (Employees) --}}
<a class="nav-link collapsed" href="javascript:void(0);" data-bs-toggle="collapse" data-bs-target="#collapseLayoutsFirst"
    aria-expanded="false" aria-controls="collapseLayoutsFirst">
    <div class="nav-link-icon"><i class="fa-solid fa-folder-tree"></i></div>
    World Place
    <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
</a>

<div class="collapse  {{ Request::is('warehouse') ? 'show' : '' }}" id="collapseLayoutsFirst"
    data-bs-parent="#accordionSidenav">
    <nav class="sidenav-menu-nested nav accordion" id="accordionSidenavLayout">
        {{-- Menu (role) --}}
        @php $checks = ['developer', 'technician']; @endphp
        @if (count(array_intersect($checks, $permissions)) > 0)
       
            <a class="nav-link {{ Request::is('warehouse') ? 'active' : '' }}" href="/warehouse">
                <div class="nav-link-icon">
                    <i class="fa-solid fa-users-between-lines"></i>
                </div>
                Warehouse
            </a>
        @endif

        @php $checks = ['developer']; @endphp
        @if (count(array_intersect($checks, $permissions)) > 0)
            <a class="nav-link {{ Request::is('') ? 'active' : '' }}" href="/">
                <div class="nav-link-icon">
                    <i class="fa-solid fa-users-between-lines"></i>
                </div>
                Logistics
            </a>
        @endif
    </nav>
</div>
