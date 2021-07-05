<?php

include('config/db_connect.php');

if(isset($_POST['delete'])){

    $id_to_delete = mysqli_real_escape_string($conn,$_POST['id_to_delete']);

    

    $sql = " DELETE FROM pizza WHERE id = $id_to_delete ";

    if (mysqli_query($conn,$sql)){
        
        header('location:index.php');


    }else{

        echo 'query error'.mysqli_error($conn);
    }
}

if(isset($_GET['id'])){

    $id = mysqli_real_escape_string($conn,$_GET['id']);



    $sql = "SELECT * FROM pizza WHERE id = $id";
    $result = mysqli_query($conn,$sql);
    $pizza = mysqli_fetch_assoc($result);
  

    mysqli_free_result($result);
    mysqli_close($conn);

    
}else{

    echo("there is an error");
}


?>



<!DOCTYPE html>
<html>
<?php include('templates/header.php'); ?>

    <div class="container center grey-text">

        <?php if($pizza) : ?>

            <h5><?php echo htmlspecialchars($pizza['title']) ?> </h5>
            <h6><?php echo htmlspecialchars($pizza['email']) ?> </h6>
            <h6><?php echo htmlspecialchars($pizza['created_at']) ?> </h6>
       

        <?php else : ?>

        <h4>No Data</h4>

        <?php endif; ?>
        
            
    <form action="details.php" method="POST">
        <input type="hidden" name="id_to_delete" value="<?php echo $pizza['id']  ?>" >

        <input type="submit" name="delete" value="delete" class="btn brand z-depth-0">

    </form>

    </div>


<?php include('templates/footer.php'); ?>

</html>