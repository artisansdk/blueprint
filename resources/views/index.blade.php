<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $blueprint->name }} - {{ config('app.name', 'Laravel') }}</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/blueprint.css') }}" rel="stylesheet">
</head>
<body>
<div id="app">
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">
                <a class="navbar-brand" href="{{ url(config('artisansdk/blueprint::blueprint.path')) }}">
                    {{ $blueprint->name }}
                </a>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="row content-wrapper">

            <div class="sidebar">
                <div class="sidebar__inner">

                    @include ('blueprint::navigation')

                    <p class="host">
                        <a href="{{ $blueprint->host }}">{{ $blueprint->host }}</a>
                    </p>
                </div>
            </div>

            <div class="main">

                <div class="panel panel-default panel-description">
                    <div class="panel-heading">
                        <h1 class="panel-title" id="description">{{ $blueprint->name }}</h1>
                    </div>
                    <div class="panel-body">
                        {!! $blueprint->descriptionHtml !!}
                    </div>
                </div>

                @foreach($blueprint->groups as $group)
                    @include('blueprint::group')
                @endforeach
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/blueprint.js') }}"></script>

</body>
</html>
