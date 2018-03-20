@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <h1 class="primary">What will you eat this week?</h1>

        @isset(Auth::user()->food_plan()->monday)

        @endisset
        <div class="col-md-6">
            <div class="card m-3">
                <img class="card-img-top" src="images/recipes/img_103735_1600x560_JPG.jpg" alt="Card image cap">
                <div class="card-img-overlay text-white">
                    <h1 class="card-title">Monday</h1>
                    <a class="btn btn-primary" href="/recipes/">Select monday meals</a>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card m-3">
                <img class="card-img-top" src="images/recipes/img_103735_1600x560_JPG.jpg" alt="Card image cap">
                <div class="card-img-overlay text-white">
                    <h1 class="card-title">Tuesday</h1>
                    <a class="btn btn-primary" href="/recipes/">Select tuesday meals</a>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card m-3">
                <img class="card-img-top" src="images/recipes/img_103735_1600x560_JPG.jpg" alt="Card image cap">
                <div class="card-img-overlay text-white">
                    <h1 class="card-title">Wednesday</h1>
                    <a class="btn btn-primary" href="/recipes/">Select wednesday meals</a>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card m-3">
                <img class="card-img-top" src="images/recipes/img_103735_1600x560_JPG.jpg" alt="Card image cap">
                <div class="card-img-overlay text-white">
                    <h1 class="card-title">Thursday</h1>
                    <a class="btn btn-primary" href="/recipes/">Select thursday meals</a>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card m-3">
                <img class="card-img-top" src="images/recipes/img_103735_1600x560_JPG.jpg" alt="Card image cap">
                <div class="card-img-overlay text-white">
                    <h1 class="card-title">Friday</h1>
                    <a class="btn btn-primary" href="/recipes/">Select friday meals</a>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card m-3">
                <img class="card-img-top" src="images/recipes/img_103735_1600x560_JPG.jpg" alt="Card image cap">
                <div class="card-img-overlay text-white">
                    <h1 class="card-title">Saturday</h1>
                    <a class="btn btn-primary" href="/recipes/">Select saturday meals</a>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card m-3">
                <img class="card-img-top" src="images/recipes/img_103735_1600x560_JPG.jpg" alt="Card image cap">
                <div class="card-img-overlay text-white">
                    <h1 class="card-title">Sunday</h1>
                    <a class="btn btn-primary" href="/recipes/">Select sunday meals</a>
                </div>
            </div>
        </div>

    </div>
@endsection
