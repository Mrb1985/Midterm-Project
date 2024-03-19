<?php 

include("view/header.php"); 
?>


<?php if (!empty($classes)) : ?> 
    <section id="list" class="list">
        <header>
            <h1 style ="text-align:center;font-size: 40px;">Class List</h1>
        </header>
        
        <?php foreach ($classes as $class) : ?>
            <div class="list__row">
                <div class="list__item">
                    
                    <p style ="text-align:center;font-size: 20px;" class="bold"><?= htmlspecialchars($class['className']) ?>
                    <b> Class ID = </b>
                    <?= htmlspecialchars($class['classID']) ?> 
                </p>
                </div>
                <div class="list__removed">
                    
                    <form style ="text-align:center;" action="." method="post">
                        <input type="hidden" name="action" value="delete_class">
                        <input type="hidden" name="class_id" value="<?= $class['classID'] ?>">
                        <button class="remove-button">Delete</button>
                    </form>
                </div>
            </div>
        <?php endforeach; ?>
    </section>
<?php else : ?>
    
    <p>No Classes exist yet</p>
<?php endif; ?>


<section>
    <h2 style ="text-align:center;font-size: 40px;">Add Class</h2>
    <form style ="text-align:center;" action="." method="post" id="add__form" class="add__form">
        <input type="hidden" name="action" value="add_class">
        <div class="add__inputs">
            <label>Name:</label>
            
            <input type="text" name="class_name" maxlength="30" placeholder="Name" autofocus required>
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