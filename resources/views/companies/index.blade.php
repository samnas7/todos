@extends('layouts.app')

@section('content')
    <div class="row" style="margin: 0">
        <div class="col-md-2 col-lg-2 col-sm-2 "></div>
        <div class="col-md-8 col-lg-8 col-sm-8 ">
           <div class="panel panel-info">
                <div class="panel-heading">
                    <h4><i>Companies</i> <a href="/companies/create" class="btn btn-primary btn-sm" style="float: right;">Add Company</a></h4>
                    
                </div>
                <div class="panel-body">
                    <ul class="list-group">
                        @foreach($companies as $company)
                        <li class="list-group-item"><a href="/companies/{{ $company->id }}">{{$company->name}}</a></li>
                        @endforeach
                    </ul>
                </div>

            </div> 
        </div>
    </div>
    
@endsection