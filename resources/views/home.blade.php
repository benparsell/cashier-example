@extends('layouts.app')


@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    You are logged in!
                </div>
            </div>
			<div class="panel panel-default">
				<div class="panel-heading">Subscribe</div>
				<div class="panel-body">
					 <form action="subscribe" method="POST" id="subscribe-form">

						{!! csrf_field() !!}

						

						{{-- subscription info --}}
						<div class="section-header">
							<h2>Subscription Info</h2>
						</div>

						<div class="form-group">
							<div class="row">
								<div class="col-xs-4">
									
									<div class="subscription-option">
										<input type="radio" id="plan-bronze" name="plan" value="main" checked>
										<label for="plan-bronze">
											<span class="plan-price">$5 <small>/mo</small></span>
											<span class="plan-name">Main</span>
										</label>
									</div>

								</div>
								<div class="col-xs-4">
									
									<div class="subscription-option">
										<input type="radio" id="plan-silver" name="plan" value="silver">
										<label for="plan-silver">
											<span class="plan-price">$10 <small>/mo</small></span>
											<span class="plan-name">Silver</span>
										</label>
									</div>

								</div>
								<div class="col-xs-4">
									
									<div class="subscription-option">
										<input type="radio" id="plan-gold" name="plan" value="gold">
										<label for="plan-gold">
											<span class="plan-price">$15 <small>/mo</small></span>
											<span class="plan-name">Gold</span>
										</label>
									</div>

								</div>
							</div>
						</div>

						{{-- credit card info --}}
						<div class="section-header">
							<h2>Credit Card Info</h2>
						</div>
						
						<div class="form-group row">
							{{-- credit card number --}}
							<div class="col-xs-8">
								<label>Credit Card Number</label>
								<input type="text" class="form-control" placeholder="4242 4242 4242 4242" data-stripe="number">
							</div>

							{{-- cvc --}}
							<div class="col-xs-4">
								<label>CVC</label>
								<input type="text" class="form-control" placeholder="123" data-stripe="cvc">
							</div>
						</div>

						<div class="form-group row">

							{{-- exp month --}}
							<div class="col-xs-3">
								<label>Expiration Month</label>
								<input type="text" class="form-control" placeholder="08" data-stripe="exp-month">
							</div>

							{{-- exp year --}}
							<div class="col-xs-3">
								<label>Expiration Year</label>
								<input type="text" class="form-control" placeholder="2020" data-stripe="exp-year">
							</div>
						</div>        

						<div class="stripe-errors"></div>

						@if (count($errors) > 0)
						<div class="alert alert-danger">
							@foreach ($errors->all() as $error)
								{{ $error }}<br>
							@endforeach
						</div>
						@endif

						<div class="form-group text-center">
							<button type="submit" class="btn btn-lg btn-success btn-block">Join</button>
						</div>

					</form>
				</div>
			</div>
        </div>
    </div>
</div>
<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
    <script>
        Stripe.setPublishableKey("{{ env('STRIPE_KEY') }}");
    </script>
@endsection
