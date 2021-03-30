@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Add users') }}</div>

                <form action="{{url("/group/add_users/$groups->id")}}" method="post">
                    {{ csrf_field() }}
                    <div class="card-body">
                        <search-group-component></search-group-component>
                        <button class='btn btn-primary mt-2' name='add_method'>Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <br>

    {{-- <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Member in group') }}</div>
                <table class="table table-bordered">
                    <tr align='center'>
                        <th>Name</th>
                        <th>Action</th>
                    </tr>

                    @foreach ($members as $item)
                        <tr align='center'>
                            <td>{{$item->relation_users->firstname}} {{$item->relation_users->lastname}}</td>
                            <td>
                                <form action="{{url("/delete_users/$item->id")}}" method="post">
                                    {{ csrf_field() }}
                                    @method('DELETE')
                                    <input type='hidden' name='get_id' value="{{$item->id}}" />
                                    <button class='btn btn-danger' name='delete_method' type='submit'>Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div> --}}
</div>

@endsection
