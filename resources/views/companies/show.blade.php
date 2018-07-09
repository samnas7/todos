@extends('layouts.app')

@section('content')
    <div class="row" style="margin: 10px;">
        <div class="col-md-9 col-lg-9 col-xs-pull-9">
            <div class="jumbotron">
                <h1>{{ $company->name }}</h1>
                <p class="lead">{{ $company->description }}</p>
            </div>

            <div class="row col-md-12 col-lg-12 col-sm-12" style="background: #fff; margin: 10px;">
                <!-- <a href="/projects/create/{{$company->id}}" class="pull-right btn btn-primary btn-sm" >Add Project</a> -->
                @foreach($company->projects as $project)
                <div class="col-lg-4 col-md-4 col-sm-4">
                    <h2>{{ $project->name }}</h2>
                    <p class="text-danger">{{ $project->description }}</p>
                    
                    <p><a href="/projects/{{ $project->id }}" class="btn btn-primary" role="button">View project <b>></b><!-- <i class="fa fa-plus-square"></i>  --></a></p>
                </div>
                @endforeach
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-xs-3 push-3">
            <div class="sidebar-module">
                <h4>Actions</h4>
                <ol class="list-unstyled">
                    <li>
                        
                        <a href="/companies/{{$company->id}}/edit"><i class="fa fa-pencil-square-o"></i> Edit</a></li>
                    <li>
                        
                        <a href="/projects/create/{{$company->id}}"><i class="fa fa-plus-circle"></i> Add Project</a>
                    </li>
                    <li>
                        
                        <a href="/companies/create"><i class="fa fa-plus-square"></i> Add New Company</a></li>
                    <li>
                        
                        <a href="/companies"><i class="fa fa-building"></i> My Companies</a></li>
                        <br>
                    <li>
                        <a style="color: red;" onclick="
                            var result=confirm('Are you sure you want to delete this record');
                            if (result) {
                                event.preventDefault();
                                document.getElementById('delete-form').submit();
                            }"><i class="fa fa-trash"></i>
                            Delete
                        </a>

                        <form id="delete-form" action="{{ route('companies.destroy',[$company->id]) }}" method="post" style="display: none;">
                            <input type="hidden" name="_method" value="delete">
                            {{ csrf_field() }}
                        </form>


                    </li>

                </ol>
            </div>
            <!-- <div class="sidebar-module">
                <h4>Members</h4>
                <ol class="list-unstyled">
                    <li><a href="#">Edit</a></li>
                    <li><a href="">Delete</a></li>
                    <li><a href="">Add new user</a></li>
                </ol>
            </div> -->
        </div>
        
    </div>
@endsection