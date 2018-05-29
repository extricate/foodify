{!! Form::open([
                'method' => 'PATCH',
                'route' => ['settings.patch'],
                'enctype' => 'multipart/form-data'
            ]) !!}
@include('modules.user.settings.partials.plan.show_plan_in_navbar')
@include('modules.user.settings.partials.plan.show_planning_options_on_recipes_index')
<button type="submit" class="btn btn-primary">Change settings</button>

@php
    setting()->setExtraColumns(['user_id' => auth()->user()->id]);
    echo(setting('show_plan_in_navbar'));
    //var_dump($user->getSetting('show_plan_in_navbar'));
@endphp
{!! Form::close() !!}