<?php header("Access-Control-Allow-Origin: *"); ?><?php print '<?xml version="1.0" encoding="UTF-8"?>'; ?>
<kml xmlns="http://www.opengis.net/kml/2.2">
<Style id="target">
    <IconStyle>
        <Icon>
            <href><?= base_url()."/markers/yellowdot.png"; ?></href>
        </Icon>
    </IconStyle>
</Style>
<Style id="gpslog">
    <IconStyle>
        <Icon>
            <href><?= base_url()."/markers/yellowdot.png"; ?></href>
        </Icon>
    </IconStyle>
</Style>
<Style id="media">
    <IconStyle>
        <Icon>
            <href><?= base_url()."/markers/yellowdot.png"; ?></href>
        </Icon>
    </IconStyle>
</Style>
 <Folder>          
    <?php
foreach($media as $row)
{
        ?>
        <Placemark id="media<?= $row["id"]; ?>">
            <name><?= $row["name"]; ?></name>
            <description>[<?= $row["datum"]; ?>] <?= $row["description"]; ?></description>
            <Style>
                <scale>0.2</scale>
                <IconStyle>
                    <Icon>
                        <href><?= base_url(); ?>/app/imageresize/<?= $row["id"]; ?></href>
                        
                    </Icon>
                   
                </IconStyle>
                <LabelStyle>
                    <scale>0.1</scale>
                </LabelStyle>
            </Style>
            <Icon>
                <href><?= base_url(); ?>/app/imageresize/<?= $row["id"]; ?></href>
            </Icon>
            <Point>
                <coordinates><?= $row["longitude"]; ?>,<?= $row["latitude"]; ?>,0</coordinates>
            </Point>
        </Placemark>
<?php } ?>

<?php
foreach($gpslog as $row)
{
        ?>
        <Placemark id="gpslog<?= $row["id"]; ?>">
            <name><?= $row["name"]; ?></name>
            <description>[<?= $row["datum"]; ?>] <?= $row["description"]; ?></description>
            <Style id="target">
                <IconStyle>
                    <Icon>
                        <href><?= base_url()."/markers/yellowdot.png"; ?></href>
                    </Icon>
                </IconStyle>
            </Style>
            <Point>
                <coordinates><?= $row["longitude"]; ?>,<?= $row["latitude"]; ?>,0</coordinates>
            </Point>
        </Placemark>
<?php } ?>

<?php
    foreach($data as $row)
    {
            ?>
            <Placemark id="target<?= $row["id"]; ?>">
                <name><?= $row["name"]; ?></name>
                <description>[<?= $row["datum"]; ?>] <?= $row["description"]; ?></description>
                
                <Point>
                    <coordinates><?= $row["longitude"]; ?>,<?= $row["latitude"]; ?>,0</coordinates>
                </Point>
            </Placemark>
    <?php } ?>

   

  
    </Folder>
</kml>
