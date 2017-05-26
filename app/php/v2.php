<?php

if(isset($_POST['submit']))
{
    //Утюжим пришедшие данные
    $test = inform::emp($_POST['type'], 'Поле Тип не может быть пустым!');

    if($test){

        $in = new hospital();
        $in->type = $_POST['type'];
        $in->download();
    }
}