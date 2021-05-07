@extends('backend.index')
@section('content')

<!--<div class="callout callout-info" style="border-left-color: #001f3f;">-->
<!--        <h4>Reminder!</h4>-->
<!--        MDC Dashboard is coming soon-->
<!--        <a href="https://spacetapbh.com/" target="_black">Here</a>-->
<!--      </div>-->

      <div class="row">

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class=" fas fa-user-plus" style="font-size: 20px;"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Members</span>
              <span class="info-box-number">{{ $users }}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-info bg-aqua"><i class="fas fa-user-plus" style="font-size: 20px;"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Active Members</span>
              <span class="info-box-number">{{ $users_active }}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>


        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="fas fa-user-plus" style="font-size: 20px;"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Inactive Members</span>
              <span class="info-box-number">{{ $users_inactive }}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="ion fa fa-medkit" style="font-size: 20px;"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Hospital</span>
              <span class="info-box-number">{{ $hospital }}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

      </div>
      @if($Data)
      <div class="card border-right">
                        <div class="card-body">
                            <br><br>
        <div id="chartPie" style="height: 350px;"></div>
        </div>
      </div>
      @endif

@endsection




<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/echarts/4.1.0/echarts.min.js"></script>

<script>
$(function(){

  'use strict'
 
  /**************** PIE CHART ************/
  var pieData = [{
    name: 'hospital',
    type: 'pie',
    radius: '80%',
    center: ['50%', '57.5%'],
    data: <?php echo json_encode($Data); ?>,
    label: {
      normal: {
        fontFamily: 'Roboto, sans-serif',
        fontSize: 11
      }
    },
    labelLine: {
      normal: {
        show: false
      }
    },
    markLine: {
      lineStyle: {
        normal: {
          width: 1
        }
      }
    }
  }];

  var pieOption = {
    tooltip: {
      trigger: 'item',
      formatter: '{a} <br/>{b}: {c} ({d}%)',
      textStyle: {
        fontSize: 11,
        fontFamily: 'Roboto, sans-serif'
      }
    },
    legend: {},
    series: pieData
  };

  var pie = document.getElementById('chartPie');
  var pieChart = echarts.init(pie);
  pieChart.setOption(pieOption);
   /** making all charts responsive when resize **/
});

</script>


