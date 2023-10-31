<x-app-layout>

  @stack('lib-styles')
  <link href="{{ admin_asset('vendor/daterangepicker/daterangepicker.css') }}" rel="stylesheet">
  @stack('css')

        <div class="row mb-3">
          <div class="col-sm-6 col-xl-3 mb-3">
            <div class="card overflow-hidden bg-1">
              <div class="card-body">
                <div class="d-flex align-items-center justify-content-between">
                  <div class="text-white">
                    <h6 class="mb-2 fw-bold">Total Experts</h6>
                    <h4 class="mb-2 fw-bold">{{ $total_expert ?? 0 }}</h4>
                  </div>
                  <div class="col-3 align-items-center d-flex">
                    <div class="counter-icon box-shadow-primary bg-white brround ms-auto"><i class="typcn typcn-user-outline"></i></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-6 col-xl-3 mb-3">
            <div class="card overflow-hidden bg-2">
              <div class="card-body">
                <div class="d-flex align-items-center justify-content-between ">
                  <div class="text-white">
                    <h6 class="mb-2 fw-bold">Total Customers</h6>
                    <h4 class="mb-2 fw-bold">{{ $total_customer ?? 0 }}</h4>
                  </div>
                  <div class="col-3 align-items-center d-flex">
                    <div class="counter-icon box-shadow-primary bg-white brround ms-auto"><i class="typcn typcn-group-outline"></i></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-6 col-xl-3 mb-3">
            <div class="card overflow-hidden bg-3">
              <div class="card-body">
                <div class="d-flex align-items-center justify-content-between">
                  <div class="text-white">
                    <h6 class="mb-2 fw-bold">Total Subscription amount</h6>
                    <h4 class="mb-2 fw-bold">${{ $total_subscription_amount ?? 0 }}</h4>
                  </div>
                  <div class="col-3 align-items-center d-flex">
                    <div class="counter-icon box-shadow-primary bg-white brround ms-auto"><i class="typcn typcn-calculator"></i></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-6 col-xl-3 mb-3">
            <div class="card overflow-hidden bg-4">
              <div class="card-body">
                <div class="d-flex align-items-center justify-content-between">
                  <div class="text-white">
                    <h6 class="mb-2 fw-bold">Total Subscription</h6>
                    <h4 class="mb-2 fw-bold">{{ $total_subscription ?? 0 }}</h4>
                  </div>
                  <div class="col-3 align-items-center d-flex">
                    <div class="counter-icon box-shadow-primary bg-white brround ms-auto"><i class="typcn typcn-bell"></i></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-lg-6">
            <div class="card mb-4 flex-fill w-100">
              <div class="card-header">
                <div class="d-sm-flex justify-content-sm-between align-items-center">
                  <h6 class="fs-17 fw-semi-bold mb-3 mb-sm-0">Customer Growth</h6>
                  <input class="form-control" type="text" name="datefilter" value="" placeholder="Select Date Range" style="width: 220px" />
                </div>
              </div>
              <div class="card-body">
                <div id="customar-chart" style="width: 100%; height: 400px"></div>
              </div>
            </div>
          </div>

          <div class="col-lg-6">
            <div class="card mb-4 flex-fill w-100">
              <div class="card-header">
                <div class="d-sm-flex justify-content-sm-between align-items-center">
                  <h6 class="fs-17 fw-semi-bold mb-3 mb-sm-0">Category wise session</h6>
                  <input class="form-control" type="text" name="datefilter" value="" placeholder="Select Date Range" style="width: 220px" />
                </div>
              </div>
              <div class="card-body">
                <div id="chartdiv" style="width: 100%; height: 400px"></div>
              </div>
            </div>
          </div>

        </div>



        <div class="row mb-4">
          <div class="col-6">
            <div class="card">
              <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                  <div>
                    <h6 class="fs-17 fw-semi-bold mb-0">Top 10 Expert</h6>
                  </div>
                  <div class="text-end">
                    <div class="actions">
                        <a href="{{ route('expert.top-experts') }}" class="btn btn-success btn-sm editExpert">View All</a>
                    </div>
                </div>
                </div>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table id="example-one" class="table display table-bordered table-striped table-hover">
                    <thead>
                      <tr>
                        <th>Expert Code</th>
                        <th>Expert Category</th>
                        <th>Expert Name</th>
                        <th>Rating</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($top_10_experts as $item)
                            <tr>
                                <td>{{ $item->code }}</td>
                                <td>{{ $item->category?->name }}</td>
                                <td>{{ $item->full_name }}</td>
                                <td>{{ $item->rank_no }}</td>
                                <td>
                                    <a href="{{ route('expert.show', $item->id) }}"  class="btn btn-success-soft btn-sm me-1"><i class="far fa-eye"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>

          <div class="col-6">
            <div class="card">
              <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                  <div>
                    <h6 class="fs-17 fw-semi-bold mb-0">Lowest Rating Expert</h6>
                  </div>
                  <div class="text-end">
                    <div class="actions">
                        <a href="{{ route('expert.lowest-experts') }}" class="btn btn-success btn-sm editExpert">View All</a>
                    </div>
                </div>
                </div>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table id="example-one" class="table display table-bordered table-striped table-hover">
                    <thead>
                      <tr>
                        <th>Expert Code</th>
                        <th>Expert Category</th>
                        <th>Expert Name</th>
                        <th>Rating</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($top_10_lowest_rating_experts as $item)
                            <tr>
                                <td>{{ $item->code }}</td>
                                <td>{{ $item->category?->name }}</td>
                                <td>{{ $item->full_name }}</td>
                                <td>{{ $item->rank_no }}</td>
                                <td>
                                    <div class="text-end">
                                        <div class="actions">
                                            <a href="#" class="btn btn-success btn-sm editExpert">View All</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>


        @include('partials.d_payment_history')


@stack('lib-scripts')


    <script src="{{ admin_asset('vendor/amcharts5/index.js')}}"></script>
    <script src="{{ admin_asset('vendor/amcharts5/percent.js')}}"></script>
    <script src="{{ admin_asset('vendor/amcharts5/themes/Animated.js')}}"></script>
    <script src="{{ admin_asset('vendor/amcharts5/xy.js')}}"></script>



    <!-- Chart code -->
    <script>

        // function getJsonData1(){
        //     var php_data;
        //     $.ajax({
        //         type: 'GET',
        //         url: "{{route('admin.dashboard.chartOne')}}",
        //         data: {"_token": "{{ csrf_token() }}"},
        //         async: false,
        //         success: function (respo) {
        //             php_data = respo;
        //         }
        //     });
        //     return php_data;
        // }


        am5.ready(function () {

          // var infodata = getJsonData1();
          // Create root element
          // https://www.amcharts.com/docs/v5/getting-started/#Root_element
          var root = am5.Root.new("customar-chart");

          // Set themes
          // https://www.amcharts.com/docs/v5/concepts/themes/
          root.setThemes([am5themes_Animated.new(root)]);

          // Create chart
          // https://www.amcharts.com/docs/v5/charts/xy-chart/
          var chart = root.container.children.push(
            am5xy.XYChart.new(root, {
              panX: true,
              panY: true,
              pinchZoomX: true,
            })
          );

          // Add cursor
          // https://www.amcharts.com/docs/v5/charts/xy-chart/cursor/
          var cursor = chart.set("cursor", am5xy.XYCursor.new(root, {}));
          cursor.lineY.set("visible", false);

          // Create axes
          // https://www.amcharts.com/docs/v5/charts/xy-chart/axes/
          var xRenderer = am5xy.AxisRendererX.new(root, { minGridDistance: 30 });
          xRenderer.labels.template.setAll({
            rotation: -90,
            centerY: am5.p50,
            centerX: am5.p100,
            paddingRight: 15,
          });

          xRenderer.grid.template.setAll({
            location: 1,
          });

          var xAxis = chart.xAxes.push(
            am5xy.CategoryAxis.new(root, {
              maxDeviation: 0.3,
              categoryField: "day",
              renderer: xRenderer,
              tooltip: am5.Tooltip.new(root, {}),
            })
          );

          var yAxis = chart.yAxes.push(
            am5xy.ValueAxis.new(root, {
              maxDeviation: 0.3,
              renderer: am5xy.AxisRendererY.new(root, {
                strokeOpacity: 0.1,
              }),
            })
          );

          // Create series
          // https://www.amcharts.com/docs/v5/charts/xy-chart/series/
          var series = chart.series.push(
            am5xy.ColumnSeries.new(root, {
              name: "Series 1",
              xAxis: xAxis,
              yAxis: yAxis,
              valueYField: "value",
              sequencedInterpolation: true,
              categoryXField: "day",
              tooltip: am5.Tooltip.new(root, {
                labelText: "{valueY}",
              }),
            })
          );

          series.columns.template.set(
            "fillGradient",
            am5.LinearGradient.new(root, {
              stops: [
                {
                  color: am5.color(0xef693d),
                },
                {
                  color: am5.color(0xe34b04),
                },
              ],
              rotation: 90,
            })
          );
          series.columns.template.setAll({
            strokeOpacity: 0,
          });

          series.columns.template.setAll({
            cornerRadiusTL: 5,
            cornerRadiusTR: 5,
            shadowColor: am5.color(0x000000),
            shadowBlur: 8,
            shadowOffsetX: 2,
            shadowOffsetY: 2,
            shadowOpacity: 0.5,
          });


          // Set data
          var data = [<?=rtrim($chartone,',')?>];

          xAxis.data.setAll(data);
          series.data.setAll(data);

          // Make stuff animate on load
          // https://www.amcharts.com/docs/v5/concepts/animations/
          series.appear(1000);
          chart.appear(1000, 100);
        }); // end am5.ready()
    </script>


    <script>
      am5.ready(function () {
        // Create root element
        // https://www.amcharts.com/docs/v5/getting-started/#Root_element
        var root = am5.Root.new("chartdiv");

        // Set themes
        // https://www.amcharts.com/docs/v5/concepts/themes/
        root.setThemes([am5themes_Animated.new(root)]);

        // Create chart
        // https://www.amcharts.com/docs/v5/charts/percent-charts/pie-chart/
        var chart = root.container.children.push(
          am5percent.PieChart.new(root, {
            layout: root.verticalLayout,
          })
        );

        // Create series
        // https://www.amcharts.com/docs/v5/charts/percent-charts/pie-chart/#Series
        var series = chart.series.push(
          am5percent.PieSeries.new(root, {
            valueField: "value",
            categoryField: "category",
          })
        );

        // Set data
        // https://www.amcharts.com/docs/v5/charts/percent-charts/pie-chart/#Setting_data
        series.data.setAll([<?=rtrim($chartTwo,',')?>]);

        // Create legend
        // https://www.amcharts.com/docs/v5/charts/percent-charts/legend-percent-series/
        var legend = chart.children.push(
          am5.Legend.new(root, {
            centerX: am5.percent(50),
            x: am5.percent(50),
            marginTop: 15,
            marginBottom: 15,
          })
        );

        legend.data.setAll(series.dataItems);

        // Play initial series animation
        // https://www.amcharts.com/docs/v5/concepts/animations/#Animation_of_series
        series.appear(1000, 100);
      }); // end am5.ready()
    </script>

@stack('js')

</x-app-layout>
