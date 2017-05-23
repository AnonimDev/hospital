<?php

require_once './app/php/hospital.php';
require_once './app/php/inform.php';

//Устанавливаем кодировку и вывод всех ошибок
header('Content-Type: text/html; charset=UTF8');
error_reporting(E_ALL);

include './app/php/config.php';
//include './app/php/db.php';

//Включаем буферизацию содержимого
ob_start();

if (isset($_GET['mode'])) {
    $mode = $_GET['mode'];
    
    switch($mode){
        case 'v1':
            include './app/html/v1.html';
            include './app/php/v1.php';
            break;
        case 'v2':
            include './app/html/v2.html';
            include './app/php/v2.php';
            break;
        case 'v3':
            include './app/html/v3.html';
            include './app/php/v3.php';
            break;
    }
}

//Получаем данные с буфера
$content = ob_get_contents();
ob_end_clean();


//Подключаем наш шаблон
include './app/html/index.html';

?>			