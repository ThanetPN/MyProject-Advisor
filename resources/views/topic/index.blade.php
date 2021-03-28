@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-6" align='left'>
                            {{ __('Topic') }}
                        </div>

                        <div class="col-md-6" align='right'>
                            <a class='btn btn-primary' href="{{url("/topic/$id/create")}}">Create topic</a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <table class='table table-bordered'>
                        <tr align='center'>
                            <th>Project name</th>
                            <th>Action</th>
                        </tr>

                        @foreach ($topics as $item)
                            <tr align='center'>
                                <td>{{$item->project_name}}</td>
                                <td>
                                    <form action="{{url("/topic/$item->id")}}" method="post">
                                        {{ csrf_field() }}
                                        @method('DELETE')
                                        <input type='hidden' name='get_id' value="{{$id}}" readonly />
                                        <a class="btn btn-info" href="{{url("/feture/$item->id")}}">Feture</a>
                                        <a class="btn btn-warning" href="{{url("/my_group/link_git/$id")}}">Link git</a>
                                        <button class="btn btn-danger" type='submit'>Delete</button>
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
