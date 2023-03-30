<?php
    session_start();
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    /**
     * Dominio
     */
    define('S_NAME', url_actual());
    /**
     * ReCaptcha
     */
    define("RECAPTCHA_V3_SITE_KEY", "6LfSuTslAAAAAJ8D2t2NvOLhFtt7dCnqnl9L6K_V");
    define("RECAPTCHA_V3_SECRET_KEY", "6LfSuTslAAAAAHMlh8mA3Niw_Q243JF315Xc-OTw");
    /**
     * Funcion que permite visualizar un arreglo u objeto en forma vertical pantalla blanca
     */
    function prx()
    {
        foreach( func_get_args() as $arg )
             pr($arg);
        exit;
    }
    /**
     * Funcion que permite visualizar un arreglo u objeto en forma vertical
     */
    function pr($arg)
    {
        echo('<pre>');print_r($arg);echo('</pre>');
    }
    /**
     * Funcion que permite obtener el dominio que se está utilizando
     */
    function url_actual()
    {
      if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') {
        $url = "https://"; 
      }else{
        $url = "http://"; 
      }
      return $url . $_SERVER['HTTP_HOST'];
    } 
    /**
     * Funcion que permite mostrar una fecha en un formato determinado (dmy - mdy - ymd - md)
     * @param  [type]  &$fecha [fecha determinada]
     * @param  [type]  $tipo   [tipo de formato]
     * @param  boolean $hora   [true, para mostrar la hora]
     * @return [type]          [fecha formateada]
     */
    function formatoFecha( &$fecha, $tipo = null, $hora = false )
    {
        if(! empty($fecha)) {

            if($tipo == 'dmy') {

                return date(sprintf("d/m/Y %s",($hora ? 'H:i:s' : '')), strtotime($fecha));

            }else if($tipo == 'mdy') {

                return date(sprintf("m/d/Y %s",($hora ? 'H:i:s' : '')), strtotime($fecha));

            }else if($tipo == 'Ymd') {

                return date("Y-m-d");

            }else if($tipo == 'md') {

                return date(sprintf("m/d %s",($hora ? 'H:i:s' : '')), strtotime($fecha));

            }

            return date(sprintf("d/m/Y %s",($hora ? 'H:i:s' : '')), strtotime($fecha));

        }else {

            return '--';

        }
    }

    function verifyReCaptchaV3($g_recaptcha_response)
    {
        $site_verify_url = "https://www.google.com/recaptcha/api/siteverify";

        $data = [
            'secret' => RECAPTCHA_V3_SECRET_KEY,
            'response' => $g_recaptcha_response
        ];
        $options = array(
            'http' => array(
                'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
                'method'  => 'POST',
                'content' => http_build_query($data)
            )
        );
        $context  = stream_context_create($options);

        $response = file_get_contents($site_verify_url, false, $context);
        $res = json_decode($response, true);

        return $res;
    }


?>