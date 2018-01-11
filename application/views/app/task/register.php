<div class="container">
	<div class="my-3">
		<h2>Nova task</h2>
		<form action="<?= base_url('task/store')?>" method="post" enctype="multipart/form-data">
			<div class="form-group">
				<label for="code">Código</label>
				<input type="text" name="code" id="code" class="form-control" required="required">
				<label for="name">Nome</label>
				<input type="text" name="name" id="name" class="form-control" required="required">
				<label for="description">Descrição</label>
				<textarea name="description" id="description" rows="10" class="form-control"></textarea>
			</div>
			<div class="form-group">
				<label for="attachment">Anexo (Tamanho máximo de 20MB)</label>
				<input type="file" name="attachment" id="attachment" class="form-control">
			</div>
			<div class="form-group">
				<a href="<?= base_url('home')?>" class="btn btn-success">Voltar</a>
				<input type="submit" class="btn btn-primary" value="Cadastrar">
			</div>
		</form>
	</div>
</div>