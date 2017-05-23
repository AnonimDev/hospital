<?php

if(isset($_POST['submit']))
{
    //Утюжим пришедшие данные
    $test = inform::emp($_POST['number'], 'Поле Номер не может быть пустым!');

    if($test){

        $in = new hospital();
        $in->number = $_POST['number'];
        $in->download();
    }
}