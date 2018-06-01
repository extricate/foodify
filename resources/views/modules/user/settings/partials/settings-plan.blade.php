{!! Form::open([
                'method' => 'PATCH',
                'route' => ['settings.patch'],
                'enctype' => 'multipart/form-data'
            ]) !!}
@include('modules.user.settings.partials.radio', ['setting' => 'show_plan_in_navbar'])
@include('modules.user.settings.partials.radio', ['setting' => 'show_planning_options_on_recipes_index'])
@include('modules.user.settings.partials.radio', ['setting' => 'show_plan_on_recipe_index'])
@include('modules.user.settings.partials.radio', ['setting' => 'show_plan_on_dashboard'])
<div class="text-right">
    <button type="submit" class="btn btn-primary">Change settings <i class="fal fa-arrow-right"></i></button>
</div>
{!! Form::close() !!}