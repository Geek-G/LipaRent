@extends('layouts.master')

@section('content')
		
		<div class="form-group">
					<a class="btn btn-primary" data-toggle="modal" data-target="#modal-default"> New </a>
					<a class="btn btn-primary" data-toggle="modal" data-target="#vue-modal"> New Modal </a>
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
					<h3 class="box-title"> {{$landlord->user->name}} Properties </h3>
					</div>
				  </div>
				  <!-- /.box-header -->
				  <div class="box-body  no-padding">
					<table class="table table-hover table-striped ">
					  <tbody>
						  <tr>
						<th>Property Name</th>
						<th>Property Town</th>
            <th>Property Description</th>
            <th>Property Houses</th>
            <th>Modify Property</th>
					  </tr>
					 @foreach($landlord->property as $property)
					  <tr>
            <td>{{$property->name}}</td>
            <td>{{$property->street->town->name}}</td>
            <td>{{$property->description}}</td>
            <td><a href="{{ action('PropertyController@show',$property->id) }}" class="btn  btn-info">Houses</a></td>
            <td>
								<button id="launcher" class="btn btn-sm btn-warning" data-pname="{{$property->name}}" data-pid="{{$property->id}}" data-pdesc="{{$property->description}}" data-toggle="modal" data-target="#modal-edit" ><i class="fa fa-edit" ></i> <span> Edit</span></button>
								<button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#modal-delete" data-pid="{{$property->id}}" ><i class="fa fa-times"></i> <span> Delete</span></button>
            </td>
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
							  <h4 class="modal-title">New Property</h4>
							</div>
							<form action="{{route('property.store')}}" method="post">
							<div class="modal-body">
									{{ csrf_field() }}
		                        <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
		                            <label for="name" class="control-label">Property Name</label>

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
                                <label for="type" class=" control-label">Property Type</label>
                                <div class="">
                                    <select id="type" name="type" class="form-control">
																				@foreach($types as $type)
																					<option value="{{$type->id}}">{{$type->name}}</option>
																				@endforeach	
																		</select>
                                </div>
														</div>
														
														<div id="locdiv">
															
														<div class="form-group" id="countydiv">
                                <label for="county" class=" control-label">County</label>
                                <div class="">
                                    <select id="county" name="county" class="form-control">
																			@foreach($landlord->country->county as $county)
																				<option value="{{$county->id}}">{{$county->name}}</option>
																			@endforeach	
                                    </select>
                                </div>
														</div>
														</div>


		                        <div class="form-group {{ $errors->has('description') ? ' has-error' : '' }}">
		                            <label for="description" class=" control-label">Description</label>

		                            <div class="">
																	<textarea name="description" id="desc"  class="form-control"></textarea> 
																		@if ($errors->has('description'))
																		<span class="help-block">
																				<strong>{{ $errors->first('description') }}</strong>
																		</span>
																    @endif          
																</div>
		                        </div>
							</div>
							
							<location></location>


							<div class="modal-footer">
							  <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
								<button type="submit" class="btn btn-primary">Save</button>
							</div>	
							</form>

							</div>
						  </div>
						  <!-- /.modal-content -->
						</div>
						<!-- /.modal-dialog -->
					  </div>
				<!-- /.modal -->
		</div>	

		<div col-md-10>
			<div class="modal fade" id="modal-edit">
					<div class="modal-dialog">
						<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title">Edit Property</h4>
						</div>
						<form action="{{route('property.update','crap')}}" method="post">
						<div class="modal-body">
								{{ csrf_field() }}
								{{method_field('patch')}}
								<input type="hidden" id="id" name="id"  >
													<div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
															<label for="name" class="control-label">Property Name</label>

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
															<label for="type" class=" control-label">Property Type</label>
															<div class="">
																	<select id="type" name="type" class="form-control">
																			@foreach($types as $type)
																				<option value="{{$type->id}}">{{$type->name}}</option>
																			@endforeach	
																	</select>
															</div>
													</div>
													
													<div id="locdiv">
														
													<div class="form-group" id="countydiv">
															<label for="county" class=" control-label">County</label>
															<div class="">
																	<select id="county" name="county" class="form-control">
																		@foreach($landlord->country->county as $county)
																			<option value="{{$county->id}}">{{$county->name}}</option>
																		@endforeach	
																	</select>
															</div>
													</div>
														

													</div>


													<div class="form-group {{ $errors->has('description') ? ' has-error' : '' }}">
															<label for="description" class=" control-label">Description</label>

															<div class="">
																<textarea name="description" id="description"  class="form-control"></textarea> 
																	@if ($errors->has('description'))
																	<span class="help-block">
																			<strong>{{ $errors->first('description') }}</strong>
																	</span>
																	@endif          
															</div>
													</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
							<button type="submit" class="btn btn-primary">Save</button>
						</div>	
						</form>

						</div>
						</div>
						<!-- /.modal-content -->
					</div>
					<!-- /.modal-dialog -->
					</div>
			<!-- /.modal -->
	</div>	


	<div col-md-10>
			<div class="modal fade" id="modal-delete">
					<div class="modal-dialog modal-warning">
						<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title">Delete Property</h4>
						</div>
						<form action="{{route('property.update','crap')}}" method="post">
						<div class="modal-body">
								{{ csrf_field() }}
								{{method_field('delete')}}
								<input type="hidden" id="pid" name="id"  >
								<p>Are you sure you want to delete?<p id="pname"></p></p>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-success pull-left" data-dismiss="modal">Close</button>
							<button type="submit" class="btn btn-danger">Delete</button>
						</div>	
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

