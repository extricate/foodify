@component('mail::message')
    # Confirmation of account deletion

Dear {{ $user->name }},

This'll likely be the last message you will receive from Foodify. We have completely removed your account and all associated data.

We're sad to see you go, but we respect your decision. Should you ever wish to come back to Foodify, know that we'll always keep the door open for you. Thank you so much for being a part of Foodify for {{ $user->created_at->diff(\Carbon\Carbon::now())->format('%d days, %h hours and %i minutes') }}.

Thanks,

The {{ config('app.name') }} team
@endcomponent
