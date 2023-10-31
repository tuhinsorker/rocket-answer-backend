<!--Global script(used by all pages)-->
<script src="{{admin_asset('vendor/jQuery/jquery.min.js') }}"></script>
<script src="{{admin_asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
@stack('lib-scripts')
<script src="{{ nanopkg_asset('vendor/highlight/highlight.min.js') }}"></script>
<script src="{{admin_asset('vendor/metisMenu/metisMenu.min.js') }}"></script>
<script src="{{admin_asset('vendor/perfect-scrollbar/dist/perfect-scrollbar.min.js') }}"></script>
<script src="{{admin_asset('vendor/daterangepicker/daterangepicker.js') }}"></script>
<script src="{{admin_asset('vendor/daterangepicker/daterangepicker.active.js') }}"></script>
<script src="{{ nanopkg_asset('vendor/sweetalert2/sweetalert2.min.js') }}"></script>
<script src="{{ nanopkg_asset('vendor/fontawesome-free-6.3.0-web/js/all.min.js') }}"></script>
<script src="{{ nanopkg_asset('vendor/toastr/build/toastr.min.js') }}"></script>
<script src="{{ nanopkg_asset('vendor/axios/dist/axios.min.js') }}"></script>
<script src="{{ nanopkg_asset('vendor/typed.js/lib/typed.min.js') }}"></script>
<script src="{{ nanopkg_asset('js/axios.init.min.js') }}"></script>
<script src="{{ nanopkg_asset('js/arrow-hidden.min.js') }}"></script>
<script src="{{ nanopkg_asset('js/img-src.min.js') }}"></script>
<script src="{{ nanopkg_asset('js/delete.min.js') }}"></script>
<script src="{{ nanopkg_asset('js/user-status-update.min.js') }}"></script>
<script src="{{ nanopkg_asset('js/typed-init.min.js')}}"></script>
<script src="{{ nanopkg_asset('js/main.js') }}"></script>

<!--Page Scripts(used by all page)-->
<script src="{{admin_asset('js/sidebar.min.js') }}"></script>

<script src="{{ admin_asset('vendor/moment/moment.min.js')}}"></script>
<script src="{{ admin_asset('vendor/daterangepicker/daterangepicker.js')}}"></script>
<script src="{{ admin_asset('vendor/daterangepicker/daterangepicker.active.js')}}"></script>


<script src="{{ admin_asset('js/ajax_form_submission.js')}}"></script>


<script>
    $(function () {
    // Search filter
    let table = $('body').find('table').first();
    $('.search-btn').click(function () {
        let params = {};
        $(".my-filter-form").find("select, textarea, input").each(function(index, item) {
            params[item.name] = item.value;
         });

        table.on('preXhr.dt', function(e, settings, data) {
            for (const [key, value] of Object.entries(params)) {
                data[key]= value;
              }

        });
        table.DataTable().ajax.reload();
    });

    $('.reset-btn').click(function(){

        $(".my-filter-form").find("textarea, input").val('');
        $(".my-filter-form").find("select").val('').trigger('change');
        let params = {};
        $(".my-filter-form").find("select, textarea, input").each(function(index, item) {
            params[item.name] = item.value;
        });
        table.on('preXhr.dt', function(e, settings, data) {
            for (const [key, value] of Object.entries(params)) {
                data[key]= value;
            }
        });
        $('#flush-collapseOne').collapse('hide');
        table.DataTable().ajax.reload();
   });



});



    $(document).ready(function () {
    "use strict"; // Start of use strict



   var start = moment().subtract(29, 'days');
   var end = moment();


   $('.my_daterange').daterangepicker({

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

        });


        $('.my_daterange').val('');

    });

    function printContent(el){
            var restorepage = document.body.innerHTML;
            var printcontent = document.getElementById(el).innerHTML;
            document.body.innerHTML = printcontent;
            window.print();
            document.body.innerHTML = restorepage;
        }




</script>
@stack('js')
