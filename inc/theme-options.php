<?php
/**
 * MİS360 Tema Ayarları
 * 
 * @package MİS360
 */

declare(strict_types=1);

if (!defined('ABSPATH')) {
    exit;
}

// 1. Sol Menüye MİS360 Ayarlar Ana Menüsü ve Alt Menüleri Ekle
add_action('admin_menu', 'mis360_theme_options_menu');
function mis360_theme_options_menu(): void {
    // Ana Menü (Tıklanınca varsayılan olarak Popup Ayarlarını açar)
    add_menu_page(
        'MİS360 Ayarlar',
        'MİS360 Ayarlar',
        'manage_options',
        'mis360-settings',
        'mis360_settings_page_popup',
        'dashicons-art',
        59
    );

    // Alt Menü 1: Popup Ayarları (Ana menü ile aynı slug verilerek varsayılan sayfa yapılır)
    add_submenu_page(
        'mis360-settings',
        'Popup Ayarları',
        'Popup Ayarları',
        'manage_options',
        'mis360-settings',
        'mis360_settings_page_popup'
    );

    // Alt Menü 2: Slider Ayarları
    add_submenu_page(
        'mis360-settings',
        'Slider Ayarları',
        'Slider Ayarları',
        'manage_options',
        'mis360-slider',
        'mis360_settings_page_slider'
    );

    // Alt Menü 3: Görünüm Ayarlarını Buraya Taşı (Menüler)
    add_submenu_page(
        'mis360-settings',
        'Menü Ayarları',
        'Menü Ayarları',
        'manage_options',
        'nav-menus.php'
    );

    // Alt Menü 4: Görünüm Ayarlarını Buraya Taşı (Bileşenler/Widget)
    add_submenu_page(
        'mis360-settings',
        'Bileşenler',
        'Bileşenler',
        'manage_options',
        'widgets.php'
    );

    // Alt Menü 4: Görünüm Ayarlarını Buraya Taşı (Canlı Özelleştirici)
    add_submenu_page(
        'mis360-settings',
        'Tema Özelleştirici',
        'Tema Özelleştirici',
        'manage_options',
        'customize.php'
    );

    // Alt Menü 4.5: SEO & GEO Ayarları
    add_submenu_page(
        'mis360-settings',
        'SEO & GEO Ayarları',
        'SEO & GEO Ayarları',
        'manage_options',
        'mis360-seo-settings',
        'mis360_settings_page_seo_data'
    );

    // Alt Menü 5: SEO Sayfa Üretici
    add_submenu_page(
        'mis360-settings',
        'SEO Sayfa Üretici',
        'SEO Sayfa Üretici',
        'manage_options',
        'mis360-seo-generator',
        'mis360_settings_page_seo_generator'
    );

    // Alt Menü 6: Lisans Ayarları
    add_submenu_page(
        'mis360-settings',
        'Lisans Ayarları',
        'Lisans Ayarları',
        'manage_options',
        'mis360-license',
        'mis360_settings_page_license'
    );
}

// 2. Ayarları WordPress'e Kaydet
add_action('admin_init', 'mis360_register_settings');
function mis360_register_settings(): void {
    // Popup ayarları
    register_setting('mis360_popup_group', 'mis360_intro_enabled');
    register_setting('mis360_popup_group', 'mis360_intro_video_url');
    
    // Slider ayarları
    register_setting('mis360_slider_group', 'mis360_slider_enabled');
    register_setting('mis360_slider_group', 'mis360_slider_images', [
        'type' => 'array',
        'sanitize_callback' => 'mis360_sanitize_url_array'
    ]);

    // SEO & GEO Verileri
    $seo_fields = ['business_name', 'description', 'keywords', 'phone', 'address', 'rating', 'review_count'];
    foreach ($seo_fields as $field) {
        register_setting('mis360_seo_data_group', 'mis360_seo_' . $field);
    }

    // Lisans ayarları
    register_setting('mis360_license_group', 'mis360_license_key');
}

// Güvenli URL Array Temizleyicisi
function mis360_sanitize_url_array($input) {
    $clean = [];
    if (is_array($input)) {
        foreach ($input as $url) {
            if (!empty(trim($url))) {
                $clean[] = esc_url_raw($url);
            }
        }
    }
    return $clean;
}

// 3A. Popup Ayarları Sayfası (HTML)
function mis360_settings_page_popup(): void {
    if (!current_user_can('manage_options')) return;

    $intro_enabled = get_option('mis360_intro_enabled', '1');
    $intro_video_url = get_option('mis360_intro_video_url', 'https://beyzadeetbalikrestaurant.com.tr/wp-content/uploads/intro.mp4');
    ?>
    <div class="wrap">
        <h1>🎬 MİS360 - Popup Ayarları</h1>
        <hr style="margin-bottom: 20px;">
        
        <form method="post" action="options.php">
            <?php settings_fields('mis360_popup_group'); ?>
            
            <div style="background: #fff; padding: 20px; border: 1px solid #ccd0d4; border-radius: 8px; max-width: 800px; box-shadow: 0 1px 1px rgba(0,0,0,.04);">
                <h2 style="margin-top: 0; color: #1e293b;">Video Intro (Ana Sayfa)</h2>
                <p style="color: #64748b; font-size: 14px;">Ana sayfaya ilk giren ziyaretçilere gösterilecek tam ekran intro videosunun ayarlarını buradan yapabilirsiniz.</p>
                
                <table class="form-table" role="presentation">
                    <tr>
                        <th scope="row">Popup Açık/Kapalı</th>
                        <td>
                            <label>
                                <input type="checkbox" name="mis360_intro_enabled" value="1" <?php checked('1', $intro_enabled); ?>>
                                <strong style="color: #16a34a;">Açık:</strong> Ana sayfada video intro gösterilsin
                            </label>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><label for="mis360_intro_video_url">Video Bağlantısı (URL)</label></th>
                        <td>
                            <input name="mis360_intro_video_url" type="url" id="mis360_intro_video_url" value="<?php echo esc_attr($intro_video_url); ?>" class="regular-text ltr" style="width: 100%; max-width: 500px;">
                            <p class="description">
                                <strong>Hibrit Sistem:</strong> Buraya doğrudan bir <strong>YouTube linki</strong> (Örn: <code>https://www.youtube.com/watch?v=...</code>) veya kendi yüklediğiniz bir <strong>MP4 linki</strong> yapıştırabilirsiniz. Sistem linki otomatik algılayıp en uygun oynatıcıyla başlatacaktır.
                            </p>
                        </td>
                    </tr>
                </table>
            </div>
            
            <?php submit_button('Ayarları Kaydet', 'primary', 'submit', true, ['style' => 'font-size: 15px; padding: 5px 25px;']); ?>
        </form>
    </div>
    <?php
}

// 3B. Slider Ayarları Sayfası (HTML)
function mis360_settings_page_slider(): void {
    if (!current_user_can('manage_options')) return;

    $slider_enabled = get_option('mis360_slider_enabled', '1');
    $slider_images = get_option('mis360_slider_images', []);
    if (!is_array($slider_images) || empty($slider_images)) {
        $slider_images = ['']; // En az 1 boş alan
    }
    ?>
    <div class="wrap">
        <h1>📸 MİS360 - Slider Ayarları</h1>
        <hr style="margin-bottom: 20px;">
        
        <form method="post" action="options.php">
            <?php settings_fields('mis360_slider_group'); ?>
            
            <div style="background: #fff; padding: 20px; border: 1px solid #ccd0d4; border-radius: 8px; max-width: 900px; box-shadow: 0 1px 1px rgba(0,0,0,.04);">
                <h2 style="margin-top: 0; color: #1e293b;">Ana Sayfa Restoran Galerisi (Sınırsız)</h2>
                <p style="color: #64748b; font-size: 14px;">Ziyaretçilere gösterilecek kayan fotoğrafları buradan ekleyin. Sınır yoktur, istediğiniz kadar <strong>Yeni Görsel Ekle</strong> diyebilirsiniz.</p>
                
                <table class="form-table" role="presentation">
                    <tr>
                        <th scope="row">Slider Görünsün mü?</th>
                        <td>
                            <label>
                                <input type="checkbox" name="mis360_slider_enabled" value="1" <?php checked('1', $slider_enabled); ?>>
                                <strong style="color: #16a34a;">Açık:</strong> Ana sayfada fotoğraf galerisi gösterilsin
                            </label>
                        </td>
                    </tr>
                </table>

                <hr style="border: 0; border-top: 1px solid #eee; margin: 20px 0;">

                <table class="form-table" role="presentation" id="slider-images-table">
                    <tbody id="slider-images-tbody">
                        <?php foreach ($slider_images as $index => $img_val) : ?>
                        <tr class="slider-image-row">
                            <th scope="row" style="width: 120px;">Görsel URL</th>
                            <td>
                                <input name="mis360_slider_images[]" type="url" value="<?php echo esc_attr($img_val); ?>" class="regular-text ltr" style="width: 70%; max-width: 500px;" placeholder="https://...">
                                <button type="button" class="button remove-image-btn" style="color: #dc3232; border-color: #dc3232;">Sil</button>
                                <?php if ($img_val) : ?>
                                    <div style="margin-top: 10px;">
                                        <img src="<?php echo esc_url($img_val); ?>" style="max-height: 80px; border-radius: 4px; border: 1px solid #ccc;">
                                    </div>
                                <?php endif; ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <p>
                    <button type="button" id="add-slider-image" class="button button-secondary" style="margin-left: 130px; font-weight: 600; color: #2271b1;">➕ Yeni Görsel Ekle</button>
                </p>
            </div>
            
            <?php submit_button('Slider Ayarlarını Kaydet', 'primary', 'submit', true, ['style' => 'font-size: 15px; padding: 5px 25px;']); ?>
        </form>
    </div>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const tbody = document.getElementById('slider-images-tbody');
        const addBtn = document.getElementById('add-slider-image');
        
        // Yeni Alan Ekle
        addBtn.addEventListener('click', function() {
            const tr = document.createElement('tr');
            tr.className = 'slider-image-row';
            tr.innerHTML = `
                <th scope="row" style="width: 120px;">Görsel URL</th>
                <td>
                    <input name="mis360_slider_images[]" type="url" value="" class="regular-text ltr" style="width: 70%; max-width: 500px;" placeholder="https://...">
                    <button type="button" class="button remove-image-btn" style="color: #dc3232; border-color: #dc3232;">Sil</button>
                </td>
            `;
            tbody.appendChild(tr);
        });

        // Alan Sil
        tbody.addEventListener('click', function(e) {
            if (e.target.classList.contains('remove-image-btn')) {
                const rows = tbody.querySelectorAll('.slider-image-row');
                if (rows.length > 1) {
                    e.target.closest('tr').remove();
                } else {
                    e.target.previousElementSibling.value = ''; // Sonuncusuysa içini temizle
                }
            }
        });
    });
    </script>
    <?php
}

// 3C. Lisans Ayarları Sayfası (HTML)
function mis360_settings_page_license(): void {
    if (!current_user_can('manage_options')) return;
    
    $license_key = get_option('mis360_license_key', '');
    ?>
    <div class="wrap">
        <h1>🔑 MİS360 - Lisans Ayarları</h1>
        <hr style="margin-bottom: 20px;">
        
        <form method="post" action="options.php">
            <?php settings_fields('mis360_license_group'); ?>
            
            <div style="background: #fff; padding: 20px; border: 1px solid #ccd0d4; border-radius: 8px; max-width: 800px; box-shadow: 0 1px 1px rgba(0,0,0,.04);">
                <h2 style="margin-top: 0; color: #1e293b;">Lisans Aktivasyonu</h2>
                <p style="color: #64748b; font-size: 14px;">MİS360 Premium tema özelliklerini, güncellemeleri ve teknik desteği aktif tutmak için lisans anahtarınızı giriniz.</p>
                
                <table class="form-table" role="presentation">
                    <tr>
                        <th scope="row"><label for="mis360_license_key">Lisans Anahtarı</label></th>
                        <td>
                            <input name="mis360_license_key" type="text" id="mis360_license_key" value="<?php echo esc_attr($license_key); ?>" class="regular-text ltr" style="width: 100%; max-width: 500px; font-family: monospace;">
                            <p class="description">
                                Örnek: MİS360-XXXX-XXXX-XXXX
                            </p>
                            <?php if (!empty($license_key)) : ?>
                                <p style="color: #16a34a; font-weight: bold; margin-top: 10px;">✅ Lisans Aktif</p>
                            <?php else : ?>
                                <p style="color: #dc2626; font-weight: bold; margin-top: 10px;">❌ Lisans Girilmedi</p>
                            <?php endif; ?>
                        </td>
                    </tr>
                </table>
            </div>
            
            <?php submit_button('Lisansı Doğrula ve Kaydet', 'primary', 'submit', true, ['style' => 'font-size: 15px; padding: 5px 25px;']); ?>
        </form>
    </div>
    <?php
}

    // ==============================================================
    // SEO SAYFA ÜRETİCİ (OTOMATİK SAYFA VE YAZI OLUŞTURMA MOTORU)
    // ==============================================================
    add_action('admin_init', 'mis360_handle_seo_generation');
    function mis360_handle_seo_generation(): void {
        if (isset($_POST['mis360_generate_seo']) && current_user_can('manage_options')) {
            check_admin_referer('mis360_seo_action');

            $created_count = 0;

            // 1. Ana SEO Sayfası ve Alt Sayfaları (Pages)
            $parent_page_id = post_exists('Sarıkaya Restoran') ? get_page_by_title('Sarıkaya Restoran')->ID : 0;
            
            if (!$parent_page_id) {
                $parent_page_id = wp_insert_post([
                    'post_title'   => 'Sarıkaya Restoran',
                    'post_content' => '<h2>Yozgat Sarıkaya\'nın En Gözde Restoranı</h2><p>Sarıkaya bölgesinde ailenizle, sevdiklerinizle huzurlu ve lezzetli vakit geçirebileceğiniz en iyi restoran deneyimini sunuyoruz. Geniş menümüz, ferah mekanımız ve güler yüzlü personelimizle hizmetinizdeyiz.</p>',
                    'post_status'  => 'publish',
                    'post_type'    => 'page',
                    'post_author'  => get_current_user_id()
                ]);
                $created_count++;
            }

            $child_pages = [
                'Sarıkaya Et Restoranı'   => '<h2>Sarıkaya Et Restoranı</h2><p>Meşe kömüründe pişen enfes et menülerimiz, zırh kıymasıyla hazırlanan özel spesiyallerimiz ve usta ellerden çıkan lezzetlerimizle Sarıkaya\'da etin bir numaralı adresiyiz.</p>',
                'Sarıkaya Balık Restoranı'=> '<h2>Sarıkaya Balık Restoranı</h2><p>Günlük temin edilen taze deniz ürünleri, fırında veya ızgarada çupra ve levrek seçenekleriyle Sarıkaya\'da balık keyfini doyasıya yaşayın.</p>',
                'Sarıkaya Kebap'          => '<h2>Hakiki Sarıkaya Kebap Salonu</h2><p>Zırh kıymasından hakiki Adana ve Urfa kebapları, kuzu şiş ve beyti sarma lezzetlerimizle gerçek kebap kültürünü Yozgat Sarıkaya\'ya taşıyoruz.</p>',
                'Sarıkaya Döner'          => '<h2>Sarıkaya Yaprak Döner</h2><p>Odun ateşinde ağır ağır pişen %100 yaprak et döner ve tavuk döner menülerimizle, hızlı ve lezzetli öğünlerin vazgeçilmez noktasıyız.</p>',
                'Sarıkaya Aile Restoranı' => '<h2>Sarıkaya Aile Restoranı</h2><p>Çocuk oyun alanımız, geniş açık hava bahçemiz ve nezih aile salonumuzla, Sarıkaya\'da ailecek huzurla yemek yiyebileceğiniz ferah bir ortam sunuyoruz.</p>'
            ];

            foreach ($child_pages as $title => $content) {
                if (!post_exists($title)) {
                    wp_insert_post([
                        'post_title'   => $title,
                        'post_content' => $content,
                        'post_status'  => 'publish',
                        'post_type'    => 'page',
                        'post_parent'  => $parent_page_id,
                        'post_author'  => get_current_user_id()
                    ]);
                    $created_count++;
                }
            }

            // 2. Blog / Rehber Yazıları (Posts)
            $seo_posts = [
                'Sarıkaya\'da Nerede Yemek Yenir?' => '<h2>Sarıkaya\'da En İyi Yemek Mekanları</h2><p>Yozgat Sarıkaya\'ya yolunuz düştüğünde, yöresel lezzetleri ve usta işi kebapları nerede yiyeceğiniz sorusunun en güvenilir cevabı kaliteli malzemeler kullanan köklü mekanlardır. Ailenizle rahatça oturabileceğiniz geniş mekanları tercih etmelisiniz.</p>',
                'Sarıkaya Kaplıcaları'             => '<h2>Sarıkaya Kaplıcaları ve Tarihi Dokusu</h2><p>Roma döneminden kalma ünlü Kral Kızı Hamamı (Basilica Therma) ile Sarıkaya kaplıcaları her yıl binlerce turist ağırlamaktadır. Şifalı sularıyla bilinen bu bölgeyi ziyaret ettikten sonra enerjinizi güzel bir yemekle tazeleyebilirsiniz.</p>',
                'Sarıkaya Gezi Rehberi'            => '<h2>Yozgat Sarıkaya Gezilecek Yerler</h2><p>Sarıkaya tarihi dokusu ve şifalı sularıyla İç Anadolu\'nun parlayan yıldızıdır. Gezinizi planlarken tarihi hamam kalıntılarını görmeyi, yöresel lezzetleri tatmayı unutmayın.</p>',
                'Sarıkaya Yemek Rehberi'           => '<h2>Sarıkaya Yöresel Lezzetleri</h2><p>Sarıkaya yöresel yemekleri, testi kebabı, Yozgat tandırı ve meşe kömüründe pişen zırh kebapları ile İç Anadolu mutfağının en seçkin örneklerini sunar. Bu rehberde en iyi lezzet duraklarını keşfedin.</p>'
            ];

            foreach ($seo_posts as $title => $content) {
                if (!post_exists($title)) {
                    wp_insert_post([
                        'post_title'   => $title,
                        'post_content' => $content,
                        'post_status'  => 'publish',
                        'post_type'    => 'post',
                        'post_author'  => get_current_user_id()
                    ]);
                    $created_count++;
                }
            }

            add_settings_error('mis360_seo_messages', 'mis360_seo_success', "Tebrikler! Eksik olan {$created_count} adet SEO Sayfası ve Blog Yazısı başarıyla oluşturuldu.", 'updated');
        }
    }

    
    // ==============================================================
    // SEO & GEO VERİLERİ (SCHEMA VE META) AYARLARI
    // ==============================================================
    function mis360_settings_page_seo_data(): void {
        if (!current_user_can('manage_options')) return;
        
        // Varsayılan değerler (Beyzade verileri)
        $def_name = 'Beyzade Et & Balık Restaurant';
        $def_desc = "2019 yılından beri Yozgat Sarıkaya'da hakiki meşe kömüründe kebap, özel kuzu tandır, taş fırın pideleri, lahmacun ve günlük taze balık çeşitleri sunan seçkin aile restoranı.";
        $def_key  = 'Sarıkaya Restorant, Sarıkaya restoran, Sarıkaya Yemek, Sarıkaya Kıymalı, Sarıkaya Çorba, Sarıkaya Kebab, Sarıkaya Kebap';
        $def_phone= '0535 830 93 07';
        $def_addr = 'Bahçelievler Mah. Nevzat Şener Bulvarı, Sarıkaya / Yozgat';
        
        ?>
        <div class="wrap">
            <h1>🔍 MİS360 - SEO & GEO Verileri</h1>
            <hr style="margin-bottom: 20px;">
            
            <form method="post" action="options.php">
                <?php settings_fields('mis360_seo_data_group'); ?>
                
                <div style="background: #fff; padding: 25px; border: 1px solid #ccd0d4; border-radius: 8px; max-width: 900px; box-shadow: 0 1px 3px rgba(0,0,0,.05);">
                    <h2 style="margin-top: 0; color: #1e293b; font-size: 20px;">Yapay Zeka ve Google (Schema.org) Kimliği</h2>
                    <p style="color: #475569; font-size: 14px; margin-bottom: 25px;">
                        Buraya girdiğiniz veriler temanın arka planındaki <strong>JSON-LD LocalBusiness</strong> veri yapısına ve gizli <strong>AI özet tablolarına</strong> işlenir. Temayı başka bir restorana kurduğunuzda sadece buradaki bilgileri değiştirmeniz yeterlidir.
                    </p>
                    
                    <table class="form-table" role="presentation">
                        <tr>
                            <th scope="row"><label for="mis360_seo_business_name">Restoran/İşletme Adı</label></th>
                            <td>
                                <input name="mis360_seo_business_name" type="text" id="mis360_seo_business_name" value="<?php echo esc_attr(get_option('mis360_seo_business_name', $def_name)); ?>" class="regular-text" style="width: 100%;">
                            </td>
                        </tr>
                        <tr>
                            <th scope="row"><label for="mis360_seo_description">SEO Açıklaması (Meta Description)</label></th>
                            <td>
                                <textarea name="mis360_seo_description" id="mis360_seo_description" rows="4" style="width: 100%;"><?php echo esc_textarea(get_option('mis360_seo_description', $def_desc)); ?></textarea>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row"><label for="mis360_seo_keywords">Anahtar Kelimeler (Virgülle ayırın)</label></th>
                            <td>
                                <textarea name="mis360_seo_keywords" id="mis360_seo_keywords" rows="3" style="width: 100%;"><?php echo esc_textarea(get_option('mis360_seo_keywords', $def_key)); ?></textarea>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row"><label for="mis360_seo_phone">Telefon Numarası</label></th>
                            <td>
                                <input name="mis360_seo_phone" type="text" id="mis360_seo_phone" value="<?php echo esc_attr(get_option('mis360_seo_phone', $def_phone)); ?>" class="regular-text">
                            </td>
                        </tr>
                        <tr>
                            <th scope="row"><label for="mis360_seo_address">Tam Adres</label></th>
                            <td>
                                <input name="mis360_seo_address" type="text" id="mis360_seo_address" value="<?php echo esc_attr(get_option('mis360_seo_address', $def_addr)); ?>" class="regular-text" style="width: 100%;">
                            </td>
                        </tr>
                        <tr>
                            <th scope="row"><label for="mis360_seo_rating">Google Puanı (Örn: 4.3)</label></th>
                            <td>
                                <input name="mis360_seo_rating" type="text" id="mis360_seo_rating" value="<?php echo esc_attr(get_option('mis360_seo_rating', '4.3')); ?>" class="regular-text" style="width: 100px;">
                            </td>
                        </tr>
                        <tr>
                            <th scope="row"><label for="mis360_seo_review_count">Değerlendirme Sayısı (Örn: 448)</label></th>
                            <td>
                                <input name="mis360_seo_review_count" type="number" id="mis360_seo_review_count" value="<?php echo esc_attr(get_option('mis360_seo_review_count', '448')); ?>" class="regular-text" style="width: 100px;">
                            </td>
                        </tr>
                    </table>
                </div>
                
                <?php submit_button('SEO Verilerini Kaydet', 'primary', 'submit', true, ['style' => 'font-size: 15px; padding: 5px 25px;']); ?>
            </form>
        </div>
        <?php
    }

    function mis360_settings_page_seo_generator(): void {
        if (!current_user_can('manage_options')) return;
        ?>
        <div class="wrap">
            <h1>🚀 MİS360 - Tek Tıkla SEO Sayfaları Üretici</h1>
            <hr style="margin-bottom: 20px;">
            
            <?php settings_errors('mis360_seo_messages'); ?>

            <div style="background: #fff; padding: 25px; border: 1px solid #ccd0d4; border-radius: 8px; max-width: 900px; box-shadow: 0 1px 3px rgba(0,0,0,.05);">
                <div style="display: flex; gap: 20px; align-items: flex-start;">
                    <div style="font-size: 50px;">🤖</div>
                    <div>
                        <h2 style="margin-top: 0; color: #1e293b; font-size: 22px;">Bölgesel SEO Dominasyonu Kurun</h2>
                        <p style="color: #475569; font-size: 15px; line-height: 1.6;">
                            Bu modül, temayı <strong>hangi sunucuya, hangi alan adına kurarsanız kurun</strong> saniyeler içinde o bölgeyi domine edecek bir "Arama Motoru Mimarisi" inşa eder. Aşağıdaki butona bastığınızda, sistem otomatik olarak yapay zeka destekli içeriklerle şu sayfaları hiyerarşik (alt sayfa mantığıyla) olarak oluşturur:
                        </p>
                    </div>
                </div>

                <div style="margin-top: 20px; padding: 15px; background: #f8fafc; border: 1px solid #e2e8f0; border-radius: 6px;">
                    <h3 style="margin-top:0;">Oluşturulacak Mimari:</h3>
                    <ul style="font-size: 14px; font-family: monospace; color: #334155; line-height: 1.8;">
                        <li><strong>📁 Sayfalar (Hizmet Bazlı İniş Sayfaları - Landing Pages)</strong></li>
                        <li>├── Sarıkaya Restoran (Ana Sayfa)</li>
                        <li>│   ├── Sarıkaya Et Restoranı</li>
                        <li>│   ├── Sarıkaya Balık Restoranı</li>
                        <li>│   ├── Sarıkaya Kebap</li>
                        <li>│   ├── Sarıkaya Döner</li>
                        <li>│   └── Sarıkaya Aile Restoranı</li>
                        <li style="margin-top: 10px;"><strong>📝 Yazılar (Blog & Rehber - Bilgi Odaklı Trafik)</strong></li>
                        <li>├── Sarıkaya'da Nerede Yemek Yenir?</li>
                        <li>├── Sarıkaya Kaplıcaları</li>
                        <li>├── Sarıkaya Gezi Rehberi</li>
                        <li>└── Sarıkaya Yemek Rehberi</li>
                    </ul>
                </div>

                <form method="post" action="" style="margin-top: 30px;">
                    <?php wp_nonce_field('mis360_seo_action'); ?>
                    <input type="hidden" name="mis360_generate_seo" value="1">
                    <button type="submit" class="button button-primary" style="font-size: 16px; padding: 10px 30px; height: auto; display: flex; align-items: center; gap: 10px;">
                        <span style="font-size: 20px;">⚡</span> Hiyerarşik SEO Sayfalarını Şimdi Üret
                    </button>
                    <p style="color: #94a3b8; font-size: 12px; margin-top: 10px;"><em>Not: Sistem zaten var olan sayfaları tekrar oluşturmaz (kopya içerik yaratmaz), sadece eksik olanları ekler. Bu yüzden istediğiniz kadar basabilirsiniz.</em></p>
                </form>
            </div>
        </div>
        <?php
    }
