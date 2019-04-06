<?php
    include_once("connection.php");
    session_start();
    if(isset($_GET['op']) && !empty($_GET['op']))
    {
        $stmt = $conn->prepare("SELECT DISTINCT(`fk_bin_id`), `id`, `is_bin_present`, `bin_level`, `created_time`, bin_sensor_data.latitude as lat, bin_sensor_data.longitude as longi, bin_master.bin_location_name, bin_master.description FROM `bin_sensor_data`, `bin_master` WHERE bin_sensor_data.fk_bin_id = bin_master.bin_id ORDER BY `id` DESC limit 4"); 
        $stmt->execute();

        $bin_data = "";
        if($stmt->rowCount() > 0)
        {
            while($row = $stmt->fetch(PDO::FETCH_ASSOC))
            {
                $bin_level = $row['bin_level'] . "%";
                if($row['is_bin_present'] == 0)
                    $bin_level = "<span class='else-not'>Bin Not Present</span>";
                    
                $bin_data .= '<div class="col-xs-12 col-sm-6">
                                <div class="widget-small">
                                    <div class="indi">
                                        '.$bin_level.'
                                    </div>
                                    <div class="info">
                                        <h6>'.$row['bin_location_name'].'</h6>
                                        <p>Bin Id - <strong>'.$row['fk_bin_id'].'</strong></p>
                                        <p>Availability - <strong>'.$row['is_bin_present'].'</strong></p>
                                    </div>
                                </div>
                            </div>';
            }
            echo $bin_data;
        }
    }
    else
    {
        //echo "No operation";
    }
?>