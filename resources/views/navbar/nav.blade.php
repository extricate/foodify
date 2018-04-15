<nav class="navbar navbar-expand-md navbar-light bg-light navbar-laravel sticky-top">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            {{ config('app.name', 'Laravel') }}
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">
                <li><a class="nav-link" href="{{ route('recipes.index') }}">Recipes <i class="fal fa-utensils"></i></a>
                </li>
                <li><a class="nav-link" href="{{ route('plan.index') }}">Plan <i class="fal fa-calendar"></i></a></li>
                <li><a class="nav-link" href="{{ route('history.index') }}">History <i class="fal fa-history"></i></a>
                </li>
            </ul>
            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                @auth
                    @php $foodplan = Auth::user()->food_plan() @endphp

                    @foreach ($foodplan->days() as $day)
                        <li class="mr-1">
                            @include('modules.foodplan.partials.simple-plan-days', ['day' => $day, 'foodplan' => $foodplan])
                        </li>
                    @endforeach
                @endauth
                <li>
                    <a href="/recipes/create" class="btn btn-primary btn-inline pull-right">
                        Submit recipe <i class="fal fa-plus"></i>
                    </a>
                </li>

                <!-- Authentication Links -->
                @guest
                    <li><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
                    <li><a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a></li>
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <i class="fal fa-user-circle fa-fw"></i><span
                                        class="caret"></span>
                            </a>

                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                      style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endguest
            </ul>
        </div>
    </div>
</nav>