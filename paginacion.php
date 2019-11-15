	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/Footer-with-button-logo.css">

<?php $total_pag = num_paginas($num_tickets,$ticketporhoja);?>
<div class="container">
	<div class="row">
		<div class="col-lg-6 offset-lg-3 py-5">
			<nav aria-label="...">
				<ul class="pagination mx-auto">

					<?php if ( pagina_actual() === 1): ?>
						<li class="page-item disabled mx-auto"><a class="page-link" href="">Anterior</a></li>
					<?php else: ?>
						<li class="page-item"><a class="page-link" href="index.php?p=<?php echo pagina_actual() -1 ?>">Anterior</a></li>
					<?php endif; ?>

					<?php for ($i=1;$i<=$total_pag; $i++): ?>
						<?php if (pagina_actual() === $i): ?>
							<li class="page-item"><a class="page-link" href=""><?php echo $i; ?></a></li>
						<?php else: ?>
							<li class="page-item active"><a class="page-link" class="page-link" href="index.php?p=<?php echo $i; ?>"><?php echo $i; ?></a></li>
						<?php endif; ?>
					<?php endfor; ?>

					<?php if (pagina_actual() >= $total_pag): ?>
						<li class="page-item disabled mx-auto"><a class="page-link" href="">Siguiente</a></li>
					<?php else: ?>
					<li class="page-item"><a class="page-link" href="index.php?p=<?php echo pagina_actual() +1 ?>">Siguiente</a></li>
					<?php endif; ?>
				</ul>
			</nav>
		</div>
	</div>
</div>



