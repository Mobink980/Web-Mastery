<?php
require_once 'page.php';

if (isset($_GET['action']) && $_GET['action'] == 'update') {
    showEditFruitPage();
} else {
    showNewFruitPage();
}

function showNewFruitPage()
{
    PageHeader();
    ?>
        <section class="container">
        <h2>New fruit</h2>
            <form action="index.php" method="post">
                <div class="form-group">
                    <label>Name:</label>
                    <input class="form-control" name="fruitName" type="text">
                </div>
                <div class="form-group">
                    <label>Color:</label>
                    <input class="form-control" name="fruitColor" type="text">
                </div>
                <div class="form-group">
                    <input class="btn btn-primary" type="submit" value="New">
                </div>
            </form>
        </section>
<?php
PageFooter();
}

function showEditFruitPage()
{
    PageHeader();
    ?>
        <section class="container">
        <h2>Edit fruit</h2>
            <form action="index.php" method="post">
                <input name="fruitId" type="hidden" value="<?php echo $_GET['fruitId']; ?>">
                <div class="form-group">
                    <label>Name:</label>
                    <input class="form-control" name="fruitName" type="text" value="<?php echo $_GET['fruitName']; ?>">
                </div>
                <div class="form-group">
                    <label>Color:</label>
                    <input class="form-control" name="fruitColor" type="text" value="<?php echo $_GET['fruitColor']; ?>">
                </div>
                <div class="form-group">
                    <input class="btn btn-primary" type="submit" value="Edit">
                </div>
            </form>
        </section>
<?php
PageFooter();
}