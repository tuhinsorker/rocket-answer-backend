<!-- Modal -->
<div class="modal fade" id="invoice-{{ $invoice->id }}" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Subscription Invoice Details</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <div class="modal-body row">


                <div class="col-12">

                    <div class="card card-body p-5" id="print-table">

                       

                        <table style="width: 100%;">
                                <tbody>
                                    <tr>
                                    <td>
                                        <h6 class="text-uppercase text-muted fs-12 fw-semi-bold">Invoiced from</h6>
                                        <p class="text-muted mb-4">
                                            <strong class="text-body fs-16">{{ setting('contact.phn') }}</strong>
                                            <br/>{{setting('contact.email') }} <br/>
                                            {!! setting('contact.phn') !!}
                                        </p>
                                        <h6 class="text-uppercase text-muted fs-12 fw-semi-bold">Invoiced ID</h6>
                                        <p class="mb-4">{{ $invoice->invoice_id }}</p>
                                    </td>

                                    <td class="text-end">
                                        <h6 class="text-uppercase text-muted fs-12 fw-semi-bold">Invoiced to</h6>
                                        <p class="text-muted mb-4">
                                            <strong class="text-body fs-16">{{ dataPrint($invoice->customer,'name') }}</strong>
                                            <br>Email : {{ dataPrint($invoice->customer,'email') }} <br/>
                                            Phone : {{ dataPrint($invoice->customer,'phone') }} <br/>
                                            {!! dataPrint($invoice->customer,'address') !!}
                                        </p>
                                        {{-- <h6 class="text-uppercase text-muted fs-12 fw-semi-bold"> Due date</h6>
                                        <p class="mb-4"><time datetime="2018-04-23">Apr 23, 2018</time></p> --}}
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                        {{-- <div class="table-responsive-sm">
                            <table class="table table-striped">

                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Module name</th>
                                    </tr>
                                </thead>


                                <tbody>
                                    @foreach($invoice->modules as $key => $module)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td><div >{{ ucwords($module->name) }}</div></td>
                                    </tr>
                                   @endforeach
                                </tbody>
                            </table>
                        </div> --}}


                        <table class="table table-clear" style="width: 100%; display:flex; justify-content: end; ">
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

                    </div>
                </div>
        </div>


        <div class="modal-footer">
            <button type="button" id="btn" class="btn btn-success me-2" value="Print Invoice" onclick="printContent('print-table')">
                <i class="typcn typcn-printer me-1"></i>Print Invoice
            </button>

          <button type="button" class="btn btn-danger " data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

