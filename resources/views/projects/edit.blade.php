@extends('layouts.app')

@section('content')
    <div class="row" style="margin: 10px;">
        <div class="col-md-9 col-lg-9 col-xs-pull-9">
           <form action="{{ route('projects.update',[$project->id]) }}" method="post">
                {{ csrf_field() }}
                <input type="hidden" name="_method" value="put">
                
               <div class="form-group">
                    <label for="project-name">Name<span class="required">*</span></label>
                   <input type="text" name="name" spellcheck="false" class="form-control" value="{{ $project->name }}" placeholder="Enter project name" id="project-name">
               </div>
               <div class="form-group">
                    <label for="project-description">Description<span class="required">*</span></label>
                   <textarea name="description" rows="5" spellcheck="false"  class="form-control"  placeholder="Enter project description" id="project-description">{{ $project->description }}</textarea>
               </div>
               <div class="form-group">
                   <input type="submit" name="submit" class="btn btn-primary">
               </div>
           </form>
        </div>
        <div class="col-lg-3 col-md-3 col-xs-3 push-3">
            <div class="sidebar-module">
                <h4>Actions</h4>
                <ol class="list-unstyled">
                   
                    <li><a href="/projects/"><i class="fa fa-briefcase"></i> All projects</a></li>
                    <li><a href="/projects/create"><i class="fa fa-briefcase"></i> Add New Project</a></li>
                </ol>
            </div>
            
        </div>
        
    </div>
@endsection