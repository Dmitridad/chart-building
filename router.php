<?php

switch ($_POST['mySelect']) {
	case 'all':
		header('Location: http://beeline.test/index.php');
		break;
	case 'min':
		header('Location: http://beeline.test/pages/indexByMin.php');
		break;
	case 'hour':
		header('Location: http://beeline.test/pages/indexByHour.php');
		break;
	case 'day':
		header('Location: http://beeline.test/pages/indexByDay.php');
		break;
	default:
		echo "Файл не найден!";
		break;
}