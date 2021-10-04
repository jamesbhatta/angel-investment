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

            @error('payment_method_nonce')
            <div class="alert alert-danger">
                Please fill up the payment information.
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
                        <div id="dropin-container"></div>
                        <input type="hidden" id="nonce" name="payment_method_nonce" value="nonce" />
                        <div class="text-center mt-3">
                            <button id="submit-btn" type="submit" class="btn btn-dark px-5 d-none">
                                <span>Pay {{ priceUnit() }}{{ $amount }}</span>
                                <span class="spinner-border spinner-border-sm text-white ms-2 d-none"></span>
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection


@push('scripts')
<script src="https://js.braintreegateway.com/web/dropin/1.31.2/js/dropin.min.js"></script>
<script>
<<<<<<< HEAD
    window.addEventListener('load', function() {
        var submitButton = document.getElementById('submit-btn');
        const form = document.getElementById('payment-form');

        braintree.dropin.create({
            authorization: '{{ $token }}'
            , container: '#dropin-container'
        }).then((dropinInstance) => {
            submitButton.classList.remove('d-none');
            form.addEventListener('submit', (event) => {
                event.preventDefault();
                submitButton.setAttribute('disabled', 'true');
                submitButton.children[1].classList.remove('d-none');
                console.log('processing');

                dropinInstance.requestPaymentMethod().then((payload) => {
                    console.log(payload);
                    document.getElementById('nonce').value = payload.nonce;
                    form.submit();
                }).catch((error) => {
                    bringBackSubmitButton();
                    throw error;
                });
=======
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
>>>>>>> 8857c81caa52285a114974706eebaaa1efd683bd
            });
        }).catch((error) => {
            console.log(error);
            // handle errors
            bringBackSubmitButton();
        });

        function bringBackSubmitButton() {
            submitButton.removeAttribute('disabled');
            submitButton.children[1].classList.add('d-none');
        }

    });
</script>
@endpush
