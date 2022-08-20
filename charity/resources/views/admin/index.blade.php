@extends('admin.admin')
@section('title')
    Deshboard
@endsection
@section('content')
    <!-- Main content -->
    <section class="content">
        <!-- Info boxes -->
        {{-- ToDo find better way to do this --}}
        <div class="row">
            @foreach ($roles as $role)
                <div class="col-md-4 col-sm-6 col-xs-12 col-lg-3">
                    <div class="info-box">
                        <span class="info-box-icon bg-aqua"><i class="fa fa-user"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Total {{ $role->name }}</span>
                            <span class="info-box-number">{{ $role->user->count() }}</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
            @endforeach
            <!-- /.col -->
        </div>
        <div class="row">
            <div class="col-md-12">
              <div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title">Monthly Recap Report</h3>
    
                  <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                  </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  <div class="row">
                    <div class="col-md-8">
                      <p class="text-center">
                        <strong>Donates: 1 JAN {{ date('Y') }} - {{ date('d M Y') }}</strong>
                      </p>
    
                      <div class="chart">
                        <!-- Sales Chart Canvas -->
                        <canvas id="canvas" style="width: 703px; height: auto;"></canvas>
                      </div>
                      <!-- /.chart-responsive -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-4">
                      <p class="text-center">
                        <strong>Total Needy Peoples</strong>
                      </p>

                      @foreach( $person_types as $person_type )

                        <div class="progress-group">
                          <span class="progress-text">{{$person_type->name }}</span>
                          <span class="progress-number"><b>{{$person_type->needy_people->count()}}</b>/{{ $needy_people->count() }}</span>
      
                          <div class="progress sm">
                            <div class="progress-bar progress-bar-aqua" style="width: {{ (100 * $person_type->needy_people->count()) / $needy_people->count() }}%"></div>
                          </div>
                        </div>
                        <!-- /.progress-group -->

                      @endforeach

                    </div>
                    <!-- /.col -->
                  </div>
                  <!-- /.row -->
                </div>
                <!-- ./box-body -->
                <div class="box-footer">
                  <div class="row">
                    <div class="col-sm-3 col-xs-6">
                      <div class="description-block border-right">
                        <h5 class="description-header">{{ $donates->count() }}</h5>
                        <span class="description-text">TOTAL DONATIONS</span>
                      </div>
                      <!-- /.description-block -->
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-3 col-xs-6">
                      <div class="description-block border-right">
                        <h5 class="description-header">{{ $donates_this_year }}</h5>
                        <span class="description-text">TOTAL THIS YEAR</span>
                      </div>
                      <!-- /.description-block -->
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-3 col-xs-6">
                      <div class="description-block border-right">
                        <h5 class="description-header">{{ $donates_last_year }}</h5>
                        <span class="description-text">TOTAL LAST YEAR</span>
                      </div>
                      <!-- /.description-block -->
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-3 col-xs-6">
                      <div class="description-block">
                        <h5 class="description-header">{{ $total_contracts }}</h5>
                        <span class="description-text">Total Contracts</span>
                      </div>
                      <!-- /.description-block -->
                    </div>
                  </div>
                  <!-- /.row -->
                </div>
                <!-- /.box-footer -->
              </div>
              <!-- /.box -->
            </div>
            <!-- /.col -->
          </div>
        <div class="row">


        
          
          <div class="col-md-12">
            <div class="box">
              <div class="box-header with-border">
                <h3 class="box-title">Report</h3>
  
                <div class="box-tools pull-right">
                  <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                </div>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <div class="row">
                    
                  <!-- /.col -->
                  <div class="col-md-12">
                    
                    <p class="text-center">
                      <strong>Total Donations</strong>
                    </p>
                    @foreach( $donates_types as $Type )
                      <div class="progress-group">
                        <span class="progress-text">{{ $Type->name}}</span>
                        <span class="progress-number"><b>{{$Type->donate->count()}}</b>/{{ $donates->count() }}</span>
    
                        <div class="progress sm">
                          <div class="progress-bar progress-bar-aqua" style="width: {{ (100 * $Type->donate->count()) / $donates->count() }}%"></div>
                        </div>
                      </div>
                    @endforeach

                  </div>
                </div>
              </div>
            </div>
          </div>



        </div>
    </section>

@endsection
@section('script')
    <script>
      
      //generate random color------------------------------------------
      function getRandomColor(num){
        var letters = '0123456789ABCDEF'.split('');
        var color = '#';
        var listOfColors = [];
        for(var j=0; j < num; j++ ){
          for (var i=0; i < 6; i++){
          color += letters[ Math.floor( Math.random() * 16 )];
          }
          listOfColors.push(color);
          color = '#'
        }
        return listOfColors;
      }

      //first chart data-----------------------------------------------
      var chartdata = {
        type : 'bar',
        data : {
          labels : ['JAN', 'FEB', 'MAR', 'APR', 'MAY', 'JUN', ' JUL', 'AUG','SEP', 'OCT','NOV','DEC'],
          datasets : [{
            label : 'Donation at this month',
            backgroundColor : getRandomColor(12),
            broderWidth : 1,
            data : @JSON($months_data) }]},
        options: {
          scales:{
            yAxes: [{
              ticks : {
                beginAtZero : true
              }}]}}
      }

      var ctx = document.getElementById('canvas');
      new Chart(ctx, chartdata);

    </script>
@endsection
