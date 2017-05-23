<?php


if(isset($_POST['submit']))
{
    //Утюжим пришедшие данные
    $test = array();
    $test[] = inform::emp($_POST['number'], 'Поле Номер не может быть пустым!');
    $test[] = inform::emp($_POST['type'], 'Поле Тип не может быть пустым!');
    $test[] = inform::emp($_POST['locality'], 'Поле Район не может быть пустым!');
    $test[] = inform::emp($_POST['dress'], 'Поле Адрес не может быть пустым!');
    $test[] = inform::emp($_POST['time-1'], 'Поле Время не может быть пустым!');
    $test[] = inform::emp($_POST['time-2'], 'Поле Время не может быть пустым!');


    if($test['0'] and $test['1'] and $test['2'] and $test['3'] and $test['4'] and $test['5']){
       
        $in = new hospital();
        $in->number = $_POST['number'];
        $in->type = $_POST['type'];
        $in->locality = $_POST['locality'];
        $in->dress = $_POST['dress'];
        $in->time_1 = $_POST['time-1'];
        $in->time_2 = $_POST['time-2'];
        $in->in();
    }
}
