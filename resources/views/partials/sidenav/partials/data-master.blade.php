{{-- Heading (Data Master) --}}

    <div class="sidenav-menu-heading">Data Master</div>
    {{-- Menu (Employees) --}}
    <a class="nav-link collapsed"
        href="javascript:void(0);" data-bs-toggle="collapse" data-bs-target="#collapseLayoutsFirst" aria-expanded="false"
        aria-controls="collapseLayoutsFirst">
        <div class="nav-link-icon"><i class="fa-solid fa-folder-tree"></i></div>
        Structure
        <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
    </a>

    <div class="collapse  {{ Request::is('divisions')? 'show' : '' }}"
        id="collapseLayoutsFirst" data-bs-parent="#accordionSidenav">
        <nav class="sidenav-menu-nested nav accordion" id="accordionSidenavLayout">
            {{-- Menu (role) --}}
            <a class="nav-link {{ Request::is('divisions') ? 'active' : '' }}" href="/divisions">
                <div class="nav-link-icon">
                    <i class="fa-solid fa-users-between-lines"></i>
                </div>
                Divisions
            </a>
        </nav>
    </div>


