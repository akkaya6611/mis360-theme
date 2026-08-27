<?php
/**
 * Template Name: Haberler, Blog & Galeri
 * Description: WordPress Yazılar (Posts) blog altyapısını kullanan dinamik Haber, Blog ve Galeri şablonu.
 *
 * @package MİS360
 * @since 1.0.0
 */

declare(strict_types=1);

if (!defined('ABSPATH')) {
    exit;
}

get_header();

$phone       = '0535 830 93 07';
$clean_phone = '+905358309307';
$whatsapp    = '905358309307';

// Aktif Kategori Filtresi & Sayfalama
$current_cat = isset($_GET['kategori']) ? sanitize_key($_GET['kategori']) : 'all';
$paged       = (get_query_var('paged')) ? get_query_var('paged') : ((get_query_var('page')) ? get_query_var('page') : 1);

$query_args = [
    'post_type'      => 'post',
    'post_status'    => 'publish',
    'posts_per_page' => 12,
    'paged'          => $paged,
];

if ($current_cat !== 'all' && !empty($current_cat)) {
    $query_args['category_name'] = $current_cat;
}

$blog_query = new WP_Query($query_args);
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

                <?php if (current_user_can('edit_posts')) : ?>
                    <div style="margin-top: 20px;">
                        <a href="<?php echo esc_url(admin_url('post-new.php')); ?>" class="btn btn-primary btn-sm" target="_blank" rel="noopener noreferrer">
                            ✍️ Yeni Yazı / Galeri Ekle (WP-Admin)
                        </a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </header>

    <!-- 2. Dinamik Blog ve Galeri Altyapısı -->
    <section class="section" style="background: var(--color-gray-50); padding: 50px 0 80px;">
        <div class="container">

            <!-- Dinamik Kategori Filtreleme Sekmeleri -->
            <div class="gallery-filter-wrapper text-center mb-10">
                <div class="gallery-filter-tabs" id="galleryFilterTabs">
                    <a href="<?php echo esc_url(remove_query_arg('kategori')); ?>" class="gallery-tab-btn <?php echo ($current_cat === 'all') ? 'active' : ''; ?>" data-filter="all">
                        ✨ Tümü (Hepsi)
                    </a>
                    <a href="<?php echo esc_url(add_query_arg('kategori', 'haberler')); ?>" class="gallery-tab-btn <?php echo ($current_cat === 'haberler') ? 'active' : ''; ?>" data-filter="haberler">
                        📰 Haberler & Duyurular
                    </a>
                    <a href="<?php echo esc_url(add_query_arg('kategori', 'blog')); ?>" class="gallery-tab-btn <?php echo ($current_cat === 'blog') ? 'active' : ''; ?>" data-filter="blog">
                        🥩 Lezzet Blogu
                    </a>
                    <a href="<?php echo esc_url(add_query_arg('kategori', 'galeri')); ?>" class="gallery-tab-btn <?php echo ($current_cat === 'galeri') ? 'active' : ''; ?>" data-filter="galeri">
                        📸 Fotoğraf Galerisi
                    </a>
                </div>
            </div>

            <!-- WordPress Yazı Döngüsü (WP_Query Loop) -->
            <?php if ($blog_query->have_posts()) : ?>
                <div class="gallery-grid" id="galleryGrid">
                    <?php
                    while ($blog_query->have_posts()) :
                        $blog_query->the_post();

                        // Kategori Tespiti
                        $post_cats   = get_the_category();
                        $first_cat   = !empty($post_cats) ? $post_cats[0] : null;
                        $cat_slug    = $first_cat ? $first_cat->slug : 'genel';
                        $cat_name    = $first_cat ? $first_cat->name : 'Genel';

                        // Rozet ve Filtre Grubu Sınıfı
                        $badge_class  = 'badge-blog';
                        $filter_group = 'blog';

                        if (strpos($cat_slug, 'haber') !== false) {
                            $badge_class  = 'badge-haber';
                            $filter_group = 'haberler';
                        } elseif (strpos($cat_slug, 'galeri') !== false) {
                            $badge_class  = 'badge-galeri';
                            $filter_group = 'galeri';
                        }

                        // Görsel Belirleme (Öne çıkan görsel > Harici meta > Varsayılan)
                        $thumb_url = '';
                        if (has_post_thumbnail()) {
                            $thumb_url = get_the_post_thumbnail_url(get_the_ID(), 'large');
                        } else {
                            $meta_thumb = get_post_meta(get_the_ID(), '_mis360_external_thumb', true);
                            if ($meta_thumb) {
                                $thumb_url = $meta_thumb;
                            } else {
                                if ($filter_group === 'galeri') {
                                    $thumb_url = 'https://beyzadeetbalikrestaurant.com.tr/wp-content/uploads/2026/05/restaurant.jpg';
                                } elseif ($filter_group === 'haberler') {
                                    $thumb_url = 'https://beyzadeetbalikrestaurant.com.tr/wp-content/uploads/2026/05/restaurant.jpg';
                                } else {
                                    $thumb_url = 'https://beyzadeetbalikrestaurant.com.tr/wp-content/uploads/2026/05/adana.jpg';
                                }
                            }
                        }
                        ?>
                        <article class="gallery-card filter-item" data-category="<?php echo esc_attr($filter_group); ?>" id="post-<?php the_ID(); ?>">
                            
                            <div class="gallery-card-thumb">
                                <img src="<?php echo esc_url($thumb_url); ?>" alt="<?php the_title_attribute(); ?>" loading="lazy">
                                <span class="gallery-card-badge <?php echo esc_attr($badge_class); ?>">
                                    <?php echo esc_html($cat_name); ?>
                                </span>
                                <button type="button" class="gallery-thumb-overlay" aria-label="<?php esc_attr_e('Fotoğrafı Büyüt', 'mis360'); ?>" onclick="openLightbox('<?php echo esc_url($thumb_url); ?>', '<?php echo esc_attr(get_the_title()); ?>')">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                                        <circle cx="11" cy="11" r="8"></circle>
                                        <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                                        <line x1="11" y1="8" x2="11" y2="14"></line>
                                        <line x1="8" y1="11" x2="14" y2="11"></line>
                                    </svg>
                                </button>
                            </div>

                            <div class="gallery-card-body">
                                <div class="gallery-card-meta">
                                    <span>📅 <?php echo esc_html(get_the_date('j F Y')); ?></span>
                                    <span class="sep">•</span>
                                    <span>👤 <?php echo esc_html(get_the_author()); ?></span>
                                </div>

                                <h3 class="gallery-card-title">
                                    <a href="<?php the_permalink(); ?>" style="color: inherit; text-decoration: none;">
                                        <?php the_title(); ?>
                                    </a>
                                </h3>

                                <div class="gallery-card-excerpt">
                                    <p><?php echo esc_html(wp_trim_words(get_the_excerpt(), 20, '...')); ?></p>
                                </div>

                                <div class="gallery-card-footer">
                                    <a href="<?php the_permalink(); ?>" class="gallery-link">
                                        Yazıyı Oku & Detaylar →
                                    </a>
                                </div>
                            </div>

                        </article>
                    <?php endwhile; ?>
                </div>

                <!-- Sayfalama (Pagination) -->
                <?php if ($blog_query->max_num_pages > 1) : ?>
                    <div class="mis-pagination-wrapper text-center mt-10">
                        <?php
                        echo paginate_links([
                            'total'        => $blog_query->max_num_pages,
                            'current'      => $paged,
                            'prev_text'    => '← Önceki',
                            'next_text'    => 'Sonraki →',
                            'type'         => 'list',
                        ]);
                        ?>
                    </div>
                <?php endif; ?>

                <?php wp_reset_postdata(); ?>

            <?php else : ?>
                <!-- Yazı Bulunamadı Durumu -->
                <div class="text-center py-12" style="background: #ffffff; padding: 48px 24px; border-radius: 16px; border: 1px solid var(--color-gray-200); max-width: 600px; margin: 0 auto;">
                    <span style="font-size: 40px; display: block; margin-bottom: 12px;">📋</span>
                    <h3 style="font-size: 20px; font-weight: 800; color: #1a1a1a; margin-bottom: 8px;">
                        Bu Kategoride Henüz Yazı Yayınlanmadı
                    </h3>
                    <p style="color: var(--color-gray-500); font-size: 14px; margin-bottom: 20px;">
                        WordPress yönetim panelinden "Yazılar > Yeni Ekle" adımıyla bu kategoriye kolayca yeni haber, lezzet yazısı veya fotoğraf ekleyebilirsiniz.
                    </p>
                    <div style="display: flex; gap: 10px; justify-content: center; flex-wrap: wrap;">
                        <a href="<?php echo esc_url(remove_query_arg('kategori')); ?>" class="btn btn-outline-dark btn-sm">
                            Tüm Yazıları Göster
                        </a>
                        <?php if (current_user_can('edit_posts')) : ?>
                            <a href="<?php echo esc_url(admin_url('post-new.php')); ?>" class="btn btn-primary btn-sm">
                                ✍️ Yeni Yazı Ekle
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endif; ?>

            <!-- Alt CTA: Rezervasyon ve İletişim -->
            <div class="blog-gallery-cta mt-16 text-center" style="background: #ffffff; border: 1px solid var(--color-gray-200); border-radius: 16px; padding: 36px 24px; max-width: 780px; margin: 60px auto 0;">
                <span style="font-size: 12px; font-weight: 800; color: var(--color-primary); letter-spacing: 0.15em; text-transform: uppercase;">
                    BEYZADE ET & BALIK RESTAURANT
                </span>
                <h3 style="font-size: 24px; font-weight: 800; color: var(--color-black); margin: 6px 0 10px;">
                    Bu Eşsiz Lezzetleri Yerinde Tatmak İster Misiniz?
                </h3>
                <p style="color: var(--color-gray-600); font-size: 14px; margin-bottom: 24px;">
                    Sarıkaya'da meşe kömürü ateşi ve usta ellerce hazırlanan özel menümüz için masanızı şimdiden ayırtın.
                </p>
                <div style="display: flex; justify-content: center; gap: 14px; flex-wrap: wrap;">
                    <a href="<?php echo esc_url(home_url('/#reservation')); ?>" class="btn btn-primary btn-md">
                        Masa Rezervasyonu Yap →
                    </a>
                    <a href="https://wa.me/<?php echo esc_attr($whatsapp); ?>" target="_blank" rel="noopener noreferrer" class="btn btn-whatsapp btn-md">
                        💬 WhatsApp İle Rezervasyon
                    </a>
                    <a href="tel:<?php echo esc_attr($clean_phone); ?>" class="btn btn-outline-dark btn-md">
                        📞 <?php echo esc_html($phone); ?>
                    </a>
                </div>
            </div>

        </div>
    </section>

    <!-- 3. Fotoğraf Büyütme Modalı (Lightbox) -->
    <div class="gallery-lightbox" id="galleryLightbox" role="dialog" aria-modal="true" aria-hidden="true" onclick="if(event.target === this) closeLightbox();">
        <div class="lightbox-content">
            <button type="button" class="lightbox-close" onclick="closeLightbox()" aria-label="Kapat">✕</button>
            <img src="" alt="" id="lightboxImg" class="lightbox-image">
            <div class="lightbox-caption" id="lightboxCaption"></div>
        </div>
    </div>

</main>

<script>
// Işık Kutusu (Lightbox) Fonksiyonları
function openLightbox(imgSrc, caption) {
    const lb = document.getElementById('galleryLightbox');
    const img = document.getElementById('lightboxImg');
    const cap = document.getElementById('lightboxCaption');
    if (!lb || !img) return;

    img.src = imgSrc;
    img.alt = caption || 'Beyzade Restaurant';
    if (cap) cap.textContent = caption || '';

    lb.classList.add('active');
    lb.setAttribute('aria-hidden', 'false');
    document.body.style.overflow = 'hidden';
}

function closeLightbox() {
    const lb = document.getElementById('galleryLightbox');
    if (!lb) return;
    lb.classList.remove('active');
    lb.setAttribute('aria-hidden', 'true');
    document.body.style.overflow = '';
}

document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') {
        closeLightbox();
    }
});

// İstemci Tarafı Anlık Kategori Filtreleme
document.addEventListener('DOMContentLoaded', function() {
    const tabs = document.querySelectorAll('.gallery-tab-btn');
    const items = document.querySelectorAll('.filter-item');

    tabs.forEach(tab => {
        tab.addEventListener('click', function(e) {
            const filter = this.getAttribute('data-filter');
            if (!filter) return;

            e.preventDefault();

            tabs.forEach(t => t.classList.remove('active'));
            this.classList.add('active');

            const newUrl = filter === 'all' 
                ? window.location.pathname 
                : window.location.pathname + '?kategori=' + encodeURIComponent(filter);
            window.history.pushState({ filter: filter }, '', newUrl);

            items.forEach(item => {
                const cat = item.getAttribute('data-category');
                if (filter === 'all' || cat === filter) {
                    item.style.display = '';
                    item.style.opacity = '0';
                    setTimeout(() => item.style.opacity = '1', 50);
                } else {
                    item.style.display = 'none';
                }
            });
        });
    });
});
</script>

<?php
get_footer();
