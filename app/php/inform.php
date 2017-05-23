<?php


class inform
{
    static public function emp($per, $text){
        if(empty($per)) {
            echo self::showErrorMessage($text);
            return false;
        } else return true;
    }
    
    static public function showSuccessMessage($data)
    {
        $suc = '<p>'."\n";
        if(is_array($data))
        {
            foreach($data as $val)
                $suc .= '<h4 style="color:green;">'. $val .'</h4>'."\n";
        }
        else
            $suc .= '<h4 style="color:green;">'. $data .'</h4>'."\n";

        $suc .= '</p>'."\n";

        return $suc;
    }
 
    static public function showErrorMessage($data)
    {
        $err = '<ul>'."\n";

        if(is_array($data))
        {
            foreach($data as $val)
                $err .= '<li style="color:red;">'. $val .'</li>'."\n";
        }
        else
            $err .= '<li style="color:red;">'. $data .'</li>'."\n";

        $err .= '</ul>'."\n";

        return $err;
    }
    static public function showSuccessTable($number, $type, $time, $text){

        $number = htmlspecialchars($number, ENT_QUOTES);
        $type = htmlspecialchars($type, ENT_QUOTES);
        $time = htmlspecialchars($time, ENT_QUOTES);
        
        if($text){
            $suc = 'Номер больницы:'. $number . "\r\n";
            $suc .= 'Тип больницы:'. $type . "\r\n";
            $suc .= 'Время работы больницы:'. $time . "\r\n";

        }else {
            $suc = '<table align="center" border="1">' . "\n";
            $suc .= '<tr><td>Номер больницы</td><td>Тип больницы</td><td>Часы работы</td></tr>' . "\n";
            $suc .= '<tr><td>' . $number . '</td><td>' . $type . '</td><td>' . $time . '</td></tr>' . "\n";
            $suc .= '</table>' . "\n";
        }
        return $suc;
    }
}