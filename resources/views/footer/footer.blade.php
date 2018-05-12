<footer class="footer navbar-fixed-bottom mt-3">
    <div class="container">
        <div class="row text-center">
            <div class="col-lg-4">
                <div class="mt-3">
                    @php $menu = App\Menu::where('name', '=', 'footer-left')->first() @endphp
                    <ul class="list-unstyled">
                        @if($menu != null)
                            @foreach($menu->elements as $element)
                                <li>
                                    <a href="{{ $element->path() }}">{{ $element->name }}</a>
                                </li>
                            @endforeach
                        @endif
                    </ul>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="mt-3">
                    @php $menu = App\Menu::where('name', '=', 'footer-center')->first() @endphp
                    <ul class="list-unstyled">
                        @if($menu != null)
                            @foreach($menu->elements as $element)
                                <li>
                                    <a href="{{ $element->path() }}">{{ $element->name }}</a>
                                </li>
                            @endforeach
                        @endif
                    </ul>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="mt-3">
                    @php $menu = App\Menu::where('name', '=', 'footer-right')->first() @endphp
                    <ul class="list-unstyled">
                        @if($menu != null)
                            @foreach($menu->elements as $element)
                                <li>
                                    <a href="{{ $element->path() }}">{{ $element->name }}</a>
                                </li>
                            @endforeach
                        @endif
                    </ul>
                </div>
            </div>

        </div>
        <div class="row pb-3">
            <div class="col-4"></div>
            <div class="col-4">
                <div class="text-center">
                    <a class="navbar-logo" href="{{ url('/') }}" height="30" width="50">
                        @svg('/logo/foodify', ['class' => 'navbar-brand navbar-logo'])
                    </a>
                    <p>Copyright &copy; Foodify. All rights reserved.</p>
                </div>
            </div>
            <div class="col-4"></div>
        </div>
    </div>
</footer>