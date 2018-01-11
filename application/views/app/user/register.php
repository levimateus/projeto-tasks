<div class="container">
	<div class="my-3">
		<form action="<?= base_url('user/store')?>" method="POST">
			<h2>Cadastrar usuário</h2>
			<div class="form-group">
				<label for="name">Nome</label>
				<input type="text" name="name" id="name" size="64" class="form-control" placeholder="Digite seu nome" required="required">
				<label for="email">E-mail</label>
				<input type="email" name="email" id="email" size="64" class="form-control" placeholder="Digite seu email" required="required">
				<label for="password">Senha</label>
				<input type="password" name="password" id="password" class="form-control" placeholder="Defina uma senha" required="required">
			</div>
			<div class="form-group">
				<a href="<?= base_url('login')?>" class="btn btn-success">Voltar</a>
				<input type="submit" class="btn btn-primary" value="Enviar">
			</div>
		</form>
	</div>
</div>