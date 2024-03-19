<?php 

include("view/header.php"); 
?>


<?php 
if (!empty($vehicles)) : ?> 
    <section id="list" class="list">
        <header>
            <h1 style ="text-align:center;font-size: 40px;">Vehicle List</h1>
        </header>
        
        <?php foreach ($vehicles as $vehicle) : ?>
            <div class="list__row">
                <div class="list__item">
                    
                    <p style ="text-align:center;font-size: 30px;" class="bold"><?= htmlspecialchars($vehicle['model']) ?>
                    <b >Year: </b>
                     <?= htmlspecialchars($vehicle['year']) ?>
                    <b> Price: </b>
                     <?= htmlspecialchars($vehicle['price']) ?></p>
                </div>
                <div class="list__removed">
                    
                    <form style ="text-align:center;" action="." method="post">
                        <input type="hidden" name="action" value="delete_vehicle">
                        <input type="hidden" name="vehicle_id" value="<?= $vehicle['vehicleID'] ?>">
                        <button class="remove-button">Delete</button>
                    </form>
                </div>
            </div>
        <?php endforeach; ?>
    </section>
<?php else : ?>
    
    <p>No vehicles exist yet</p>
<?php endif; ?>


<section>
    <h2 style ="text-align:center;font-size: 40px;">Add vehicle</h2>
    <form style ="text-align:center;" action="." method="post" id="add__form" class="add__form">
        <input type="hidden" name="action" value="add_vehicle">
        <div class="add__inputs">
            <label>Model:</label>
            
            <input type="text" name="vehicle_name" maxlength="30" placeholder="Name" autofocus required>
            <label>Year:</label>
            <input type="text" name="year1" maxlength="30" placeholder="Year" autofocus required>
            <label>Price:</label>
            <input type="text" name="price1" maxlength="30" placeholder="Price" autofocus required>
            <label>Type ID:</label>
            <input type="text" name="type_id" maxlength="30" placeholder="TypeID" autofocus required>
            <label>Class ID:</label>
            <input type="text" name="class_id" maxlength="30" placeholder="ClassID" autofocus required>
            <label>Make ID:</label>
            <input type="text" name="make_id" maxlength="30" placeholder="MakeID" autofocus required>
        </div>
        <div class="add__addItem">
            
            <button style = "width: 90px;
        height: 50px;" class="add-button bold">Add</button>
        </div>
    </form>
</section>


<p style ="text-align:center;font-size: 20px;"><a href=".?action=list_vehicles">View/Edit Vehicles</a></p>
<p style ="text-align:center;font-size: 20px;"><a href=".?action=list_classes">View/Edit Classes</a></p>
<p style ="text-align:center;font-size: 20px;"><a href=".?action=list_makes">View/Edit Makes</a></p>
<p style ="text-align:center;font-size: 20px;"><a href=".?action=list_types">View/Edit Types</a></p>
<?php 

include("view/footer.php"); 
?>