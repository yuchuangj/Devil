<?php
$conn = mysqli_connect("localhost", "root", "") or die("连接失败" . mysqli_connect_error());
mysqli_select_db($conn, "monster") or die("选择失败" . mysqli_error($conn));
mysqli_set_charset($conn, "utf8");
$select = "select * from calendardetails";
$str = [];

if ($result = mysqli_query($conn, $select)) {
    while ($obj = mysqli_fetch_object($result)) {
        $arr = array(
            'id' => $obj->id,
            'caption' => $obj->caption,
            'content' => $obj->content,
            'content2' => $obj->content2,
            'content3' => $obj->content3,
            'subtitle' => $obj->subtitle,
            'subtitle2' => $obj->subtitle2,
            'author' => $obj->author,
            'time' => $obj->time,
            'img' => $obj->img
        );
        array_push($str, $arr);
    }

    mysqli_free_result($result);
}

echo json_encode($str);
