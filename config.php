<?php

// Bot tokenini bu yerga yozing
define('API_KEY', '8558543473:AAG27aod0bF77u6Viuqa7P0kenmtCUMr4NE');

// Islom API bazasi
define('ISLOM_API', 'https://islomapi.uz/api/present/day?region=');

// Duolar bazasi
$duolar = [
    "🌅 tonggi duolar" => [
        'title' => "🌅 Tonggi duolar",
        'content' => "أَصْبَحْنَا وَأَصْبَحَ الْمُلْكُ لِلَّهِ وَالْحَمْدُ لِلَّهِ لَا إِلَهَ إِلَّا اللهُ وَحْدَهُ لَا شَرِيكَ لَهُ\n\n*Ma'nosi:* Biz va mulk Allohnikigina bo'lib tong ottirdik. Hamd Allohgadir. Allohdan o'zga iloh yo'q. U yolg'izdir, sherigi yo'q."
    ],
    "🌙 kechki duolar" => [
        'title' => "🌙 Kechki duolar",
        'content' => "أَمْسَيْنَا وَأَمْسَى الْمُلْكُ لِلَّهِ وَالْحَمْدُ لِلَّهِ...\n\n*Ma'nosi:* Biz va mulk Allohnikigina bo'lib kech kiritdik. Hamd Allohgadir..."
    ],
    "🍲 ovqatlanish duolari" => [
        'title' => "🍲 Ovqatlanish duolari",
        'content' => "*Ovqatdan oldin:* بِسْمِ اللَّهِ (Bismillah)\n\n*Ovqatdan so'ng:* الْحَمْدُ لِلَّهِ الَّذِي أَطْعَمَنَا وَسَقَانَا وَجَعَلَنَا مُسْلِمِينَ\n\n*Ma'nosi:* Bizni yedirgan, ichirgan va musulmonlardan qilgan Allohga hamd bo'lsin."
    ]
];

// Viloyatlar ro'yxati
$regions = [
    "Toshkent", "Andijon", "Buxoro", "Guliston", "Jizzax", "Zarafshon", 
    "Karmana", "Namangan", "Navoiy", "Nukus", "Samarqand", "Termiz", "Urganch", "Farg'ona", "Xiva", "Qarshi", "Qo'qon"
];
