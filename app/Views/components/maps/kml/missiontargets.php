<?php header("Access-Control-Allow-Origin: *"); ?><?xml version="1.0" encoding="UTF-8"?>
<kml xmlns="http://www.opengis.net/kml/2.2">
    <?php
    foreach($data as $row)
    {
    ?>
    <Placemark id="missiontarget<?= $row["id"]; ?>">
        <name><?= $row["name"]; ?></name>
        <description>[<?= $row["datum"]; ?>] <?= $row["description"]; ?></description>
        <Point>
            <coordinates><?= $row["longitude"]; ?>,<?= $row["latitude"]; ?>,0</coordinates>
        </Point>
    </Placemark>
    <?php } ?>
</kml>
