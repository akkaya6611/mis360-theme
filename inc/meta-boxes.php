<?php
/**
 * MİS360 Meta Boxes
 * Fiyat, Rozet, Lokasyon ve Doğrudan Aksiyon Alanları
 *
 * @package MİS360
 * @author  Serkan AKKAYA <https://misteknoloji360.com.tr/>
 * @since   1.0.0
 */

declare(strict_types=1);

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Meta Kutusu Ekle
 */
function mis360_add_listing_meta_box(): void {
    add_meta_box(
        'mis360_listing_details',
        esc_html__('MİS360 Öğe Detayları (Fiyat, Rozet, Konum & Buton)', 'mis360'),
        'mis360_render_listing_meta_box',
        'mis360_listing',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'mis360_add_listing_meta_box');

/**
 * Meta Kutusu Arayüzü
 */
function mis360_render_listing_meta_box(WP_Post $post): void {
    wp_nonce_field('mis360_save_listing_meta', 'mis360_listing_nonce');

    $price    = get_post_meta($post->ID, '_mis360_price', true);
    $badge    = get_post_meta($post->ID, '_mis360_badge', true);
    $location = get_post_meta($post->ID, '_mis360_location', true);
    $btn_text = get_post_meta($post->ID, '_mis360_btn_text', true);
    $btn_url  = get_post_meta($post->ID, '_mis360_btn_url', true);
    ?>
    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 16px; padding: 12px 0;">
        
        <div>
            <label for="mis360_price" style="display: block; font-weight: 600; margin-bottom: 6px;">
                <?php esc_html_e('Fiyat (Ürün / Hizmet / İlan):', 'mis360'); ?>
            </label>
            <input type="text" id="mis360_price" name="mis360_price" value="<?php echo esc_attr($price); ?>" placeholder="Örn: ₺350 veya ₺1.250.000" style="width: 100%; padding: 8px;">
            <p class="description"><?php esc_html_e('Yemek fiyatı, çekici başlangıç ücreti veya ilan fiyatı.', 'mis360'); ?></p>
        </div>

        <div>
            <label for="mis360_badge" style="display: block; font-weight: 600; margin-bottom: 6px;">
                <?php esc_html_e('Öne Çıkan Rozet (Badge):', 'mis360'); ?>
            </label>
            <input type="text" id="mis360_badge" name="mis360_badge" value="<?php echo esc_attr($badge); ?>" placeholder="Örn: 7/24 Acil, Şefin Seçimi, Fırsat" style="width: 100%; padding: 8px;">
            <p class="description"><?php esc_html_e('Kartın üzerinde renkli rozet olarak görüntülenir.', 'mis360'); ?></p>
        </div>

        <div>
            <label for="mis360_location" style="display: block; font-weight: 600; margin-bottom: 6px;">
                <?php esc_html_e('Konum / Bölge / Şube:', 'mis360'); ?>
            </label>
            <input type="text" id="mis360_location" name="mis360_location" value="<?php echo esc_attr($location); ?>" placeholder="Örn: Kadıköy / İstanbul veya Otoyol 12. km" style="width: 100%; padding: 8px;">
        </div>

        <div>
            <label for="mis360_btn_text" style="display: block; font-weight: 600; margin-bottom: 6px;">
                <?php esc_html_e('Özel Buton Metni:', 'mis360'); ?>
            </label>
            <input type="text" id="mis360_btn_text" name="mis360_btn_text" value="<?php echo esc_attr($btn_text); ?>" placeholder="Örn: WhatsApp Sipariş, Çekici Çağır, Detay" style="width: 100%; padding: 8px;">
        </div>

        <div style="grid-column: 1 / -1;">
            <label for="mis360_btn_url" style="display: block; font-weight: 600; margin-bottom: 6px;">
                <?php esc_html_e('Özel Buton Bağlantısı (URL veya tel:/wa.me):', 'mis360'); ?>
            </label>
            <input type="text" id="mis360_btn_url" name="mis360_btn_url" value="<?php echo esc_attr($btn_url); ?>" placeholder="Örn: tel:+905551234567 veya https://wa.me/905551234567" style="width: 100%; padding: 8px;">
            <p class="description"><?php esc_html_e('Boş bırakılırsa standart ilan detayına yönlendirir.', 'mis360'); ?></p>
        </div>

    </div>
    <?php
}

/**
 * Meta Kutusu Verilerini Kaydet
 */
function mis360_save_listing_meta(int $post_id): void {
    if (!isset($_POST['mis360_listing_nonce']) || !wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['mis360_listing_nonce'])), 'mis360_save_listing_meta')) {
        return;
    }

    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    if (!current_user_can('edit_post', $post_id)) {
        return;
    }

    $fields = ['mis360_price', 'mis360_badge', 'mis360_location', 'mis360_btn_text', 'mis360_btn_url'];

    foreach ($fields as $field) {
        if (isset($_POST[$field])) {
            $value = sanitize_text_field(wp_unslash($_POST[$field]));
            update_post_meta($post_id, '_' . $field, $value);
        }
    }
}
add_action('save_post_mis360_listing', 'mis360_save_listing_meta');
