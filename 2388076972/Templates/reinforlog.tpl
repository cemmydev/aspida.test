<?php
$id = $_GET['did'];
$village = $database->getVillage($id);
?>
<table id="profile" style="width: 1000px;">
    <thead>
    <tr>
        <th colspan="3" class="on">From the Village (reinforce)</th>
    </tr>
    <tr>

        <td style="width: 15%">Where</td>
        <td>How many</td>


    </tr>
    </thead>

    <?php


    $sql = "SELECT * FROM `enforcement` WHERE `from` = '".$id."'";
    $result = $database->query($sql);
    foreach($result as $row )
    {

    $owntribe = $database->getUserField($database->getVillageField($id,"owner"),"tribe",0);


    $name=$database->getVillageField($row['vref'],"name");
    ?>
    <tr>

        <td><a href="?p=village&did=<?php echo $row['vref'];?>" ><?php echo $name; ?></a></td>
        <td><?php

                for($i=1;$i<=10;$i++){
                    $pic=($owntribe-1)*10+$i;
                    ?>
            <img class="unit u<?php echo $pic;?>" src="../img/x.gif" title="" alt=""><?php echo $row['u'.$i];


                } ?> </td>

    </tr>
    <?php }
    ?>

    </thead>
</table>
<table id="profile" style="width: 1000px">
    <thead>
    <tr>
        <th colspan="3" class="on">In the Village (reinforce)</th>
    </tr>
    <tr>

        <td style="width: 15%">Location</td>
        <td>How many</td>


    </tr>
    </thead>

    <?php

    $sql = "SELECT * FROM `enforcement` WHERE `vref` = '".$id."'";
    $result = $database->query($sql);
    foreach($result as $row )
    {
    $owntribe = $database->getUserField($database->getVillageField($row['from'],"owner"),"tribe",0);

    $name=$database->getVillageField($row['from'],"name");
    ?>
    <tr>

        <td><a href="?p=village&did=<?php echo $row['from'];?>"><?php echo $name; ?></a></td>
        <td><?php

                for($i=1;$i<=10;$i++){
                    $pic=($owntribe-1)*10+$i;
                    ?>
            <img class="unit u<?php echo $pic;?>" src="../img/x.gif" title="" alt=""><?php echo $row['u'.$i];

                } ?> </td>

    </tr>
    <?php }
    ?>

    </thead>
</table>
