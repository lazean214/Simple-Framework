<?php include('header.php'); ?>

	<?php foreach( $arg as $k => $v){ ?>

    <div class="container">
        <div class="starter-template">
            <h1><?php echo  $v['title'] ?></h1>
            <p class="lead"><?php echo $v['content']; ?></p>
			
        </div>
    </div>
    <!-- /.container -->
<?php } ?>
<?php include('footer.php'); ?>


