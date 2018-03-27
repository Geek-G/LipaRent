@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">New House</div>

                <div class="panel-body">
					<form class="form-horizontal" method="POST" action="{{ route('save_house') }}">
		                        {{ csrf_field() }}

		                        <div class="form-group {{ $errors->has('house_no') ? ' has-error' : '' }}">
		                            <label for="house_no" class="col-md-4 control-label">House No</label>

		                            <div class="col-md-6">
		                                <input id="house_no" type="text" class="form-control" name="house_no" value="{{ old('house_no') }}" required autofocus>

		                                @if ($errors->has('house_no'))
		                                    <span class="help-block">
		                                        <strong>{{ $errors->first('house_no') }}</strong>
		                                    </span>
		                                @endif
		                            </div>
		                        </div>

                                <div class="form-group">
                                <label for="type" class="col-md-4 control-label">Select Type</label>
                                <div class="col-md-6">
                                    <select id="type" class="form-control">
                                        <option value="1">Single Room</option>
                                        <option value="2">Double Room</option>
                                        <option value="3">Bedsitter</option>
                                        <option value="4">One bedroom</option>
                                        <option value="5">Two bedroom</option>
                                    </select>
                                </div>
                                </div>


		                        <div class="form-group {{ $errors->has('price') ? ' has-error' : '' }}">
		                            <label for="location" class="col-md-4 control-label">Price</label>

		                            <div class="col-md-6">

		                             <div class="form-group input-group col-md-9 ">
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

		                        <div class="form-group">
		                            <div class="col-md-6 col-md-offset-4">
		                                <button type="submit" class="btn btn-primary">
		                                    Add
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

