<div class="container my-3">
	<h1 class="mb-4">Minhas Tasks</h1>
	<div class="m-3">
		<a href="<?=base_url('task/register')?>" class="btn btn-success">Criar Nova Task</a>
	</div>
	<?php if (empty($tasks)): ?>
		<h4>
			Nenhuma Task cadastrada. 
		</h4>
	<?php endif ?>
	<?php foreach ($tasks as $task): ?>
		<div class="card mb-3">
			<div class="card-body">
				<h2 class="card-title"><?=$task['name']?></h2>
				<p class="card-text"><?=$task['description']?></p>
				<?php if (!empty($task['attached_file'])): ?>
					<hr>
					<p class="card-text"><a href="<?=base_url('download/').$task['attached_file']?>" target="_blank">Fazer download do anexo</a></p>
				<?php endif ?>
				<hr>
				<form method="post">
					<input type="hidden" name="id" value="<?=$task['id']?>">
					<input type="submit" value="Editar" class="btn btn-warning" formaction="<?=base_url('task/edit')?>">
					<input type="submit" value="Excluir" class="btn btn-danger" formaction="<?=base_url('task/delete')?>">
				</form>
			</div>
		</div>
	<?php endforeach ?>
	
</div>