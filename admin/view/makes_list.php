<?php 

include("view/header.php"); 
?>


<?php if (!empty($makes)) : ?> 
    <section id="list" class="list">
        <header>
            <h1 style ="text-align:center;font-size: 40px;">Make List</h1>
        </header>
        
        <?php foreach ($makes as $make) : ?>
            <div class="list__row">
                <div class="list__item">
                    
                    <p style ="text-align:center;font-size: 20px;" class="bold"><?= htmlspecialchars($make['makeName']) ?>
                    <b> Make ID = </b>
                    <?= htmlspecialchars($make['makeID']) ?> 
                </p>
                </div>
                <div class="list__removed">
                    
                    <form style ="text-align:center;" action="." method="post">
                        <input type="hidden" name="action" value="delete_make">
                        <input type="hidden" name="make_id" value="<?= $make['makeID'] ?>">
                        <button class="remove-button">Delete</button>
                    </form>
                </div>
            </div>
        <?php endforeach; ?>
    </section>
<?php else : ?>
    
    <p>No makes exist yet</p>
<?php endif; ?>


<section>
    <h2 style ="text-align:center;font-size: 40px;">Add Make</h2>
    <form style ="text-align:center;" action="." method="post" id="add__form" class="add__form">
        <input type="hidden" name="action" value="add_make">
        <div class="add__inputs">
            <label>Name:</label>
            
            <input type="text" name="make_name" maxlength="30" placeholder="Name" autofocus required>
        </div>
        <div class="add__addItem">
            
            <button class="add-button bold">Add</button>
        </div>
    </form>
</section>


<p style ="text-align:center;font-size: 20px;"><a href=".?action=list_vehicles">View/Edit Vehicles</a></p>

<?php 

include("view/footer.php"); 
?>