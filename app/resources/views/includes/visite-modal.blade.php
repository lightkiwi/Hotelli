<div class="modal fade" id="loginModalCentered" tabindex="-1" role="dialog" aria-labelledby="loginModalCentered" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="loginModalTitle">Connectez-vous</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form id="loginModalForm" action="/login">
					<div class="form-group">
						<input type="email" class="form-control" id="loginModalFormEmail" aria-describedby="emailHelp" placeholder="email">
					</div>
					<div class="form-group">
						<input type="password" class="form-control" id="loginModalFormPassword" placeholder="Password">
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
				<button type="button" id="loginModalFormSubmit" class="btn btn-primary">Connexion</button>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="signinModalCentered" tabindex="-1" role="dialog" aria-labelledby="signinModalCentered" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="signinModalTitle">Créez un compte</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form id="signinModalForm">
					<label for="signinInputEmail">Informations Principales</label>
					<div class="form-row">
						<div class="form-group col-md-4">
							<input type="text" class="form-control" id="signinInputPrenom" placeholder="Prénom">
						</div>
						<div class="form-group col-md-4">
							<input type="text" class="form-control" id="signinInputNom" required="true" placeholder="Nom">
						</div>
						<div class="form-group col-md-4">
							<input type="password" class="form-control" id="signinInputPassword" required="true" placeholder="Password">
						</div>
					</div>
					<div class="form-row">
						<div class="form-group col-md-8">
							<input type="email" class="form-control" id="signinInputEmail" required="true" placeholder="Email">
						</div>
						<div class="form-group col-md-4">
							<input type="password" class="form-control" id="signinInputPasswordConf" required="true" placeholder="Password Confirm">
						</div>
					</div>
					<div class="form-group">
						<label for="signinInputAddress">Informations complémentaires</label>
						<input type="text" class="form-control" id="signinInputAddress" placeholder="1 avenue...">
					</div>
					<div class="form-row">
						<div class="form-group col-md-4">
							<input type="zip" class="form-control" id="signinInputZip" placeholder="Code Postal">
						</div>
						<div class="form-group col-md-4">
							<input type="text" class="form-control" id="signinInputCity" placeholder="Ville">
						</div>
						<div class="form-group col-md-4">
							<input type="tel" class="form-control" id="signinInputTel" placeholder="Téléphone">
						</div>
					</div>
					<div class="form-group">
						<div class="form-check">
							<input class="form-check-input" type="checkbox" required="true" id="gridCheck"/>
							<label class="form-check-label" for="gridCheck">
								J'accepte les <a>CGU</a> <span class="red">*</span>
							</label>
						</div>
						<div class="form-check">
							<input class="form-check-input" type="checkbox" id="gridCheck">
							<label class="form-check-label" for="gridCheck">
								Inscription à la newsletter
							</label>
						</div>
					</div>
					<div class="text-right">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
						<button type="button" id="signinModalFormSubmit" class="btn btn-primary">S'incrire</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>