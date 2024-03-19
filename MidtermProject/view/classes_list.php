<?php if (!empty($classes)) : ?> 
    <section id="list" class="list">
        <header>
            <h1>Class List</h1>
        </header>
        
        <?php foreach ($classes as $class) : ?>
            <div class="list__row">
                <div class="list__item">
                    
                    <p class="bold"><?= htmlspecialchars($class['className']) ?></p>
                </div>
                <div class="list__removed">
                    
                    <form action="." method="post">
                        <input type="hidden" name="action" value="delete_class">
                        <input type="hidden" name="class_id" value="<?= $class['classID'] ?>">
                        <button class="remove-button">X</button>
                    </form>
                </div>
            </div>
        <?php endforeach; ?>
    </section>
<?php else : ?>
   
    <p>No Classes exist yet</p>
<?php endif; ?> 


<section>
    <h2>Add Class</h2>
    <form action="." method="post" id="add__form" class="add__form">
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


<p><a href=".?action=list_classes">View/Edit </a></p>

<?php 

include("view/footer.php"); 
?>