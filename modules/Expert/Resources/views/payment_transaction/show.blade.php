
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">View Withdraw Request Detail</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>


            <div class="modal-body">

                <div class="text-center">

                    <div class="mt-3 mb-4">
                        <img class="rounded shadow-4-strong" style="max-width: 300px" alt="avatar2" src="{{ $expertWithdrawRequest?->expert?->profile_img ?? 'https://media.istockphoto.com/id/1309328823/photo/headshot-portrait-of-smiling-male-employee-in-office.jpg?b=1&s=612x612&w=0&k=20&c=eU56mZTN4ZXYDJ2SR2DFcQahxEnIl3CiqpP3SOQVbbI=' }}" />
                    </div>
                </div>
                <div class="table-responsive">

                    <table class="table dataTable table-striped table-bordered table-hover no-footer">
                        {{-- <tr><th title="SI" width="30" class="text-center sorting_disabled" rowspan="1" colspan="1" aria-label="SI" style="width: 30px;">SI</th><th title="Expert Photo" class="sorting" tabindex="0" aria-controls="expert-table" rowspan="1" colspan="1" style="width: 95px;" aria-label="Expert Photo: activate to sort column ascending">Expert Photo</th><th title="Withdrawal Code" class="sorting" tabindex="0" aria-controls="expert-table" rowspan="1" colspan="1" style="width: 127px;" aria-label="Withdrawal Code: activate to sort column ascending">Withdrawal Code</th><th title="Expert Name" class="sorting sorting_desc" tabindex="0" aria-controls="expert-table" rowspan="1" colspan="1" style="width: 94px;" aria-sort="descending" aria-label="Expert Name: activate to sort column ascending">Expert Name</th><th title="Request Amount" class="sorting" tabindex="0" aria-controls="expert-table" rowspan="1" colspan="1" style="width: 121px;" aria-label="Request Amount: activate to sort column ascending">Request Amount</th><th title="Request Date" class="sorting" tabindex="0" aria-controls="expert-table" rowspan="1" colspan="1" style="width: 98px;" aria-label="Request Date: activate to sort column ascending">Request Date</th><th title="Is Approve" class="sorting" tabindex="0" aria-controls="expert-table" rowspan="1" colspan="1" style="width: 78px;" aria-label="Is Approve: activate to sort column ascending">Is Approve</th><th title="Approve By" class="sorting" tabindex="0" aria-controls="expert-table" rowspan="1" colspan="1" style="width: 85px;" aria-label="Approve By: activate to sort column ascending">Approve By</th><th title="Approved Date" class="sorting" tabindex="0" aria-controls="expert-table" rowspan="1" colspan="1" style="width: 109px;" aria-label="Approved Date: activate to sort column ascending">Approved Date</th><th title="Card Type" class="sorting" tabindex="0" aria-controls="expert-table" rowspan="1" colspan="1" style="width: 73px;" aria-label="Card Type: activate to sort column ascending">Card Type</th><th title="Card Number" class="sorting" tabindex="0" aria-controls="expert-table" rowspan="1" colspan="1" style="width: 96px;" aria-label="Card Number: activate to sort column ascending">Card Number</th><th title="Valid Date" class="sorting" tabindex="0" aria-controls="expert-table" rowspan="1" colspan="1" style="width: 76px;" aria-label="Valid Date: activate to sort column ascending">Valid Date</th></tr> --}}
                        <tr>
                            <th>Withdrawal Code</th>
                            <td>{{ $expertWithdrawRequest->code }}</td>
                        </tr>
                        <tr>
                            <th>Expert Name</th>
                            <td>{{ $expertWithdrawRequest->expert?->full_name }}</td>
                        </tr>
                        <tr>
                            <th>Request Amount</th>
                            <td>{{ $expertWithdrawRequest->request_amount }}</td>
                        </tr>
                        <tr>
                            <th>Request Date</th>
                            <td>{{ $expertWithdrawRequest->request_date }}</td>
                        </tr>
                        <tr>
                            <th>Is Approve</th>
                            <td>{!! $expertWithdrawRequest->is_approve ? '<span class="badge bg-success">Approved</span>' : '<span class="badge bg-danger">Pending</span>';  !!}</td>
                        </tr>
                        <tr>
                            <th>Approve By</th>
                            <td>{{ $expertWithdrawRequest->approved_by?->name }}</td>
                        </tr>
                        <tr>
                            <th>Approved Date</th>
                            <td>{{ $expertWithdrawRequest->approved_date }}</td>
                        </tr>
                        <tr>
                            <th>Card Type</th>
                            <td>{{ $expertWithdrawRequest->card_type?->name }}</td>
                        </tr>
                        <tr>
                            <th>Card Number</th>
                            <td>{{ $expertWithdrawRequest->card_number }}</td>
                        </tr>
                        <tr>
                            <th>Valid Date</th>
                            <td>{{ $expertWithdrawRequest->valid_date }}</td>
                        </tr>

                    </table>
                </div>

            </div>
            <div class="d-print-none modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                {{-- <button class="btn btn-success" type="button" onclick="print($('#withdraw-request-modal'))">Print</button> --}}
            </div>
        </div>
    </div>





















