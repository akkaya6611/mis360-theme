<?php
/**
 * MİS360 Demo Showcase & One-Click Setup Engine
 * Şık Sektörel Demolar (Yol Yardım, Restoran, İlan, Kurumsal)
 *
 * @package MİS360
 * @author  Serkan AKKAYA <https://misteknoloji360.com.tr/>
 * @since   1.0.0
 */

declare(strict_types=1);

if (!defined('ABSPATH')) {
    exit;
}

class MIS360_Demo_Manager {

    public static function init(): void {
        add_action('admin_menu', [__CLASS__, 'register_admin_menu']);
        add_action('admin_init', [__CLASS__, 'handle_import_action']);
    }

    public static function register_admin_menu(): void {
        add_theme_page(
            esc_html__('MİS360 Hazır Demolar', 'mis360'),
            esc_html__('MİS360 Demolar', 'mis360'),
            'manage_options',
            'mis360-demos',
            [__CLASS__, 'render_demos_page']
        );
    }

    /**
     * Tek Tıkla Örnek Demo Sayfalarını ve İçeriklerini Oluştur
     */
    public static function handle_import_action(): void {
        if (!isset($_POST['mis360_import_action']) || !current_user_can('manage_options')) {
            return;
        }

        check_admin_referer('mis360_demo_nonce', 'mis360_demo_nonce_field');

        $demo_key = sanitize_text_field(wp_unslash($_POST['mis360_demo_key'] ?? ''));

        // Demo Sayfalarını Otomatik Oluştur
        $demos = [
            'emergency' => [
                'title'    => 'Acil Yol Yardım & Oto Çekici Demo',
                'template' => 'page-templates/demo-emergency.php',
            ],
            'restaurant' => [
                'title'    => 'Gourmet Bistro & Restoran Menü Demo',
                'template' => 'page-templates/demo-restaurant.php',
            ],
            'listing' => [
                'title'    => 'Prestige İlan & Emlak Listeleme Demo',
                'template' => 'page-templates/demo-listing.php',
            ],
            'corporate' => [
                'title'    => 'Modern Kurumsal & Ajans 360 Demo',
                'template' => 'page-templates/demo-corporate.php',
            ],
        ];

        if (isset($demos[$demo_key])) {
            $demo_info = $demos[$demo_key];

            // Sayfa zaten var mı kontrol et
            $existing_page = get_page_by_path(sanitize_title($demo_info['title']));

            if (!$existing_page) {
                $page_id = wp_insert_post([
                    'post_title'   => $demo_info['title'],
                    'post_type'    => 'page',
                    'post_status'  => 'publish',
                    'post_content' => '<!-- MİS360 Demo Sayfası İçeriği -->',
                ]);

                if ($page_id && !is_wp_error($page_id)) {
                    update_post_meta($page_id, '_wp_page_template', $demo_info['template']);
                }
            }

            // Örnek CPT ilanları/ürünleri ekle
            self::seed_sample_items();

            set_transient('mis360_demo_notice', [
                'success' => true,
                'message' => sprintf(__('✓ %s başarıyla yüklendi! Sayfalar menüsünden görüntüleyebilirsiniz.', 'mis360'), $demo_info['title']),
            ], 30);

            wp_safe_redirect(admin_url('themes.php?page=mis360-demos'));
            exit;
        }
    }

    /**
     * Örnek CPT Verilerini Otomatik Üret (Yol Yardım, Yemek, İlan)
     */
    private static function seed_sample_items(): void {
        $existing = get_posts(['post_type' => 'mis360_listing', 'posts_per_page' => 1]);
        if (!empty($existing)) {
            return; // Zaten veri varsa tekrar ekleme
        }

        $sample_items = [
            [
                'title'    => 'Otomobil & Hafif Ticari Oto Çekici',
                'price'    => '₺750 Başlayan',
                'badge'    => '7/24 Acil',
                'location' => 'Tüm Şehir & Otoyol Çıkışları',
                'btn_text' => 'Hemen Çekici Çağır',
                'content'  => 'Kaskolu ve sigortalı modern çekici filomuzla binek ve hafif ticari araçlarınız güvenle taşınır.',
            ],
            [
                'title'    => 'Akü Takviye & Mobil Yol Servisi',
                'price'    => '₺400',
                'badge'    => 'Yerinde Müdahale',
                'location' => 'Mobil Gezici Servis',
                'btn_text' => 'Akü Servisi İste',
                'content'  => 'Yolda kalan aracınız için 15 dakikada yerinde akü takviyesi ve test hizmeti.',
            ],
            [
                'title'    => 'Şefin Özel Fırınlanmış Kuzu Gerdan',
                'price'    => '₺480',
                'badge'    => 'Şefin Spesiyali',
                'location' => 'Ana Restoran',
                'btn_text' => 'WhatsApp Sipariş Ver',
                'content'  => '12 saat ağır ateşte taze baharatlar eşliğinde pişirilmiş nefis kuzu gerdan, firik pilavı ile.',
            ],
            [
                'title'    => 'İtalyan Trüf Mantarlı Ev Yapımı Makarna',
                'price'    => '₺360',
                'badge'    => 'Gurme Seçim',
                'location' => 'İtalyan Mutfağı',
                'btn_text' => 'Hızlı Sipariş',
                'content'  => 'Taze el yapımı tagliatelle, siyah trüf ezmesi ve parmesan krema sosuyla.',
            ],
            [
                'title'    => 'Boğaz Manzaralı Lüks 3+1 Rezidans Daire',
                'price'    => '₺18.500.000',
                'badge'    => 'Fırsat İlanı',
                'location' => 'Beşiktaş / İstanbul',
                'btn_text' => 'İlan Detayı & Randevu',
                'content'  => 'Geniş teraslı, akıllı ev sistemi ve kapalı otoparklı lüks rezidans dairesi.',
            ],
            [
                'title'    => '2024 Model Hibrit SUV Prestij Paket',
                'price'    => '₺2.450.000',
                'badge'    => 'Hatasız & Boyasız',
                'location' => 'Kadıköy Galeri',
                'btn_text' => 'Ekspertiz Raporu Al',
                'content'  => 'İlk sahibinden, yetkili servis bakımlı, panoramik cam tavan ve otonom sürüşlü.',
            ],
        ];

        foreach ($sample_items as $item) {
            $post_id = wp_insert_post([
                'post_title'   => $item['title'],
                'post_content' => $item['content'],
                'post_excerpt' => wp_trim_words($item['content'], 15),
                'post_type'    => 'mis360_listing',
                'post_status'  => 'publish',
            ]);

            if ($post_id && !is_wp_error($post_id)) {
                update_post_meta($post_id, '_mis360_price', $item['price']);
                update_post_meta($post_id, '_mis360_badge', $item['badge']);
                update_post_meta($post_id, '_mis360_location', $item['location']);
                update_post_meta($post_id, '_mis360_btn_text', $item['btn_text']);
            }
        }
    }

    /**
     * Demo Vitrin Arayüzü (Admin UI)
     */
    public static function render_demos_page(): void {
        $notice = get_transient('mis360_demo_notice');
        if ($notice && is_array($notice)) {
            delete_transient('mis360_demo_notice');
            printf('<div class="notice notice-success is-dismissible" style="margin-top: 15px;"><p>%s</p></div>', esc_html($notice['message']));
        }

        $demos = [
            [
                'id'          => 'emergency',
                'title'       => esc_html__('🚨 Acil Yol Yardım & Çekici Pro Demo', 'mis360'),
                'badge'       => esc_html__('Yüksek Dönüşüm (Conversion)', 'mis360'),
                'badge_color' => '#ef4444',
                'desc'        => esc_html__('7/24 Acil çağrı barı, canlı GPS konum gönderme, 15 dakikada varış vaadi ve filo hizmetleri.', 'mis360'),
                'features'    => ['Mobil Yapışkan Arama Barı', 'WhatsApp Canlı Konum', '3 Adımda Hizmet Akışı', 'Acil Çekici Filosu'],
                'accent'      => 'linear-gradient(135deg, #ef4444, #dc2626)',
            ],
            [
                'id'          => 'restaurant',
                'title'       => esc_html__('🍽️ Gourmet Bistro & Restoran Demo', 'mis360'),
                'badge'       => esc_html__('Yemek & Menü Kataloğu', 'mis360'),
                'badge_color' => '#f59e0b',
                'desc'        => esc_html__('Dinamik kategori sekmeleri, fiyat etiketli spesiyaller, WhatsApp hızlı sipariş ve masa rezervasyonu.', 'mis360'),
                'features'    => ['Fiyat & Rozet Etiketleri', 'WhatsApp Sipariş Hattı', 'Kategori Filtreleme', 'Masa Rezervasyonu'],
                'accent'      => 'linear-gradient(135deg, #f59e0b, #d97706)',
            ],
            [
                'id'          => 'listing',
                'title'       => esc_html__('🏷️ Prestige İlan, Emlak & Galeri Demo', 'mis360'),
                'badge'       => esc_html__('İlan & Portföy Izgarası', 'mis360'),
                'badge_color' => '#10b981',
                'desc'        => esc_html__('Fiyat, konum ve özellik çipleriyle donatılmış modern gayrimenkul, vasıta veya ürün ilan vitrini.', 'mis360'),
                'features'    => ['Detaylı Fiyat & Konum', 'VIP Fırsat Rozetleri', 'Gelişmiş Arama Vitrini', 'WhatsApp İlan İletişimi'],
                'accent'      => 'linear-gradient(135deg, #10b981, #059669)',
            ],
            [
                'id'          => 'corporate',
                'title'       => esc_html__('🏢 Modern Kurumsal & 360 Ajans Demo', 'mis360'),
                'badge'       => esc_html__('Kurumsal Marka & SaaS', 'mis360'),
                'badge_color' => '#3b82f6',
                'desc'        => esc_html__('İstatistik sayaçları, modern kart ızgaraları, interaktif hizmet kartları ve müşteri yorumları.', 'mis360'),
                'features'    => ['Sayaç & İstatistik Grid', 'Hizmet Kartları', 'Müşteri Güven Rozetleri', 'İletişim & Teklif Formu'],
                'accent'      => 'linear-gradient(135deg, #3b82f6, #8b5cf6)',
            ],
        ];
        ?>
        <div class="wrap" style="max-width: 1200px; margin-top: 25px;">
            <div style="margin-bottom: 25px;">
                <h1 style="font-size: 28px; font-weight: 800; color: #0f172a; margin-bottom: 8px;">
                    <?php esc_html_e('MİS360 Şık Sektörel Demolar', 'mis360'); ?>
                </h1>
                <p style="font-size: 15px; color: #64748b; margin: 0;">
                    <?php esc_html_e('İstediğiniz sektörün demosunu tek tıkla sitenize kurun ve hemen kullanmaya başlayın.', 'mis360'); ?>
                </p>
            </div>

            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(360px, 1fr)); gap: 24px;">
                <?php foreach ($demos as $demo) : ?>
                    <div style="background: #ffffff; border: 1px solid #e2e8f0; border-radius: 14px; overflow: hidden; box-shadow: 0 4px 6px -1px rgba(0,0,0,0.05); display: flex; flex-direction: column;">
                        
                        <!-- Demo Başlık Bandı -->
                        <div style="background: <?php echo esc_attr($demo['accent']); ?>; padding: 24px; color: #ffffff;">
                            <span style="display: inline-block; background: rgba(255,255,255,0.25); backdrop-filter: blur(8px); padding: 4px 10px; border-radius: 9999px; font-size: 11px; font-weight: 700; margin-bottom: 12px;">
                                <?php echo esc_html($demo['badge']); ?>
                            </span>
                            <h2 style="font-size: 20px; font-weight: 800; margin: 0; color: #ffffff; line-height: 1.3;">
                                <?php echo esc_html($demo['title']); ?>
                            </h2>
                        </div>

                        <!-- Demo İçerik ve Özellikler -->
                        <div style="padding: 24px; flex: 1; display: flex; flex-direction: column;">
                            <p style="color: #475569; font-size: 14px; line-height: 1.6; margin-bottom: 16px;">
                                <?php echo esc_html($demo['desc']); ?>
                            </p>

                            <ul style="list-style: none; padding: 0; margin: 0 0 24px 0; display: flex; flex-direction: column; gap: 8px;">
                                <?php foreach ($demo['features'] as $f) : ?>
                                    <li style="font-size: 13px; color: #334155; display: flex; align-items: center; gap: 8px;">
                                        <span style="color: #10b981; font-weight: bold;">✓</span> <?php echo esc_html($f); ?>
                                    </li>
                                <?php endforeach; ?>
                            </ul>

                            <div style="margin-top: auto; padding-top: 16px; border-top: 1px solid #f1f5f9; display: flex; align-items: center; justify-content: space-between;">
                                <form method="post">
                                    <?php wp_nonce_field('mis360_demo_nonce', 'mis360_demo_nonce_field'); ?>
                                    <input type="hidden" name="mis360_import_action" value="1">
                                    <input type="hidden" name="mis360_demo_key" value="<?php echo esc_attr($demo['id']); ?>">
                                    <button type="submit" class="button button-primary button-large" style="font-weight: 700; border-radius: 6px;">
                                        <?php esc_html_e('Demoyu Kur & Başlat →', 'mis360'); ?>
                                    </button>
                                </form>
                            </div>
                        </div>

                    </div>
                <?php endforeach; ?>
            </div>

            <!-- Bilgilendirme -->
            <div style="margin-top: 30px; background: #f8fafc; border: 1px solid #e2e8f0; border-radius: 10px; padding: 20px; font-size: 13px; color: #64748b;">
                <strong><?php esc_html_e('Nasıl Çalışır?', 'mis360'); ?></strong> <?php esc_html_e('Herhangi bir demoda "Demoyu Kur & Başlat" butonuna tıkladığınızda, o sektöre ait zengin demo sayfası "Sayfalar" menünüzde otomatik oluşturulur ve örnek vitrin öğeleri eklenir. İsterseniz Ayarlar > Okuma menüsünden bu sayfayı doğrudan ana sayfanız yapabilirsiniz.', 'mis360'); ?>
            </div>
        </div>
        <?php
    }
}

// Demo Motorunu Başlat
MIS360_Demo_Manager::init();
