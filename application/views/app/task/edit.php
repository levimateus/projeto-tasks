<div class="container">
	<div class="my-3">
		<h2>Editar task</h2>
		<form action="<?= base_url('task/update')?>" method="post" enctype="multipart/form-data">
			<input type="hidden" name="id" value="<?=$task['id']?>">
			<input type="hidden" name="file_name" value="<?=$task['attached_file']?>">

			<div class="form-group">
				<label for="code">Código</label>
				<input type="text" name="code" id="code" class="form-control" required="required" value="<?=$task['code']?>">

				<label for="name">Nome</label>
				<input type="text" name="name" id="name" class="form-control" required="required" value="<?=$task['name']?>">

				<label for="description">Descrição</label>
				<textarea name="description" id="description" rows="10" class="form-control"><?=$task['description']?></textarea>
				<hr>

				<?php if (!empty($task['attached_file'])): ?>
					<a id="attachmentDownloadLink" href="<?=base_url('download/').$task['attached_file']?>" target="_blank">Fazer download do anexo</a>
				<?php endif ?>

				<div class="form-check">
					<input type="checkbox" class="form-check-input" id="attachmentEdit" name="attachment_edit">
					<label class="form-check-label" for="attachmentEdit">Excluir Anexo</label>
				</div>
			</div>

			<div class="form-group invisible" id="manageAttachment">
				<label for="attachment">Novo Anexo (Tamanho máximo de 20MB)</label>
				<input type="file" name="attachment" id="attachment" class="form-control">
			</div>

			<div class="form-group">
				<a href="<?= base_url('home')?>" class="btn btn-success">Voltar</a>
				<input type="submit" class="btn btn-primary" value="Atualizar">
			</div>
		</form>
	</div>
</div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4" crossorigin="anonymous"></script>
<script type="text/javascript" src="<?=base_url('assets/js/task/edit.js')?>"></script>
</body>
</html>

