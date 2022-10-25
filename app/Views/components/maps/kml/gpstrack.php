<?php header("Access-Control-Allow-Origin: *"); ?>
<?xml version="1.0" encoding="UTF-8"?>
<kml xmlns="http://www.opengis.net/kml/2.2">
    <?php
    foreach($data as $row)
    {
    ?>
    <Placemark id="gpslog<?= $row["id"]; ?>">
        <name><?= $row["name"]; ?></name>
        <description>[<?= $row["datum"]; ?>] <?= $row["description"]; ?></description>
        <Point>
            <coordinates><?= $row["longitude"]; ?>,<?= $row["latitude"]; ?>,<?= $row["altitude"]; ?></coordinates>
        </Point>
    </Placemark>
    <?php } ?>
</kml>