<nav class="navbar navbar-expand-lg navbar-light bg-light">
	<a class="navbar-brand ml-2" href="<?= base_url('home')?>">Tasks</a>
	<button class="navbar-toggler" type="button" data-dottle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aira-label="Toggle navigation">]
		<span class="navbar-toggler-icon"></span>
	</button>

	<div class="collapsed navbar-collapse justify-content-between" id="navbarSupportedContent">
		<ul class="navbar-nav mr-auto ml-3">
			<li class="nav-item"><a class="nav-link" href="<?= base_url('task/register')?>">Criar Task</a></li>
			<li class="nav-item"><a class="nav-link" href="<?= base_url('task/usertasks')?>">Minhas tasks</a></li>
		</ul>
		
		<ul class="navbar-nav ml-auto mr-2">
			<li>
				<span class="navbar-text mr-3">
			    	<?=$_SESSION['name']?>
			  	</span>
			</li>
			<li class="nav-item"><a class="nav-link" href="<?= base_url('logout')?>">Sair</a></li>
		</ul>
	</div>
</nav>