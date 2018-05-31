@component('mail::message')
# Your new Foodify plan is waiting!

Dear {{ $user->name }},

We've composed a new Foodify plan for you!

This week we've got the following in store for you:
@component('mail::panel')
**Your Foodify plan for week @php $now = \Carbon\Carbon::now(); echo($now->weekOfYear); @endphp** <br/>
    @foreach (App\FoodPlan::days() as $day)
        @php $foodplan = $user->food_plan(); $foodplan_day = $foodplan->$day() @endphp
        @if( $foodplan_day != null)
            *{{ ucfirst($day) }}*: [{{ $foodplan_day->name }}]({{$foodplan_day->path()}})<br/>
        @endif
    @endforeach
@endcomponent

You can always manually change your plan, but we encourage you to try your current plan to enjoy a healthy and versatile diet! We hope you enjoy!

Thanks,

The {{ config('app.name') }} team
@endcomponent
