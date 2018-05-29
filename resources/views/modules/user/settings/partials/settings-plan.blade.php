{!! Form::open([
                'method' => 'PATCH',
                'route' => ['settings.patch'],
                'enctype' => 'multipart/form-data'
            ]) !!}
@include('modules.user.settings.partials.plan.show_plan_in_navbar')
@include('modules.user.settings.partials.plan.show_planning_options_on_recipes_index')
<button type="submit" class="btn btn-primary">Change</button>
{!! Form::close() !!}