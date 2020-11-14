@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 col-lg-12 col-sm-12 col-12">
                <p>You will be charged for $10 for this monthly subscription</p>
                <div class="card">
                    <form action="{{route('stripe.payment')}}" method="post" id="payment-form">@csrf
                        <div class="form-group">
                            <div class="card-header">
                                <label for="card-element">Enter Your Credit Card Information</label>
                            </div>
                            <div class="card-body">
                                <div id="card-element">

                                </div>
                                <div id="card-errors" role="alert"></div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-dark" type="submit">Pay</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop
@section('scripts')
    <script src="https://js.stripe.com/v3/"></script>
    <script type="text/javascript">

        //stripe publishable key
        var stripe = Stripe('pk_test_hXUZ4DOz6Bx5CdBWey9wfv7r002EPTSrbN');

        // creating insatnce of stripe
        var elements = stripe.elements();

        // custom styling for better design
        var style = {
            base: {
                color: '#32325d',
                lineHeight: '18px',
                fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
                fontSmoothing: 'antialiased',
                fontSize: '16px',
                '::placeholder': {
                    color: '#aab7c4'
                }
            },
            invalid: {
                color: '#fa755a',
                iconColor: '#fa755a'
            }
        };

        // creating instance for card
        var card = elements.create('card',{style:style});

        // Add an instance of card
        card.mount('#card-element');

        // Handling validations
        card.addEventListener('change',function (event){
            var displayerror = document.getElementById('card-errors');

            if (event.error)
            {
                displayerror.textContent = event.error.message;
            }
            else {
                displayerror.textContent = '';
            }
        });

        //handling form submissions
        var form = document.getElementById('payment-form');
        form.addEventListener('submit',function (event){
            event.preventDefault();

            stripe.createToken(card).then(function (result){
                if (result.error)
                {
                    var errorElement = document.getElementById('card-errors');
                    errorElement.textContent = result.error.message;
                }
                else{
                    //send token to the server
                    stripeTokenHandler(result.token);
                }
            });
        });

        //getting stripe token for source;
        function stripeTokenHandler(token)
        {
            var form = document.getElementById('payment-form');
            var hiddenInput = document.createElement('input');
            hiddenInput.setAttribute('type','hidden');
            hiddenInput.setAttribute('name','stripeToken');
            hiddenInput.setAttribute('value',token.id);
            form.appendChild(hiddenInput);

            //Submit the form
            form.submit();
        }


    </script>
@endsection
