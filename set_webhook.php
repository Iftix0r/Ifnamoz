<?php

include 'config.php';

// Webhook manzilingizni bu yerga yozing (masalan: https://domain.uz/IfNamoz/index.php)
$url = "YOUR_WEBHOOK_URL_HERE";

$api_url = "https://api.telegram.org/bot" . API_KEY . "/setWebhook?url=" . $url;

$res = file_get_contents($api_url);

echo "Natija: " . $res;
