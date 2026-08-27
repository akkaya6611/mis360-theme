/**
 * MİS360 - Main Vanilla JavaScript (ES6+)
 * Zero jQuery, ultra-lightweight, accessible.
 *
 * @package MİS360
 * @since 1.0.0
 */

(function () {
  'use strict';

  /* ==========================================================================
     1. Dark / Light Mode Manager (LocalStorage & System Sync)
     ========================================================================== */
  const ThemeManager = {
    storageKey: 'mis360-color-theme',
    htmlRoot: document.documentElement,
    toggleBtn: document.getElementById('mis-theme-toggle'),

    init() {
      // 1. Kaydedilmiş tercihi veya sistem tercihini yükle
      const savedTheme = localStorage.getItem(this.storageKey);
      if (savedTheme) {
        this.setTheme(savedTheme, false);
      } else {
        const prefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
        this.htmlRoot.setAttribute('data-theme', prefersDark ? 'dark' : 'light');
      }

      // 2. Buton tıklama dinleyicisi
      if (this.toggleBtn) {
        this.toggleBtn.addEventListener('click', () => this.toggle());
      }

      // 3. İşletim sistemi tercih değişikliklerini dinle
      window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', (e) => {
        if (!localStorage.getItem(this.storageKey)) {
          this.htmlRoot.setAttribute('data-theme', e.matches ? 'dark' : 'light');
        }
      });
    },

    getCurrentTheme() {
      return this.htmlRoot.getAttribute('data-theme') || 'light';
    },

    setTheme(theme, save = true) {
      this.htmlRoot.setAttribute('data-theme', theme);
      if (save) {
        localStorage.setItem(this.storageKey, theme);
      }
    },

    toggle() {
      const current = this.getCurrentTheme();
      const nextTheme = current === 'dark' ? 'light' : 'dark';
      this.setTheme(nextTheme, true);
    }
  };

  /* ==========================================================================
     2. Mobile Off-Canvas Navigation Manager (Accessible & Touch-Friendly)
     ========================================================================== */
  const MobileNavManager = {
    menuBtn: document.getElementById('mis-mobile-menu-toggle'),
    closeBtn: document.getElementById('mis-mobile-close'),
    drawer: document.getElementById('mis-mobile-drawer'),
    backdrop: document.getElementById('mis-drawer-overlay'),

    init() {
      if (!this.menuBtn || !this.drawer) return;

      this.menuBtn.addEventListener('click', () => this.open());
      if (this.closeBtn) {
        this.closeBtn.addEventListener('click', () => this.close());
      }
      if (this.backdrop) {
        this.backdrop.addEventListener('click', () => this.close());
      }

      // Escape tuşu ile kapatma
      document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape' && this.drawer.classList.contains('is-active')) {
          this.close();
        }
      });
    },

    open() {
      this.drawer.classList.add('is-active');
      this.drawer.setAttribute('aria-hidden', 'false');
      this.menuBtn.setAttribute('aria-expanded', 'true');
      document.body.style.overflow = 'hidden'; // Arka plan kaydırmayı kilitle

      // Kapatma butonuna odaklan (Accessibility Focus Trap)
      if (this.closeBtn) {
        this.closeBtn.focus();
      }
    },

    close() {
      this.drawer.classList.remove('is-active');
      this.drawer.setAttribute('aria-hidden', 'true');
      this.menuBtn.setAttribute('aria-expanded', 'false');
      document.body.style.overflow = '';

      // Tetikleyici butona geri odaklan
      this.menuBtn.focus();
    }
  };

  /* ==========================================================================
     DOM Hazır Olduğunda Başlat (DOMContentLoaded)
     ========================================================================== */
  document.addEventListener('DOMContentLoaded', () => {
    ThemeManager.init();
    MobileNavManager.init();
  });

})();
