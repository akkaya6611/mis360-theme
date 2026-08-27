/**
 * MİS360 - Main JavaScript (Denfora 1:1 Architecture)
 * Header Sticky Scroll, Language Switcher, Mobile Nav Drawer & Fast Interactions
 *
 * @package MİS360
 * @author  Serkan AKKAYA <https://misteknoloji360.com.tr/>
 * @since   1.0.0
 */

(function () {
  'use strict';

  /* ==========================================================================
     1. Denfora Sticky Header Scroll Manager
     ========================================================================== */
  const HeaderManager = {
    header: document.getElementById('siteHeader'),

    init() {
      if (!this.header) return;

      const handleScroll = () => {
        if (window.scrollY > 20) {
          this.header.classList.add('scrolled');
        } else {
          this.header.classList.remove('scrolled');
        }
      };

      window.addEventListener('scroll', handleScroll, { passive: true });
      handleScroll(); // Sayfa yüklendiğinde mevcut konumu kontrol et
    }
  };

  /* ==========================================================================
     2. Denfora Language Switcher Dropdown Manager
     ========================================================================== */
  const LangSwitcherManager = {
    container: document.getElementById('langSwitcher'),

    init() {
      if (!this.container) return;

      const toggleBtn = this.container.querySelector('.lang-switcher-toggle');
      if (!toggleBtn) return;

      toggleBtn.addEventListener('click', (e) => {
        e.stopPropagation();
        const isOpen = this.container.classList.toggle('open');
        toggleBtn.setAttribute('aria-expanded', isOpen ? 'true' : 'false');
      });

      // Menü dışına tıklandığında kapat
      document.addEventListener('click', (e) => {
        if (!this.container.contains(e.target)) {
          this.container.classList.remove('open');
          toggleBtn.setAttribute('aria-expanded', 'false');
        }
      });
    }
  };

  /* ==========================================================================
     3. Denfora Mobile Nav Drawer Manager
     ========================================================================== */
  const MobileNavManager = {
    toggleBtn: document.getElementById('mobileMenuToggle'),
    closeBtn: document.getElementById('mobileNavClose'),
    overlay: document.getElementById('mobileNavOverlay'),
    drawer: document.getElementById('mobileNav'),

    init() {
      if (!this.toggleBtn || !this.overlay) return;

      this.toggleBtn.addEventListener('click', () => this.open());

      if (this.closeBtn) {
        this.closeBtn.addEventListener('click', () => this.close());
      }

      this.overlay.addEventListener('click', (e) => {
        if (e.target === this.overlay) {
          this.close();
        }
      });

      // Escape tuşuyla kapatma
      document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape' && this.overlay.classList.contains('open')) {
          this.close();
        }
      });

      // Menü içindeki linke tıklandığında çekmeceyi kapat
      if (this.drawer) {
        const links = this.drawer.querySelectorAll('a');
        links.forEach((link) => {
          link.addEventListener('click', () => {
            this.close();
          });
        });
      }
    },

    open() {
      this.overlay.classList.add('open');
      this.toggleBtn.setAttribute('aria-expanded', 'true');
      document.body.style.overflow = 'hidden';
    },

    close() {
      this.overlay.classList.remove('open');
      this.toggleBtn.setAttribute('aria-expanded', 'false');
      document.body.style.overflow = '';
    }
  };

  /* ==========================================================================
     4. Google Reviews Slider Manager
     ========================================================================== */
  const ReviewsSliderManager = {
    track: document.getElementById('reviewsTrack'),
    viewport: document.getElementById('reviewsViewport'),
    prevBtn: document.getElementById('reviewsPrevBtn'),
    nextBtn: document.getElementById('reviewsNextBtn'),
    dotsContainer: document.getElementById('reviewsDots'),
    currentIndex: 0,
    autoPlayTimer: null,

    init() {
      if (!this.track || !this.viewport) return;

      const cards = this.track.querySelectorAll('.review-card');
      if (!cards.length) return;

      this.updateSlider();

      if (this.nextBtn) {
        this.nextBtn.addEventListener('click', () => {
          this.next();
          this.resetAutoPlay();
        });
      }

      if (this.prevBtn) {
        this.prevBtn.addEventListener('click', () => {
          this.prev();
          this.resetAutoPlay();
        });
      }

      // Dokunmatik / Kaydırma Desteği (Touch Swipe)
      let touchStartX = 0;
      let touchEndX = 0;

      this.viewport.addEventListener('touchstart', (e) => {
        touchStartX = e.changedTouches[0].screenX;
        this.stopAutoPlay();
      }, { passive: true });

      this.viewport.addEventListener('touchend', (e) => {
        touchEndX = e.changedTouches[0].screenX;
        if (touchStartX - touchEndX > 50) {
          this.next();
        } else if (touchEndX - touchStartX > 50) {
          this.prev();
        }
        this.startAutoPlay();
      }, { passive: true });

      // Fare üzerine geldiğinde durdur
      this.viewport.addEventListener('mouseenter', () => this.stopAutoPlay());
      this.viewport.addEventListener('mouseleave', () => this.startAutoPlay());

      window.addEventListener('resize', () => {
        this.updateSlider();
      });

      this.startAutoPlay();
    },

    getVisibleCards() {
      const width = window.innerWidth;
      if (width > 1024) return 3;
      if (width > 640) return 2;
      return 1;
    },

    getMaxIndex() {
      const cards = this.track.querySelectorAll('.review-card');
      const visible = this.getVisibleCards();
      return Math.max(0, cards.length - visible);
    },

    updateSlider() {
      const cards = this.track.querySelectorAll('.review-card');
      if (!cards.length) return;

      const maxIndex = this.getMaxIndex();
      if (this.currentIndex > maxIndex) {
        this.currentIndex = maxIndex;
      }

      const cardWidth = cards[0].offsetWidth;
      const gap = 24; // var(--space-6) = 1.5rem = 24px
      const moveDistance = (cardWidth + gap) * this.currentIndex;

      this.track.style.transform = `translateX(-${moveDistance}px)`;

      // Dots güncelle
      this.renderDots(maxIndex);
    },

    renderDots(maxIndex) {
      if (!this.dotsContainer) return;
      this.dotsContainer.innerHTML = '';

      for (let i = 0; i <= maxIndex; i++) {
        const dot = document.createElement('button');
        dot.className = `reviews-dot ${i === this.currentIndex ? 'active' : ''}`;
        dot.setAttribute('aria-label', `Yorum ${i + 1}`);
        dot.addEventListener('click', () => {
          this.currentIndex = i;
          this.updateSlider();
          this.resetAutoPlay();
        });
        this.dotsContainer.appendChild(dot);
      }
    },

    next() {
      const maxIndex = this.getMaxIndex();
      if (this.currentIndex >= maxIndex) {
        this.currentIndex = 0;
      } else {
        this.currentIndex++;
      }
      this.updateSlider();
    },

    prev() {
      const maxIndex = this.getMaxIndex();
      if (this.currentIndex <= 0) {
        this.currentIndex = maxIndex;
      } else {
        this.currentIndex--;
      }
      this.updateSlider();
    },

    startAutoPlay() {
      this.stopAutoPlay();
      this.autoPlayTimer = setInterval(() => {
        this.next();
      }, 5000);
    },

    stopAutoPlay() {
      if (this.autoPlayTimer) {
        clearInterval(this.autoPlayTimer);
        this.autoPlayTimer = null;
      }
    },

    resetAutoPlay() {
      this.stopAutoPlay();
      this.startAutoPlay();
    }
  };

  /* ==========================================================================
     DOM Hazır Olduğunda Başlat
     ========================================================================== */
  document.addEventListener('DOMContentLoaded', () => {
    HeaderManager.init();
    LangSwitcherManager.init();
    MobileNavManager.init();
    ReviewsSliderManager.init();
  });

})();
