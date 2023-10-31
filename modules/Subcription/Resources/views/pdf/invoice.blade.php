<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="author" content="roket-answer" />
    <title>invoice</title>
    <!-- <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;600;700;900&family=Raleway:wght@300;400;500;600;700;800&family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet" /> -->

    <style>
      body {
        margin: 0;
        padding: 0;
        font-family: "Lato", sans-serif;
      }

      * {
        box-sizing: border-box;
        -moz-box-sizing: border-box;
      }

      table th {
        font-size: 17px;
        font-weight: 600;
        padding: 7px 15px;
      }

      table td {
        font-size: 15px;
        font-weight: 600;
        padding: 7px 15px;
      }

      .top-table tr {
        background-color: #e0e0e0;
      }

      .main-table tr:nth-child(odd) {
        background-color: #e0e0e0 !important;
      }

      .main-table tr:nth-child(even) {
        background-color: #f4f4f4 !important;
      }

      .main-table thead th {
        background-color: #6f7377;
        color: #fff;
        text-align: start;
      }
      .footer-table {
        width: 60%;
        float: right;
      }

      .footer-table tr th:nth-child(odd) {
        background-color: #e0e0e0 !important;
      }

      .footer-table tr td:nth-child(even) {
        background-color: #f4f4f4 !important;
      }
      @page {
        size: A4;
        margin: 0;
      }

      @media print {
        html,
        body {
          width: 210mm;
        }
        @page {
          size: A4;
          margin: 25px 0px;
        }
        .page-no {
          opacity: 1;
        }
      }
    </style>
  </head>

  <body>
    {{-- <div style="margin-bottom: 30px">
      <button type="submit" onclick="myFunction()">Print</button>
    </div> --}}
    <div id="parentContent" style="width: 198mm; height: 240mm; margin: 10px auto 10px; position: relative; background-color: #fff; -webkit-border-radius: 3px; -moz-border-radius: 3px; border-radius: 3px; -webkit-box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24); -moz-box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24); box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24); -webkit-print-color-adjust: exact">
      <!-- start hearder section  -->
      <div style="padding: 0px 50px; padding-top: 30px">
        <div style="display: flex; justify-content: space-between; align-items: center; border-bottom-left-radius: 15px; border-bottom-right-radius: 15px">
          <!-- <h2 style="font-size: 43px; margin-top: 0px; margin-bottom: 0px">Invoice</h2> -->
          <img src="{{  setting('site.logo_black',admin_asset('img/logo-light.png'),true)}}" alt="" />
        </div>
      </div>

      <div style="padding: 10px 50px; margin-top: 18px">
        <div style="display: flex; justify-content: space-between; align-items: center; border-bottom-left-radius: 15px; border-bottom-right-radius: 15px">
          <h2 style="font-size: 20px; margin-top: 0px; margin-bottom: 0px">Invoice No: {{$invoice->invoice_id}}</h2>
          <h2 style="font-size: 20px; margin-top: 0px; margin-bottom: 0px">Date:{{$invoice->invoice_date}}</h2>
        </div>
      </div>
      <!-- end hearder section  -->

      <!-- start name and iformation section -->
      <div style="display: flex; justify-content: space-between; padding: 10px 50px; align-items: center">
        <div>
          <h6 style="font-size: 15px; font-weight: 500; margin: 0px; padding-bottom: 15px">Invoice To:</h6>
          <h2 style="font-size: 22px; margin: 0px; color: #0a3f76">{{ dataPrint($invoice->customer,'name') }}</h2>
          <p style="margin-top: 5px; margin-bottom: 5px">{{ dataPrint($invoice->customer,'phone') }}</p>
          <p style="margin-top: 5px; margin-bottom: 5px">{{ dataPrint($invoice->customer,'email') }}</p>
          <p style="margin-top: 5px; margin-bottom: 5px">{!! dataPrint($invoice->customer,'address') !!}</p>
        </div>
        <div>
          <h6 style="font-size: 15px; font-weight: 500; margin: 0px; padding-bottom: 15px">Invoice From:</h6>
          <h2 style="font-size: 22px; margin: 0px; color: #0a3f76">Roket Answer</h2>
          <p style="margin-top: 5px; margin-bottom: 5px">{{setting('contact.phn')}}</p>
          <p style="margin-top: 5px; margin-bottom: 5px">{{setting('contact.email')}}</p>
          <p style="margin-top: 5px; margin-bottom: 5px">{{setting('contact.address')}}</p>
        </div>
      </div>
      <!-- end name and iformation section -->

      <!-- start item section -->
      <div style="padding: 10px 50px">
        <table class="main-table" style="width: 100%">
          <thead>
            <tr>
              <th>Subscription Package</th>
              <th>Type</th>
              <th>Day</th>
              <th>Amount</th>
            </tr>
          </thead>

          <tbody>
            <tr>
              <td>{{@$invoice?->category?->name}}</td>
              <td>trial</td>
              <td></td>
              <td>{{@$invoice->trial_price}}</td>
            </tr>
            
          </tbody>
        </table>
      </div>
      <!-- end item section -->

      <!-- start grand total table -->
      <div style="padding: 10px 50px">
        <table class="footer-table">
          <tr>
            <th>Grand Total</th>
            <td>{{@$invoice->trial_price}}</td>
          </tr>
        </table>
      </div>
      <!-- end grand total table -->


      <!-- start hearder section  -->
      <div style="padding: 0px 50px; position: absolute; bottom: 0; width: 100%">
        <div style="margin-bottom: 50px; padding: 0px 15px">
          <h2 style="font-size: 22px; margin: 0px; color: #eb6a3d">Condation:</h2>
          <p style="margin-top: 5px; margin-bottom: 5px; font-size: 20px">You have successfully subscribe for <span>{{@$invoice?->category?->name}} </span>package by joining. Your next  bill of <span>{{$invoice?->category?->name}}</span> package will be active by <span>{{@$invoice->recurring_price}}</span> from <span>this {{@$invoice->recurring_invoice_date}}</span>. It will be automatic Subscription.You can cancle anytime</p>
        </div>
        <div style="display: flex; justify-content: space-between; padding: 15px 15px; align-items: center; border-top-left-radius: 15px; border-top-right-radius: 15px">
          <p style="font-size: 19px; font-weight: 600; margin-top: 10px; margin-bottom: 10px">roket-answer.com</p>
          <p style="font-size: 19px; font-weight: 600; margin-top: 10px; margin-bottom: 10px">+0193242389</p>
        </div>
      </div>
      <!-- end hearder section  -->


    </div>

    <script>
      function myFunction() {
        var printContents = document.getElementById("parentContent").innerHTML;
        var originalContents = document.body.innerHTML;
        document.body.innerHTML = printContents;
        window.print();
      }
    </script>
  </body>
</html>
