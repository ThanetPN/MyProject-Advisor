@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">{{ __('Add users') }}</div>

                <form action="{{url("/group/add_users/$groups->id")}}" method="post">
                    {{ csrf_field() }}
                    <div class="card-body">
                        <search-group-component></search-group-component>
                        <button class='btn btn-primary mt-2'>Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
