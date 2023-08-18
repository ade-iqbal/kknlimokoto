<div id="loading">
    @include('partials.dashboard._body_loader')
</div>
@include('partials.dashboard._body_sidebar')
<main class="main-content">
    <div class="position-relative">
    @include('partials.dashboard._body_header')
    @include('partials.dashboard.sub-header')
    </div>
    
    <div class="conatiner-fluid content-inner mt-n5 py-0">
    {{ $slot }}
    </div>
    
    @include('partials.dashboard._body_footer')
</main>
@include('partials.dashboard._scripts')
</div>
