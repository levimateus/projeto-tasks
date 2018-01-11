<div class="container my-3">
	<h1>Listando todas as Tasks</h1>
	<?php if (empty($tasks)): ?>
		<h4>
			Nenhuma Task cadastrada. 
			<a href="<?=base_url('task/register')?>">Seja o primeiro a cadastrar</a>
		</h4>
	<?php endif ?>
	<div class="m-3">
		<a href="<?=base_url('task/register')?>" class="btn btn-success">Criar Nova Task</a>
	</div>
	<?php foreach ($tasks as $task): ?>
		<div class="card mb-3">
			<div class="card-body">
				<h2 class="card-title"><?=$task['name']?></h2>
				<p class="card-text"><?=$task['description']?></p>
				<p class="card-text">Autor: <?=$task['user_name']?></p>
				<?php if (!empty($task['attached_file'])): ?>
					<hr>
					<p class="card-text"><a href="<?=base_url('download/').$task['attached_file']?>" target="_blank">Fazer download do anexo</a></p>	
				<?php endif ?>
			</div>
		</div>
	<?php endforeach ?>
	
</div>