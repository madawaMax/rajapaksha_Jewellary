<?php

require_once 'connection.php';

$rs = Database::search("SELECT * FROM `stock` INNER JOIN `product` ON `stock`.product_id = `product`.p_id
INNER JOIN `category` ON `product`.category_id = `category`.c_id
INNER JOIN `product_status` ON `stock`.product_status_id = `product_status`.id");

$n = $rs->num_rows;

for ($i = 0; $i < $n; $i++) {

    $d = $rs->fetch_assoc();

?>


    <tr>
        <td><?php echo $d["p_id"]?></td>
        <td><?php echo $d["p_name"]?></td>
        <td><?php echo $d["c_id"]?></td>
        <td><?php echo $d["price"]?></td>
        <td><?php echo $d["qty"]?></td>
        <td><span class="badge bg-success"><?php echo $d["pstaus_name"]?></span></td>
        <td>
            <button class="btn btn-sm btn-light" onclick="updateproduct(<?php echo $d['p_id']; ?>);">Update</a></button>

           
             <button class="btn btn-sm btn-danger" onclick="deleteproduc('<?php echo $d['p_id']?>');">Delete</button>
        </td>
    </tr>



<?php

}



?>