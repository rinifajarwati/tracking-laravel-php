@if (session()->has('alertSuccess'))
    <div class="alert alert-success alert-icon" role="alert">
        <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
        <div class="alert-icon-aside">
            <i class="fas fa-circle-check fa-fw"></i>
        </div>
        <div class="alert-icon-content">
            <h6 class="alert-heading">{{ session('alertSuccess') }}</h6>
        </div>
    </div>
@endif

@if (session()->has('alertError'))
    <div class="alert alert-danger alert-icon" role="alert">
        <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
        <div class="alert-icon-aside">
            <i class="fas fa-circle-exclamation fa-fw"></i>
        </div>
        <div class="alert-icon-content">
            <h6 class="alert-heading">{{ session('alertError') }}</h6>
        </div>
    </div>
@endif

@if (session()->has('alertWarning'))
    <div class="alert alert-warning alert-icon" role="alert">
        <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
        <div class="alert-icon-aside">
            <i class="fa-solid fa-triangle-exclamation"w></i>
        </div>
        <div class="alert-icon-content">
            <h6 class="alert-heading">{{ session('alertWarning') }}</h6>
        </div>
    </div>
@endif
