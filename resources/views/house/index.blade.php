@extends('layouts.master')

@section('content')
		
<houses :units="{{json_encode($units)}}"> </houses>

@endsection

