{{-- Heading (Data Master) --}}

<div class="sidenav-menu-heading">Data Master</div>
{{-- Menu (Employees) --}}
<a class="nav-link  {{Request::is('create-user') || Request::is('divisions') || Request::is('positions') ? '' : 'collapsed' }}"
    href="javascript:void(0);" data-bs-toggle="collapse" data-bs-target="#collapseLayoutsDataMaster" aria-expanded="false"
    aria-controls="collapseLayoutsDataMaster">
    <div class="nav-link-icon"><i class="fa-solid fa-folder-tree"></i></div>
    Structure
    <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
</a>


<div class="collapse  {{ Request::is('create-user') || Request::is('divisions') || Request::is('positions') ? 'show' : '' }}"
    id="collapseLayoutsDataMaster" data-bs-parent="#accordionSidenav">
    <nav class="sidenav-menu-nested nav accordion" id="accordionSidenavLayout">
        {{-- Menu (Employee) --}}
        @php $checks = ['developer', 'superadmin']; @endphp
        @if (count(array_intersect($checks, $permissions)) > 0)
            <a class="nav-link {{ Request::is('create-user') ? 'active' : '' }}" href="/create-user">
                <div class="nav-link-icon">
                    <i class="fa-solid fa-user-plus"></i>
                </div>
                Create new account
            </a>
        @endif
        {{-- Menu (Division) --}}
        @php $checks = ['developer', 'superadmin']; @endphp
        @if (count(array_intersect($checks, $permissions)) > 0)
            <a class="nav-link {{ Request::is('divisions') ? 'active' : '' }}" href="/divisions">
                <div class="nav-link-icon">
                    <i class="fa-solid fa-users-between-lines"></i>
                </div>
                Divisions
            </a>
        @endif
         {{-- Menu (Position) --}}
         @php $checks = ['developer', 'superadmin']; @endphp
         @if (count(array_intersect($checks, $permissions)) > 0)
             <a class="nav-link {{ Request::is('positions') ? 'active' : '' }}" href="/positions">
                 <div class="nav-link-icon">
                    <i class="fa-solid fa-people-group"></i>
                 </div>
                 Position
             </a>
         @endif
    </nav>
</div>
