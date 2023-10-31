<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-4">
                <div class="card">
                    <div class="card-body">
                        @if (session('success'))
                        <div 
                            style="color: green;
                                border: 2px green solid;
                                text-align: center;
                                padding: 5px;margin-bottom: 10px;">
                            Payment Successful!
                        </div>
                        @endif
                        <form id='checkout-form' method='post' action="{{url('/stripe/create-charge')}}">   
                            @csrf             
                            <label for="card-element" class="mb-5">Checkout Forms</label>
                            <br>
                            <div id="card-element" class="form-control" ></div>
                           

                            <input type='hidden' name='stripeToken' id='stripe-token-id'>   
                            <button id="customButton">Purchase</button>

{{-- <input type='hidden' name='stripeToken' id='stripe-token-id'> --}}


                            {{-- <button 
                                id='pay-btn'
                                class="btn btn-success mt-3"
                                type="button"
                                style="margin-top: 20px; width: 100%;padding: 7px;"
                                onclick="createToken()">PAY Now
                            </button> --}}
                        <form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    {{-- <form  method="POST"
        enctype="multipart/form-data" id="payment_form">
        @csrf
        <script src="https://checkout.stripe.com/checkout.js" class="stripe-button" data-key="{{ env('STRIPE_KEY') }}" data-description="stripe"
            data-amount="{{ intval(10* 100) }}" data-locale="auto"></script>
    </form> --}}



    <script src="https://checkout.stripe.com/checkout.js"></script>

{{-- <button id="customButton">Purchase</button>

<input type='hidden' name='stripeToken' id='stripe-token-id'> --}}

{{-- 
    <form action="." method="post">
        <noscript>You must <a href="http://www.enable-javascript.com" target="_blank">enable JavaScript</a> in your web browser in order to pay via Stripe.</noscript>

        <input 
            type="submit" 
            value="Pay with Card"
            data-key="{{ env('STRIPE_KEY') }}"
            data-amount="500"
            data-currency="cad"
            data-name="Example Company Inc"
            data-description="Stripe payment for $5"
        />

        <script src="https://checkout.stripe.com/v2/checkout.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
        <script>
        $(document).ready(function() {


            $(':submit').on('click', function(event) {
                event.preventDefault();

                var $button = $(this),
                    $form = $button.parents('form');

                var opts = $.extend({}, $button.data(), {
                    token: function(result) {
                        $form.append($('<input>').attr({ type: 'hidden', name: 'stripeToken', value: result.id })).submit();
                    }
                });

                StripeCheckout.open(opts);

                alert('alert');
            });

            
        });


        
        </script>
</form> --}}






 
    {{-- <script src="https://js.stripe.com/v3/"></script>
    <script>

        var stripe = Stripe('{{ env('STRIPE_KEY') }}');
        var elements = stripe.elements();
        var cardElement = elements.create('card');
        cardElement.mount('#card-element');
  
        function createToken() {
            document.getElementById("pay-btn").disabled = true;
            stripe.createToken(cardElement).then(function(result) {
                if(typeof result.error != 'undefined') {
                    document.getElementById("pay-btn").disabled = false;
                    alert(result.error.message);
                }
                // creating token success
                if(typeof result.token != 'undefined') {
                    document.getElementById("stripe-token-id").value = result.token.id;
                    document.getElementById('checkout-form').submit();
                }
            });
        }
    </script> --}}

<script>

var key = "{{ env('STRIPE_KEY') }}";
alert(key);
var handler = StripeCheckout.configure({
    key: "{{ env('STRIPE_KEY') }}",
    image: 'https://stripe.com/img/documentation/checkout/marketplace.png',
    locale: 'auto',
    token: function(token) {
        // Send the token in an AJAX request
        var xhr = new XMLHttpRequest();
        xhr.open('POST', '//httpbin.org/post');
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onload = function() {
            if (xhr.status === 200) {
                var resp = JSON.parse(xhr.responseText);
                console.log(resp);
                alert(resp.form.token);
                document.getElementById("stripe-token-id").value = resp.form.token;
                document.getElementById('checkout-form').submit();
            }
            else if (xhr.status !== 200) {
                alert('Request failed.  Returned status of ' + xhr.status);
            }
        };
        xhr.send(encodeURI('token=' + token.id));
    }
});

document.getElementById('customButton').addEventListener('click', function(e) {
  // Open Checkout with further options:
  handler.open({
    name: 'Stripe.com',
    description: '2 widgets',
    amount: 2000
  });
  e.preventDefault();
});

window.addEventListener('popstate', function() {
  handler.close();
});


</script>


</body>
</html>