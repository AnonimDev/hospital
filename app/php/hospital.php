<?php


class hospital
{
    public $number;
    public $type;
    public $locality;
    public $dress;
    public $time_1;
    public $time_2;
    private $db;


    private function msql(){
        //Mysqli подключение
        $this->db = mysqli_connect( DBSERVER, DBUSER, DBPASSWORD, DATABASE ) or die(ERROR_CONNECT);
        if (!mysqli_set_charset($this->db, "utf8"));

    }
    private function security_input($data){
        $this->msql();
        $data = $this->db->real_escape_string($data);
        return $data;
    }
    
    public function in(){

        $this->number = $this->security_input($this->number);
        $this->type = $this->security_input($this->type);
        $this->locality = $this->security_input($this->locality);
        $this->dress = $this->security_input($this->dress);
        $this->time_1 = $this->security_input($this->time_1);
        $this->time_2 = $this->security_input($this->time_2);

        if(is_numeric($this->number)){
            switch ($this->time_1){
                case '6':
                    $this->time_1 = '6:00';
                    break;
                case '7':
                    $this->time_1 = '7:00';
                    break;
                case '8':
                    $this->time_1 = '8:00';
                    break;
                case '9':
                    $this->time_1 = '9:00';
                    break;
                case '10':
                    $this->time_1 = '10:00';
                    break;
            }

            switch ($this->time_2){
                case '16':
                    $this->time_2 = '16:00';
                    break;
                case '17':
                    $this->time_2 = '17:00';
                    break;
                case '18':
                    $this->time_2 = '18:00';
                    break;
                case '19':
                    $this->time_2 = '19:00';
                    break;
                case '20':
                    $this->time_2 = '20:00';
                    break;
                case '21':
                    $this->time_2 = '21:00';
                    break;
            }

            $res = $this->db->query("SELECT `id` FROM `hospital_all` WHERE `number` = '$this->number'") or die($this->db->error);
            if($res->num_rows > 0){
               echo inform::showErrorMessage('К сожалению Больница: <b>'. $this->number .'</b> уже есть в базе!');
            }
            else{
                $this->db->query("INSERT INTO `hospital_all` (`id`, `number`, `type`, `locality`, `address`, `time`) VALUES (NULL, '{$this->number}', '{$this->type}', '{$this->locality}', '{$this->dress}', '{$this->time_1}-{$this->time_2}')") or die($this->db->error);
                echo inform::showSuccessMessage('Запись успешно добавлена в базу данных');
            }
        } else inform::showErrorMessage('В поле Номер могут быть только цифры');
    }
    
    private function out($text){
        $this->number = $this->security_input($this->number);

        if(is_numeric($this->number)){

            $res = $this->db->query("SELECT * FROM `hospital_all` WHERE `number` = '$this->number'") or die($this->db->error);
            if($res->num_rows > 0){
                $row = $res->fetch_assoc();
                $number = $row['number'];
                $locality = $row['locality'];
                $dress = $row['address'];
                $type = $row['type'];
                $type = $this->db->query("SELECT * FROM `hospital_type` WHERE `id` = '$type'") or die($this->db->error);
                $type_row = $type->fetch_assoc();
                $type = $type_row['type'];
                $time = $row['time'];
                echo inform::showSuccessTable($number, $type, $time, $locality, $dress, $text);
            }
            else
            {
                echo inform::showErrorMessage('Больница с номером <b>'. $this->number .'</b> отсутствует в базе! ');;
            }
        }
        else
        {
            echo inform::showErrorMessage('В поле Номер могут быть только цифры');
        }
    }

    public function get(){
        $this->out(false);
    }

    public function download()
    {

        $this->type = $this->security_input($this->type);

        $res = $this->db->query("SELECT * FROM `hospital_all` WHERE `type` = '$this->type' ORDER BY '$this->number' ASC") or die($this->db->error);
        if ($res->num_rows > 0) {
            $str = '----------------------' . "\r\n";
            while ($row = $res->fetch_assoc()) {
                $number = $row['number'];
                $locality = $row['locality'];
                $dress = $row['address'];
                $type = $this->db->query("SELECT * FROM `hospital_type` WHERE `id` = '$this->type'") or die($this->db->error);
                $type_row = $type->fetch_assoc();
                $type = $type_row['type'];
                $time = $row['time'];
                $str .= inform::showSuccessTable($number, $type, $time, $locality, $dress, true);
            }
            $file = uniqid();
            $file .= '.txt';
            file_put_contents($file, $str);
            ob_end_clean();
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename=1' . $file);
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize($file));
            readfile($file);
            unlink($file);
            exit;
        }
        else
        {
            echo inform::showErrorMessage('Записи с указанными параметрами не найдены!');
        }
    }
}