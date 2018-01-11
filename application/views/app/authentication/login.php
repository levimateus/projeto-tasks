<div class="container my-3">
	<div class="mx-auto mt-5" style="max-width: 340px">
		<h2 class="text-center mb-4">Gerenciador de Tasks</h2>
		<div class="card">
			<div class="card-body">
				<?php if (isset($_GET['fail'])): ?>
					<p class="text-danger text-center">Usuário ou senha errados</p>
				<?php endif ?>
				<form action="<?= base_url('authenticate')?>" method="post">
					<div class="form-group">
						<label for="email">Login</label>
						<input type="email" name="email" id="email" class="form-control" placeholder="Digite seu e-mail" required="required">
						<label for="password">Senha</label>
						<input type="password" name="password" id="password" class="form-control" placeholder="Digite sua senha" required="required">
					</div>
					<hr>
					<div class="form-group">
						<input type="submit" class="btn btn-primary btn-block" value="Entrar">
						<a href="<?= base_url('user/register')?>">Cadastre-se</a>
					</div>
				</form>
			</div>
			
		</div>
	</div>
		
	
	
</div>