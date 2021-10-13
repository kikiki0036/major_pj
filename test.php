<?php 
  //  $mname = "adgv'df:?   ";
  //  $p = preg_replace('/[^\w\s_-]/i','', $mname);


    // $conn = mysqli_connect("localhost", "root", "", "data_major");

    // $hide = "on";
    // $m = "t";
    // if(strlen($m)==1)
    // {
    //    $sql = mysqli_query($conn, "SELECT * FROM `movie` 
    //                                WHERE movie_name LIKE '$m%' AND hide = '{$hide}' ORDER BY `getindate` ASC");
    // }else{
    //    $sql = mysqli_query($conn, "SELECT * FROM `movie` 
    //                                WHERE hide = '{$hide}' AND movie_name LIKE '%$m%' OR rate LIKE '%$m%' ORDER BY `getindate` ASC");
    // }
   
                              

    // if(mysqli_num_rows($sql) > 0){
    //     $n=1;
    //     while($row = mysqli_fetch_assoc($sql)){
    //         $movie_name = $row['movie_name'];
    //         $key = 'ร';
    //         $keyloewr =  strtolower($key); // to lower case
    //         $keyuper = strtoupper($key); // to upper case
    //         // if(strlen($key)==1)
    //         // {
    //         //   if($movie_name[0] == $key || $movie_name[1] == $key){
    //             echo $n."--".$movie_name[1]." -- "."$movie_name"."<br/>";
    //         //   }
    //         // }
    //         $n++;
    //     }
    // }


    $str = "Hello Friend";

    $arr1 = str_split($str," ");
    $arr2 = str_split($str, 3);
    
    print_r($arr1);
    print_r($arr2);

?>