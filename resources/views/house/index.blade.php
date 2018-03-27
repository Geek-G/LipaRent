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
        	<a class="btn btn-primary" href="{{route('new_house')}}"> New </a>
        </div>
            <div class="panel panel-default">
                <div class="panel-heading">Apartment Houses</div>
                <div class="panel-body">
			        <table class="table table-hover table-striped">
			          <thead>
			            <tr>
			              <td>House No</td>
			              <td>Type</td>
			              <td>Price</td>
			              <td></td>
			            </tr>
			          </thead>
			          <tbody>
			            @foreach($houses as $house)
			            <tr>
			              <td>{{ $house->house_no }}</td>
			              <td>{{ $house->id}}</td>
			              <td>{{ $house->price}}</td>
							<td>			              
							<a href="#" class="btn btn-default">Edit</a>
							<a href="#" class="btn btn-danger">Delete</a>
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

