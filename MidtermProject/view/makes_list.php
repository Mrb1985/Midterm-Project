<?php if (!empty($makes)) : ?> 
    <section id="list" class="list">
        <header>
            <h1>Make List</h1>
        </header>
        
        <?php foreach ($makes as $make) : ?>
            <div class="list__row">
                <div class="list__item">
                    
                    <p class="bold"><?= htmlspecialchars($make['makeName']) ?></p>
                </div>
                <div class="list__removed">
                    
                    <form action="." method="post">
                        <input type="hidden" name="action" value="delete_make">
                        <input type="hidden" name="make_id" value="<?= $make['makeID'] ?>">
                        <button class="remove-button">X</button>
                    </form>
                </div>
            </div>
        <?php endforeach; ?>
    </section>
<?php else : ?>
    
    <p>No makes exist yet</p>
<?php endif; ?>


<section>
    <h2>Add Make</h2>
    <form action="." method="post" id="add__form" class="add__form">
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


<p><a href=".?action=list_makes">View/Edit </a></p>

<?php 

include("view/footer.php"); 
?>