{{-- @extends('layouts.app')

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
@endsection --}}

@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="mb-2" align='right'>
            @if (Auth::user()->user_role === 'Teacher')
                <a class='btn btn-primary' href="{{ url('/group/create') }}">Create group</a>
            @endif
        </div>

        @foreach ($groups as $item)
            <div class="row justify-content-center mb-2">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-md-6" align='left'>
                                    {{ $item->title }}
                                </div>

                                <div class="col-md-6" align='right'>
                                    <form action="{{url("/group/$item->id")}}" method="post">
                                        {{ csrf_field() }}
                                        @method('DELETE')
                                        <a class='btn btn-warning' href="{{ url("/my_group" . '/' . $item->id . "/create") }}">Topic</a>
                                        <a class="btn btn-success" href="{{ url("/group/$item->id") }}">Add member in group</a>
                                        <button class="btn btn-danger" type="submit">Delete group</button>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="card-body">

                            <!-- Button trigger modal -->
                            <div class="dropdown mb-2">
                                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Member in group
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    @foreach ($item->relation_member as $item1)
                                        <a class="dropdown-item" href="#">{{ $item1->relation_users->firstname }}
                                            {{ $item1->relation_users->lastname }}</a>
                                    @endforeach
                                </div>
                            </div>

                            <table class='table table-bordered'>
                                <tr align='center'>
                                    <th>Topic</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                
                                @foreach ($item->relation_topic as $item1)
                                    <tr align='center'>
                                        <td>{{$item1->title}}</td>
                                        <td>{{$item1->status}}</td>
                                        <td>
                                            <form action="{{ url("/my_group/$item1->id") }}" method="post">
                                                {{ csrf_field() }}
                                                @method('DELETE')
                                                <a class="btn btn-warning" href="{{url("/my_group/$item1->id/edit")}}">Edit</a>
                                                <button class='btn btn-danger' type="submit">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach


    </div>

@endsection
