@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Create topic') }}</div>

                <form action="{{url("/topic/$id/create")}}" method="post">
                    {{ csrf_field() }}
                    <div class="card-body">
                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">{{ __('Project name') }}</label>
    
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="project_name" required autofocus>
                            </div>
                        </div>

                        <select-topic-advisor-component></select-topic-advisor-component>

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">{{ __('Date create') }}</label>
                            
                            <div class="col-md-6">
                                <input type="date" class="form-control" name="date_create" required>
                            </div>
                        </div>

                        <hr>

                        <add-topic-git-component></add-topic-git-component>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Save') }}
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
