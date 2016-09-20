@extends('layouts.app')

@section('title', trans('main.shops') . ' ' . trans('main.city') . ' ' . $shop->name())
@section('meta_description', '' . trans('main.shops') . ' ' . $shop->seoName())
@section('meta_keywords', $shop->seo())

@section('content')
    <div class="android-card-container mdl-grid details">
        <div class="mdl-cell mdl-cell--12-col mdl-card mdl-shadow--3dp mdl-grid">
            <div class="mdl-cell mdl-cell--6-col">
                <div class="mdl-card__title">
                    <h1 class="mdl-card__title-text">{{ trans('main.city') }} {{ $shop->name() }}</h1>
                </div>
                <ul class="">
                    <li>
                        <b>{{ trans('shop.table.address') }}</b>: {{ $shop->address }}
                    </li>
                    <li>
                        <b>{{ trans('shop.table.what_do') }}</b>: {{ $shop->whatTodo() }}
                    </li>
                    <li>
                        <b>{{ trans('shop.table.owner') }}</b>: {{ $shop->owner() }}
                    </li>
                    <li>
                        <b>{{ trans('shop.table.open') }}</b>: {{ $shop->openAt() }}
                    </li>
                    <li>
                        <b>{{ trans('shop.table.close') }}</b>: {{ $shop->closeAt() }}
                    </li>
                    <li>
                        <b>{{ trans('main.contacts') }}</b>: {{ $shop->contacts() }}
                    </li>
                </ul>
            </div>
            <div class="mdl-cell mdl-cell--6-col">
                <div id="map"></div>
            </div>
            {{--<div class="mdl-card__actions">--}}
                {{--<a class="android-link mdl-button mdl-js-button mdl-typography--text-uppercase" href="" data-upgraded=",MaterialButton">--}}
                    {{--Make the switch--}}
                    {{--<i class="material-icons">chevron_right</i>--}}
                {{--</a>--}}
            {{--</div>--}}
        </div>
    </div>
@endsection

@section('js')
    <script>
        function initMap() {
            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 18,
                center: {lat: -34.397, lng: 150.644}
            });
            var geocoder = new google.maps.Geocoder();
            geocodeAddress(geocoder, map);
        }

        function geocodeAddress(geocoder, resultsMap) {
            var address = '{{ $shop->address }}';
            geocoder.geocode({'address': address}, function(results, status) {
                if (status === google.maps.GeocoderStatus.OK) {
                    resultsMap.setCenter(results[0].geometry.location);
                    var marker = new google.maps.Marker({
                        map: resultsMap,
                        position: results[0].geometry.location
                    });
                } else {
                    console.log('Geocode was not successful for the following reason: ' + status);
                }
            });
        }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key={{env('GOOGLE_MAPS_API_KEY')}}&signed_in=true&callback=initMap" async defer></script>
@endsection