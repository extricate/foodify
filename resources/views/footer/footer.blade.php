<footer class="footer navbar-fixed-bottom mt-3">
    <div class="container">
        <div class="row">
            <div class="mt-3">
                @php $menu = App\Menu::where('name', '=', 'Footer')->firstOrFail() @endphp
                <ul class="list-unstyled">
                @foreach($menu->elements as $element)
                    <li>
                        <a href="{{ $element->slug() }}">{{ $element->name }}</a>
                    </li>
                @endforeach
                </ul>
            </div>
        </div>
        <div class="row pb-3">
            <div class="col-4"></div>
            <div class="col-4">
                <div class="text-center">
                    <a class="navbar-brand navbar-logo" href="{{ url('/') }}" height="30" width="50">
                        @svg('/logo/foodify', ['class' => 'navbar-brand navbar-logo'])
                    </a>
                    <p>Copyright &copy; Foodify. All rights reserved.</p>
                </div>
            </div>
            <div class="col-4"></div>
        </div>
    </div>
</footer>