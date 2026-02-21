# If Namoz Bot 🌙

**If Namoz** bot — O'zbekiston hududlari bo'ylab aniq namoz vaqtlarini bilish, Ramazon taqvimidan foydalanish va kundalik duolarni o'qish imkonini beruvchi mukammal Telegram bot.

## ✨ Xususiyatlari

- 🕒 **Aniq Namoz Vaqtlari**: Islom.uz API (islomapi.uz) ma'lumotlari asosida real vaqtdagi 5 mahal namoz vaqtlari.
- 📅 **Ramazon Taqvimi**: Saharlik va Iftorlik vaqtlari, maxsus duolar va eslatmalar.
- 📍 **Viloyat va Shaharlar**: O'zbekistonning barcha asosiy hududlarini tanlash imkoniyati.
- 🤲 **Duolar To'plami**: Kundalik tonggi, kechki va boshqa vaziyatlardagi duolar (arabcha matni va o'zbekcha ma'nosi bilan).
- ⚙️ **Foydalanuvchi Sozlamalari**: Har bir foydalanuvchi uchun alohida sozlamalarni eslab qolish tizimi.

## 🛠 Texnologiyalar

- **Dasturlash tili:** PHP 7.4+
- **API:** Telegram Bot API
- **Ma'lumotlar manbasi:** [islomapi.uz](https://islomapi.uz)
- **Ma'lumotlarni saqlash:** JSON format (File system)

## 🚀 O'rnatish va Sozlash

1.  **Repozitoriyani yuklang:**
    ```bash
    git clone https://github.com/Iftix0r/Ifnamoz.git
    cd Ifnamoz
    ```

2.  **Konfiguratsiya:**
    `config.php` faylini oching va bot tokeningizni kiriting:
    ```php
    define('API_KEY', 'SIZNING_BOT_TOKENINGIZ');
    ```

3.  **Xostingga yuklash:**
    Loyha fayllarini PHP qo'llab-quvvatlaydigan HTTPS (SSL) sertifikatiga ega xostingga joylang.

4.  **Webhook o'rnatish:**
    `set_webhook.php` faylida xosting manzilini ko'rsating va brauzerda bir marta ishga tushiring:
    ```php
    $url = "https://yourdomain.uz/folder/index.php";
    ```

## 📂 Fayllar strukturasi

- `index.php` — Botning asosiy mantiqiy qismi.
- `functions.php` — API va yordamchi funksiyalar.
- `config.php` — Bot sozlamalari va ma'lumotlar.
- `set_webhook.php` — Webhook sozlash skripti.
- `.gitignore` — Keraksiz fayllarni chetlab o'tish uchun.
- `users/` — Foydalanuvchi ma'lumotlari saqlanadigan papka.

## 🤝 Hamkorlik

Agar loyhani yaxshilash bo'yicha takliflaringiz bo'lsa, *Pull Request* yuboring yoki *Issue* oching.

## 📄 Litsenziya

Ushbu loyha MIT litsenziyasi ostida tarqatiladi.
