

<div class="row">
    <div class="col-lg-12 d-flex">
      <div class="card mb-4 flex-fill w-100">
        <div class="card-header">
          <div class="d-sm-flex justify-content-sm-between align-items-center">
            <h6 class="fs-17 fw-semi-bold mb-3 mb-sm-0">Payment History</h6>
            <input class="form-control pay_daterange" type="text" name="pay_date_filter" value="" placeholder="Select Date Range" style="width: 220px" />
          </div>
        </div>
        <div class="card-body">
          <div id="payment-chart" style="width: 100%; height: 400px"></div>
        </div>
      </div>
    </div>
  </div>



@push('js')
<script>
    var data = [];
    am5.ready(function () {
      var root = am5.Root.new("payment-chart");

      root.setThemes([am5themes_Animated.new(root)]);

      var chart = root.container.children.push(
        am5xy.XYChart.new(root, {
          panX: false,
          panY: false,
          layout: root.verticalLayout,
        })
      );

      data = @json($this_month_in_out)


      var xAxis = chart.xAxes.push(
        am5xy.CategoryAxis.new(root, {
          categoryField: "day",
          renderer: am5xy.AxisRendererX.new(root, {}),
          tooltip: am5.Tooltip.new(root, {}),
        })
      );

      xAxis.data.setAll(data);

      var yAxis = chart.yAxes.push(
        am5xy.ValueAxis.new(root, {
          min: 0,
          extraMax: 0.1,
          renderer: am5xy.AxisRendererY.new(root, {}),
        })
      );

      var series1 = chart.series.push(
        am5xy.ColumnSeries.new(root, {
          name: "Income",
          xAxis: xAxis,
          yAxis: yAxis,
          valueYField: "income",
          categoryXField: "day",
          tooltip: am5.Tooltip.new(root, {
            pointerOrientation: "horizontal",
            labelText: "{name} in {categoryX}: {valueY} {info}",
          }),
        })
      );

      series1.columns.template.setAll({
        tooltipY: am5.percent(10),
        templateField: "columnSettings",
      });

      series1.data.setAll(data);

      series1.columns.template.set(
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

      series1.columns.template.setAll({
        strokeOpacity: 0,
      });

      series1.columns.template.setAll({
        cornerRadiusTL: 5,
        cornerRadiusTR: 5,
        shadowColor: am5.color(0x000000),
        shadowBlur: 8,
        shadowOffsetX: 2,
        shadowOffsetY: 2,
        shadowOpacity: 0.5,
      });

      var series2 = chart.series.push(
        am5xy.LineSeries.new(root, {
          name: "Expenses",
          xAxis: xAxis,
          yAxis: yAxis,
          valueYField: "expenses",
          categoryXField: "day",
          tooltip: am5.Tooltip.new(root, {
            pointerOrientation: "horizontal",
            labelText: "{name} in {categoryX}: {valueY} {info}",
          }),
        })
      );

      series2.strokes.template.setAll({
        strokeWidth: 3,
        templateField: "strokeSettings",
      });

      series2.data.setAll(data);


      series2.bullets.push(function () {
        return am5.Bullet.new(root, {
          sprite: am5.Circle.new(root, {
            strokeWidth: 3,
            stroke: series2.get("stroke"),
            radius: 5,
            fill: root.interfaceColors.get("background"),
          }),
        });
      });

      chart.set("cursor", am5xy.XYCursor.new(root, {}));

      var legend = chart.children.push(
        am5.Legend.new(root, {
          centerX: am5.p50,
          x: am5.p50,
        })
      );
      legend.data.setAll(chart.series.values);

      chart.appear(1000, 100);
      series1.appear();
    }); // end am5.ready()



    $(document).ready(function () {
        "use strict"; // Start of use strict



        var start = moment().subtract(29, 'days');
        var end = moment();


        $('.pay_daterange').daterangepicker({

            startDate: start,
            endDate: end,

            locale : {
                separator: ' / ',
                format : 'YYYY-MM-DD'
            },
            ranges: {
                'Today': [moment(), moment()],
                'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                'This Month': [moment().startOf('month'), moment().endOf('month')],
                'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
            }

            }).on('apply.daterangepicker', function(ev, picker) {

                const start_date = picker.startDate.format('YYYY-MM-DD');
                const end_date = picker.endDate.format('YYYY-MM-DD');
                $.post("{{ route('chart.payment-history') }}",{
                        _token: "{{ csrf_token() }}",
                        start_date: start_date,
                        end_date: end_date
                    },function(data, status){
                        console.log(data);
                        if(data.status == 'success'){
                            console.log('success');
                            // var chart = am5.registry.baseSprites[data.chart_id];
                            // chart.data.setAll(data);
                            data = [];

                            // Update the chart
                            chart.data.datasets[0].data = data;
                            chart.update();
                        }

                });

            }).on('cancel.daterangepicker', function(ev, picker) {
                $(this).val('');
            });

            $('.pay_daterange').val('');

    });

    </script>
@endpush
