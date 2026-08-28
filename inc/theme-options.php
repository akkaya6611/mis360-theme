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

    // Alt Menü 5: Görünüm Ayarlarını Buraya Taşı (Canlı Özelleştirici)
    add_submenu_page(
        'mis360-settings',
        'Tema Özelleştirici',
        'Tema Özelleştirici',
        'manage_options',
        'customize.php'
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
