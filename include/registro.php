<?php 

    include("functions.php");
    include("conn.php");

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    use PHPMailer\PHPMailer\SMTP;


    require ('PHPMailer-master/src/Exception.php');
    require ('PHPMailer-master/src/PHPMailer.php');
    require ('PHPMailer-master/src/SMTP.php');

    if( !empty($_SERVER['REQUEST_METHOD'] == 'POST') ){

      $g_recaptcha_response   = $_POST['g-recaptcha-response'];
      $name_registro          = $_POST['name'];
      $fono_registro          = $_POST['fono'];
      $email_registro         = $_POST['email'];
      $fecha_registro         = date('Y-m-d');
      $origen_registro        = 'Formulario';

      $resReCaptchaV3 = verifyReCaptchaV3($g_recaptcha_response);

      if($resReCaptchaV3['success']){

        $query = $connection->prepare("INSERT INTO formulario(fecha, origen, nombre, tel, email) VALUES (:fecha_registro, :origen_registro, :name_registro, :fono_registro, :email_registro)");

        $query->bindParam("fecha_registro", $fecha_registro, PDO::PARAM_STR);
        $query->bindParam("origen_registro", $origen_registro, PDO::PARAM_STR);
        $query->bindParam("name_registro", $name_registro, PDO::PARAM_STR);
        $query->bindParam("fono_registro", $fono_registro, PDO::PARAM_STR);
        $query->bindParam("email_registro", $email_registro, PDO::PARAM_STR);

        $result = $query->execute();

        if ($result) {


          $mail = '<html style="width:100%;font-family:arial, "helvetica neue", helvetica, sans-serif;-webkit-text-size-adjust:100%;-ms-text-size-adjust:100%;padding:0;Margin:0;">
           <head>
            <meta charset="UTF-8">
            <meta content="width=device-width, initial-scale=1" name="viewport">
            <meta name="x-apple-disable-message-reformatting">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta content="telephone=no" name="format-detection">
            <title>sadasd</title>
            <!--[if (mso 16)]>
              <style type="text/css">
              a {text-decoration: none;}
              </style>
              <![endif]-->
            <!--[if gte mso 9]><style>sup { font-size: 100% !important; }</style><![endif]-->
            <style type="text/css">
          @media only screen and (max-width:600px) {p, ul li, ol li, a { font-size:16px!important; line-height:150%!important } h1 { font-size:30px!important; text-align:center; line-height:120%!important } h2 { font-size:26px!important; text-align:center; line-height:120%!important } h3 { font-size:20px!important; text-align:center; line-height:120%!important } h1 a { font-size:30px!important } h2 a { font-size:26px!important } h3 a { font-size:20px!important } .es-menu td a { font-size:16px!important } .es-header-body p, .es-header-body ul li, .es-header-body ol li, .es-header-body a { font-size:16px!important } .es-footer-body p, .es-footer-body ul li, .es-footer-body ol li, .es-footer-body a { font-size:16px!important } .es-infoblock p, .es-infoblock ul li, .es-infoblock ol li, .es-infoblock a { font-size:12px!important } *[class="gmail-fix"] { display:none!important } .es-m-txt-c, .es-m-txt-c h1, .es-m-txt-c h2, .es-m-txt-c h3 { text-align:center!important } .es-m-txt-r, .es-m-txt-r h1, .es-m-txt-r h2, .es-m-txt-r h3 { text-align:right!important } .es-m-txt-l, .es-m-txt-l h1, .es-m-txt-l h2, .es-m-txt-l h3 { text-align:left!important } .es-m-txt-r img, .es-m-txt-c img, .es-m-txt-l img { display:inline!important } .es-button-border { display:block!important } a.es-button { font-size:20px!important; display:block!important; border-width:10px 0px 10px 0px!important } .es-btn-fw { border-width:10px 0px!important; text-align:center!important } .es-adaptive table, .es-btn-fw, .es-btn-fw-brdr, .es-left, .es-right { width:100%!important } .es-content table, .es-header table, .es-footer table, .es-content, .es-footer, .es-header { width:100%!important; max-width:600px!important } .es-adapt-td { display:block!important; width:100%!important } .adapt-img { width:100%!important; height:auto!important } .es-m-p0 { padding:0px!important } .es-m-p0r { padding-right:0px!important } .es-m-p0l { padding-left:0px!important } .es-m-p0t { padding-top:0px!important } .es-m-p0b { padding-bottom:0!important } .es-m-p20b { padding-bottom:20px!important } .es-mobile-hidden, .es-hidden { display:none!important } .es-desk-hidden { display:table-row!important; width:auto!important; overflow:visible!important; float:none!important; max-height:inherit!important; line-height:inherit!important } .es-desk-menu-hidden { display:table-cell!important } table.es-table-not-adapt, .esd-block-html table { width:auto!important } table.es-social { display:inline-block!important } table.es-social td { display:inline-block!important } }
          #outlook a {
            padding:0;
          }
          .ExternalClass {
            width:100%;
          }
          .ExternalClass,
          .ExternalClass p,
          .ExternalClass span,
          .ExternalClass font,
          .ExternalClass td,
          .ExternalClass div {
            line-height:100%;
          }
          .es-button {
            mso-style-priority:100!important;
            text-decoration:none!important;
          }
          a[x-apple-data-detectors] {
            color:inherit!important;
            text-decoration:none!important;
            font-size:inherit!important;
            font-family:inherit!important;
            font-weight:inherit!important;
            line-height:inherit!important;
          }
          .es-desk-hidden {
            display:none;
            float:left;
            overflow:hidden;
            width:0;
            max-height:0;
            line-height:0;
            mso-hide:all;
          }
          </style>
           </head>
           <body style="width:100%;font-family:arial, "helvetica neue", helvetica, sans-serif;-webkit-text-size-adjust:100%;-ms-text-size-adjust:100%;padding:0;Margin:0;">
            <div class="es-wrapper-color" style="background-color:#F6F6F6;">
             <!--[if gte mso 9]>
                <v:background xmlns:v="urn:schemas-microsoft-com:vml" fill="t">
                  <v:fill type="tile" color="#f6f6f6"></v:fill>
                </v:background>
              <![endif]-->
             <table cellpadding="0" cellspacing="0" class="es-wrapper" width="100%" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;padding:0;Margin:0;width:100%;height:100%;background-repeat:repeat;background-position:center top;">
               <tr style="border-collapse:collapse;">
                <td valign="top" style="padding:0;Margin:0;">
                 
                 <table cellpadding="0" cellspacing="0" class="es-content" align="center" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%;">
                   <tr style="border-collapse:collapse;">
                    <td align="center" style="padding:0;Margin:0;">
                     <table bgcolor="#ffffff" class="es-content-body" align="center" cellpadding="0" cellspacing="0" width="600" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:#FFFFFF;">
                       <tr style="border-collapse:collapse;">
                        <td align="left" style="padding:20px;Margin:0;">
                         <table cellpadding="0" cellspacing="0" width="100%" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;">
                           <tr style="border-collapse:collapse;">
                            <td width="560" align="center" valign="top" style="padding:0;Margin:0;">
                             <table cellpadding="0" cellspacing="0" width="100%" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;">
                               <tr style="border-collapse:collapse;">
                                <td align="left" style="padding:0;Margin:0;padding-bottom:15px;"> <h2 style="Margin:0;line-height:29px;mso-line-height-rule:exactly;font-family:arial, "helvetica neue", helvetica, sans-serif;font-size:24px;font-style:normal;font-weight:normal;color:#333333;">Alerta de solicitud de Demo WAVE</h2> </td>
                               </tr>
                               <tr style="border-collapse:collapse;">
                                <td align="left" style="padding:0;Margin:0;"> <p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:14px;font-family:arial, "helvetica neue", helvetica, sans-serif;line-height:21px;color:#333333;">Estimado se derivo una solicitud web, favor responder a la brevedad posible. </p> </td>
                               </tr>
                             </table> </td>
                           </tr>
                         </table> </td>
                       </tr>
                     </table> </td>
                   </tr>
                 </table>
                 <table cellpadding="0" cellspacing="0" class="es-content" align="center" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%;">
                   <tr style="border-collapse:collapse;">
                    <td align="center" style="padding:0;Margin:0;">
                     <table class="es-content-body" align="center" cellpadding="0" cellspacing="0" width="600" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:#FFFFFF;">
                       <tr style="border-collapse:collapse;">
                        <td align="left" style="padding:0;Margin:0;">
                         <table cellpadding="0" cellspacing="0" width="100%" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;">
                           <tr style="border-collapse:collapse;">
                            <td width="600" align="center" valign="top" style="padding:0;Margin:0;">
                             <table cellpadding="0" cellspacing="0" width="100%" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;">
                               <tr style="border-collapse:collapse;">
                                <td align="center" height="10" bgcolor="#f6f6f6" style="padding:0;Margin:0;"> </td>
                               </tr>
                             </table> </td>
                           </tr>
                         </table> </td>
                       </tr>
                     </table> </td>
                   </tr>
                 </table>
                 <table cellpadding="0" cellspacing="0" class="es-content" align="center" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%;">
                   <tr style="border-collapse:collapse;">
                    <td align="center" style="padding:0;Margin:0;background-image:url(https://vuaoo.stripocdn.email/content/guids/cab_proj_abada9bfda6b68f2c968ec23659b9071/images/62721491838977423.png);background-position:center top;background-repeat:no-repeat;">
                     <table bgcolor="#ffffff" class="es-content-body" align="center" cellpadding="0" cellspacing="0" width="600" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:#FFFFFF;">
                       <tr style="border-collapse:collapse;">
                        <td align="left" style="padding:20px;Margin:0;">
                         <table cellpadding="0" cellspacing="0" width="100%" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;">
                           <tr style="border-collapse:collapse;">
                            <td width="560" align="center" valign="top" style="padding:0;Margin:0;">
                             <table cellpadding="0" cellspacing="0" width="100%" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;">
                               <tr style="border-collapse:collapse;">
                                <td align="left" style="padding:0;Margin:0;"> 

                                <p>Los datos de la solicitud son</p>

                                <p>
                                  Nombre: '.$name_registro.' /<br> 
                                  Email: '.$email_registro.' /<br> 
                                  Telefono: '.$fono_registro.' /<br> 
                                  Fecha: '.$fecha_registro.' /<br> 
                                </p>

                                </td>
                               </tr>
                             </table> </td>
                           </tr>
                         </table> </td>
                       </tr>
                     </table> </td>
                   </tr>
                 </table>
                 <table cellpadding="0" cellspacing="0" class="es-content" align="center" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%;">
                   <tr style="border-collapse:collapse;">
                    <td align="center" style="padding:0;Margin:0;">
                     <table class="es-content-body" align="center" cellpadding="0" cellspacing="0" width="600" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:#FFFFFF;">
                       <tr style="border-collapse:collapse;">
                        <td align="left" style="padding:0;Margin:0;">
                         <table cellpadding="0" cellspacing="0" width="100%" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;">
                           <tr style="border-collapse:collapse;">
                            <td width="600" align="center" valign="top" style="padding:0;Margin:0;">
                             <table cellpadding="0" cellspacing="0" width="100%" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;">
                               <tr style="border-collapse:collapse;">
                                <td align="center" height="0" style="padding:0;Margin:0;"> </td>
                               </tr>
                             </table> </td>
                           </tr>
                         </table> </td>
                       </tr>
                     </table> </td>
                   </tr>
                 </table>
                 <table cellpadding="0" cellspacing="0" class="es-content" align="center" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%;">
                   <tr style="border-collapse:collapse;">
                    <td align="center" style="padding:0;Margin:0;">
                     <table class="es-content-body" align="center" cellpadding="0" cellspacing="0" width="600" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:#FFFFFF;">
                       <tr style="border-collapse:collapse;">
                        <td align="left" style="padding:0;Margin:0;">
                         <table cellpadding="0" cellspacing="0" width="100%" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;">
                           <tr style="border-collapse:collapse;">
                            <td width="600" align="center" valign="top" style="padding:0;Margin:0;">
                             <table cellpadding="0" cellspacing="0" width="100%" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;">
                               <tr style="border-collapse:collapse;">
                                <td align="center" height="40" bgcolor="#f6f6f6" style="padding:0;Margin:0;"> </td>
                               </tr>
                             </table> </td>
                           </tr>
                         </table> </td>
                       </tr>
                     </table> </td>
                   </tr>
                 </table>
                 <table cellpadding="0" cellspacing="0" class="es-content" align="center" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%;">
                   <tr style="border-collapse:collapse;">
                    <td align="center" style="padding:0;Margin:0;">
                     <table class="es-content-body" align="center" cellpadding="0" cellspacing="0" width="600" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:#FFFFFF;">
                       <tr style="border-collapse:collapse;">
                        <td align="left" style="padding:0;Margin:0;">
                         <table cellpadding="0" cellspacing="0" width="100%" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;">
                           <tr style="border-collapse:collapse;">
                            <td width="600" align="center" valign="top" style="padding:0;Margin:0;">
                             <table cellpadding="0" cellspacing="0" width="100%" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;">
                               <tr style="border-collapse:collapse;">
                                <td align="center" height="0" bgcolor="#f6f6f6" style="padding:0;Margin:0;"> </td>
                               </tr>
                             </table> </td>
                           </tr>
                         </table> </td>
                       </tr>
                     </table> </td>
                   </tr>
                 </table>
                 
                 </td>
               </tr>
             </table>
            </div>
           </body>
          </html>';


          // Creación de la instancia
          $mailWeb = new PHPMailer();
          // Seteo del uso
          $mailWeb->IsSMTP(); // Uso SMTP
          // Seteo de la seguridad
          $mailWeb->SMTPSecure = 'ssl';
          // Host
          $mailWeb->Host = "smtp.gmail.com";
          // Degug. Valores 1 -> errores y mensajes // 2 solo mensajes // 0 no informa nada
          $mailWeb->SMTPDebug = 0;
          // Autenticación
          $mailWeb->SMTPAuth = true;
          // Puerto
          $mailWeb->Port = 465;
          // Usuario
          $mailWeb->Username = "ventas.mobilink@gmail.com";
          // Contraseña
          $mailWeb->Password = "rmjwshvntsttmkch";
          // Quien envia
          $mailWeb->SetFrom("ventas.mobilink@gmail.com", "Wave");
          // Asunto del email
          $mailWeb->Subject = "solicitud de Demo WAVE";
          // En caso de que la vista HTML no esté activida. Esto ya es muy poco probable
          $mailWeb->AltBody = "Para ver correctamente este mensaje use la vista de HTML";
          // El cuerpo del mensaje. 
          $mailWeb->MsgHTML($mail);
          // Dirección del destinatario
          $mailWeb->AddAddress("mobilink@motorolasolutions.com");
          // Enviar el correo
          if (!$mailWeb->Send()){
           echo 'error';
          }else{
            echo 'OK';
          }
      
        } else {
            echo 'error';
        }

        $connection = null;

      }else{
        echo 'error';
      }  

  }else{
      echo 'error';
  }

?>