<?php
/**
 * MİS360 Antigravity SEO & GEO (AI Search Engine Optimization) Architecture
 * LLM, Perplexity, ChatGPT Search, Google AI Overviews & Schema.org JSON-LD Suite
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
 * 1. Schema.org Dinamik JSON-LD Yapılandırılmış Veri Enjeksiyonu
 * (Restaurant, LocalBusiness, Article/BlogPosting, FAQPage, BreadcrumbList)
 */
function mis360_render_schema_jsonld(): void {
    
    // Ayarlardan Dinamik SEO Verilerini Çek
    $def_name = 'Beyzade Et & Balık Restaurant';
    $def_desc = "2019 yılından beri Yozgat Sarıkaya'da hakiki meşe kömüründe kebap, özel kuzu tandır, taş fırın pideleri, lahmacun ve günlük taze balık çeşitleri sunan seçkin aile restoranı.";
    $def_key  = 'Sarıkaya Restorant, Sarıkaya restoran, Sarıkaya Yemek, Sarıkaya Kıymalı, Sarıkaya Çorba, Sarıkaya Kebab, Sarıkaya Kebap';
    $def_phone= '0535 830 93 07';
    $def_addr = 'Bahçelievler Mah. Nevzat Şener Bulvarı, Sarıkaya / Yozgat';
    $def_rating = '4.3';
    $def_count = '448';

    $b_name  = get_option('mis360_seo_business_name', $def_name) ?: $def_name;
    $b_desc  = get_option('mis360_seo_description', $def_desc) ?: $def_desc;
    $b_key   = get_option('mis360_seo_keywords', $def_key) ?: $def_key;
    $b_phone = get_option('mis360_seo_phone', $def_phone) ?: $def_phone;
    $b_addr  = get_option('mis360_seo_address', $def_addr) ?: $def_addr;
    $b_rating = get_option('mis360_seo_rating', $def_rating) ?: $def_rating;
    $b_count = get_option('mis360_seo_review_count', $def_count) ?: $def_count;

    $schemas = [];

    // Genel İşletme Bilgileri
    $restaurant_schema = [
        '@context'               => 'https://schema.org',
        '@type'                  => ['Restaurant', 'FoodEstablishment', 'LocalBusiness'],
        '@id'                    => esc_url(home_url('#restaurant')),
        'name'                   => 'Beyzade Et & Balık Restaurant',
        'alternateName'          => 'Beyzade Restoran Sarıkaya',
        'legalName'              => 'Beyzade Et ve Balık Restaurant',
        'description'      => $b_desc,
        'url'                    => esc_url(home_url('/')),
        'telephone'      => $b_phone,
        'priceRange'             => '₺₺',
        'servesCuisine'          => ['Türk Mutfağı', 'Kebap', 'Balık ve Deniz Ürünleri', 'Taş Fırın Pide', 'Kahvaltı & Sıcak Çorbalar'],
        'acceptsReservations'    => 'True',
        'menu'                   => esc_url(home_url('/#menu')),
        'hasMap'                 => 'https://maps.app.goo.gl/q2icLBRX1FJNzVtY7',
        'image'                  => [
            get_template_directory_uri() . '/assets/img/demo/banner-4-BEYZADE.png',
            get_template_directory_uri() . '/assets/img/demo/restaurant.jpg',
            'https://beyzadeetbalikrestaurant.com.tr/wp-content/uploads/2026/05/adana.jpg'
        ],
        'logo'                   => get_template_directory_uri() . '/assets/img/demo/cropped-Basliksiz-1-1.png',
        'address'                => [
            '@type'           => 'PostalAddress',
            'streetAddress'   => $b_addr,
            'addressLocality' => 'Sarıkaya',
            'addressRegion'   => 'Yozgat',
            'postalCode'      => '66650',
            'addressCountry'  => 'TR'
        ],
        'geo'                    => [
            '@type'     => 'GeoCoordinates',
            'latitude'  => 39.4975,
            'longitude' => 35.3789
        ],
        'openingHoursSpecification' => [
            [
                '@type'     => 'OpeningHoursSpecification',
                'dayOfWeek' => ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'],
                'opens'     => '06:00',
                'closes'    => '23:45'
            ]
        ],
        'aggregateRating'        => [
            '@type'       => 'AggregateRating',
            'ratingValue' => $b_rating,
            'reviewCount' => $b_count,
            'bestRating'  => '5',
            'worstRating' => '1'
        ],
        'keywords'               => $b_key
    ];
    $schemas[] = $restaurant_schema;

    // Tekil Makale Sayfaları İçin Article / BlogPosting Schema
    if (is_single()) {
        $post_id   = get_the_ID();
        $author_id = get_post_field('post_author', $post_id);
        $thumb     = has_post_thumbnail($post_id) ? get_the_post_thumbnail_url($post_id, 'full') : get_post_meta($post_id, '_mis360_external_thumb', true);

        $article_schema = [
            '@context'         => 'https://schema.org',
            '@type'            => 'BlogPosting',
            'mainEntityOfPage' => [
                '@type' => 'WebPage',
                '@id'   => esc_url(get_permalink($post_id))
            ],
            'headline'         => wp_strip_all_tags(get_the_title($post_id)),
            'description'      => wp_strip_all_tags(get_the_excerpt($post_id)),
            'image'            => $thumb ?: get_template_directory_uri() . '/assets/img/demo/restaurant.jpg',
            'datePublished'    => get_the_date(DATE_W3C, $post_id),
            'dateModified'     => get_the_modified_date(DATE_W3C, $post_id),
            'author'           => [
                '@type' => 'Person',
                'name'  => get_the_author_meta('display_name', (int)$author_id) ?: 'Beyzade Şef Ekibi'
            ],
            'publisher'        => [
                '@type' => 'Organization',
                'name'  => 'Beyzade Et & Balık Restaurant',
                'logo'  => [
                    '@type' => 'ImageObject',
                    'url'   => get_template_directory_uri() . '/assets/img/demo/cropped-Basliksiz-1-1.png'
                ]
            ]
        ];
        $schemas[] = $article_schema;
    }

    // BreadcrumbList Şeması (Sayfa Hiyerarşisi)
    if (is_singular('post') || is_page()) {
        $breadcrumb_items = [
            [
                '@type'    => 'ListItem',
                'position' => 1,
                'name'     => 'Ana Sayfa',
                'item'     => esc_url(home_url('/'))
            ]
        ];

        if (is_singular('post')) {
            $breadcrumb_items[] = [
                '@type'    => 'ListItem',
                'position' => 2,
                'name'     => 'Haberler & Galeri',
                'item'     => esc_url(home_url('/haberler-galeri/'))
            ];
            $breadcrumb_items[] = [
                '@type'    => 'ListItem',
                'position' => 3,
                'name'     => wp_strip_all_tags(get_the_title()),
                'item'     => esc_url(get_permalink())
            ];
        } else {
            $breadcrumb_items[] = [
                '@type'    => 'ListItem',
                'position' => 2,
                'name'     => wp_strip_all_tags(get_the_title()),
                'item'     => esc_url(get_permalink())
            ];
        }

        $schemas[] = [
            '@context'        => 'https://schema.org',
            '@type'           => 'BreadcrumbList',
            'itemListElement' => $breadcrumb_items
        ];
    }

    // FAQPage Şeması (Yapay Zeka ve Arama Motoru Soru-Cevap Kutuları İçin)
    if (is_front_page()) {
        $schemas[] = [
            '@context'   => 'https://schema.org',
            '@type'      => 'FAQPage',
            'mainEntity' => [
                [
                    '@type'          => 'Question',
                    'name'           => 'Beyzade Et & Balık Restaurant saat kaçta açılıyor ve kapanıyor?',
                    'acceptedAnswer' => [
                        '@type' => 'Answer',
                        'text'  => 'Restoranımız haftanın her günü sabah saat 06:00\'da geleneksel sıcak çorba servisiyle açılmakta ve gece 23:45\'e kadar kesintisiz hizmet vermektedir.'
                    ]
                ],
                [
                    '@type'          => 'Question',
                    'name'           => 'Sarıkaya Beyzade Restaurant rezervasyon ve sipariş telefon numarası nedir?',
                    'acceptedAnswer' => [
                        '@type' => 'Answer',
                        'text'  => 'Masa rezervasyonu ve paket servis için 0535 830 93 07 numaralı telefondan arayabilir veya doğrudan WhatsApp üzerinden bizimle iletişime geçebilirsiniz.'
                    ]
                ],
                [
                    '@type'          => 'Question',
                    'name'           => 'Restoranda hangi yemek ve lezzet seçenekleri bulunmaktadır?',
                    'acceptedAnswer' => [
                        '@type' => 'Answer',
                        'text'  => 'Hakiki meşe kömüründe pişen Adana kebap, Urfa kebap, kuzu şiş, özel güveçte kuzu tandır, taş fırın kıymalı ve kuşbaşılı pideleri, lahmacun, et döner ve günlük taze deniz çuprası, kaya levreği çeşitleri servis edilmektedir.'
                    ]
                ],
                [
                    '@type'          => 'Question',
                    'name'           => 'Açık hava bahçe alanı ve çocuklu aile olanakları mevcut mudur?',
                    'acceptedAnswer' => [
                        '@type' => 'Answer',
                        'text'  => 'Evet, 2019 yılından bu yana hizmet veren restoranımızda çocuklar için mama sandalyesi, geniş aile masaları ve ferah açık hava bahçe salonu mevcuttur.'
                    ]
                ]
            ]
        ];
    }

    // JSON-LD çıktısını head içerisine yazdır
    foreach ($schemas as $schema) {
        echo "\n" . '<script type="application/ld+json">' . wp_json_encode($schema, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) . '</script>' . "\n";
    }
}
add_action('wp_head', 'mis360_render_schema_jsonld', 1);

/**
 * 2. Core Web Vitals & Kaynak Önyükleme (Preload & Preconnect)
 * LCP (Largest Contentful Paint) hızını artırmak ve CLS sıfırlamak için kritik kaynakları önyükler.
 */
function mis360_seo_resource_hints(): void {
    if (is_front_page()) {
        // Hero görselini en yüksek öncelikle (fetchpriority="high") önyükle
        echo '<link rel="preload" as="image" href="' . get_template_directory_uri() . '/assets/img/demo/banner-4-BEYZADE.png" fetchpriority="high">' . "\n";
    }
}
add_action('wp_head', 'mis360_seo_resource_hints', 2);

/**
 * 3. Ekstra Meta Etiketler (Keywords & Description)
 */
function mis360_seo_meta_tags(): void {
    $def_key  = 'Sarıkaya Restorant, Sarıkaya restoran, Sarıkaya Yemek, Sarıkaya Kıymalı, Sarıkaya Çorba, Sarıkaya Kebab, Sarıkaya Kebap';
    $b_key   = get_option('mis360_seo_keywords', $def_key) ?: $def_key;
    
    if (is_front_page()) {
        echo '<meta name="keywords" content="' . esc_attr($b_key) . '">' . "\n";
    }

}
add_action('wp_head', 'mis360_seo_meta_tags', 3);

