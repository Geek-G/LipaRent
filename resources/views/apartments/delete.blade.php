
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Delete Apartment</div>
					<h3>Do you want to delete Apartment: {{ $apartment->name }}? </h3>
					<form class="form-horizontal" method="POST" action="{{ route('do_delete') }}">
					 {{ csrf_field() }}
					<input type="hidden" name="id" value="{{ $apartment->id }}">
					<div class="alert">
                        <button type="submit" class="btn btn-danger ">Yes</button>
    					<a href="{{ route('all_apartments') }}" class="btn btn-primary"> No </a>
                    </div>
					</form>
                <div class="panel-body">
					
                </div>
            </div>
        </div>
    </div>
</div>
@endsection



