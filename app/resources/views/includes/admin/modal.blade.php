<!-- modal d'ajout d'utilisateur -->
<div class="modal fade" id="addUserModal" tabindex="-1" role="dialog" aria-labelledby="addUserModal" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="loginModalTitle">Connectez-vous</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form method="POST" action="{{ config('app.url')}}/user/add">
					@csrf
					<h1>@lang('admin.userFormTitle')</h1>
					<div class="form-input">
						<label>id_gender</label> <input type="text" name="id_gender">
					</div>

					<div class="form-input">
						<label>first_name</label> <input type="text" name="first_name">
					</div>

					<div class="form-input">
						<label>last_name</label> <input type="text" name="last_name">
					</div>

					<div class="form-input">
						<label>email</label> <input type="text" name="email">
					</div>

					<div class="form-input">
						<label>phone</label> <input type="text" name="phone">
					</div>

					<div class="form-input">
						<label>password</label> <input type="text" name="password">
					</div>

					<div class="form-input">
						<label>id_address</label> <input type="text" name="id_address">
					</div>

					<div class="form-input">
						<label>id_profil</label> <input type="text" name="id_profil">
					</div>



					<div class="form-input">
						<label>rgpd_date</label> <input type="text" name="rgpd_date">
					</div>

					<div class="form-input">
						<label>newsletter</label> <input type="text" name="newsletter">
					</div>

					<!--<div class="form-input">
						<label>ip_address</label> <input type="text" name="ip_address">
					</div>
					<div class="form-input">
						<label>user_agent</label> <input type="text" name="user_agent">
					</div>-->

					<button type="submit">Submit</button>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
				<button type="button" id="loginModalFormSubmit" class="btn btn-primary">Connexion</button>
			</div>
		</div>
	</div>
</div>

<!-- modal d'edition d'utilisateur -->
<div class="modal fade" id="editUserModal" tabindex="-1" role="dialog" aria-labelledby="editUserModal" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">


	</div>
</div>
