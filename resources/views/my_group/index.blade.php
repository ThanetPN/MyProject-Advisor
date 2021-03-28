@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-6" align='left'>
                            {{ __('Feture') }}
                        </div>

                        <div class="col-md-6" align='right'>
                            <a class='btn btn-primary' href="{{url("/my_group/$id/create")}}">Create feture</a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <table class="table table-bordered">
                        <tr align='center'>
                            <th>Title</th>
                            <th>Date create</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>

                        @foreach ($fetures as $item)
                            <tr align='center'>
                                <td>{{$item->title}}</td>
                                <td>{{$item->date_create}}</td>
                                <td>{{$item->status}}</td>
                                <td>
                                    <form action="{{url("/my_group/$item->id")}}" method="post">
                                        {{ csrf_field() }}
                                        @method('DELETE')
                                        <a class="btn btn-info" href="{{url("/my_group/$item->id/edit")}}">Edit</a>
                                        <button class="btn btn-danger" type="submit">Delete</button>
                                    </form>
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
