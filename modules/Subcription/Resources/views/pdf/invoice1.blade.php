<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>customer Invoice</title>


	<style>
	
		body {
			margin: 0;
			font-family: 'Roboto', sans-serif;
			background-color: #fff;
		}

		.mt-0 {
			margin-top: 0;
		}

		.d-block {
			display: block;
		}

		.text-right {
			text-align: right
		}

		.text-center {
			text-align: center
		}

		.text-completed {
			color: #32ba7c;
			font-weight: 600;
		}

		.bg_grey {
			background-color: #efefef !important;
		}

		.table {
			width: 100%;
			margin-bottom: 1rem;
			color: #212529;
		}

		.table-bordered {
			border: 1px solid #eeeeee;
			border-spacing: 0;
		}

		.table td,
		.table th {
			padding: 5px 18px;
		}

		.table-bordered td,
		.table-bordered th {
			border: 1px solid #8d8d8d;
		}

		.table thead th {
			border-bottom: 1px solid #bababa;
		}

	</style>

</head>

<body>


	<div style="max-width: 980px;margin: 50px auto;">

		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="card" style="border: 1px solid #9f9f9f; overflow: hidden; padding: 50px; position: relative">
						{{-- <div style="position: absolute;padding-top: 25px; padding-bottom: 25px; text-transform: uppercase; text-align: center;background-color: #2fab2b!important; font-weight: 700; right: -150px; top: 30px; min-width: 500px; font-size: 28px; transform: rotate(32deg); border: 4px solid #2ee535; color: #fff">Paid</div> --}}
						<div class="align-items-center d-flex justify-content-between mb-5">
							<div class="d-block">
								<img src="" alt="">
							</div>
						</div>
						
						<div class="d-block mb-4" style="margin-bottom: 20px">
							<div class="d-block text-right" style="margin-top: 70px">
								<h4 style="margin-top: 5px; margin-bottom: 5px">{{ setting('contact.phn') }}</h4>
								<h5 style="margin-top: 5px; margin-bottom: 5px; font-size: 15px; font-weight: 400">{{setting('contact.email') }}</h5>
								<h5 style="margin-top: 5px; margin-bottom: 5px; font-size: 15px; font-weight: 400">{!! setting('contact.phn') !!}</h5>
							</div>
						</div>

						<div class="d-block p-4" style="background: #efefef; padding: 25px; margin-bottom: 30px">
							<h4 style="margin-top: 0; margin-bottom: 10px; font-size: 22px">Invoice #{{$invoice->invoice_id}}</h4>
							<p style="margin-bottom: 0; margin-top: 5px">Invoice Date: {{$invoice->invoice_date}}</p>
						</div>
                        
						<div class="d-block my-5" style="margin-top: 25px; margin-bottom: 25px">
							<h5 style="font-size: 18px; margin-bottom: 8px">Invoiced To</h5>
							{{ dataPrint($invoice->customer,'name') }} <br>
							{{ dataPrint($invoice->customer,'email') }}<br/>
							{{ dataPrint($invoice->customer,'phone') }}<br/>
							{!! dataPrint($invoice->customer,'address') !!}
						</div>

						<hr>
                      

                        <table class="table table-border" style="width: 100%; justify-content: end; ">
                            <tbody>

								<tr>
                                    <td>
                                        <strong>Trial Day</strong>
                                    </td>
                                    <td>{{ $invoice->trial_day }} </td>
                                </tr>
                                <tr>
                                    <td>
                                        <strong>Trial Price</strong>
                                    </td>
                                    <td>{{ $invoice->trial_price }} </td>
                                </tr>
                            

                                <tr>
                                    <td>
                                        <strong>Recurring Day</strong>
                                    </td>
                                    <td>{{ $invoice->recurring_day }}</td>
                                </tr>
                                <tr>
                                    <td>
                                        <strong>Recurring Price</strong>
                                    </td>
                                    <td>{{ $invoice->recurring_price }}</td>
                                </tr>

                                <tr>
                                    <td>
                                        <strong>Payment Status</strong>
                                    </td>
                                    <td>
                                        @if($invoice->status == 0)
                                                            <span class="badge bg-warning pending">Pending</span>
                                        @elseif($invoice->status == 1)
                                            <span class="badge bg-success complete">Complete</span>
                                        @elseif($invoice->status == 2)
                                            <span class="badge bg-danger">Incomplete</span>
                                        @endif
                                    </td>
                                </tr>

                            </tbody>
                        </table>

						<div class="text-center">
							<p class="mb-0">PDF Generated on {{date('Y-m-d')}}</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

</body>
