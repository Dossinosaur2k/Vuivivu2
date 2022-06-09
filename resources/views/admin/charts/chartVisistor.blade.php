@extends('admin.layouts.app')


@section('content')
  
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Analytics</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Analytics</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->
  
      <!-- Main content -->
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-12">
              <div class="card">
                <div class="card-header border-0">
                  <div class="d-flex justify-content-between">
                    <h3 class="card-title">Analytic Website Visitors</h3>
                    <a class="{{ isset($startDay)?'':'btn disabled' }}" href="{{ route('export',isset($startDay)?$startDay->format('d-m-Y').'.'.$endDay->format('d-m-Y'):'') }}">Exports Data</a>
                </div>
                <div class="card-body">
                    <div class="form-group">
                      <form action="{{ route('chart-visistor') }}" method="get" >
                        @csrf
                        <label>Select time :</label>
                        <div class="d-flex flex-row">

                          <div class="input-group" style="width:260px">
                            <button type="button" class="btn btn-default float-right" id="daterange-btn">
                              <i class="far fa-calendar-alt"></i>
                              {{-- <i class="fas fa-caret-down"></i> --}}
                            </button>
                            <input type="text" name="date_range" id="date_range" value="{{ isset($startDay)?$startDay->format('d/m/Y').'-'.$endDay->format('d/m/Y'):'' }}" readonly="readonly" class="form-control" >
                          </div>
                          <button type="submit" class="btn btn-default float-right"> <i class="fa-solid fa-magnifying-glass"></i></button>
                          <button type="button" class="btn btn-default" id="btn-reset"><i class="fa-solid fa-rotate-left"></i></a></button>
                        </div>
                        </form>
                      </div>
                  <div class="d-flex">
                    <p class="d-flex flex-column align-items-center">
                      <span class="text-bold text-lg">{{ $data['visitors']->sum() }}</span>
                      <span>Visitors Over Time</span>
                    </p>
                    <p class="d-flex flex-column ml-5 align-items-center">
                        <span class="text-bold text-lg">{{ $data['visitors']->max() }}</span>
                        <span>Higest Visitors per day</span>
                      </p>
                    {{-- <p class="ml-auto d-flex flex-column text-right">
                      @if(percentHigher($data['visitors']->sum(),$oldWeekData['visitors']->sum())>=0)
                      <span class="text-success">
                        <i class="fas fa-arrow-up"></i> {{ percentHigher($data['visitors']->sum(),$oldWeekData['visitors']->sum())  }} %
                      </span>
                      @else
                      <span class="text-danger">
                        <i class="fas fa-arrow-down"></i> {{ percentHigher($data['visitors']->sum(),$oldWeekData['visitors']->sum())  }} %
                      </span>
                      @endif
                      <span class="text-muted">Since last week</span>
                      
                    </p> --}}
                  </div>
                  <!-- /.d-flex -->
  
                  <div class="position-relative mb-4">
                    <canvas id="visitors-chart" height="200"></canvas>
                  </div>
  
                  <div class="d-flex flex-row justify-content-end">
                    <span class="mr-2">
                      <i class="fas fa-square text-primary"></i> Visitors
                    </span>
  
                  
                  </div>
                </div>
              </div>
              <div class="card">
                <div class="card-header border-0">
                  <div class="d-flex justify-content-between">
                    <h3 class="card-title">Analytic Page Views</h3>
                   
                </div>
                <div class="card-body">
                    <div class="form-group">
                      
                  <div class="d-flex">
                    <p class="d-flex flex-column align-items-center">
                      <span class="text-bold text-lg">{{ $data['pageViews']->sum() }}</span>
                      <span>Page Views Over Time</span>
                    </p>
                    <p class="d-flex flex-column ml-5 align-items-center">
                        <span class="text-bold text-lg">{{ $data['pageViews']->max()?$data['pageViews']->max():0 }}</span>
                        <span>Higest Page Views Per Day</span>
                      </p>
                    {{-- <p class="ml-auto d-flex flex-column text-right">
                      @if(percentHigher($data['visitors']->sum(),$oldWeekData['visitors']->sum())>=0)
                      <span class="text-success">
                        <i class="fas fa-arrow-up"></i> {{ percentHigher($data['visitors']->sum(),$oldWeekData['visitors']->sum())  }} %
                      </span>
                      @else
                      <span class="text-danger">
                        <i class="fas fa-arrow-down"></i> {{ percentHigher($data['visitors']->sum(),$oldWeekData['visitors']->sum())  }} %
                      </span>
                      @endif
                      <span class="text-muted">Since last week</span>
                      
                    </p> --}}
                  </div>
                  <!-- /.d-flex -->
  
                  <div class="position-relative mb-4">
                    <canvas id="pageViews-chart" height="200"></canvas>
                  </div>
  
                  <div class="d-flex flex-row justify-content-end">
                    <span class="mr-2">
                      <i class="fas fa-square text-primary"></i> Page Views
                    </span>
  
                    
                  </div>
                </div>

                
              </div>

              <div class="card card-success">
                <div class="card-header">
                  <h3 class="card-title">Chart Page Views/Visitors</h3>
  
                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                      <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                      <i class="fas fa-times"></i>
                    </button>
                  </div>
                </div>
                <div class="card-body">
                  <div class="chart"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                    <canvas id="stackedBarChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 487px;" width="487" height="250" class="chartjs-render-monitor"></canvas>
                  </div>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
  
              <!-- /.card -->
            </div>

            
            <!-- /.col-md-6 -->
           
            <!-- /.col-md-6 -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
      </div>
      <!-- /.content -->
   
    <!-- /.content-wrapper -->
  
    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  
@endsection
<script src="{{ asset('assets/dashboard/plugins/jquery/jquery.min.js') }}"></script>
<script>
  $(function () {
  'use strict'

  var ticksStyle = {
    fontColor: '#495057',
    fontStyle: 'bold'
  }

  var mode = 'index'
  var intersect = true

  var $salesChart = $('#sales-chart')
  // eslint-disable-next-line no-unused-vars
  var salesChart = new Chart($salesChart, {
    type: 'bar',
    data: {
      labels: ['JUN', 'JUL', 'AUG', 'SEP', 'OCT', 'NOV', 'DEC'],
      datasets: [
        {
          backgroundColor: '#007bff',
          borderColor: '#007bff',
          data: [1000, 2000, 3000, 2500, 2700, 2500, 3000]
        },
        {
          backgroundColor: '#ced4da',
          borderColor: '#ced4da',
          data: [700, 1700, 2700, 2000, 1800, 1500, 2000]
        }
      ]
    },
    options: {
      maintainAspectRatio: false,
      tooltips: {
        mode: mode,
        intersect: intersect
      },
      hover: {
        mode: mode,
        intersect: intersect
      },
      legend: {
        display: false
      },
      scales: {
        yAxes: [{
          // display: false,
          gridLines: {
            display: true,
            lineWidth: '4px',
            color: 'rgba(0, 0, 0, .2)',
            zeroLineColor: 'transparent'
          },
          ticks: $.extend({
            beginAtZero: true,

            // Include a dollar sign in the ticks
            callback: function (value) {
              if (value >= 1000) {
                value /= 1000
                value += 'k'
              }

              return '$' + value
            }
          }, ticksStyle)
        }],
        xAxes: [{
          display: true,
          gridLines: {
            display: false
          },
          ticks: ticksStyle
        }]
      }
    }
  })

  var $visitorsChart = $('#visitors-chart')
  // eslint-disable-next-line no-unused-vars
  var visitorsChart = new Chart($visitorsChart, {
    data: {
      labels: {!! json_encode($data['date']->map(function ($d) { return $d->format('d/m');})) !!},
      datasets: [{
        type: 'line',
        data: {!! json_encode($data['visitors']) !!},
        backgroundColor: 'transparent',
        borderColor: '#007bff',
        pointBorderColor: '#007bff',
        pointBackgroundColor: '#007bff',
        fill: false
        // pointHoverBackgroundColor: '#007bff',
        // pointHoverBorderColor    : '#007bff'
      }
    ]
    },
    options: {
      maintainAspectRatio: false,
      tooltips: {
        mode: mode,
        intersect: intersect
      },
      hover: {
        mode: mode,
        intersect: intersect
      },
      legend: {
        display: false
      },
      scales: {
        yAxes: [{
          // display: false,
          gridLines: {
            display: true,
            lineWidth: '4px',
            color: 'rgba(0, 0, 0, .2)',
            zeroLineColor: 'transparent'
          },
          ticks: $.extend({
            beginAtZero: true,
            suggestedMax: {{ $maxVisitors > 10 ? $maxVisitors : 10 }}
          }, ticksStyle)
        }],
        xAxes: [{
          display: true,
          gridLines: {
            display: false
          },
          ticks: ticksStyle
        }]
      }
    }
  })
  var $visitorsChart = $('#pageViews-chart')
  var pageViewsChart = new Chart($visitorsChart, {
    data: {
      labels: {!! json_encode($data['date']->map(function ($d) { return $d->format('d/m');})) !!},
      datasets: [{
        type: 'line',
        data: {!! json_encode($data['pageViews']) !!},
        backgroundColor: 'transparent',
        borderColor: '#007bff',
        pointBorderColor: '#007bff',
        pointBackgroundColor: '#007bff',
        fill: false
        // pointHoverBackgroundColor: '#007bff',
        // pointHoverBorderColor    : '#007bff'
      }
    ]
    },
    options: {
      maintainAspectRatio: false,
      tooltips: {
        mode: mode,
        intersect: intersect
      },
      hover: {
        mode: mode,
        intersect: intersect
      },
      legend: {
        display: false
      },
      scales: {
        yAxes: [{
          // display: false,
          gridLines: {
            display: true,
            lineWidth: '4px',
            color: 'rgba(0, 0, 0, .2)',
            zeroLineColor: 'transparent'
          },
          ticks: $.extend({
            beginAtZero: true,
            suggestedMax: {{ $maxVisitors > 10 ? $maxVisitors : 10 }}
          }, ticksStyle)
        }],
        xAxes: [{
          display: true,
          gridLines: {
            display: false
          },
          ticks: ticksStyle
        }]
      }
    }
  })

  var areaChartData = {
      labels  : {!! json_encode($data['date']->map(function ($d) { return $d->format('d/m');})) !!},
      datasets: [
        {
          label               : 'Visistors',
          backgroundColor     : 'rgba(60,141,188,0.9)',
          borderColor         : 'rgba(60,141,188,0.8)',
          pointRadius          : false,
          pointColor          : '#3b8bba',
          pointStrokeColor    : 'rgba(60,141,188,1)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data                : {!! json_encode($data['visitors']) !!}
        },
        {
          label               : 'Page Views',
          backgroundColor     : 'rgba(210, 214, 222, 1)',
          borderColor         : 'rgba(210, 214, 222, 1)',
          pointRadius         : false,
          pointColor          : 'rgba(210, 214, 222, 1)',
          pointStrokeColor    : '#c1c7d1',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(220,220,220,1)',
          data                : {!! json_encode($data['pageViews']) !!}
        },
      ]
    }

    //---------------------
    //- STACKED BAR CHART -
    //---------------------
    var stackedBarChartCanvas = $('#stackedBarChart').get(0).getContext('2d')
    var stackedBarChartData = $.extend(true, {}, areaChartData)

    var stackedBarChartOptions = {
      responsive              : true,
      maintainAspectRatio     : false,
      scales: {
        xAxes: [{
          stacked: true,
        }],
        yAxes: [{
          stacked: true
        }]
      }
    }

    new Chart(stackedBarChartCanvas, {
      type: 'bar',
      data: stackedBarChartData,
      options: stackedBarChartOptions
    })
})

// lgtm [js/unused-local-variable]

</script>