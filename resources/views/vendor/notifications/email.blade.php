@component('mail::message')
{{-- Greeting --}}
@if (! empty($greeting))
# {{ $greeting }}
@else
@if ($level == 'error')
# Whoops!
@else
<p style="text-align: right !important">
مرحباً


نتمنى لك اوقات سعيدة
</p>
@endif
@endif

{{-- Intro Lines --}}

<p dir='rtl' style="text-align: right !important">
لقد طلبت اعادة تعيين الرقم السري الخاص بحسابك لدى زاول
اضغط على الزر ادناه لاعادة تعيين كلمة المرور
</p>


{{-- Action Button --}}
@if (isset($actionText))
<?php
    switch ($level) {
        case 'success':
            $color = 'green';
            break;
        case 'error':
            $color = 'red';
            break;
        default:
            $color = 'blue';
    }
?>
@component('mail::button', ['url' => $actionUrl, 'color' => $color])
اعادة تعين كلمة المرور
@endcomponent
@endif



<!-- Subcopy -->
@if (isset($actionText))

@endif
@endcomponent
