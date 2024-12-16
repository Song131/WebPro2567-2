//<?php
//$list_month = [
  //  1 => "Jan", 
  //  2 => "Feb",
  //  3 => "Mar",
   // 4 => "Apr",
   // 5 => "May",
   // 6 => "Jun",
  //  7 => "July",
   // 8 => "Aug",
   // 9 => "Sep",
    //10 => "Oct",
   // 11 => "Nov",
    //12 => "Dec",
//];
//$month = ! empty($_POST["month"]) ? $_POST["month"] : 0;
//if ($month >= 1 && $month <= count(value: $list_month)){
    //echo $list_month[$month];
//}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name = "viewport"content = "width=device-width, initial-scale=1.0">
    <title>Mounth</title>
</head>

<body>

    <form action="" method="POST">
        
            <label for="">Month</label>
            <input type="number" name="month" min="1" max="12">
        <div>
            <button type="submit">ยืนยัน</button>
        </div>
        <div>
            <?php
                $list_month = [
                    1 => "Jan", 
                    2 => "Feb",
                    3 => "Mar",
                    4 => "Apr",
                    5 => "May",
                    6 => "Jun",
                    7 => "July",
                    8 => "Aug",
                    9 => "Sep",
                    10 => "Oct",
                    11 => "Nov",
                    12 => "Dec",
                ];
                $month = ! empty($_POST["month"]) ? $_POST["month"] : 0;
                if ($month >= 1 && $month <= count(value: $list_month)){
                    echo $list_month[$month];
                }
?>
        </div>

    </form>

</body>

</html>