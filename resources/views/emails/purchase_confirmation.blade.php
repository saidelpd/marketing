@extends('emails.template')
@section('content')



    <tr>
        <td style="{{ $style['email-body'] }}" width="100%">
            <table style="{{ $style['email-body_inner'] }}" align="center" width="570" cellpadding="0" cellspacing="0">
                <tr>
                    <td style="{{ $fontFamily }} {{ $style['email-body_cell'] }}">
                        <!-- Greeting -->
                        <h1 style="{{ $style['header-1'] }}">
                            Ticket Purchase Confirmation
                        </h1>

                        <p style="{{ $style['paragraph'] }}">
                                Purchase ID : {{$confirmation_id}}
                        </p>

                         <p style="{{ $style['paragraph'] }}">
                            @include('emails._purchase')
                        </p>

                        @if($user_password)
                            <table style="{{ $style['body_action'] }}" align="center" width="100%" cellpadding="0" cellspacing="0">
                                <tr>
                                    <td align="center">User Name: </td>
                                    <td align="center">{{ $user->email }}</td>
                                </tr>
                                <tr>
                                    <td align="center">Password: </td>
                                    <td align="center">{{ $user_password }}</td>
                                </tr>
                            </table>
                            <table style="{{ $style['body_action'] }}" align="center" width="100%" cellpadding="0" cellspacing="0">
                                <tr>
                                    <td align="center">
                                        <a href="{{URL::route('login')}}"
                                           style="{{ $fontFamily }} {{ $style['button'] }} {{ $style['button--blue'] }}"
                                           class="button"
                                           target="_blank">
                                           Login in our app for more details.
                                        </a>
                                    </td>
                                </tr>
                            </table>
                        @else
                            <table style="{{ $style['body_action'] }}" align="center" width="100%" cellpadding="0" cellspacing="0">
                                <tr>
                                    <td align="center">
                                        <a href="{{URL::route('fantasy.dashboard')}}"
                                           style="{{ $fontFamily }} {{ $style['button'] }} {{ $style['button--blue'] }}"
                                           class="button"
                                           target="_blank">
                                           Login For More Details
                                        </a>
                                    </td>
                                </tr>
                            </table>
                        @endif
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

