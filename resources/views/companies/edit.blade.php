@extends('layouts.app')

@section('content')
    <div class="row" style="margin: 10px;">
        <div class="col-md-9 col-lg-9 col-xs-pull-9">
           <form action="{{ route('companies.update',[$company->id]) }}" method="post">
                {{ csrf_field() }}
                <input type="hidden" name="_method" value="put">
                
               <div class="form-group">
                    <label for="company-name">Name<span class="required">*</span></label>
                   <input type="text" name="name" spellcheck="false" class="form-control" value="{{ $company->name }}" placeholder="Enter company name" id="company-name">
               </div>
               <div class="form-group">
                    <label for="company-description">Description<span class="required">*</span></label>
                   <textarea name="description" rows="5" spellcheck="false"  class="form-control"  placeholder="Enter company description" id="company-description">{{ $company->description }}</textarea>
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
                    <li><a href="/companies/{{ $company->id }}/show">View companies</a></li>
                    <li><a href="/companies/">All companies</a></li>
                    <li><a href="/companies/create">Add New Company</a></li>
                </ol>
            </div>
            
        </div>
        
    </div>
@endsection