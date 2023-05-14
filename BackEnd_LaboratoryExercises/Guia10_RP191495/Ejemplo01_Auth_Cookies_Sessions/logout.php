<?php
    session_start();

    // Clear all session variables.
    $_SESSION = array();

    /**
     *
     *  If you want to preserve some session variables and only clean up specific ones,
     *  you can unset them individually by accessing them as array elements, like this:
     *
     *  unset($_SESSION['var1']);
     *  unset($_SESSION['var2']);
     *
     * Note that cleaning session variables in the `$_SESSION` superglobal array only removes
     * them from server-side session storage. If the client has a copy of the session ID in a
     * cookie or as part of the URL, they can still access the old values until the session
     * expires or is destroyed.
     *
     */

    // destroy the session.
    session_destroy();

    // Regenerate the session ID.
    @session_regenerate_id(true);
    unset($_SERVER['PHP_AUTH_USER'], $_SERVER['PHP_AUTH_PW']);
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <title>Fin de la sesión</title>
</head>

<body>
    <header>
        <h1>Has salido del sistema</h1>
    </header>
    <section>
        <article>
            <p>
                Para reingresar haz clic en <a href="autenticacionbasica.php">
                    este enlace </a>
            </p>
        </article>
    </section>
</body>
</html>
