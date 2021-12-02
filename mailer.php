<?php
require_once "layout/header.php";
?>
<?php
require "phpmailer/src/PHPMailer.php";
require "phpmailer/src/Exception.php";
require "phpmailer/src/SMTP.php";

setUserInformationToCookie();

sendMailToAdmin("configuratore@ggteamwear.com", "configuratore@ggteamwear.com");
sendMailToUser("configuratore@ggteamwear.com", $_POST["email"]);

function setUserInformationToCookie()
{
  $user = [
    "company" => $_POST["company_name"],
    "cap" => $_POST["cap_number"],
    "people" => $_POST["team_person"],
    "owner" => $_POST["owner"],
    "telephone" => $_POST["telephone"],
    "email" => $_POST["email"],
  ];
  setcookie("user", json_encode($user), time()+60*60*24*30);
}

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

    $mail->Subject = 'Nuova Iscrizione Configuratore B2B';

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
        <img style="max-width:200px; padding-bottom: 30px;" src="https://amministrazionedigitale.org/ggteamwear/media/2020/09/logo350px.png">
        <h1 style="font-size: 25px;">Ciao Admin!</h1>
        <h1 style="font-size: 25px;">Un utente ha appena iniziato a usare il configuratore</h1>
        <div style="text-align: center; font-size:16px;">
          <p>Di seguito i dettagli:</p>
          <p><b>Nome Società : </b>' . $_POST["company_name"] . '</p>
          <p><b>CAP : </b>' . $_POST["cap_number"] . '</p>
          <p><b>Numero Atleti : </b>' . $_POST["team_person"] . '</p>
          <p><b>Struttura di proprietà : </b>' . $_POST["owner"] . '</p>
          <p><b>Telefono : </b>' . $_POST["telephone"] . '</p>
          <p><b>Email : </b>' . $_POST["email"] . '</p>
        </div>  
        <div style="background: #333333;  color: white; margin: 0 auto; margin-top: 50px; padding-top: 10px; padding-bottom: 20px;">
          <p style="font-size: 14px;">© 2021 <b>GGTEAMWEAR</b> - Tutti i diritti sono riservati</p>
          <a href="https://www.facebook.com/GGTeamwear/"><img src="https://amministrazionedigitale.org/ggteamwear/configuratore/img/fbicon.png" style="width:20px;"></a>
          <a href="https://www.instagram.com/gg_teamwear/"><img src="https://amministrazionedigitale.org/ggteamwear/configuratore/img/instaicon.png" style="width:20px;"></a>
          <a href="https://www.linkedin.com/company/gg-teamwear/"><img src="https://ggteamwear.com/configuratore/img/linkedinpic.png" style="width:20px;"></a>
          <a href="https://www.youtube.com/channel/UCQKZEx6JErGzGrtdb1S9QRg"><img src="https://ggteamwear.com/configuratore/img/youtubeico.png" style="width:20px;"></a>
          </div>
      </div>
    </body>
    </html>';
    $mail->Body = $message_admin;

    $mail->send();
  }

  function sendMailToUser($fromUser, $toUser)
  {
    //get language data
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

    $mail->Subject = $data['mail_signup_object'];
    
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
    <h1 style="font-size: 25px; padding-bottom:30px;">'.$data['mail_signup_h1_opening2'].'</h1>
    <p style="font-size: 18px;">'.$data['mail_signup_p_body'].'</p>
    <p style="font-size: 18px; padding-bottom:30px;">'.$data['mail_signup_p_body2'].'</p>
    <a href="https://www.ggteamwear.com/configuratore/main.php" style="padding: 10px 20px; background: #019c4f; text-decoration: none; color: white; border-radius: 5px;">'.$data['mail_signup_conf_button'].'</a>
    <div style="background: #333333;  color: white; margin: 0 auto; margin-top: 50px; padding-top: 10px; padding-bottom: 20px;">
    <p style="font-size: 14px;">'.$data['mail_footer_copyright'].'</p>
    <a href="https://www.facebook.com/GGTeamwear/"><img src="https://www.ggteamwear.com/configuratore/img/fbicon.png" style="width:20px;"></a>
    <a href="https://www.instagram.com/gg_teamwear/"><img src="https://www.ggteamwear.com/configuratore/img/instaicon.png" style="width:20px;"></a>
    <a href="https://www.linkedin.com/company/gg-teamwear/"><img src="https://ggteamwear.com/configuratore/img/linkedinpic.png" style="width:20px;"></a>
    <a href="https://www.youtube.com/channel/UCQKZEx6JErGzGrtdb1S9QRg"><img src="https://ggteamwear.com/configuratore/img/youtubeico.png" style="width:20px;"></a>
    </div>
    </div>
    </body>
    </html>';
    $mail->Body = $message_user;

    $mail->send();
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
              <h2 class="text-center thx_h2_title">La tua iscrizione è andata a buon fine</h2>
              <p class="text-center mt-3 thx_p_text">Fai click sul pulsante in basso per utilizzare il Configuratore</p>
              <div class="row justify-content-center">
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
    //set language from previous page
    language = "<?php echo $_POST['language']; ?>";
    $(document).ready(function(){
      if (language == 'it')
        language = 'en';
      else
        language = 'it';
      setLanguageData();
    });
  </script>