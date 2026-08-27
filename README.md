# MİS360 - Modern Özel WordPress Teması (Custom Theme)

> **Geliştirici & Telif Sahibi:** Serkan AKKAYA ([misteknoloji360.com.tr](https://misteknoloji360.com.tr/))  
> **Sürüm:** 1.0.0  
> **Gereksinimler:** WordPress 6.3+ | PHP 8.2+  
> **Lisans:** GNU GPL v2 / Ticari PRO Lisans Motoru

---

## 🌟 Öne Çıkan Özellikler

- **Ultra Hızlı Core Web Vitals Skoru**: Render-blocking scriptler engellendi, WP 6.3+ native `strategy => defer` kullanıldı.
- **Sıfır Dış Bağımlılık (No jQuery)**: Pure Vanilla JS (ES6+) ile hafif, güvenli ve modern.
- **Dark / Light Mode**: CSS Custom Properties ve `prefers-color-scheme` senkronize, `localStorage` kalıcı tema geçişi.
- **Akıcı Tipografi**: CSS `clamp()` fonksiyonları ile 320px mobil ekrandan 4K ekranlara kusursuz ölçeklenen yazılar ve boşluklar.
- **Gutenberg & WooCommerce Hazır**: Tam genişlik blok stilleri (`align-wide`), blok editör stil eşlemesi ve WooCommerce galeri araçları hazır.
- **Şifrelenmiş Lisans Doğrulama**: Serkan AKKAYA HMAC-SHA256 çevrimdışı ve GitHub bulut tabanlı lisans koruma motoru.
- **GitHub Otomatik Güncelleme**: GitHub Releases veya RAW deposu üzerinden tek tıkla otomatik tema güncelleme.

---

## 🛡️ Lisanslama ve Aktivasyon

Tema, **Görünüm > MİS360 Lisans** menüsü altından yönetilir.

### Desteklenen Doğrulama Yöntemleri:
1. **Geliştirici / Master Anahtarları**:
   - `MISMASTER360SERKANAKKAYA`
   - `MISTEKNOLOJI360PRO`
   - `SERKANAKKAYALICENSE2026`
   - Veya `MIS-DEV-` ile başlayan anahtarlar.
2. **Çevrimdışı Kriptografik Algoritmik Doğrulama (HMAC-SHA256)**:
   - Format: `MIS-PRO-XXXX-YYYY`
   - Örnek geçerli anahtar: `MIS-PRO-B593-945E` veya `MIS-PRO-A1B2-3024`
3. **GitHub Bulut Doğrulaması**:
   - Depo içerisindeki [`licenses.json`](licenses.json) dosyasından anlık kontrol.

---

## 🔄 GitHub Otomatik Güncelleme Sistemi

Tema, WordPress çekirdeğinin `update_themes` mekanizmasına entegredir. Yeni bir sürüm yayınlamak için:
1. `style.css` ve `theme-update.json` dosyasındaki `version` numarasını artırın (Örn: `1.0.1`).
2. Temanın zip halini GitHub deponuza yükleyin (`mis360.zip`).
3. Temanın kurulu olduğu tüm siteler WordPress panosunda otomatik güncelleme uyarısı alacak ve tek tıkla güncelleme yapabilecektir.

---

## 📦 Kurulum

1. Depoyu zip olarak indirin veya klonlayın.
2. `wp-content/themes/mis360` dizinine yükleyin.
3. WordPress Yönetim Paneli > **Görünüm > Temalar** menüsünden **MİS360** temasını etkinleştirin.
4. **Görünüm > MİS360 Lisans** sayfasına giderek lisans anahtarınızı etkinleştirin.

---
© 2026 **Serkan AKKAYA** — Tüm Hakları Saklıdır.
