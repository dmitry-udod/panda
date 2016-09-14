@extends('layouts.app')

@section('title', trans('main.shops'))
@section('meta_description', '' . trans('main.shops') . $shop->seoName())
@section('meta_keywords', $shop->seo())

@section('content')
    <div class="android-card-container mdl-grid details">
        <div class="mdl-cell mdl-cell--12-col mdl-card mdl-shadow--3dp">
            <div class="mdl-card__title">
                <h4 class="mdl-card__title-text">{{ trans('main.city') }} {{ $shop->name() }}</h4>
            </div>
            <div class="mdl-card__supporting-text">
                <span class="mdl-typography--font-light mdl-typography--subhead">Four tips to make your switch to Android quick and easy</span>
            </div>
            <div class="mdl-card__actions">
                <a class="android-link mdl-button mdl-js-button mdl-typography--text-uppercase" href="" data-upgraded=",MaterialButton">
                    Make the switch
                    <i class="material-icons">chevron_right</i>
                </a>
            </div>
        </div>
        MAP
    </div>
@endsection
