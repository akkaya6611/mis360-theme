<?php
/**
 * Template Name: Haberler, Blog & Galeri
 * Description: Beyzade Et & Balık Restaurant için Haberler, Duyurular, Lezzet Blogu ve Fotoğraf Galerisi Şablonu.
 *
 * @package MİS360
 * @since 1.0.0
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

<main id="primary" class="site-main blog-gallery-page">

    <!-- 1. Sayfa Başlığı ve Hero Alanı (Denfora 1:1 Architecture) -->
    <header class="page-hero-banner" style="background: linear-gradient(135deg, rgba(17, 24, 39, 0.95) 0%, rgba(17, 24, 39, 0.88) 100%), url('https://beyzadeetbalikrestaurant.com.tr/wp-content/uploads/2026/05/restaurant.jpg') center/cover no-repeat;">
        <div class="container">
            <div class="page-hero-content text-center">
                <nav class="page-breadcrumbs" aria-label="Sayfa Yolu">
                    <a href="<?php echo esc_url(home_url('/')); ?>">Ana Sayfa</a>
                    <span class="sep">/</span>
                    <span class="current">Haberler & Galeri</span>
                </nav>

                <div class="hero-badge" style="margin-top: 14px;">
                    <span>BEYZADE ET & BALIK • GÜNCEL PAYLAŞIMLAR</span>
                </div>

                <h1 class="page-hero-title">
                    Haberler, Lezzet Blogu & Fotoğraf Galerisi
                </h1>

                <p class="page-hero-subtitle">
                    Sarıkaya'daki lezzet durağımızdan en güncel duyurular, meşe kömüründe pişen etlerimizin sırları, etkinliklerimiz ve restoranımızdan en özel kareler.
                </p>
            </div>
        </div>
    </header>

    <!-- 2. Filtreleme Sekmeleri & İçerik Izgarası -->
    <section class="section" style="background: var(--color-gray-50); padding: 50px 0 80px;">
        <div class="container">

            <!-- Filtre Sekmeleri -->
            <div class="gallery-filter-wrapper text-center mb-10">
                <div class="gallery-filter-tabs" id="galleryFilterTabs">
                    <button type="button" class="gallery-tab-btn active" data-filter="all">
                        ✨ Tümü (Hepsi)
                    </button>
                    <button type="button" class="gallery-tab-btn" data-filter="haber">
                        📰 Haberler & Duyurular
                    </button>
                    <button type="button" class="gallery-tab-btn" data-filter="blog">
                        🥩 Lezzet Blogu
                    </button>
                    <button type="button" class="gallery-tab-btn" data-filter="galeri">
                        📸 Fotoğraf Galerisi
                    </button>
                </div>
            </div>

            <!-- Kartlar Izgarası -->
            <div class="gallery-grid" id="galleryGrid">

                <!-- 1. İçerik (Haber): Bahçe Yenilendi -->
                <article class="gallery-card" data-category="haber">
                    <div class="gallery-card-thumb">
                        <img src="https://beyzadeetbalikrestaurant.com.tr/wp-content/uploads/2026/05/restaurant.jpg" alt="Açık Hava Bahçe Bölümü" loading="lazy">
                        <span class="gallery-card-badge badge-haber">Haber & Duyuru</span>
                    </div>
                    <div class="gallery-card-body">
                        <div class="gallery-card-meta">
                            <span>📅 15 Mayıs 2026</span>
                            <span class="sep">•</span>
                            <span>👤 Beyzade Mutfak Ekibi</span>
                        </div>
                        <h3 class="gallery-card-title">
                            Sarıkaya'da Bahar ve Yaz Sezonuna Özel Açık Hava Bahçe Bölümümüz Hizmetinizde
                        </h3>
                        <p class="gallery-card-excerpt">
                            Aileler, misafirler ve çocuklar için özel olarak hazırlanan ferah açık hava bahçe salonumuz, konforlu masaları ve mama sandalyesi desteğiyle yeniden düzenlendi.
                        </p>
                        <div class="gallery-card-footer">
                            <span class="gallery-link">Detayları İncele →</span>
                        </div>
                    </div>
                </article>

                <!-- 2. İçerik (Blog): Meşe Kömüründe Kebap Sırları -->
                <article class="gallery-card" data-category="blog">
                    <div class="gallery-card-thumb">
                        <img src="https://beyzadeetbalikrestaurant.com.tr/wp-content/uploads/2026/05/adana.jpg" alt="Meşe Kömüründe Kebap Sanatı" loading="lazy">
                        <span class="gallery-card-badge badge-blog">Lezzet Rehberi</span>
                    </div>
                    <div class="gallery-card-body">
                        <div class="gallery-card-meta">
                            <span>📅 12 Mayıs 2026</span>
                            <span class="sep">•</span>
                            <span>👤 Usta Başı Selim Usta</span>
                        </div>
                        <h3 class="gallery-card-title">
                            Hakiki Meşe Kömüründe Kebap Pişirmenin Püf Noktaları ve Et Dinlendirme Sanatı
                        </h3>
                        <p class="gallery-card-excerpt">
                            Usta ellerin zırhtan geçirdiği etlerin meşe kömürü közünde suyunu kaybetmeden lokum gibi pişirilmesinin püf noktalarını derledik.
                        </p>
                        <div class="gallery-card-footer">
                            <span class="gallery-link">Yazıyı Oku →</span>
                        </div>
                    </div>
                </article>

                <!-- 3. İçerik (Galeri): Taş Fırın Pideleri -->
                <article class="gallery-card gallery-item-clickable" data-category="galeri" data-full-image="https://beyzadeetbalikrestaurant.com.tr/wp-content/uploads/2026/05/pide.jpg" data-caption="Taş Fırından Yeni Çıkan Çıtır Kıymalı & Kuşbaşılı Pide Sunumu">
                    <div class="gallery-card-thumb">
                        <img src="https://beyzadeetbalikrestaurant.com.tr/wp-content/uploads/2026/05/pide.jpg" alt="Taş Fırın Pide" loading="lazy">
                        <span class="gallery-card-badge badge-galeri">📸 Fotoğraf</span>
                        <div class="gallery-overlay-icon">
                            <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <circle cx="11" cy="11" r="8"></circle>
                                <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                                <line x1="11" y1="8" x2="11" y2="14"></line>
                                <line x1="8" y1="11" x2="14" y2="11"></line>
                            </svg>
                        </div>
                    </div>
                    <div class="gallery-card-body">
                        <div class="gallery-card-meta">
                            <span>📸 Fırından Sıcak Kareler</span>
                        </div>
                        <h3 class="gallery-card-title">
                            Taş Fırınımızdan Yeni Çıkan Çıtır Kıymalı & Kuşbaşılı Pide
                        </h3>
                        <p class="gallery-card-excerpt">
                            Hakiki taş fırın ateşinde incecik açılan hamur ve bol harçla hazırlanan özel pidelerimiz.
                        </p>
                    </div>
                </article>

                <!-- 4. İçerik (Haber): Sabah 06:00 Sıcak Çorbalar -->
                <article class="gallery-card" data-category="haber">
                    <div class="gallery-card-thumb">
                        <img src="https://beyzadeetbalikrestaurant.com.tr/wp-content/uploads/2026/05/corba.jpg" alt="Sabah Sıcak Çorbaları" loading="lazy">
                        <span class="gallery-card-badge badge-haber">Haber & Duyuru</span>
                    </div>
                    <div class="gallery-card-body">
                        <div class="gallery-card-meta">
                            <span>📅 08 Mayıs 2026</span>
                            <span class="sep">•</span>
                            <span>👤 Beyzade Ekibi</span>
                        </div>
                        <h3 class="gallery-card-title">
                            Sabah 06:00'da Açılan Kapılarımız: Sarıkaya'nın Güne Başlama Geleneği
                        </h3>
                        <p class="gallery-card-excerpt">
                            Sarıkaya'da sabahın ilk ışıklarıyla birlikte kaynayan mercimek, kuzu kelle paça ve beyran çorbalarımız sıcacık lavaşlarla güne enerji katıyor.
                        </p>
                        <div class="gallery-card-footer">
                            <span class="gallery-link">Detayları İncele →</span>
                        </div>
                    </div>
                </article>

                <!-- 5. İçerik (Blog): Toprak Güveçte Kuzu Tandır -->
                <article class="gallery-card" data-category="blog">
                    <div class="gallery-card-thumb">
                        <img src="https://beyzadeetbalikrestaurant.com.tr/wp-content/uploads/2026/05/tandir.jpg" alt="Toprak Güveçte Kuzu Tandır" loading="lazy">
                        <span class="gallery-card-badge badge-blog">Lezzet Rehberi</span>
                    </div>
                    <div class="gallery-card-body">
                        <div class="gallery-card-meta">
                            <span>📅 02 Mayıs 2026</span>
                            <span class="sep">•</span>
                            <span>👤 Mutfak Şefi</span>
                        </div>
                        <h3 class="gallery-card-title">
                            Toprak Güveçte Kuzu Tandır ve Ağır Ateşte Kendi Yağında Pişen Lezzetler
                        </h3>
                        <p class="gallery-card-excerpt">
                            Yerli kuzu etlerinin taş fırında saatlerce dinlendirilerek kemiğinden ayrılacak yumuşaklığa ulaşmasının aşamalarını inceledik.
                        </p>
                        <div class="gallery-card-footer">
                            <span class="gallery-link">Yazıyı Oku →</span>
                        </div>
                    </div>
                </article>

                <!-- 6. İçerik (Galeri): Günlük Taze Balık Reyonu -->
                <article class="gallery-card gallery-item-clickable" data-category="galeri" data-full-image="https://beyzadeetbalikrestaurant.com.tr/wp-content/uploads/2026/05/balik.jpg" data-caption="Günlük Taze Balık Reyonu - Çipura, Levrek ve Mevsim Balıkları">
                    <div class="gallery-card-thumb">
                        <img src="https://beyzadeetbalikrestaurant.com.tr/wp-content/uploads/2026/05/balik.jpg" alt="Taze Balık Reyonu" loading="lazy">
                        <span class="gallery-card-badge badge-galeri">📸 Fotoğraf</span>
                        <div class="gallery-overlay-icon">
                            <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <circle cx="11" cy="11" r="8"></circle>
                                <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                                <line x1="11" y1="8" x2="11" y2="14"></line>
                                <line x1="8" y1="11" x2="14" y2="11"></line>
                            </svg>
                        </div>
                    </div>
                    <div class="gallery-card-body">
                        <div class="gallery-card-meta">
                            <span>📸 Taze Balık Reyonu</span>
                        </div>
                        <h3 class="gallery-card-title">
                            Mevsimin En Taze Çipura, Levrek ve Balık Çeşitleri
                        </h3>
                        <p class="gallery-card-excerpt">
                            Izgara ve tava seçenekleriyle günlük taze deniz ürünleri menümüz Sarıkaya'da balık severleri bekliyor.
                        </p>
                    </div>
                </article>

                <!-- 7. İçerik (Galeri): Özel Ziyafet Masaları -->
                <article class="gallery-card gallery-item-clickable" data-category="galeri" data-full-image="https://beyzadeetbalikrestaurant.com.tr/wp-content/uploads/2026/05/masalar.jpg" data-caption="Geniş Aile Yemekleri ve Özel Toplantılar İçin Hazırlanan Masalarımız">
                    <div class="gallery-card-thumb">
                        <img src="https://beyzadeetbalikrestaurant.com.tr/wp-content/uploads/2026/05/masalar.jpg" alt="Ziyafet Masası" loading="lazy">
                        <span class="gallery-card-badge badge-galeri">📸 Fotoğraf</span>
                        <div class="gallery-overlay-icon">
                            <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <circle cx="11" cy="11" r="8"></circle>
                                <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                                <line x1="11" y1="8" x2="11" y2="14"></line>
                                <line x1="8" y1="11" x2="14" y2="11"></line>
                            </svg>
                        </div>
                    </div>
                    <div class="gallery-card-body">
                        <div class="gallery-card-meta">
                            <span>📸 Restoran Atmosferi</span>
                        </div>
                        <h3 class="gallery-card-title">
                            Geniş Aile Yemekleri ve Toplu Davet Masalarımız
                        </h3>
                        <p class="gallery-card-excerpt">
                            Özel gün ve kutlamalarınız için özenle hazırlanan zengin ikramlı sofralarımız.
                        </p>
                    </div>
                </article>

                <!-- 8. İçerik (Blog): Közde Sıcak Künefe -->
                <article class="gallery-card" data-category="blog">
                    <div class="gallery-card-thumb">
                        <img src="https://beyzadeetbalikrestaurant.com.tr/wp-content/uploads/2026/05/kunefe.jpg" alt="Közde Sıcak Künefe" loading="lazy">
                        <span class="gallery-card-badge badge-blog">Lezzet Rehberi</span>
                    </div>
                    <div class="gallery-card-body">
                        <div class="gallery-card-meta">
                            <span>📅 28 Nisan 2026</span>
                            <span class="sep">•</span>
                            <span>👤 Tatlı Ustası</span>
                        </div>
                        <h3 class="gallery-card-title">
                            Hakiki Hatay Peyniriyle Közde Ağır Ağır Pişen Sıcak Künefe Ziyafeti
                        </h3>
                        <p class="gallery-card-excerpt">
                            Çıtır kadayıf telleri arasında eriyen peynir ve tam kıvamında sıcak şerbet... Yemeğinizi taçlandıran özel tatlılarımızın hazırlanış serüveni.
                        </p>
                        <div class="gallery-card-footer">
                            <span class="gallery-link">Yazıyı Oku →</span>
                        </div>
                    </div>
                </article>

            </div>

            <!-- Rezervasyon & İletişim Davet Kutusu (CTA) -->
            <div class="gallery-cta-box text-center mt-12">
                <div class="cta-inner">
                    <span class="cta-tag">BEYZADE AİLESİ</span>
                    <h2 class="cta-title">Lezzetlerimizi Canlı Deneyimleyin</h2>
                    <p class="cta-desc">
                        Sarıkaya'da meşe kömürü ateşi ve samimi aile ortamıyla sizleri ağırlamaktan mutluluk duyuyoruz. Masanızı şimdiden ayırtın!
                    </p>
                    <div class="cta-actions">
                        <a href="tel:<?php echo esc_attr($clean_phone); ?>" class="btn btn-dark btn-md">
                            📞 <?php echo esc_html($phone); ?> (Hemen Ara)
                        </a>
                        <a href="https://wa.me/<?php echo esc_attr($whatsapp); ?>?text=<?php echo rawurlencode('Merhaba Beyzade Restaurant, masa ayırtmak istiyorum:'); ?>" class="btn btn-whatsapp btn-md" target="_blank" rel="noopener noreferrer">
                            🟢 WhatsApp İle Masa Ayırt
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </section>

</main>

<!-- Lightbox Modal (Fotoğrafları Büyütme) -->
<div class="gallery-lightbox" id="galleryLightbox" aria-hidden="true" role="dialog">
    <div class="lightbox-backdrop" id="lightboxBackdrop"></div>
    <div class="lightbox-container">
        <button type="button" class="lightbox-close" id="lightboxClose" aria-label="Kapat">✕</button>
        <div class="lightbox-media-wrapper">
            <img src="" alt="" class="lightbox-img" id="lightboxImg">
        </div>
        <p class="lightbox-caption" id="lightboxCaption"></p>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // 1. Kategori Filtreleme
    const filterButtons = document.querySelectorAll('.gallery-tab-btn');
    const cards = document.querySelectorAll('.gallery-card');

    filterButtons.forEach(btn => {
        btn.addEventListener('click', function() {
            filterButtons.forEach(b => b.classList.remove('active'));
            this.classList.add('active');

            const filter = this.getAttribute('data-filter');

            cards.forEach(card => {
                const cardCat = card.getAttribute('data-category');
                if (filter === 'all' || cardCat === filter) {
                    card.style.display = 'flex';
                    setTimeout(() => {
                        card.style.opacity = '1';
                        card.style.transform = 'translateY(0)';
                    }, 50);
                } else {
                    card.style.opacity = '0';
                    card.style.transform = 'translateY(10px)';
                    setTimeout(() => {
                        card.style.display = 'none';
                    }, 200);
                }
            });
        });
    });

    // 2. Fotoğraf Lightbox
    const lightbox = document.getElementById('galleryLightbox');
    const lightboxImg = document.getElementById('lightboxImg');
    const lightboxCaption = document.getElementById('lightboxCaption');
    const lightboxClose = document.getElementById('lightboxClose');
    const lightboxBackdrop = document.getElementById('lightboxBackdrop');
    const clickableItems = document.querySelectorAll('.gallery-item-clickable');

    clickableItems.forEach(item => {
        item.addEventListener('click', function() {
            const fullImg = this.getAttribute('data-full-image');
            const caption = this.getAttribute('data-caption');

            lightboxImg.src = fullImg;
            lightboxImg.alt = caption;
            lightboxCaption.textContent = caption;

            lightbox.classList.add('open');
            lightbox.setAttribute('aria-hidden', 'false');
            document.body.style.overflow = 'hidden';
        });
    });

    function closeLightbox() {
        lightbox.classList.remove('open');
        lightbox.setAttribute('aria-hidden', 'true');
        document.body.style.overflow = '';
        setTimeout(() => {
            lightboxImg.src = '';
        }, 300);
    }

    if (lightboxClose) lightboxClose.addEventListener('click', closeLightbox);
    if (lightboxBackdrop) lightboxBackdrop.addEventListener('click', closeLightbox);
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape' && lightbox.classList.contains('open')) {
            closeLightbox();
        }
    });
});
</script>

<?php
get_footer();
