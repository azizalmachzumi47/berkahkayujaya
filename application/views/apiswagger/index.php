<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Swagger API Documentation</title>
    <link rel="stylesheet" href="<?= base_url('assets/swagger/dist/swagger-ui.css') ?>">
</head>

<body>
    <div id="swagger-ui"></div>

    <script src="<?= base_url('assets/swagger/dist/swagger-ui-bundle.js') ?>"></script>
    <script src="<?= base_url('assets/swagger/dist/swagger-ui-standalone-preset.js') ?>"></script>
    <script>
    window.onload = () => {
        const ui = SwaggerUIBundle({
            url: "<?= base_url('assets/public/swagger.json') ?>",
            dom_id: '#swagger-ui',
            presets: [SwaggerUIBundle.presets.apis, SwaggerUIStandalonePreset],
            layout: "BaseLayout",
            deepLinking: true
        });
        window.ui = ui;
    };
    </script>
</body>

</html>