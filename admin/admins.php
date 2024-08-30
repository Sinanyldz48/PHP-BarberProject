<?php
require "auth.php";
require "_header.php";
require __DIR__ . "/../classes/admin.php";
$getAdmin = new Admin();
$result = $getAdmin->getAdmins();
require "_navbar.php";
?>

<div class="container">
    <h1 class="text-center">Adminler</h1>
    <table class="table table">
        <thead>
            <tr class="table-dark">
                <th scope="col">Name</th>
                <th scope="col">Username</th>
                <th scope="col">Created_at</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($result as $key => $value): ?>
                <tr>
                    <th><?php echo $value["name"]; ?></th>
                    <th><?php echo $value["username"]; ?></th>
                    <th><?php echo $value["created_at"]; ?></th>
                </tr>
            <?php endforeach; ?>

        </tbody>
    </table>
</div>













<?php require "_footer.php"; ?>