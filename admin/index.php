<?php
require "auth.php";

require "_header.php";
require "_navbar.php";
require __DIR__ . "/../classes/admin.php";

    $getMeet = new Admin();
    $result = $getMeet->getMeet();
    $color = ["active","primary","secondary","success","danger","warning","info","light"]
?><div class="container my-4 mt-5">
<h1 class="text-center mb-4">Randevular</h1>
    <div class="table-responsive">
    <table class="table table-hover table-bordered">
        <thead class="table text-success">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Full Name</th>
                <th scope="col">Date</th>
                <th scope="col">Time</th>
                <th scope="col">Note</th>
                <th scope="col">Phone</th>
                <th scope="col">Mail</th>
                <th scope="col">Number of People</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($result as $value): ?>
                <tr class="table-<?php echo $color[array_rand($color)] ?>">
                <td><?php echo $value["id"];?></td>
                <td><?php echo $value["full_name"];?></td>
                <td><?php echo date('d-m-Y', strtotime($value["date"]));?></td>
                <td><?php echo date('H:i', strtotime($value["time"]));?></td>
                <td><?php echo $value["note"];?></td>
                <td><?php echo $value["phone"];?></td>
                <td><?php echo $value["mail"];?></td>
                <td><?php echo $value["number_people"];?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
</div>









<?php require "_footer.php"; ?>