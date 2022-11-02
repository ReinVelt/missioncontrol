<?php header("Access-Control-Allow-Origin: *"); 
print '<?xml version="1.0" encoding="UTF-8"?>'; ?>
<kml xmlns="http://www.opengis.net/kml/2.2">
    <Document>
    <?php 

        $styles=[
            'http://maps.google.com/mapfiles/kml/pushpin/blue-pushpin.png',
            'http://maps.google.com/mapfiles/kml/pushpin/grn-pushpin.png',
            'http://maps.google.com/mapfiles/kml/pushpin/ltblu-pushpin.png',
            'http://maps.google.com/mapfiles/kml/pushpin/pink-pushpin.png',
            'http://maps.google.com/mapfiles/kml/pushpin/purple-pushpin.png',
            'http://maps.google.com/mapfiles/kml/pushpin/red-pushpin.png',
            'http://maps.google.com/mapfiles/kml/pushpin/wht-pushpin.png',
            'http://maps.google.com/mapfiles/kml/pushpin/ylw-pushpin.png' 
        ];
        $colors=['0000ff','00ff00','ccccff','ff88cc','cc00ff','ff0000','ffffff','ffff00'];
       

        $missionCounter=0;
        foreach($missions as $mission)
        {
            $missionId=$mission["id"];
            $iconRef=$missionId%count($styles);
            print '<Style id="mission'.$missionId.'">';
            print '<IconStyle><scale>1</scale>
            <Icon>
              <href>'.$styles[$iconRef].'</href>
            </Icon>
            </IconStyle>';
            $c=$colors[$missionId%count($styles)];
            $d=substr($c,4,2).substr($c,2,2).substr($c,0,2);
            print '<LabelStyle><colorMode>normal</colorMode><color>ffffffff</color><scale>0.7</scale></LabelStyle>';
            print '</Style>';
            print "\n";
           
            print '<Style id="route'.$missionId.'">';
            print '
            <LineStyle>
              <color>ff'.$d.'</color>
            </LineStyle>
            ';
           
            print '</Style>';
            print "\n";
            $missionCounter++;
        }
    ?>
    <Folder>
        <?php
          
            foreach($targets as $row){ ?>

            <Placemark id="missiontarget<?= $row["id"]; ?>">
                <name><?= $row["name"]; ?></name>
                <description>[<?= $row["datum"]; ?>] <?= $row["description"]; ?></description>
                <styleUrl>#mission<?= $row["missionId"]; ?></styleUrl>
                <Point>
                    <coordinates><?= $row["longitude"]; ?>,<?= $row["latitude"]; ?>,0</coordinates>
                </Point>
            </Placemark>
        <?php
        
            if (isset($row) && isset($oldRow) && $oldRow["missionId"]==$row["missionId"])
            {?>
                <Placemark id="route<?= $oldRow["id"]."-".$row["id"]; ?>">
                <name><?= $row["name"]; ?></name>
                <description>[<?= $row["datum"]; ?>] <?= $row["description"]; ?></description>
                <styleUrl>#route<?= $row["missionId"]; ?></styleUrl>
                <LineString>
                    <coordinates>
                        <?= $oldRow["longitude"]; ?>,<?= $oldRow["latitude"]; ?>,0 
                        <?= $row["longitude"]; ?>,<?= $row["latitude"]; ?>,0
                    </coordinates>
                </LineString>
            </Placemark>
            <?php
            }
            $oldRow=$row;
            
            
            } ?>
    </Folder>
            </Document>
</kml>