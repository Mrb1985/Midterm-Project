<?php if (!empty($types)) : ?> 
    <section id="list" class="list">
        <header>
            <h1>Type List</h1>
        </header>
        
        <?php foreach ($types as $type) : ?>
            <div class="list__row">
                <div class="list__item">
                    
                    <p class="bold"><?= htmlspecialchars($type['typeName']) ?>
                    
                </p>
                </div>
                <div class="list__removed">
                    
                    <form action="." method="post">
                        <input type="hidden" name="action" value="delete_type">
                        <input type="hidden" name="type_id" value="<?= $type['typeID'] ?>">
                        <button class="remove-button">X</button>
                    </form>
                </div>
            </div>
        <?php endforeach; ?>
    </section>
<?php else : ?>
    
    <p>No types exist yet</p>
<?php endif; ?>


<section>
    <h2>Add type</h2>
    <form action="." method="post" id="add__form" class="add__form">
        <input type="hidden" name="action" value="add_type">
        <div class="add__inputs">
            <label>Name:</label>
            
            <input type="text" name="type_name" maxlength="30" placeholder="Name" autofocus required>
        </div>
        <div class="add__addItem">
            
            <button class="add-button bold">Add</button>
        </div>
    </form>
</section>


<p><a href=".?action=list_types">View/Edit </a></p>

<?php 

include("view/footer.php"); 
?>