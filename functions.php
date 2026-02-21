<?php

include 'config.php';

function bot($method, $datas = []) {
    $url = "https://api.telegram.org/bot" . API_KEY . "/" . $method;
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $datas);
    $res = curl_exec($ch);
    if (curl_error($ch)) {
        var_dump(curl_error($ch));
    } else {
        return json_decode($res);
    }
}

function getPrayerTimes($region) {
    $url = ISLOM_API . urlencode($region);
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $res = curl_exec($ch);
    return json_decode($res, true);
}

function buildKeyboard($buttons, $resize = true, $one_time = false) {
    return json_encode([
        'keyboard' => $buttons,
        'resize_keyboard' => $resize,
        'one_time_keyboard' => $one_time
    ]);
}

function buildInlineKeyboard($buttons) {
    return json_encode([
        'inline_keyboard' => $buttons
    ]);
}
