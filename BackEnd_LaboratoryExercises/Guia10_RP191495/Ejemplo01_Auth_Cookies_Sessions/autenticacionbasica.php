<?PHP
        //Para trabajar con sesiones.
            session_start();
            /**
             *  Si el usuario está usando IIS, se necesitan establecer
             *  las variables globales $PHP_AUTH_USER y $PHP_AUTH_PW
             */
            if (substr($_SERVER['SERVER_SOFTWARE'], 0, 9) == 'Microsoft' && !isset($_SERVER['PHP_AUTH_USER'])
                && !isset($_SERVER['PHP_AUTH_PW']) && substr($_SERVER['HTTP_AUTHORIZATION'], 0, 6)== 'Basic') {

                    list($_SERVER['PHP_AUTH_USER'], $_SERVER['PHP_AUTH_PW']) = explode(':', base64_decode(substr($_SERVER['HTTP_AUTHORIZATION'], 6)));
                    //list() function is a useful tool for working with arrays in PHP, particularly
                    //when you need to extract multiple values from an array and assign them to variables.
                }

                /**
                 * Si no se esta usando un archivo con usuario y contraseña en el servidor,
                 * utilizar estos datos de usuario y contraseña.
                 *
                 */

             if ($_SERVER['PHP_AUTH_USER'] != 'lis' || $_SERVER['PHP_AUTH_PW'] != 'ingenieria') {
                /**
                 *  Si el visitante no ha introducido sus datos o si los
                 *  datos proporcionados no son correctos redirigirlo a
                 *  la ventana de autenticaion basica de HTTP
                 *
                 */

                 header('WWW-Authenticate: Basic realm="Realm-Name"');
                 if (substr($_SERVER['SERVER_SOFTWARE'], 0, 9) == 'Microsoft') {
                    header('Status: 401 Unauthorized');
                 } else {
                    header('HTTP/1.0 401 Unauthorized');
                 }
                 $msgden = "<h2 style=\"font-family:Impact;font-size:15pt;color:Red;\">";
                 $msgden .= "No tienes acceso a este sitio</h2>";
                 echo $msgden;
             } else {
                // Si estamos acá es porque el usuario introdujo los datos correctos.
                $_SESSION['user'] = $_SERVER['PHP_AUTH_USER'];
                $_SESSION['pass'] = $_SERVER['PHP_AUTH_PW'];
                header("Location: material.php");
             }

    ?>