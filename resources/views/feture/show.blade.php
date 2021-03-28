@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Create feture') }}</div>

                    <form method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group row mt-4">
                            <label class="col-md-4 col-form-label text-md-right">{{ __('Title') }}</label>
    
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="title" value="{{$fetures->title}}" required readonly>
                            </div>
                        </div>
    
                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">{{ __('Content') }}</label>
    
                            <div class="col-md-6">
                                <textarea class='form-control' name="content" cols="30" rows="10" required readonly>
                                    {{$fetures->title}}
                                </textarea>
                            </div>
                        </div>
    
                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">{{ __('Status') }}</label>
    
                            <div class="col-md-6">
                                <input class="form-control" type='text' value="{{$fetures->status}}" readonly />
                            </div>
                        </div>
    
                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">{{ __('Date create') }}</label>
    
                            <div class="col-md-6">
                                <input class="form-control" type="date" name="date_create" value="{{$fetures->date_create}}" required readonly />
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">{{ __('Link file project') }}</label>
    
                            <div class="col-md-6">
                                <a class="form-control" href="{{url("/storage/$fetures->image")}}">Link file project</a>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
