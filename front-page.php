<?php
/**
 * MİS360 Front Page Template
 * 1:1 Denfora Architecture (Hero, Infinite Partners Marquee, Category Cards, Feature Boxes, Product Grid, Dark CTA)
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

$phone       = get_theme_mod('mis360_phone', '+90 555 123 4567');
$clean_phone = preg_replace('/[^0-9+]/', '', $phone);
$whatsapp    = get_theme_mod('mis360_whatsapp', '905551234567');
?>

<!-- 1. Hero Section (Denfora Exact Match) -->
<section class="hero">
    <div class="hero-bg">
        <div style="width: 100%; height: 100%; background: radial-gradient(circle at top right, rgba(239, 80, 39, 0.25) 0%, rgba(15, 23, 42, 0.95) 70%);"></div>
    </div>
    <div class="hero-overlay"></div>
    <div class="container">
        <div class="hero-content">
            <h1 class="hero-title">
                <?php esc_html_e('Premium Çözümler', 'mis360'); ?><br>
                <span class="hero-highlight"><?php esc_html_e('Modern Yaşam İçin', 'mis360'); ?></span>
            </h1>
            <p class="hero-description">
                <?php esc_html_e('Yüksek standartlarda geliştirilmiş çok amaçlı dijital platformumuzu keşfedin. Zamansız minimalist tasarım, Alman kalite ve mühendislik prensipleriyle buluşuyor.', 'mis360'); ?>
            </p>
            <div class="hero-actions">
                <a href="<?php echo esc_url(home_url('/prestige-ilan-emlak-listeleme-demo/')); ?>" class="btn btn-primary btn-lg">
                    <?php esc_html_e('Çözümleri Keşfet', 'mis360'); ?>
                </a>
                <a href="https://wa.me/<?php echo esc_attr($whatsapp); ?>" class="btn btn-outline-light btn-lg" target="_blank" rel="noopener noreferrer">
                    <?php esc_html_e('İletişime Geç', 'mis360'); ?>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- 2. Partners / Brands Infinite Marquee Slider (Denfora Exact Match) -->
<section class="section-partners">
    <div class="partners-container">
        <span class="partners-label"><?php esc_html_e('Markalarımız & İş Ortaklarımız', 'mis360'); ?></span>
        <div class="partners-slider">
            <div class="partners-track">
                <div class="partner-logo">MİS 360</div>
                <div class="partner-logo">MERCEDES-BENZ</div>
                <div class="partner-logo">BMW GROUP</div>
                <div class="partner-logo">AUDI</div>
                <div class="partner-logo">PORSCHE</div>
                <div class="partner-logo">GOURMET CLUB</div>
                <div class="partner-logo">PRESTIGE RESIDENCE</div>
                <div class="partner-logo">VODAFONE</div>
                <div class="partner-logo">SIEMENS</div>
                <!-- Kesintisiz sonsuz döngü için tekrar -->
                <div class="partner-logo">MİS 360</div>
                <div class="partner-logo">MERCEDES-BENZ</div>
                <div class="partner-logo">BMW GROUP</div>
                <div class="partner-logo">AUDI</div>
                <div class="partner-logo">PORSCHE</div>
                <div class="partner-logo">GOURMET CLUB</div>
                <div class="partner-logo">PRESTIGE RESIDENCE</div>
                <div class="partner-logo">VODAFONE</div>
                <div class="partner-logo">SIEMENS</div>
            </div>
        </div>
    </div>
</section>

<!-- 3. Categories Grid Section (Denfora Exact Match) -->
<section class="section section-gray">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title"><?php esc_html_e('Öne Çıkan Kategorilerimiz', 'mis360'); ?></h2>
            <p class="section-subtitle"><?php esc_html_e('Her sektöre ve ihtiyaca uygun yüksek kaliteli hizmet ve ürün yelpazemizi keşfedin.', 'mis360'); ?></p>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            
            <!-- Kategori 1: Yol Yardım -->
            <a href="<?php echo esc_url(home_url('/acil-yol-yardim-oto-cekici-demo/')); ?>" class="category-card">
                <div class="category-card-image" style="background: linear-gradient(135deg, #1e293b, #0f172a); display: flex; align-items: center; justify-content: center; font-size: 4rem;">
                    🚨
                </div>
                <div class="category-card-overlay"></div>
                <div class="category-card-content">
                    <h3 class="category-card-title"><?php esc_html_e('Acil Yol Yardım & Çekici', 'mis360'); ?></h3>
                    <span class="category-card-count">7/24 Aktif • 15 Dk Varış</span>
                </div>
            </a>

            <!-- Kategori 2: Lüks Emlak & Rezidans -->
            <a href="<?php echo esc_url(home_url('/prestige-ilan-emlak-listeleme-demo/')); ?>" class="category-card">
                <div class="category-card-image" style="background: linear-gradient(135deg, #1e293b, #0f172a); display: flex; align-items: center; justify-content: center; font-size: 4rem;">
                    🏢
                </div>
                <div class="category-card-overlay"></div>
                <div class="category-card-content">
                    <h3 class="category-card-title"><?php esc_html_e('Lüks Emlak & Rezidans', 'mis360'); ?></h3>
                    <span class="category-card-count">VIP Portföy • 25+ Seçenek</span>
                </div>
            </a>

            <!-- Kategori 3: Prestij Vasıta -->
            <a href="<?php echo esc_url(home_url('/prestige-ilan-emlak-listeleme-demo/')); ?>" class="category-card">
                <div class="category-card-image" style="background: linear-gradient(135deg, #1e293b, #0f172a); display: flex; align-items: center; justify-content: center; font-size: 4rem;">
                    🚘
                </div>
                <div class="category-card-overlay"></div>
                <div class="category-card-content">
                    <h3 class="category-card-title"><?php esc_html_e('Prestij Galeri & Vasıta', 'mis360'); ?></h3>
                    <span class="category-card-count">Ekspertiz Onaylı • 14+ Araç</span>
                </div>
            </a>

            <!-- Kategori 4: Restoran & Gourmet -->
            <a href="<?php echo esc_url(home_url('/gourmet-bistro-restoran-menu-demo/')); ?>" class="category-card">
                <div class="category-card-image" style="background: linear-gradient(135deg, #1e293b, #0f172a); display: flex; align-items: center; justify-content: center; font-size: 4rem;">
                    🥩
                </div>
                <div class="category-card-overlay"></div>
                <div class="category-card-content">
                    <h3 class="category-card-title"><?php esc_html_e('Gourmet Bistro & Menü', 'mis360'); ?></h3>
                    <span class="category-card-count">Şefin Spesiyalleri • WhatsApp Sipariş</span>
                </div>
            </a>

        </div>

        <div class="text-center mt-8">
            <a href="<?php echo esc_url(home_url('/prestige-ilan-emlak-listeleme-demo/')); ?>" class="btn btn-outline-dark">
                <?php esc_html_e('Tüm Portföyü Gör', 'mis360'); ?>
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <line x1="5" y1="12" x2="19" y2="12"></line>
                    <polyline points="12 5 19 12 12 19"></polyline>
                </svg>
            </a>
        </div>
    </div>
</section>

<!-- 4. Features Section (Denfora Exact "Neden Denfora" Boxes) -->
<section class="section">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title"><?php esc_html_e('Neden MİS360?', 'mis360'); ?></h2>
            <p class="section-subtitle"><?php esc_html_e('En yüksek kalite, modern tasarım ve müşteri memnuniyeti standartlarına odaklanıyoruz.', 'mis360'); ?></p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            
            <div class="feature-card">
                <div class="feature-card-icon">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"></path>
                    </svg>
                </div>
                <h3 class="feature-card-title"><?php esc_html_e('Premium Kalite', 'mis360'); ?></h3>
                <p class="feature-card-description"><?php esc_html_e('Tüm sistemlerimiz ve hizmetlerimiz en yüksek kalite standartlarında sunulur ve test edilir.', 'mis360'); ?></p>
            </div>

            <div class="feature-card">
                <div class="feature-card-icon">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
                        <circle cx="8.5" cy="8.5" r="1.5"></circle>
                        <polyline points="21 15 16 10 5 21"></polyline>
                    </svg>
                </div>
                <h3 class="feature-card-title"><?php esc_html_e('Modern Tasarım', 'mis360'); ?></h3>
                <p class="feature-card-description"><?php esc_html_e('Kullanıcı deneyimini merkeze alan zamansız şıklık, minimalist formlar ve ultra akıcı arayüz.', 'mis360'); ?></p>
            </div>

            <div class="feature-card">
                <div class="feature-card-icon">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path>
                        <polyline points="9 12 11 14 15 10"></polyline>
                    </svg>
                </div>
                <h3 class="feature-card-title"><?php esc_html_e('Maksimum Güven', 'mis360'); ?></h3>
                <p class="feature-card-description"><?php esc_html_e('Sözleşmeli, kaskolu ve kurumsal güvenceyle çalışan şeffaf hizmet prensipleri.', 'mis360'); ?></p>
            </div>

            <div class="feature-card">
                <div class="feature-card-icon">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <circle cx="12" cy="12" r="10"></circle>
                        <polyline points="12 6 12 12 16 14"></polyline>
                    </svg>
                </div>
                <h3 class="feature-card-title"><?php esc_html_e('7/24 Kesintisiz Destek', 'mis360'); ?></h3>
                <p class="feature-card-description"><?php esc_html_e('İhtiyacınız olan her an tek dokunuşla ulaşabileceğiniz çağrı merkezi ve WhatsApp hattı.', 'mis360'); ?></p>
            </div>

        </div>
    </div>
</section>

<!-- 5. Featured Products / Listings Grid (Denfora Exact Match) -->
<section class="section section-gray">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title"><?php esc_html_e('Öne Çıkan Seçenekler', 'mis360'); ?></h2>
            <p class="section-subtitle"><?php esc_html_e('Mevcut portföyümüzden en çok ilgi gören ürün ve hizmetlerimizi keşfedin.', 'mis360'); ?></p>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            
            <article class="product-card">
                <div class="product-card-image">
                    <span style="font-size: 3rem;">🏢</span>
                </div>
                <div class="product-card-content">
                    <span class="product-card-category"><?php esc_html_e('Rezidans & Konut', 'mis360'); ?></span>
                    <h3 class="product-card-title"><?php esc_html_e('Boğaz Manzaralı 3+1 Akıllı Daire', 'mis360'); ?></h3>
                    <p class="product-card-sku">₺18.500.000 • Beşiktaş</p>
                </div>
            </article>

            <article class="product-card">
                <div class="product-card-image">
                    <span style="font-size: 3rem;">🚘</span>
                </div>
                <div class="product-card-content">
                    <span class="product-card-category"><?php esc_html_e('Prestij Galeri', 'mis360'); ?></span>
                    <h3 class="product-card-title"><?php esc_html_e('2024 Model Hibrit SUV Prestij Paket', 'mis360'); ?></h3>
                    <p class="product-card-sku">₺2.450.000 • Hatasız</p>
                </div>
            </article>

            <article class="product-card">
                <div class="product-card-image">
                    <span style="font-size: 3rem;">🚨</span>
                </div>
                <div class="product-card-content">
                    <span class="product-card-category"><?php esc_html_e('Yol Yardım', 'mis360'); ?></span>
                    <h3 class="product-card-title"><?php esc_html_e('Binek & Hafif Ticari Acil Çekici', 'mis360'); ?></h3>
                    <p class="product-card-sku">15 Dk Varış • 7/24 Çağrı</p>
                </div>
            </article>

            <article class="product-card">
                <div class="product-card-image">
                    <span style="font-size: 3rem;">🥩</span>
                </div>
                <div class="product-card-content">
                    <span class="product-card-category"><?php esc_html_e('Gourmet Menü', 'mis360'); ?></span>
                    <h3 class="product-card-title"><?php esc_html_e('Fırınlanmış Kuzu Gerdan Spesiyali', 'mis360'); ?></h3>
                    <p class="product-card-sku">₺480 • Şefin Seçimi</p>
                </div>
            </article>

        </div>

        <div class="text-center mt-8">
            <a href="<?php echo esc_url(home_url('/prestige-ilan-emlak-listeleme-demo/')); ?>" class="btn btn-primary">
                <?php esc_html_e('Tümünü Gör →', 'mis360'); ?>
            </a>
        </div>
    </div>
</section>

<!-- 6. Dark CTA Section (Denfora Exact Match) -->
<section class="section section-dark">
    <div class="container">
        <div class="text-center" style="max-width: 720px; margin: 0 auto;">
            <h2 class="section-title" style="color: var(--color-white);">
                <?php esc_html_e('Hayalinizdeki Proje İçin Hazır mısınız?', 'mis360'); ?>
            </h2>
            <p class="section-subtitle" style="color: var(--color-gray-400);">
                <?php esc_html_e('Kişisel danışmanlık ve teklif için bizimle doğrudan iletişime geçin veya WhatsApp üzerinden anında yazın.', 'mis360'); ?>
            </p>
            <div class="flex flex-wrap gap-4 justify-center mt-8">
                <a href="tel:<?php echo esc_attr($clean_phone); ?>" class="btn btn-primary btn-lg">
                    <?php esc_html_e('İletişime Geç', 'mis360'); ?>
                </a>
                <a href="https://wa.me/<?php echo esc_attr($whatsapp); ?>?text=<?php echo rawurlencode('Merhaba, web siteniz üzerinden ulaşıyorum:'); ?>" class="btn btn-whatsapp btn-lg" target="_blank" rel="noopener noreferrer">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347z"/>
                    </svg>
                    <span>WhatsApp</span>
                </a>
            </div>
        </div>
    </div>
</section>

<?php
get_footer();
