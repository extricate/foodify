<footer class="footer navbar-fixed-bottom mt-3">
    <div class="container">
        <div class="row">
            <div class="mt-3">
                <div class="col-4">
                    {{ menu('footer', 'bootstrap') }}
                </div>
                <div class="col-4">

                </div>
                <div class="col-4">
                    {{ menu('footer.legal', 'bootstrap') }}
                </div>
            </div>
        </div>
        <div class="row pb-3">
            <div class="col-4"></div>
            <div class="col-4">
                <div class="text-center">
                    <a class="navbar-brand navbar-logo" href="{{ url('/') }}" height="30" width="50">
                        @svg('/logo/foodify', ['class' => 'navbar-brand navbar-logo'])
                    </a>
                </div>
            </div>
            <div class="col-4"></div>
        </div>
    </div>
</footer>