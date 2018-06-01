@component('mail::message')
# We're so glad to have you {{ $mailingUser->name }}!

Welcome to Foodify, {{ $mailingUser->name }}! We're very happy to have you. We'll work hard to make your future mail planning a breeze. Upon registering an account at Foodify we'll immediately begin to gather your food tastes and particulars from the way that you use and browse our platform. The more you use Foodify, the better we can make sure that the food that we suggest is something you'll enjoy.

@component('mail::button', ['url' => config('app.url')])
Visit Foodify!
@endcomponent

Thanks,<br>
The {{ config('app.name') }} team
@endcomponent
