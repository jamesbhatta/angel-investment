@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card bg-light">
                <div class="card-body p-md-5">
                    {{-- <payment-form></payment-form> --}}

                    <p>
                        Want full access to the Laracasts catalog? Okay, first, let's add a credit card to your account. Don't worry — your private card number will never touch our servers.
                    </p>

                    <div class="mb-3">
                        <label for="card-holder-name" class="form-label">Card holder's name</label>
                        <input id="card-holder-name" type="text" class="form-control py-2" placeholder="Card holder's name" value="{{ old('name', auth()->user()->name) }}">
                    </div>

                    <div class="mb-3">
                        <label for="card-element" class="form-label">Credit or debit card</label>
                        <!-- Stripe Elements Placeholder -->
                        <div id="card-element" class="form-control p-2 py-3"></div>
                    </div>

                    <button id="card-button" type="submit" class="btn btn-dark">
                        Process Payment
                    </button>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection


@push('scripts')
<script src="https://js.stripe.com/v3/"></script>

<script>
    $(function() {

        const stripe = Stripe('pk_test_51JY4kCEKrW0pMCb3rmvDk384KNaT3QLf9RtuUFef8sEKZLEYTjWhDuTnasbYOLDBty2QqEzwsOVxmvsc2h5ejAvO00hxO5UiPR');

        const elements = stripe.elements();
        const cardElement = elements.create('card');

        var style = {
            base: {
                color: '#32325d'
                , lineHeight: '18px'
                , fontFamily: '"Roboto", Helvetica Neue", Helvetica, sans-serif'
                , fontSmoothing: 'antialiased'
                , fontSize: '16px'
                , '::placeholder': {
                    color: '#aab7c4'
                }
            }
            , invalid: {
                color: '#fa755a'
                , iconColor: '#fa755a'
            }
        };

        cardElement.mount('#card-element', {
            style: style
            , hidePostalCode: true
        });
        const cardHolderName = document.getElementById('card-holder-name');
        const cardButton = document.getElementById('card-button');

        // cardButton.addEventListener('click', async (e) => {

        $('#card-button').click(function(e) {
            e.preventDefault();
            console.log('clicked');
            stripe.createPaymentMethod(
                'card', cardElement, {
                    billing_details: {
                        name: cardHolderName.value
                    }
                }
            ).then(function(result) {
                if (result.paymentMethod) {
                    handlePayment(result);
                } else {
                    console.log('Error');
                    console.log(result)
                }
            });
        });
        // });

        function handlePayment(paymentMethod) {
            axios
                .post("/charge", {
                    paymentMethod: paymentMethod
                })
                .then((response) => {
                    console.log(response);
                })
                .catch((error) => {
                    console.log(error);
                });
        }

    });

</script>
@endpush
