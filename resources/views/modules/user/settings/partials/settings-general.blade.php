{!! Form::open([
                'method' => 'PATCH',
                'route' => ['settings.patch'],
                'enctype' => 'multipart/form-data'
            ]) !!}
@include('modules.user.settings.partials.radio', [
        'setting' => 'no_automatic_foodplans',
        'title' => 'Opt-out from Foodify weekly plan generation',
        'label1' => 'Opt-out',
        'label2' => 'Opt-in'
])
<div class="text-right">
    <button type="submit" class="btn btn-primary">Change settings</button>
</div>
{!! Form::close() !!}