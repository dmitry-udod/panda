@extends('layouts.app')

@section('title', trans('main.shops'))

@section('content')
    <div>
        <div class="mdl-typography--text-center">
            {{ $shops->links() }}
        </div>
        <table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp " width="100%">
            <thead>
            <tr>
                <th class="mdl-data-table__cell--non-numeric">{{ trans('shop.table.name') }}</th>
                <th class="mdl-data-table__cell--non-numeric">{{ trans('shop.table.what_do') }}</th>
                <th class="mdl-data-table__cell--non-numeric">{{ trans('shop.table.owner') }}</th>
                <th class="mdl-data-table__cell--non-numeric">{{ trans('shop.table.address') }}</th>
                <th class="mdl-data-table__cell--non-numeric">{{ trans('shop.table.open') }}</th>
                <th class="mdl-data-table__cell--non-numeric">{{ trans('shop.table.close') }}</th>
            </tr>
            </thead>
            <tbody>
            @foreach($shops as $shop)
            <tr>
                <?php $data = explode(',', $shop->shop_name_full) ?>
                <td class="mdl-data-table__cell--non-numeric">{{ $data[0] }}</td>
                <td class="mdl-data-table__cell--non-numeric">{{ empty($data[1]) ? '' : $data[1] }}</td>
                <td class="mdl-data-table__cell--non-numeric">{{ empty($data[2]) ? '' : $data[2] }}</td>
                <td class="mdl-data-table__cell--non-numeric">{{ $shop->address }}</td>
                <td class="mdl-data-table__cell">{{ $shop->open_at }}</td>
                <td>{{ $shop->close_at }}</td>
            </tr>
            @endforeach
            </tbody>
        </table>
        <div class="mdl-typography--text-center">
            {{ $shops->links() }}
        </div>
    </div>
@endsection
