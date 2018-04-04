@extends('layouts.masternav')
@section('content')

<div class="callout callout-info">
        <h4>Tip!</h4>

        <p>Thankyou for registering with LipaRent. To continue using our service, please choose the role you
            wish to complete your registration as
        </p>
    </div>      

    <div class="box box-success box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Choose Role</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body" style="">
              <div class="row">
                    <div class="col-md-6">
                            <div class="box box-widget widget-user-2">
                                    <!-- Add the bg color to the header using any of the bg-* classes -->
                                    <div class="widget-user-header bg-aqua-active">
                                      <!-- /.widget-user-image -->
                                      <h3 class="widget-user-username">Landlord</h3>
                                      <h5 class="widget-user-desc">Become a property manager</h5>
                                    </div>
                                    <div class="box-footer no-padding">
                                            <ul class="nav nav-stacked">
                                                    <li><a href="{{route('landlord.index')}}">Register Now <span class="pull-right badge bg-aqua"> Continue </span></a></li>
                                            </ul>
                                    </div>
                            </div>
                    </div>
                    <div class="col-md-6">
                            <div class="box box-widget widget-user-2">
                                    <!-- Add the bg color to the header using any of the bg-* classes -->
                                    <div class="widget-user-header bg-yellow">
                                      <!-- /.widget-user-image -->
                                      <h3 class="widget-user-username">Tenant</h3>
                                      <h5 class="widget-user-desc">Property Tenant</h5>
                                    </div>
                                    <div class="box-footer no-padding">
                                            <ul class="nav nav-stacked">
                                                    <li><a href="{{route('tenant.index')}}">Register Now <span class="pull-right badge bg-yellow"> Continue </span></a></li>
                                            </ul>
                                    </div>
                            </div>
                    </div>
            </div>    
            </div>
            <!-- /.box-body -->
    </div>
@endsection      