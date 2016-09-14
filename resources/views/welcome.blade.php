@extends('layouts.app')

@section('title', trans('main.shops'))
@section('meta_description', trans('main.seo_desc'))
@section('meta_keywords', trans('main.points'))

@section('content')
    <div>
        <div class="mdl-typography--text-center">
            {{ $shops->links() }}
        </div>
        <table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp" width="100%">
            <thead>
            <tr>
                <th>#</th>
                <th class="mdl-data-table__cell--non-numeric">{{ trans('shop.table.name') }}</th>
                <th class="mdl-data-table__cell--non-numeric">{{ trans('shop.table.owner') }}</th>
                <th class="mdl-data-table__cell--non-numeric">{{ trans('shop.table.address') }}</th>
                <th class="">{{ trans('shop.table.open') }}</th>
                <th class="">{{ trans('shop.table.close') }}</th>
                <th class=""></th>
            </tr>
            </thead>
            <tbody>
            @foreach($shops as $shop)
            <tr>
                <td>{{ $shop->id }}</td>
                <td class="mdl-data-table__cell--non-numeric">{{ str_limit($shop->name(), 30) }}</td>
                <td class="mdl-data-table__cell--non-numeric">{{ $shop->owner() }}</td>
                <td class="mdl-data-table__cell--non-numeric">{{ $shop->shortAddress() }}</td>
                <td class="mdl-data-table__cell">{{ $shop->openAt() }}</td>
                <td>{{ $shop->closeAt() }}</td>
                <td>
                    <a href="{{ route('shop_details', $shop->id) }}" class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored mdl-color--light-green-500" href="">{{ trans('main.details') }}</a>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
        <div class="mdl-typography--text-center">
            {{ $shops->links() }}
        </div>
    </div>
@endsection
