// 関数の重複宣言を防ぐ（即時実行関数でラップ）
(function () {
  const headerHamburgerMenu = () => {
    const hamburgerMenu = document.querySelector(".header__hamburger-menu");
    const hamburgerMenuOverlay = document.querySelector(
      ".header__hamburger-menu-overlay"
    );
    const hamburgerMenuContent = document.querySelector(
      ".header__hamburger-menu-content"
    );
    const hamburgerMenuLinks = document.querySelectorAll(
      ".header__hamburger-menu-link"
    );

    if (!hamburgerMenu) return; // 要素が存在しない場合は処理をスキップ

    // メニューを開閉する関数
    const toggleMenu = () => {
      const isActive = hamburgerMenuOverlay.classList.contains("active");

      if (isActive) {
        // メニューを閉じる
        hamburgerMenuOverlay.classList.remove("active");
        hamburgerMenuContent.classList.remove("active");
        hamburgerMenu.classList.remove("active");
        document.body.style.overflow = ""; // スクロールを復元
      } else {
        // メニューを開く
        hamburgerMenuOverlay.classList.add("active");
        hamburgerMenuContent.classList.add("active");
        hamburgerMenu.classList.add("active");
        document.body.style.overflow = "hidden"; // スクロールを無効化
      }
    };

    // ハンバーガーメニューボタンのクリックイベント
    hamburgerMenu.addEventListener("click", (e) => {
      e.preventDefault();
      toggleMenu();
    });

    // オーバーレイのクリックイベント（メニューを閉じる）
    hamburgerMenuOverlay.addEventListener("click", (e) => {
      if (e.target === hamburgerMenuOverlay) {
        toggleMenu();
      }
    });

    // メニュー内のリンクをクリックしたらメニューを閉じる
    hamburgerMenuLinks.forEach((link) => {
      link.addEventListener("click", () => {
        toggleMenu();
      });
    });
  };

  // FAQアコーディオン機能
  const faqAccordion = () => {
    const faqItems = document.querySelectorAll(".faq__inner-content-item");

    if (!faqItems.length) return; // 要素が存在しない場合は処理をスキップ

    faqItems.forEach((item) => {
      const titleButton = item.querySelector(".faq__inner-content-item-title");
      const answer = item.querySelector(".faq__inner-content-item-answer");

      if (!titleButton || !answer) return;

      // 初期状態：最初の項目を開く
      if (item === faqItems[0]) {
        item.classList.add("is-open");
        titleButton.classList.add("is-open");
      }

      // タイトルボタンのクリックイベント
      titleButton.addEventListener("click", () => {
        const isOpen = item.classList.contains("is-open");

        if (isOpen) {
          // 閉じる
          item.classList.remove("is-open");
          titleButton.classList.remove("is-open");
        } else {
          // 開く（他の項目を閉じる）
          faqItems.forEach((otherItem) => {
            otherItem.classList.remove("is-open");
            otherItem
              .querySelector(".faq__inner-content-item-title")
              ?.classList.remove("is-open");
          });
          item.classList.add("is-open");
          titleButton.classList.add("is-open");
        }
      });
    });
  };

  // DOMContentLoaded時に実行
  document.addEventListener("DOMContentLoaded", () => {
    headerHamburgerMenu();
    faqAccordion();
  });
})();

// Swiperの初期化（ライブラリが読み込まれている場合のみ）
document.addEventListener("DOMContentLoaded", () => {
  // Swiperライブラリが読み込まれているかチェック
  if (typeof Swiper !== "undefined") {
    const swiperElement = document.querySelector(".swiper");
    if (swiperElement) {
      new Swiper(".swiper", {
        centeredSlides: true,
        pagination: {
          el: ".swiper-pagination",
          clickable: true,
          renderBullet: function (index, className) {
            // 01, 02, 03... の形式で数字を表示
            const number = String(index + 1).padStart(2, "0");
            return '<span class="' + className + '">' + number + "</span>";
          },
        },
        loop: true,
        slidesPerView: 1,
        spaceBetween: 50,
      });
    }
  }
});

// Lenisの初期化とスクロール連動アニメーション
document.addEventListener("DOMContentLoaded", () => {
  if (typeof Lenis !== "undefined") {
    // Lenisインスタンスを作成
    const lenis = new Lenis({
      duration: 1.5,
      easing: (t) => Math.min(1, 1.001 - Math.pow(2, -10 * t)), // easeOutExpo
      orientation: "vertical", // 縦スクロール
      gestureOrientation: "vertical",
      smoothWheel: true,
      wheelMultiplier: 1,
      smoothTouch: false, // モバイルでは通常のスクロール（パフォーマンス向上）
      touchMultiplier: 2,
    });

    // 他処理から参照できるように公開（ページトップボタン等）
    window.lenis = lenis;

    // パララックス効果を適用する要素を取得
    const parallaxElements = document.querySelectorAll("[data-parallax]");

    // スクロール連動アニメーション対象（data-fade = 従来の下からフェード、data-animate = 効果を指定）
    const animateElements = document.querySelectorAll("[data-fade], [data-animate]");

    // パララックス効果を更新する関数
    const updateParallax = (scroll) => {
      parallaxElements.forEach((element) => {
        const speed = parseFloat(element.dataset.parallax) || 0.5;
        const rect = element.getBoundingClientRect();
        const elementTop = rect.top + scroll;
        const yPos = (scroll - elementTop) * speed;
        element.style.transform = `translate3d(0, ${yPos}px, 0)`;
        element.style.willChange = "transform";
      });
    };

    // スクロール連動アニメーションを更新する関数
    // data-fade → fade-up、data-animate="効果名" で種類を指定
    const updateScrollAnimate = (scroll) => {
      const windowHeight = window.innerHeight;
      const moveDistance = 48;
      const fadeUpDistance = 56; // data-fade 用：下からスライドする量（大きくすると差別化しやすい）

      animateElements.forEach((element) => {
        const rect = element.getBoundingClientRect();
        const elementTop = rect.top;
        const elementBottom = rect.bottom;

        // 効果名: data-animate を優先、無ければ data-fade なら "fade-up"
        const rawEffect =
          element.getAttribute("data-animate") ||
          (element.hasAttribute("data-fade") ? "fade-up" : "fade-up");
        const effect = String(rawEffect).trim().toLowerCase() || "fade-up";

        if (elementTop < windowHeight && elementBottom > 0) {
          let progress = Math.max(
            0,
            Math.min(1, (windowHeight - elementTop) / windowHeight)
          );
          // "fade" だけ進みを早く（少ないスクロールで完了）
          if (effect === "fade") {
            progress = Math.min(1, progress / 0.35);
          }
          element.style.opacity = progress;

          switch (effect) {
            case "fade-down":
              element.style.transform = `translate3d(0, ${-(1 - progress) * moveDistance}px, 0)`;
              break;
            case "slide-left":
              element.style.transform = `translate3d(${(1 - progress) * moveDistance}px, 0, 0)`;
              break;
            case "slide-right":
              element.style.transform = `translate3d(${-(1 - progress) * moveDistance}px, 0, 0)`;
              break;
            case "zoom":
              element.style.transform = `scale(${0.92 + 0.08 * progress})`;
              break;
            case "fade":
              // その場でフェードのみ。わずかにスケールで「ふわっと」差別化
              element.style.transform = `scale(${0.96 + 0.04 * progress})`;
              break;
            case "fade-up":
            default:
              element.style.transform = `translate3d(0, ${(1 - progress) * fadeUpDistance}px, 0)`;
              break;
          }
          element.style.willChange = "transform, opacity";
        } else {
          element.style.opacity = "0";
        }
      });
    };

    // Lenisのscrollイベントでパララックスとスクロールアニメーションを更新
    lenis.on("scroll", ({ scroll }) => {
      updateParallax(scroll);
      updateScrollAnimate(scroll);
    });

    // 初回表示時にも1回実行（スクロール前に見えている要素の状態を正す）
    updateScrollAnimate(0);

    // requestAnimationFrameループ
    function raf(time) {
      lenis.raf(time);
      requestAnimationFrame(raf);
    }

    requestAnimationFrame(raf);

    // レイアウト上の位置を取得（transform の影響を受けない＝Rellax でずれない）
    function getLayoutTop(el) {
      let top = 0;
      while (el) {
        top += el.offsetTop;
        el = el.offsetParent;
      }
      return top;
    }

    // アンカーリンクのスムーススクロール対応
    // #faq / #apply は Rellax が効いているため即時ジャンプでずれを防ぐ
    const instantJumpIds = ["faq", "apply"];

    document.querySelectorAll('a[href^="#"]').forEach((anchor) => {
      anchor.addEventListener("click", function (e) {
        const href = anchor.getAttribute("href");
        if (href === "#" || href === "") return;

        e.preventDefault();
        const target = document.querySelector(href);
        if (target) {
          const id = href.slice(1);
          const isInstant = instantJumpIds.includes(id);

          if (isInstant) {
            const scrollY = () =>
              window.pageYOffset ?? document.documentElement.scrollTop;
            const toTop = () =>
              Math.round(target.getBoundingClientRect().top + scrollY());
            lenis.scrollTo(toTop(), { immediate: true });
            requestAnimationFrame(() => {
              requestAnimationFrame(() => {
                lenis.scrollTo(toTop(), { immediate: true });
              });
            });
          } else {
            const scrollTop = getLayoutTop(target);
            lenis.scrollTo(scrollTop, { duration: 1.2 });
          }
        }
      });
    });

    // ページトップへ戻るボタン
    const backToTopBtn = document.querySelector(".js-back-to-top");
    if (backToTopBtn) {
      const updateBackToTopVisibility = () => {
        const y = window.pageYOffset ?? document.documentElement.scrollTop;
        if (y > 600) backToTopBtn.classList.add("is-show");
        else backToTopBtn.classList.remove("is-show");
      };

      backToTopBtn.addEventListener("click", () => {
        // Lenis が有効なら Lenis で、無ければ通常スクロール
        if (window.lenis) window.lenis.scrollTo(0, { duration: 1.0 });
        else window.scrollTo({ top: 0, behavior: "smooth" });
      });

      // Lenis のスクロールでも発火させる
      lenis.on("scroll", updateBackToTopVisibility);
      updateBackToTopVisibility();
    }
  }
});

// Rellaxの初期化（Lenisと併用可能）
document.addEventListener("DOMContentLoaded", () => {
  if (typeof Rellax !== "undefined") {
    const rellaxElement = document.querySelector(".rellax");
    if (rellaxElement) {
      new Rellax(".rellax", {
        speed: 2,
      });
    }
  }
});

