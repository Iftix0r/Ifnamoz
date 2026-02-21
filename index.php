<?php

include 'functions.php';

$update = json_decode(file_get_contents('php://input'));

if (isset($update->message)) {
    $message = $update->message;
    $chat_id = $message->chat->id;
    $text = $message->text;
    $from_id = $message->from->id;
    $name = $message->from->first_name;

    // Foydalanuvchi ma'lumotlarini yuklash
    $user_file = "users/$from_id.json";
    $user_data = file_exists($user_file) ? json_decode(file_get_contents($user_file), true) : ['region' => 'Toshkent'];

    $main_menu = buildKeyboard([
        [['text' => "🕒 Namoz Vaqtlari"], ['text' => "📅 Ramazon Taqvimi"]],
        [['text' => "🤲 Duolar"], ['text' => "📍 Mintaqa Tanlash"]],
        [['text' => "⚙️ Sozlamalar"]]
    ]);

    if ($text == "/start") {
        bot('sendMessage', [
            'chat_id' => $chat_id,
            'text' => "Assalomu alaykum, *$name*! \n\n*If Namoz* botiga xush kelibsiz. Bu bot orqali siz namoz vaqtlari, duolar va ramazon taqvimi haqida ma'lumot olishingiz mumkin.",
            'parse_mode' => 'markdown',
            'reply_markup' => $main_menu
        ]);
    }

    elseif ($text == "🕒 Namoz Vaqtlari") {
        $region = $user_data['region'];
        $data = getPrayerTimes($region);
        
        if ($data) {
            $times = $data['times'];
            $msg = "📍 *Mintaqa:* $region\n";
            $msg .= "📅 *Sana:* " . $data['date'] . " (" . $data['weekday'] . ")\n\n";
            $msg .= "🏙 *Bomdod:* " . $times['tong_saharlik'] . "\n";
            $msg .= "🌅 *Quyosh:* " . $times['quyosh'] . "\n";
            $msg .= "🏙 *Peshin:* " . $times['peshin'] . "\n";
            $msg .= "🌇 *Asr:* " . $times['asr'] . "\n";
            $msg .= "🌆 *Shom:* " . $times['shom_iftor'] . "\n";
            $msg .= "🌃 *Xufton:* " . $times['hufton'] . "\n\n";
            $msg .= "☝️ *Alloh namozlaringizni qabul qilsin!*";
            
            bot('sendMessage', [
                'chat_id' => $chat_id,
                'text' => $msg,
                'parse_mode' => 'markdown',
                'reply_markup' => $main_menu
            ]);
        } else {
            bot('sendMessage', [
                'chat_id' => $chat_id,
                'text' => "Ma'lumot olishda xato yuz berdi. Iltimos keyinroq urinib ko'ring.",
                'reply_markup' => $main_menu
            ]);
        }
    }

    elseif ($text == "📍 Mintaqa Tanlash") {
        $buttons = [];
        $row = [];
        foreach ($regions as $key => $r) {
            $row[] = ['text' => "📍 $r"];
            if (count($row) == 2) {
                $buttons[] = $row;
                $row = [];
            }
        }
        if (!empty($row)) $buttons[] = $row;
        $buttons[] = [['text' => "⬅️ Orqaga"]];

        bot('sendMessage', [
            'chat_id' => $chat_id,
            'text' => "Iltimos, hududingizni tanlang:",
            'reply_markup' => buildKeyboard($buttons)
        ]);
    }

    elseif (strpos($text, "📍 ") === 0) {
        $new_region = str_replace("📍 ", "", $text);
        if (in_array($new_region, $regions)) {
            $user_data['region'] = $new_region;
            file_put_contents($user_file, json_encode($user_data));
            bot('sendMessage', [
                'chat_id' => $chat_id,
                'text' => "Mintaqa muvaffaqiyatli o'zgartirildi: *$new_region*",
                'parse_mode' => 'markdown',
                'reply_markup' => $main_menu
            ]);
        }
    }

    elseif ($text == "🤲 Duolar") {
        $duo_buttons = [
            [['text' => "🌅 Tonggi duolar"], ['text' => "🌙 Kechki duolar"]],
            [['text' => "🍲 Ovqatlanish duolari"], ['text' => "⬅️ Orqaga"]]
        ];
        bot('sendMessage', [
            'chat_id' => $chat_id,
            'text' => "Kerakli bo'limni tanlang:",
            'reply_markup' => buildKeyboard($duo_buttons)
        ]);
    }

    elseif ($text == "📅 Ramazon Taqvimi") {
        $region = $user_data['region'];
        $data = getPrayerTimes($region);
        
        if ($data) {
            $msg = "🌙 *Ramazon Taqvimi (Bugun)*\n📍 Hudud: $region\n\n";
            $msg .= "⏳ *Saharlik:* " . $data['times']['tong_saharlik'] . "\n";
            $msg .= "⌛️ *Iftorlik:* " . $data['times']['shom_iftor'] . "\n\n";
            $msg .= "*Saharlik duosi:*\n_Navaytu an asuma sovma shahri ramazona minal fajri ilal mag'ribi, xolisan lillahi ta'ala. Allohu akbar._\n\n";
            $msg .= "*Iftorlik duosi:*\n_Allohumma laka sumtu va bika amantu va 'alayka tavakkaltu va 'ala rizqika aftartu, fag'firli ya g'offaru ma qoddamtu va ma axxortu._";

            bot('sendMessage', [
                'chat_id' => $chat_id,
                'text' => $msg,
                'parse_mode' => 'markdown',
                'reply_markup' => $main_menu
            ]);
        }
    }

    elseif ($text == "⬅️ Orqaga") {
        bot('sendMessage', [
            'chat_id' => $chat_id,
            'text' => "Bosh menyu",
            'reply_markup' => $main_menu
        ]);
    }

    // Duo bo'limlari uchun handling
    elseif (isset($duolar[mb_strtolower($text)])) {
        $duo = $duolar[mb_strtolower($text)];
        bot('sendMessage', [
            'chat_id' => $chat_id,
            'text' => "*" . $duo['title'] . "*\n\n" . $duo['content'],
            'parse_mode' => 'markdown',
            'reply_markup' => buildKeyboard([
                [['text' => "🌅 Tonggi duolar"], ['text' => "🌙 Kechki duolar"]],
                [['text' => "🍲 Ovqatlanish duolari"], ['text' => "⬅️ Orqaga"]]
            ])
        ]);
    }
    
    // Default holat
    else {
        // Agar tanlangan bo'lim bo'lsa...
    }
}
