@extends('layouts.app') 

@section('title','Tests') 

@section('content')
  <div class="box box-success">
    <div class="box-header wirh-border">
      <h3 class="box-title">Free Tests</h3>
      <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse">
          <i class="fa fa-minus"></i>
        </button>
      </div>
    </div>
    <div class="box-body" style="">
      <div class="row">
        @if(count($booklates)> 0 )
          @foreach($booklates as $booklate)
            <div class="col-md-4 col-sm-6 col-xs-12">
              <div class="flip3D">
                <div class="front">
                  <div class="info-box">
                    <span class="info-box-icon bg-aqua"><i class="fa fa-list"></i></span>
                    <div class="info-box-content">
                      <span class="info-box-text"> {{ $booklate->exam_name }} </span>
                      <span class="info-box-number">{{ $booklate->booklate_name }}</span>
                    </div> <!-- /.info-box-content -->
                  </div><!-- /.info-box -->
                </div>
                <div class="back">
                  <div class="info-box bg-aqua">
                    <div class="info-box-content-lt">
                      <span class="info-box-text">Total Qusetion - {{ $booklate->total_question }}</span>
                      <span class="info-box-text">Total Time - {{ $booklate->total_time }}</span>
                    </div><!-- /.info-box-content -->
                    <a href="/test/{{ $booklate->qbid }}" style="color: rgba(255,255,255,0.8); float:right;">
                    <span class="info-box-icon-rt"><i class="fa fa-pencil"></i></a>
                  </div><!-- /.info-box -->
                </div>
              </div>
            </div><!-- /.col -->
          @endforeach
        @endif
      </div>
    </div>
  </div>
@endsection

@section('script')
@endsection