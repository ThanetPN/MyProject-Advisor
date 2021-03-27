@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-6" align='left'>
                            {{ __('Group') }}
                        </div>

                        <div class="col-md-6" align='right'>
                            <a class='btn btn-primary' href="{{url("/group/create")}}">Create</a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <table class='table table-bordered'>
                        <tr align='center'>
                            <th>Title</th>
                            <th>Action</th>
                        </tr>

                        <tr align='center'>
                            @foreach ($groups as $item)
                                <td>
                                    <a href="{{url("/group/$item->id")}}">
                                        {{$item->title}}
                                    </a>
                                </td>
                                <td>
                                    <form action="{{url("/group/$item->id")}}" method="post">
                                        {{ csrf_field() }}
                                        @method('DELETE')
                                        <a class='btn btn-info' href="{{url("/group/$item->id/edit")}}">Edit</a>
                                        <button class='btn btn-danger' type="submit">Delete</button>
                                    </form>
                                </td>
                            @endforeach
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
