<?php
$conn = mysqli_connect("localhost", "root", "") or die("连接失败" . mysqli_connect_error());
mysqli_select_db($conn, "monster") or die("选择失败" . mysqli_error($conn));
mysqli_set_charset($conn, "utf8");
$select = "select * from rotationdetailspage";
$pp = [];

if ($result = mysqli_query($conn, $select)) {
    while ($obj = mysqli_fetch_object($result)) {
        $arr = array(
            'id' => $obj->id,
            'CarouselTitle' => $obj->CarouselTitle,
            'CarouselImage' => $obj->CarouselImage,
            'subTitle' => $obj->subTitle,
            'BoldParagraph' => $obj->BoldParagraph,
            'BoldParagraph2' => $obj->BoldParagraph2,
            'BoldParagraph3' => $obj->BoldParagraph3,
            'BoldParagraph4' => $obj->BoldParagraph4,
            'BoldParagraph5' => $obj->BoldParagraph5,
            'BoldParagraph6' => $obj->BoldParagraph6,
            'CarouselContent' => $obj->CarouselContent,
            'CarouselContent2' => $obj->CarouselContent2,
            'CarouselContent3' => $obj->CarouselContent3,
            'CarouselContent4' => $obj->CarouselContent4,
            'CarouselContent5' => $obj->CarouselContent5,
            'CarouselContent6' => $obj->CarouselContent6,
            'CarouselTime' => $obj->CarouselTime
        );
        array_push($pp, $arr);
    }

    mysqli_free_result($result);
}

echo json_encode($pp);
