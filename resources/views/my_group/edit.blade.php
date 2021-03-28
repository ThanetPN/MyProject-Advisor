@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Create feture') }}</div>

                    <form action="{{url("/my_group/$fetures->id/edit")}}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        @method('PUT')
                        <div class="form-group row mt-4">
                            <label class="col-md-4 col-form-label text-md-right">{{ __('Title') }}</label>
    
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="title" value="{{$fetures->title}}" required>
                            </div>
                        </div>
    
                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">{{ __('Content') }}</label>
    
                            <div class="col-md-6">
                                <textarea class='form-control' name="content" cols="30" rows="10" required>
                                    {{$fetures->content}}
                                </textarea>
                            </div>
                        </div>
    
                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">{{ __('Status') }}</label>
    
                            <div class="col-md-6">
                                <select class="form-control" name="status" required>
                                    @if ($fetures->status === 'Success')
                                        <option value="Success">Success</option>
                                        <option value="Coming soon">Coming soon</option>
                                        <option value="Failed">Failed</option>
                                    @elseif ($fetures->status === 'Coming soon')
                                        <option value="Coming soon">Coming soon</option>
                                        <option value="Failed">Failed</option>
                                        <option value="Success">Success</option>
                                    @else
                                        <option value="Failed">Failed</option>
                                        <option value="Success">Success</option>
                                        <option value="Coming soon">Coming soon</option>
                                    @endif
                                </select>
                            </div>
                        </div>
    
                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">{{ __('Date create') }}</label>
    
                            <div class="col-md-6">
                                <input class="form-control" type="date" name="date_create" value="{{$fetures->date_create}}" required />
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">{{ __('Link file project') }}</label>
    
                            <div class="col-md-6">
                                <a class="form-control" href="{{url("/storage/$fetures->image")}}">Link file project</a>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">{{ __('File project') }}</label>
    
                            <div class="col-md-6">
                                <input class="form-control" type="file" name="file_project" />
                            </div>
                        </div>
    
                        <div class="form-group row mb-4">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Save') }}
                                </button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
