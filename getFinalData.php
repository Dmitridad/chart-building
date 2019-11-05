<?php

require_once('database/db.php');

$dbObj = new Database();

switch ($_POST[0]) {
		case 'all':
		$selectResult = $dbObj->makeSelect("SELECT beeline_value, mf_value, mts_value, time_key FROM charts_data");
		break;
	case 'min':
		$selectResult = $dbObj->makeSelect("SELECT beeline_value, mf_value, mts_value, MINUTE(time_key) AS time_key FROM charts_data
		ORDER BY time_key");
		break;
	case 'hour':
		$selectResult = $dbObj->makeSelect("SELECT beeline_value, mf_value, mts_value, HOUR(time_key) AS time_key FROM charts_data
		ORDER BY time_key");
		break;
	case 'day':
		$selectResult = $dbObj->makeSelect("SELECT beeline_value, mf_value, mts_value, DAY(time_key) AS time_key FROM charts_data
		ORDER BY time_key");
		break;
	default:
		echo "error";
		break;
}

$selectResult = $selectResult->fetchAll();

$dataArray = ['beeline' => array(), 'mf' => array(), 'mts' => array(), 'time' => array()];

foreach ($selectResult as $key => $value) {
	$dataArray['beeline'][] = $value['beeline_value'];
	$dataArray['mf'][] = $value['mf_value'];
	$dataArray['mts'][] = $value['mts_value'];
	$dataArray['time'][] = $value['time_key'];
}

if ($_POST[0] == 'all') {
	$dataArray = json_encode($dataArray);
	return;
}

$dataArray['beeline'] = getAvgValArr($dataArray['time'], $dataArray['beeline']);
$dataArray['mf'] = getAvgValArr($dataArray['time'], $dataArray['mf']);
$dataArray['mts'] = getAvgValArr($dataArray['time'], $dataArray['mts']);

$time_key = array_unique($dataArray['time']);
$newTimeKey = array();
foreach ($time_key as $key => $value) {
	$newTimeKey[] = $value;
}
$dataArray['time'] = $newTimeKey;
$dataArray = json_encode($dataArray);

function getAvgValArr($time_key, $operatorData) {

	$flag = null;
	$test_value = null;
	$indexArr = array();
	$averageArr = array();
	$average=null;
	$newAvgArr = array();

	foreach ($time_key as $timeKey => $timeValue) {
		if ($test_value == $timeValue or $timeKey == 0) {

			$flag = true;
			$test_value = $timeValue;
			$indexArr[] = $timeKey;

			if ($timeKey == count($time_key) - 1) {
				foreach ($indexArr as $key => $value) {
					$averageArr[] = $operatorData[$value];
				}

				$average = array_sum($averageArr)/count($averageArr);
				$averageArr = array();
				$newAvgArr[] = $average;
			}

		} else $flag = false;

		if ($flag == false and count($indexArr) > 1) {
			foreach ($indexArr as $key => $value) {
				$averageArr[] = $operatorData[$value];
			}

			$average = array_sum($averageArr)/count($averageArr);
			$averageArr = array();
			
			$newAvgArr[] = $average;

			$test_value = $timeValue;
			$indexArr = array();
			$indexArr[] = $timeKey;


		if ($timeKey == count($time_key) - 1) {
				$newAvgArr[] = $operatorData[$indexArr[0]];
			}
		} else if ($flag == false and count($indexArr) == 1) {
			
			$newAvgArr[] = $operatorData[$indexArr[0]];
			$test_value = $timeValue;
			$indexArr = array();
			$indexArr[] = $timeKey;

			if ($timeKey == count($time_key) - 1) {
				$newAvgArr[] = $operatorData[$indexArr[0]];
			}
		}
	}

	return $newAvgArr;
}

