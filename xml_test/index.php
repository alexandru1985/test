<!DOCTYPE html>
<?php

include 'helper/functions.php';

?>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="css/style.css">
    </head>
    <body>
        <div class="rTable center">
            <div class="rTableRow">
                <div class="rTableHead">
                    <form action="index.php" method="get">
                        <select class="drop-down" name="zone" onchange="javascript: form.submit();">
                            <option value="">Toate Regiunile</option>
                            <?php
                            
                            $output = simplexml_load_file('xml/countries.xml');
                            
                            if (isset($_GET['zone'])) {
                                $filterZone = $_GET['zone'];
                            } else {
                                $filterZone = '';
                            }
                            
                            //// Get regions from xml file and remove duplicates of drop-down
                            
                            $saveRegions = [];
                            foreach ($output->country as $row) {

                                $saveRegions[] = $row->attributes();

                            }

                            $removeDuplicates = array_unique($saveRegions);

                            foreach ($removeDuplicates as $region) {
                                ?>
                                <option value="<?php echo $region; ?>" <?php echo (($region == $filterZone) ? 'selected="selected"' : ''); ?>> <?php echo $region; ?></option>
                                <?php
                            }

                            ?>
                        </select>
                    </form>    
                </div>
                <div class="rTableHead">Tara</div>
                <div class="rTableHead">Limba</div>
                <div class="rTableHead">Moneda</div>
                <div class="rTableHead">Latitudine</div>
                <div class="rTableHead">Longitudine</div>
            </div>

            <?php
            
            //// Display and filter xml data using Xpath
            
            foreach ($output->xpath('country') as $row) {

                $checkCurrency = $row->xpath('./currency[. ="Euro"]');
                $countryAttribute = $row->xpath('./@zone[. ="' . $filterZone . '"]');

                if (isset($filterZone) && strlen($filterZone) > 0) {
                    if ($checkCurrency && $countryAttribute) {
                        ?>
                        <div class="rTableRow">
                            <div class="rTableCell"><?php echo $row->attributes(); ?></div>
                            <div class="rTableCell"><?php echo $row->name; ?></div>
                            <div class="rTableCell"><?php echo $row->language; ?></div>
                            <div class="rTableCell"><?php echo $row->currency; ?></div>
                            <div class="rTableCell"><?php echo getLat($row->map_url); ?></div>
                            <div class="rTableCell"><?php echo getLong($row->map_url); ?></div>
                        </div>
                        <?php
                    }
                } else {
                    if ($checkCurrency) {
                        ?> 
                        <div class="rTableRow">
                            <div class="rTableCell"><?php echo $row->attributes(); ?></div>
                            <div class="rTableCell"><?php echo $row->name; ?></div>
                            <div class="rTableCell"><?php echo $row->language; ?></div>
                            <div class="rTableCell"><?php echo $row->currency; ?></div>
                            <div class="rTableCell"><?php echo getLat($row->map_url); ?></div>
                            <div class="rTableCell"><?php echo getLong($row->map_url); ?></div>
                        </div>
                        <?php
                    }
                }
            }
            ?>
        </div>
    </body>
</html>