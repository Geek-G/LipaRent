@extends('layouts.masternav')
@section('content')
<div class="register-box">
        <div class="register-box-body">
          <p class="login-box-msg">Register as a landlord</p>
      
          <form action="{{route('landlord.store')}}" method="post">
              {{ csrf_field() }}
            <div class=" has-feedback form-group {{ $errors->has('phone') ? ' has-error' : '' }}">
              <input type="text"name="phone" class="form-control" placeholder="phone no">
              <span class="glyphicon glyphicon-phone form-control-feedback"></span>
              @if ($errors->has('name'))
              <span class="help-block">
                  <strong>{{ $errors->first('phone') }}</strong>
              </span>
              @endif
            </div>

            <div class="form-group has-feedback {{ $errors->has('id') ? ' has-error' : '' }}">
                <input type="text" name="id" class="form-control" placeholder="id no">
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
                @if ($errors->has('id'))
                <span class="help-block">
                    <strong>{{ $errors->first('phone') }}</strong>
                </span>
                @endif
            </div

            <div class="form-group">
              <select id="county" name="country" class="form-control">
                @foreach($countries as $country)
                  <option value="{{$country->id}}">{{$country->name}}</option>
                @endforeach	
              </select>
            </div>

            <div class="row">
              <div class="col-xs-8">
                <div class="checkbox icheck">
                  <label>
                    <input type="checkbox"> I agree to the <a href="#">terms</a>
                  </label>
                </div>
              </div>
              <!-- /.col -->
              <div class="col-xs-4">
                <button type="submit" class="btn btn-primary btn-block btn-flat">Register</button>
              </div>
              <!-- /.col -->
            </div>
          </form>
          <a href="#" class="text-center">Register as tenant</a>
        </div>
        <!-- /.form-box -->
      </div>
      <!-- /.register-box -->

@endsection      