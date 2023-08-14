<div id="layoutSidenav_nav">
    <nav class="sidenav shadow-right sidenav-light">
        <div class="sidenav-menu">
            <div class="nav accordion" id="accordionSidenav">
                @include('partials.sidenav.partials.data-master')
            </div>
        </div>

        <!-- Sidenav Footer-->
        <div class="sidenav-footer">
            <div class="sidenav-footer-content">
                <div class="sidenav-footer-subtitle">Logged in as:</div>
                @auth
                    <div class="sidenav-footer-title"></div>
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
