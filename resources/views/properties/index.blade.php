@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
		@if (session('status'))
		    
			<div class="alert alert-success alert-dismissable">
				<button type="button" class="close" data-dismiss="alert"
				aria-hidden="true">
				&times;
				</button>
		        {{ session('status') }}
		    </div>
		@endif
		<div class="form-group">
        	<a class="btn btn-primary" href="{{route('new_property')}}"> New </a>
        </div>
            <div class="panel panel-default">
                <div class="panel-heading">All properties</div>
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
			            @foreach($properties as $property)
			            <tr>
			              <td>{{ $property->name }}</td>
			              <td>{{ $property->street_id}}</td>
			              <td>{{ $property->description}}</td>
							<td>			              
							<a href="{{ action('PropertyController@edit',$property->id) }}" class="btn btn-default">Edit</a>
							<a href="{{ action('HouseController@index',$property->id) }}" class="btn btn-info">Houses</a>
							<a href="{{ action('PropertyController@delete',$property->id) }}" class="btn btn-danger">Delete</a>
							</td>
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

