@extends('layouts.master')
@section('content')
<propertiez :landlord_properties="{{json_encode($landlord_properties)}}" ></propertiez>
@endsection
