@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Feture') }}</div>

                <div class="card-body">
                    <table class='table table-bordered'>
                        <tr align='center'>
                            <th>Name</th>
                            <th>Date create</th>
                        </tr>

                        @foreach ($fetures as $item)
                            <tr align='center'>
                                <td>
                                    <a href="{{url("/feture/show/$item->id")}}">{{$item->title}}</a>
                                </td>
                                <td>{{$item->date_create}}</td>
                            </tr>
                        @endforeach

                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
