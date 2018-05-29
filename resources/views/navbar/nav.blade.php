<nav class="navbar navbar-expand-md navbar-light bg-light navbar-laravel sticky-top">
    <div class="container">
        <a class="navbar-brand navbar-logo d-block d-xl-none" href="{{ url('/') }}" height="30" width="50">
            @svg('/logo/foodify', ['class' => 'navbar-brand navbar-logo'])
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse"
                data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span id="navbar-toggle-icon" class="fal fa-bars"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">
                <li>
                    <a class="nav-link nav-home @if (str_is('home', Route::currentRouteName())) active @endif"
                       href="{{ route('home') }}">
                        Home <i class="fal fa-home"></i>
                    </a>
                </li>
                <li>
                    <a class="nav-link nav-recipes @if (str_is('recipes.*', Route::currentRouteName())) active @endif"
                       href="{{ route('recipes.index') }}">
                        Recipes <i class="fal fa-utensils"></i>
                    </a>
                </li>
                <li>
                    <a class="nav-link nav-plan @if (str_is('plan.*', Route::currentRouteName())) active @endif"
                       href="{{ route('plan.index') }}">
                        Plan <i class="fal fa-calendar"></i>
                    </a>
                </li>
                <li>
                    <a class="nav-link nav-groceries @if (str_is('groceries.*', Route::currentRouteName())) active @endif"
                       href="{{ route('groceries.index') }}">
                        Groceries <i class="fal fa-shopping-bag"></i>
                    </a>
                </li>
                <li>
                    <a class="nav-link nav-blog @if (str_is('blog.*', Route::currentRouteName())) active @endif"
                       href="{{ route('blog.index') }}">
                        Blog <i class="fal fa-comment"></i>
                    </a>
                </li>
            </ul>
            <!-- Center of Navbar -->
            <a class="navbar-brand navbar-logo d-none d-xl-block" href="{{ url('/') }}" height="30" width="50">
                @svg('/logo/foodify', ['class' => 'navbar-brand navbar-logo'])
            </a>
            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                @auth
                    @if(setting()->get('show_plan_in_navbar', auth()->user()->id))
                    <div class="d-none d-xl-inline-flex simple-plan-days-container">
                        @php $foodplan = Auth::user()->food_plan() @endphp
                        @foreach ($foodplan->days() as $day)
                            <li class="mr-1">
                                @include('modules.foodplan.partials.simple-plan-days', ['day' => $day, 'foodplan' => $foodplan])
                            </li>
                        @endforeach
                    </div>
                    @endif
                @endauth
            <!-- Authentication Links -->
                @guest
                    <li>
                        <a class="nav-link nav-user ml-1" href="{{ route('login') }}">
                            Sign in <i class="fal fa-sign-in"></i>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link nav-register ml-1"
                           href="{{ route('register') }}">Sign up <i class="fal fa-star"></i>
                        </a>
                    </li>
                    @else
                        <li class="nav-item dropdown text-right">
                            <a id="navbarDropdown" class="nav-link nav-user dropdown-toggle" href="#"
                               role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ str_limit(Auth::user()->name, 18) }} <i class="fal fa-user-circle fa-fw"></i>
                                <span class="caret"></span>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a href="{{ route('settings.index') }}" class="dropdown-item">
                                    Settings <i class="icon fal fa-cogs"></i>
                                </a>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                   document.getElementById('logout-form').submit();">
                                    Sign out <i class="icon fal fa-sign-out"></i>
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                      style="display: none;">
                                    @csrf
                                </form>
                                <hr>
                                @admin
                                <h6 class="dropdown-header">Admin</h6>
                                <a href="{{ route('home.admin') }}" class="dropdown-item">
                                    Admin dashboard <i class="icon fal fa-user-shield"></i>
                                </a>
                                <a href="{{ route('recipes.create') }}" class="dropdown-item">
                                    Submit recipe <i class="icon fal fa-plus"></i>
                                </a>
                                <a href="{{ route('comments.moderation') }}" class="dropdown-item">
                                    Moderation queue
                                    <i class="icon fal fa-shield-check"></i>
                                </a>
                                @endadmin
                            </div>
                        </li>
                        @endguest
            </ul>
        </div>
    </div>
</nav>