<?php
/**
 * MİS360 Dinamik Sitemap (Site Haritası) Motoru
 * Her sayfa, yazı ve görsel eklendiğinde anında güncellenir.
 */

declare(strict_types=1);

if (!defined('ABSPATH')) {
    exit;
}

// 1. Rewrite Kuralı Ekle (sitemap.xml)
add_action('init', 'mis360_sitemap_rewrite_rule');
function mis360_sitemap_rewrite_rule(): void {
    add_rewrite_rule('^sitemap\.xml$', 'index.php?mis360_sitemap=1', 'top');
}

// 2. Query Değişkeni Ekle
add_filter('query_vars', 'mis360_sitemap_query_vars');
function mis360_sitemap_query_vars($vars) {
    $vars[] = 'mis360_sitemap';
    return $vars;
}

// 3. Kalıcı Bağlantıları Sadece Bir Kere Yenile (Flush)
add_action('admin_init', 'mis360_flush_sitemap_rules');
function mis360_flush_sitemap_rules(): void {
    if (!get_option('mis360_sitemap_flushed_v1')) {
        flush_rewrite_rules(false);
        update_option('mis360_sitemap_flushed_v1', 1);
    }
}

// 4. Çıktı (Dinamik XML Render)
add_action('template_redirect', 'mis360_sitemap_output');
function mis360_sitemap_output(): void {
    if (get_query_var('mis360_sitemap')) {
        
        // Tarayıcıya ve Botlara bunun bir XML dosyası olduğunu söyle
        header('Content-Type: application/xml; charset=utf-8');
        header('X-Robots-Tag: noindex, follow', true); // Sitemap'in kendisini arama sonucunda göstermesin, linkleri takip ettirsin
        
        echo '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
        echo '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:image="http://www.google.com/schemas/sitemap-image/1.1">' . "\n";
        
        // 4.1 Ana Sayfa
        echo "\t<url>\n";
        echo "\t\t<loc>" . esc_url(home_url('/')) . "</loc>\n";
        echo "\t\t<lastmod>" . date('c') . "</lastmod>\n";
        echo "\t\t<changefreq>daily</changefreq>\n";
        echo "\t\t<priority>1.0</priority>\n";
        echo "\t</url>\n";

        // 4.2 Sayfalar ve Yazılar (Görselleriyle Birlikte)
        $args = [
            'post_type'      => ['page', 'post'],
            'post_status'    => 'publish',
            'posts_per_page' => 2000, // Çok büyük siteler için yüksek limit
            'orderby'        => 'modified',
            'order'          => 'DESC'
        ];
        
        $query = new WP_Query($args);
        
        if ($query->have_posts()) {
            while ($query->have_posts()) {
                $query->the_post();
                
                // URL ve Tarih Bilgileri
                $permalink = get_permalink();
                $modified  = get_the_modified_time('c');
                $type      = get_post_type();
                $priority  = ($type === 'page') ? '0.8' : '0.6';
                $freq      = ($type === 'page') ? 'weekly' : 'monthly';
                
                echo "\t<url>\n";
                echo "\t\t<loc>" . esc_url($permalink) . "</loc>\n";
                echo "\t\t<lastmod>" . $modified . "</lastmod>\n";
                echo "\t\t<changefreq>" . $freq . "</changefreq>\n";
                echo "\t\t<priority>" . $priority . "</priority>\n";
                
                // Öne Çıkan Görsel Varsa XML'e "Image" etiketiyle ekle (Google Görseller için)
                if (has_post_thumbnail()) {
                    $img_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
                    if ($img_url) {
                        echo "\t\t<image:image>\n";
                        echo "\t\t\t<image:loc>" . esc_url($img_url) . "</image:loc>\n";
                        echo "\t\t</image:image>\n";
                    }
                }
                echo "\t</url>\n";
            }
            wp_reset_postdata();
        }

        echo '</urlset>';
        exit;
    }
}
