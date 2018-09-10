@extends('layouts.visite')

@section('title')
@lang('auth.register')
@stop

@section('content')
<div class="opacity-article position-relative overflow-hidden p-4">
	<div class="col-md-8 mx-auto my-5">
		<div class="card">
			<div class="card-header text-capitalize">@lang('auth.register')</div>

			<div class="card-body">
				<form method="POST" action="{{ route('register') }}" aria-label="@lang('auth.register')">
					@csrf

					<label for="signinInputEmail">@lang('auth.primary')</label>
					<div class="form-row">
						<div class="form-group col-md-4">
							<input type="text" class="form-control" id="signinInputPrenom" name="first_name" placeholder="Prénom">
						</div>
						<div class="form-group col-md-4">
							<input type="text" class="form-control" id="signinInputNom" name="last_name" placeholder="Nom" required>
						</div>
						<div class="form-group col-md-4">
							<input type="password" class="form-control" id="signinInputPassword" name="password" required="true" placeholder="Password">
						</div>
					</div>
					<div class="form-row">
						<div class="form-group col-md-8">
							<input type="email" class="form-control" id="signinInputEmail" name="email" required placeholder="Email">
						</div>
						<!--	<div class="form-group col-md-4">
							<input type="password" class="form-control" id="signinInputPasswordConf" name="password" required placeholder="Password Confirm">
						</div>-->
					</div>
					<div class="form-group">
						<label for="signinInputAddress">@lang('auth.complementary')</label>
						<input type="text" class="form-control" name="adress" placeholder="1 avenue...">
					</div>
					<div class="form-row">
						<div class="form-group col-md-4">
							<input type="zip" class="form-control" name="cp" placeholder="Code Postal">
						</div>
						<div class="form-group col-md-4">
							<input type="text" class="form-control" name="ville" placeholder="Ville">
						</div>
						<div class="form-group col-md-4">
							<input type="tel" class="form-control" name="tel" placeholder="Téléphone">
						</div>
					</div>
					<div class="form-group">
						<div class="form-check">
							<input class="form-check-input" type="checkbox" required name="cguCheck"/>
							<label class="form-check-label" for="cguCheck">
								@lang('auth.cgu_accept')&nbsp;<a href="/cgu" target="_blank">@lang('auth.cgu_detail')</a> <span class="red">*</span>
							</label>
						</div>
						<div class="form-check">
							<input class="form-check-input" type="checkbox" name="newsCheck" value="t">
							<label class="form-check-label" for="newsCheck">
								@lang('auth.newsletter')
							</label>
						</div>
					</div>

					<div class="form-group">
						<button type="submit" class="btn btn-primary float-right">
							@lang('auth.register')
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection
