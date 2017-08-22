<?php include('view/header.php'); ?>

<?php
if ($_SESSION['hotels'] == null)
{
	$_SESSION['hotels'] = $arg;
}

?>

<div class="container">
	<div class="starter-template">
		<h1>Bootstrap starter template</h1>
		<p class="lead">Use this document as a way to quickly start any new project.<br> All you get is this text and a mostly barebones HTML document.</p>
	</div>
</div>
<!-- /.container -->
<div class="container">
	<div class="row">
		<?php foreach( $_SESSION['hotels'] as $k => $v){
	foreach($v as $key => $value){ ?>
		<div class="col-md-3 my-5">
			<div class="card">
				<img class="w-100" src="<?php echo $value[0]->thumb ?>">
				<div class="card-body">
					<a href="<?php echo $value[0]->hotelId ?>/<?php echo $value[0]->hotel_name ?>">
						<p class="card-title"><?php echo $value[0]->hotel_name ?></p>
						<p class="card-title"><?php echo $value[0]->hotelId ?></p>
					</a>

				</div>
			</div>
		</div>

		<?php	}
} ?>

	</div>
</div>

<?php include('view/footer.php'); ?>


