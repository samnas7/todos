@extends('layouts.app')

@section('content')
    <div class="row" style="margin: 10px;">
        <div class="col-md-9 col-lg-9 col-xs-pull-9">
            <div class="jumbotron">
                <h1>{{ $project->name }}</h1>
                <p class="lead">{{ $project->description }}</p>
            </div>

            
            @include('partials.comments')
            <div class="row">
                <div class="col-md-col-md-12 col-lg-12 col-sm-12" style="background: #fff; margin: 10px;">
                    <form action="{{ route('comments.store') }}" method="post">
                        {{ csrf_field() }}
                        
                        <input type="hidden" name="commentable" value="App/Project">
                        <input type="hidden" name="commentable_id" value="{{$project->id}}">

                        <div class="form-group">
                            <label for="comment-content">Comment<span class="required">*</span></label>
                           <textarea name="body" style="resize: vertical;" rows="5" spellcheck="false"  class="form-control autosize-target text-left"  placeholder="Enter Comment" id="comment-content"></textarea>
                       </div>
                       <div class="form-group">
                            <label for="comment-content">Proof of work done(Url/Photo)<span class="required">*</span></label>
                           <textarea type="text" name="url" spellcheck="false" rows="3" style="resize: vertical;" class="form-control"  placeholder="Enter url or screenshots" id="comment-content"></textarea>
                       </div>
                       
                       <div class="form-group">
                           <input type="submit" name="submit" class="btn btn-primary">
                       </div>
                    </form>
                </div>
            </div>
              
        </div>
        <div class="col-lg-3 col-md-3 col-xs-3 push-3">
            <div class="sidebar-module">
                <h4>Actions</h4>
                <ol class="list-unstyled">
                    <li><a href="/projects/{{$project->id}}/edit"><i class="fa fa-pencil-square-o"></i> Edit</a></li>
                    <li><a href="/projects/create"><i class="fa fa-plus-square"></i> Create New Project</a></li>
                    <li><a href="/projects"><i class="fa fa-briefcase"></i> My Projects</a></li>
                    <br>

                    @if($project->user_id == Auth::user()->id)
                    <li>
                        <a onclick="
                            var result=confirm('Are you sure you want to delete this record');
                            if (result) {
                                event.preventDefault();
                                document.getElementById('delete-form').submit();
                            }" class="text-danger">
                            <i class="fa fa-trash"></i> 
                            Delete
                        </a>

                        <form id="delete-form" action="{{ route('projects.destroy',[$project->id]) }}" method="post" style="display: none;">
                            <input type="hidden" name="_method" value="delete">
                            {{ csrf_field() }}
                        </form>

                    </li>
                    @endif
                </ol>

                <hr>
                <h4>Add Members</h4>
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <form action="{{ route('projects.adduser') }}" id="add-user" method="POST">
                            {{ csrf_field() }}
                            <div class="input-group">
                                <input type="hidden" class="form-control" name="project_id" value="{{$project->id}}" >
                                <input type="text" name="email" class="form-control" placeholder="Email">
                                <span class="input-group-btn">
                                    <button class="btn btn-primary" type="submit">Add!</button>
                                </span>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <br>
            
            <h4>Team Members</h4>
            <ol class="list-unstyled">
                @foreach($project->users as $user)
                    <li><a href="#"> {{$user->email}} </a></li>
                @endforeach
            </ol>
        </div>
        
    </div>
@endsection