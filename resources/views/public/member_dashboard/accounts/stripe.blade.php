@extends('public.member_dashboard.dashboard_master')

{{-- <link rel="stylesheet"
  href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"
  integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7"
  crossorigin="anonymous"> --}}

@section('member_content')

    <div class="row">
        <div class="col-md-12 content-area">
            <h2>Pay</h2>
            <hr>

            <div class="card">
                <div class="card-body">

                    @if (Session::has('success'))
                        <div class="alert alert-success text-center">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                            <p>{{ Session::get('success') }}</p>
                        </div>
                    @endif

                    <form
                        role="form"
                        action="{{ route('public.member.dashboard.payment.pay') }}"
                        method="post"
                        class="require-validation"
                        data-cc-on-file="false"
                        data-stripe-publishable-key="pk_test_51MZAk7K3M1ICasOWRuzGh50kkJvFykrY0KFFg7bZqjgc4CngP5cFNxv2vNyZDp9bnK9tOulX9MY2IN02DvXGLkFw00f7hDJj2N"
                        {{-- data-stripe-publishable-key="pk_live_51N2n1ZEnRyjljYPPWoRR6O3PO2WotinQYqA7UMTEfByzoSWCkiNQYt0sLqAgJi3eaX8hS2TNfMSSvvwKoZY3wCrY00PbVgyBne" --}}
                        id="payment-form"
                    >

                        @csrf

                            <div class="col-md-12">
                                <div class='form-group row'>
                                    <div class='col-xs-12 form-group required'>
                                        <label class='col-form-label'>Name on Card</label>
                                        <input class='form-control' size='4' type='text'>
                                    </div>
                                </div>

                                <div class='form-group row mt-3'>
                                    <div class='col-xs-12 form-group required'>
                                        <label class='col-form-label'>Card Number</label>
                                        <input autocomplete='off' class='form-control card-number' size='20' type='text'>
                                    </div>
                                </div>

                                <div class='form-group row mt-3'>
                                    <div class='col-xs-12 col-md-4 form-group cvc required'>
                                        <label class='col-form-label'>CVC</label>
                                        <input autocomplete='off' class='form-control card-cvc' placeholder='ex. 311' size='4' type='text'>
                                    </div>
                                    <div class='col-xs-12 col-md-4 form-group expiration required'>
                                        <label class='col-form-label'>Expiration Month</label>
                                        <input class='form-control card-expiry-month' placeholder='MM' size='2' type='text'>
                                    </div>
                                    <div class='col-xs-12 col-md-4 form-group expiration required'>
                                        <label class='col-form-label'>Expiration Year</label>
                                        <input class='form-control card-expiry-year' placeholder='YYYY' size='4' type='text'>
                                    </div>
                                </div>

                                <div class='form-group row mt-3'>
                                    <div class='col-md-12 errors form-group d-none'>
                                        <div class='alert-danger alert fs-15'>Please correct the errors and try again.</div>
                                    </div>
                                </div>

                                {{-- <input type="hidden" name="amount" value="{{ $data['amount'] }}" class="amount"> --}}
                                <input type="hidden" name="membership_id" value="{{ $data['membership_id'] }}" class="member-type">
                                <input type="hidden" name="note" value="{{ $data['note'] }}" class="note">

                                <div class="row mt-3 text-center">
                                    <div class="col-md-12">
                                        <button class="btn btn-success btn-lg btn-block" style="font-size: 16px;" type="submit">Pay (${{ $data['amount'] }})</button>
                                    </div>
                                </div>

                            </div>
                    </form>
                </div>
            </div>
            <!------------ End Div ---------->
        </div>
    </div>

@endsection

<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
<script src="https://code.jquery.com/jquery-1.12.3.min.js"
    integrity="sha256-aaODHAgvwQW1bFOGXMeX+pC4PZIPsvn2h1sArYOhgXQ="
    crossorigin="anonymous"></script>


<script type="text/javascript">

    $(function() {

        var $form = $(".require-validation");

        $('form.require-validation').bind('submit', function(e) {

            var $form     = $(".require-validation"),
            inputSelector = ['input[type=email]', 'input[type=password]',
                            'input[type=text]', 'input[type=file]',
                            'textarea'].join(', '),
            $inputs       = $form.find('.required').find(inputSelector),
            $errorMessage = $form.find('div.errors'),
            valid         = true;
            $errorMessage.addClass('d-none');

            $('.error').removeClass('error');
            $inputs.each(function(i, el) {
                var $input = $(el);
                if ($input.val() === '') {
                    $input.parent().addClass('error');
                    $errorMessage.removeClass('d-none');
                    e.preventDefault();
                }
            });

            if (!$form.data('cc-on-file')) {
                e.preventDefault();
                Stripe.setPublishableKey($form.data('stripe-publishable-key'));
                Stripe.createToken({
                    number: $('.card-number').val(),
                    cvc: $('.card-cvc').val(),
                    exp_month: $('.card-expiry-month').val(),
                    exp_year: $('.card-expiry-year').val()
            }, stripeResponseHandler);
        }

    });

    function stripeResponseHandler(status, response) {
            if (response.error) {
                $('.errors')
                    .removeClass('d-none')
                    .find('.alert')
                    .text(response.error.message);
            } else {
                /* token contains id, last4, and card type */

                var token = response['id'];

                var amount = $('.amount').val();
                var member_type = $('.member-type').val();
                var note = $('.note').val();

                $form.find('input[type=text]').empty();
                $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
                $form.get(0).submit();
            }
        }

    });
</script>
