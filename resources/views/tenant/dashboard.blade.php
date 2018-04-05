@extends('layouts.masternav')

@section('content')
<section class="content">

    <h1>Welcome {{Auth::user()->name}}</h1>
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-6 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-aqua">
              <div class="inner">
                <h3>Move In</h3>
  
                <p>Enter House</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-6 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-green">
              <div class="inner">
                <h3>Pay Rent<sup style="font-size: 20px"></sup></h3>
  
                <p>Online Payments</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
        
        </div>

      </section>
@endsection

