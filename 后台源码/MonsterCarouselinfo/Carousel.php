<?php
$conn=mysqli_connect("localhost","root","")or die("连接失败".mysqli_connect_error());
mysqli_select_db($conn,"monster")or die("选择失败".mysqli_error($conn));
mysqli_set_charset($conn,"utf8");
$select = "select * from demonHomeCarousel";
$pp = [];

if ($result = mysqli_query($conn, $select))
{
    while ($obj = mysqli_fetch_object($result))
    {
        $arr = array(
            'id'=> $obj->id,
            'image'=> $obj->image
        );
        array_push($pp, $arr);
    }
    
    mysqli_free_result($result);
}

echo json_encode($pp);
?>