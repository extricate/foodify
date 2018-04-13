<div class="card m-3">
    <img class="card-img-top" src="{{ $recipe->image_url }}" alt="{{ $recipe->name }}">
    <div class="card-img-overlay text-white">
        <h1 class="card-title">{{ $recipe->name }}</h1>
        <div class="card-body">
            <p class="card-text">
                {{ str_limit($recipe->description, 100) }}
            </p>
        </div>
        <a class="btn btn-primary" href="/recipes/">Select monday meals</a>
    </div>
</div>