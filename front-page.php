<?php
/**
 * Beyzade Et & Balık Restaurant - Front Page Template
 * 1:1 Denfora Architecture with Authentic Beyzade Restaurant Data & Real Assets
 * Fiyat vurgusu kaldırılmış, ürün kalitesi ve zengin menü ön plana çıkarılmıştır.
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

$phone       = '0535 830 93 07';
$clean_phone = '+905358309307';
$whatsapp    = '905358309307';

// Tema ayarlarından verileri çek
$intro_enabled = get_option('mis360_intro_enabled', '1');
$intro_video_url = get_option('mis360_intro_video_url', 'https://beyzadeetbalikrestaurant.com.tr/wp-content/uploads/intro.mp4');

$is_youtube = false;
$youtube_id = '';
if (preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/\s]{11})%i', $intro_video_url, $match)) {
    $is_youtube = true;
    $youtube_id = $match[1];
}

if ($intro_enabled === '1' && !empty($intro_video_url)) :
?>

<!-- ==========================================
     VİDEO INTRO POPUP (Sadece Ana Sayfada)
=========================================== -->
<div id="beyzade-intro-popup" class="intro-popup-overlay" style="display: none;">
    <div class="intro-popup-content">
        
        <!-- Video Çerçevesi -->
        <div class="intro-video-frame">
            <?php if ($is_youtube) : ?>
                <!-- YouTube Video -->
                <div id="youtube-player-container" class="intro-video-element" style="pointer-events: none;"></div>
            <?php else : ?>
                <!-- MP4 Video -->
                <video id="intro-video" class="intro-video-element" playsinline preload="auto">
                    <source src="<?php echo esc_url($intro_video_url); ?>" type="video/mp4">
                    Tarayıcınız video etiketini desteklemiyor.
                </video>
            <?php endif; ?>
        </div>

        <!-- Alt Kontrol Alanı (Sayaç ve Buton) -->
        <div class="intro-controls">
            <div id="intro-timer-box" class="intro-timer">
                Reklamı geçmek için: <span id="intro-sec">0</span> saniye
            </div>
            <button id="intro-close-btn" class="intro-close-btn">Geç ⏭</button>
        </div>

    </div>
</div>

<script>
window.addEventListener("load", function() {
    var introPopup = document.getElementById('beyzade-intro-popup');
    var closeBtn = document.getElementById('intro-close-btn');
    var timerBox = document.getElementById('intro-timer-box');
    var secSpan = document.getElementById('intro-sec');
    var introSeen = sessionStorage.getItem('beyzade_intro_seen');
    var isYouTube = <?php echo $is_youtube ? 'true' : 'false'; ?>;
    
    if (!introSeen) {
        // Kapatma Fonksiyonu
        function closeIntro() {
            introPopup.classList.remove('show-intro');
            setTimeout(function() {
                introPopup.style.display = 'none';
                document.body.style.overflow = ''; 
                sessionStorage.setItem('beyzade_intro_seen', 'true');
                
                if (isYouTube && window.ytPlayer && typeof window.ytPlayer.pauseVideo === 'function') {
                    window.ytPlayer.pauseVideo();
                } else if (!isYouTube) {
                    var vid = document.getElementById('intro-video');
                    if (vid) { vid.pause(); vid.currentTime = 0; }
                }
            }, 800);
        }

        closeBtn.addEventListener('click', closeIntro);

        // 0'dan 5'e Sayaç Başlatma Fonksiyonu
        function startIntroTimer() {
            var currentSec = 0;
            var timerInterval = setInterval(function() {
                currentSec++;
                if (currentSec <= 5) {
                    if (secSpan) secSpan.innerText = currentSec;
                }
                if (currentSec >= 5) {
                    clearInterval(timerInterval);
                    if (timerBox) timerBox.style.display = 'none';
                    if (closeBtn) closeBtn.style.display = 'inline-flex';
                }
            }, 1000);
        }

        // Site açıldıktan 1 saniye sonra Intro'yu başlat
        setTimeout(function() {
            introPopup.style.display = 'flex';
            
            setTimeout(function() {
                introPopup.classList.add('show-intro');
            }, 50);

            document.body.style.overflow = 'hidden';

            if (!isYouTube) {
                // ---- MP4 YEREL VİDEO İŞLEMLERİ ----
                var introVideo = document.getElementById('intro-video');
                var playPromise = introVideo.play();
                if (playPromise !== undefined) {
                    playPromise.catch(function(error) {
                        introVideo.muted = true;
                        introVideo.play();
                    });
                }
                introVideo.addEventListener('ended', closeIntro);
                
                // Videonun başladığı varsayımıyla sayacı başlat
                startIntroTimer();

            } else {
                // ---- YOUTUBE API İŞLEMLERİ ----
                var tag = document.createElement('script');
                tag.src = "https://www.youtube.com/iframe_api";
                var firstScriptTag = document.getElementsByTagName('script')[0];
                firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);
                
                window.onYouTubeIframeAPIReady = function() {
                    window.ytPlayer = new YT.Player('youtube-player-container', {
                        videoId: '<?php echo esc_js($youtube_id); ?>',
                        playerVars: {
                            'autoplay': 1,
                            'controls': 0,
                            'rel': 0,
                            'showinfo': 0,
                            'mute': 0,
                            'playsinline': 1,
                            'fs': 0,
                            'disablekb': 1
                        },
                        events: {
                            'onReady': function(event) {
                                event.target.playVideo();
                                setTimeout(function() {
                                    if(event.target.getPlayerState() !== 1) { // 1 = playing
                                        event.target.mute();
                                        event.target.playVideo();
                                    }
                                }, 500);
                            },
                            'onStateChange': function(event) {
                                if (event.data === YT.PlayerState.PLAYING) {
                                    // YouTube videosu oynadığında sayacı başlat
                                    if (!window.ytTimerStarted) {
                                        window.ytTimerStarted = true;
                                        startIntroTimer();
                                    }
                                }
                                if (event.data === YT.PlayerState.ENDED) {
                                    closeIntro(); // Bitince kapat
                                }
                            }
                        }
                    });
                };
            }
        }, 1000); // 1 saniyelik site görme gecikmesi
    }
});
</script>
<!-- ========================================== -->
<?php endif; ?>

<!-- 1. Hero Section (Denfora 1:1 Architecture with Authentic Beyzade Ambience) -->

<section class="hero" style="background: linear-gradient(rgba(17, 24, 39, 0.55), rgba(17, 24, 39, 0.72)), url('<?php echo get_template_directory_uri(); ?>/assets/img/demo/banner-4-BEYZADE.png') center/cover no-repeat;">
    <div class="hero-overlay"></div>
    <div class="container">
        <div class="hero-content">
            <div class="hero-badge">
                <span>⭐ 4.3 (448 Google Yorumu)</span>
                <span style="opacity: 0.5;">•</span>
                <span>Sarıkaya / Yozgat</span>
            </div>
            <h1 class="hero-title">
                Beyzade Et & Balık Restaurant<br>
                <span class="hero-highlight">2019'dan Beri Değişmeyen Lezzet Geleneği</span>
            </h1>
            <p class="hero-description">
                Yozgat Sarıkaya'da meşe kömürü ateşinde usta ellerce hazırlanan kebaplar, günlük taze balık çeşitleri, taş fırın pideleri ve sıcacık aile ortamıyla unutulmaz sofralara ev sahipliği yapıyoruz.
            </p>
            <div class="hero-actions">
                <a href="#menu" class="btn btn-primary btn-lg">
                    Zengin Menümüzü Keşfedin →
                </a>
                <a href="https://wa.me/<?php echo esc_attr($whatsapp); ?>?text=<?php echo rawurlencode('Merhaba Beyzade Restaurant, masa ayırtmak istiyorum:'); ?>" class="btn btn-whatsapp btn-lg" target="_blank" rel="noopener noreferrer">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
                    </svg>
                    <span>WhatsApp İle Masa Rezervasyonu</span>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- 2. Infinite Marquee Slider (Denfora Exact Architecture) -->
<section class="section-partners">
    <div class="partners-container">
        <span class="partners-label">BEYZADE AYRICALIKLARI</span>
        <div class="partners-slider">
            <div class="partners-track">
                <div class="partner-logo">10+ YILLIK DENEYİM</div>
                <div class="partner-logo">MEŞE KÖMÜRÜNDE KEBAPLAR</div>
                <div class="partner-logo">TAŞ FIRIN PİDE & LAHMACUN</div>
                <div class="partner-logo">GÜNLÜK TAZE BALIK REYONU</div>
                <div class="partner-logo">ÖZEL KUZU TANDIR & DESTİ KEBABI</div>
                <div class="partner-logo">AÇIK HAVA BAHÇE BÖLÜMÜ</div>
                <div class="partner-logo">MAMA SANDALYESİ & AİLE SALONU</div>
                <div class="partner-logo">SABAH 06:00 AÇILIŞ • GECE 23:45 KESİNTİSİZ HİZMET</div>
                <!-- Kesintisiz sonsuz döngü için tekrar -->
                <div class="partner-logo">10+ YILLIK DENEYİM</div>
                <div class="partner-logo">MEŞE KÖMÜRÜNDE KEBAPLAR</div>
                <div class="partner-logo">TAŞ FIRIN PİDE & LAHMACUN</div>
                <div class="partner-logo">GÜNLÜK TAZE BALIK REYONU</div>
                <div class="partner-logo">ÖZEL KUZU TANDIR & DESTİ KEBABI</div>
                <div class="partner-logo">AÇIK HAVA BAHÇE BÖLÜMÜ</div>
                <div class="partner-logo">MAMA SANDALYESİ & AİLE SALONU</div>
                <div class="partner-logo">SABAH 06:00 AÇILIŞ • GECE 23:45 KESİNTİSİZ HİZMET</div>
            </div>
        </div>
    </div>
</section>

<!-- 3. Mutfak Kategorileri (Denfora 1:1 Kartlar - Gerçek Beyzade Görselleriyle) -->
<section class="section section-gray" id="categories">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title">Lezzet Dünyamız</h2>
            <p class="section-subtitle">Taze malzemeler, hijyenik üretim anlayışı ve usta ellerden çıkan zengin menü kategorilerimiz.</p>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            
            <!-- Kategori 1: Kebaplar -->
            <a href="#kebaplar" class="category-card">
                <div class="category-card-image" style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/img/demo/adana-kebap-beyzade-1024x819.png'); background-size: cover; background-position: center;"></div>
                <div class="category-card-overlay"></div>
                <div class="category-card-content">
                    <h3 class="category-card-title">Kebap Çeşitlerimiz</h3>
                    <span class="category-card-count">Adana, Kuzu Şiş, Beyti, Tandır</span>
                </div>
            </a>

            <!-- Kategori 2: Pideler & Lahmacun -->
            <a href="#pideler" class="category-card">
                <div class="category-card-image" style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/img/demo/karisik-pide-beyzade-1024x819.png'); background-size: cover; background-position: center;"></div>
                <div class="category-card-overlay"></div>
                <div class="category-card-content">
                    <h3 class="category-card-title">Pide & Lahmacun</h3>
                    <span class="category-card-count">Kuşbaşılı, Kaşarlı, Kıymalı</span>
                </div>
            </a>

            <!-- Kategori 3: Döner & İskender -->
            <a href="#donerler" class="category-card">
                <div class="category-card-image" style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/img/demo/beyzade-iskender-1024x819.png'); background-size: cover; background-position: center;"></div>
                <div class="category-card-overlay"></div>
                <div class="category-card-content">
                    <h3 class="category-card-title">Döner & İskender</h3>
                    <span class="category-card-count">Tereyağlı İskender, Yaprak Döner</span>
                </div>
            </a>

            <!-- Kategori 4: Tatlılar -->
            <a href="#tatlilar" class="category-card">
                <div class="category-card-image" style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/img/demo/beyzade-kunefe-1024x819.png'); background-size: cover; background-position: center;"></div>
                <div class="category-card-overlay"></div>
                <div class="category-card-content">
                    <h3 class="category-card-title">Tatlılarımız</h3>
                    <span class="category-card-count">Künefe, Fırın Sütlaç, Sufle</span>
                </div>
            </a>

        </div>
    </div>
</section>

<?php
// Slider Ayarlarını Çek
$slider_enabled = get_option('mis360_slider_enabled', '1');
$slider_images = [];
for ($i = 1; $i <= 5; $i++) {
    $img = get_option('mis360_slider_img_' . $i, '');
    if (!empty($img)) {
        $slider_images[] = $img;
    }
}

if ($slider_enabled == '1' && !empty($slider_images)) :
?>
<!-- RESTORANIMIZDAN KARELER (Dinamik Slider) -->
<section class="restaurant-gallery-slider section" style="background: #f8fafc; padding: 60px 0; overflow: hidden;">
    <div class="container">
        <div class="section-header text-center" style="margin-bottom: 40px;">
            <span class="section-badge">GALERİ</span>
            <h2 class="section-title">Restoranımızdan Kareler</h2>
        </div>
        
        <div class="mis360-slider-container" style="position: relative; max-width: 1000px; margin: 0 auto; border-radius: 12px; overflow: hidden; box-shadow: 0 10px 30px rgba(0,0,0,0.1);">
            <div class="mis360-slider-track" style="display: flex; transition: transform 0.5s ease-in-out; height: 500px;">
                <?php foreach ($slider_images as $index => $img_url) : ?>
                    <div class="mis360-slide" style="min-width: 100%; height: 100%;">
                        <img src="<?php echo esc_url($img_url); ?>" alt="Beyzade Restaurant Galeri <?php echo $index + 1; ?>" style="width: 100%; height: 100%; object-fit: cover;">
                    </div>
                <?php endforeach; ?>
            </div>
            
            <?php if (count($slider_images) > 1) : ?>
            <!-- Slider Butonları -->
            <button class="mis360-slider-btn prev-btn" aria-label="Önceki Görsel" style="position: absolute; top: 50%; left: 20px; transform: translateY(-50%); background: rgba(0,0,0,0.5); color: #fff; border: none; width: 40px; height: 40px; border-radius: 50%; cursor: pointer; display: flex; align-items: center; justify-content: center; z-index: 10;">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M15 18l-6-6 6-6"/></svg>
            </button>
            <button class="mis360-slider-btn next-btn" aria-label="Sonraki Görsel" style="position: absolute; top: 50%; right: 20px; transform: translateY(-50%); background: rgba(0,0,0,0.5); color: #fff; border: none; width: 40px; height: 40px; border-radius: 50%; cursor: pointer; display: flex; align-items: center; justify-content: center; z-index: 10;">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M9 18l6-6-6-6"/></svg>
            </button>
            
            <!-- Slider Noktaları -->
            <div class="mis360-slider-dots" style="position: absolute; bottom: 20px; left: 0; right: 0; display: flex; justify-content: center; gap: 8px; z-index: 10;">
                <?php foreach ($slider_images as $index => $img_url) : ?>
                    <button class="mis360-dot <?php echo $index === 0 ? 'active' : ''; ?>" data-index="<?php echo $index; ?>" aria-label="Görsel <?php echo $index + 1; ?>" style="width: 10px; height: 10px; border-radius: 50%; background: <?php echo $index === 0 ? '#fff' : 'rgba(255,255,255,0.5)'; ?>; border: none; cursor: pointer; padding: 0; transition: background 0.3s;"></button>
                <?php endforeach; ?>
            </div>
            
            <script>
            document.addEventListener('DOMContentLoaded', function() {
                const track = document.querySelector('.mis360-slider-track');
                const slides = document.querySelectorAll('.mis360-slide');
                const dots = document.querySelectorAll('.mis360-dot');
                const prevBtn = document.querySelector('.prev-btn');
                const nextBtn = document.querySelector('.next-btn');
                
                let currentIndex = 0;
                const slideCount = slides.length;
                let autoPlayInterval;
                
                function updateSlider() {
                    track.style.transform = `translateX(-${currentIndex * 100}%)`;
                    dots.forEach((dot, idx) => {
                        dot.style.background = idx === currentIndex ? '#fff' : 'rgba(255,255,255,0.5)';
                    });
                }
                
                function nextSlide() {
                    currentIndex = (currentIndex + 1) % slideCount;
                    updateSlider();
                }
                
                function prevSlide() {
                    currentIndex = (currentIndex - 1 + slideCount) % slideCount;
                    updateSlider();
                }
                
                function startAutoPlay() {
                    autoPlayInterval = setInterval(nextSlide, 5000);
                }
                
                function stopAutoPlay() {
                    clearInterval(autoPlayInterval);
                }
                
                if(nextBtn && prevBtn) {
                    nextBtn.addEventListener('click', () => { nextSlide(); stopAutoPlay(); startAutoPlay(); });
                    prevBtn.addEventListener('click', () => { prevSlide(); stopAutoPlay(); startAutoPlay(); });
                    
                    dots.forEach(dot => {
                        dot.addEventListener('click', (e) => {
                            currentIndex = parseInt(e.target.getAttribute('data-index'));
                            updateSlider();
                            stopAutoPlay();
                            startAutoPlay();
                        });
                    });
                    
                    startAutoPlay();
                }
            });
            </script>
            <?php endif; ?>
        </div>
    </div>
</section>
<?php endif; ?>

<!-- 4. NEDEN BEYZADE? (Orijinal Doğal Restoran Mimarisi) -->
<section class="chooseUs__area section" id="about">
    <div class="container">
        
        <!-- Bölüm Üst Etiket -->
        <div class="chooseUs__top-label">
            <span class="chooseUs__subtitle">NEDEN BEYZADE?</span>
        </div>

        <!-- 3 Sütunlu Ana Izgara: Görsel | Başlık + Metin + Butonlar | Sayaç + Özellikler -->
        <div class="chooseUs__grid">

            <!-- SÜTUN 1: Restoran Görseli -->
            <div class="chooseUs__image-col">
                <div class="chooseUs__image-wrap">
                    <img
                        src="<?php echo get_template_directory_uri(); ?>/assets/img/demo/restaurant.jpg"
                        alt="Beyzade Restaurant - Aile Yemek Salonu ve Masa Düzeni, Sarıkaya Yozgat"
                        class="chooseUs__main-image"
                        width="540" height="480"
                        loading="lazy"
                    >
                    <!-- Görsel Üstü Yıl Rozeti -->
                    <div class="chooseUs__image-badge">
                        <span class="badge-number">2019</span>
                        <span class="badge-text">yılından beri</span>
                    </div>
                </div>
            </div>

            <!-- SÜTUN 2: Başlık, Açıklama, Butonlar -->
            <div class="chooseUs__center-col">
                <h2 class="chooseUs__title">Lezzet, Konfor ve Aile Atmosferi Bir Arada</h2>
                <p class="chooseUs__description">
                    2019 yılından bu yana Yozgat Sarıkaya'da hizmet veren <strong>Beyzade Et &amp; Balık Restaurant</strong> olarak; et, balık, kebap ve yöresel lezzetlerimizi misafirlerimizle buluşturuyoruz. Kaliteli malzemeler, hijyenik üretim anlayışı ve güler yüzlü hizmetimizle ailelerin ve lezzet tutkunlarının vazgeçilmez adresi olmaya devam ediyoruz.
                </p>
                <div class="chooseUs__actions">
                    <a href="#reservation" class="btn btn-primary btn-md">
                        Masa Rezervasyonu Yap →
                    </a>
                    <a href="tel:<?php echo esc_attr($clean_phone); ?>" class="btn btn-outline-dark btn-md">
                        📞 <?php echo esc_html($phone); ?>
                    </a>
                </div>
            </div>

            <!-- SÜTUN 3: Sayaç + Özellikler -->
            <div class="chooseUs__right-col">

                <!-- Yıllık Lezzet Sayacı -->
                <div class="chooseUs__counter">
                    <span class="chooseUs__counter-number">7+</span>
                    <span class="chooseUs__counter-label">Yıllık Lezzet Deneyimi</span>
                </div>

                <!-- Özellik Kartları -->
                <div class="chooseUs__features">

                    <div class="chooseUs__feature-item">
                        <div class="chooseUs__feature-icon">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/demo/beyzadelogo1-66.png" alt="Beyzade Logo" width="40" height="40" loading="lazy">
                        </div>
                        <div class="chooseUs__feature-text">
                            <h3>Özenli Hizmet Anlayışı</h3>
                            <p>Misafir memnuniyetini ön planda tutan profesyonel ekibimizle, sıcak ve kaliteli bir restoran deneyimi sunuyoruz.</p>
                        </div>
                    </div>

                    <div class="chooseUs__feature-item">
                        <div class="chooseUs__feature-icon">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/demo/beyzadelogo1-66.png" alt="Beyzade Logo" width="40" height="40" loading="lazy">
                        </div>
                        <div class="chooseUs__feature-text">
                            <h3>Zengin Menü Seçenekleri</h3>
                            <p>Et, balık, kebap ve özel lezzetlerden oluşan menümüz ile her damak tadına hitap eden unutulmaz sofralar hazırlıyoruz.</p>
                        </div>
                    </div>

                    <div class="chooseUs__feature-item">
                        <div class="chooseUs__feature-icon">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/demo/beyzadelogo1-66.png" alt="Beyzade Logo" width="40" height="40" loading="lazy">
                        </div>
                        <div class="chooseUs__feature-text">
                            <h3>Aile ve Grup Ortamı</h3>
                            <p>Açık hava bahçe, klimalı iç salon ve özel davet masalarıyla her türlü organizasyona hazır geniş mekânımız.</p>
                        </div>
                    </div>

                </div>

            </div>

        </div>

    </div>
</section>

<!-- 5. BEYZADE RESMİ MENÜSÜ (Tüm Sitedeki Gerçek Menü ve Fotoğraflar) -->
<section class="section section-gray" id="menu">
    <div class="container">
        
        <div class="section-header text-center">
            <span style="color: var(--color-primary); font-size: 13px; font-weight: 800; letter-spacing: 0.15em; text-transform: uppercase;">
                GURME LEZZETLER
            </span>
            <h2 class="section-title" style="margin-top: 6px;">Beyzade Restaurant Menümüz</h2>
            <p class="section-subtitle">
                Geleneksel tarifler, kaliteli sunumlar ve usta şeflerimizin elinden çıkan zengin menümüz.
            </p>
        </div>

        <!-- BÖLÜM 1: KEBAP ÇEŞİTLERİMİZ -->
        <div id="kebaplar" style="margin-bottom: 60px;">
            <div style="display: flex; align-items: center; justify-content: space-between; border-bottom: 2px solid var(--color-gray-200); padding-bottom: 12px; margin-bottom: 24px;">
                <h3 style="font-size: 24px; font-weight: 800; color: var(--color-black); margin: 0; display: flex; align-items: center; gap: 8px;">
                    🥩 Kebap Çeşitlerimiz
                </h3>
                <span style="font-size: 13px; color: var(--color-gray-500); font-weight: 600;">Meşe Kömüründe Közlenir</span>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                
                <!-- Adana Kebap -->
                <article class="product-card">
                    <div class="product-card-image food-card-image">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/demo/adana-kebap-beyzade-1024x819.png" alt="Adana Kebap" loading="lazy" style="width: 100%; height: 200px; object-fit: cover;">
                    </div>
                    <div class="product-card-content">
                        <span class="product-card-category">KÖMÜRDE IZGARA</span>
                        <h4 class="product-card-title">Adana Kebap</h4>
                        <p style="font-size: 13px; color: var(--color-gray-500); line-height: 1.5; margin-bottom: 14px;">
                            Özel zırh kıyması, közlenmiş domates, biber, sumaklı soğan ve sıcak lavaş eşliğinde.
                        </p>
                        <a href="https://wa.me/<?php echo esc_attr($whatsapp); ?>?text=<?php echo rawurlencode('Merhaba Beyzade Restaurant, Adana Kebap siparişi / rezervasyonu vermek istiyorum.'); ?>" target="_blank" class="btn btn-outline-dark btn-sm btn-full" style="font-size: 13px;">
                            Rezervasyon & Sipariş
                        </a>
                    </div>
                </article>

                <!-- Urfa Kebap -->
                <article class="product-card">
                    <div class="product-card-image food-card-image">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/demo/urfa-kebap-beyzade-1-1024x819.png" alt="Urfa Kebap" loading="lazy" style="width: 100%; height: 200px; object-fit: cover;">
                    </div>
                    <div class="product-card-content">
                        <span class="product-card-category">KÖMÜRDE IZGARA</span>
                        <h4 class="product-card-title">Urfa Kebap</h4>
                        <p style="font-size: 13px; color: var(--color-gray-500); line-height: 1.5; margin-bottom: 14px;">
                            Acısız lezzet arayanlar için usta ellerce hazırlanan sade kuzu ve dana etinden köz kebap.
                        </p>
                        <a href="https://wa.me/<?php echo esc_attr($whatsapp); ?>?text=<?php echo rawurlencode('Merhaba Beyzade Restaurant, Urfa Kebap siparişi / rezervasyonu vermek istiyorum.'); ?>" target="_blank" class="btn btn-outline-dark btn-sm btn-full" style="font-size: 13px;">
                            Rezervasyon & Sipariş
                        </a>
                    </div>
                </article>

                <!-- Beyti Sarma -->
                <article class="product-card">
                    <div class="product-card-image food-card-image">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/demo/Beyti-Sarma-beyzade-1-1024x819.png" alt="Beyti Sarma" loading="lazy" style="width: 100%; height: 200px; object-fit: cover;">
                    </div>
                    <div class="product-card-content">
                        <span class="product-card-category">BEYZADE İMZA</span>
                        <h4 class="product-card-title">Beyti Sarma</h4>
                        <p style="font-size: 13px; color: var(--color-gray-500); line-height: 1.5; margin-bottom: 14px;">
                            Lavaşa sarılı özel kebap dilimleri, üzerine tereyağlı özel sos ve süzme tava yoğurdu ile.
                        </p>
                        <a href="https://wa.me/<?php echo esc_attr($whatsapp); ?>?text=<?php echo rawurlencode('Merhaba Beyzade Restaurant, Beyti Sarma siparişi / rezervasyonu vermek istiyorum.'); ?>" target="_blank" class="btn btn-outline-dark btn-sm btn-full" style="font-size: 13px;">
                            Rezervasyon & Sipariş
                        </a>
                    </div>
                </article>

                <!-- Kuzu Şiş -->
                <article class="product-card">
                    <div class="product-card-image food-card-image">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/demo/Kuzu-Sis-beyzade-1-1024x819.png" alt="Kuzu Şiş" loading="lazy" style="width: 100%; height: 200px; object-fit: cover;">
                    </div>
                    <div class="product-card-content">
                        <span class="product-card-category">KÖMÜRDE IZGARA</span>
                        <h4 class="product-card-title">Kuzu Şiş</h4>
                        <p style="font-size: 13px; color: var(--color-gray-500); line-height: 1.5; margin-bottom: 14px;">
                            Özel zeytinyağlı marine edilmiş lokum gibi kuzu but parçaları, köz sebzeler ve pilav ile.
                        </p>
                        <a href="https://wa.me/<?php echo esc_attr($whatsapp); ?>?text=<?php echo rawurlencode('Merhaba Beyzade Restaurant, Kuzu Şiş siparişi / rezervasyonu vermek istiyorum.'); ?>" target="_blank" class="btn btn-outline-dark btn-sm btn-full" style="font-size: 13px;">
                            Rezervasyon & Sipariş
                        </a>
                    </div>
                </article>

                <!-- Kuzu Tandır -->
                <article class="product-card">
                    <div class="product-card-image food-card-image">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/demo/kuzu-tandir-1024x819.png" alt="Kuzu Tandır" loading="lazy" style="width: 100%; height: 200px; object-fit: cover;">
                    </div>
                    <div class="product-card-content">
                        <span class="product-card-category">ÖZEL SİPARİŞ</span>
                        <h4 class="product-card-title">Kuzu Tandır</h4>
                        <p style="font-size: 12px; color: var(--color-primary); font-weight: 700; margin-bottom: 4px;">
                            *(1 gün önce sipariş verilmelidir)*
                        </p>
                        <p style="font-size: 13px; color: var(--color-gray-500); line-height: 1.5; margin-bottom: 14px;">
                            Taş fırında saatlerce ağır ateşte nar gibi kızarmış, kemiğinden ayrılan nefis kuzu eti.
                        </p>
                        <a href="https://wa.me/<?php echo esc_attr($whatsapp); ?>?text=<?php echo rawurlencode('Merhaba Beyzade Restaurant, Kuzu Tandır ön siparişi vermek istiyorum.'); ?>" target="_blank" class="btn btn-outline-dark btn-sm btn-full" style="font-size: 13px;">
                            Ön Sipariş Ver
                        </a>
                    </div>
                </article>

                <!-- Desti Kebabı -->
                <article class="product-card">
                    <div class="product-card-image food-card-image">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/demo/beyzade-desti-kebabi-1024x819.png" alt="Desti Kebabı" loading="lazy" style="width: 100%; height: 200px; object-fit: cover;">
                    </div>
                    <div class="product-card-content">
                        <span class="product-card-category">YÖRESEL İMZA</span>
                        <h4 class="product-card-title">Desti Kebabı</h4>
                        <p style="font-size: 12px; color: var(--color-primary); font-weight: 700; margin-bottom: 4px;">
                            *(1 gün önce sipariş verilmelidir)*
                        </p>
                        <p style="font-size: 13px; color: var(--color-gray-500); line-height: 1.5; margin-bottom: 14px;">
                            Toprak testide mühürlenip fırınlanan, masanızda kırılarak servis edilen efsanevi tat.
                        </p>
                        <a href="https://wa.me/<?php echo esc_attr($whatsapp); ?>?text=<?php echo rawurlencode('Merhaba Beyzade Restaurant, Desti Kebabı ön siparişi vermek istiyorum.'); ?>" target="_blank" class="btn btn-outline-dark btn-sm btn-full" style="font-size: 13px;">
                            Ön Sipariş Ver
                        </a>
                    </div>
                </article>

                <!-- Kuzu Ciğer -->
                <article class="product-card">
                    <div class="product-card-image food-card-image">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/demo/Kuzu-Ciger-beyzade-1-1024x819.png" alt="Kuzu Ciğer" loading="lazy" style="width: 100%; height: 200px; object-fit: cover;">
                    </div>
                    <div class="product-card-content">
                        <span class="product-card-category">KÖMÜRDE IZGARA</span>
                        <h4 class="product-card-title">Kuzu Ciğer Şiş</h4>
                        <p style="font-size: 13px; color: var(--color-gray-500); line-height: 1.5; margin-bottom: 14px;">
                            Taze kuzu ciğeri ve kuyruk yağı dengesiyle közde pişirilen, sumak ve yeşilliklerle sunulan lezzet.
                        </p>
                        <a href="https://wa.me/<?php echo esc_attr($whatsapp); ?>?text=<?php echo rawurlencode('Merhaba Beyzade Restaurant, Kuzu Ciğer Şiş hakkında bilgi ve sipariş vermek istiyorum.'); ?>" target="_blank" class="btn btn-outline-dark btn-sm btn-full" style="font-size: 13px;">
                            Rezervasyon & Sipariş
                        </a>
                    </div>
                </article>

                <!-- Bonfile / Pirzola -->
                <article class="product-card">
                    <div class="product-card-image food-card-image">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/demo/Bonfile-pirzola-beyzade-1-1024x819.png" alt="Bonfile Pirzola" loading="lazy" style="width: 100%; height: 200px; object-fit: cover;">
                    </div>
                    <div class="product-card-content">
                        <span class="product-card-category">GURME ET</span>
                        <h4 class="product-card-title">Pirzola / Bonfile</h4>
                        <p style="font-size: 13px; color: var(--color-gray-500); line-height: 1.5; margin-bottom: 14px;">
                            Özel marine edilmiş taze kuzu pirzola veya yumuşacık dana bonfile dilimleri.
                        </p>
                        <a href="https://wa.me/<?php echo esc_attr($whatsapp); ?>?text=<?php echo rawurlencode('Merhaba Beyzade Restaurant, Pirzola/Bonfile siparişi ve masa rezervasyonu yapmak istiyorum.'); ?>" target="_blank" class="btn btn-outline-dark btn-sm btn-full" style="font-size: 13px;">
                            Rezervasyon & Sipariş
                        </a>
                    </div>
                </article>

            </div>
        </div>

        <!-- BÖLÜM 2: PİDELER & LAHMACUN -->
        <div id="pideler" style="margin-bottom: 60px;">
            <div style="display: flex; align-items: center; justify-content: space-between; border-bottom: 2px solid var(--color-gray-200); padding-bottom: 12px; margin-bottom: 24px;">
                <h3 style="font-size: 24px; font-weight: 800; color: var(--color-black); margin: 0; display: flex; align-items: center; gap: 8px;">
                    🍕 Taş Fırın Pide & Lahmacun Çeşitlerimiz
                </h3>
                <span style="font-size: 13px; color: var(--color-gray-500); font-weight: 600;">Odun Ateşinde Çıtır Çıtır</span>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                
                <!-- Kıymalı Pide -->
                <article class="product-card">
                    <div class="product-card-image food-card-image">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/demo/Kiymali-Pide-beyzade-1024x819.png" alt="Kıymalı Pide" loading="lazy" style="width: 100%; height: 200px; object-fit: cover;">
                    </div>
                    <div class="product-card-content">
                        <span class="product-card-category">ODUN ATEŞİNDE</span>
                        <h4 class="product-card-title">Kıymalı Pide</h4>
                        <p style="font-size: 13px; color: var(--color-gray-500); line-height: 1.5; margin-bottom: 14px;">
                            İncecik açılan hamurda baharatlı dana kıyması ve domates-biber harcıyla taş fırında pişirilir.
                        </p>
                        <a href="https://wa.me/<?php echo esc_attr($whatsapp); ?>?text=<?php echo rawurlencode('Merhaba Beyzade Restaurant, Kıymalı Pide siparişi vermek istiyorum.'); ?>" target="_blank" class="btn btn-outline-dark btn-sm btn-full" style="font-size: 13px;">
                            Sipariş & Rezervasyon
                        </a>
                    </div>
                </article>

                <!-- Kuşbaşılı Pide -->
                <article class="product-card">
                    <div class="product-card-image food-card-image">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/demo/kusbasi-Pide-beyzade-1024x819.png" alt="Kuşbaşılı Pide" loading="lazy" style="width: 100%; height: 200px; object-fit: cover;">
                    </div>
                    <div class="product-card-content">
                        <span class="product-card-category">ODUN ATEŞİNDE</span>
                        <h4 class="product-card-title">Kuşbaşılı Pide</h4>
                        <p style="font-size: 13px; color: var(--color-gray-500); line-height: 1.5; margin-bottom: 14px;">
                            Özel marine dana kuşbaşı et, yeşil biber, domates ve sarımsak harmanıyla taş fırında servis edilir.
                        </p>
                        <a href="https://wa.me/<?php echo esc_attr($whatsapp); ?>?text=<?php echo rawurlencode('Merhaba Beyzade Restaurant, Kuşbaşılı Pide siparişi vermek istiyorum.'); ?>" target="_blank" class="btn btn-outline-dark btn-sm btn-full" style="font-size: 13px;">
                            Sipariş & Rezervasyon
                        </a>
                    </div>
                </article>

                <!-- Karışık Pide -->
                <article class="product-card">
                    <div class="product-card-image food-card-image">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/demo/karisik-pide-beyzade-1024x819.png" alt="Karışık Pide" loading="lazy" style="width: 100%; height: 200px; object-fit: cover;">
                    </div>
                    <div class="product-card-content">
                        <span class="product-card-category">BEYZADE SPESİYAL</span>
                        <h4 class="product-card-title">Karışık Pide</h4>
                        <p style="font-size: 13px; color: var(--color-gray-500); line-height: 1.5; margin-bottom: 14px;">
                            Kuşbaşı, kıyma, sucuk ve eriyen kaşar peynirinin muazzam birlikteliği.
                        </p>
                        <a href="https://wa.me/<?php echo esc_attr($whatsapp); ?>?text=<?php echo rawurlencode('Merhaba Beyzade Restaurant, Karışık Pide siparişi vermek istiyorum.'); ?>" target="_blank" class="btn btn-outline-dark btn-sm btn-full" style="font-size: 13px;">
                            Sipariş & Rezervasyon
                        </a>
                    </div>
                </article>

                <!-- Çıtır Lahmacun -->
                <article class="product-card">
                    <div class="product-card-image food-card-image">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/demo/lahmacun-beyzade-1024x819.png" alt="Lahmacun" loading="lazy" style="width: 100%; height: 200px; object-fit: cover;">
                    </div>
                    <div class="product-card-content">
                        <span class="product-card-category">ODUN ATEŞİNDE</span>
                        <h4 class="product-card-title">Taş Fırın Lahmacun</h4>
                        <p style="font-size: 13px; color: var(--color-gray-500); line-height: 1.5; margin-bottom: 14px;">
                            Gevrek ve çıtır hamur, zengin kıyma harcı, yanında taze maydanoz ve limon garnitürü ile.
                        </p>
                        <a href="https://wa.me/<?php echo esc_attr($whatsapp); ?>?text=<?php echo rawurlencode('Merhaba Beyzade Restaurant, Lahmacun siparişi vermek istiyorum.'); ?>" target="_blank" class="btn btn-outline-dark btn-sm btn-full" style="font-size: 13px;">
                            Sipariş & Rezervasyon
                        </a>
                    </div>
                </article>

            </div>
        </div>

        <!-- BÖLÜM 3: DÖNER & İSKENDER -->
        <div id="donerler" style="margin-bottom: 60px;">
            <div style="display: flex; align-items: center; justify-content: space-between; border-bottom: 2px solid var(--color-gray-200); padding-bottom: 12px; margin-bottom: 24px;">
                <h3 style="font-size: 24px; font-weight: 800; color: var(--color-black); margin: 0; display: flex; align-items: center; gap: 8px;">
                    🥙 Döner & İskender Lezzetlerimiz
                </h3>
                <span style="font-size: 13px; color: var(--color-gray-500); font-weight: 600;">Hakiki Yaprak Döner</span>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                
                <!-- İskender -->
                <article class="product-card">
                    <div class="product-card-image food-card-image">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/demo/beyzade-iskender-1024x819.png" alt="İskender" loading="lazy" style="width: 100%; height: 200px; object-fit: cover;">
                    </div>
                    <div class="product-card-content">
                        <span class="product-card-category">TEREYAĞLI</span>
                        <h4 class="product-card-title">Beyzade İskender</h4>
                        <p style="font-size: 13px; color: var(--color-gray-500); line-height: 1.5; margin-bottom: 14px;">
                            Özel pide parçaları üzerine incecik yaprak et döner, domates sosu, kızgın tereyağı ve yoğurt.
                        </p>
                        <a href="https://wa.me/<?php echo esc_attr($whatsapp); ?>?text=<?php echo rawurlencode('Merhaba Beyzade Restaurant, İskender siparişi vermek istiyorum.'); ?>" target="_blank" class="btn btn-outline-dark btn-sm btn-full" style="font-size: 13px;">
                            Sipariş & Rezervasyon
                        </a>
                    </div>
                </article>

                <!-- Et Döner -->
                <article class="product-card">
                    <div class="product-card-image food-card-image">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/demo/beyzade-et-doner-1024x819.png" alt="Et Döner" loading="lazy" style="width: 100%; height: 200px; object-fit: cover;">
                    </div>
                    <div class="product-card-content">
                        <span class="product-card-category">KLASİK LEZZET</span>
                        <h4 class="product-card-title">Porsiyon Et Döner</h4>
                        <p style="font-size: 13px; color: var(--color-gray-500); line-height: 1.5; margin-bottom: 14px;">
                            Özel marinasyonlu dana ve kuzu eti yaprak döner, pirinç pilavı ve patates kızartması ile.
                        </p>
                        <a href="https://wa.me/<?php echo esc_attr($whatsapp); ?>?text=<?php echo rawurlencode('Merhaba Beyzade Restaurant, Porsiyon Et Döner siparişi vermek istiyorum.'); ?>" target="_blank" class="btn btn-outline-dark btn-sm btn-full" style="font-size: 13px;">
                            Sipariş & Rezervasyon
                        </a>
                    </div>
                </article>

                <!-- Tavuk Döner -->
                <article class="product-card">
                    <div class="product-card-image food-card-image">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/demo/beyzade-tavuk-doner-1024x819.png" alt="Tavuk Döner" loading="lazy" style="width: 100%; height: 200px; object-fit: cover;">
                    </div>
                    <div class="product-card-content">
                        <span class="product-card-category">KLASİK LEZZET</span>
                        <h4 class="product-card-title">Porsiyon Tavuk Döner</h4>
                        <p style="font-size: 13px; color: var(--color-gray-500); line-height: 1.5; margin-bottom: 14px;">
                            Özel soslarla terbiyelenmiş çıtır tavuk döner dilimleri, garnitür ve soslar ile servis edilir.
                        </p>
                        <a href="https://wa.me/<?php echo esc_attr($whatsapp); ?>?text=<?php echo rawurlencode('Merhaba Beyzade Restaurant, Tavuk Döner siparişi vermek istiyorum.'); ?>" target="_blank" class="btn btn-outline-dark btn-sm btn-full" style="font-size: 13px;">
                            Sipariş & Rezervasyon
                        </a>
                    </div>
                </article>

                <!-- Döner Dürüm -->
                <article class="product-card">
                    <div class="product-card-image food-card-image">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/demo/beyzade-doner-durum-1024x819.png" alt="Döner Dürüm" loading="lazy" style="width: 100%; height: 200px; object-fit: cover;">
                    </div>
                    <div class="product-card-content">
                        <span class="product-card-category">HIZLI SERVİS</span>
                        <h4 class="product-card-title">Döner Dürüm</h4>
                        <p style="font-size: 13px; color: var(--color-gray-500); line-height: 1.5; margin-bottom: 14px;">
                            Sıcak incecik tırnak lavaşına sarılmış et veya tavuk döner, turşu ve özel sos harmanı.
                        </p>
                        <a href="https://wa.me/<?php echo esc_attr($whatsapp); ?>?text=<?php echo rawurlencode('Merhaba Beyzade Restaurant, Dürüm siparişi vermek istiyorum.'); ?>" target="_blank" class="btn btn-outline-dark btn-sm btn-full" style="font-size: 13px;">
                            Sipariş & Rezervasyon
                        </a>
                    </div>
                </article>

            </div>
        </div>

        <!-- BÖLÜM 4: ÇORBALAR & TATLILAR -->
        <div id="tatlilar">
            <div style="display: flex; align-items: center; justify-content: space-between; border-bottom: 2px solid var(--color-gray-200); padding-bottom: 12px; margin-bottom: 24px;">
                <h3 style="font-size: 24px; font-weight: 800; color: var(--color-black); margin: 0; display: flex; align-items: center; gap: 8px;">
                    🍯 Çorba & Geleneksel Tatlılarımız
                </h3>
                <span style="font-size: 13px; color: var(--color-gray-500); font-weight: 600;">Usta Dokunuşlar</span>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                
                <!-- Künefe -->
                <article class="product-card">
                    <div class="product-card-image food-card-image">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/demo/beyzade-kunefe-1024x819.png" alt="Künefe" loading="lazy" style="width: 100%; height: 200px; object-fit: cover;">
                    </div>
                    <div class="product-card-content">
                        <span class="product-card-category">SICAK TATLI</span>
                        <h4 class="product-card-title">Taş Fırın Künefe</h4>
                        <p style="font-size: 13px; color: var(--color-gray-500); line-height: 1.5; margin-bottom: 14px;">
                            Özel peyniriyle sıcak pişirilen çıtır künefe, bol Antep fıstığı tozu ve kaymak ile.
                        </p>
                        <a href="https://wa.me/<?php echo esc_attr($whatsapp); ?>?text=<?php echo rawurlencode('Merhaba Beyzade Restaurant, Sıcak Künefe siparişi vermek istiyorum.'); ?>" target="_blank" class="btn btn-outline-dark btn-sm btn-full" style="font-size: 13px;">
                            Sipariş & Rezervasyon
                        </a>
                    </div>
                </article>

                <!-- Fırın Sütlaç -->
                <article class="product-card">
                    <div class="product-card-image food-card-image">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/demo/sutlac-beyzade-1-1024x819.png" alt="Sütlaç" loading="lazy" style="width: 100%; height: 200px; object-fit: cover;">
                    </div>
                    <div class="product-card-content">
                        <span class="product-card-category">GELENEKSEL</span>
                        <h4 class="product-card-title">Fırın Sütlaç</h4>
                        <p style="font-size: 13px; color: var(--color-gray-500); line-height: 1.5; margin-bottom: 14px;">
                            Toprak güveçte üzeri nar gibi kızartılmış hakiki köy sütünden enfes fırın sütlaç.
                        </p>
                        <a href="https://wa.me/<?php echo esc_attr($whatsapp); ?>?text=<?php echo rawurlencode('Merhaba Beyzade Restaurant, Fırın Sütlaç siparişi vermek istiyorum.'); ?>" target="_blank" class="btn btn-outline-dark btn-sm btn-full" style="font-size: 13px;">
                            Sipariş & Rezervasyon
                        </a>
                    </div>
                </article>

                <!-- Sıcak Çikolatalı Sufle -->
                <article class="product-card">
                    <div class="product-card-image food-card-image">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/demo/sufle-beyzade-1-1024x819.png" alt="Sufle" loading="lazy" style="width: 100%; height: 200px; object-fit: cover;">
                    </div>
                    <div class="product-card-content">
                        <span class="product-card-category">SICAK TATLI</span>
                        <h4 class="product-card-title">Akışkan Sıcak Sufle</h4>
                        <p style="font-size: 13px; color: var(--color-gray-500); line-height: 1.5; margin-bottom: 14px;">
                            Fırından yeni çıkmış akışkan yoğun çikolata lezzeti ve vanilyalı dondurma eşliğinde.
                        </p>
                        <a href="https://wa.me/<?php echo esc_attr($whatsapp); ?>?text=<?php echo rawurlencode('Merhaba Beyzade Restaurant, Sıcak Sufle siparişi vermek istiyorum.'); ?>" target="_blank" class="btn btn-outline-dark btn-sm btn-full" style="font-size: 13px;">
                            Sipariş & Rezervasyon
                        </a>
                    </div>
                </article>

                <!-- Mercimek / Paça Çorbası -->
                <article class="product-card">
                    <div class="product-card-image food-card-image">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/demo/mercimek-corbasi-beyzade-1024x819.png" alt="Çorba Çeşitleri" loading="lazy" style="width: 100%; height: 200px; object-fit: cover;">
                    </div>
                    <div class="product-card-content">
                        <span class="product-card-category">SICAK BAŞLANGIÇ</span>
                        <h4 class="product-card-title">Günün Sıcak Çorbası</h4>
                        <p style="font-size: 13px; color: var(--color-gray-500); line-height: 1.5; margin-bottom: 14px;">
                            Mercimek, Ezogelin, Paça veya İşkembe çorbası; sıcak pide ve taze limon ile.
                        </p>
                        <a href="https://wa.me/<?php echo esc_attr($whatsapp); ?>?text=<?php echo rawurlencode('Merhaba Beyzade Restaurant, sıcak çorba çeşitleri ve sipariş hakkında bilgi almak istiyorum.'); ?>" target="_blank" class="btn btn-outline-dark btn-sm btn-full" style="font-size: 13px;">
                            Sipariş & Rezervasyon
                        </a>
                    </div>
                </article>

            </div>
        </div>

        <div class="text-center mt-10">
            <a href="https://wa.me/<?php echo esc_attr($whatsapp); ?>?text=<?php echo rawurlencode('Merhaba Beyzade Restaurant, güncel menünüz hakkında detaylı bilgi almak istiyorum.'); ?>" target="_blank" class="btn btn-primary btn-lg">
                Tüm Menüyü WhatsApp Üzerinden Alın →
            </a>
        </div>
    </div>
</section>

<!-- 6. Google Müşteri Yorumları & Değerlendirmeleri Slider (Denfora 1:1 Architecture) -->
<!-- 6. Google Müşteri Yorumları & Değerlendirmeleri Slider (Canlı Otomatik Güncellenir) -->
<?php
$google_stats   = function_exists('mis360_get_google_stats') ? mis360_get_google_stats() : ['rating' => '4.3', 'total_reviews' => 448];
$google_reviews = function_exists('mis360_get_google_reviews') ? mis360_get_google_reviews() : [];
?>
<section class="section reviews-section" id="reviews">
    <div class="container">
        
        <div class="section-header text-center">
            <div class="google-rating-badge">
                <svg class="google-g-icon" viewBox="0 0 24 24">
                    <path fill="#4285F4" d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z"/>
                    <path fill="#34A853" d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z"/>
                    <path fill="#FBBC05" d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.06H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.94l2.85-2.22.81-.63z"/>
                    <path fill="#EA4335" d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.06l3.66 2.84c.87-2.6 3.3-4.52 6.16-4.52z"/>
                </svg>
                <span class="google-rating-number"><?php echo esc_html($google_stats['rating']); ?></span>
                <span class="google-stars">★★★★★</span>
                <span class="google-count-text">(<?php echo esc_html($google_stats['total_reviews']); ?> Doğrulanmış Google Yorumu)</span>
            </div>
            <h2 class="section-title">Misafirlerimizin Deneyimleri</h2>
            <p class="section-subtitle">
                Google Haritalar üzerinden Sarıkaya Beyzade Et & Balık Restaurant'ı ziyaret eden misafirlerimizin gerçek yorumları.
            </p>
        </div>

        <!-- Slider Konteyneri -->
        <div class="reviews-slider-container">
            <div class="reviews-viewport" id="reviewsViewport">
                <div class="reviews-track" id="reviewsTrack">
                    
                    <?php foreach ($google_reviews as $rev) : 
                        $initials = '';
                        $parts = explode(' ', trim($rev['author_name']));
                        foreach ($parts as $p) {
                            if (!empty($p)) {
                                $initials .= mb_substr($p, 0, 1, 'UTF-8');
                            }
                        }
                        $initials = mb_substr($initials, 0, 2, 'UTF-8');
                        $bg = !empty($rev['avatar_bg']) ? $rev['avatar_bg'] : '#e0e7ff';
                        $color = !empty($rev['avatar_color']) ? $rev['avatar_color'] : '#4338ca';
                        $star_count = min(5, max(1, (int) ($rev['rating'] ?? 5)));
                        $stars_str = str_repeat('★', $star_count);
                    ?>
                    <article class="review-card">
                        <div class="review-card-header">
                            <div class="review-user-info">
                                <div class="review-avatar" style="background: <?php echo esc_attr($bg); ?>; color: <?php echo esc_attr($color); ?>;">
                                    <?php echo esc_html($initials); ?>
                                </div>
                                <div>
                                    <h4 class="review-user-name"><?php echo esc_html($rev['author_name']); ?></h4>
                                    <span class="review-user-badge">
                                        📍 <?php echo esc_html($rev['badge'] ?? 'Doğrulanmış Ziyaretçi'); ?>
                                    </span>
                                </div>
                            </div>
                            <svg class="review-google-logo" viewBox="0 0 24 24">
                                <path fill="#4285F4" d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z"/>
                                <path fill="#34A853" d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z"/>
                                <path fill="#FBBC05" d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.06H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.94l2.85-2.22.81-.63z"/>
                                <path fill="#EA4335" d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.06l3.66 2.84c.87-2.6 3.3-4.52 6.16-4.52z"/>
                            </svg>
                        </div>
                        <div class="review-rating-row">
                            <span class="review-stars"><?php echo esc_html($stars_str); ?></span>
                            <span class="review-date">• <?php echo esc_html($rev['time_text'] ?? 'Yeni'); ?></span>
                        </div>
                        <p class="review-text">
                            "<?php echo esc_html($rev['text']); ?>"
                        </p>
                        <span class="review-tag"><?php echo esc_html($rev['tag'] ?? '✓ Doğrulanmış Ziyaretçi Deneyimi'); ?></span>
                    </article>
                    <?php endforeach; ?>

                </div>
            </div>

            <!-- Kontroller -->
            <div class="reviews-controls">
                <button type="button" class="reviews-nav-btn" id="reviewsPrevBtn" aria-label="Önceki Yorumlar">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                        <polyline points="15 18 9 12 15 6"></polyline>
                    </svg>
                </button>

                <div class="reviews-dots" id="reviewsDots"></div>

                <button type="button" class="reviews-nav-btn" id="reviewsNextBtn" aria-label="Sonraki Yorumlar">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                        <polyline points="9 18 15 12 9 6"></polyline>
                    </svg>
                </button>
            </div>
        </div>

        <!-- Google Haritalar Eylemleri -->
        <div class="text-center mt-10" style="display: flex; justify-content: center; align-items: center; gap: 14px; flex-wrap: wrap;">
            <a href="https://maps.app.goo.gl/q2icLBRX1FJNzVtY7" target="_blank" rel="noopener noreferrer" class="btn btn-outline-dark btn-md">
                Google'da Tüm <?php echo esc_html($google_stats['total_reviews']); ?> Yorumu İncele →
            </a>
            <a href="https://maps.app.goo.gl/q2icLBRX1FJNzVtY7" target="_blank" rel="noopener noreferrer" class="btn btn-primary btn-md">
                ⭐ Google'da Siz de Yorum Yazın
            </a>
        </div>

    </div>
</section>

<!-- 6.5. Haberler, Blog & Galerimizden Seçmeler (Teaser Vitrini) -->
<section class="section" id="news-gallery-teaser" style="background: var(--color-gray-50); border-top: 1px solid var(--color-gray-100);">
    <div class="container">
        
        <div class="section-header text-center">
            <span class="section-badge">BEYZADE GÜNCEL</span>
            <h2 class="section-title">Haberler, Lezzet Rehberi & Galerimiz</h2>
            <p class="section-subtitle">
                Restoranımızdan en güncel duyurular, meşe kömüründe pişen lezzetlerimizin sırları ve mutfağımızdan özel kareler.
            </p>
        </div>

        <?php
        $latest_posts = get_posts([
            'numberposts' => 3,
            'post_status' => 'publish',
        ]);
        if (!empty($latest_posts)) :
        ?>
        <div class="gallery-grid" style="margin-bottom: 36px;">
            <?php foreach ($latest_posts as $lp) :
                $p_cats   = get_the_category($lp->ID);
                $p_cat    = !empty($p_cats) ? $p_cats[0] : null;
                $cat_slug = $p_cat ? $p_cat->slug : 'blog';
                $cat_name = $p_cat ? $p_cat->name : 'Lezzet Rehberi';

                $b_class = 'badge-blog';
                if (strpos($cat_slug, 'haber') !== false) {
                    $b_class = 'badge-haber';
                } elseif (strpos($cat_slug, 'galeri') !== false) {
                    $b_class = 'badge-galeri';
                }

                $t_url = '';
                if (has_post_thumbnail($lp->ID)) {
                    $t_url = get_the_post_thumbnail_url($lp->ID, 'large');
                } else {
                    $meta_t = get_post_meta($lp->ID, '_mis360_external_thumb', true);
                    if ($meta_t) {
                        $t_url = $meta_t;
                    } else {
                        $t_url = (strpos($cat_slug, 'haber') !== false || strpos($cat_slug, 'galeri') !== false)
                            ? get_template_directory_uri() . '/assets/img/demo/restaurant.jpg'
                            : 'https://beyzadeetbalikrestaurant.com.tr/wp-content/uploads/2026/05/adana.jpg';
                    }
                }
            ?>
            <article class="gallery-card">
                <div class="gallery-card-thumb">
                    <img src="<?php echo esc_url($t_url); ?>" alt="<?php echo esc_attr($lp->post_title); ?>" loading="lazy">
                    <span class="gallery-card-badge <?php echo esc_attr($b_class); ?>"><?php echo esc_html($cat_name); ?></span>
                </div>
                <div class="gallery-card-body">
                    <div class="gallery-card-meta">
                        <span>📅 <?php echo esc_html(get_the_date('j F Y', $lp->ID)); ?></span>
                        <span class="sep">•</span>
                        <span>👤 <?php echo esc_html(get_the_author_meta('display_name', $lp->post_author)); ?></span>
                    </div>
                    <h3 class="gallery-card-title">
                        <a href="<?php echo esc_url(get_permalink($lp->ID)); ?>" style="color: inherit; text-decoration: none;">
                            <?php echo esc_html($lp->post_title); ?>
                        </a>
                    </h3>
                    <p class="gallery-card-excerpt">
                        <?php echo esc_html(wp_trim_words($lp->post_excerpt ?: wp_strip_all_tags($lp->post_content), 18, '...')); ?>
                    </p>
                    <div class="gallery-card-footer">
                        <a href="<?php echo esc_url(get_permalink($lp->ID)); ?>" class="gallery-link">
                            Yazıyı Oku & Detaylar →
                        </a>
                    </div>
                </div>
            </article>
            <?php endforeach; ?>
        </div>
        <?php endif; ?>

        <div class="text-center">
            <a href="<?php echo esc_url(home_url('/haberler-galeri/')); ?>" class="btn btn-outline-dark btn-md">
                Tüm Haberler, Blog Yazıları & Galeriyi İncele →
            </a>
        </div>

    </div>
</section>

<!-- 6.8. ANTIGRAVITY GEO (AI SEARCH OVERVIEW) & SIKÇA SORULAN SORULAR (SSS) -->
<section class="section" id="geo-faq" style="background: #ffffff; border-top: 1px solid var(--color-gray-100); padding: 70px 0;">
    <div class="container">
        
        <div class="section-header text-center">
            <span class="section-badge">BEYZADE REHBERİ & SSS</span>
            <h2 class="section-title">Sıkça Sorulan Sorular</h2>
            <p class="section-subtitle">
                Değerli misafirlerimiz için Beyzade Et & Balık Restaurant hakkında en çok merak edilenler.
            </p>
        </div>

        <div class="grid grid-cols-1 gap-8 items-start">
            
            <!-- Sol (GİZLİ): LLM & AI Crawler İçin Yapılandırılmış Hızlı Bilgi Tablosu -->
            <div class="geo-table-wrap sr-only">
                <div style="display: flex; align-items: center; gap: 8px; margin-bottom: 12px;">
                    <span style="font-size: 20px;">📋</span>
                    <h3 style="font-size: 18px; font-weight: 800; color: #0f172a; margin: 0;">
                        Restoran Künyesi & Temel Bilgiler
                    </h3>
                </div>

                <!-- LLM AI Özet Paragrafı (48 Kelime - Standart AI Snippet) -->
                <p class="geo-summary-text">
                    Beyzade Et & Balık Restaurant, 2019 yılından bu yana Yozgat Sarıkaya'da Nevzat Şener Bulvarı üzerinde hizmet veren seçkin bir aile restoranıdır. Meşe kömüründe pişen zırh kebapları, toprak güveçte kuzu tandır, hakiki taş fırın pideleri ve günlük temin edilen taze balık çeşitleriyle sabah 06:00'dan gece 23:45'e kadar kesintisiz hizmet sunar. 
                    <strong>Hizmetlerimiz & Popüler Aramalar:</strong> Sarıkaya Restorant, Sarıkaya restoran, Sarıkaya Yemek, Sarıkaya Kıymalı, Sarıkaya Çorba, Sarıkaya Kebab, Sarıkaya Kebap.
                </p>

                <table class="geo-facts-table" aria-label="Restoran Hızlı Bilgiler">
                    <tbody>
                        <tr>
                            <th>Kuruluş Tarihi</th>
                            <td>2019 Yılından Beri (7+ Yıl)</td>
                        </tr>
                        <tr>
                            <th>İl / İlçe</th>
                            <td>Sarıkaya / Yozgat (66650)</td>
                        </tr>
                        <tr>
                            <th>Açık Adres</th>
                            <td>Bahçelievler Mah., Nevzat Şener Bulvarı</td>
                        </tr>
                        <tr>
                            <th>Telefon / WhatsApp</th>
                            <td><a href="tel:<?php echo esc_attr($clean_phone); ?>" style="color: inherit; font-weight: 700; text-decoration: none;"><?php echo esc_html($phone); ?></a></td>
                        </tr>
                        <tr>
                            <th>Çalışma Saatleri</th>
                            <td>Sabah 06:00 – 23:45 (Haftanın 7 Günü Açık)</td>
                        </tr>
                        <tr>
                            <th>Mutfak Türü</th>
                            <td>Kömürde Kebap, Taş Fırın Pide, Kuzu Tandır, Taze Balık</td>
                        </tr>
                        <tr>
                            <th>Öne Çıkan Olanaklar</th>
                            <td>Açık Hava Bahçe, Klimalı Aile Salonu, Bebek Mama Sandalyesi, Otopark</td>
                        </tr>
                        <tr>
                            <th>Google Puanı</th>
                            <td>⭐ 4.3 (448 Doğrulanmış Müşteri Değerlendirmesi)</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Sağ: Semantik Sıkça Sorulan Sorular (FAQ Accordion) -->
            <div class="faq-accordion">
                <div style="display: flex; align-items: center; gap: 8px; margin-bottom: 12px;">
                    <span style="font-size: 20px;">❓</span>
                    <h3 style="font-size: 18px; font-weight: 800; color: #0f172a; margin: 0;">
                        Misafirlerimizin En Çok Sorduğu Sorular
                    </h3>
                </div>

                <details class="faq-item" open>
                    <summary class="faq-question">Beyzade Et & Balık Restaurant saat kaçta açılıyor ve kapanıyor?</summary>
                    <div class="faq-answer">
                        Restoranımız haftanın her günü sabah tam saat 06:00'da geleneksel sıcak çorba (kelle paça, ayak paça, mercimek) servisiyle kapılarını açmakta ve gece 23:45'e kadar kesintisiz hizmet vermektedir.
                    </div>
                </details>

                <details class="faq-item">
                    <summary class="faq-question">Sarıkaya Beyzade Restaurant rezervasyon ve sipariş telefon numarası nedir?</summary>
                    <div class="faq-answer">
                        Masa rezervasyonu ve paket siparişleriniz için <strong>0535 830 93 07</strong> numaralı telefon hattımızdan bizi doğrudan arayabilir veya aynı numara üzerinden 7/24 WhatsApp ile yazabilirsiniz.
                    </div>
                </details>

                <details class="faq-item">
                    <summary class="faq-question">Restoranda hangi yemek ve lezzet seçenekleri servis edilmektedir?</summary>
                    <div class="faq-answer">
                        Menümüzde hakiki meşe kömüründe pişen Adana ve Urfa kebapları, kuzu şiş, özel toprak güveçte kuzu tandır, taş fırından sıcak çıkan kıymalı ve kuşbaşılı pideler, çıtır lahmacun, et döner ve günlük taze temin edilen deniz çuprası, kaya levreği ve somon balıkları yer almaktadır.
                    </div>
                </details>

                <details class="faq-item">
                    <summary class="faq-question">Açık hava bahçe alanı ve çocuklu aileler için mama sandalyesi var mı?</summary>
                    <div class="faq-answer">
                        Evet, restoranımızda ailelerin ve çocukların rahatça yemek yiyebileceği ferah açık hava bahçe bölümümüz, kapalı klimalı aile salonumuz ve bebek/çocuk mama sandalyelerimiz eksiksiz olarak misafirlerimizin hizmetindedir.
                    </div>
                </details>
            </div>

        </div>

    </div>
</section>

<!-- 7. Online Masa Rezervasyon Formu (Doğrudan WhatsApp'a Bilgi İletir) -->
<section class="section" id="reservation" style="background: #ffffff;">
    <div class="container">
        <div class="reservation-card">
            <div class="text-center" style="margin-bottom: 30px;">
                <span style="font-size: 12px; font-weight: 800; text-transform: uppercase; letter-spacing: 0.15em; color: var(--color-primary);">
                    BEYZADE ET & BALIK
                </span>
                <h2 style="font-size: 28px; font-weight: 800; margin: 6px 0 8px; color: var(--color-black);">
                    Masanızı Hemen Ayırtın
                </h2>
                <p style="color: var(--color-gray-500); font-size: 14px;">
                    Aile yemekleri, iş toplantıları veya özel davetleriniz için aşağıdaki formu doldurarak doğrudan WhatsApp üzerinden rezervasyonunuzu anında tamamlayabilirsiniz.
                </p>
            </div>

            <form onsubmit="event.preventDefault(); const name=document.getElementById('bzName').value; const date=document.getElementById('bzDate').value; const time=document.getElementById('bzTime').value; const guests=document.getElementById('bzGuests').value; const area=document.getElementById('bzArea').value; window.open('https://wa.me/<?php echo esc_attr($whatsapp); ?>?text=' + encodeURIComponent('Beyzade Restaurant Rezervasyon Talebi:\nAd Soyad: ' + name + '\nTarih: ' + date + '\nSaat: ' + time + '\nKişi Sayısı: ' + guests + '\nBölüm Tercihi: ' + area), '_blank');">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4" style="margin-bottom: 20px;">
                    <div>
                        <label style="display: block; font-size: 13px; font-weight: 700; margin-bottom: 6px; color: #1e293b;">Adınız Soyadınız *</label>
                        <input type="text" id="bzName" placeholder="Örn: Mehmet Demir" required style="width: 100%; padding: 12px 16px; border: 1px solid var(--color-gray-300); border-radius: 8px; font-size: 14px; background: #ffffff;">
                    </div>
                    <div>
                        <label style="display: block; font-size: 13px; font-weight: 700; margin-bottom: 6px; color: #1e293b;">Bölüm Tercihi *</label>
                        <select id="bzArea" style="width: 100%; padding: 12px 16px; border: 1px solid var(--color-gray-300); border-radius: 8px; font-size: 14px; background: #ffffff;">
                            <option value="Açık Hava Bahçe Bölümü">Açık Hava Bahçe Bölümü</option>
                            <option value="İç Aile Salonu (Klimalı)">İç Aile Salonu (Klimalı)</option>
                            <option value="Grup & Özel Davet Masası">Grup & Özel Davet Masası</option>
                        </select>
                    </div>
                    <div>
                        <label style="display: block; font-size: 13px; font-weight: 700; margin-bottom: 6px; color: #1e293b;">Kişi Sayısı *</label>
                        <select id="bzGuests" style="width: 100%; padding: 12px 16px; border: 1px solid var(--color-gray-300); border-radius: 8px; font-size: 14px; background: #ffffff;">
                            <option value="2 Kişi">2 Kişilik Masa</option>
                            <option value="4 Kişi (Mama Sandalyesi Talepli)">4 Kişi (Aile Masası + Mama Sandalyesi)</option>
                            <option value="6-8 Kişi">6-8 Kişilik Masa</option>
                            <option value="10+ Kişi Özel Toplantı">10+ Kişi Özel Davet</option>
                        </select>
                    </div>
                    <div>
                        <label style="display: block; font-size: 13px; font-weight: 700; margin-bottom: 6px; color: #1e293b;">Tarih & Saat *</label>
                        <div class="reservation-date-row">
                            <input type="date" id="bzDate" required style="flex: 1; padding: 12px 10px; border: 1px solid var(--color-gray-300); border-radius: 8px; font-size: 13px; background: #ffffff;">
                            <select id="bzTime" style="width: 110px; padding: 12px 8px; border: 1px solid var(--color-gray-300); border-radius: 8px; font-size: 13px; background: #ffffff;">
                                <option value="07:30">07:30 (Sabah)</option>
                                <option value="09:00">09:00</option>
                                <option value="12:30">12:30</option>
                                <option value="14:00">14:00</option>
                                <option value="18:00">18:00</option>
                                <option value="19:30" selected>19:30</option>
                                <option value="21:00">21:00</option>
                                <option value="22:30">22:30</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-primary btn-lg" style="width: 100%; max-width: 480px; height: 50px; font-size: 15px;">
                        🟢 Rezervasyonu WhatsApp İle Onayla (0535 830 93 07) →
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
                Sizleri Sarıkaya'da Ağırlamaktan Mutluluk Duyuyoruz
            </h2>
            <p class="section-subtitle" style="color: var(--color-gray-400);">
                Bahçelievler Mah. 66650 Sarıkaya / Yozgat adresimizde, gece 23:45'e kadar sıcak et ve balık sofralarımızla hizmetinizdeyiz.
            </p>
            <div class="flex flex-wrap gap-4 justify-center mt-8">
                <a href="tel:<?php echo esc_attr($clean_phone); ?>" class="btn btn-primary btn-lg">
                    📞 <?php echo esc_html($phone); ?>
                </a>
                <a href="https://maps.app.goo.gl/q2icLBRX1FJNzVtY7" target="_blank" rel="noopener noreferrer" class="btn btn-outline-light btn-lg">
                    📍 Google Haritalar'da Yol Tarifi Al
                </a>
            </div>
        </div>
    </div>
</section>

<?php
get_footer();
