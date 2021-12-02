<?php
  require_once "layout/header.php";
?>
<?php
  require "phpmailer/src/PHPMailer.php";
  require "phpmailer/src/Exception.php";
  require "phpmailer/src/SMTP.php";

  sendMailToAdmin("configuratore@ggteamwear.com", "configuratore@ggteamwear.com");
  sendMailToUser("configuratore@ggteamwear.com", $_POST["email"]);
  saveOrderToCsvFile();

  function sendMailToAdmin($fromUser, $toUser)
  {
    $mail = new PHPMailer\PHPMailer\PHPMailer(true);

    //Enable SMTP debugging.
    $mail->SMTPDebug = 0;                               
    //Set PHPMailer to use SMTP.
    $mail->isSMTP();            
    //Set SMTP host name                          
    $mail->Host = "smtps.aruba.it";
    //Set this to true if SMTP host requires authentication to send email
    $mail->SMTPAuth = true;                          
    //Provide username and password     
    $mail->Username = 'configuratore@ggteamwear.com';                // SMTP username
    $mail->Password = 'Configura2021!';                           
    //If SMTP requires TLS encryption then set it
    $mail->SMTPSecure = "ssl";                           
    //Set TCP port to connect to
    $mail->Port = 465;                                   

    $mail->setFrom($fromUser, 'GGTEAMWEAR');

    $mail->addAddress($toUser);

    $mail->isHTML(true);

    $mail->Subject = "Nuova richiesta di Configurazione";

    // get order data from main configurations
    if($_POST["selected_order_shirt_1"])
      $shirt_order_detail_1 = json_decode($_POST["selected_order_shirt_1"]);
    if($_POST["selected_order_pants_1"])
      $pants_order_detail_1 = json_decode($_POST["selected_order_pants_1"]);
    if($_POST["selected_order_socks_1"])
      $socks_order_detail_1 = json_decode($_POST["selected_order_socks_1"]);
    if($_POST["selected_order_ball_1"])
      $ball_order_detail_1 = json_decode($_POST["selected_order_ball_1"]);
    if($_POST["selected_order_bags_1"])
      $bags_order_detail_1 = json_decode($_POST["selected_order_bags_1"]);
    if($_POST["selected_order_kits_1"])
      $kits_order_detail_1 = json_decode($_POST["selected_order_kits_1"]);
    if($_POST["selected_order_sleeve_1"])
      $sleeve_order_detail_1 = json_decode($_POST["selected_order_sleeve_1"]);
    if($_POST["selected_order_sweat_1"])
      $sweat_order_detail_1 = json_decode($_POST["selected_order_sweat_1"]);
    if($_POST["selected_order_rainjacket_1"])
      $rainjacket_order_detail_1 = json_decode($_POST["selected_order_rainjacket_1"]);
    if($_POST["selected_order_jacket_1"])
      $jacket_order_detail_1 = json_decode($_POST["selected_order_jacket_1"]);
    if($_POST["selected_order_longpants_1"])
      $longpants_order_detail_1 = json_decode($_POST["selected_order_longpants_1"]);


    if($_POST["selected_order_shirt_2"])
      $shirt_order_detail_2 = json_decode($_POST["selected_order_shirt_2"]);
    if($_POST["selected_order_pants_2"])
      $pants_order_detail_2 = json_decode($_POST["selected_order_pants_2"]);
    if($_POST["selected_order_socks_2"])
      $socks_order_detail_2 = json_decode($_POST["selected_order_socks_2"]);
    if($_POST["selected_order_ball_2"])
      $ball_order_detail_2 = json_decode($_POST["selected_order_ball_2"]);
    if($_POST["selected_order_bags_2"])
      $bags_order_detail_2 = json_decode($_POST["selected_order_bags_2"]);
    if($_POST["selected_order_kits_2"])
      $kits_order_detail_2 = json_decode($_POST["selected_order_kits_2"]);
    if($_POST["selected_order_sleeve_2"])
      $sleeve_order_detail_2 = json_decode($_POST["selected_order_sleeve_2"]);
    if($_POST["selected_order_sweat_2"])
      $sweat_order_detail_2 = json_decode($_POST["selected_order_sweat_2"]);
    if($_POST["selected_order_rainjacket_2"])
      $rainjacket_order_detail_2 = json_decode($_POST["selected_order_rainjacket_2"]);
    if($_POST["selected_order_jacket_2"])
      $jacket_order_detail_2 = json_decode($_POST["selected_order_jacket_2"]);
    if($_POST["selected_order_longpants_2"])
      $longpants_order_detail_2 = json_decode($_POST["selected_order_longpants_2"]);

    if($_POST["selected_order_shirt_3"])
      $shirt_order_detail_3 = json_decode($_POST["selected_order_shirt_3"]);
    if($_POST["selected_order_pants_3"])
      $pants_order_detail_3 = json_decode($_POST["selected_order_pants_3"]);
    if($_POST["selected_order_socks_3"])
      $socks_order_detail_3 = json_decode($_POST["selected_order_socks_3"]);
    if($_POST["selected_order_ball_3"])
      $ball_order_detail_3 = json_decode($_POST["selected_order_ball_3"]);
    if($_POST["selected_order_bags_3"])
      $bags_order_detail_3 = json_decode($_POST["selected_order_bags_3"]);
    if($_POST["selected_order_kits_3"])
      $kits_order_detail_3 = json_decode($_POST["selected_order_kits_3"]);
    if($_POST["selected_order_sleeve_3"])
      $sleeve_order_detail_3 = json_decode($_POST["selected_order_sleeve_3"]);
    if($_POST["selected_order_sweat_3"])
      $sweat_order_detail_3 = json_decode($_POST["selected_order_sweat_3"]);
    if($_POST["selected_order_rainjacket_3"])
      $rainjacket_order_detail_3 = json_decode($_POST["selected_order_rainjacket_3"]);
    if($_POST["selected_order_jacket_3"])
      $jacket_order_detail_3 = json_decode($_POST["selected_order_jacket_3"]);
    if($_POST["selected_order_longpants_3"])
      $longpants_order_detail_3 = json_decode($_POST["selected_order_longpants_3"]);

    $message_admin = '<!DOCTYPE html>
    <html lang="it" xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office" style="font-family: "Montserrat", "Helvetica Neue", Helvetica, Arial, "sans-serif";-webkit-text-size-adjust:100%;-ms-text-size-adjust:100%;padding:0;Margin:0;">
    <head>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:thin,extra-light,light,100,200,300,400,500,600,700,800" rel="stylesheet">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="x-apple-disable-message-reformatting">
    </head>
    <body>
      <div style="text-align: center; max-width: 600px; margin: 0 auto; background-color: #ffffff;">
        <img style="max-width:200px; padding-bottom: 30px;" src="https://www.ggteamwear.com/media/2020/09/logo350px.png">
        <h1 style="font-size: 25px;">Ciao Admin!</h1>
        <h1 style="font-size: 25px;">Un utente ha appena inviato una configurazione</h1>
        <div style="text-align: center; font-size:16px;">
        <p>Di seguito i dettagli:</p>
        <p><b>Nome Società : </b>' . $_POST["company_name"] . '</p>
        <p><b>CAP : </b>' . $_POST["cap_number"] . '</p>
        <p><b>Numero Atleti : </b>' . $_POST["team_person"] . '</p>
        <p><b>Struttura di proprietà : </b>' . $_POST["owner"] . '</p>
        <p><b>Telefono : </b>' . $_POST["telephone"] . '</p>
        <p><b>Email : </b>' . $_POST["email"] . '</p><br>
          <p>Di seguito i dettagli:</p>
          <p><b>Sport : </b>' . $_POST["selected_order_sport"] . '</p>
          <p><b>Gender : </b>' . $_POST["selected_order_gender"] . '</p>
          <p><b>Brand : </b>' . $_POST["selected_order_brand"] . '</p>';

    // create email content from main configurations
    if($_POST["selected_order_typology_1"])
    {
      $message_admin .= '<p><b>Configurazione 1 : </b>' . $_POST["selected_order_typology_1"] .'</p>';
      $total1 = 0;
      if($shirt_order_detail_1)
      {
        $total1 = $total1 + (float)substr($shirt_order_detail_1->price, 3, strlen($shirt_order_detail_1->price));
        $message_admin .= '<p><b>Maglie a maniche corte : </b>' . $shirt_order_detail_1->name . '</p>
              <p><b>Codice Prodotto : </b>' . $shirt_order_detail_1->sku . '</p><p><b>Price : </b>' . iconv("UTF-8", "CP1252", $shirt_order_detail_1->price) . '</p>';
      }

      if($sleeve_order_detail_1)
      {
        $total1 = $total1 + (float)substr($sleeve_order_detail_1->price, 3, strlen($sleeve_order_detail_1->price));
        $message_admin .= '<p><b>Maglie a maniche lunghe : </b>' . $sleeve_order_detail_1->name . '</p>
              <p><b>Codice Prodotto : </b>' . $sleeve_order_detail_1->sku . '</p><p><b>Price : </b>' . iconv("UTF-8", "CP1252", $sleeve_order_detail_1->price) . '</p>';
      }

      if($sweat_order_detail_1)
      {
        $total1 = $total1 + (float)substr($sweat_order_detail_1->price, 3, strlen($sweat_order_detail_1->price));
        $message_admin .= '<p><b>Felpe : </b>' . $sweat_order_detail_1->name . '</p>
              <p><b>Codice Prodotto : </b>' . $sweat_order_detail_1->sku . '</p><p><b>Price : </b>' . iconv("UTF-8", "CP1252", $sweat_order_detail_1->price) . '</p>';
      }

      if($pants_order_detail_1)
      {
        $total1 = $total1 + (float)substr($pants_order_detail_1->price, 3, strlen($pants_order_detail_1->price));
        $message_admin .= '<p><b>Pantaloncini : </b>' . $pants_order_detail_1->name . '</p>
              <p><b>Codice Prodotto : </b>' . $pants_order_detail_1->sku . '</p><p><b>Price : </b>' . iconv("UTF-8", "CP1252", $pants_order_detail_1->price) . '</p>';
      }

      if($longpants_order_detail_1)
      {
        $total1 = $total1 + (float)substr($longpants_order_detail_1->price, 3, strlen($longpants_order_detail_1->price));
        $message_admin .= '<p><b>Pantaloni : </b>' . $longpants_order_detail_1->name . '</p>
              <p><b>Codice Prodotto : </b>' . $longpants_order_detail_1->sku . '</p><p><b>Price : </b>' . iconv("UTF-8", "CP1252", $longpants_order_detail_1->price) . '</p>';
      }

      if($socks_order_detail_1)
      {
        $total1 = $total1 + (float)substr($socks_order_detail_1->price, 3, strlen($socks_order_detail_1->price));
        $message_admin .= '<p><b>Calze : </b>' . $socks_order_detail_1->name . '</p>
              <p><b>Codice Prodotto : </b>' . $socks_order_detail_1->sku . '</p><p><b>Price : </b>' . iconv("UTF-8", "CP1252", $socks_order_detail_1->price) . '</p>';
      }

      if($ball_order_detail_1)
      {
        $total1 = $total1 + (float)substr($ball_order_detail_1->price, 3, strlen($ball_order_detail_1->price));
        $message_admin .= '<p><b>Palloni e Accessori : </b>' . $ball_order_detail_1->name . '</p>
              <p><b>Codice Prodotto : </b>' . $ball_order_detail_1->sku . '</p><p><b>Price : </b>' . iconv("UTF-8", "CP1252", $ball_order_detail_1->price) . '</p>';
      }

      if($bags_order_detail_1)
      {
        $total1 = $total1 + (float)substr($bags_order_detail_1->price, 3, strlen($bags_order_detail_1->price));
        $message_admin .= '<p><b>Zaini e Borse : </b>' . $bags_order_detail_1->name . '</p>
              <p><b>Codice Prodotto : </b>' . $bags_order_detail_1->sku . '</p><p><b>Price : </b>' . iconv("UTF-8", "CP1252", $bags_order_detail_1->price) . '</p>';
      }

      if($kits_order_detail_1)
      {
        $total1 = $total1 + (float)substr($kits_order_detail_1->price, 3, strlen($kits_order_detail_1->price));
        $message_admin .= '<p><b>Tute : </b>' . $kits_order_detail_1->name . '</p>
              <p><b>Codice Prodotto : </b>' . $kits_order_detail_1->sku . '</p><p><b>Price : </b>' . iconv("UTF-8", "CP1252", $kits_order_detail_1->price) . '</p>';
      }

      if($rainjacket_order_detail_1)
      {
        $total1 = $total1 + (float)substr($rainjacket_order_detail_1->price, 3, strlen($rainjacket_order_detail_1->price));
        $message_admin .= '<p><b>Rain Jacket : </b>' . $rainjacket_order_detail_1->name . '</p>
              <p><b>Codice Prodotto : </b>' . $rainjacket_order_detail_1->sku . '</p><p><b>Price : </b>' . iconv("UTF-8", "CP1252", $rainjacket_order_detail_1->price) . '</p>';
      }

      if($jacket_order_detail_1)
      {
        $total1 = $total1 + (float)substr($jacket_order_detail_1->price, 3, strlen($jacket_order_detail_1->price));
        $message_admin .= '<p><b>Giubbotto : </b>' . $jacket_order_detail_1->name . '</p>
              <p><b>Codice Prodotto : </b>' . $jacket_order_detail_1->sku . '</p><p><b>Price : </b>' . iconv("UTF-8", "CP1252", $jacket_order_detail_1->price) . '</p>';
      }
      $message_admin .= '<p><b>Totale : </b>€' . $total1 . '</p>';
    }

    if($_POST["selected_order_typology_2"])
    {
      $message_admin .= '<p><b>Configurazione 2 : </b>' . $_POST["selected_order_typology_2"] .'</p>';
      $total2 = 0;
      if($shirt_order_detail_2)
      {
        $total2 = $total2 + (float)substr($shirt_order_detail_2->price, 3, strlen($shirt_order_detail_2->price));
        $message_admin .= '<p><b>Maglie a maniche corte : </b>' . $shirt_order_detail_2->name . '</p>
              <p><b>Codice Prodotto : </b>' . $shirt_order_detail_2->sku . '</p><p><b>Price : </b>' . iconv("UTF-8", "CP1252", $shirt_order_detail_2->price) . '</p>';
      }

      if($sleeve_order_detail_2)
      {
        $total2 = $total2 + (float)substr($sleeve_order_detail_2->price, 3, strlen($sleeve_order_detail_2->price));
        $message_admin .= '<p><b>Maglie a maniche lunghe : </b>' . $sleeve_order_detail_2->name . '</p>
              <p><b>Codice Prodotto : </b>' . $sleeve_order_detail_2->sku . '</p><p><b>Price : </b>' . iconv("UTF-8", "CP1252", $sleeve_order_detail_2->price) . '</p>';
      }

      if($sweat_order_detail_2)
      {
        $total2 = $total2 + (float)substr($sweat_order_detail_2->price, 3, strlen($sweat_order_detail_2->price));
        $message_admin .= '<p><b>Felpe : </b>' . $sweat_order_detail_2->name . '</p>
              <p><b>Codice Prodotto : </b>' . $sweat_order_detail_2->sku . '</p><p><b>Price : </b>' . iconv("UTF-8", "CP1252", $sweat_order_detail_2->price) . '</p>';
      }

      if($pants_order_detail_2)
      {
        $total2 = $total2 + (float)substr($pants_order_detail_2->price, 3, strlen($pants_order_detail_2->price));
        $message_admin .= '<p><b>Pantaloncini : </b>' . $pants_order_detail_2->name . '</p>
              <p><b>Codice Prodotto : </b>' . $pants_order_detail_2->sku . '</p><p><b>Price : </b>' . iconv("UTF-8", "CP1252", $pants_order_detail_2->price) . '</p>';
      }

      if($longpants_order_detail_2)
      {
        $total2 = $total2 + (float)substr($longpants_order_detail_2->price, 3, strlen($longpants_order_detail_2->price));
        $message_admin .= '<p><b>Pantaloni : </b>' . $longpants_order_detail_2->name . '</p>
              <p><b>Codice Prodotto : </b>' . $longpants_order_detail_2->sku . '</p><p><b>Price : </b>' . iconv("UTF-8", "CP1252", $longpants_order_detail_2->price) . '</p>';
      }

      if($socks_order_detail_2)
      {
        $total2 = $total2 + (float)substr($socks_order_detail_2->price, 3, strlen($socks_order_detail_2->price));
        $message_admin .= '<p><b>Calze : </b>' . $socks_order_detail_2->name . '</p>
              <p><b>Codice Prodotto : </b>' . $socks_order_detail_2->sku . '</p><p><b>Price : </b>' . iconv("UTF-8", "CP1252", $socks_order_detail_2->price) . '</p>';
      }

      if($ball_order_detail_2)
      {
        $total2 = $total2 + (float)substr($ball_order_detail_2->price, 3, strlen($ball_order_detail_2->price));
        $message_admin .= '<p><b>Palloni e Accessori : </b>' . $ball_order_detail_2->name . '</p>
              <p><b>Codice Prodotto : </b>' . $ball_order_detail_2->sku . '</p><p><b>Price : </b>' . iconv("UTF-8", "CP1252", $ball_order_detail_2->price) . '</p>';
      }

      if($bags_order_detail_2)
      {
        $total2 = $total2 + (float)substr($bags_order_detail_2->price, 3, strlen($bags_order_detail_2->price));
        $message_admin .= '<p><b>Zaini e Borse : </b>' . $bags_order_detail_2->name . '</p>
              <p><b>Codice Prodotto : </b>' . $bags_order_detail_2->sku . '</p><p><b>Price : </b>' . iconv("UTF-8", "CP1252", $bags_order_detail_2->price) . '</p>';
      }

      if($kits_order_detail_2)
      {
        $total2 = $total2 + (float)substr($kits_order_detail_2->price, 3, strlen($kits_order_detail_2->price));
        $message_admin .= '<p><b>Tute : </b>' . $kits_order_detail_2->name . '</p>
              <p><b>Codice Prodotto : </b>' . $kits_order_detail_2->sku . '</p><p><b>Price : </b>' . iconv("UTF-8", "CP1252", $kits_order_detail_2->price) . '</p>';
      }

      if($rainjacket_order_detail_2)
      {
        $total2 = $total2 + (float)substr($rainjacket_order_detail_2->price, 3, strlen($rainjacket_order_detail_2->price));
        $message_admin .= '<p><b>Rain Jacket : </b>' . $rainjacket_order_detail_2->name . '</p>
              <p><b>Codice Prodotto : </b>' . $rainjacket_order_detail_2->sku . '</p><p><b>Price : </b>' . iconv("UTF-8", "CP1252", $rainjacket_order_detail_2->price) . '</p>';
      }

      if($jacket_order_detail_2)
      {
        $total2 = $total2 + (float)substr($jacket_order_detail_2->price, 3, strlen($jacket_order_detail_2->price));
        $message_admin .= '<p><b>Giubbotto : </b>' . $jacket_order_detail_2->name . '</p>
              <p><b>Codice Prodotto : </b>' . $jacket_order_detail_2->sku . '</p><p><b>Price : </b>' . iconv("UTF-8", "CP1252", $jacket_order_detail_2->price) . '</p>';
      }
      $message_admin .= '<p><b>Totale : </b>€' . $total2 . '</p>';
    }

    if($_POST["selected_order_typology_3"])
    {
      $message_admin .= '<p><b>Configurazione 3 : </b>' . $_POST["selected_order_typology_3"] .'</p>';
      $total3 = 0;
      if($shirt_order_detail_3)
      {
        $total3 = $total3 + (float)substr($shirt_order_detail_3->price, 3, strlen($shirt_order_detail_3->price));
        $message_admin .= '<p><b>Maglie a maniche corte : </b>' . $shirt_order_detail_3->name . '</p>
              <p><b>Codice Prodotto : </b>' . $shirt_order_detail_3->sku . '</p><p><b>Price : </b>' . iconv("UTF-8", "CP1252", $shirt_order_detail_3->price) . '</p>';
      }

      if($sleeve_order_detail_3)
      {
        $total3 = $total3 + (float)substr($sleeve_order_detail_3->price, 3, strlen($sleeve_order_detail_3->price));
        $message_admin .= '<p><b>Maglie a maniche lunghe : </b>' . $sleeve_order_detail_3->name . '</p>
              <p><b>Codice Prodotto : </b>' . $sleeve_order_detail_3->sku . '</p><p><b>Price : </b>' . iconv("UTF-8", "CP1252", $sleeve_order_detail_3->price) . '</p>';
      }

      if($sweat_order_detail_3)
      {
        $total3 = $total3 + (float)substr($sweat_order_detail_3->price, 3, strlen($sweat_order_detail_3->price));
        $message_admin .= '<p><b>Felpe : </b>' . $sweat_order_detail_3->name . '</p>
              <p><b>Codice Prodotto : </b>' . $sweat_order_detail_3->sku . '</p><p><b>Price : </b>' . iconv("UTF-8", "CP1252", $sweat_order_detail_3->price) . '</p>';
      }

      if($pants_order_detail_3)
      {
        $total3 = $total3 + (float)substr($pants_order_detail_3->price, 3, strlen($pants_order_detail_3->price));
        $message_admin .= '<p><b>Pantaloncini : </b>' . $pants_order_detail_3->name . '</p>
              <p><b>Codice Prodotto : </b>' . $pants_order_detail_3->sku . '</p><p><b>Price : </b>' . iconv("UTF-8", "CP1252", $pants_order_detail_3->price) . '</p>';
      }

      if($longpants_order_detail_3)
      {
        $total3 = $total3 + (float)substr($longpants_order_detail_3->price, 3, strlen($longpants_order_detail_3->price));
        $message_admin .= '<p><b>Pantaloni : </b>' . $longpants_order_detail_3->name . '</p>
              <p><b>Codice Prodotto : </b>' . $longpants_order_detail_3->sku . '</p><p><b>Price : </b>' . iconv("UTF-8", "CP1252", $longpants_order_detail_3->price) . '</p>';
      }

      if($socks_order_detail_3)
      {
        $total3 = $total3 + (float)substr($socks_order_detail_3->price, 3, strlen($socks_order_detail_3->price));
        $message_admin .= '<p><b>Calze : </b>' . $socks_order_detail_3->name . '</p>
              <p><b>Codice Prodotto : </b>' . $socks_order_detail_3->sku . '</p><p><b>Price : </b>' . iconv("UTF-8", "CP1252", $socks_order_detail_3->price) . '</p>';
      }

      if($ball_order_detail_3)
      {
        $total3 = $total3 + (float)substr($ball_order_detail_3->price, 3, strlen($ball_order_detail_3->price));
        $message_admin .= '<p><b>Palloni e Accessori : </b>' . $ball_order_detail_3->name . '</p>
              <p><b>Codice Prodotto : </b>' . $ball_order_detail_3->sku . '</p><p><b>Price : </b>' . iconv("UTF-8", "CP1252", $ball_order_detail_3->price) . '</p>';
      }

      if($bags_order_detail_3)
      {
        $total3 = $total3 + (float)substr($bags_order_detail_3->price, 3, strlen($bags_order_detail_3->price));
        $message_admin .= '<p><b>Zaini e Borse : </b>' . $bags_order_detail_3->name . '</p>
              <p><b>Codice Prodotto : </b>' . $bags_order_detail_3->sku . '</p><p><b>Price : </b>' . iconv("UTF-8", "CP1252", $bags_order_detail_3->price) . '</p>';
      }

      if($kits_order_detail_3)
      {
        $total3 = $total3 + (float)substr($kits_order_detail_3->price, 3, strlen($kits_order_detail_3->price));
        $message_admin .= '<p><b>Tute : </b>' . $kits_order_detail_3->name . '</p>
              <p><b>Codice Prodotto : </b>' . $kits_order_detail_3->sku . '</p><p><b>Price : </b>' . iconv("UTF-8", "CP1252", $kits_order_detail_3->price) . '</p>';
      }

      if($rainjacket_order_detail_3)
      {
        $total3 = $total3 + (float)substr($rainjacket_order_detail_3->price, 3, strlen($rainjacket_order_detail_3->price));
        $message_admin .= '<p><b>Rain Jacket : </b>' . $rainjacket_order_detail_3->name . '</p>
              <p><b>Codice Prodotto : </b>' . $rainjacket_order_detail_3->sku . '</p><p><b>Price : </b>' . iconv("UTF-8", "CP1252", $rainjacket_order_detail_3->price) . '</p>';
      }

      if($jacket_order_detail_3)
      {
        $total3 = $total3 + (float)substr($jacket_order_detail_3->price, 3, strlen($jacket_order_detail_3->price));
        $message_admin .= '<p><b>Giubbotto : </b>' . $jacket_order_detail_3->name . '</p>
              <p><b>Codice Prodotto : </b>' . $jacket_order_detail_3->sku . '</p><p><b>Price : </b>' . iconv("UTF-8", "CP1252", $jacket_order_detail_3->price) . '</p>';
      }
      $message_admin .= '<p><b>Totale : </b>€' . $total3 . '</p>';
    }

    $message_admin .= '</div>  
        <div style="background: #333333;  color: white; margin: 0 auto; margin-top: 50px; padding-top: 10px; padding-bottom: 20px;">
          <p style="font-size: 14px;">© 2021 <b>GGTEAMWEAR</b> - Tutti i diritti sono riservati</p>
          <a href="https://www.facebook.com/GGTeamwear/"><img src="https://www.ggteamwear.com/configuratore/img/fbicon.png" style="width:20px;"></a>
          <a href="https://www.instagram.com/gg_teamwear/"><img src="https://www.ggteamwear.com/configuratore/img/instaicon.png" style="width:20px;"></a>
          <a href="https://www.linkedin.com/company/gg-teamwear/"><img src="https://ggteamwear.com/configuratore/img/linkedinpic.png" style="width:20px;"></a>
          <a href="https://www.youtube.com/channel/UCQKZEx6JErGzGrtdb1S9QRg"><img src="https://ggteamwear.com/configuratore/img/youtubeico.png" style="width:20px;"></a>
          </div>
      </div>
    </body>
    </html>';

    $mail->CharSet = 'UTF-8';
    $mail->Body = $message_admin;

    $mail->AddAttachment("image-kit/canvasImage-" . json_decode($_COOKIE['user'],true)['email'] . "-" . $_POST["merge_all_canvas_file"] . ".png");

    $mail->send();
  }

  function sendMailToUser($fromUser, $toUser)
  {
    // get language data
    if ($_POST['language'] == 'it'){
      $str = file_get_contents('./lang/it.json');
    }else{
      $str = file_get_contents('./lang/en.json');
    }
    $data = json_decode(substr($str, 5, strlen($str)), true);
    
    $mail = new PHPMailer\PHPMailer\PHPMailer(true);

    //Enable SMTP debugging.
    $mail->SMTPDebug = 0;                               
    //Set PHPMailer to use SMTP.
    $mail->isSMTP();            
    //Set SMTP host name                          
    $mail->Host = "smtps.aruba.it";
    //Set this to true if SMTP host requires authentication to send email
    $mail->SMTPAuth = true;                          
    //Provide username and password     
    $mail->Username = 'configuratore@ggteamwear.com';                // SMTP username
    $mail->Password = 'Configura2021!';                           
    //If SMTP requires TLS encryption then set it
    $mail->SMTPSecure = "ssl";                           
    //Set TCP port to connect to
    $mail->Port = 465;                                   

    $mail->setFrom($fromUser, 'GGTEAMWEAR');

    $mail->addAddress($toUser);

    $mail->isHTML(true);

    $mail->Subject = $data['mail_order_object'];

    // build email content from main configurations
    if($_POST["selected_order_shirt_1"])
      $shirt_order_detail_1 = json_decode($_POST["selected_order_shirt_1"]);
    if($_POST["selected_order_pants_1"])
      $pants_order_detail_1 = json_decode($_POST["selected_order_pants_1"]);
    if($_POST["selected_order_socks_1"])
      $socks_order_detail_1 = json_decode($_POST["selected_order_socks_1"]);
    if($_POST["selected_order_ball_1"])
      $ball_order_detail_1 = json_decode($_POST["selected_order_ball_1"]);
    if($_POST["selected_order_bags_1"])
      $bags_order_detail_1 = json_decode($_POST["selected_order_bags_1"]);
    if($_POST["selected_order_kits_1"])
      $kits_order_detail_1 = json_decode($_POST["selected_order_kits_1"]);
    if($_POST["selected_order_sleeve_1"])
      $sleeve_order_detail_1 = json_decode($_POST["selected_order_sleeve_1"]);
    if($_POST["selected_order_sweat_1"])
      $sweat_order_detail_1 = json_decode($_POST["selected_order_sweat_1"]);
    if($_POST["selected_order_rainjacket_1"])
      $rainjacket_order_detail_1 = json_decode($_POST["selected_order_rainjacket_1"]);
    if($_POST["selected_order_jacket_1"])
      $jacket_order_detail_1 = json_decode($_POST["selected_order_jacket_1"]);
    if($_POST["selected_order_longpants_1"])
      $longpants_order_detail_1 = json_decode($_POST["selected_order_longpants_1"]);

    if($_POST["selected_order_shirt_2"])
      $shirt_order_detail_2 = json_decode($_POST["selected_order_shirt_2"]);
    if($_POST["selected_order_pants_2"])
      $pants_order_detail_2 = json_decode($_POST["selected_order_pants_2"]);
    if($_POST["selected_order_socks_2"])
      $socks_order_detail_2 = json_decode($_POST["selected_order_socks_2"]);
    if($_POST["selected_order_ball_2"])
      $ball_order_detail_2 = json_decode($_POST["selected_order_ball_2"]);
    if($_POST["selected_order_bags_2"])
      $bags_order_detail_2 = json_decode($_POST["selected_order_bags_2"]);
    if($_POST["selected_order_kits_2"])
      $kits_order_detail_2 = json_decode($_POST["selected_order_kits_2"]);
    if($_POST["selected_order_sleeve_2"])
      $sleeve_order_detail_2 = json_decode($_POST["selected_order_sleeve_2"]);
    if($_POST["selected_order_sweat_2"])
      $sweat_order_detail_2 = json_decode($_POST["selected_order_sweat_2"]);
    if($_POST["selected_order_rainjacket_2"])
      $rainjacket_order_detail_2 = json_decode($_POST["selected_order_rainjacket_2"]);
    if($_POST["selected_order_jacket_2"])
      $jacket_order_detail_2 = json_decode($_POST["selected_order_jacket_2"]);
    if($_POST["selected_order_longpants_2"])
      $longpants_order_detail_2 = json_decode($_POST["selected_order_longpants_2"]);


    if($_POST["selected_order_shirt_3"])
      $shirt_order_detail_3 = json_decode($_POST["selected_order_shirt_3"]);
    if($_POST["selected_order_pants_3"])
      $pants_order_detail_3 = json_decode($_POST["selected_order_pants_3"]);
    if($_POST["selected_order_socks_3"])
      $socks_order_detail_3 = json_decode($_POST["selected_order_socks_3"]);
    if($_POST["selected_order_ball_3"])
      $ball_order_detail_3 = json_decode($_POST["selected_order_ball_3"]);
    if($_POST["selected_order_bags_3"])
      $bags_order_detail_3 = json_decode($_POST["selected_order_bags_3"]);
    if($_POST["selected_order_kits_3"])
      $kits_order_detail_3 = json_decode($_POST["selected_order_kits_3"]);
    if($_POST["selected_order_sleeve_3"])
      $sleeve_order_detail_3 = json_decode($_POST["selected_order_sleeve_3"]);
    if($_POST["selected_order_sweat_3"])
      $sweat_order_detail_3 = json_decode($_POST["selected_order_sweat_3"]);
    if($_POST["selected_order_rainjacket_3"])
      $rainjacket_order_detail_3 = json_decode($_POST["selected_order_rainjacket_3"]);
    if($_POST["selected_order_jacket_3"])
      $jacket_order_detail_3 = json_decode($_POST["selected_order_jacket_3"]);
    if($_POST["selected_order_longpants_3"])
      $longpants_order_detail_3 = json_decode($_POST["selected_order_longpants_3"]);
  
    $message_user = '<!DOCTYPE html>
                    <html lang="it" xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office" style="font-family: "Montserrat", "Helvetica Neue", Helvetica, Arial, "sans-serif";-webkit-text-size-adjust:100%;-ms-text-size-adjust:100%;padding:0;Margin:0;">
                    <head>
                    <link href="https://fonts.googleapis.com/css?family=Montserrat:thin,extra-light,light,100,200,300,400,500,600,700,800" rel="stylesheet">
                    <meta charset="utf-8">
                    <meta name="viewport" content="width=device-width">
                    <meta http-equiv="X-UA-Compatible" content="IE=edge">
                    <meta name="x-apple-disable-message-reformatting">
                    </head>
                    <body>
                      <div style="text-align: center;font-size: 24px; max-width: 600px; margin: 0 auto; background-color: #ffffff;">
                        <img style="max-width:200px; padding-bottom: 30px; padding-top:25px;" src="https://www.ggteamwear.com/media/2020/09/logo350px.png">
                        <h1 style="font-size: 25px;">'.$data['mail_signup_h1_opening'].' ' . $_POST["company_name"] .'</h1>
                        <h1 style="font-size: 25px; padding-bottom:30px;">'.$data['mail_order_h1_opening2'].'</h1>
                        <p style="font-size: 18px;">'.$data['mail_order_p_body'].'</p>
                        <p style="font-size: 18px; padding-bottom:30px;">'.$data['mail_signup_open3_admin'].'</p>
                        <p><b>'.$data['product_sport'].' </b>' . $_POST["selected_order_sport"] . '</p>
                        <p><b>'.$data['product_gender'].' </b>' . $_POST["selected_order_gender"] . '</p>
                        <p><b>'.$data['product_brand'].' </b>' . $_POST["selected_order_brand"] . '</p>';

    if($_POST["selected_order_typology_1"])
    {
      $message_user .= '<p><b>'.$data['cart_h4_title_1'].' : </b>' . $_POST["selected_order_typology_1"] .'</p>';
      $total1 = 0;
      if($shirt_order_detail_1)
      {
        $total1 = $total1 + (float)substr($shirt_order_detail_1->price, 3, strlen($shirt_order_detail_1->price));
        $message_user .= '<p><b>'.$data['cat_1'].' : </b>' . $shirt_order_detail_1->name . '</p>
              <p><b>'.$data['product_sku'].' </b>' . $shirt_order_detail_1->sku . '</p><p><b>'.$data['product_price'].' </b>' . iconv("UTF-8", "CP1252", $shirt_order_detail_1->price) . '</p>';
      }

      if($sleeve_order_detail_1)
      {
        $total1 = $total1 + (float)substr($sleeve_order_detail_1->price, 3, strlen($sleeve_order_detail_1->price));
        $message_user .= '<p><b>'.$data['cat_2'].' : </b>' . $sleeve_order_detail_1->name . '</p>
              <p><b>'.$data['product_sku'].' </b>' . $sleeve_order_detail_1->sku . '</p><p><b>'.$data['product_price'].' </b>' . iconv("UTF-8", "CP1252", $sleeve_order_detail_1->price) . '</p>';      }

      if($sweat_order_detail_1)
      {
        $total1 = $total1 + (float)substr($sweat_order_detail_1->price, 3, strlen($sweat_order_detail_1->price));
        $message_user .= '<p><b>'.$data['cat_3'].' : </b>' . $sweat_order_detail_1->name . '</p>
              <p><b>'.$data['product_sku'].' </b>' . $sweat_order_detail_1->sku . '</p><p><b>'.$data['product_price'].' </b>' . iconv("UTF-8", "CP1252", $sweat_order_detail_1->price) . '</p>';
      }

      if($pants_order_detail_1)
      {
        $total1 = $total1 + (float)substr($pants_order_detail_1->price, 3, strlen($pants_order_detail_1->price));
        $message_user .= '<p><b>'.$data['cat_4'].' : </b>' . $pants_order_detail_1->name . '</p>
              <p><b>'.$data['product_sku'].' </b>' . $pants_order_detail_1->sku . '</p><p><b>'.$data['product_price'].' </b>' . iconv("UTF-8", "CP1252", $pants_order_detail_1->price) . '</p>';
      }

      if($longpants_order_detail_1)
      {
        $total1 = $total1 + (float)substr($longpants_order_detail_1->price, 3, strlen($longpants_order_detail_1->price));
        $message_user .= '<p><b>'.$data['cat_5'].' : </b>' . $longpants_order_detail_1->name . '</p>
              <p><b>'.$data['product_sku'].' </b>' . $longpants_order_detail_1->sku . '</p><p><b>'.$data['product_price'].' </b>' . iconv("UTF-8", "CP1252", $longpants_order_detail_1->price) . '</p>';
      }

      if($socks_order_detail_1)
      {
        $total1 = $total1 + (float)substr($socks_order_detail_1->price, 3, strlen($socks_order_detail_1->price));
        $message_user .= '<p><b>'.$data['cat_6'].' : </b>' . $socks_order_detail_1->name . '</p>
              <p><b>'.$data['product_sku'].' </b>' . $socks_order_detail_1->sku . '</p><p><b>'.$data['product_price'].' </b>' . iconv("UTF-8", "CP1252", $socks_order_detail_1->price) . '</p>';
      }

      if($ball_order_detail_1)
      {
        $total1 = $total1 + (float)substr($ball_order_detail_1->price, 3, strlen($ball_order_detail_1->price));
        $message_user .= '<p><b>'.$data['cat_7'].' : </b>' . $ball_order_detail_1->name . '</p>
              <p><b>'.$data['product_sku'].' </b>' . $ball_order_detail_1->sku . '</p><p><b>'.$data['product_price'].' </b>' . iconv("UTF-8", "CP1252", $ball_order_detail_1->price) . '</p>';
      }

      if($bags_order_detail_1)
      {
        $total1 = $total1 + (float)substr($bags_order_detail_1->price, 3, strlen($bags_order_detail_1->price));
        $message_user .= '<p><b>'.$data['cat_8'].' : </b>' . $bags_order_detail_1->name . '</p>
              <p><b>'.$data['product_sku'].' </b>' . $bags_order_detail_1->sku . '</p><p><b>'.$data['product_price'].' </b>' . iconv("UTF-8", "CP1252", $bags_order_detail_1->price) . '</p>';
      }

      if($kits_order_detail_1)
      {
        $total1 = $total1 + (float)substr($kits_order_detail_1->price, 3, strlen($kits_order_detail_1->price));
        $message_user .= '<p><b>'.$data['cat_9'].' : </b>' . $kits_order_detail_1->name . '</p>
              <p><b>'.$data['product_sku'].' </b>' . $kits_order_detail_1->sku . '</p><p><b>'.$data['product_price'].' </b>' . iconv("UTF-8", "CP1252", $kits_order_detail_1->price) . '</p>';
      }

      if($rainjacket_order_detail_1)
      {
        $total1 = $total1 + (float)substr($rainjacket_order_detail_1->price, 3, strlen($rainjacket_order_detail_1->price));
        $message_user .= '<p><b>'.$data['cat_10'].' : </b>' . $rainjacket_order_detail_1->name . '</p>
              <p><b>'.$data['product_sku'].' </b>' . $rainjacket_order_detail_1->sku . '</p><p><b>'.$data['product_price'].' </b>' . iconv("UTF-8", "CP1252", $rainjacket_order_detail_1->price) . '</p>';
      }

      if($jacket_order_detail_1)
      {
        $total1 = $total1 + (float)substr($jacket_order_detail_1->price, 3, strlen($jacket_order_detail_1->price));
        $message_user .= '<p><b>'.$data['cat_11'].' : </b>' . $jacket_order_detail_1->name . '</p>
              <p><b>'.$data['product_sku'].' </b>' . $jacket_order_detail_1->sku . '</p><p><b>'.$data['product_price'].' </b>' . iconv("UTF-8", "CP1252", $jacket_order_detail_1->price) . '</p>';
      }
      $message_user .= '<p><b>Totale : </b><del style="text-decoration-color:red;">€' . $total1 . '</del></p>';
    }

    if($_POST["selected_order_typology_2"])
    {
      $message_user .= '<p><b>'.$data['cart_h4_title_2'].' : </b>' . $_POST["selected_order_typology_2"] .'</p>';
      $total2 = 0;
      if($shirt_order_detail_2)
      {
        $total2 = $total2 + (float)substr($shirt_order_detail_2->price, 3, strlen($shirt_order_detail_2->price));
        $message_user .= '<p><b>'.$data['cat_1'].' : </b>' . $shirt_order_detail_2->name . '</p>
              <p><b>'.$data['product_sku'].' </b>' . $shirt_order_detail_2->sku . '</p><p><b>'.$data['product_price'].' </b>' . iconv("UTF-8", "CP1252", $shirt_order_detail_2->price) . '</p>';
      }

      if($sleeve_order_detail_2)
      {
        $total2 = $total2 + (float)substr($sleeve_order_detail_2->price, 3, strlen($sleeve_order_detail_2->price));
        $message_user .= '<p><b>'.$data['cat_2'].' : </b>' . $sleeve_order_detail_2->name . '</p>
              <p><b>'.$data['product_sku'].' </b>' . $sleeve_order_detail_2->sku . '</p><p><b>'.$data['product_price'].' </b>' . iconv("UTF-8", "CP1252", $sleeve_order_detail_2->price) . '</p>';      }

      if($sweat_order_detail_2)
      {
        $total2 = $total2 + (float)substr($sweat_order_detail_2->price, 3, strlen($sweat_order_detail_2->price));
        $message_user .= '<p><b>'.$data['cat_3'].' : </b>' . $sweat_order_detail_2->name . '</p>
              <p><b>'.$data['product_sku'].' </b>' . $sweat_order_detail_2->sku . '</p><p><b>'.$data['product_price'].' </b>' . iconv("UTF-8", "CP1252", $sweat_order_detail_2->price) . '</p>';
      }

      if($pants_order_detail_2)
      {
        $total2 = $total2 + (float)substr($pants_order_detail_2->price, 3, strlen($pants_order_detail_2->price));
        $message_user .= '<p><b>'.$data['cat_4'].' : </b>' . $pants_order_detail_2->name . '</p>
              <p><b>'.$data['product_sku'].' </b>' . $pants_order_detail_2->sku . '</p><p><b>'.$data['product_price'].' </b>' . iconv("UTF-8", "CP1252", $pants_order_detail_2->price) . '</p>';
      }

      if($longpants_order_detail_2)
      {
        $total2 = $total2 + (float)substr($longpants_order_detail_2->price, 3, strlen($longpants_order_detail_2->price));
        $message_user .= '<p><b>'.$data['cat_5'].' : </b>' . $longpants_order_detail_2->name . '</p>
              <p><b>'.$data['product_sku'].' </b>' . $longpants_order_detail_2->sku . '</p><p><b>'.$data['product_price'].' </b>' . iconv("UTF-8", "CP1252", $longpants_order_detail_2->price) . '</p>';
      }

      if($socks_order_detail_2)
      {
        $total2 = $total2 + (float)substr($socks_order_detail_2->price, 3, strlen($socks_order_detail_2->price));
        $message_user .= '<p><b>'.$data['cat_6'].' : </b>' . $socks_order_detail_2->name . '</p>
              <p><b>'.$data['product_sku'].' </b>' . $socks_order_detail_2->sku . '</p><p><b>'.$data['product_price'].' </b>' . iconv("UTF-8", "CP1252", $socks_order_detail_2->price) . '</p>';
      }

      if($ball_order_detail_2)
      {
        $total2 = $total2 + (float)substr($ball_order_detail_2->price, 3, strlen($ball_order_detail_2->price));
        $message_user .= '<p><b>'.$data['cat_7'].' : </b>' . $ball_order_detail_2->name . '</p>
              <p><b>'.$data['product_sku'].' </b>' . $ball_order_detail_2->sku . '</p><p><b>'.$data['product_price'].' </b>' . iconv("UTF-8", "CP1252", $ball_order_detail_2->price) . '</p>';
      }

      if($bags_order_detail_2)
      {
        $total2 = $total2 + (float)substr($bags_order_detail_2->price, 3, strlen($bags_order_detail_2->price));
        $message_user .= '<p><b>'.$data['cat_8'].' : </b>' . $bags_order_detail_2->name . '</p>
              <p><b>'.$data['product_sku'].' </b>' . $bags_order_detail_2->sku . '</p><p><b>'.$data['product_price'].' </b>' . iconv("UTF-8", "CP1252", $bags_order_detail_2->price) . '</p>';
      }

      if($kits_order_detail_2)
      {
        $total2 = $total2 + (float)substr($kits_order_detail_2->price, 3, strlen($kits_order_detail_2->price));
        $message_user .= '<p><b>'.$data['cat_9'].' : </b>' . $kits_order_detail_2->name . '</p>
              <p><b>'.$data['product_sku'].' </b>' . $kits_order_detail_2->sku . '</p><p><b>'.$data['product_price'].' </b>' . iconv("UTF-8", "CP1252", $kits_order_detail_2->price) . '</p>';
      }

      if($rainjacket_order_detail_2)
      {
        $total2 = $total2 + (float)substr($rainjacket_order_detail_2->price, 3, strlen($rainjacket_order_detail_2->price));
        $message_user .= '<p><b>'.$data['cat_10'].' : </b>' . $rainjacket_order_detail_2->name . '</p>
              <p><b>'.$data['product_sku'].' </b>' . $rainjacket_order_detail_2->sku . '</p><p><b>'.$data['product_price'].' </b>' . iconv("UTF-8", "CP1252", $rainjacket_order_detail_2->price) . '</p>';
      }

      if($jacket_order_detail_2)
      {
        $total2 = $total2 + (float)substr($jacket_order_detail_2->price, 3, strlen($jacket_order_detail_2->price));
        $message_user .= '<p><b>'.$data['cat_11'].' : </b>' . $jacket_order_detail_2->name . '</p>
              <p><b>'.$data['product_sku'].' </b>' . $jacket_order_detail_2->sku . '</p><p><b>'.$data['product_price'].' </b>' . iconv("UTF-8", "CP1252", $jacket_order_detail_2->price) . '</p>';
      }
      $message_user .= '<p><b>Totale : </b><del style="text-decoration-color:red;">€' . $total2 . '</del></p>';
    }

    if($_POST["selected_order_typology_3"])
    {
      $message_user .= '<p><b>'.$data['cart_h4_title_3'].' : </b>' . $_POST["selected_order_typology_3"] .'</p>';
      $total3 = 0;
      if($shirt_order_detail_3)
      {
        $total3 = $total3 + (float)substr($shirt_order_detail_3->price, 3, strlen($shirt_order_detail_3->price));
        $message_user .= '<p><b>'.$data['cat_1'].' : </b>' . $shirt_order_detail_3->name . '</p>
              <p><b>'.$data['product_sku'].' </b>' . $shirt_order_detail_3->sku . '</p><p><b>'.$data['product_price'].' </b>' . iconv("UTF-8", "CP1252", $shirt_order_detail_3->price) . '</p>';
      }

      if($sleeve_order_detail_3)
      {
        $total3 = $total3 + (float)substr($sleeve_order_detail_3->price, 3, strlen($sleeve_order_detail_3->price));
        $message_user .= '<p><b>'.$data['cat_2'].' : </b>' . $sleeve_order_detail_3->name . '</p>
              <p><b>'.$data['product_sku'].' </b>' . $sleeve_order_detail_3->sku . '</p><p><b>'.$data['product_price'].' </b>' . iconv("UTF-8", "CP1252", $sleeve_order_detail_3->price) . '</p>';      }

      if($sweat_order_detail_3)
      {
        $total3 = $total3 + (float)substr($sweat_order_detail_3->price, 3, strlen($sweat_order_detail_3->price));
        $message_user .= '<p><b>'.$data['cat_3'].' : </b>' . $sweat_order_detail_3->name . '</p>
              <p><b>'.$data['product_sku'].' </b>' . $sweat_order_detail_3->sku . '</p><p><b>'.$data['product_price'].' </b>' . iconv("UTF-8", "CP1252", $sweat_order_detail_3->price) . '</p>';
      }

      if($pants_order_detail_3)
      {
        $total3 = $total3 + (float)substr($pants_order_detail_3->price, 3, strlen($pants_order_detail_3->price));
        $message_user .= '<p><b>'.$data['cat_4'].' : </b>' . $pants_order_detail_3->name . '</p>
              <p><b>'.$data['product_sku'].' </b>' . $pants_order_detail_3->sku . '</p><p><b>'.$data['product_price'].' </b>' . iconv("UTF-8", "CP1252", $pants_order_detail_3->price) . '</p>';
      }

      if($longpants_order_detail_3)
      {
        $total3 = $total3 + (float)substr($longpants_order_detail_3->price, 3, strlen($longpants_order_detail_3->price));
        $message_user .= '<p><b>'.$data['cat_5'].' : </b>' . $longpants_order_detail_3->name . '</p>
              <p><b>'.$data['product_sku'].' </b>' . $longpants_order_detail_3->sku . '</p><p><b>'.$data['product_price'].' </b>' . iconv("UTF-8", "CP1252", $longpants_order_detail_3->price) . '</p>';
      }

      if($socks_order_detail_3)
      {
        $total3 = $total3 + (float)substr($socks_order_detail_3->price, 3, strlen($socks_order_detail_3->price));
        $message_user .= '<p><b>'.$data['cat_6'].' : </b>' . $socks_order_detail_3->name . '</p>
              <p><b>'.$data['product_sku'].' </b>' . $socks_order_detail_3->sku . '</p><p><b>'.$data['product_price'].' </b>' . iconv("UTF-8", "CP1252", $socks_order_detail_3->price) . '</p>';
      }

      if($ball_order_detail_3)
      {
        $total3 = $total3 + (float)substr($ball_order_detail_3->price, 3, strlen($ball_order_detail_3->price));
        $message_user .= '<p><b>'.$data['cat_7'].' : </b>' . $ball_order_detail_3->name . '</p>
              <p><b>'.$data['product_sku'].' </b>' . $ball_order_detail_3->sku . '</p><p><b>'.$data['product_price'].' </b>' . iconv("UTF-8", "CP1252", $ball_order_detail_3->price) . '</p>';
      }

      if($bags_order_detail_3)
      {
        $total3 = $total3 + (float)substr($bags_order_detail_3->price, 3, strlen($bags_order_detail_3->price));
        $message_user .= '<p><b>'.$data['cat_8'].' : </b>' . $bags_order_detail_3->name . '</p>
              <p><b>'.$data['product_sku'].' </b>' . $bags_order_detail_3->sku . '</p><p><b>'.$data['product_price'].' </b>' . iconv("UTF-8", "CP1252", $bags_order_detail_3->price) . '</p>';
      }

      if($kits_order_detail_3)
      {
        $total3 = $total3 + (float)substr($kits_order_detail_3->price, 3, strlen($kits_order_detail_3->price));
        $message_user .= '<p><b>'.$data['cat_9'].' : </b>' . $kits_order_detail_3->name . '</p>
              <p><b>'.$data['product_sku'].' </b>' . $kits_order_detail_3->sku . '</p><p><b>'.$data['product_price'].' </b>' . iconv("UTF-8", "CP1252", $kits_order_detail_3->price) . '</p>';
      }

      if($rainjacket_order_detail_3)
      {
        $total3 = $total3 + (float)substr($rainjacket_order_detail_3->price, 3, strlen($rainjacket_order_detail_3->price));
        $message_user .= '<p><b>'.$data['cat_10'].' : </b>' . $rainjacket_order_detail_3->name . '</p>
              <p><b>'.$data['product_sku'].' </b>' . $rainjacket_order_detail_3->sku . '</p><p><b>'.$data['product_price'].' </b>' . iconv("UTF-8", "CP1252", $rainjacket_order_detail_3->price) . '</p>';
      }

      if($jacket_order_detail_3)
      {
        $total3 = $total3 + (float)substr($jacket_order_detail_3->price, 3, strlen($jacket_order_detail_3->price));
        $message_user .= '<p><b>'.$data['cat_11'].' : </b>' . $jacket_order_detail_3->name . '</p>
              <p><b>'.$data['product_sku'].' </b>' . $jacket_order_detail_3->sku . '</p><p><b>'.$data['product_price'].' </b>' . iconv("UTF-8", "CP1252", $jacket_order_detail_3->price) . '</p>';
      }
      $message_user .= '<p><b>Totale : </b><del style="text-decoration-color:red;">€' . $total3 . '</del></p>';
    }

    $message_user .= '<div style="background: #333333;  color: white; margin: 0 auto; margin-top: 50px; padding-top: 10px; padding-bottom: 20px;">
                          <p style="font-size: 14px;">'.$data['mail_footer_copyright'].'</p>
                          <a href="https://www.facebook.com/GGTeamwear/"><img src="https://www.ggteamwear.com/configuratore/img/fbicon.png" style="width:20px;"></a>
                          <a href="https://www.instagram.com/gg_teamwear/"><img src="https://www.ggteamwear.com/configuratore/img/instaicon.png" style="width:20px;"></a>
                          <a href="https://www.linkedin.com/company/gg-teamwear/"><img src="https://ggteamwear.com/configuratore/img/linkedinpic.png" style="width:20px;"></a>
                          <a href="https://www.youtube.com/channel/UCQKZEx6JErGzGrtdb1S9QRg"><img src="https://ggteamwear.com/configuratore/img/youtubeico.png" style="width:20px;"></a>
                          </div>
                      </div>
                    </body>
                    </html>';
    $mail->CharSet = 'UTF-8';
    $mail->Body = $message_user;

    $mail->AddAttachment("image-kit/canvasImage-" . json_decode($_COOKIE['user'],true)['email'] . "-" . $_POST["merge_all_canvas_file"] . ".png");

    // echo $message_user;
    $mail->send();
  }

  function saveOrderToCsvFile()
  {

    if($_POST["selected_order_shirt_1"])
      $shirt_order_detail_1 = json_decode($_POST["selected_order_shirt_1"]);
    if($_POST["selected_order_pants_1"])
      $pants_order_detail_1 = json_decode($_POST["selected_order_pants_1"]);
    if($_POST["selected_order_socks_1"])
      $socks_order_detail_1 = json_decode($_POST["selected_order_socks_1"]);
    if($_POST["selected_order_ball_1"])
      $ball_order_detail_1 = json_decode($_POST["selected_order_ball_1"]);
    if($_POST["selected_order_bags_1"])
      $bags_order_detail_1 = json_decode($_POST["selected_order_bags_1"]);
    if($_POST["selected_order_kits_1"])
      $kits_order_detail_1 = json_decode($_POST["selected_order_kits_1"]);
    if($_POST["selected_order_sleeve_1"])
      $sleeve_order_detail_1 = json_decode($_POST["selected_order_sleeve_1"]);
    if($_POST["selected_order_sweat_1"])
      $sweat_order_detail_1 = json_decode($_POST["selected_order_sweat_1"]);
    if($_POST["selected_order_rainjacket_1"])
      $rainjacket_order_detail_1 = json_decode($_POST["selected_order_rainjacket_1"]);
    if($_POST["selected_order_jacket_1"])
      $jacket_order_detail_1 = json_decode($_POST["selected_order_jacket_1"]);
    if($_POST["selected_order_longpants_1"])
      $longpants_order_detail_1 = json_decode($_POST["selected_order_longpants_1"]);

    if($_POST["selected_order_shirt_2"])
      $shirt_order_detail_2 = json_decode($_POST["selected_order_shirt_2"]);
    if($_POST["selected_order_pants_2"])
      $pants_order_detail_2 = json_decode($_POST["selected_order_pants_2"]);
    if($_POST["selected_order_socks_2"])
      $socks_order_detail_2 = json_decode($_POST["selected_order_socks_2"]);
    if($_POST["selected_order_ball_2"])
      $ball_order_detail_2 = json_decode($_POST["selected_order_ball_2"]);
    if($_POST["selected_order_bags_2"])
      $bags_order_detail_2 = json_decode($_POST["selected_order_bags_2"]);
    if($_POST["selected_order_kits_2"])
      $kits_order_detail_2 = json_decode($_POST["selected_order_kits_2"]);
    if($_POST["selected_order_sleeve_2"])
      $sleeve_order_detail_2 = json_decode($_POST["selected_order_sleeve_2"]);
    if($_POST["selected_order_sweat_2"])
      $sweat_order_detail_2 = json_decode($_POST["selected_order_sweat_2"]);
    if($_POST["selected_order_rainjacket_2"])
      $rainjacket_order_detail_2 = json_decode($_POST["selected_order_rainjacket_2"]);
    if($_POST["selected_order_jacket_2"])
      $jacket_order_detail_2 = json_decode($_POST["selected_order_jacket_2"]);
    if($_POST["selected_order_longpants_2"])
      $longpants_order_detail_2 = json_decode($_POST["selected_order_longpants_2"]);

    if($_POST["selected_order_shirt_3"])
      $shirt_order_detail_3 = json_decode($_POST["selected_order_shirt_3"]);
    if($_POST["selected_order_pants_3"])
      $pants_order_detail_3 = json_decode($_POST["selected_order_pants_3"]);
    if($_POST["selected_order_socks_3"])
      $socks_order_detail_3 = json_decode($_POST["selected_order_socks_3"]);
    if($_POST["selected_order_ball_3"])
      $ball_order_detail_3 = json_decode($_POST["selected_order_ball_3"]);
    if($_POST["selected_order_bags_3"])
      $bags_order_detail_3 = json_decode($_POST["selected_order_bags_3"]);
    if($_POST["selected_order_kits_3"])
      $kits_order_detail_3 = json_decode($_POST["selected_order_kits_3"]);
    if($_POST["selected_order_sleeve_3"])
      $sleeve_order_detail_3 = json_decode($_POST["selected_order_sleeve_3"]);
    if($_POST["selected_order_sweat_3"])
      $sweat_order_detail_3 = json_decode($_POST["selected_order_sweat_3"]);
    if($_POST["selected_order_rainjacket_3"])
      $rainjacket_order_detail_3 = json_decode($_POST["selected_order_rainjacket_3"]);
    if($_POST["selected_order_jacket_3"])
      $jacket_order_detail_3 = json_decode($_POST["selected_order_jacket_3"]);
    if($_POST["selected_order_longpants_3"])
      $longpants_order_detail_3 = json_decode($_POST["selected_order_longpants_3"]);


    $file = fopen('order-kit/configuratore-orders.csv', 'r');
    $order_last_rows = null;
    while (($line = fgetcsv($file)) !== FALSE) {
       $order_last_rows = $line;
    }
    fclose($file);

    // open orders csv file
    $file = fopen('order-kit/configuratore-orders.csv', 'a');
    // fputcsv($file, array("ID", "COMPANY NAME", "CAP NUMBER", "TELEPHONE", "OWNER", "EMAIL", "SPORT", "GENDER", "TYPOLOGY", "BRAND", "PRODUCT NAME", "PRODUCT SKU"), ";");

    if ($_POST['language'] == 'it'){
      $language = 'IT';
    }else{
      $language = 'ENG';
    }

    // set row from every order
    if($shirt_order_detail_1)
    {
      $shirt_arr = array(
        'id' => ((int)($order_last_rows[0])) + 1,
        'company_name' => $_POST["company_name"],
        'cap_number' => $_POST["cap_number"],
        'telephone' => $_POST["telephone"],
        'owner' => $_POST["owner"],
        'people' => $_POST["team_person"],
        'email' => $_POST["email"],
        'sport' => $_POST["selected_order_sport"],
        'gender' => $_POST["selected_order_gender"],
        'typology' => substr($_POST["selected_order_typology_1"], 3, strpos($_POST["selected_order_typology_1"], "</b>") - 3),
        'brand' => $_POST["selected_order_brand"],
        'product_name' => $shirt_order_detail_1->name,
        'product_sku' => $shirt_order_detail_1->sku,
        'product_type' => 'Maglie a maniche corte',
        'product_price' => iconv("UTF-8", "CP1252", $shirt_order_detail_1->price),
        'group'=> 'Configurazione 1',
        'language'=> $language,
        'date' => date("Y-m-d H:i"),
      );
      // $shirt_arr = str_replace('"', '', $shirt_arr);
      // fputcsv($file, $shirt_arr, ";");
      fwrite($file, implode(";", $shirt_arr));
      fwrite($file, "\n");
    }

    if($sleeve_order_detail_1)
    {
      $sleeve_arr = array(
        'id' => ((int)($order_last_rows[0])) + 1,
        'company_name' => $_POST["company_name"],
        'cap_number' => $_POST["cap_number"],
        'telephone' => $_POST["telephone"],
        'owner' => $_POST["owner"],
        'people' => $_POST["team_person"],
        'email' => $_POST["email"],
        'sport' => $_POST["selected_order_sport"],
        'gender' => $_POST["selected_order_gender"],
        'typology' => substr($_POST["selected_order_typology_1"], 3, strpos($_POST["selected_order_typology_1"], "</b>") - 3),
        'brand' => $_POST["selected_order_brand"],
        'product_name' => $sleeve_order_detail_1->name,
        'product_sku' => $sleeve_order_detail_1->sku,
        'product_type' => 'Maglie a maniche lunghe',
        'product_price' => iconv("UTF-8", "CP1252", $sleeve_order_detail_1->price),
        'group'=> 'Configurazione 1',
        'language'=> $language,
        'date' => date("Y-m-d H:i"),
      );
      // fputcsv($file, $sleeve_arr, ";");
      fwrite($file, implode(";", $sleeve_arr));
      fwrite($file, "\n");
    }

    if($sweat_order_detail_1)
    {
      $sweat_arr = array(
        'id' => ((int)($order_last_rows[0])) + 1,
        'company_name' => $_POST["company_name"],
        'cap_number' => $_POST["cap_number"],
        'telephone' => $_POST["telephone"],
        'owner' => $_POST["owner"],
        'people' => $_POST["team_person"],
        'email' => $_POST["email"],
        'sport' => $_POST["selected_order_sport"],
        'gender' => $_POST["selected_order_gender"],
        'typology' => substr($_POST["selected_order_typology_1"], 3, strpos($_POST["selected_order_typology_1"], "</b>") - 3),
        'brand' => $_POST["selected_order_brand"],
        'product_name' => $sweat_order_detail_1->name,
        'product_sku' => $sweat_order_detail_1->sku,
        'product_type' => 'Felpe',
        'product_price' => iconv("UTF-8", "CP1252", $sweat_order_detail_1->price),
        'group'=> 'Configurazione 1',
        'language'=> $language,
        'date' => date("Y-m-d H:i"),
      );
      // fputcsv($file, $sweat_arr, ";");
      fwrite($file, implode(";", $sweat_arr));
      fwrite($file, "\n");
    }

    if($pants_order_detail_1)
    {
      $pants_arr = array(
        'id' => ((int)($order_last_rows[0])) + 1,
        'company_name' => $_POST["company_name"],
        'cap_number' => $_POST["cap_number"],
        'telephone' => $_POST["telephone"],
        'owner' => $_POST["owner"],
        'people' => $_POST["team_person"],
        'email' => $_POST["email"],
        'sport' => $_POST["selected_order_sport"],
        'gender' => $_POST["selected_order_gender"],
        'typology' => substr($_POST["selected_order_typology_1"], 3, strpos($_POST["selected_order_typology_1"], "</b>") - 3),
        'brand' => $_POST["selected_order_brand"],
        'product_name' => $pants_order_detail_1->name,
        'product_sku' => $pants_order_detail_1->sku,
        'product_type' => 'Pantaloncini',
        'product_price' => iconv("UTF-8", "CP1252", $pants_order_detail_1->price),
        'group'=> 'Configurazione 1',
        'language'=> $language,
        'date' => date("Y-m-d H:i"),
      );
      fwrite($file, implode(";", $pants_arr));
      fwrite($file, "\n");
    }

    if($longpants_order_detail_1)
    {
      $longpants_arr = array(
        'id' => ((int)($order_last_rows[0])) + 1,
        'company_name' => $_POST["company_name"],
        'cap_number' => $_POST["cap_number"],
        'telephone' => $_POST["telephone"],
        'owner' => $_POST["owner"],
        'people' => $_POST["team_person"],
        'email' => $_POST["email"],
        'sport' => $_POST["selected_order_sport"],
        'gender' => $_POST["selected_order_gender"],
        'typology' => substr($_POST["selected_order_typology_1"], 3, strpos($_POST["selected_order_typology_1"], "</b>") - 3),
        'brand' => $_POST["selected_order_brand"],
        'product_name' => $longpants_order_detail_1->name,
        'product_sku' => $longpants_order_detail_1->sku,
        'product_type' => 'Pantaloni',
        'product_price' => iconv("UTF-8", "CP1252", $longpants_order_detail_1->price),
        'group'=> 'Configurazione 1',
        'language'=> $language,
        'date' => date("Y-m-d H:i"),
      );
      // fputcsv($file, $longpants_arr, ";");
      fwrite($file, implode(";", $longpants_arr));
      fwrite($file, "\n");
    }

    if($socks_order_detail_1)
    {
      $socks_arr = array(
        'id' => ((int)($order_last_rows[0])) + 1,
        'company_name' => $_POST["company_name"],
        'cap_number' => $_POST["cap_number"],
        'telephone' => $_POST["telephone"],
        'owner' => $_POST["owner"],
        'people' => $_POST["team_person"],
        'email' => $_POST["email"],
        'sport' => $_POST["selected_order_sport"],
        'gender' => $_POST["selected_order_gender"],
        'typology' => substr($_POST["selected_order_typology_1"], 3, strpos($_POST["selected_order_typology_1"], "</b>") - 3),
        'brand' => $_POST["selected_order_brand"],
        'product_name' => $socks_order_detail_1->name,
        'product_sku' => $socks_order_detail_1->sku,
        'product_type' => 'Calze',
        'product_price' => iconv("UTF-8", "CP1252", $socks_order_detail_1->price),
        'group'=> 'Configurazione 1',
        'language'=> $language,
        'date' => date("Y-m-d H:i"),
      );
      // fputcsv($file, $socks_arr, ";");
      fwrite($file, implode(";", $socks_arr));
      fwrite($file, "\n");
    }

    if($ball_order_detail_1)
    {
      $ball_arr = array(
        'id' => ((int)($order_last_rows[0])) + 1,
        'company_name' => $_POST["company_name"],
        'cap_number' => $_POST["cap_number"],
        'telephone' => $_POST["telephone"],
        'owner' => $_POST["owner"],
        'people' => $_POST["team_person"],
        'email' => $_POST["email"],
        'sport' => $_POST["selected_order_sport"],
        'gender' => $_POST["selected_order_gender"],
        'typology' => substr($_POST["selected_order_typology_1"], 3, strpos($_POST["selected_order_typology_1"], "</b>") - 3),
        'brand' => $_POST["selected_order_brand"],
        'product_name' => $ball_order_detail_1->name,
        'product_sku' => $ball_order_detail_1->sku,
        'product_type' => 'Palloni e Accessori',
        'product_price' => iconv("UTF-8", "CP1252", $ball_order_detail_1->price),
        'group'=> 'Configurazione 1',
        'language'=> $language,
        'date' => date("Y-m-d H:i"),
      );
      // fputcsv($file, $ball_arr, ";");
      fwrite($file, implode(";", $ball_arr));
      fwrite($file, "\n");
    }

    if($bags_order_detail_1)
    {
      $bags_arr = array(
        'id' => ((int)($order_last_rows[0])) + 1,
        'company_name' => $_POST["company_name"],
        'cap_number' => $_POST["cap_number"],
        'telephone' => $_POST["telephone"],
        'owner' => $_POST["owner"],
        'people' => $_POST["team_person"],
        'email' => $_POST["email"],
        'sport' => $_POST["selected_order_sport"],
        'gender' => $_POST["selected_order_gender"],
        'typology' => substr($_POST["selected_order_typology_1"], 3, strpos($_POST["selected_order_typology_1"], "</b>") - 3),
        'brand' => $_POST["selected_order_brand"],
        'product_name' => $bags_order_detail_1->name,
        'product_sku' => $bags_order_detail_1->sku,
        'product_type' => 'Zaini e Borse',
        'product_price' => iconv("UTF-8", "CP1252", $bags_order_detail_1->price),
        'group'=> 'Configurazione 1',
        'language'=> $language,
        'date' => date("Y-m-d H:i"),
      );
      // fputcsv($file, $bags_arr, ";");
      fwrite($file, implode(";", $bags_arr));
      fwrite($file, "\n");
    }

    if($kits_order_detail_1)
    {
      $kits_arr = array(
        'id' => ((int)($order_last_rows[0])) + 1,
        'company_name' => $_POST["company_name"],
        'cap_number' => $_POST["cap_number"],
        'telephone' => $_POST["telephone"],
        'owner' => $_POST["owner"],
        'people' => $_POST["team_person"],
        'email' => $_POST["email"],
        'sport' => $_POST["selected_order_sport"],
        'gender' => $_POST["selected_order_gender"],
        'typology' => substr($_POST["selected_order_typology_1"], 3, strpos($_POST["selected_order_typology_1"], "</b>") - 3),
        'brand' => $_POST["selected_order_brand"],
        'product_name' => $kits_order_detail_1->name,
        'product_sku' => $kits_order_detail_1->sku,
        'product_type' => 'Tute',
        'product_price' => iconv("UTF-8", "CP1252", $kits_order_detail_1->price),
        'group'=> 'Configurazione 1',
        'language'=> $language,
        'date' => date("Y-m-d H:i"),
      );
      // fputcsv($file, $kits_arr, ";");
      fwrite($file, implode(";", $kits_arr));
      fwrite($file, "\n");
    }

    if($rainjacket_order_detail_1)
    {
      $rainjacket_arr = array(
        'id' => ((int)($order_last_rows[0])) + 1,
        'company_name' => $_POST["company_name"],
        'cap_number' => $_POST["cap_number"],
        'telephone' => $_POST["telephone"],
        'owner' => $_POST["owner"],
        'people' => $_POST["team_person"],
        'email' => $_POST["email"],
        'sport' => $_POST["selected_order_sport"],
        'gender' => $_POST["selected_order_gender"],
        'typology' => substr($_POST["selected_order_typology_1"], 3, strpos($_POST["selected_order_typology_1"], "</b>") - 3),
        'brand' => $_POST["selected_order_brand"],
        'product_name' => $rainjacket_order_detail_1->name,
        'product_sku' => $rainjacket_order_detail_1->sku,
        'product_type' => 'Rain Jacket',
        'product_price' => iconv("UTF-8", "CP1252", $rainjacket_order_detail_1->price),
        'group'=> 'Configurazione 1',
        'language'=> $language,
        'date' => date("Y-m-d H:i"),
      );
      // fputcsv($file, $rainjacket_arr, ";");
      fwrite($file, implode(";", $rainjacket_arr));
      fwrite($file, "\n");
    }

    if($jacket_order_detail_1)
    {
      $jacket_arr = array(
        'id' => ((int)($order_last_rows[0])) + 1,
        'company_name' => $_POST["company_name"],
        'cap_number' => $_POST["cap_number"],
        'telephone' => $_POST["telephone"],
        'owner' => $_POST["owner"],
        'people' => $_POST["team_person"],
        'email' => $_POST["email"],
        'sport' => $_POST["selected_order_sport"],
        'gender' => $_POST["selected_order_gender"],
        'typology' => substr($_POST["selected_order_typology_1"], 3, strpos($_POST["selected_order_typology_1"], "</b>") - 3),
        'brand' => $_POST["selected_order_brand"],
        'product_name' => $jacket_order_detail_1->name,
        'product_sku' => $jacket_order_detail_1->sku,
        'product_type' => 'Giubbotto',
        'product_price' => iconv("UTF-8", "CP1252", $jacket_order_detail_1->price),
        'group'=> 'Configurazione 1',
        'language'=> $language,
        'date' => date("Y-m-d H:i"),
      );
      // fputcsv($file, $jacket_arr, ";");
      fwrite($file, implode(";", $jacket_arr));
      fwrite($file, "\n");
    }

    if($shirt_order_detail_2)
    {
      $shirt_arr = array(
        'id' => ((int)($order_last_rows[0])) + 1,
        'company_name' => $_POST["company_name"],
        'cap_number' => $_POST["cap_number"],
        'telephone' => $_POST["telephone"],
        'owner' => $_POST["owner"],
        'people' => $_POST["team_person"],
        'email' => $_POST["email"],
        'sport' => $_POST["selected_order_sport"],
        'gender' => $_POST["selected_order_gender"],
        'typology' => substr($_POST["selected_order_typology_2"], 3, strpos($_POST["selected_order_typology_2"], "</b>") - 3),
        'brand' => $_POST["selected_order_brand"],
        'product_name' => $shirt_order_detail_2->name,
        'product_sku' => $shirt_order_detail_2->sku,
        'product_type' => 'Maglie a maniche corte',
        'product_price' => iconv("UTF-8", "CP1252", $shirt_order_detail_2->price),
        'group'=> 'Configurazione 2',
        'language'=> $language,
        'date' => date("Y-m-d H:i"),
      );
      // fputcsv($file, $shirt_arr, ";");
      fwrite($file, implode(";", $shirt_arr));
      fwrite($file, "\n");
    }

    if($sleeve_order_detail_2)
    {
      $sleeve_arr = array(
        'id' => ((int)($order_last_rows[0])) + 1,
        'company_name' => $_POST["company_name"],
        'cap_number' => $_POST["cap_number"],
        'telephone' => $_POST["telephone"],
        'owner' => $_POST["owner"],
        'people' => $_POST["team_person"],
        'email' => $_POST["email"],
        'sport' => $_POST["selected_order_sport"],
        'gender' => $_POST["selected_order_gender"],
        'typology' => substr($_POST["selected_order_typology_2"], 3, strpos($_POST["selected_order_typology_2"], "</b>") - 3),
        'brand' => $_POST["selected_order_brand"],
        'product_name' => $sleeve_order_detail_2->name,
        'product_sku' => $sleeve_order_detail_2->sku,
        'product_type' => 'Maglie a maniche lunghe',
        'product_price' => iconv("UTF-8", "CP1252", $sleeve_order_detail_2->price),
        'group'=> 'Configurazione 2',
        'language'=> $language,
        'date' => date("Y-m-d H:i"),
      );
      // fputcsv($file, $sleeve_arr, ";");
      fwrite($file, implode(";", $sleeve_arr));
      fwrite($file, "\n");
    }

    if($sweat_order_detail_2)
    {
      $sweat_arr = array(
        'id' => ((int)($order_last_rows[0])) + 1,
        'company_name' => $_POST["company_name"],
        'cap_number' => $_POST["cap_number"],
        'telephone' => $_POST["telephone"],
        'owner' => $_POST["owner"],
        'people' => $_POST["team_person"],
        'email' => $_POST["email"],
        'sport' => $_POST["selected_order_sport"],
        'gender' => $_POST["selected_order_gender"],
        'typology' => substr($_POST["selected_order_typology_2"], 3, strpos($_POST["selected_order_typology_2"], "</b>") - 3),
        'brand' => $_POST["selected_order_brand"],
        'product_name' => $sweat_order_detail_2->name,
        'product_sku' => $sweat_order_detail_2->sku,
        'product_type' => 'Felpe',
        'product_price' => iconv("UTF-8", "CP1252", $sweat_order_detail_2->price),
        'group'=> 'Configurazione 2',
        'language'=> $language,
        'date' => date("Y-m-d H:i"),
      );
      // fputcsv($file, $sweat_arr, ";");
      fwrite($file, implode(";", $sweat_arr));
      fwrite($file, "\n");
    }

    if($pants_order_detail_2)
    {
      $pants_arr = array(
        'id' => ((int)($order_last_rows[0])) + 1,
        'company_name' => $_POST["company_name"],
        'cap_number' => $_POST["cap_number"],
        'telephone' => $_POST["telephone"],
        'owner' => $_POST["owner"],
        'people' => $_POST["team_person"],
        'email' => $_POST["email"],
        'sport' => $_POST["selected_order_sport"],
        'gender' => $_POST["selected_order_gender"],
        'typology' => substr($_POST["selected_order_typology_2"], 3, strpos($_POST["selected_order_typology_2"], "</b>") - 3),
        'brand' => $_POST["selected_order_brand"],
        'product_name' => $pants_order_detail_2->name,
        'product_sku' => $pants_order_detail_2->sku,
        'product_type' => 'Pantaloncini',
        'product_price' => iconv("UTF-8", "CP1252", $pants_order_detail_2->price),
        'group'=> 'Configurazione 2',
        'language'=> $language,
        'date' => date("Y-m-d H:i"),
      );
      // fputcsv($file, $pants_arr, ";");
      fwrite($file, implode(";", $pants_arr));
      fwrite($file, "\n");
    }

    if($longpants_order_detail_2)
    {
      $longpants_arr = array(
        'id' => ((int)($order_last_rows[0])) + 1,
        'company_name' => $_POST["company_name"],
        'cap_number' => $_POST["cap_number"],
        'telephone' => $_POST["telephone"],
        'owner' => $_POST["owner"],
        'people' => $_POST["team_person"],
        'email' => $_POST["email"],
        'sport' => $_POST["selected_order_sport"],
        'gender' => $_POST["selected_order_gender"],
        'typology' => substr($_POST["selected_order_typology_2"], 3, strpos($_POST["selected_order_typology_2"], "</b>") - 3),
        'brand' => $_POST["selected_order_brand"],
        'product_name' => $longpants_order_detail_2->name,
        'product_sku' => $longpants_order_detail_2->sku,
        'product_type' => 'Pantaloni',
        'product_price' => iconv("UTF-8", "CP1252", $longpants_order_detail_2->price),
        'group'=> 'Configurazione 2',
        'language'=> $language,
        'date' => date("Y-m-d H:i"),
      );
      // fputcsv($file, $longpants_arr, ";");
      fwrite($file, implode(";", $longpants_arr));
      fwrite($file, "\n");
    }

    if($socks_order_detail_2)
    {
      $socks_arr = array(
        'id' => ((int)($order_last_rows[0])) + 1,
        'company_name' => $_POST["company_name"],
        'cap_number' => $_POST["cap_number"],
        'telephone' => $_POST["telephone"],
        'owner' => $_POST["owner"],
        'people' => $_POST["team_person"],
        'email' => $_POST["email"],
        'sport' => $_POST["selected_order_sport"],
        'gender' => $_POST["selected_order_gender"],
        'typology' => substr($_POST["selected_order_typology_2"], 3, strpos($_POST["selected_order_typology_2"], "</b>") - 3),
        'brand' => $_POST["selected_order_brand"],
        'product_name' => $socks_order_detail_2->name,
        'product_sku' => $socks_order_detail_2->sku,
        'product_type' => 'Calze',
        'product_price' => iconv("UTF-8", "CP1252", $socks_order_detail_2->price),
        'group'=> 'Configurazione 2',
        'language'=> $language,
        'date' => date("Y-m-d H:i"),
      );
      // fputcsv($file, $socks_arr, ";");
      fwrite($file, implode(";", $socks_arr));
      fwrite($file, "\n");
    }

    if($ball_order_detail_2)
    {
      $ball_arr = array(
        'id' => ((int)($order_last_rows[0])) + 1,
        'company_name' => $_POST["company_name"],
        'cap_number' => $_POST["cap_number"],
        'telephone' => $_POST["telephone"],
        'owner' => $_POST["owner"],
        'people' => $_POST["team_person"],
        'email' => $_POST["email"],
        'sport' => $_POST["selected_order_sport"],
        'gender' => $_POST["selected_order_gender"],
        'typology' => substr($_POST["selected_order_typology_2"], 3, strpos($_POST["selected_order_typology_2"], "</b>") - 3),
        'brand' => $_POST["selected_order_brand"],
        'product_name' => $ball_order_detail_2->name,
        'product_sku' => $ball_order_detail_2->sku,
        'product_type' => 'Palloni e Accessori',
        'product_price' => iconv("UTF-8", "CP1252", $ball_order_detail_2->price),
        'group'=> 'Configurazione 2',
        'language'=> $language,
        'date' => date("Y-m-d H:i"),
      );
      // fputcsv($file, $ball_arr, ";");
      fwrite($file, implode(";", $ball_arr));
      fwrite($file, "\n");
    }

    if($bags_order_detail_2)
    {
      $bags_arr = array(
        'id' => ((int)($order_last_rows[0])) + 1,
        'company_name' => $_POST["company_name"],
        'cap_number' => $_POST["cap_number"],
        'telephone' => $_POST["telephone"],
        'owner' => $_POST["owner"],
        'people' => $_POST["team_person"],
        'email' => $_POST["email"],
        'sport' => $_POST["selected_order_sport"],
        'gender' => $_POST["selected_order_gender"],
        'typology' => substr($_POST["selected_order_typology_2"], 3, strpos($_POST["selected_order_typology_2"], "</b>") - 3),
        'brand' => $_POST["selected_order_brand"],
        'product_name' => $bags_order_detail_2->name,
        'product_sku' => $bags_order_detail_2->sku,
        'product_type' => 'Zaini e Borse',
        'product_price' => iconv("UTF-8", "CP1252", $bags_order_detail_2->price),
        'group'=> 'Configurazione 2',
        'language'=> $language,
        'date' => date("Y-m-d H:i"),
      );
      // fputcsv($file, $bags_arr, ";");
      fwrite($file, implode(";", $bags_arr));
      fwrite($file, "\n");
    }

    if($kits_order_detail_2)
    {
      $kits_arr = array(
        'id' => ((int)($order_last_rows[0])) + 1,
        'company_name' => $_POST["company_name"],
        'cap_number' => $_POST["cap_number"],
        'telephone' => $_POST["telephone"],
        'owner' => $_POST["owner"],
        'people' => $_POST["team_person"],
        'email' => $_POST["email"],
        'sport' => $_POST["selected_order_sport"],
        'gender' => $_POST["selected_order_gender"],
        'typology' => substr($_POST["selected_order_typology_2"], 3, strpos($_POST["selected_order_typology_2"], "</b>") - 3),
        'brand' => $_POST["selected_order_brand"],
        'product_name' => $kits_order_detail_2->name,
        'product_sku' => $kits_order_detail_2->sku,
        'product_type' => 'Tute',
        'product_price' => iconv("UTF-8", "CP1252", $kits_order_detail_2->price),
        'group'=> 'Configurazione 2',
        'language'=> $language,
        'date' => date("Y-m-d H:i"),
      );
      // fputcsv($file, $kits_arr, ";");
      fwrite($file, implode(";", $kits_arr));
      fwrite($file, "\n");
    }

    if($rainjacket_order_detail_2)
    {
      $rainjacket_arr = array(
        'id' => ((int)($order_last_rows[0])) + 1,
        'company_name' => $_POST["company_name"],
        'cap_number' => $_POST["cap_number"],
        'telephone' => $_POST["telephone"],
        'owner' => $_POST["owner"],
        'people' => $_POST["team_person"],
        'email' => $_POST["email"],
        'sport' => $_POST["selected_order_sport"],
        'gender' => $_POST["selected_order_gender"],
        'typology' => substr($_POST["selected_order_typology_2"], 3, strpos($_POST["selected_order_typology_2"], "</b>") - 3),
        'brand' => $_POST["selected_order_brand"],
        'product_name' => $rainjacket_order_detail_2->name,
        'product_sku' => $rainjacket_order_detail_2->sku,
        'product_type' => 'Rain Jacket',
        'product_price' => iconv("UTF-8", "CP1252", $rainjacket_order_detail_2->price),
        'group'=> 'Configurazione 2',
        'language'=> $language,
        'date' => date("Y-m-d H:i"),
      );
      // fputcsv($file, $rainjacket_arr, ";");
      fwrite($file, implode(";", $rainjacket_arr));
      fwrite($file, "\n");
    }

    if($jacket_order_detail_2)
    {
      $jacket_arr = array(
        'id' => ((int)($order_last_rows[0])) + 1,
        'company_name' => $_POST["company_name"],
        'cap_number' => $_POST["cap_number"],
        'telephone' => $_POST["telephone"],
        'owner' => $_POST["owner"],
        'people' => $_POST["team_person"],
        'email' => $_POST["email"],
        'sport' => $_POST["selected_order_sport"],
        'gender' => $_POST["selected_order_gender"],
        'typology' => substr($_POST["selected_order_typology_2"], 3, strpos($_POST["selected_order_typology_2"], "</b>") - 3),
        'brand' => $_POST["selected_order_brand"],
        'product_name' => $jacket_order_detail_2->name,
        'product_sku' => $jacket_order_detail_2->sku,
        'product_type' => 'Giubbotto',
        'product_price' => iconv("UTF-8", "CP1252", $jacket_order_detail_2->price),
        'group'=> 'Configurazione 2',
        'language'=> $language,
        'date' => date("Y-m-d H:i"),
      );
      // fputcsv($file, $jacket_arr, ";");
      fwrite($file, implode(";", $jacket_arr));
      fwrite($file, "\n");
    }

    if($shirt_order_detail_3)
    {
      $shirt_arr = array(
        'id' => ((int)($order_last_rows[0])) + 1,
        'company_name' => $_POST["company_name"],
        'cap_number' => $_POST["cap_number"],
        'telephone' => $_POST["telephone"],
        'owner' => $_POST["owner"],
        'people' => $_POST["team_person"],
        'email' => $_POST["email"],
        'sport' => $_POST["selected_order_sport"],
        'gender' => $_POST["selected_order_gender"],
        'typology' => substr($_POST["selected_order_typology_3"], 3, strpos($_POST["selected_order_typology_3"], "</b>") - 3),
        'brand' => $_POST["selected_order_brand"],
        'product_name' => $shirt_order_detail_3->name,
        'product_sku' => $shirt_order_detail_3->sku,
        'product_type' => 'Maglie a maniche corte',
        'product_price' => iconv("UTF-8", "CP1252", $shirt_order_detail_3->price),
        'group'=> 'Configurazione 3',
        'language'=> $language,
        'date' => date("Y-m-d H:i"),
      );
      // fputcsv($file, $shirt_arr, ";");
      fwrite($file, implode(";", $shirt_arr));
      fwrite($file, "\n");
    }

    if($sleeve_order_detail_3)
    {
      $sleeve_arr = array(
        'id' => ((int)($order_last_rows[0])) + 1,
        'company_name' => $_POST["company_name"],
        'cap_number' => $_POST["cap_number"],
        'telephone' => $_POST["telephone"],
        'owner' => $_POST["owner"],
        'people' => $_POST["team_person"],
        'email' => $_POST["email"],
        'sport' => $_POST["selected_order_sport"],
        'gender' => $_POST["selected_order_gender"],
        'typology' => substr($_POST["selected_order_typology_3"], 3, strpos($_POST["selected_order_typology_3"], "</b>") - 3),
        'brand' => $_POST["selected_order_brand"],
        'product_name' => $sleeve_order_detail_3->name,
        'product_sku' => $sleeve_order_detail_3->sku,
        'product_type' => 'Maglie a maniche lunghe',
        'product_price' => iconv("UTF-8", "CP1252", $sleeve_order_detail_3->price),
        'group'=> 'Configurazione 3',
        'language'=> $language,
        'date' => date("Y-m-d H:i"),
      );
      // fputcsv($file, $sleeve_arr, ";");
      fwrite($file, implode(";", $sleeve_arr));
      fwrite($file, "\n");
    }

    if($sweat_order_detail_3)
    {
      $sweat_arr = array(
        'id' => ((int)($order_last_rows[0])) + 1,
        'company_name' => $_POST["company_name"],
        'cap_number' => $_POST["cap_number"],
        'telephone' => $_POST["telephone"],
        'owner' => $_POST["owner"],
        'people' => $_POST["team_person"],
        'email' => $_POST["email"],
        'sport' => $_POST["selected_order_sport"],
        'gender' => $_POST["selected_order_gender"],
        'typology' => substr($_POST["selected_order_typology_3"], 3, strpos($_POST["selected_order_typology_3"], "</b>") - 3),
        'brand' => $_POST["selected_order_brand"],
        'product_name' => $sweat_order_detail_3->name,
        'product_sku' => $sweat_order_detail_3->sku,
        'product_type' => 'Felpe',
        'product_price' => iconv("UTF-8", "CP1252", $sweat_order_detail_3->price),
        'group'=> 'Configurazione 3',
        'language'=> $language,
        'date' => date("Y-m-d H:i"),
      );
      // fputcsv($file, $sweat_arr, ";");
      fwrite($file, implode(";", $sweat_arr));
      fwrite($file, "\n");
    }

    if($pants_order_detail_3)
    {
      $pants_arr = array(
        'id' => ((int)($order_last_rows[0])) + 1,
        'company_name' => $_POST["company_name"],
        'cap_number' => $_POST["cap_number"],
        'telephone' => $_POST["telephone"],
        'owner' => $_POST["owner"],
        'people' => $_POST["team_person"],
        'email' => $_POST["email"],
        'sport' => $_POST["selected_order_sport"],
        'gender' => $_POST["selected_order_gender"],
        'typology' => substr($_POST["selected_order_typology_3"], 3, strpos($_POST["selected_order_typology_3"], "</b>") - 3),
        'brand' => $_POST["selected_order_brand"],
        'product_name' => $pants_order_detail_3->name,
        'product_sku' => $pants_order_detail_3->sku,
        'product_type' => 'Pantaloncini',
        'product_price' => iconv("UTF-8", "CP1252", $pants_order_detail_3->price),
        'group'=> 'Configurazione 3',
        'language'=> $language,
        'date' => date("Y-m-d H:i"),
      );
      // fputcsv($file, $pants_arr, ";");
      fwrite($file, implode(";", $pants_arr));
      fwrite($file, "\n");
    }

    if($longpants_order_detail_3)
    {
      $longpants_arr = array(
        'id' => ((int)($order_last_rows[0])) + 1,
        'company_name' => $_POST["company_name"],
        'cap_number' => $_POST["cap_number"],
        'telephone' => $_POST["telephone"],
        'owner' => $_POST["owner"],
        'people' => $_POST["team_person"],
        'email' => $_POST["email"],
        'sport' => $_POST["selected_order_sport"],
        'gender' => $_POST["selected_order_gender"],
        'typology' => substr($_POST["selected_order_typology_3"], 3, strpos($_POST["selected_order_typology_3"], "</b>") - 3),
        'brand' => $_POST["selected_order_brand"],
        'product_name' => $longpants_order_detail_3->name,
        'product_sku' => $longpants_order_detail_3->sku,
        'product_type' => 'Pantaloni',
        'product_price' => iconv("UTF-8", "CP1252", $longpants_order_detail_3->price),
        'group'=> 'Configurazione 3',
        'language'=> $language,
        'date' => date("Y-m-d H:i"),
      );
      // fputcsv($file, $longpants_arr, ";");
      fwrite($file, implode(";", $longpants_arr));
      fwrite($file, "\n");
    }

    if($socks_order_detail_3)
    {
      $socks_arr = array(
        'id' => ((int)($order_last_rows[0])) + 1,
        'company_name' => $_POST["company_name"],
        'cap_number' => $_POST["cap_number"],
        'telephone' => $_POST["telephone"],
        'owner' => $_POST["owner"],
        'people' => $_POST["team_person"],
        'email' => $_POST["email"],
        'sport' => $_POST["selected_order_sport"],
        'gender' => $_POST["selected_order_gender"],
        'typology' => substr($_POST["selected_order_typology_3"], 3, strpos($_POST["selected_order_typology_3"], "</b>") - 3),
        'brand' => $_POST["selected_order_brand"],
        'product_name' => $socks_order_detail_3->name,
        'product_sku' => $socks_order_detail_3->sku,
        'product_type' => 'Calze',
        'product_price' => iconv("UTF-8", "CP1252", $socks_order_detail_3->price),
        'group'=> 'Configurazione 3',
        'language'=> $language,
        'date' => date("Y-m-d H:i"),
      );
      // fputcsv($file, $socks_arr, ";");
      fwrite($file, implode(";", $socks_arr));
      fwrite($file, "\n");
    }

    if($ball_order_detail_3)
    {
      $ball_arr = array(
        'id' => ((int)($order_last_rows[0])) + 1,
        'company_name' => $_POST["company_name"],
        'cap_number' => $_POST["cap_number"],
        'telephone' => $_POST["telephone"],
        'owner' => $_POST["owner"],
        'people' => $_POST["team_person"],
        'email' => $_POST["email"],
        'sport' => $_POST["selected_order_sport"],
        'gender' => $_POST["selected_order_gender"],
        'typology' => substr($_POST["selected_order_typology_3"], 3, strpos($_POST["selected_order_typology_3"], "</b>") - 3),
        'brand' => $_POST["selected_order_brand"],
        'product_name' => $ball_order_detail_3->name,
        'product_sku' => $ball_order_detail_3->sku,
        'product_type' => 'Palloni e Accessori',
        'product_price' => iconv("UTF-8", "CP1252", $ball_order_detail_3->price),
        'group'=> 'Configurazione 3',
        'language'=> $language,
        'date' => date("Y-m-d H:i"),
      );
      // fputcsv($file, $ball_arr, ";");
      fwrite($file, implode(";", $ball_arr));
      fwrite($file, "\n");
    }

    if($bags_order_detail_3)
    {
      $bags_arr = array(
        'id' => ((int)($order_last_rows[0])) + 1,
        'company_name' => $_POST["company_name"],
        'cap_number' => $_POST["cap_number"],
        'telephone' => $_POST["telephone"],
        'owner' => $_POST["owner"],
        'people' => $_POST["team_person"],
        'email' => $_POST["email"],
        'sport' => $_POST["selected_order_sport"],
        'gender' => $_POST["selected_order_gender"],
        'typology' => substr($_POST["selected_order_typology_3"], 3, strpos($_POST["selected_order_typology_3"], "</b>") - 3),
        'brand' => $_POST["selected_order_brand"],
        'product_name' => $bags_order_detail_3->name,
        'product_sku' => $bags_order_detail_3->sku,
        'product_type' => 'Zaini e Borse',
        'product_price' => iconv("UTF-8", "CP1252", $bags_order_detail_3->price),
        'group'=> 'Configurazione 3',
        'language'=> $language,
        'date' => date("Y-m-d H:i"),
      );
      // fputcsv($file, $bags_arr, ";");
      fwrite($file, implode(";", $bags_arr));
      fwrite($file, "\n");
    }

    if($kits_order_detail_3)
    {
      $kits_arr = array(
        'id' => ((int)($order_last_rows[0])) + 1,
        'company_name' => $_POST["company_name"],
        'cap_number' => $_POST["cap_number"],
        'telephone' => $_POST["telephone"],
        'owner' => $_POST["owner"],
        'people' => $_POST["team_person"],
        'email' => $_POST["email"],
        'sport' => $_POST["selected_order_sport"],
        'gender' => $_POST["selected_order_gender"],
        'typology' => substr($_POST["selected_order_typology_3"], 3, strpos($_POST["selected_order_typology_3"], "</b>") - 3),
        'brand' => $_POST["selected_order_brand"],
        'product_name' => $kits_order_detail_3->name,
        'product_sku' => $kits_order_detail_3->sku,
        'product_type' => 'Tute',
        'product_price' => iconv("UTF-8", "CP1252", $kits_order_detail_3->price),
        'group'=> 'Configurazione 3',
        'language'=> $language,
        'date' => date("Y-m-d H:i"),
      );
      // fputcsv($file, $kits_arr, ";");
      fwrite($file, implode(";", $kits_arr));
      fwrite($file, "\n");
    }

    if($rainjacket_order_detail_3)
    {
      $rainjacket_arr = array(
        'id' => ((int)($order_last_rows[0])) + 1,
        'company_name' => $_POST["company_name"],
        'cap_number' => $_POST["cap_number"],
        'telephone' => $_POST["telephone"],
        'owner' => $_POST["owner"],
        'people' => $_POST["team_person"],
        'email' => $_POST["email"],
        'sport' => $_POST["selected_order_sport"],
        'gender' => $_POST["selected_order_gender"],
        'typology' => substr($_POST["selected_order_typology_3"], 3, strpos($_POST["selected_order_typology_3"], "</b>") - 3),
        'brand' => $_POST["selected_order_brand"],
        'product_name' => $rainjacket_order_detail_3->name,
        'product_sku' => $rainjacket_order_detail_3->sku,
        'product_type' => 'Rain Jacket',
        'product_price' => iconv("UTF-8", "CP1252", $rainjacket_order_detail_3->price),
        'group'=> 'Configurazione 3',
        'language'=> $language,
        'date' => date("Y-m-d H:i"),
      );
      // fputcsv($file, $rainjacket_arr, ";");
      fwrite($file, implode(";", $rainjacket_arr));
      fwrite($file, "\n");
    }

    if($jacket_order_detail_3)
    {
      $jacket_arr = array(
        'id' => ((int)($order_last_rows[0])) + 1,
        'company_name' => $_POST["company_name"],
        'cap_number' => $_POST["cap_number"],
        'telephone' => $_POST["telephone"],
        'owner' => $_POST["owner"],
        'people' => $_POST["team_person"],
        'email' => $_POST["email"],
        'sport' => $_POST["selected_order_sport"],
        'gender' => $_POST["selected_order_gender"],
        'typology' => substr($_POST["selected_order_typology_3"], 3, strpos($_POST["selected_order_typology_3"], "</b>") - 3),
        'brand' => $_POST["selected_order_brand"],
        'product_name' => $jacket_order_detail_3->name,
        'product_sku' => $jacket_order_detail_3->sku,
        'product_type' => 'Giubbotto',
        'product_price' => iconv("UTF-8", "CP1252", $jacket_order_detail_3->price),
        'group'=> 'Configurazione 3',
        'language'=> $language,
        'date' => date("Y-m-d H:i"),
      );
      // fputcsv($file, $jacket_arr, ";");
      fwrite($file, implode(";", $jacket_arr));
      fwrite($file, "\n");
    }
    fclose($file);
  }
?>

<!-- END SEND MAIL SCRIPT -->   
<div id="success">      
      <main>
        <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12">
                        <div class="box_general">
                <div class="row justify-content-center">
                  <div class="icon icon--order-success svg">
                    <svg xmlns="http://www.w3.org/2000/svg" width="72px" height="72px">
                      <g fill="none" stroke="#8EC343" stroke-width="2">
                      <circle cx="36" cy="36" r="35" style="stroke-dasharray:240px, 240px; stroke-dashoffset: 480px;"></circle>
                      <path d="M17.417,37.778l9.93,9.909l25.444-25.393" style="stroke-dasharray:50px, 50px; stroke-dashoffset: 0px;"></path>
                      </g>
                    </svg>
                  </div>
                </div>  
                <h1 class="text-center mb-3 mt-3 thx_h1_title"><b>Grazie!</b></h1>
                <h2 class="text-center thx2_h2_title">La tua configurazione è stata inviata</h2>
                <p class="text-center mt-3 mb-4 thx2_p_text">Verrai contattato dal nostro Ufficio Commerciale entro 24h</p><br>
                <h2 class="text-center thx3_h2_title">Vuoi configurare un altro Kit?</h2>

                <div class="row justify-content-center mt-4">
                    <form name="example-1" id="wrapped" method="POST" action="main.php">
                      <input type="hidden" class="mailer_language" name="language" value="<?php echo $_POST['language']; ?>" />
                      <!-- <button class="continue_wizard" id="continue_wizard"><i class="icon-brush mr-3"></i>CONFIGURA IL TUO KIT</button> -->
                      <button type="submit" class="thx_button" style="padding: 10px 20px; background: #019c4f; text-decoration: none; color: white; border-radius: 5px;">CONFIGURA IL TUO KIT</button>
                    </form>
                </div>

              </div>
                    </div>
                </div>
        </div>
        <!-- /Container -->
      </main>
    </div>
    <div class="cd-overlay-nav">
    <span></span>
</div>
<!-- /cd-overlay-nav -->

<div class="cd-overlay-content">
    <span></span>
</div>
<!-- /cd-overlay-content -->
<a href="#0" class="cd-nav-trigger">Menu<span class="cd-icon"></span></a>
<?php
  require_once "layout/footer.php";
?>
<script>
  // set language from previous page
  language = "<?php echo $_POST['language']; ?>";
  $(document).ready(function(){
    if (language == 'it')
      language = 'en';
    else
      language = 'it';
    setLanguageData();
  });
</script>