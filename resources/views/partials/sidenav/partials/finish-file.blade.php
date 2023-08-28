{{-- Heading (Finish File) --}}

<div class="sidenav-menu-heading">File Finish</div>
{{-- Menu (Employees) --}}
<a class="nav-link {{ Request::is('warehouse-finish') || Request::is('letter-retur-finish')? '' : 'collapsed' }}" href="javascript:void(0);" data-bs-toggle="collapse" data-bs-target="#collapseLayoutsFileFinish"
    aria-expanded="false" aria-controls="collapseLayoutsFileFinish">
    <div class="nav-link-icon"><i class="fa-regular fa-folder-open"></i></div>
    Finish File
    <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
</a>

<div class="collapse  {{ Request::is('warehouse-finish') || Request::is('letter-retur-finish') ? 'show' : '' }}" id="collapseLayoutsFileFinish"
    data-bs-parent="#accordionSidenav">
    <nav class="sidenav-menu-nested nav accordion" id="accordionSidenavLayout">
        {{-- Menu (so gudang) --}}
        @php $checks = ['developer', 'sales', 'warehouse', 'logistics']; @endphp
        @if (count(array_intersect($checks, $permissions)) > 0)
            <a class="nav-link {{ Request::is('warehouse-finish') ? 'active' : '' }}" href="/warehouse-finish">
                <div class="nav-link-icon">
                    <i class="fa-solid fa-file-pdf"></i></i>
                </div>
                SO Gudang Finish
            </a>
        @endif
        {{-- Menu (letter retur) --}}
        @php $checks = ['developer','sales', 'warehouse', 'scm', 'technician']; @endphp
        @if (count(array_intersect($checks, $permissions)) > 0)
            <a class="nav-link {{ Request::is('letter-retur-finish') ? 'active' : '' }}" href="/letter-retur-finish">
                <div class="nav-link-icon">
                    <i class="fa-solid fa-file-pdf"></i></i>
                </div>
                Surat Retur Finish
            </a>
        @endif
    </nav>
</div>
