{{-- @component('mail::message')
<p>Hi, This is {{ $data['name'] }}</p>
<p>I have some query like {{ $data['message'] }}.</p>
<p>It would be appriciative, if you gone through this feedback.</p>

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent --}}

<h4>Όνομα: {{ $name }} </h4>
<h4>Email: {{ $email }} </h4>
<h4>Μήνυμα: </h4>
<p>
    {{ $body }}
</p>
