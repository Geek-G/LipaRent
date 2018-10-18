@extends('layouts.master')
@section('content')
<show-property :property="{{json_encode($property)}}"></show-property>
@endsection