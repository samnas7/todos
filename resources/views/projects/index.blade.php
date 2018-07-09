@extends('layouts.app')

@section('content')
    <div class="row" style="margin: 0">
        <div class="col-md-2 col-lg-2 col-sm-2 "></div>
        <div class="col-md-8 col-lg-8 col-sm-8 ">
           <div class="panel panel-info">
                <div class="panel-heading">
                    <h4><i>Projects</i> <a href="/projects/create" class="btn btn-primary btn-sm" style="float: right;">Add Project</a></h4>
                    
                </div>
                <div class="panel-body">
                    <ul class="list-group">
                        @foreach($projects as $project)
                        <li class="list-group-item"><a href="/projects/{{ $project->id }}">{{$project->name}}</a></li>
                        @endforeach
                    </ul>
                </div>

            </div> 
        </div>
    </div>
    
@endsection