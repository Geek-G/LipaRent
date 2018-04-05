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
					<h3 class="box-title">{{$property->name}} Houses</h3>
		
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
					 @foreach($houses as $house)
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
					</tbody></table>
				  </div>
				  <!-- /.box-body -->
				</div>
				<!-- /.box -->
			  </div>
			</div>
		  </section>
		</div>

		<div col-md-10>
				<div class="modal fade" id="modal-default">
						<div class="modal-dialog">
						  <div class="modal-content">
							<div class="modal-header">
							  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span></button>
							  <h4 class="modal-title">New House</h4>
							</div>
							<form action="{{route('house.store')}}" method="post">
							<div class="modal-body">
									{{ csrf_field() }}
									<input type="hidden" name="property" value="{{$property->id}}" >

		                        <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
		                            <label for="name" class="control-label">House No</label>

		                            <div class="">
		                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

		                                @if ($errors->has('name'))
		                                    <span class="help-block">
		                                        <strong>{{ $errors->first('name') }}</strong>
		                                    </span>
		                                @endif
		                            </div>
		                        </div>


                                <div class="form-group">
                                <label for="type" class=" control-label">Select Type</label>
                                <div class="">
                                    <select id="type" name="type" class="form-control">
																			@foreach($housetypes as $type)
                                        <option value="{{$type->id}}">{{$type->name}}</option>
																			@endforeach	
                                    </select>
                                </div>
                                </div>

		                        <div class="form-group {{ $errors->has('price') ? ' has-error' : '' }}">
		                            <label for="location" class="col-md-4 control-label">Price</label>

		                            <div class="">

		                             <div class="form-group input-group  ">
                                            <span class="input-group-addon">KSh</span>
                                            <input id="price" type="text" class="form-control" name="price" value="{{ old('price') }}" required autofocus>
                                            <span class="input-group-addon">.00</span>
                                     </div>
		                                

		                                @if ($errors->has('price'))
		                                    <span class="help-block">
		                                        <strong>{{ $errors->first('price') }}</strong>
		                                    </span>
		                                @endif
		                            </div>
		                        </div>
  
							</div>
							<div class="modal-footer">
							  <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
							  <button type="submit" class="btn btn-primary">Save</button>
							</form>

							</div>
						  </div>
						  <!-- /.modal-content -->
						</div>
						<!-- /.modal-dialog -->
					  </div>
				<!-- /.modal -->
		</div>	

@endsection

