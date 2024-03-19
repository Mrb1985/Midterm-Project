<?php 
include('view/header.php'); 
?>


<?php if (!empty($vehicles)) : ?> 
    <section id="list" class="list">
        <header>
            <h1 style ="text-align:center;font-size: 80px"; >Vehicle List</h1>
        </header>
        
        <?php foreach ($vehicles as $vehicle) : ?>
            <div  class="list__row">
                <div  class="list__item">
                    
                    <p style="color:blue;text-align:center;font-size: 40px;border-style: solid";> <b>Model: </b>
                     <?= htmlspecialchars($vehicle['model']) ?>
                     <b>Year: </b>
                     <?= htmlspecialchars($vehicle['year']) ?>
                    <b> Price: </b>
                     <?= htmlspecialchars($vehicle['price']) ?></p>
                </div>
                <div class="list__removed">
                   
                </div>
            </div>
        <?php endforeach; ?>
    </section>
<?php else : ?>
    
    <p>No vehicles exist yet</p>
<?php endif; ?>




<?php 

include("view/footer.php"); 
?>