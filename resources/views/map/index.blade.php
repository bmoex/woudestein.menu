@extends('layouts.default')

@section('page-title')
    Woudestein Menu: Overview
@stop

@section('menu-items')
    <li class="menu-item javascript-template">
        <a href="#" class="page-link">
            <div class="navigation-content page-icon">
                @{{$icon}}
            </div>
            <div class="navigation-content page-label">
                @{{$title}}
            </div>
        </a>
    </li>
@stop

@section('content')
    <div id="map-woudestein"></div>
    <div id="content-container">
        <div class="content-item javascript-template">
            <h1 class="content-title">@{{$title}}</h1>

            <div class="content-description">@{{$description}}</div>
            <div class="address"></div>
        </div>
    </div>
@stop

@section('javascript')
    <script>
        Serfhos.Map.addMarkers({!! $locations !!});
    </script>
    <script src="//maps.googleapis.com/maps/api/js?signed_in=true&callback=Serfhos.Map.createMap" async
            defer></script>
@stop