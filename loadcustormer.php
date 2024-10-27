<?php
require_once 'connection.php';



$rs = Database::search("SELECT * FROM `user` ");


$n = $rs->num_rows;

for ($i = 0; $i < $n; $i++) {

    $d = $rs->fetch_assoc();

?>

    <tr>
        <td><?php echo $d["user_name"] ?></td>
        <td><?php echo $d["name"] ?></td>
        <td><?php echo $d["email"] ?></td>
        <td><?php echo $d["mobile"] ?></td>
        <!-- <td>15</td>
                                    <td>$3,200</td> -->
        <td>
            <button class="btn btn-sm btn-success"><?php
                                                    if ($d["action"] == 1) {
                                                        echo ("active");
                                                    } else {
                                                        echo ("deactive");
                                                    }

                                                    ?></button>
            <button class="btn btn-sm btn-danger">Delete</button>
        </td>
    </tr>

<?php
}
?>