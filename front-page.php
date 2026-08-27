<?php
/**
 * Beyzade Et & Balık Restaurant - Front Page Template
 * 1:1 Denfora Architecture with Authentic Beyzade Restaurant Data
 *
 * @package MİS360
 * @author  Serkan AKKAYA <https://misteknoloji360.com.tr/>
 * @since   1.0.0
 */

declare(strict_types=1);

if (!defined('ABSPATH')) {
    exit;
}

get_header();

$phone       = '(0354) 502 33 33';
$clean_phone = '+903545023333';
$whatsapp    = '905465033132';
?>

<!-- 1. Hero Section (Denfora 1:1 Architecture with Beyzade Authentic Data) -->
<section class="hero" style="background: radial-gradient(circle at 80% 20%, rgba(239, 80, 39, 0.25) 0%, rgba(26, 26, 26, 0.96) 65%);">
    <div class="hero-bg">
        <div style="width: 100%; height: 100%; opacity: 0.15; background-image: radial-gradient(#ef5027 1px, transparent 1px); background-size: 24px 24px;"></div>
    </div>
    <div class="hero-overlay"></div>
    <div class="container">
        <div class="hero-content">
            <div style="display: inline-flex; align-items: center; gap: 10px; font-size: 13px; font-weight: 800; text-transform: uppercase; letter-spacing: 0.15em; color: var(--color-primary); margin-bottom: 16px; background: rgba(239, 80, 39, 0.12); padding: 6px 16px; border-radius: 9999px; border: 1px solid rgba(239, 80, 39, 0.25);">
                <span>⭐ 4.3 (448 Google Yorumu)</span>
                <span style="color: rgba(255,255,255,0.4);">•</span>
                <span>Sarıkaya / Yozgat</span>
            </div>
            <h1 class="hero-title">
                Beyzade Et & Balık Restaurant<br>
                <span class="hero-highlight">2015'ten Beri Değişmeyen Lezzet</span>
            </h1>
            <p class="hero-description">
                Yozgat Sarıkaya'da kömür ateşinde enfes kebaplar, taze günlük balıklar, sac tava lezzetleri ve zengin meze tepsisiyle ailelerin ve lezzet tutkunlarının vazgeçilmez adresi.
            </p>
            <div class="hero-actions">
                <a href="#menu" class="btn btn-primary btn-lg">
                    Menüyü İnceleyin (₺200–₺800) →
                </a>
                <a href="https://wa.me/<?php echo esc_attr($whatsapp); ?>?text=<?php echo rawurlencode('Merhaba Beyzade Restaurant, masa ayırtmak istiyorum:'); ?>" class="btn btn-outline-light btn-lg" target="_blank" rel="noopener noreferrer">
                    Masa Rezervasyonu Yap
                </a>
            </div>
        </div>
    </div>
</section>

<!-- 2. Infinite Marquee Slider (Denfora Exact Architecture) -->
<section class="section-partners">
    <div class="partners-container">
        <span class="partners-label">BEYZADE HİZMET & LEZZET AYRICALIKLARI</span>
        <div class="partners-slider">
            <div class="partners-track">
                <div class="partner-logo">10+ YILLIK TECRÜBE</div>
                <div class="partner-logo">4.3 ★ (448 GOOGLE YORUMU)</div>
                <div class="partner-logo">KÖMÜRDE IZGARA ET & KEBAP</div>
                <div class="partner-logo">GÜNLÜK TAZE BALIK REYONU</div>
                <div class="partner-logo">AÇIK HAVA BAHÇE BÖLÜMÜ</div>
                <div class="partner-logo">MAMA SANDALYESİ & AİLE SALONU</div>
                <div class="partner-logo">ÖZEL SAC TAVA LEZZETİ</div>
                <div class="partner-logo">GENİŞ OTOPARK ALANI</div>
                <!-- Kesintisiz sonsuz döngü için tekrar -->
                <div class="partner-logo">10+ YILLIK TECRÜBE</div>
                <div class="partner-logo">4.3 ★ (448 GOOGLE YORUMU)</div>
                <div class="partner-logo">KÖMÜRDE IZGARA ET & KEBAP</div>
                <div class="partner-logo">GÜNLÜK TAZE BALIK REYONU</div>
                <div class="partner-logo">AÇIK HAVA BAHÇE BÖLÜMÜ</div>
                <div class="partner-logo">MAMA SANDALYESİ & AİLE SALONU</div>
                <div class="partner-logo">ÖZEL SAC TAVA LEZZETİ</div>
                <div class="partner-logo">GENİŞ OTOPARK ALANI</div>
            </div>
        </div>
    </div>
</section>

<!-- 3. Culinary Categories (Denfora 1:1 Category Cards Grid) -->
<section class="section section-gray" id="categories">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title">Lezzet Kategorilerimiz</h2>
            <p class="section-subtitle">Taze malzemeler, hijyenik üretim anlayışı ve usta ellerden çıkan zengin menümüz.</p>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            
            <!-- Kategori 1: Et & Kebap -->
            <a href="#menu" class="category-card">
                <div class="category-card-image" style="background: linear-gradient(135deg, #2b1108, #180802); display: flex; flex-direction: column; align-items: center; justify-content: center;">
                    <span style="font-size: 3.5rem; margin-bottom: 8px;">🥩</span>
                    <span style="color: #fda4af; font-size: 11px; font-weight: 700; text-transform: uppercase; letter-spacing: 0.1em;">Közde Izgara</span>
                </div>
                <div class="category-card-overlay"></div>
                <div class="category-card-content">
                    <h3 class="category-card-title">Kömürde Et & Kebaplar</h3>
                    <span class="category-card-count">Adana, Kuzu Şiş, Pirzola</span>
                </div>
            </a>

            <!-- Kategori 2: Taze Balık -->
            <a href="#menu" class="category-card">
                <div class="category-card-image" style="background: linear-gradient(135deg, #082f49, #021a29); display: flex; flex-direction: column; align-items: center; justify-content: center;">
                    <span style="font-size: 3.5rem; margin-bottom: 8px;">🐟</span>
                    <span style="color: #7dd3fc; font-size: 11px; font-weight: 700; text-transform: uppercase; letter-spacing: 0.1em;">Günlük Taze</span>
                </div>
                <div class="category-card-overlay"></div>
                <div class="category-card-content">
                    <h3 class="category-card-title">Deniz & Tatlı Su Balıkları</h3>
                    <span class="category-card-count">Çipura, Levrek, Alabalık</span>
                </div>
            </a>

            <!-- Kategori 3: Sac Tava & Güveç -->
            <a href="#menu" class="category-card">
                <div class="category-card-image" style="background: linear-gradient(135deg, #382405, #1d1201); display: flex; flex-direction: column; align-items: center; justify-content: center;">
                    <span style="font-size: 3.5rem; margin-bottom: 8px;">🍳</span>
                    <span style="color: #fde047; font-size: 11px; font-weight: 700; text-transform: uppercase; letter-spacing: 0.1em;">Beyzade Spesiyalleri</span>
                </div>
                <div class="category-card-overlay"></div>
                <div class="category-card-content">
                    <h3 class="category-card-title">Sac Tava & Güveçler</h3>
                    <span class="category-card-count">Tereyağlı Özel Tarifler</span>
                </div>
            </a>

            <!-- Kategori 4: Mezeler & Tatlılar -->
            <a href="#menu" class="category-card">
                <div class="category-card-image" style="background: linear-gradient(135deg, #3b0764, #1e0234); display: flex; flex-direction: column; align-items: center; justify-content: center;">
                    <span style="font-size: 3.5rem; margin-bottom: 8px;">🥗</span>
                    <span style="color: #d8b4fe; font-size: 11px; font-weight: 700; text-transform: uppercase; letter-spacing: 0.1em;">Taze Günlük Meze</span>
                </div>
                <div class="category-card-overlay"></div>
                <div class="category-card-content">
                    <h3 class="category-card-title">Mezeler, Salatalar & Tatlı</h3>
                    <span class="category-card-count">Künefe, Fırın Sütlaç, Ezme</span>
                </div>
            </a>

        </div>

        <div class="text-center mt-8">
            <a href="#menu" class="btn btn-outline-dark">
                Tüm Menüyü İncele
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <line x1="5" y1="12" x2="19" y2="12"></line>
                    <polyline points="12 5 19 12 12 19"></polyline>
                </svg>
            </a>
        </div>
    </div>
</section>

<!-- 4. "Neden Beyzade?" Features (Denfora 1:1 Architecture) -->
<section class="section" id="about">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title">Neden Beyzade Restaurant?</h2>
            <p class="section-subtitle">2015 yılından bu yana Sarıkaya'da lezzet, konfor ve aile atmosferini bir arada sunuyoruz.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            
            <div class="feature-card">
                <div class="feature-card-icon">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"></path>
                    </svg>
                </div>
                <h3 class="feature-card-title">10+ Yıllık Deneyim</h3>
                <p class="feature-card-description">2015'ten beri Yozgat Sarıkaya'da değişmeyen lezzet ve müşteri memnuniyeti anlayışı.</p>
            </div>

            <div class="feature-card">
                <div class="feature-card-icon">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                        <circle cx="9" cy="7" r="4"></circle>
                        <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                        <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                    </svg>
                </div>
                <h3 class="feature-card-title">Aile Sıcaklığı</h3>
                <p class="feature-card-description">Açık hava bahçe bölümü, çocuklar için mama sandalyesi ve huzurlu aile ortamı.</p>
            </div>

            <div class="feature-card">
                <div class="feature-card-icon">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path>
                        <polyline points="9 12 11 14 15 10"></polyline>
                    </svg>
                </div>
                <h3 class="feature-card-title">Taze & Hijyenik</h3>
                <p class="feature-card-description">Özenle seçilmiş yerli besi etler ve günlük taze balıklar açık mutfak hijyeniyle hazırlanır.</p>
            </div>

            <div class="feature-card">
                <div class="feature-card-icon">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <circle cx="12" cy="12" r="10"></circle>
                        <polyline points="12 6 12 12 16 14"></polyline>
                    </svg>
                </div>
                <h3 class="feature-card-title">Gece 23:45'e Kadar Açık</h3>
                <p class="feature-card-description">Haftanın 7 günü 10:00 – 23:45 saatleri arasında kesintisiz restoran ve paket servis hizmeti.</p>
            </div>

        </div>
    </div>
</section>

<!-- 5. Öne Çıkan Menü Seçenekleri (Denfora 1:1 Product Cards Grid) -->
<section class="section section-gray" id="menu">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title">Beyzade'nin Öne Çıkan Lezzetleri</h2>
            <p class="section-subtitle">Menümüzden en çok tercih edilen taze et, balık ve tava spesiyallerimiz (Fiyat aralığı: ₺200–₺800).</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            
            <!-- Ürün 1: Karışık Izgara -->
            <article class="product-card">
                <div class="product-card-image" style="background: #fafafa;">
                    <span style="font-size: 3.8rem;">🍖</span>
                </div>
                <div class="product-card-content">
                    <span class="product-card-category">KÖZDE IZGARA ET</span>
                    <h3 class="product-card-title">Beyzade Özel Karışık Izgara</h3>
                    <p style="font-size: 13px; color: var(--color-gray-500); line-height: 1.5; margin-bottom: 12px;">
                        Kuzu pirzola, Adana kebap, tavuk şiş, köfte, köz biber-domates ve tereyağlı lavaş ile.
                    </p>
                    <div style="display: flex; align-items: center; justify-content: space-between; border-top: 1px solid var(--color-gray-100); padding-top: 10px; margin-top: auto;">
                        <span style="font-size: 18px; font-weight: 800; color: var(--color-black);">₺750</span>
                        <a href="https://wa.me/<?php echo esc_attr($whatsapp); ?>?text=<?php echo rawurlencode('Merhaba Beyzade Restaurant, Karışık Izgara siparişi/rezervasyonu hakkında bilgi almak istiyorum.'); ?>" target="_blank" class="btn btn-primary btn-sm" style="font-size: 12px; padding: 4px 10px;">
                            Sipariş & Masa
                        </a>
                    </div>
                </div>
            </article>

            <!-- Ürün 2: Çipura / Levrek -->
            <article class="product-card">
                <div class="product-card-image" style="background: #fafafa;">
                    <span style="font-size: 3.8rem;">🐟</span>
                </div>
                <div class="product-card-content">
                    <span class="product-card-category">GÜNLÜK TAZE BALIK</span>
                    <h3 class="product-card-title">Kömürde Taze Çipura / Levrek</h3>
                    <p style="font-size: 13px; color: var(--color-gray-500); line-height: 1.5; margin-bottom: 12px;">
                        Köz ateşinde pişirilmiş taze deniz balığı, yanında roka, kırmızı soğan ve limon garnitürü ile.
                    </p>
                    <div style="display: flex; align-items: center; justify-content: space-between; border-top: 1px solid var(--color-gray-100); padding-top: 10px; margin-top: auto;">
                        <span style="font-size: 18px; font-weight: 800; color: var(--color-black);">₺420</span>
                        <a href="https://wa.me/<?php echo esc_attr($whatsapp); ?>?text=<?php echo rawurlencode('Merhaba, Taze Çipura/Levrek siparişi vermek istiyorum.'); ?>" target="_blank" class="btn btn-primary btn-sm" style="font-size: 12px; padding: 4px 10px;">
                            Sipariş & Masa
                        </a>
                    </div>
                </div>
            </article>

            <!-- Ürün 3: Sac Tava -->
            <article class="product-card">
                <div class="product-card-image" style="background: #fafafa;">
                    <span style="font-size: 3.8rem;">🍳</span>
                </div>
                <div class="product-card-content">
                    <span class="product-card-category">BEYZADE İMZA LEZZETİ</span>
                    <h3 class="product-card-title">Beyzade Tereyağlı Sac Tava</h3>
                    <p style="font-size: 13px; color: var(--color-gray-500); line-height: 1.5; margin-bottom: 12px;">
                        Özel marineli dana ve kuzu kuşbaşı, taze köy tereyağı, domates, sarımsak ve biber harmanı.
                    </p>
                    <div style="display: flex; align-items: center; justify-content: space-between; border-top: 1px solid var(--color-gray-100); padding-top: 10px; margin-top: auto;">
                        <span style="font-size: 18px; font-weight: 800; color: var(--color-black);">₺480</span>
                        <a href="https://wa.me/<?php echo esc_attr($whatsapp); ?>?text=<?php echo rawurlencode('Merhaba, Sac Tava hakkında bilgi ve sipariş vermek istiyorum.'); ?>" target="_blank" class="btn btn-primary btn-sm" style="font-size: 12px; padding: 4px 10px;">
                            Sipariş & Masa
                        </a>
                    </div>
                </div>
            </article>

            <!-- Ürün 4: Taş Fırında Künefe -->
            <article class="product-card">
                <div class="product-card-image" style="background: #fafafa;">
                    <span style="font-size: 3.8rem;">🍯</span>
                </div>
                <div class="product-card-content">
                    <span class="product-card-category">TAŞ FIRIN TATLILARI</span>
                    <h3 class="product-card-title">Fıstıklı Taş Fırın Sıcak Künefe</h3>
                    <p style="font-size: 13px; color: var(--color-gray-500); line-height: 1.5; margin-bottom: 12px;">
                        Özel peyniriyle çıtır çıtır pişirilen sıcak künefe, bol Antep fıstığı tozu ve kaymak ile.
                    </p>
                    <div style="display: flex; align-items: center; justify-content: space-between; border-top: 1px solid var(--color-gray-100); padding-top: 10px; margin-top: auto;">
                        <span style="font-size: 18px; font-weight: 800; color: var(--color-black);">₺180</span>
                        <a href="https://wa.me/<?php echo esc_attr($whatsapp); ?>?text=<?php echo rawurlencode('Merhaba, Künefe siparişi vermek istiyorum.'); ?>" target="_blank" class="btn btn-primary btn-sm" style="font-size: 12px; padding: 4px 10px;">
                            Sipariş & Masa
                        </a>
                    </div>
                </div>
            </article>

        </div>

        <div class="text-center mt-8">
            <a href="https://wa.me/<?php echo esc_attr($whatsapp); ?>?text=<?php echo rawurlencode('Merhaba Beyzade Restaurant, güncel yemek menünüzü ve fiyat listenizi iletebilir misiniz?'); ?>" target="_blank" class="btn btn-primary">
                Tam Menüyü WhatsApp'tan İste →
            </a>
        </div>
    </div>
</section>

<!-- 6. Online Table Reservation Form (Doğrudan WhatsApp'a Bilgi İletir) -->
<section class="section" id="reservation" style="background: #ffffff;">
    <div class="container">
        <div style="max-width: 860px; margin: 0 auto; background: var(--color-gray-50); border: 1px solid var(--color-gray-200); border-radius: 20px; padding: 40px 30px; box-shadow: var(--shadow-md);">
            <div class="text-center" style="margin-bottom: 30px;">
                <span style="font-size: 12px; font-weight: 800; text-transform: uppercase; letter-spacing: 0.15em; color: var(--color-primary);">
                    BEYZADE ET & BALIK
                </span>
                <h2 style="font-size: 28px; font-weight: 800; margin: 6px 0 8px; color: var(--color-black);">
                    Masanızı Hemen Ayırtın
                </h2>
                <p style="color: var(--color-gray-500); font-size: 14px;">
                    Aile toplantıları, iş yemekleri veya özel davetleriniz için aşağıdaki formu doldurarak doğrudan WhatsApp üzerinden rezervasyonunuzu anında tamamlayabilirsiniz.
                </p>
            </div>

            <form onsubmit="event.preventDefault(); const name=document.getElementById('bzName').value; const date=document.getElementById('bzDate').value; const time=document.getElementById('bzTime').value; const guests=document.getElementById('bzGuests').value; const area=document.getElementById('bzArea').value; window.open('https://wa.me/<?php echo esc_attr($whatsapp); ?>?text=' + encodeURIComponent('Beyzade Restaurant Rezervasyon Talebi:\nAd Soyad: ' + name + '\nTarih: ' + date + '\nSaat: ' + time + '\nKişi Sayısı: ' + guests + '\nBölüm Tercihi: ' + area), '_blank');">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4" style="margin-bottom: 20px;">
                    <div>
                        <label style="display: block; font-size: 13px; font-weight: 700; margin-bottom: 6px; color: #1e293b;">Adınız Soyadınız *</label>
                        <input type="text" id="bzName" placeholder="Örn: Mehmet Demir" required style="width: 100%; padding: 12px 16px; border: 1px solid var(--color-gray-300); border-radius: 8px; font-size: 14px; background: #ffffff;">
                    </div>
                    <div>
                        <label style="display: block; font-size: 13px; font-weight: 700; margin-bottom: 6px; color: #1e293b;">Bölüm Tercihi *</label>
                        <select id="bzArea" style="width: 100%; padding: 12px 16px; border: 1px solid var(--color-gray-300); border-radius: 8px; font-size: 14px; background: #ffffff;">
                            <option value="Açık Hava Bahçe Bölümü">Açık Hava Bahçe Bölümü</option>
                            <option value="İç Aile Salonu (Klimalı)">İç Aile Salonu (Klimalı)</option>
                            <option value="Grup & Özel Davet Masası">Grup & Özel Davet Masası</option>
                        </select>
                    </div>
                    <div>
                        <label style="display: block; font-size: 13px; font-weight: 700; margin-bottom: 6px; color: #1e293b;">Kişi Sayısı *</label>
                        <select id="bzGuests" style="width: 100%; padding: 12px 16px; border: 1px solid var(--color-gray-300); border-radius: 8px; font-size: 14px; background: #ffffff;">
                            <option value="2 Kişi">2 Kişilik Masa</option>
                            <option value="4 Kişi (Mama Sandalyesi Talepli)">4 Kişi (Aile Masası + Mama Sandalyesi)</option>
                            <option value="6-8 Kişi">6-8 Kişilik Masa</option>
                            <option value="10+ Kişi Özel Toplantı">10+ Kişi Özel Davet</option>
                        </select>
                    </div>
                    <div>
                        <label style="display: block; font-size: 13px; font-weight: 700; margin-bottom: 6px; color: #1e293b;">Tarih & Saat *</label>
                        <div style="display: flex; gap: 8px;">
                            <input type="date" id="bzDate" required style="width: 60%; padding: 12px 10px; border: 1px solid var(--color-gray-300); border-radius: 8px; font-size: 13px; background: #ffffff;">
                            <select id="bzTime" style="width: 40%; padding: 12px 8px; border: 1px solid var(--color-gray-300); border-radius: 8px; font-size: 13px; background: #ffffff;">
                                <option value="12:30">12:30</option>
                                <option value="14:00">14:00</option>
                                <option value="18:00">18:00</option>
                                <option value="19:30" selected>19:30</option>
                                <option value="21:00">21:00</option>
                                <option value="22:30">22:30</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-primary btn-lg" style="width: 100%; max-width: 460px; height: 50px; font-size: 15px;">
                        🟢 Rezervasyonu WhatsApp İle Onayla (0546 503 31 32) →
                    </button>
                </div>
            </form>
        </div>
    </div>
</section>

<!-- 7. Dark CTA Section (Denfora Exact Architecture) -->
<section class="section section-dark" id="contact">
    <div class="container">
        <div class="text-center" style="max-width: 720px; margin: 0 auto;">
            <h2 class="section-title" style="color: var(--color-white);">
                Sizleri Sarıkaya'da Ağırlamaktan Mutluluk Duyuyoruz
            </h2>
            <p class="section-subtitle" style="color: var(--color-gray-400);">
                Bahçelievler Mah. 66650 Sarıkaya / Yozgat adresimizde, gece 23:45'e kadar sıcak et ve balık sofralarımızla hizmetinizdeyiz.
            </p>
            <div class="flex flex-wrap gap-4 justify-center mt-8">
                <a href="tel:<?php echo esc_attr($clean_phone); ?>" class="btn btn-primary btn-lg">
                    📞 (0354) 502 33 33
                </a>
                <a href="https://maps.app.goo.gl/q2icLBRX1FJNzVtY7" target="_blank" rel="noopener noreferrer" class="btn btn-outline-light btn-lg">
                    📍 Google Haritalar'da Yol Tarifi Al
                </a>
            </div>
        </div>
    </div>
</section>

<?php
get_footer();
