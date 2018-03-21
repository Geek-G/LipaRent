@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
        <a class="btn btn-primary" href="{{route('new_apartment')}}"> New </a>
            <div class="panel panel-default">
                <div class="panel-heading">All Apartments</div>
                <div class="panel-body">
			        <table class="table table-hover table-striped">
			          <thead>
			            <tr>
			              <td>Name</td>
			              <td>Location</td>
			              <td>Description</td>
			              <td></td>
			            </tr>
			          </thead>
			          <tbody>
			            @foreach($apartments as $apartment)
			            <tr>
			              <td>{{ $apartment->name }}</td>
			              <td>{{ $apartment->location}}</td>
			              <td>{{ $apartment->description}}</td>
			              <td>
			            </tr>
			            @endforeach
			          </tbody>
			        </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

