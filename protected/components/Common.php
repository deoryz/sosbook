<?php
/**
 * Common functions
 * 
 * @author Deory Pandu
 * @link http://con.cept.me
 */
class Common {

    public static function mail($config = array())
    {
        // bila from tidak di setting
        $config['from'] = ($config['from']=='')?'info@surabayaspineclinic.com':$config['from'];
        $config['bcc'] = ( empty($config['bcc']) )? array('deoryzpandu@gmail.com'):$config['bcc'];

        $config['to'] = ($config['to']=='')?'ibnudrift@gmail.com':$config['to'];
        // echo $config['to']."<br>";
        // echo $config['message'];
        // exit;
        // self::mailMail($config['to'], $config['from'], $config['subject'], $config['message'], $config['cc'], $config['bcc']);
        
        
        self::mailPhpMailer($config['to'], $config['from'], $config['subject'], $config['message'], $config['cc'], $config['bcc']);
        


        // self::mailSmtp($config['to'], $config['from'], $config['subject'], $config['message'], $config['cc'], $config['bcc']);
        // self::mailTest();
    }
    public static function mailMail($to=array(), $from='', $subject='', $message='', $cc=array(), $bcc=array())
    {
        // multiple recipients
        $to = ( is_array($to) )? implode(', ', $to) : $to;
        $cc = ( is_array($cc) )? implode(', ', $cc) : $cc;
        $bcc = ( is_array($bcc) )? implode(', ', $bcc) : $bcc;
        //$to = 'deory <deoryzpandu@gmail.com>';
        //$from = 'no-reply <no-reply@waroeng.web.id>';
        // To send HTML mail, the Content-type header must be set
        $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

        // Additional headers
        $headers .= 'To: ' . $to . " \r\n";
        $headers .= 'From: ' . $from . " \r\n";
        if ($cc!='') {
        $headers .= 'Cc: '. $cc . " \r\n";
        }
        if ($bcc!='') {
        $headers .= 'Bcc: '. $bcc . " \r\n";
        }

        // Mail it
        mail($to, $subject, $message, $headers);
    }
     public function mailSmtp($to=array(), $from='', $subject='', $message='', $cc=array(), $bcc=array())
    {
            $to = ( is_array($to) )? implode(', ', $to) : $to;
            $cc = ( is_array($cc) )? implode(', ', $cc) : $cc;
            $bcc = ( is_array($bcc) )? implode(', ', $bcc) : $bcc;

            $tujuan = "ibnudrift@gmail.com";

            Yii::import('application.extensions.phpmailer.JPhpMailer');
            $mail = new JPhpMailer;
            
            $mail->IsSMTP();  // telling the class to use SMTP
            $mail->Mailer = "smtp";
            $mail->Host = "ssl://smtp.gmail.com";
            $mail->Port = 465;
            $mail->SMTPAuth = true; // turn on SMTP authentication
            $mail->Username = "username"; // SMTP username
            $mail->Password = "password"; // SMTP password 
            
            $mail->ClearAddresses();

            $mail->AddAddress($tujuan, $tujuan);

            $mail->From = 'deo@waroeng.web.id';
            $mail->FromName = 'deo@waroeng.web.id';
            $mail->AddReplyTo($from, $from);
            $mail->Html = TRUE;
            $mail->Subject = $subject;
            $mail->MsgHTML($message);
            $mail->Send();
    }

    public function mailPhpMailer($to=array(), $from='', $subject='', $message='', $cc=array(), $bcc=array())
    {

        Yii::import('application.extensions.phpmailer.JPhpMailer');
        $mail = new JPhpMailer;
        if (is_array($to)) {
            foreach ($to as $key => $value) {
                $mail -> AddReplyTo($value, "Client");
                $mail -> AddAddress($value, "Client");
            }
        }else{
            if ($to != '') {
                $mail -> AddReplyTo($to, "Client");
                $mail -> AddAddress($to, "Client");
            }
        }
        if (is_array($cc)) {
            foreach ($cc as $key => $value) {
                $mail -> AddReplyTo($value, "Client");
                $mail -> AddAddress($value, "Client");
            }
        }else{
            if ($cc != '') {
                $mail -> AddReplyTo($cc, "Client");
                $mail -> AddAddress($cc, "Client");
            }
        }
        if (is_array($bcc)) {
            foreach ($bcc as $key => $value) {
                $mail -> AddReplyTo($value, "Client");
                $mail -> AddAddress($value, "Client");
            }
        }else{
            if ($bcc != '') {
                $mail -> AddReplyTo($bcc, "Client");
                $mail -> AddAddress($bcc, "Client");
            }
        }

        // $mail->IsSMTP();  // telling the class to use SMTP
        $mail->Mailer = "mail";
        // $mail->Host = "ssl://smtp.gmail.com";
        // $mail->Port = 465;
        // $mail->SMTPAuth = true; // turn on SMTP authentication
        // $mail->Username = "deo@waroeng.web.id"; // SMTP username
        // $mail->Password = "markdesignmantapdeo"; // SMTP password 

        $mail -> SetFrom($from, 'No Reply');
        $mail -> Subject = $subject;
        $mail -> AltBody = "To view the message, please use an HTML compatible email viewer!";
        $mail -> MsgHTML($message);
        $mail->Send();
    }

    public function mailTest()
    {
        // multiple recipients
        // $to  = 'deoryzpandu@gmail.com' . ', '; // note the comma
        $to .= 'deoryzpandu@gmail.com';

        // subject
        $subject = 'Birthday Reminders for August';

        // message
        $message = '
        <html>
        <head>
          <title>Birthday Reminders for August</title>
        </head>
        <body>
          <p>Here are the birthdays upcoming in August!</p>
          <table>
            <tr>
              <th>Person</th><th>Day</th><th>Month</th><th>Year</th>
            </tr>
            <tr>
              <td>Joe</td><td>3rd</td><td>August</td><td>1970</td>
            </tr>
            <tr>
              <td>Sally</td><td>17th</td><td>August</td><td>1973</td>
            </tr>
          </table>
        </body>
        </html>
        ';

        // To send HTML mail, the Content-type header must be set
        $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

        // Additional headers
        $headers .= 'To: deory <deoryzpandu@gmail.com>' . "\r\n";
        $headers .= 'From: no-reply <no-reply@waroeng.web.id>' . "\r\n";
        // $headers .= 'Cc: birthdayarchive@example.com' . "\r\n";
        // $headers .= 'Bcc: birthdaycheck@example.com' . "\r\n";

        // Mail it
        mail($to, $subject, $message, $headers);
        exit;
    }

    static public function checkAccess($akses)
    {
        $auth = User::model()->getUserAccess();
        // print_r($akses);echo '|';print_r($auth);echo '|';

        if (isset($auth[$akses]) OR $auth == 'All'){
            return true;
        }else{
            return false;
        }
    }

    static public function createFormDatePick($label='', $name='Date', $type='date', $value = '')
    {
        $value = strtotime($value);
        if ($value == 0) {
            $value = strtotime('1910-01-01 00:00:00');
        }

        // Create Year
        $createYear = '<select name="'.$name.'[year]" style="width: auto;">';
        for ($i=date("Y")+10; $i >= date("Y") - 100 ; $i--) { 
            $createYear .= '<option value="'.$i.'" '.((date('Y', $value) == $i) ? 'selected="selected"' : '').'>'.$i.'</option>';
        }
        $createYear .= '</select>';

        // Create month
        $createMonth = '<select name="'.$name.'[month]" style="width: auto;">';
        for ($i=1; $i <= 12 ; $i++) { 
            $createMonth .= '<option value="'.substr('00'.$i, -2).'" '.((date('m', $value) == $i) ? 'selected="selected"' : '').'>'.substr('00'.$i, -2).'</option>';
        }
        $createMonth .= '</select>';

        // Create Date
        $createDate = '<select name="'.$name.'[date]" style="width: auto;">';
        for ($i=1; $i <= 31 ; $i++) { 
            $createDate .= '<option value="'.substr('00'.$i, -2).'" '.((date('d', $value) == $i) ? 'selected="selected"' : '').'>'.substr('00'.$i, -2).'</option>';
        }
        $createDate .= '</select>';

        // Create Date
        $createHours = '<input type="text" name="'.$name.'[hours]" value="'.date('H', $value).'" style="width: 20px;"/>';

        // Create Minute
        $createMinute = '<input type="text" name="'.$name.'[minute]" value="'.date('i', $value).'" style="width: 20px;"/>';

        // Create Second
        $createSecond = '<input type="text" name="'.$name.'[second]" value="'.date('s', $value).'" style="width: 20px;"/>';



        $str = '
        <div class="control-group">
            <label for="" class="control-label">
                '.$label.'
            </label>
            <div class="controls">
                '.$createDate.$createMonth.$createYear.$createHours.$createMinute.$createSecond.'
            </div>
        </div>
        ';

        return $str;
    }
}