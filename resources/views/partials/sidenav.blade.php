@php
    $permissions = [];
    $userPermission = auth()?->user()?->userPermissions ?: [];
    // dd($userPermission);
    
    foreach ($userPermission as $key => $value) {
        if (!in_array($value, $permissions)) {
            $permissions[] = $value->permission->name;
        }
    }
    
    $permission_coordinators = [];
    $permission_coordinators[] = auth()?->user()?->position;
@endphp
<div id="layoutSidenav_nav">
    <nav class="sidenav shadow-right sidenav-light">
        <div class="sidenav-menu">
            <div class="nav accordion" id="accordionSidenav">
                @include('partials.sidenav.partials.data-master')
                @include('partials.sidenav.partials.word-place')
                @include('partials.sidenav.partials.finish-file')
            </div>
        </div>

        <!-- Sidenav Footer-->
        <div class="sidenav-footer">
            <div class="sidenav-footer-content">
                <div class="sidenav-footer-subtitle">Logged in as:</div>
                @auth
                    <div class="sidenav-footer-title">{{ auth()->user()->name }}</div>
                @endauth
            </div>
        </div>
    </nav>
</div>


<script>
    // Scroll into view
    const active = $(".nav-link.active");
    if (active.length > 0) {
        active[0].scrollIntoView({
            block: "center"
        });
    }
</script>
