@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Job</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{secure_url('jobs.index')}}" title="Go back"> <em
                        class="fas fa-backward "></em> </a>
            </div>
        </div>
    </div>
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Error!</strong>
            <ul>
                @foreach ($errors->all() as $error)
                    <li></li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{secure_url('jobs.update', $job->id)}}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <label for="title"><strong>Title:</strong></label>
                    <input type="text" id="title" value="{{$job->title}}" name="title" class="form-control"
                           placeholder="Title">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <label for="description"><strong>Description:</strong></label>
                    <textarea id="description" class="form-control" style="height:50px" name="description"
                              placeholder="description">{{$job->description}}</textarea>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <label for="type"><strong>Type:</strong></label>
                    <select class="form-control" id="type" name="type">
                        <option value="clerk">Clerk</option>
                        <option value="laborer">Laborer</option>
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <label for="company"><strong>Company:</strong></label>
                    <select class="form-control" value="{{$job->company->id}}" id="company" name="company_id">
                        @foreach($companies as $company)
                            <option value="{{$company->id}}">{{$company->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>

    </form>
@endsection
