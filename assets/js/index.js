(function () {
  const swiper = () => {
    const swiper = new Swiper(".bnr-swiper", {
      pagination: {
        el: ".swiper-bullets",
      },
      loop: true,
      autoplay: {
        delay: 3000,
        disableOnInteraction: false,
      },
      slidesPerView: 1,
      spaceBetween: 0,
    });
    const newfaceSwiper = new Swiper(".newface-swiper", {
      pagination: {
        el: ".swiper-pagination",
      },
      navigation: {
        nextEl: ".top__slider__newface-arrow--next",
        prevEl: ".top__slider__newface-arrow--prev",
      },
      loop: true,
      slidesPerView: 1,
      spaceBetween: 0,
    });
  };
  const schedule = () => {
    const buttons = document.querySelectorAll("[data-schedule-day]");
    const cards = document.querySelectorAll(".schedule .girlCard");

    if (!buttons.length || !cards.length) {
      return;
    }

    const showCards = (day) => {
      cards.forEach((card) => {
        card.classList.toggle("block", card.classList.contains(day));
      });
    };

    buttons.forEach((button) => {
      button.addEventListener("click", () => {
        buttons.forEach((item) => item.classList.remove("dateActive"));
        button.classList.add("dateActive");
        showCards(button.dataset.scheduleDay);
      });
    });

    const activeButton = document.querySelector("[data-schedule-day].dateActive") || buttons[0];
    showCards(activeButton.dataset.scheduleDay);
  };
  const authModal = () => {
    const modal = document.querySelector(".authModal");
    const openButtons = document.querySelectorAll("[data-modal-open]");

    if (!modal || !openButtons.length) {
      return;
    }

    const tabs = modal.querySelectorAll("[data-auth-tab]");
    const panels = modal.querySelectorAll("[data-auth-panel]");
    const closeButtons = modal.querySelectorAll("[data-modal-close]");
    const forms = modal.querySelectorAll(".authModal__form");

    const switchPanel = (target) => {
      tabs.forEach((tab) => {
        tab.classList.toggle("is-active", tab.dataset.authTab === target);
      });
      panels.forEach((panel) => {
        panel.classList.toggle("is-active", panel.dataset.authPanel === target);
      });
    };

    const openModal = (target) => {
      switchPanel(target);
      modal.classList.add("is-open");
      modal.setAttribute("aria-hidden", "false");
      document.body.style.overflow = "hidden";
    };

    const closeModal = () => {
      modal.classList.remove("is-open");
      modal.setAttribute("aria-hidden", "true");
      document.body.style.overflow = "";
    };

    openButtons.forEach((button) => {
      button.addEventListener("click", () => {
        openModal(button.dataset.modalOpen);
      });
    });

    tabs.forEach((tab) => {
      tab.addEventListener("click", () => {
        switchPanel(tab.dataset.authTab);
      });
    });

    closeButtons.forEach((button) => {
      button.addEventListener("click", closeModal);
    });

    forms.forEach((form) => {
      form.addEventListener("submit", (event) => {
        event.preventDefault();
        const submit = form.querySelector(".authModal__submit");
        const status = form.querySelector(".authModal__status");
        const panel = form.dataset.authPanel;
        const defaultText = submit.textContent;
        const errorText =
          panel === "login"
            ? "ログインに失敗しました。入力内容をご確認のうえ、再度お試しください。"
            : "登録エラーが発生しました。入力内容をご確認のうえ、再度お試しください。";

        status.textContent = "";
        status.classList.remove("is-error");
        submit.disabled = true;
        submit.classList.add("is-loading");
        submit.textContent = panel === "login" ? "ログイン中..." : "登録中...";

        setTimeout(() => {
          submit.disabled = false;
          submit.classList.remove("is-loading");
          submit.textContent = defaultText;
          status.textContent = errorText;
          status.classList.add("is-error");
        }, 1200);
      });
    });

    document.addEventListener("keydown", (event) => {
      if (event.key === "Escape" && modal.classList.contains("is-open")) {
        closeModal();
      }
    });
  };
  const tabNav = () => {
    const button = document.querySelector(".header__tabNav-hamburger-menu");
    const overlay = document.querySelector(".header__tabNav-overlay");
    const links = document.querySelectorAll(".header__tabNav-link");

    if (!button || !overlay) {
      return;
    }

    const openMenu = () => {
      button.classList.add("is-open");
      overlay.classList.add("is-open");
      button.setAttribute("aria-expanded", "true");
      button.setAttribute("aria-label", "メニューを閉じる");
      document.body.style.overflow = "hidden";
    };

    const closeMenu = () => {
      button.classList.remove("is-open");
      overlay.classList.remove("is-open");
      button.setAttribute("aria-expanded", "false");
      button.setAttribute("aria-label", "メニューを開く");
      document.body.style.overflow = "";
    };

    button.addEventListener("click", () => {
      if (overlay.classList.contains("is-open")) {
        closeMenu();
      } else {
        openMenu();
      }
    });

    links.forEach((link) => {
      link.addEventListener("click", closeMenu);
    });

    document.addEventListener("keydown", (event) => {
      if (event.key === "Escape" && overlay.classList.contains("is-open")) {
        closeMenu();
      }
    });
  };
  document.addEventListener("DOMContentLoaded", () => {
    swiper();
    schedule();
    authModal();
    tabNav();
  });
})();
