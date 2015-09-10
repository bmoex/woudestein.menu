@extends('layouts.default')

@section('page-title')
    Woudestein Menu: Overview
@stop

@section('menu-items')
    <li class="menu-item javascript-template">
        <a href="#" class="page-link">
            <div class="navigation-content page-icon">
                <i class="icon default fa fa-cutlery"></i>
            </div>
            <div class="navigation-content page-label">
                Page Label
            </div>
        </a>
    </li>
@stop

@section('content')
    <div id="map-woudestein"></div>
    <div id="content-container">
        <div class="content-item javascript-template">
            <h1 class="content-title">Content Title</h1>

            <div class="content-description">Content Description</div>
            <div class="address"></div>
        </div>
    </div>
@stop

@section('javascript')
    <script>
        Serfhos.Map.addMarkers({!! $locations !!});
    </script>
    <script src="//maps.googleapis.com/maps/api/js?signed_in=true&callback=Serfhos.Map.initialize" async
            defer></script>
@stop