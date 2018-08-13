@extends('layouts.master')
@section('content')
<propertiez :landlord_properties="{{json_encode($landlord_properties)}}" :landlord="{{json_encode($landlord)}}" :property_types="{{json_encode($property_types)}}"    ></propertiez>
@endsection