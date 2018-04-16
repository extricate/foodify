<div
        @if( $recipe != null)
        style="background-image: url('{{ $recipe->getFirstMedia()->getUrl() }}'); background-size: cover; background-repeat: no-repeat;"
        data-toggle="tooltip" data-placement="top" title="{{ $day }}: {{ $recipe->name }}"
        @endif
        class="img-recipe">
    <a href="@if( $recipe != null) {{ route('recipes.show', $recipe->id) }} @else {{ route('recipes.index') }} @endif"
       class="btn btn-default img-overlay text-light text-capitalize font-weight-bold">
        {{ substr($day, 0, 2) }}
    </a>
</div>