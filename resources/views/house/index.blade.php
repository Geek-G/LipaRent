@extends('layouts.master')

@section('content')
		
		<div class="form-group">
        	<a class="btn btn-primary" data-toggle="modal" data-target="#modal-default"> New </a>
        </div>
		<section class="content">
			<div class="row">
			  <div class="col-xs-12">

				@if (session('status'))
		    
					<div class="alert alert-success alert-dismissable">
						<button type="button" class="close" data-dismiss="alert"
						aria-hidden="true">
						&times;
						</button>
						{{ session('status') }}
					</div>
				@endif


				<div class="box">
				  <div class="box-header">
					<h3 class="box-title">All your Houses</h3>
		
					<div class="box-tools">
					  <div class="input-group input-group-sm" style="width: 150px;">
						<input type="text" name="table_search" class="form-control pull-right" placeholder="Search">
		
						<div class="input-group-btn">
						  <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
						</div>
					  </div>
					</div>
				  </div>
				  <!-- /.box-header -->
				  <div class="box-body table-responsive no-padding">
					<table class="table table-hover table-striped ">
					  <tbody>
						  <tr>
						<th>House No</th>
						<th>House Type</th>
						<th>Property</th>
						<th>Price</th>
						<th>Tenant</th>
						<th>Description</th>
						</tr>
					 @foreach($properties as $property)
					 @foreach($property->house as $house)
					  <tr>
						<td>{{$house->name}}</td>
						<td>{{$house->house_type->name}}</td>
						<td>{{$house->property->name}}</td>
						<td>{{$house->price}}</td>
						
						@if($house->tenant)
						<td>{{$house->tenant->user->name}}</td>
						@else
						<td><span class="label label-warning">Vacant</span></td>
						@endif
						
						<td>{{$house->description}}</td>
					  </tr>
					 @endforeach 
					 @endforeach
					</tbody></table>
				  </div>
				  <!-- /.box-body -->
				</div>
				<!-- /.box -->
			  </div>
			</div>
		  </section>
		</div>
		<house :properties="{{$properties}}" :housetypes="{{$housetypes}}"> </house>

@endsection

