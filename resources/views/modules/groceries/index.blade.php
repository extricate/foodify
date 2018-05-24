@extends('layouts.app')

@section('title', 'Grocery list')

@section('submenu')
    <div class="align-self-center">
        {{ Breadcrumbs::render('groceries.index') }}
    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            Your grocery list this week
            <ul>
                @foreach($foodplan->days() as $day)
                    @php $recipe = $foodplan->$day(); @endphp
                    <li>{{ $recipe->name }}</li>
                    <ul>
                        @foreach($recipe->ingredients as $ingredient)
                            <li>{{ $ingredient->name }}, {{ $ingredient->quantity }}</li>
                        @endforeach
                    </ul>
                @endforeach
            </ul>
        </div>
    </div>
@endsection