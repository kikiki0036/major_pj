<?php
    $output = "";
    if(mysqli_num_rows($sql) < 0){
        $output .= "No data";
    }elseif(mysqli_num_rows($sql) > 0){
        while($row = mysqli_fetch_assoc($sql)){
            $output .= '
                        <div class="branch-box" onclick="getbranch_id('.$row['branch_id'].')">
                            <img src="php/image/icon_m.png" alt="">
                            <p>'.$row['branch_name'].'</p>
                        </div>   ';
        }
    }
    echo $output;
?>
