<?php 

include('config/db_connect.php');

$sql = 'SELECT title,ingredients,id FROM pizza ORDER BY created_at';

// make query & get result
$result = mysqli_query($conn,$sql);

// fetch the data as array

$pizzas = mysqli_fetch_all($result,MYSQLI_ASSOC);

// free result from memory
mysqli_free_result($result);
mysqli_close($conn);

// print_r(explode(',',$pizzas[0]['ingredients']));


// print_r($pizzas);

?>

<!DOCTYPE html>
<html>

	
	<?php include('templates/header.php'); ?>
	<h4 class="center grey-text">pizzas!</h4>
	<div class="container">
		<div class="row">
			<?php foreach($pizzas as $pizza) { ?>
				<div class="col s6 md3">
					<div class="card z-depth-0">
					<img src="image/pizza.svg" class="pizza" alt="pizza-img">
						<div class="card-content center">
							<h6><?php echo htmlspecialchars($pizza['title']); ?></h6>
							<ul>
								<?php foreach(explode(',',$pizza['ingredients']) as $ing) { ?>

								<li><?php echo htmlspecialchars($ing);?></li>

								<?php } ?>
							</ul>

							
						</div>
							<div class="card-action right-align">

								<a href ="details.php?id=<?php echo $pizza['id'] ?>" class="brand-text">more info</a>

							</div>


					</div>

				</div>

			<?php } ?>
		</div>
	</div>

	<?php include('templates/footer.php'); ?>

</html>