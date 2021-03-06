<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Styles -->
    <link href="{{elixir('css/backend.css')}}" rel="stylesheet">
</head>



<body>

<div id="wrapper">
    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
        @include('backend.includes._nav_menu')

        @if (!Auth::guest())
            <script>
                var Laravel = {
                    csrfToken: "{{csrf_token()}}",
                    stripeKey: "{{config('services.stripe.key')}}",
                    email: "{{Auth::user()->email}}",
                    ticketPrice: {{$open_raffle->ticket_cost}}
                };
            </script>
            @include('backend.includes._side_nav')
        @endif
    </nav>
    @if (Auth::guest())
        <div class="top_50">
            @yield('content')
        </div>
    @else
        @yield('content')
    @endif
</div>

<!-- Scripts -->
<script src="https://checkout.stripe.com/checkout.js"></script>
<script src="/js/app.js"></script>
<script src="/js/backend-version.js"></script>
</body>
</html>
