<?php
/**
 * Beyzade Et & Balık Restaurant - Front Page Template
 * 1:1 Denfora Architecture with Authentic Beyzade Restaurant Data & Real Assets
 * Fiyat vurgusu kaldırılmış, ürün kalitesi ve zengin menü ön plana çıkarılmıştır.
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

<!-- 1. Hero Section (Denfora 1:1 Architecture with Authentic Beyzade Ambience) -->
<section class="hero" style="background: linear-gradient(rgba(17, 24, 39, 0.85), rgba(17, 24, 39, 0.92)), url('https://beyzadeetbalikrestaurant.com.tr/wp-content/uploads/2026/05/restaurant.jpg') center/cover no-repeat;">
    <div class="hero-overlay"></div>
    <div class="container">
        <div class="hero-content">
            <div style="display: inline-flex; align-items: center; gap: 10px; font-size: 13px; font-weight: 800; text-transform: uppercase; letter-spacing: 0.15em; color: var(--color-primary); margin-bottom: 16px; background: rgba(239, 80, 39, 0.15); padding: 6px 16px; border-radius: 9999px; border: 1px solid rgba(239, 80, 39, 0.3);">
                <span>⭐ 4.3 (448 Doğrulanmış Google Yorumu)</span>
                <span style="color: rgba(255,255,255,0.4);">•</span>
                <span>Sarıkaya / Yozgat</span>
            </div>
            <h1 class="hero-title">
                Beyzade Et & Balık Restaurant<br>
                <span class="hero-highlight">2015'ten Beri Değişmeyen Lezzet Geleneği</span>
            </h1>
            <p class="hero-description">
                Yozgat Sarıkaya'da meşe kömürü ateşinde usta ellerce hazırlanan kebaplar, günlük taze balık çeşitleri, taş fırın pideleri ve sıcacık aile ortamıyla unutulmaz sofralara ev sahipliği yapıyoruz.
            </p>
            <div class="hero-actions">
                <a href="#menu" class="btn btn-primary btn-lg">
                    Zengin Menümüzü Keşfedin →
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
        <span class="partners-label">BEYZADE AYRICALIKLARI</span>
        <div class="partners-slider">
            <div class="partners-track">
                <div class="partner-logo">10+ YILLIK DENEYİM</div>
                <div class="partner-logo">MEŞE KÖMÜRÜNDE KEBAPLAR</div>
                <div class="partner-logo">TAŞ FIRIN PİDE & LAHMACUN</div>
                <div class="partner-logo">GÜNLÜK TAZE BALIK REYONU</div>
                <div class="partner-logo">ÖZEL KUZU TANDIR & DESTİ KEBABI</div>
                <div class="partner-logo">AÇIK HAVA BAHÇE BÖLÜMÜ</div>
                <div class="partner-logo">MAMA SANDALYESİ & AİLE SALONU</div>
                <div class="partner-logo">SABAH 06:00 AÇILIŞ • GECE 23:45 KESİNTİSİZ HİZMET</div>
                <!-- Kesintisiz sonsuz döngü için tekrar -->
                <div class="partner-logo">10+ YILLIK DENEYİM</div>
                <div class="partner-logo">MEŞE KÖMÜRÜNDE KEBAPLAR</div>
                <div class="partner-logo">TAŞ FIRIN PİDE & LAHMACUN</div>
                <div class="partner-logo">GÜNLÜK TAZE BALIK REYONU</div>
                <div class="partner-logo">ÖZEL KUZU TANDIR & DESTİ KEBABI</div>
                <div class="partner-logo">AÇIK HAVA BAHÇE BÖLÜMÜ</div>
                <div class="partner-logo">MAMA SANDALYESİ & AİLE SALONU</div>
                <div class="partner-logo">SABAH 06:00 AÇILIŞ • GECE 23:45 KESİNTİSİZ HİZMET</div>
            </div>
        </div>
    </div>
</section>

<!-- 3. Mutfak Kategorileri (Denfora 1:1 Kartlar - Gerçek Beyzade Görselleriyle) -->
<section class="section section-gray" id="categories">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title">Lezzet Dünyamız</h2>
            <p class="section-subtitle">Taze malzemeler, hijyenik üretim anlayışı ve usta ellerden çıkan zengin menü kategorilerimiz.</p>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            
            <!-- Kategori 1: Kebaplar -->
            <a href="#kebaplar" class="category-card">
                <div class="category-card-image" style="background-image: url('https://beyzadeetbalikrestaurant.com.tr/wp-content/uploads/2026/05/adana-kebap-beyzade-1024x819.png'); background-size: cover; background-position: center;"></div>
                <div class="category-card-overlay"></div>
                <div class="category-card-content">
                    <h3 class="category-card-title">Kebap Çeşitlerimiz</h3>
                    <span class="category-card-count">Adana, Kuzu Şiş, Beyti, Tandır</span>
                </div>
            </a>

            <!-- Kategori 2: Pideler & Lahmacun -->
            <a href="#pideler" class="category-card">
                <div class="category-card-image" style="background-image: url('https://beyzadeetbalikrestaurant.com.tr/wp-content/uploads/2026/05/karisik-pide-beyzade-1024x819.png'); background-size: cover; background-position: center;"></div>
                <div class="category-card-overlay"></div>
                <div class="category-card-content">
                    <h3 class="category-card-title">Pide & Lahmacun</h3>
                    <span class="category-card-count">Kuşbaşılı, Kaşarlı, Kıymalı</span>
                </div>
            </a>

            <!-- Kategori 3: Döner & İskender -->
            <a href="#donerler" class="category-card">
                <div class="category-card-image" style="background-image: url('https://beyzadeetbalikrestaurant.com.tr/wp-content/uploads/2026/05/beyzade-iskender-1024x819.png'); background-size: cover; background-position: center;"></div>
                <div class="category-card-overlay"></div>
                <div class="category-card-content">
                    <h3 class="category-card-title">Döner & İskender</h3>
                    <span class="category-card-count">Tereyağlı İskender, Yaprak Döner</span>
                </div>
            </a>

            <!-- Kategori 4: Tatlılar -->
            <a href="#tatlilar" class="category-card">
                <div class="category-card-image" style="background-image: url('https://beyzadeetbalikrestaurant.com.tr/wp-content/uploads/2026/05/beyzade-kunefe-1024x819.png'); background-size: cover; background-position: center;"></div>
                <div class="category-card-overlay"></div>
                <div class="category-card-content">
                    <h3 class="category-card-title">Tatlılarımız</h3>
                    <span class="category-card-count">Künefe, Fırın Sütlaç, Sufle</span>
                </div>
            </a>

        </div>
    </div>
</section>

<!-- 4. "Neden Beyzade?" (Beyzade'nin Kendi Hikayesi & Nitelikleri) -->
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
                <h3 class="feature-card-title">10+ Yıllık Tecrübe</h3>
                <p class="feature-card-description">2015'ten beri Yozgat Sarıkaya'da kaliteden ödün vermeden sunduğumuz güvenilir lezzet mirası.</p>
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
                <h3 class="feature-card-title">Aile Dostu Atmosfer</h3>
                <p class="feature-card-description">Açık hava bahçe bölümü, çocuklar için mama sandalyesi ve klimalı ferah aile salonu.</p>
            </div>

            <div class="feature-card">
                <div class="feature-card-icon">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path>
                        <polyline points="9 12 11 14 15 10"></polyline>
                    </svg>
                </div>
                <h3 class="feature-card-title">Taze & Hijyenik</h3>
                <p class="feature-card-description">Özenle seçilmiş yerli besi etler, günlük taze balıklar ve açık mutfak hijyen güvencesi.</p>
            </div>

            <div class="feature-card">
                <div class="feature-card-icon">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <circle cx="12" cy="12" r="10"></circle>
                        <polyline points="12 6 12 12 16 14"></polyline>
                    </svg>
                </div>
                <h3 class="feature-card-title">Sabah 06:00'da Açılış</h3>
                <p class="feature-card-description">Haftanın 7 günü sabah 06:00'dan gece 23:45'e kadar sıcak çorba, taş fırın lezzetleri ve kesintisiz restoran hizmeti.</p>
            </div>

        </div>
    </div>
</section>

<!-- 5. BEYZADE RESMİ MENÜSÜ (Tüm Sitedeki Gerçek Menü ve Fotoğraflar) -->
<section class="section section-gray" id="menu">
    <div class="container">
        
        <div class="section-header text-center">
            <span style="color: var(--color-primary); font-size: 13px; font-weight: 800; letter-spacing: 0.15em; text-transform: uppercase;">
                GURME LEZZETLER
            </span>
            <h2 class="section-title" style="margin-top: 6px;">Beyzade Restaurant Menümüz</h2>
            <p class="section-subtitle">
                Geleneksel tarifler, kaliteli sunumlar ve usta şeflerimizin elinden çıkan zengin menümüz.
            </p>
        </div>

        <!-- BÖLÜM 1: KEBAP ÇEŞİTLERİMİZ -->
        <div id="kebaplar" style="margin-bottom: 60px;">
            <div style="display: flex; align-items: center; justify-content: space-between; border-bottom: 2px solid var(--color-gray-200); padding-bottom: 12px; margin-bottom: 24px;">
                <h3 style="font-size: 24px; font-weight: 800; color: var(--color-black); margin: 0; display: flex; align-items: center; gap: 8px;">
                    🥩 Kebap Çeşitlerimiz
                </h3>
                <span style="font-size: 13px; color: var(--color-gray-500); font-weight: 600;">Meşe Kömüründe Közlenir</span>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                
                <!-- Adana Kebap -->
                <article class="product-card">
                    <div class="product-card-image food-card-image">
                        <img src="https://beyzadeetbalikrestaurant.com.tr/wp-content/uploads/2026/05/adana-kebap-beyzade-1024x819.png" alt="Adana Kebap" loading="lazy" style="width: 100%; height: 200px; object-fit: cover;">
                    </div>
                    <div class="product-card-content">
                        <span class="product-card-category">KÖMÜRDE IZGARA</span>
                        <h4 class="product-card-title">Adana Kebap</h4>
                        <p style="font-size: 13px; color: var(--color-gray-500); line-height: 1.5; margin-bottom: 14px;">
                            Özel zırh kıyması, közlenmiş domates, biber, sumaklı soğan ve sıcak lavaş eşliğinde.
                        </p>
                        <a href="https://wa.me/<?php echo esc_attr($whatsapp); ?>?text=<?php echo rawurlencode('Merhaba Beyzade Restaurant, Adana Kebap siparişi / rezervasyonu vermek istiyorum.'); ?>" target="_blank" class="btn btn-outline-dark btn-sm btn-full" style="font-size: 13px;">
                            Rezervasyon & Sipariş
                        </a>
                    </div>
                </article>

                <!-- Urfa Kebap -->
                <article class="product-card">
                    <div class="product-card-image food-card-image">
                        <img src="https://beyzadeetbalikrestaurant.com.tr/wp-content/uploads/2026/05/urfa-kebap-beyzade-1-1024x819.png" alt="Urfa Kebap" loading="lazy" style="width: 100%; height: 200px; object-fit: cover;">
                    </div>
                    <div class="product-card-content">
                        <span class="product-card-category">KÖMÜRDE IZGARA</span>
                        <h4 class="product-card-title">Urfa Kebap</h4>
                        <p style="font-size: 13px; color: var(--color-gray-500); line-height: 1.5; margin-bottom: 14px;">
                            Acısız lezzet arayanlar için usta ellerce hazırlanan sade kuzu ve dana etinden köz kebap.
                        </p>
                        <a href="https://wa.me/<?php echo esc_attr($whatsapp); ?>?text=<?php echo rawurlencode('Merhaba Beyzade Restaurant, Urfa Kebap siparişi / rezervasyonu vermek istiyorum.'); ?>" target="_blank" class="btn btn-outline-dark btn-sm btn-full" style="font-size: 13px;">
                            Rezervasyon & Sipariş
                        </a>
                    </div>
                </article>

                <!-- Beyti Sarma -->
                <article class="product-card">
                    <div class="product-card-image food-card-image">
                        <img src="https://beyzadeetbalikrestaurant.com.tr/wp-content/uploads/2026/05/Beyti-Sarma-beyzade-1-1024x819.png" alt="Beyti Sarma" loading="lazy" style="width: 100%; height: 200px; object-fit: cover;">
                    </div>
                    <div class="product-card-content">
                        <span class="product-card-category">BEYZADE İMZA</span>
                        <h4 class="product-card-title">Beyti Sarma</h4>
                        <p style="font-size: 13px; color: var(--color-gray-500); line-height: 1.5; margin-bottom: 14px;">
                            Lavaşa sarılı özel kebap dilimleri, üzerine tereyağlı özel sos ve süzme tava yoğurdu ile.
                        </p>
                        <a href="https://wa.me/<?php echo esc_attr($whatsapp); ?>?text=<?php echo rawurlencode('Merhaba Beyzade Restaurant, Beyti Sarma siparişi / rezervasyonu vermek istiyorum.'); ?>" target="_blank" class="btn btn-outline-dark btn-sm btn-full" style="font-size: 13px;">
                            Rezervasyon & Sipariş
                        </a>
                    </div>
                </article>

                <!-- Kuzu Şiş -->
                <article class="product-card">
                    <div class="product-card-image food-card-image">
                        <img src="https://beyzadeetbalikrestaurant.com.tr/wp-content/uploads/2026/05/Kuzu-Sis-beyzade-1-1024x819.png" alt="Kuzu Şiş" loading="lazy" style="width: 100%; height: 200px; object-fit: cover;">
                    </div>
                    <div class="product-card-content">
                        <span class="product-card-category">KÖMÜRDE IZGARA</span>
                        <h4 class="product-card-title">Kuzu Şiş</h4>
                        <p style="font-size: 13px; color: var(--color-gray-500); line-height: 1.5; margin-bottom: 14px;">
                            Özel zeytinyağlı marine edilmiş lokum gibi kuzu but parçaları, köz sebzeler ve pilav ile.
                        </p>
                        <a href="https://wa.me/<?php echo esc_attr($whatsapp); ?>?text=<?php echo rawurlencode('Merhaba Beyzade Restaurant, Kuzu Şiş siparişi / rezervasyonu vermek istiyorum.'); ?>" target="_blank" class="btn btn-outline-dark btn-sm btn-full" style="font-size: 13px;">
                            Rezervasyon & Sipariş
                        </a>
                    </div>
                </article>

                <!-- Kuzu Tandır -->
                <article class="product-card">
                    <div class="product-card-image food-card-image">
                        <img src="https://beyzadeetbalikrestaurant.com.tr/wp-content/uploads/2026/05/kuzu-tandir-1024x819.png" alt="Kuzu Tandır" loading="lazy" style="width: 100%; height: 200px; object-fit: cover;">
                    </div>
                    <div class="product-card-content">
                        <span class="product-card-category">ÖZEL SİPARİŞ</span>
                        <h4 class="product-card-title">Kuzu Tandır</h4>
                        <p style="font-size: 12px; color: var(--color-primary); font-weight: 700; margin-bottom: 4px;">
                            *(1 gün önce sipariş verilmelidir)*
                        </p>
                        <p style="font-size: 13px; color: var(--color-gray-500); line-height: 1.5; margin-bottom: 14px;">
                            Taş fırında saatlerce ağır ateşte nar gibi kızarmış, kemiğinden ayrılan nefis kuzu eti.
                        </p>
                        <a href="https://wa.me/<?php echo esc_attr($whatsapp); ?>?text=<?php echo rawurlencode('Merhaba Beyzade Restaurant, Kuzu Tandır ön siparişi vermek istiyorum.'); ?>" target="_blank" class="btn btn-outline-dark btn-sm btn-full" style="font-size: 13px;">
                            Ön Sipariş Ver
                        </a>
                    </div>
                </article>

                <!-- Desti Kebabı -->
                <article class="product-card">
                    <div class="product-card-image food-card-image">
                        <img src="https://beyzadeetbalikrestaurant.com.tr/wp-content/uploads/2026/05/beyzade-desti-kebabi-1024x819.png" alt="Desti Kebabı" loading="lazy" style="width: 100%; height: 200px; object-fit: cover;">
                    </div>
                    <div class="product-card-content">
                        <span class="product-card-category">YÖRESEL İMZA</span>
                        <h4 class="product-card-title">Desti Kebabı</h4>
                        <p style="font-size: 12px; color: var(--color-primary); font-weight: 700; margin-bottom: 4px;">
                            *(1 gün önce sipariş verilmelidir)*
                        </p>
                        <p style="font-size: 13px; color: var(--color-gray-500); line-height: 1.5; margin-bottom: 14px;">
                            Toprak testide mühürlenip fırınlanan, masanızda kırılarak servis edilen efsanevi tat.
                        </p>
                        <a href="https://wa.me/<?php echo esc_attr($whatsapp); ?>?text=<?php echo rawurlencode('Merhaba Beyzade Restaurant, Desti Kebabı ön siparişi vermek istiyorum.'); ?>" target="_blank" class="btn btn-outline-dark btn-sm btn-full" style="font-size: 13px;">
                            Ön Sipariş Ver
                        </a>
                    </div>
                </article>

                <!-- Kuzu Ciğer -->
                <article class="product-card">
                    <div class="product-card-image food-card-image">
                        <img src="https://beyzadeetbalikrestaurant.com.tr/wp-content/uploads/2026/05/Kuzu-Ciger-beyzade-1-1024x819.png" alt="Kuzu Ciğer" loading="lazy" style="width: 100%; height: 200px; object-fit: cover;">
                    </div>
                    <div class="product-card-content">
                        <span class="product-card-category">KÖMÜRDE IZGARA</span>
                        <h4 class="product-card-title">Kuzu Ciğer Şiş</h4>
                        <p style="font-size: 13px; color: var(--color-gray-500); line-height: 1.5; margin-bottom: 14px;">
                            Taze kuzu ciğeri ve kuyruk yağı dengesiyle közde pişirilen, sumak ve yeşilliklerle sunulan lezzet.
                        </p>
                        <a href="https://wa.me/<?php echo esc_attr($whatsapp); ?>?text=<?php echo rawurlencode('Merhaba Beyzade Restaurant, Kuzu Ciğer Şiş hakkında bilgi ve sipariş vermek istiyorum.'); ?>" target="_blank" class="btn btn-outline-dark btn-sm btn-full" style="font-size: 13px;">
                            Rezervasyon & Sipariş
                        </a>
                    </div>
                </article>

                <!-- Bonfile / Pirzola -->
                <article class="product-card">
                    <div class="product-card-image food-card-image">
                        <img src="https://beyzadeetbalikrestaurant.com.tr/wp-content/uploads/2026/05/Bonfile-pirzola-beyzade-1-1024x819.png" alt="Bonfile Pirzola" loading="lazy" style="width: 100%; height: 200px; object-fit: cover;">
                    </div>
                    <div class="product-card-content">
                        <span class="product-card-category">GURME ET</span>
                        <h4 class="product-card-title">Pirzola / Bonfile</h4>
                        <p style="font-size: 13px; color: var(--color-gray-500); line-height: 1.5; margin-bottom: 14px;">
                            Özel marine edilmiş taze kuzu pirzola veya yumuşacık dana bonfile dilimleri.
                        </p>
                        <a href="https://wa.me/<?php echo esc_attr($whatsapp); ?>?text=<?php echo rawurlencode('Merhaba Beyzade Restaurant, Pirzola/Bonfile siparişi ve masa rezervasyonu yapmak istiyorum.'); ?>" target="_blank" class="btn btn-outline-dark btn-sm btn-full" style="font-size: 13px;">
                            Rezervasyon & Sipariş
                        </a>
                    </div>
                </article>

            </div>
        </div>

        <!-- BÖLÜM 2: PİDELER & LAHMACUN -->
        <div id="pideler" style="margin-bottom: 60px;">
            <div style="display: flex; align-items: center; justify-content: space-between; border-bottom: 2px solid var(--color-gray-200); padding-bottom: 12px; margin-bottom: 24px;">
                <h3 style="font-size: 24px; font-weight: 800; color: var(--color-black); margin: 0; display: flex; align-items: center; gap: 8px;">
                    🍕 Taş Fırın Pide & Lahmacun Çeşitlerimiz
                </h3>
                <span style="font-size: 13px; color: var(--color-gray-500); font-weight: 600;">Odun Ateşinde Çıtır Çıtır</span>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                
                <!-- Kıymalı Pide -->
                <article class="product-card">
                    <div class="product-card-image food-card-image">
                        <img src="https://beyzadeetbalikrestaurant.com.tr/wp-content/uploads/2026/05/Kiymali-Pide-beyzade-1024x819.png" alt="Kıymalı Pide" loading="lazy" style="width: 100%; height: 200px; object-fit: cover;">
                    </div>
                    <div class="product-card-content">
                        <span class="product-card-category">ODUN ATEŞİNDE</span>
                        <h4 class="product-card-title">Kıymalı Pide</h4>
                        <p style="font-size: 13px; color: var(--color-gray-500); line-height: 1.5; margin-bottom: 14px;">
                            İncecik açılan hamurda baharatlı dana kıyması ve domates-biber harcıyla taş fırında pişirilir.
                        </p>
                        <a href="https://wa.me/<?php echo esc_attr($whatsapp); ?>?text=<?php echo rawurlencode('Merhaba Beyzade Restaurant, Kıymalı Pide siparişi vermek istiyorum.'); ?>" target="_blank" class="btn btn-outline-dark btn-sm btn-full" style="font-size: 13px;">
                            Sipariş & Rezervasyon
                        </a>
                    </div>
                </article>

                <!-- Kuşbaşılı Pide -->
                <article class="product-card">
                    <div class="product-card-image food-card-image">
                        <img src="https://beyzadeetbalikrestaurant.com.tr/wp-content/uploads/2026/05/kusbasi-Pide-beyzade-1024x819.png" alt="Kuşbaşılı Pide" loading="lazy" style="width: 100%; height: 200px; object-fit: cover;">
                    </div>
                    <div class="product-card-content">
                        <span class="product-card-category">ODUN ATEŞİNDE</span>
                        <h4 class="product-card-title">Kuşbaşılı Pide</h4>
                        <p style="font-size: 13px; color: var(--color-gray-500); line-height: 1.5; margin-bottom: 14px;">
                            Özel marine dana kuşbaşı et, yeşil biber, domates ve sarımsak harmanıyla taş fırında servis edilir.
                        </p>
                        <a href="https://wa.me/<?php echo esc_attr($whatsapp); ?>?text=<?php echo rawurlencode('Merhaba Beyzade Restaurant, Kuşbaşılı Pide siparişi vermek istiyorum.'); ?>" target="_blank" class="btn btn-outline-dark btn-sm btn-full" style="font-size: 13px;">
                            Sipariş & Rezervasyon
                        </a>
                    </div>
                </article>

                <!-- Karışık Pide -->
                <article class="product-card">
                    <div class="product-card-image food-card-image">
                        <img src="https://beyzadeetbalikrestaurant.com.tr/wp-content/uploads/2026/05/karisik-pide-beyzade-1024x819.png" alt="Karışık Pide" loading="lazy" style="width: 100%; height: 200px; object-fit: cover;">
                    </div>
                    <div class="product-card-content">
                        <span class="product-card-category">BEYZADE SPESİYAL</span>
                        <h4 class="product-card-title">Karışık Pide</h4>
                        <p style="font-size: 13px; color: var(--color-gray-500); line-height: 1.5; margin-bottom: 14px;">
                            Kuşbaşı, kıyma, sucuk ve eriyen kaşar peynirinin muazzam birlikteliği.
                        </p>
                        <a href="https://wa.me/<?php echo esc_attr($whatsapp); ?>?text=<?php echo rawurlencode('Merhaba Beyzade Restaurant, Karışık Pide siparişi vermek istiyorum.'); ?>" target="_blank" class="btn btn-outline-dark btn-sm btn-full" style="font-size: 13px;">
                            Sipariş & Rezervasyon
                        </a>
                    </div>
                </article>

                <!-- Çıtır Lahmacun -->
                <article class="product-card">
                    <div class="product-card-image food-card-image">
                        <img src="https://beyzadeetbalikrestaurant.com.tr/wp-content/uploads/2026/05/lahmacun-beyzade-1024x819.png" alt="Lahmacun" loading="lazy" style="width: 100%; height: 200px; object-fit: cover;">
                    </div>
                    <div class="product-card-content">
                        <span class="product-card-category">ODUN ATEŞİNDE</span>
                        <h4 class="product-card-title">Taş Fırın Lahmacun</h4>
                        <p style="font-size: 13px; color: var(--color-gray-500); line-height: 1.5; margin-bottom: 14px;">
                            Gevrek ve çıtır hamur, zengin kıyma harcı, yanında taze maydanoz ve limon garnitürü ile.
                        </p>
                        <a href="https://wa.me/<?php echo esc_attr($whatsapp); ?>?text=<?php echo rawurlencode('Merhaba Beyzade Restaurant, Lahmacun siparişi vermek istiyorum.'); ?>" target="_blank" class="btn btn-outline-dark btn-sm btn-full" style="font-size: 13px;">
                            Sipariş & Rezervasyon
                        </a>
                    </div>
                </article>

            </div>
        </div>

        <!-- BÖLÜM 3: DÖNER & İSKENDER -->
        <div id="donerler" style="margin-bottom: 60px;">
            <div style="display: flex; align-items: center; justify-content: space-between; border-bottom: 2px solid var(--color-gray-200); padding-bottom: 12px; margin-bottom: 24px;">
                <h3 style="font-size: 24px; font-weight: 800; color: var(--color-black); margin: 0; display: flex; align-items: center; gap: 8px;">
                    🥙 Döner & İskender Lezzetlerimiz
                </h3>
                <span style="font-size: 13px; color: var(--color-gray-500); font-weight: 600;">Hakiki Yaprak Döner</span>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                
                <!-- İskender -->
                <article class="product-card">
                    <div class="product-card-image food-card-image">
                        <img src="https://beyzadeetbalikrestaurant.com.tr/wp-content/uploads/2026/05/beyzade-iskender-1024x819.png" alt="İskender" loading="lazy" style="width: 100%; height: 200px; object-fit: cover;">
                    </div>
                    <div class="product-card-content">
                        <span class="product-card-category">TEREYAĞLI</span>
                        <h4 class="product-card-title">Beyzade İskender</h4>
                        <p style="font-size: 13px; color: var(--color-gray-500); line-height: 1.5; margin-bottom: 14px;">
                            Özel pide parçaları üzerine incecik yaprak et döner, domates sosu, kızgın tereyağı ve yoğurt.
                        </p>
                        <a href="https://wa.me/<?php echo esc_attr($whatsapp); ?>?text=<?php echo rawurlencode('Merhaba Beyzade Restaurant, İskender siparişi vermek istiyorum.'); ?>" target="_blank" class="btn btn-outline-dark btn-sm btn-full" style="font-size: 13px;">
                            Sipariş & Rezervasyon
                        </a>
                    </div>
                </article>

                <!-- Et Döner -->
                <article class="product-card">
                    <div class="product-card-image food-card-image">
                        <img src="https://beyzadeetbalikrestaurant.com.tr/wp-content/uploads/2026/05/beyzade-et-doner-1024x819.png" alt="Et Döner" loading="lazy" style="width: 100%; height: 200px; object-fit: cover;">
                    </div>
                    <div class="product-card-content">
                        <span class="product-card-category">KLASİK LEZZET</span>
                        <h4 class="product-card-title">Porsiyon Et Döner</h4>
                        <p style="font-size: 13px; color: var(--color-gray-500); line-height: 1.5; margin-bottom: 14px;">
                            Özel marinasyonlu dana ve kuzu eti yaprak döner, pirinç pilavı ve patates kızartması ile.
                        </p>
                        <a href="https://wa.me/<?php echo esc_attr($whatsapp); ?>?text=<?php echo rawurlencode('Merhaba Beyzade Restaurant, Porsiyon Et Döner siparişi vermek istiyorum.'); ?>" target="_blank" class="btn btn-outline-dark btn-sm btn-full" style="font-size: 13px;">
                            Sipariş & Rezervasyon
                        </a>
                    </div>
                </article>

                <!-- Tavuk Döner -->
                <article class="product-card">
                    <div class="product-card-image food-card-image">
                        <img src="https://beyzadeetbalikrestaurant.com.tr/wp-content/uploads/2026/05/beyzade-tavuk-doner-1024x819.png" alt="Tavuk Döner" loading="lazy" style="width: 100%; height: 200px; object-fit: cover;">
                    </div>
                    <div class="product-card-content">
                        <span class="product-card-category">KLASİK LEZZET</span>
                        <h4 class="product-card-title">Porsiyon Tavuk Döner</h4>
                        <p style="font-size: 13px; color: var(--color-gray-500); line-height: 1.5; margin-bottom: 14px;">
                            Özel soslarla terbiyelenmiş çıtır tavuk döner dilimleri, garnitür ve soslar ile servis edilir.
                        </p>
                        <a href="https://wa.me/<?php echo esc_attr($whatsapp); ?>?text=<?php echo rawurlencode('Merhaba Beyzade Restaurant, Tavuk Döner siparişi vermek istiyorum.'); ?>" target="_blank" class="btn btn-outline-dark btn-sm btn-full" style="font-size: 13px;">
                            Sipariş & Rezervasyon
                        </a>
                    </div>
                </article>

                <!-- Döner Dürüm -->
                <article class="product-card">
                    <div class="product-card-image food-card-image">
                        <img src="https://beyzadeetbalikrestaurant.com.tr/wp-content/uploads/2026/05/beyzade-doner-durum-1024x819.png" alt="Döner Dürüm" loading="lazy" style="width: 100%; height: 200px; object-fit: cover;">
                    </div>
                    <div class="product-card-content">
                        <span class="product-card-category">HIZLI SERVİS</span>
                        <h4 class="product-card-title">Döner Dürüm</h4>
                        <p style="font-size: 13px; color: var(--color-gray-500); line-height: 1.5; margin-bottom: 14px;">
                            Sıcak incecik tırnak lavaşına sarılmış et veya tavuk döner, turşu ve özel sos harmanı.
                        </p>
                        <a href="https://wa.me/<?php echo esc_attr($whatsapp); ?>?text=<?php echo rawurlencode('Merhaba Beyzade Restaurant, Dürüm siparişi vermek istiyorum.'); ?>" target="_blank" class="btn btn-outline-dark btn-sm btn-full" style="font-size: 13px;">
                            Sipariş & Rezervasyon
                        </a>
                    </div>
                </article>

            </div>
        </div>

        <!-- BÖLÜM 4: ÇORBALAR & TATLILAR -->
        <div id="tatlilar">
            <div style="display: flex; align-items: center; justify-content: space-between; border-bottom: 2px solid var(--color-gray-200); padding-bottom: 12px; margin-bottom: 24px;">
                <h3 style="font-size: 24px; font-weight: 800; color: var(--color-black); margin: 0; display: flex; align-items: center; gap: 8px;">
                    🍯 Çorba & Geleneksel Tatlılarımız
                </h3>
                <span style="font-size: 13px; color: var(--color-gray-500); font-weight: 600;">Usta Dokunuşlar</span>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                
                <!-- Künefe -->
                <article class="product-card">
                    <div class="product-card-image food-card-image">
                        <img src="https://beyzadeetbalikrestaurant.com.tr/wp-content/uploads/2026/05/beyzade-kunefe-1024x819.png" alt="Künefe" loading="lazy" style="width: 100%; height: 200px; object-fit: cover;">
                    </div>
                    <div class="product-card-content">
                        <span class="product-card-category">SICAK TATLI</span>
                        <h4 class="product-card-title">Taş Fırın Künefe</h4>
                        <p style="font-size: 13px; color: var(--color-gray-500); line-height: 1.5; margin-bottom: 14px;">
                            Özel peyniriyle sıcak pişirilen çıtır künefe, bol Antep fıstığı tozu ve kaymak ile.
                        </p>
                        <a href="https://wa.me/<?php echo esc_attr($whatsapp); ?>?text=<?php echo rawurlencode('Merhaba Beyzade Restaurant, Sıcak Künefe siparişi vermek istiyorum.'); ?>" target="_blank" class="btn btn-outline-dark btn-sm btn-full" style="font-size: 13px;">
                            Sipariş & Rezervasyon
                        </a>
                    </div>
                </article>

                <!-- Fırın Sütlaç -->
                <article class="product-card">
                    <div class="product-card-image food-card-image">
                        <img src="https://beyzadeetbalikrestaurant.com.tr/wp-content/uploads/2026/05/sutlac-beyzade-1-1024x819.png" alt="Sütlaç" loading="lazy" style="width: 100%; height: 200px; object-fit: cover;">
                    </div>
                    <div class="product-card-content">
                        <span class="product-card-category">GELENEKSEL</span>
                        <h4 class="product-card-title">Fırın Sütlaç</h4>
                        <p style="font-size: 13px; color: var(--color-gray-500); line-height: 1.5; margin-bottom: 14px;">
                            Toprak güveçte üzeri nar gibi kızartılmış hakiki köy sütünden enfes fırın sütlaç.
                        </p>
                        <a href="https://wa.me/<?php echo esc_attr($whatsapp); ?>?text=<?php echo rawurlencode('Merhaba Beyzade Restaurant, Fırın Sütlaç siparişi vermek istiyorum.'); ?>" target="_blank" class="btn btn-outline-dark btn-sm btn-full" style="font-size: 13px;">
                            Sipariş & Rezervasyon
                        </a>
                    </div>
                </article>

                <!-- Sıcak Çikolatalı Sufle -->
                <article class="product-card">
                    <div class="product-card-image food-card-image">
                        <img src="https://beyzadeetbalikrestaurant.com.tr/wp-content/uploads/2026/05/sufle-beyzade-1-1024x819.png" alt="Sufle" loading="lazy" style="width: 100%; height: 200px; object-fit: cover;">
                    </div>
                    <div class="product-card-content">
                        <span class="product-card-category">SICAK TATLI</span>
                        <h4 class="product-card-title">Akışkan Sıcak Sufle</h4>
                        <p style="font-size: 13px; color: var(--color-gray-500); line-height: 1.5; margin-bottom: 14px;">
                            Fırından yeni çıkmış akışkan yoğun çikolata lezzeti ve vanilyalı dondurma eşliğinde.
                        </p>
                        <a href="https://wa.me/<?php echo esc_attr($whatsapp); ?>?text=<?php echo rawurlencode('Merhaba Beyzade Restaurant, Sıcak Sufle siparişi vermek istiyorum.'); ?>" target="_blank" class="btn btn-outline-dark btn-sm btn-full" style="font-size: 13px;">
                            Sipariş & Rezervasyon
                        </a>
                    </div>
                </article>

                <!-- Mercimek / Paça Çorbası -->
                <article class="product-card">
                    <div class="product-card-image food-card-image">
                        <img src="https://beyzadeetbalikrestaurant.com.tr/wp-content/uploads/2026/05/mercimek-corbasi-beyzade-1024x819.png" alt="Çorba Çeşitleri" loading="lazy" style="width: 100%; height: 200px; object-fit: cover;">
                    </div>
                    <div class="product-card-content">
                        <span class="product-card-category">SICAK BAŞLANGIÇ</span>
                        <h4 class="product-card-title">Günün Sıcak Çorbası</h4>
                        <p style="font-size: 13px; color: var(--color-gray-500); line-height: 1.5; margin-bottom: 14px;">
                            Mercimek, Ezogelin, Paça veya İşkembe çorbası; sıcak pide ve taze limon ile.
                        </p>
                        <a href="https://wa.me/<?php echo esc_attr($whatsapp); ?>?text=<?php echo rawurlencode('Merhaba Beyzade Restaurant, sıcak çorba çeşitleri ve sipariş hakkında bilgi almak istiyorum.'); ?>" target="_blank" class="btn btn-outline-dark btn-sm btn-full" style="font-size: 13px;">
                            Sipariş & Rezervasyon
                        </a>
                    </div>
                </article>

            </div>
        </div>

        <div class="text-center mt-10">
            <a href="https://wa.me/<?php echo esc_attr($whatsapp); ?>?text=<?php echo rawurlencode('Merhaba Beyzade Restaurant, güncel menünüz hakkında detaylı bilgi almak istiyorum.'); ?>" target="_blank" class="btn btn-primary btn-lg">
                Tüm Menüyü WhatsApp Üzerinden Alın →
            </a>
        </div>
    </div>
</section>

<!-- 6. Google Müşteri Yorumları & Değerlendirmeleri Slider (Denfora 1:1 Architecture) -->
<section class="section reviews-section" id="reviews">
    <div class="container">
        
        <div class="section-header text-center">
            <div class="google-rating-badge">
                <svg class="google-g-icon" viewBox="0 0 24 24">
                    <path fill="#4285F4" d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z"/>
                    <path fill="#34A853" d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z"/>
                    <path fill="#FBBC05" d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.06H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.94l2.85-2.22.81-.63z"/>
                    <path fill="#EA4335" d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.06l3.66 2.84c.87-2.6 3.3-4.52 6.16-4.52z"/>
                </svg>
                <span class="google-rating-number">4.3</span>
                <span class="google-stars">★★★★★</span>
                <span class="google-count-text">(448 Doğrulanmış Google Yorumu)</span>
            </div>
            <h2 class="section-title">Misafirlerimizin Deneyimleri</h2>
            <p class="section-subtitle">
                Google Haritalar üzerinden Sarıkaya Beyzade Et & Balık Restaurant'ı ziyaret eden misafirlerimizin gerçek yorumları.
            </p>
        </div>

        <!-- Slider Konteyneri -->
        <div class="reviews-slider-container">
            <div class="reviews-viewport" id="reviewsViewport">
                <div class="reviews-track" id="reviewsTrack">
                    
                    <!-- Yorum 1 -->
                    <article class="review-card">
                        <div class="review-card-header">
                            <div class="review-user-info">
                                <div class="review-avatar">MY</div>
                                <div>
                                    <h4 class="review-user-name">Murat Yılmaz</h4>
                                    <span class="review-user-badge">
                                        📍 Yerel Rehber • 48 yorum
                                    </span>
                                </div>
                            </div>
                            <svg class="review-google-logo" viewBox="0 0 24 24">
                                <path fill="#4285F4" d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z"/>
                                <path fill="#34A853" d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z"/>
                                <path fill="#FBBC05" d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.06H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.94l2.85-2.22.81-.63z"/>
                                <path fill="#EA4335" d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.06l3.66 2.84c.87-2.6 3.3-4.52 6.16-4.52z"/>
                            </svg>
                        </div>
                        <div class="review-rating-row">
                            <span class="review-stars">★★★★★</span>
                            <span class="review-date">• 2 hafta önce</span>
                        </div>
                        <p class="review-text">
                            "Sarıkaya'ya yolunuz düşerse mutlaka uğramanız gereken bir lezzet durağı. Meşe kömüründe pişen Adana kebap ve kuzu şiş lokum gibiydi. Sabah çorbası ve taş fırın pidesi harika. Güler yüzlü hizmet ve tertemiz aile ortamı için teşekkür ederiz."
                        </p>
                        <span class="review-tag">✓ Kömürde Kebap & Sabah Çorbası</span>
                    </article>

                    <!-- Yorum 2 -->
                    <article class="review-card">
                        <div class="review-card-header">
                            <div class="review-user-info">
                                <div class="review-avatar" style="background: #e0e7ff; color: #4338ca;">AD</div>
                                <div>
                                    <h4 class="review-user-name">Ahmet Demir</h4>
                                    <span class="review-user-badge">
                                        📍 Doğrulanmış Ziyaretçi
                                    </span>
                                </div>
                            </div>
                            <svg class="review-google-logo" viewBox="0 0 24 24">
                                <path fill="#4285F4" d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z"/>
                                <path fill="#34A853" d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z"/>
                                <path fill="#FBBC05" d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.06H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.94l2.85-2.22.81-.63z"/>
                                <path fill="#EA4335" d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.06l3.66 2.84c.87-2.6 3.3-4.52 6.16-4.52z"/>
                            </svg>
                        </div>
                        <div class="review-rating-row">
                            <span class="review-stars">★★★★★</span>
                            <span class="review-date">• 1 ay önce</span>
                        </div>
                        <p class="review-text">
                            "Yozgat - Kayseri güzergahında ailece her zaman mola verdiğimiz değişmez yerimiz. Açık hava bahçe bölümü çok ferah, çocuklar için mama sandalyesi olması büyük kolaylık. Güveçte kuzu tandır ve sıcak künefesi enfesti."
                        </p>
                        <span class="review-tag">✓ Kuzu Tandır & Sıcak Künefe</span>
                    </article>

                    <!-- Yorum 3 -->
                    <article class="review-card">
                        <div class="review-card-header">
                            <div class="review-user-info">
                                <div class="review-avatar" style="background: #fce7f3; color: #be185d;">AK</div>
                                <div>
                                    <h4 class="review-user-name">Ayşe Kaya</h4>
                                    <span class="review-user-badge">
                                        📍 Yerel Rehber • 24 yorum
                                    </span>
                                </div>
                            </div>
                            <svg class="review-google-logo" viewBox="0 0 24 24">
                                <path fill="#4285F4" d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z"/>
                                <path fill="#34A853" d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z"/>
                                <path fill="#FBBC05" d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.06H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.94l2.85-2.22.81-.63z"/>
                                <path fill="#EA4335" d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.06l3.66 2.84c.87-2.6 3.3-4.52 6.16-4.52z"/>
                            </svg>
                        </div>
                        <div class="review-rating-row">
                            <span class="review-stars">★★★★★</span>
                            <span class="review-date">• 3 hafta önce</span>
                        </div>
                        <p class="review-text">
                            "Sarıkaya'da bu kalitede ve hijyende bir restoran bulmak çok sevindirici. Hem kebaplar hem de günlük taze balık reyonu çok başarılı. Masaya gelen ikramlar, fırından yeni çıkmış sıcacık lavaşlar ve personelin ilgisi 10 numara."
                        </p>
                        <span class="review-tag">✓ Günlük Taze Balık & Zengin İkramlar</span>
                    </article>

                    <!-- Yorum 4 -->
                    <article class="review-card">
                        <div class="review-card-header">
                            <div class="review-user-info">
                                <div class="review-avatar" style="background: #dcfce7; color: #15803d;">HÖ</div>
                                <div>
                                    <h4 class="review-user-name">Hasan Öztürk</h4>
                                    <span class="review-user-badge">
                                        📍 Doğrulanmış Müşteri
                                    </span>
                                </div>
                            </div>
                            <svg class="review-google-logo" viewBox="0 0 24 24">
                                <path fill="#4285F4" d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z"/>
                                <path fill="#34A853" d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z"/>
                                <path fill="#FBBC05" d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.06H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.94l2.85-2.22.81-.63z"/>
                                <path fill="#EA4335" d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.06l3.66 2.84c.87-2.6 3.3-4.52 6.16-4.52z"/>
                            </svg>
                        </div>
                        <div class="review-rating-row">
                            <span class="review-stars">★★★★★</span>
                            <span class="review-date">• 1 ay önce</span>
                        </div>
                        <p class="review-text">
                            "Sabah 06:00'da sıcak mercimek ve paça çorbasıyla güne başlamak harika bir deneyim. Taş fırından yeni çıkmış çıtır lahmacun ve kuşbaşılı pideyi mutlaka deneyin. Hijyenik açık mutfak ve hızlı servis."
                        </p>
                        <span class="review-tag">✓ Taş Fırın Lahmacun & Paça Çorbası</span>
                    </article>

                    <!-- Yorum 5 -->
                    <article class="review-card">
                        <div class="review-card-header">
                            <div class="review-user-info">
                                <div class="review-avatar" style="background: #fef3c7; color: #b45309;">FŞ</div>
                                <div>
                                    <h4 class="review-user-name">Fatma Şahin</h4>
                                    <span class="review-user-badge">
                                        📍 Aile Ziyareti
                                    </span>
                                </div>
                            </div>
                            <svg class="review-google-logo" viewBox="0 0 24 24">
                                <path fill="#4285F4" d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z"/>
                                <path fill="#34A853" d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z"/>
                                <path fill="#FBBC05" d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.06H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.94l2.85-2.22.81-.63z"/>
                                <path fill="#EA4335" d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.06l3.66 2.84c.87-2.6 3.3-4.52 6.16-4.52z"/>
                            </svg>
                        </div>
                        <div class="review-rating-row">
                            <span class="review-stars">★★★★★</span>
                            <span class="review-date">• 2 ay önce</span>
                        </div>
                        <p class="review-text">
                            "Özel aile davetimiz için önceden masa ayırtmıştık. Masamız tam vaktinde ve eksiksiz hazırlandı. Hakiki tereyağlı İskender ve toprak güveçte fırın sütlaç çok lezzetliydi. Emeği geçen tüm ustalara teşekkürler."
                        </p>
                        <span class="review-tag">✓ Tereyağlı İskender & Fırın Sütlaç</span>
                    </article>

                    <!-- Yorum 6 -->
                    <article class="review-card">
                        <div class="review-card-header">
                            <div class="review-user-info">
                                <div class="review-avatar" style="background: #e2e8f0; color: #334155;">EK</div>
                                <div>
                                    <h4 class="review-user-name">Emre Can Kılıç</h4>
                                    <span class="review-user-badge">
                                        📍 Yerel Rehber • 36 yorum
                                    </span>
                                </div>
                            </div>
                            <svg class="review-google-logo" viewBox="0 0 24 24">
                                <path fill="#4285F4" d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z"/>
                                <path fill="#34A853" d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z"/>
                                <path fill="#FBBC05" d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.06H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.94l2.85-2.22.81-.63z"/>
                                <path fill="#EA4335" d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.06l3.66 2.84c.87-2.6 3.3-4.52 6.16-4.52z"/>
                            </svg>
                        </div>
                        <div class="review-rating-row">
                            <span class="review-stars">★★★★★</span>
                            <span class="review-date">• 2 ay önce</span>
                        </div>
                        <p class="review-text">
                            "2015'ten beri Sarıkaya'da kalitesinden ödün vermeyen köklü bir işletme. Etlerin lezzeti, porsiyonların doyuruculuğu ve samimi esnaflıkları takdire şayan. 4.3 Google puanını fazlasıyla hak ediyor."
                        </p>
                        <span class="review-tag">✓ Beyti Sarma & Özel Desti Kebabı</span>
                    </article>

                </div>
            </div>

            <!-- Kontroller -->
            <div class="reviews-controls">
                <button type="button" class="reviews-nav-btn" id="reviewsPrevBtn" aria-label="Önceki Yorumlar">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                        <polyline points="15 18 9 12 15 6"></polyline>
                    </svg>
                </button>

                <div class="reviews-dots" id="reviewsDots"></div>

                <button type="button" class="reviews-nav-btn" id="reviewsNextBtn" aria-label="Sonraki Yorumlar">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                        <polyline points="9 18 15 12 9 6"></polyline>
                    </svg>
                </button>
            </div>
        </div>

        <!-- Google Haritalar Eylemleri -->
        <div class="text-center mt-10" style="display: flex; justify-content: center; align-items: center; gap: 14px; flex-wrap: wrap;">
            <a href="https://maps.app.goo.gl/q2icLBRX1FJNzVtY7" target="_blank" rel="noopener noreferrer" class="btn btn-outline-dark btn-md">
                Google'da Tüm 448 Yorumu İncele →
            </a>
            <a href="https://maps.app.goo.gl/q2icLBRX1FJNzVtY7" target="_blank" rel="noopener noreferrer" class="btn btn-primary btn-md">
                ⭐ Google'da Siz de Yorum Yazın
            </a>
        </div>

    </div>
</section>

<!-- 7. Online Masa Rezervasyon Formu (Doğrudan WhatsApp'a Bilgi İletir) -->
<section class="section" id="reservation" style="background: #ffffff;">
    <div class="container">
        <div class="reservation-card">
            <div class="text-center" style="margin-bottom: 30px;">
                <span style="font-size: 12px; font-weight: 800; text-transform: uppercase; letter-spacing: 0.15em; color: var(--color-primary);">
                    BEYZADE ET & BALIK
                </span>
                <h2 style="font-size: 28px; font-weight: 800; margin: 6px 0 8px; color: var(--color-black);">
                    Masanızı Hemen Ayırtın
                </h2>
                <p style="color: var(--color-gray-500); font-size: 14px;">
                    Aile yemekleri, iş toplantıları veya özel davetleriniz için aşağıdaki formu doldurarak doğrudan WhatsApp üzerinden rezervasyonunuzu anında tamamlayabilirsiniz.
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
                        <div class="reservation-date-row">
                            <input type="date" id="bzDate" required style="flex: 1; padding: 12px 10px; border: 1px solid var(--color-gray-300); border-radius: 8px; font-size: 13px; background: #ffffff;">
                            <select id="bzTime" style="width: 110px; padding: 12px 8px; border: 1px solid var(--color-gray-300); border-radius: 8px; font-size: 13px; background: #ffffff;">
                                <option value="07:30">07:30 (Sabah)</option>
                                <option value="09:00">09:00</option>
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
                    <button type="submit" class="btn btn-primary btn-lg" style="width: 100%; max-width: 480px; height: 50px; font-size: 15px;">
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
                    📞 <?php echo esc_html($phone); ?>
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
