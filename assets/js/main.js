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
     DOM Hazır Olduğunda Başlat
     ========================================================================== */
  document.addEventListener('DOMContentLoaded', () => {
    HeaderManager.init();
    LangSwitcherManager.init();
    MobileNavManager.init();
  });

})();
