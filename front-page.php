<?php
/**
 * MİS360 Gourmet Restaurant & Bistro Front Page Template
 * 1:1 Denfora Architecture (Hero, Awards Marquee, Culinary Categories, Feature Boxes, Signature Dishes, Table Booking & Dark CTA)
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

$phone       = get_theme_mod('mis360_phone', '+90 212 360 00 00');
$clean_phone = preg_replace('/[^0-9+]/', '', $phone);
$whatsapp    = get_theme_mod('mis360_whatsapp', '905551234567');
?>

<!-- 1. Restaurant Hero Section (Denfora Exact Match) -->
<section class="hero" style="background: radial-gradient(circle at 80% 20%, rgba(239, 80, 39, 0.28) 0%, rgba(15, 23, 42, 0.96) 65%);">
    <div class="hero-bg">
        <div style="width: 100%; height: 100%; opacity: 0.18; background-image: radial-gradient(#ef5027 1px, transparent 1px); background-size: 24px 24px;"></div>
    </div>
    <div class="hero-overlay"></div>
    <div class="container">
        <div class="hero-content">
            <span style="display: inline-flex; align-items: center; gap: 8px; font-size: 13px; font-weight: 800; text-transform: uppercase; letter-spacing: 0.18em; color: var(--color-primary); margin-bottom: 16px; background: rgba(239, 80, 39, 0.12); padding: 6px 16px; border-radius: 9999px; border: 1px solid rgba(239, 80, 39, 0.25);">
                ✨ <?php esc_html_e('Gourmet Bistro & Fine Dining', 'mis360'); ?>
            </span>
            <h1 class="hero-title">
                <?php esc_html_e('Eşsiz Gastronomi Deneyimi', 'mis360'); ?><br>
                <span class="hero-highlight"><?php esc_html_e('Usta Şeflerin Dokunuşu', 'mis360'); ?></span>
            </h1>
            <p class="hero-description">
                <?php esc_html_e('Geleneksel lezzetlerin modern mutfak sanatıyla harmanlandığı MİS360 Bistro\'da, taze organik malzemeler ve damak çatlatan imza tariflerle unutulmaz anlar sizi bekliyor.', 'mis360'); ?>
            </p>
            <div class="hero-actions">
                <a href="#menu" class="btn btn-primary btn-lg">
                    <?php esc_html_e('A La Carte Menüyü İncele →', 'mis360'); ?>
                </a>
                <a href="#reservation" class="btn btn-outline-light btn-lg">
                    <?php esc_html_e('Masa Rezervasyonu Yap', 'mis360'); ?>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- 2. Awards & Accreditations Infinite Marquee Slider (Denfora Exact Architecture) -->
<section class="section-partners">
    <div class="partners-container">
        <span class="partners-label"><?php esc_html_e('Ödüllerimiz & Gastronomi Sertifikalarımız', 'mis360'); ?></span>
        <div class="partners-slider">
            <div class="partners-track">
                <div class="partner-logo">MICHELIN SELECTION 2026</div>
                <div class="partner-logo">GAULT & MILLAU</div>
                <div class="partner-logo">LE CORDON BLEU MASTER</div>
                <div class="partner-logo">YILIN EN İYİ BİSTROSU</div>
                <div class="partner-logo">SLOW FOOD TÜRKIYE</div>
                <div class="partner-logo">SOMMELIER SELECTION</div>
                <div class="partner-logo">%100 ORGANİK TARIM</div>
                <div class="partner-logo">TRIPADVISOR TRAVELLERS' CHOICE</div>
                <!-- Kesintisiz sonsuz döngü için tekrar -->
                <div class="partner-logo">MICHELIN SELECTION 2026</div>
                <div class="partner-logo">GAULT & MILLAU</div>
                <div class="partner-logo">LE CORDON BLEU MASTER</div>
                <div class="partner-logo">YILIN EN İYİ BİSTROSU</div>
                <div class="partner-logo">SLOW FOOD TÜRKIYE</div>
                <div class="partner-logo">SOMMELIER SELECTION</div>
                <div class="partner-logo">%100 ORGANİK TARIM</div>
                <div class="partner-logo">TRIPADVISOR TRAVELLERS' CHOICE</div>
            </div>
        </div>
    </div>
</section>

<!-- 3. Culinary Category Cards Grid (Denfora Exact Architecture) -->
<section class="section section-gray" id="categories">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title"><?php esc_html_e('Mutfaklarımız & Lezzet Kategorileri', 'mis360'); ?></h2>
            <p class="section-subtitle"><?php esc_html_e('Özenle seçilmiş yerel ve uluslararası reçetelerle hazırlanan zengin gastronomi seçkimiz.', 'mis360'); ?></p>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            
            <!-- Kategori 1: Dry Aged & Steak -->
            <a href="#menu" class="category-card">
                <div class="category-card-image" style="background: linear-gradient(135deg, #2b1108, #180802); display: flex; flex-direction: column; align-items: center; justify-content: center;">
                    <span style="font-size: 3.5rem; margin-bottom: 8px;">🥩</span>
                    <span style="color: #fda4af; font-size: 12px; font-weight: 700; text-transform: uppercase; letter-spacing: 0.1em;">Dry Aged 28 Gün</span>
                </div>
                <div class="category-card-overlay"></div>
                <div class="category-card-content">
                    <h3 class="category-card-title"><?php esc_html_e('Kömür Ateşinde Steak', 'mis360'); ?></h3>
                    <span class="category-card-count">12 Özel Et Çeşidi</span>
                </div>
            </a>

            <!-- Kategori 2: Deniz Ürünleri -->
            <a href="#menu" class="category-card">
                <div class="category-card-image" style="background: linear-gradient(135deg, #082f49, #021a29); display: flex; flex-direction: column; align-items: center; justify-content: center;">
                    <span style="font-size: 3.5rem; margin-bottom: 8px;">🦞</span>
                    <span style="color: #7dd3fc; font-size: 12px; font-weight: 700; text-transform: uppercase; letter-spacing: 0.1em;">Taze Ege Avları</span>
                </div>
                <div class="category-card-overlay"></div>
                <div class="category-card-content">
                    <h3 class="category-card-title"><?php esc_html_e('Deniz Ürünleri & Balık', 'mis360'); ?></h3>
                    <span class="category-card-count">8 İmza Spesiyal</span>
                </div>
            </a>

            <!-- Kategori 3: Taze El Yapımı Makarna -->
            <a href="#menu" class="category-card">
                <div class="category-card-image" style="background: linear-gradient(135deg, #382405, #1d1201); display: flex; flex-direction: column; align-items: center; justify-content: center;">
                    <span style="font-size: 3.5rem; margin-bottom: 8px;">🍝</span>
                    <span style="color: #fde047; font-size: 12px; font-weight: 700; text-transform: uppercase; letter-spacing: 0.1em;">Artisan El Yapımı</span>
                </div>
                <div class="category-card-overlay"></div>
                <div class="category-card-content">
                    <h3 class="category-card-title"><?php esc_html_e('Makarna & Risotto', 'mis360'); ?></h3>
                    <span class="category-card-count">7 İtalyan Reçetesi</span>
                </div>
            </a>

            <!-- Kategori 4: İmza Tatlılar -->
            <a href="#menu" class="category-card">
                <div class="category-card-image" style="background: linear-gradient(135deg, #3b0764, #1e0234); display: flex; flex-direction: column; align-items: center; justify-content: center;">
                    <span style="font-size: 3.5rem; margin-bottom: 8px;">🍫</span>
                    <span style="color: #d8b4fe; font-size: 12px; font-weight: 700; text-transform: uppercase; letter-spacing: 0.1em;">Belçika Çikolatası</span>
                </div>
                <div class="category-card-overlay"></div>
                <div class="category-card-content">
                    <h3 class="category-card-title"><?php esc_html_e('İmza Tatlılar & Fırın', 'mis360'); ?></h3>
                    <span class="category-card-count">6 Gurme Tatlı</span>
                </div>
            </a>

        </div>

        <div class="text-center mt-8">
            <a href="#menu" class="btn btn-outline-dark">
                <?php esc_html_e('Tüm Menüyü Görüntüle', 'mis360'); ?>
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <line x1="5" y1="12" x2="19" y2="12"></line>
                    <polyline points="12 5 19 12 12 19"></polyline>
                </svg>
            </a>
        </div>
    </div>
</section>

<!-- 4. "Neden MİS360 Restaurant?" Feature Cards (Denfora Exact Architecture) -->
<section class="section" id="chef">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title"><?php esc_html_e('Neden MİS360 Bistro?', 'mis360'); ?></h2>
            <p class="section-subtitle"><?php esc_html_e('Damak tadınıza hitap eden her tabakta en yüksek kalite, hijyen ve kusursuz servis standartları.', 'mis360'); ?></p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            
            <div class="feature-card">
                <div class="feature-card-icon">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"></path>
                    </svg>
                </div>
                <h3 class="feature-card-title"><?php esc_html_e('Çiftlikten Masaya', 'mis360'); ?></h3>
                <p class="feature-card-description"><?php esc_html_e('%100 yerel ve organik sertifikalı çiftliklerden günlük taze temin edilen mevsimsel ürünler.', 'mis360'); ?></p>
            </div>

            <div class="feature-card">
                <div class="feature-card-icon">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M6 13.87A8 8 0 0 1 12 4a8 8 0 0 1 6 9.87M6 17h12M6 21h12"></path>
                    </svg>
                </div>
                <h3 class="feature-card-title"><?php esc_html_e('Usta Şef Kadrosu', 'mis360'); ?></h3>
                <p class="feature-card-description"><?php esc_html_e('Uluslararası gastronomi deneyimine sahip şeflerimizin hazırladığı imza reçeteler.', 'mis360'); ?></p>
            </div>

            <div class="feature-card">
                <div class="feature-card-icon">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path>
                        <polyline points="9 12 11 14 15 10"></polyline>
                    </svg>
                </div>
                <h3 class="feature-card-title"><?php esc_html_e('Maksimum Hijyen', 'mis360'); ?></h3>
                <p class="feature-card-description"><?php esc_html_e('Açık mutfak konsepti, periyodik denetimler ve uluslararası hijyen standartları.', 'mis360'); ?></p>
            </div>

            <div class="feature-card">
                <div class="feature-card-icon">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <circle cx="12" cy="12" r="10"></circle>
                        <polyline points="12 6 12 12 16 14"></polyline>
                    </svg>
                </div>
                <h3 class="feature-card-title"><?php esc_html_e('Kusursuz Ambiyans', 'mis360'); ?></h3>
                <p class="feature-card-description"><?php esc_html_e('Romantik akşamlar, iş yemekleri ve özel kutlamalar için tasarlanmış seçkin salonlar.', 'mis360'); ?></p>
            </div>

        </div>
    </div>
</section>

<!-- 5. Featured Signature Dishes Grid (Denfora Product Cards Architecture) -->
<section class="section section-gray" id="menu">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title"><?php esc_html_e('Şefin İmza Tabakları', 'mis360'); ?></h2>
            <p class="section-subtitle"><?php esc_html_e('Menümüzün en çok tercih edilen ve övgü alan özel gurme spesiyalleri.', 'mis360'); ?></p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            
            <!-- Tabak 1: Dry Aged Antrikot -->
            <article class="product-card">
                <div class="product-card-image" style="background: #fafafa;">
                    <span style="font-size: 3.8rem;">🥩</span>
                </div>
                <div class="product-card-content">
                    <span class="product-card-category"><?php esc_html_e('KÖMÜR IZGARA • 28 GÜN DRY AGED', 'mis360'); ?></span>
                    <h3 class="product-card-title"><?php esc_html_e('Trüflü Dana Bonfile & Kuşkonmaz', 'mis360'); ?></h3>
                    <p style="font-size: 13px; color: var(--color-gray-500); line-height: 1.5; margin-bottom: 12px;">
                        Füme patates püresi, ızgara kuşkonmaz ve özel konyaklı demi-glace sos eşliğinde.
                    </p>
                    <div style="display: flex; align-items: center; justify-content: space-between; border-top: 1px solid var(--color-gray-100); padding-top: 10px; margin-top: auto;">
                        <span style="font-size: 18px; font-weight: 800; color: var(--color-black);">₺680</span>
                        <a href="https://wa.me/<?php echo esc_attr($whatsapp); ?>?text=<?php echo rawurlencode('Merhaba, Trüflü Dana Bonfile için sipariş/rezervasyon bilgisi almak istiyorum.'); ?>" target="_blank" class="btn btn-primary btn-sm" style="font-size: 12px; padding: 4px 10px;">
                            Rezervasyon
                        </a>
                    </div>
                </div>
            </article>

            <!-- Tabak 2: Kömürde Ahtapot -->
            <article class="product-card">
                <div class="product-card-image" style="background: #fafafa;">
                    <span style="font-size: 3.8rem;">🐙</span>
                </div>
                <div class="product-card-content">
                    <span class="product-card-category"><?php esc_html_e('EGE DENİZİ • ŞEFİN İMZASI', 'mis360'); ?></span>
                    <h3 class="product-card-title"><?php esc_html_e('Kömürde Izgara Ahtapot & Fava', 'mis360'); ?></h3>
                    <p style="font-size: 13px; color: var(--color-gray-500); line-height: 1.5; margin-bottom: 12px;">
                        Bodrum favası, taze otlu zeytinyağlı marine sos, fırınlanmış kapari ve rezene ile.
                    </p>
                    <div style="display: flex; align-items: center; justify-content: space-between; border-top: 1px solid var(--color-gray-100); padding-top: 10px; margin-top: auto;">
                        <span style="font-size: 18px; font-weight: 800; color: var(--color-black);">₺540</span>
                        <a href="https://wa.me/<?php echo esc_attr($whatsapp); ?>?text=<?php echo rawurlencode('Merhaba, Kömürde Izgara Ahtapot siparişi vermek istiyorum.'); ?>" target="_blank" class="btn btn-primary btn-sm" style="font-size: 12px; padding: 4px 10px;">
                            Rezervasyon
                        </a>
                    </div>
                </div>
            </article>

            <!-- Tabak 3: Kuzu Gerdan Risotto -->
            <article class="product-card">
                <div class="product-card-image" style="background: #fafafa;">
                    <span style="font-size: 3.8rem;">🍲</span>
                </div>
                <div class="product-card-content">
                    <span class="product-card-category"><?php esc_html_e('AĞIR ATEŞTE FIRIN • 8 SAAT', 'mis360'); ?></span>
                    <h3 class="product-card-title"><?php esc_html_e('Fırın Kuzu Gerdan & Safranlı Risotto', 'mis360'); ?></h3>
                    <p style="font-size: 13px; color: var(--color-gray-500); line-height: 1.5; margin-bottom: 12px;">
                        Tandır kıvamında kemiksiz kuzu gerdan, safranlı carnaroli pirinci ve eski kaşar çıtırı.
                    </p>
                    <div style="display: flex; align-items: center; justify-content: space-between; border-top: 1px solid var(--color-gray-100); padding-top: 10px; margin-top: auto;">
                        <span style="font-size: 18px; font-weight: 800; color: var(--color-black);">₺590</span>
                        <a href="https://wa.me/<?php echo esc_attr($whatsapp); ?>?text=<?php echo rawurlencode('Merhaba, Kuzu Gerdan Risotto hakkında bilgi almak istiyorum.'); ?>" target="_blank" class="btn btn-primary btn-sm" style="font-size: 12px; padding: 4px 10px;">
                            Rezervasyon
                        </a>
                    </div>
                </div>
            </article>

            <!-- Tabak 4: Sıcak Sufle -->
            <article class="product-card">
                <div class="product-card-image" style="background: #fafafa;">
                    <span style="font-size: 3.8rem;">🍨</span>
                </div>
                <div class="product-card-content">
                    <span class="product-card-category"><?php esc_html_e('BELÇİKA ÇİKOLATASI • İMZA TATLI', 'mis360'); ?></span>
                    <h3 class="product-card-title"><?php esc_html_e('Akışkan Sıcak Sufle & Dondurma', 'mis360'); ?></h3>
                    <p style="font-size: 13px; color: var(--color-gray-500); line-height: 1.5; margin-bottom: 12px;">
                        %70 Callebaut bitter çikolatası, Madagaskar vanilyalı taze dondurma ve antep fıstığı.
                    </p>
                    <div style="display: flex; align-items: center; justify-content: space-between; border-top: 1px solid var(--color-gray-100); padding-top: 10px; margin-top: auto;">
                        <span style="font-size: 18px; font-weight: 800; color: var(--color-black);">₺260</span>
                        <a href="https://wa.me/<?php echo esc_attr($whatsapp); ?>?text=<?php echo rawurlencode('Merhaba, Sıcak Sufle için rezervasyonuma not düşmek istiyorum.'); ?>" target="_blank" class="btn btn-primary btn-sm" style="font-size: 12px; padding: 4px 10px;">
                            Rezervasyon
                        </a>
                    </div>
                </div>
            </article>

        </div>

        <div class="text-center mt-8">
            <a href="https://wa.me/<?php echo esc_attr($whatsapp); ?>?text=<?php echo rawurlencode('Merhaba, güncel restoran menünüzü PDF olarak iletebilir misiniz?'); ?>" target="_blank" class="btn btn-primary">
                <?php esc_html_e('Tam Menüyü WhatsApp\'tan İste (PDF) →', 'mis360'); ?>
            </a>
        </div>
    </div>
</section>

<!-- 6. Online Table Reservation Section -->
<section class="section" id="reservation" style="background: #ffffff;">
    <div class="container">
        <div style="max-width: 860px; margin: 0 auto; background: var(--color-gray-50); border: 1px solid var(--color-gray-200); border-radius: 20px; padding: 40px 30px; box-shadow: var(--shadow-md);">
            <div class="text-center" style="margin-bottom: 30px;">
                <span style="font-size: 12px; font-weight: 800; text-transform: uppercase; letter-spacing: 0.15em; color: var(--color-primary);">
                    ONLINE REZERVASYON
                </span>
                <h2 style="font-size: 28px; font-weight: 800; margin: 6px 0 8px; color: var(--color-black);">
                    <?php esc_html_e('Bu Akşam İçin Masanızı Ayırtın', 'mis360'); ?>
                </h2>
                <p style="color: var(--color-gray-500); font-size: 14px;">
                    <?php esc_html_e('Rezervasyon talebiniz yetkili şefimiz tarafından anında teyit edilerek WhatsApp üzerinden SMS/Mesaj ile iletilecektir.', 'mis360'); ?>
                </p>
            </div>

            <form onsubmit="event.preventDefault(); const name=document.getElementById('rName').value; const date=document.getElementById('rDate').value; const time=document.getElementById('rTime').value; const guests=document.getElementById('rGuests').value; window.open('https://wa.me/<?php echo esc_attr($whatsapp); ?>?text=' + encodeURIComponent('Masa Rezervasyon Talebi:\nAd: ' + name + '\nTarih: ' + date + '\nSaat: ' + time + '\nKişi Sayısı: ' + guests + ' Kişi'), '_blank');">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4" style="margin-bottom: 20px;">
                    <div>
                        <label style="display: block; font-size: 13px; font-weight: 700; margin-bottom: 6px; color: #1e293b;">Adınız Soyadınız *</label>
                        <input type="text" id="rName" placeholder="Örn: Ahmet Yılmaz" required style="width: 100%; padding: 12px 16px; border: 1px solid var(--color-gray-300); border-radius: 8px; font-size: 14px; background: #ffffff;">
                    </div>
                    <div>
                        <label style="display: block; font-size: 13px; font-weight: 700; margin-bottom: 6px; color: #1e293b;">Kişi Sayısı *</label>
                        <select id="rGuests" style="width: 100%; padding: 12px 16px; border: 1px solid var(--color-gray-300); border-radius: 8px; font-size: 14px; background: #ffffff;">
                            <option value="2">2 Kişilik Masa (Romantik)</option>
                            <option value="4">4 Kişilik Aile Masası</option>
                            <option value="6">6 Kişilik Grup Masası</option>
                            <option value="8+">8+ Kişilik VIP Salon</option>
                        </select>
                    </div>
                    <div>
                        <label style="display: block; font-size: 13px; font-weight: 700; margin-bottom: 6px; color: #1e293b;">Tarih *</label>
                        <input type="date" id="rDate" required style="width: 100%; padding: 12px 16px; border: 1px solid var(--color-gray-300); border-radius: 8px; font-size: 14px; background: #ffffff;">
                    </div>
                    <div>
                        <label style="display: block; font-size: 13px; font-weight: 700; margin-bottom: 6px; color: #1e293b;">Saat Tercihi *</label>
                        <select id="rTime" style="width: 100%; padding: 12px 16px; border: 1px solid var(--color-gray-300); border-radius: 8px; font-size: 14px; background: #ffffff;">
                            <option value="18:30">18:30 Akşam Yemeği</option>
                            <option value="19:30">19:30 Akşam Yemeği</option>
                            <option value="20:30">20:30 Akşam Yemeği</option>
                            <option value="21:30">21:30 Akşam Yemeği</option>
                            <option value="13:00">13:00 Öğle Servisi</option>
                        </select>
                    </div>
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-primary btn-lg" style="width: 100%; max-width: 440px; height: 50px; font-size: 15px;">
                        🟢 Masa Rezervasyonunu WhatsApp İle Gönder →
                    </button>
                </div>
            </form>
        </div>
    </div>
</section>

<!-- 7. Dark CTA Section (Denfora Exact Architecture) -->
<section class="section section-dark" id="contact">
    <div class="container">
        <div class="text-center" style="max-width: 720px; margin: 0 auto;">
            <h2 class="section-title" style="color: var(--color-white);">
                <?php esc_html_e('Özel Davet & Kutlamalarınız İçin Masanız Hazır', 'mis360'); ?>
            </h2>
            <p class="section-subtitle" style="color: var(--color-gray-400);">
                <?php esc_html_e('Doğum günleri, iş yemekleri veya romantik anlar için dilediğiniz zaman rezervasyon oluşturabilir veya bize ulaşabilirsiniz.', 'mis360'); ?>
            </p>
            <div class="flex flex-wrap gap-4 justify-center mt-8">
                <a href="tel:<?php echo esc_attr($clean_phone); ?>" class="btn btn-primary btn-lg">
                    📞 <?php echo esc_html($phone); ?>
                </a>
                <a href="https://wa.me/<?php echo esc_attr($whatsapp); ?>?text=<?php echo rawurlencode('Merhaba, özel bir davet için restoranınız hakkında detaylı bilgi almak istiyorum:'); ?>" class="btn btn-whatsapp btn-lg" target="_blank" rel="noopener noreferrer">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347z"/>
                    </svg>
                    <span>WhatsApp Rezervasyon</span>
                </a>
            </div>
        </div>
    </div>
</section>

<?php
get_footer();
