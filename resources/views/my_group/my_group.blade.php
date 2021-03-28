@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    <table class='table table-bordered'>
                        <tr align='center'>
                            <th>Name</th>
                            <th>Link git</th>
                        </tr>

                        @foreach ($members as $item)
                            @foreach ($item->relation_group as $item1)
                                <tr align='center'>
                                    <td>
                                        <a href="{{url("/my_group/$item1->id")}}">{{$item1->project_name}}</a>
                                    </td>
                                    <td>
                                        <a class="btn btn-primary" href="{{url("/my_group/link_git/$item1->id")}}">View</a>
                                    </td>
                                </tr>
                            @endforeach
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
