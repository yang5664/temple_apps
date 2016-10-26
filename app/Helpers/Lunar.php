<?php

namespace Lunar\Helpers;
// http://www.phpernote.com/php-function/867.html
class Lunar
{
    var $MIN_YEAR = 1891;
    var $MAX_YEAR = 2100;
    var $lunarInfo = array(
      array(0, 2, 9, 21936), array(6, 1, 30, 9656), array(0, 2, 17, 9584), array(0, 2, 6, 21168), array(5, 1, 26, 43344), array(0, 2, 13, 59728),
      array(0, 2, 2, 27296), array(3, 1, 22, 44368), array(0, 2, 10, 43856), array(8, 1, 30, 19304), array(0, 2, 19, 19168), array(0, 2, 8, 42352),
      array(5, 1, 29, 21096), array(0, 2, 16, 53856), array(0, 2, 4, 55632), array(4, 1, 25, 27304), array(0, 2, 13, 22176), array(0, 2, 2, 39632),
      array(2, 1, 22, 19176), array(0, 2, 10, 19168), array(6, 1, 30, 42200), array(0, 2, 18, 42192), array(0, 2, 6, 53840), array(5, 1, 26, 54568),
      array(0, 2, 14, 46400), array(0, 2, 3, 54944), array(2, 1, 23, 38608), array(0, 2, 11, 38320), array(7, 2, 1, 18872), array(0, 2, 20, 18800),
      array(0, 2, 8, 42160), array(5, 1, 28, 45656), array(0, 2, 16, 27216), array(0, 2, 5, 27968), array(4, 1, 24, 44456), array(0, 2, 13, 11104),
      array(0, 2, 2, 38256), array(2, 1, 23, 18808), array(0, 2, 10, 18800), array(6, 1, 30, 25776), array(0, 2, 17, 54432), array(0, 2, 6, 59984),
      array(5, 1, 26, 27976), array(0, 2, 14, 23248), array(0, 2, 4, 11104), array(3, 1, 24, 37744), array(0, 2, 11, 37600), array(7, 1, 31, 51560),
      array(0, 2, 19, 51536), array(0, 2, 8, 54432), array(6, 1, 27, 55888), array(0, 2, 15, 46416), array(0, 2, 5, 22176), array(4, 1, 25, 43736),
      array(0, 2, 13, 9680), array(0, 2, 2, 37584), array(2, 1, 22, 51544), array(0, 2, 10, 43344), array(7, 1, 29, 46248), array(0, 2, 17, 27808),
      array(0, 2, 6, 46416), array(5, 1, 27, 21928), array(0, 2, 14, 19872), array(0, 2, 3, 42416), array(3, 1, 24, 21176), array(0, 2, 12, 21168),
      array(8, 1, 31, 43344), array(0, 2, 18, 59728), array(0, 2, 8, 27296), array(6, 1, 28, 44368), array(0, 2, 15, 43856), array(0, 2, 5, 19296),
      array(4, 1, 25, 42352), array(0, 2, 13, 42352), array(0, 2, 2, 21088), array(3, 1, 21, 59696), array(0, 2, 9, 55632), array(7, 1, 30, 23208),
      array(0, 2, 17, 22176), array(0, 2, 6, 38608), array(5, 1, 27, 19176), array(0, 2, 15, 19152), array(0, 2, 3, 42192), array(4, 1, 23, 53864),
      array(0, 2, 11, 53840), array(8, 1, 31, 54568), array(0, 2, 18, 46400), array(0, 2, 7, 46752), array(6, 1, 28, 38608), array(0, 2, 16, 38320),
      array(0, 2, 5, 18864), array(4, 1, 25, 42168), array(0, 2, 13, 42160), array(10, 2, 2, 45656), array(0, 2, 20, 27216), array(0, 2, 9, 27968),
      array(6, 1, 29, 44448), array(0, 2, 17, 43872), array(0, 2, 6, 38256), array(5, 1, 27, 18808), array(0, 2, 15, 18800), array(0, 2, 4, 25776),
      array(3, 1, 23, 27216), array(0, 2, 10, 59984), array(8, 1, 31, 27432), array(0, 2, 19, 23232), array(0, 2, 7, 43872), array(5, 1, 28, 37736),
      array(0, 2, 16, 37600), array(0, 2, 5, 51552), array(4, 1, 24, 54440), array(0, 2, 12, 54432), array(0, 2, 1, 55888), array(2, 1, 22, 23208),
      array(0, 2, 9, 22176), array(7, 1, 29, 43736), array(0, 2, 18, 9680), array(0, 2, 7, 37584), array(5, 1, 26, 51544), array(0, 2, 14, 43344),
      array(0, 2, 3, 46240), array(4, 1, 23, 46416), array(0, 2, 10, 44368), array(9, 1, 31, 21928), array(0, 2, 19, 19360), array(0, 2, 8, 42416),
      array(6, 1, 28, 21176), array(0, 2, 16, 21168), array(0, 2, 5, 43312), array(4, 1, 25, 29864), array(0, 2, 12, 27296), array(0, 2, 1, 44368),
      array(2, 1, 22, 19880), array(0, 2, 10, 19296), array(6, 1, 29, 42352), array(0, 2, 17, 42208), array(0, 2, 6, 53856), array(5, 1, 26, 59696),
      array(0, 2, 13, 54576), array(0, 2, 3, 23200), array(3, 1, 23, 27472), array(0, 2, 11, 38608), array(11, 1, 31, 19176), array(0, 2, 19, 19152),
      array(0, 2, 8, 42192), array(6, 1, 28, 53848), array(0, 2, 15, 53840), array(0, 2, 4, 54560), array(5, 1, 24, 55968), array(0, 2, 12, 46496),
      array(0, 2, 1, 22224), array(2, 1, 22, 19160), array(0, 2, 10, 18864), array(7, 1, 30, 42168), array(0, 2, 17, 42160), array(0, 2, 6, 43600),
      array(5, 1, 26, 46376), array(0, 2, 14, 27936), array(0, 2, 2, 44448), array(3, 1, 23, 21936), array(0, 2, 11, 37744), array(8, 2, 1, 18808),
      array(0, 2, 19, 18800), array(0, 2, 8, 25776), array(6, 1, 28, 27216), array(0, 2, 15, 59984), array(0, 2, 4, 27424), array(4, 1, 24, 43872),
      array(0, 2, 12, 43744), array(0, 2, 2, 37600), array(3, 1, 21, 51568), array(0, 2, 9, 51552), array(7, 1, 29, 54440), array(0, 2, 17, 54432),
      array(0, 2, 5, 55888), array(5, 1, 26, 23208), array(0, 2, 14, 22176), array(0, 2, 3, 42704), array(4, 1, 23, 21224), array(0, 2, 11, 21200),
      array(8, 1, 31, 43352), array(0, 2, 19, 43344), array(0, 2, 7, 46240), array(6, 1, 27, 46416), array(0, 2, 15, 44368), array(0, 2, 5, 21920),
      array(4, 1, 24, 42448), array(0, 2, 12, 42416), array(0, 2, 2, 21168), array(3, 1, 22, 43320), array(0, 2, 9, 26928), array(7, 1, 29, 29336),
      array(0, 2, 17, 27296), array(0, 2, 6, 44368), array(5, 1, 26, 19880), array(0, 2, 14, 19296), array(0, 2, 3, 42352), array(4, 1, 24, 21104),
      array(0, 2, 10, 53856), array(8, 1, 30, 59696), array(0, 2, 18, 54560), array(0, 2, 7, 55968), array(6, 1, 27, 27472), array(0, 2, 15, 22224),
      array(0, 2, 5, 19168), array(4, 1, 25, 42216), array(0, 2, 12, 42192), array(0, 2, 1, 53584), array(2, 1, 21, 55592), array(0, 2, 9, 54560)
    );

    /**
     * 將陽曆轉換為陰曆
     * @param year 公曆-年
     * @param month 公曆-月
     * @param date 公曆-日
     */
    public static function convertSolarToLunar($year, $month, $date)
    {//debugger;
        $yearData = $this->lunarInfo[$year - $this->MIN_YEAR];
        if ($year == $this->MIN_YEAR && $month <= 2 && $date <= 9) {
            return array(1891, '正月', '初一', '辛卯', 1, 1, '兔');
        }
        return $this->getLunarByBetween($year, $this->getDaysBetweenSolar($year, $month, $date, $yearData[1], $yearData[2]));
    }

    public static function convertSolarMonthToLunar($year, $month, $date)
    {
        $yearData = $this->lunarInfo[$year - $this->MIN_YEAR];
        if ($year == $this->MIN_YEAR && $month <= 2 && $date <= 9) {
            return array(1891, '正月', '初一', '辛卯', 1, 1, '兔');
        }
        $month_days_ary = array(31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31);
        $dd = $month_days_ary[$month];
        if ($this->isLeapYear($year) && $month == 2) $dd++;
        $lunar_ary = array();
        for ($i = 1; $i < $dd; $i++) {
            $array = $this->getLunarByBetween($year, $this->getDaysBetweenSolar($year, $month, $i, $yearData[1], $yearData[2]));
            $array[] = $year . '-' . $month . '-' . $i;
            $lunar_ary[$i] = $array;
        }
        return $lunar_ary;
    }

    /**
     * 將陰曆轉換為陽曆
     * @param year 陰曆-年
     * @param month 陰曆-月，閏月處理：例如如果當年閏五月，那麼第二個五月就傳六月，相當於陰曆有13個月，只是有的時候第13個月的天數為0
     * @param date 陰曆-日
     */
    public static function convertLunarToSolar($year, $month, $date)
    {
        $yearData = $this->lunarInfo[$year - $this->MIN_YEAR];
        $between = $this->getDaysBetweenLunar($year, $month, $date);
        $res = mktime(0, 0, 0, $yearData[1], $yearData[2], $year);
        $res = date('Y-m-d', $res + $between * 24 * 60 * 60);
        $day = explode('-', $res);
        $year = $day[0];
        $month = $day[1];
        $day = $day[2];
        return array($year, $month, $day);
    }

    /**
     * 判斷是否是閏年
     * @param year
     */
    public static function isLeapYear($year)
    {
        return (($year % 4 == 0 && $year % 100 != 0) || ($year % 400 == 0));
    }

    /**
     * 獲取干支紀年
     * @param year
     */
    public static function getLunarYearName($year)
    {
        $sky = array('庚', '辛', '壬', '癸', '甲', '乙', '丙', '丁', '戊', '己');
        $earth = array('申', '酉', '戌', '亥', '子', '醜', '寅', '卯', '辰', '巳', '午', '未');
        $year = $year . '';
        return $sky[$year{3}] . $earth[$year % 12];
    }

    /**
     * 根據陰曆年獲取生肖
     * @param year 陰曆年
     */
    public static function getYearZodiac($year)
    {
        $zodiac = array('猴', '雞', '狗', '豬', '鼠', '牛', '虎', '兔', '龍', '蛇', '馬', '羊');
        return $zodiac[$year % 12];
    }

    /**
     * 獲取陽曆月份的天數
     * @param year 陽曆-年
     * @param month 陽曆-月
     */
    public static function getSolarMonthDays($year, $month)
    {
        $monthHash = array('1' => 31, '2' => $this->isLeapYear($year) ? 29 : 28, '3' => 31, '4' => 30, '5' => 31, '6' => 30, '7' => 31, '8' => 31, '9' => 30, '10' => 31, '11' => 30, '12' => 31);
        return $monthHash["$month"];
    }

    /**
     * 獲取陰曆月份的天數
     * @param year 陰曆-年
     * @param month 陰曆-月，從一月開始
     */
    public static function getLunarMonthDays($year, $month)
    {
        $monthData = $this->getLunarMonths($year);
        return $monthData[$month - 1];
    }

    /**
     * 獲取陰曆每月的天數的數組
     * @param year
     */
    public static function getLunarMonths($year)
    {
        $yearData = $this->lunarInfo[$year - $this->MIN_YEAR];
        $leapMonth = $yearData[0];
        $bit = decbin($yearData[3]);
        for ($i = 0; $i < strlen($bit); $i++) {
            $bitArray[$i] = substr($bit, $i, 1);
        }
        for ($k = 0, $klen = 16 - count($bitArray); $k < $klen; $k++) {
            array_unshift($bitArray, '0');
        }
        $bitArray = array_slice($bitArray, 0, ($leapMonth == 0 ? 12 : 13));
        for ($i = 0; $i < count($bitArray); $i++) {
            $bitArray[$i] = $bitArray[$i] + 29;
        }
        return $bitArray;
    }

    /**
     * 獲取農曆每年的天數
     * @param year 農曆年份
     */
    public static function getLunarYearDays($year)
    {
        $yearData = $this->lunarInfo[$year - $this->MIN_YEAR];
        $monthArray = $this->getLunarYearMonths($year);
        $len = count($monthArray);
        return ($monthArray[$len - 1] == 0 ? $monthArray[$len - 2] : $monthArray[$len - 1]);
    }

    public static function getLunarYearMonths($year)
    {//debugger;
        $monthData = $this->getLunarMonths($year);
        $res = array();
        $temp = 0;
        $yearData = $this->lunarInfo[$year - $this->MIN_YEAR];
        $len = ($yearData[0] == 0 ? 12 : 13);
        for ($i = 0; $i < $len; $i++) {
            $temp = 0;
            for ($j = 0; $j <= $i; $j++) {
                $temp += $monthData[$j];
            }
            array_push($res, $temp);
        }
        return $res;
    }

    /**
     * 獲取閏月
     * @param year 陰曆年份
     */
    public static function getLeapMonth($year)
    {
        $yearData = $this->lunarInfo[$year - $this->MIN_YEAR];
        return $yearData[0];
    }

    /**
     * 計算陰曆日期與正月初一相隔的天數
     * @param year http://www.phpernote.com/
     * @param month
     * @param date
     */
    public static function getDaysBetweenLunar($year, $month, $date)
    {
        $yearMonth = $this->getLunarMonths($year);
        $res = 0;
        for ($i = 1; $i < $month; $i++) {
            $res += $yearMonth[$i - 1];
        }
        $res += $date - 1;
        return $res;
    }

    /**
     * 計算2個陽曆日期之間的天數
     * @param year 陽曆年
     * @param cmonth
     * @param cdate
     * @param dmonth 陰曆正月對應的陽曆月份
     * @param ddate 陰曆初一對應的陽曆天數
     */
    public static function getDaysBetweenSolar($year, $cmonth, $cdate, $dmonth, $ddate)
    {
        $a = mktime(0, 0, 0, $cmonth, $cdate, $year);
        $b = mktime(0, 0, 0, $dmonth, $ddate, $year);
        return ceil(($a - $b) / 24 / 3600);
    }

    /**
     * 根據距離正月初一的天數計算陰曆日期
     * @param year 陽曆年
     * @param between 天數
     */
    public static function getLunarByBetween($year, $between)
    {//debugger;
        $lunarArray = array();
        $yearMonth = array();
        $t = 0;
        $e = 0;
        $leapMonth = 0;
        $m = '';
        if ($between == 0) {
            array_push($lunarArray, $year, '正月', '初一');
            $t = 1;
            $e = 1;
        } else {
            $year = $between > 0 ? $year : ($year - 1);
            $yearMonth = $this->getLunarYearMonths($year);
            $leapMonth = $this->getLeapMonth($year);
            $between = $between > 0 ? $between : ($this->getLunarYearDays($year) + $between);
            for ($i = 0; $i < 13; $i++) {
                if ($between == $yearMonth[$i]) {
                    $t = $i + 2;
                    $e = 1;
                    break;
                } else if ($between < $yearMonth[$i]) {
                    $t = $i + 1;
                    $e = $between - (empty($yearMonth[$i - 1]) ? 0 : $yearMonth[$i - 1]) + 1;
                    break;
                }
            }
            $m = ($leapMonth != 0 && $t == $leapMonth + 1) ? ('閏' . $this->getCapitalNum($t - 1, true)) : $this->getCapitalNum(($leapMonth != 0 && $leapMonth + 1 < $t ? ($t - 1) : $t), true);
            array_push($lunarArray, $year, $m, $this->getCapitalNum($e, false));
        }
        array_push($lunarArray, $this->getLunarYearName($year));// 天干地支
        $t = ($leapMonth > 0 && $leapMonth < $t) ? $t - 1 : $t;
        array_push($lunarArray, $t, $e);
        array_push($lunarArray, $this->getYearZodiac($year));// 12生肖
        array_push($lunarArray, $leapMonth);// 閏幾月
        return $lunarArray;
    }

    /**
     * 獲取數字的陰曆叫法
     * @param num 數字
     * @param isMonth 是否是月份的數字
     */
    public static function getCapitalNum($num, $isMonth)
    {
        $isMonth = $isMonth || false;
        $dateHash = array('0' => '', '1' => '一', '2' => '二', '3' => '三', '4' => '四', '5' => '五', '6' => '六', '7' => '七', '8' => '八', '9' => '九', '10' => '十 ');
        $monthHash = array('0' => '', '1' => '正月', '2' => '二月', '3' => '三月', '4' => '四月', '5' => '五月', '6' => '六月', '7' => '七月', '8' => '八月', '9' => '九月', '10' => '十月', '11' => '冬月', '12' => '臘月');
        $res = '';
        if ($isMonth) {
            $res = $monthHash[$num];
        } else {
            if ($num <= 10) {
                $res = '初' . $dateHash[$num];
            } else if ($num > 10 && $num < 20) {
                $res = '十' . $dateHash[$num - 10];
            } else if ($num == 20) {
                $res = "二十";
            } else if ($num > 20 && $num < 30) {
                $res = "廿" . $dateHash[$num - 20];
            } else if ($num == 30) {
                $res = "三十";
            }
        }
        return $res;
    }
}

//header("Content-Type:text/html;charset=utf-8");
//$lunar=new Lunar();//http://www.phpernote.com/php-function/867.html
//echo '<pre>';
//for($m = 1; $m <= 12; $m++){
//    $month=$lunar->convertSolarToLunar(2009,$m,29);//將陽曆轉換為陰曆
//    print_r($month);
//}

