<?php
use Illuminate\Support\Facades\DB;

function convert_vi_to_en($str)
{
    $unicode = array(
        'a' => 'á|à|ả|ã|ạ|ă|ắ|ặ|ằ|ẳ|ẵ|â|ấ|ầ|ẩ|ẫ|ậ',
        'd' => 'đ',
        'e' => 'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ',
        'i' => 'í|ì|ỉ|ĩ|ị',
        'o' => 'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ',
        'u' => 'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự',
        'y' => 'ý|ỳ|ỷ|ỹ|ỵ',
        'A' => 'Á|À|Ả|Ã|Ạ|Ă|Ắ|Ặ|Ằ|Ẳ|Ẵ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',
        'D' => 'Đ',
        'E' => 'É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',
        'I' => 'Í|Ì|Ỉ|Ĩ|Ị',
        'O' => 'Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',
        'U' => 'Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',
        'Y' => 'Ý|Ỳ|Ỷ|Ỹ|Ỵ',
    );

    foreach ($unicode as $nonUnicode => $uni) {
        $str = preg_replace("/($uni)/i", $nonUnicode, $str);
    }
    $str = str_replace(str_split(' \'_\\/:*?"<>|;,!@#$%^&().'), '-', $str);
    $str = str_replace('--', '-', $str);
    $str = str_replace('--', '-', $str);
    $str = strtolower($str);
    return $str;
}

function cate_parent($data, $parent = 0, $str = '--', $select = 0)
{
    foreach ($data as $val) {
        if ($val['parent_id'] == $parent) {
            if ($val['id'] == $select && $select != 0) {
                echo "<option value='" . $val['id'] . "' selected='selected'>" . $str . $val['name'] . "</option>";
            } else {
                echo "<option value='" . $val['id'] . "'>" . $str . $val['name'] . "</option>";
            }
            cate_parent($data, $val['id'], $str . '----', $select);
        }
    }
}


function convertStringDate2String($date, $fromFormat, $toFormat)
{
    $datetime = new DateTime();
    $datetime = $datetime->createFromFormat($fromFormat, $date);
    if ($datetime) {
        return $datetime->format($toFormat);
    }
    return null;
}

function getPagination($totalPagination, $start, $limit, $sql, $orderBy = '')
{

    if (isset($_GET['page'])) {
        $page = $_GET['page'];
    }

    if (!isset($page) || $page == 0) {
        $page = 1;
    }
    if (!isset($page) || $page > $totalPagination && $totalPagination > 0) {
        $page = $totalPagination;
    }

    $start = $limit * ($page - 1);
    return $sql . $orderBy . " LIMIT $start, $limit";
}

function replaceArrayInsert($input)
{
    $str = implode('^,^', $input);
    $str = '^' . $str . '^';
    return $str;
}

function activeSearch($key, $array)
{
    if (isset($key) && $key != NULL) {
        foreach ($array as $k => $val) {
            if ($key == $val->id) {
                return $val->name;
            }
        }
    }
    return 'Khu vực';
}

function pre($value = '')
{
    echo '<pre>';
    print_r($value);
    echo "</pre>";
    die;
}

function getStatus($status)
{
    $arrStatus = json_decode($status);
    foreach ($arrStatus as $k => $status) {
        echo '<span style="color:red;">From ' . $status->off->start . ' To ' . $status->off->end . ' is Off</span><br>';
    }
}

function getProduct($strId)
{
    $listProduct = DB::select('select name from products where id in (' . $strId . ')');
    foreach ($listProduct as $key => $v) {
        echo $key+1 . '-' . $v->name . '<br>';
    }
}
