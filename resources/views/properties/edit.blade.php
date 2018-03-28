@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Edit Apartment</div>

                <div class="panel-body">
					<form class="form-horizontal" method="POST" action="{{ route('update_property') }}">
		                       <input type="hidden" name="id" value="{{ $property->id }}">

		                        {{ csrf_field() }}

		                        <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
		                            <label for="title" class="col-md-4 control-label">Name</label>

		                            <div class="col-md-6">
		                                <input id="name" type="text" class="form-control" name="name" value="{{ $property->name }}" required autofocus>

		                                @if ($errors->has('name'))
		                                    <span class="help-block">
		                                        <strong>{{ $errors->first('name') }}</strong>
		                                    </span>
		                                @endif
		                            </div>
		                        </div>

		                        <div class="form-group {{ $errors->has('location') ? ' has-error' : '' }}">
		                            <label for="location" class="col-md-4 control-label">Location</label>

		                            <div class="col-md-6">
		                                <input id="location" type="text" class="form-control" name="location" value="{{ $property->street_id }}" required autofocus>

		                                @if ($errors->has('location'))
		                                    <span class="help-block">
		                                        <strong>{{ $errors->first('location') }}</strong>
		                                    </span>
		                                @endif
		                            </div>
		                        </div>

		                        <div class="form-group {{ $errors->has('description') ? ' has-error' : '' }}">
		                            <label for="description" class="col-md-4 control-label">Description</label>

		                            <div class="col-md-6">
		                                <textarea name="description" id="description" placeholder="{{ $property->description }}" class="form-control"></textarea> 
		                                   @if ($errors->has('description'))
		                                    <span class="help-block">
		                                        <strong>{{ $errors->first('description') }}</strong>
		                                    </span>
		                                @endif
		                            </div>
		                         </div>       
		                               

		                        <div class="form-group">
		                            <div class="col-md-6 col-md-offset-4">
		                                <button type="submit" class="btn btn-primary">
		                                    Update
		                                </button>
		                            </div>
		                        </div>
		                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

