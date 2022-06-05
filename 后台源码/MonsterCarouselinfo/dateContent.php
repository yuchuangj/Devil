<?php
$conn = mysqli_connect("localhost", "root", "") or die("连接失败" . mysqli_connect_error());
mysqli_select_db($conn, "monster") or die("选择失败" . mysqli_error($conn));
mysqli_set_charset($conn, "utf8");

$page = isset($_GET['page']) ? $_GET['page'] : 0;
$queryString = isset($_GET['queryString']) ? $_GET['queryString'] : '';

$limit = 10;
if (isset($_GET['queryString'])) {
    $limit = 999999;
}
$page *= $limit;

// 數據縂條數
$count = "select count(*) from datecontent where NOW() > time";
if ($result = mysqli_query($conn, $count)) {
    $maxPageLimit = ceil(mysqli_fetch_array($result)[0] / $limit);
}

// 數據獲取
$select = "select * from datecontent where NOW() > time and title like \"%$queryString%\" order by time desc limit $page, $limit";
class Result
{
    public $maxPage = 0;
    public $resultArr = [];

    public function __construct($maxPage, $data)
    {
        $this->maxPage = $maxPage;
        $this->resultArr = $data;
    }
}

$reusltArray = [];
if ($result = mysqli_query($conn, $select)) {
    while ($obj = mysqli_fetch_object($result)) {
        $arr = array(
            'id' => $obj->id,
            'Img' => $obj->Img,
            'time' => $obj->time,
            'title' => $obj->title,
            'Content' => $obj->Content
        );
        array_push($reusltArray, $arr);
    }
    mysqli_free_result($result);
}

$res = new Result($maxPageLimit, $reusltArray);
echo json_encode($res);
