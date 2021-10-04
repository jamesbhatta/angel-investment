@extends('layouts.app')

@section('content')
@php
$updateMode = isset($updateMode) ? $updateMode : false
@endphp
<div class="pitchSlideShow">
    @include('pitch.wizard-head', ['step' => 5])
</div>
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="offset-2 offset-sm-1 col-md-10 col-sm-8">
            @error('payment')
            <div class="alert alert-danger">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="offset-1 offset-md-2 offset-sm-1 col-sm-8 col-9 col-md-5 mb-5">
            <div class="card">
                <div class="card-body">
                    <h5 class="h5-responsive"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
                            <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                        </svg> <span class="font-weight-bold">Cart Summay</span></h5>
                    <hr>
                    <div class="d-flex">
                        <div>
                            <strong>{{ $packageName }} Package</strong>
                            <div>
                                {{ $pitch->title }}
                            </div>
                        </div>
                        <div class="ms-auto">
                            <strong>{{ priceUnit() }}{{ $amount }}</strong>
                        </div>
                    </div>
                    <hr>
                    <div class="d-flex">
                        <div>Total</div>
                        <strong class="ms-auto">{{ priceUnit() }}{{ $amount }}</strong>
                    </div>
                </div>
            </div>
        </div>
        <div class=" offset-1 offset-md-0 offset-sm-1 col-sm-8 col-9 col-md-5">
            <div class="card bg-light">
                <div class="card-body p-md-5">
                    <p>
                        Okay, first, let's add a credit card to your account. Don't worry — your private card number will never touch our servers.
                    </p>

                    <form id="payment-form" action="/charge/{{ $pitch->id }}" method="POST">
                        @csrf
                        <input type="hidden" name="package_id" value="{{ $pitch->package_id }}">

                        <div class="mb-3">
                            <label for="card-holder-name" class="form-label">Card holder's name</label>
                            <input id="card-holder-name" name="billing_name" type="text" class="form-control py-2" placeholder="Card holder's name" value="{{ old('name', auth()->user()->name) }}">
                        </div>

                        <div class="mb-3">
                            <label for="card-element" class="form-label">Credit or debit card</label>
                            <!-- Stripe Elements Placeholder -->
                            <div id="card-element" class="form-control p-2 py-3"></div>
                        </div>

                        <button id="card-button" type="submit" class="btn btn-dark">
                            Pay {{ priceUnit() }}{{ $amount }}
                        </button>
                    </form>

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

        const stripe = Stripe("{{ config('cashier.key') }}");

        const elements = stripe.elements();
        const cardElement = elements.create('card');

        var style = {
            base: {
                color: '#32325d',
                lineHeight: '18px',
                fontFamily: '"Roboto", Helvetica Neue", Helvetica, sans-serif',
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

        cardElement.mount('#card-element', {
            style: style,
            hidePostalCode: true
        });
        const cardHolderName = document.getElementById('card-holder-name');
        const cardButton = document.getElementById('card-button');

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
                    // TODO::show error to user
                    console.log('Create Payment Error.');
                    console.log(result)
                }
            });
        });

        function handlePayment(paymentMethod) {
            var form = document.getElementById('payment-form');
            var hiddenInput = document.createElement('input');
            hiddenInput.setAttribute('type', 'hidden');
            hiddenInput.setAttribute('name', 'payment_method');
            hiddenInput.setAttribute('value', paymentMethod.paymentMethod.id);
            form.appendChild(hiddenInput);
            form.submit();

            // axios
            //     .post("/charge", {
            //         paymentMethod: paymentMethod
            //     })
            //     .then((response) => {
            //         console.log(response);
            //     })
            //     .catch((error) => {
            //         console.log(error);
            //     });
        }

    });
</script>
@endpush
