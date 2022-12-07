
<section class="d-flex align-items-center">
	<div class="container">
	    <?php
	    	$qry = $qry = $conn->query("
				SELECT 
					p.*,c.name AS category 
				FROM 
					posts p 
				INNER JOIN 
					category c on c.id = p.category_id 
				WHERE 
					p.status = 1 AND p.category_id = '".$_GET['id']."'  
				ORDER BY date(p.date_published) DESC");

	    	if ($qry->num_rows > 0) :
	    		while($row=$qry->fetch_assoc()) : ?>
					<div class="card col-md-12 list-items" data-id="<?= $row['id'] ?>">
						<div class="card-body">
							<div class="row">
								<div class="col-md-4">
									<center>
										<img src="assets/img/<?= $row['img_path'] ?>" alt="" class='col-sm-10'>
									</center>
								</div>
								<div class="col-md-8 truncate">
									<h3><b><?= $row['title'] ?></b></h3>
									<p class="text-truncate">
										<?= html_entity_decode($row['post']) ?>
									</p>
								</div>
							</div>
						</div>
					</div>
				<?php endwhile; ?>
		<?php else : ?>
			<h2>Nenhum artigo publicado na categoria selecionada</h2>
		<?php endif; ?>
	</div>
</section>
<style type="text/css">
  	.list-items p {
  		text-align: left !important;
  	}
  	.list-items {
  		cursor: pointer;
  	}
  	.truncate {
  		max-height: 10vw;
  		overflow: hidden;
  	}
</style>
<script>
  	$(document).ready(function() {
  		$('.list-items').click(function(){
  			location.replace('index.php?page=preview_post&id='+$(this).attr('data-id'))
  		})
  	})
</script>
   