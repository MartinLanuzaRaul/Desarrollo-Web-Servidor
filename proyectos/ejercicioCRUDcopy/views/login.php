<html>

<head>
    <title>Formulario</title>
    <script src="https://www.google.com/recaptcha/api.js?hl=es" async defer></script>
</head>

<body>
    <form action="?method=redirigirCaptcha" method="post">
        <div class="g-recaptcha" data-sitekey="<?php echo $this->siteKey; ?>"></div>
        <script type="text/javascript"
            src="https://www.google.com/recaptcha/api.js?hl=es">
        </script>
        <br />
        <input type="submit" value="submit" />
    </form>
</body>

</html>