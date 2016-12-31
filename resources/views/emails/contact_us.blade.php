@extends('emails.template')
@section('content')
<tr>
    <td style="{{ $style['email-body'] }}" width="100%">
            <table style="{{ $style['email-body_inner'] }}" align="center" width="570" cellpadding="0" cellspacing="0">
                <tr>
                    <td style="{{ $fontFamily }} {{ $style['email-body_cell'] }}">
                        <!-- Greeting -->
                        <h1 style="{{ $style['header-1'] }}">
                            Hello!
                        </h1>

                        <p style="{{ $style['paragraph'] }}">
                            We got a message from {{$name}}
                        </p>

                        <p style="{{ $style['paragraph'] }}">
                            {{$contact_message}}
                        </p>
                        <!-- Salutation -->
                        <p style="{{ $style['paragraph'] }}">
                            Regards,<br>{{ config('app.name') }}
                        </p>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
@endsection

