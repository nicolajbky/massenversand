<!DOCTYPE html>
<html lang="de">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Massenversand</title>
  </head>
  <body>
    <!-- Sichtbarer Dokumentinhalt im body -->
    <h1>GESENDET?</h1>

      <?php

      $gateway = "https://gate1.goyyamobile.com/sms/sendsms.asp?";

      $receiver = $_POST['receiver'];
      $startdate_ = $_POST['startdate'];
      $enddate_ = $_POST['enddate'];
      $msg_time = $_POST['time'];
      $msg = $_POST['message'];
      $userID = $_POST['userID'];
      $pwd = $_POST['password'];
      $test = $_POST['test'];
      $sender = $_POST['sender'];

      $startdate_ = $startdate_." ".$msg_time.":00";
      $enddate_   = $enddate_. " ".$msg_time.":00";


      echo "<b>Receiver:</b> ". $receiver. "<br>";
      echo "<b>startdate:</b> ". $startdate_ . "<br>";
      echo "<b>enddate:</b> ". $enddate_ . "<br>";
      echo "<b>message:</b> ". $msg. "<br>";
      //echo "<b>userID:</b> ". $userID . "<br>";
      //echo "<b>password:</b> ". $pwd . "<br>";
      echo "<b>test:</b> ". $test . "<br>";

      $format = 'Y-m-d H:i:s';
      $startdate = DateTime::createFromFormat($format, $startdate_);
      $enddate = DateTime::createFromFormat($format, $enddate_);
      //echo $startdate->format('Y-m-d H:i:s') . "<br>";
      //echo $enddate->format('Y-m-d H:i:s') . "<br>";
      $difference= $enddate->diff($startdate);
      //var_dump($difference);
      $duration = $difference->{'days'};

      echo "<b>Dauer:</b> ". $duration . " Tage<br><br>";
      echo "<b>SMS:</b><br> ";

      function SMS_anlegen($URL)
      {
        //echo $URL."<br>";
        $req = curl_init();
        curl_setopt($req, CURLOPT_URL,$URL);
        curl_exec($req);
        echo "<br><br>";

      }



      $SMSdate = date_format($startdate, 'HidmY');
      echo "<b>" .  date_format($startdate, 'd.m.Y H:i'). ":</b> ";
      $URL = $gateway."receiver=".$receiver."&sender=".$sender."&time=".$SMSdate."&msg=".urlencode($msg)."&id=".$userID."&pw=".$pwd."&msgtype=t&tarif=PM&getID=1&countMsg=1&test=".$test;
      //echo $URL;
      SMS_anlegen($URL);

      for ($i=0; $i < $duration; $i++) {

        date_add($startdate, date_interval_create_from_date_string('1 days'));
        //echo date_format($startdate, 'Y-m-d H:i').": ";
        $SMSdate = date_format($startdate, 'HidmY');
        echo "<b>" .  date_format($startdate, 'd.m.Y H:i').":</b> ";
        $URL = $gateway."receiver=".$receiver."&sender=".$sender."&time=".$SMSdate."&msg=".urlencode($msg)."&id=".$userID."&pw=".$pwd."&msgtype=t&tarif=PM&getID=1&countMsg=1&test=".$test;
        //echo $URL;
        SMS_anlegen($URL);

      }





      ?>




</body>
</html>
