<x-mail::message>
# Password Reset Requested

You have requested to reset your password.  
Please click the button below to reset your password.

<x-mail::button :url="$token">
Reset Password
</x-mail::button>

Thanks,  
{{ config('app.name') }}
</x-mail::message>
