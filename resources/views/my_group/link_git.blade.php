@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    <table class="table table-bordered">
                        <tr align='center'>
                            <th>Name</th>
                            <th>Link</th>
                        </tr>

                        @foreach ($links as $item)
                            <tr align='center'>
                                <td>{{$item->name}}</td>
                                <td>
                                    <a href="{{url("$item->link")}}">{{$item->link}}</a>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
