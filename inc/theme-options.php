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

// 1. Sol Menüye MİS360 Ayarlar Sayfasını Ekle
add_action('admin_menu', 'mis360_theme_options_menu');
function mis360_theme_options_menu(): void {
    add_menu_page(
        'MİS360 Ayarlar',       // Sayfa Başlığı
        'MİS360 Ayarlar',       // Menü Başlığı
        'manage_options',       // Yetki
        'mis360-settings',      // Slug
        'mis360_settings_page', // Çıktı fonksiyonu
        'dashicons-art',        // İkon
        59                      // Sıra
    );
}

// 2. Ayarları WordPress'e Kaydet
add_action('admin_init', 'mis360_register_settings');
function mis360_register_settings(): void {
    register_setting('mis360_options_group', 'mis360_intro_enabled');
    register_setting('mis360_options_group', 'mis360_intro_video_url');
}

// 3. Ayar Sayfası Arayüzü (HTML)
function mis360_settings_page(): void {
    if (!current_user_can('manage_options')) {
        return;
    }

    // Mevcut ayarları veritabanından çek (yoksa varsayılanı kullan)
    $intro_enabled = get_option('mis360_intro_enabled', '1');
    $intro_video_url = get_option('mis360_intro_video_url', 'https://beyzadeetbalikrestaurant.com.tr/wp-content/uploads/intro.mp4');
    ?>
    <div class="wrap">
        <h1>⚙️ MİS360 Tema Ayarları</h1>
        <hr style="margin-bottom: 20px;">
        
        <form method="post" action="options.php">
            <?php settings_fields('mis360_options_group'); ?>
            
            <div style="background: #fff; padding: 20px; border: 1px solid #ccd0d4; border-radius: 8px; max-width: 800px; box-shadow: 0 1px 1px rgba(0,0,0,.04);">
                <h2 style="margin-top: 0; color: #1e293b;">🎬 Intro Popup Ayarları (Ana Sayfa)</h2>
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
                                Videonuzu önce <strong>Ortam &gt; Yeni Ekle</strong> bölümünden sitenize yükleyin. Ardından dosya URL'sini kopyalayıp buraya yapıştırın. (Örn: <code>.../wp-content/uploads/2026/intro.mp4</code>)
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
