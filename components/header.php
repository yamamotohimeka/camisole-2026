<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $title; ?></title>
  <link rel="stylesheet" href="<?php echo $path; ?>assets/css/style.css">
  <link rel="icon" href="<?php echo $path; ?>assets/img/favicon.png">
  <link rel="apple-touch-icon" href="<?php echo $path; ?>assets/img/favicon.png">
  <meta name="description" content="大阪の会員制高級オナニークラブ(オナクラ)「CAMISOLE」の公式WEBサイトです。">
  <meta name="keywords" content="オナクラ,会員制高級オナクラ,camisole,キャミソール,大阪,梅田,難波,天王寺,京橋,谷町九丁目">
  <meta name="author" content="キャミソール">
  <meta name="robots" content="index,follow">
  <meta name="googlebot" content="index,follow">
  <meta name="google" content="notranslate">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body>
  <header class="header">
    <div class="header__inner container">
      <h1 class="header__title">
        <a href="<?php echo $path; ?>index.php"><img src="<?php echo $path; ?>assets/img/logo.png" alt="CAMISOLE"></a>
      </h1>
      <div class="header__tel pc">
        <a href="tel:0120960547" target="_blank"><img src="<?php echo $path; ?>assets/img/tel-icon.png" alt="TEL"></a>
      </div>
      <div class="header__btn">
        <button class="header__btn-modal" type="button" data-modal-open="login">
          <img src="<?php echo $path; ?>assets/img/login-icon.png" alt="ログイン">
        </button>
        <button class="header__btn-modal" type="button" data-modal-open="register">
          <img src="<?php echo $path; ?>assets/img/register-icon.png" alt="会員登録">
        </button>
        <a href="<?php echo $path; ?>recruit/index.php" target="_blank"><img src="<?php echo $path; ?>assets/img/recruit-icon.png" alt="女子求人"></a>
      </div>
    </div>
    <div class="header__nav pc">
      <ul class="header__nav-list container">
        <li class="header__nav-item">
          <a href="<?php echo $path; ?>index.php" class="header__nav-link">
            <img src="<?php echo $path; ?>assets/img/top-icon.png" alt="トップ">
            <span>トップ</span>
          </a>
        </li>
        <li class="header__nav-item">
          <a href="<?php echo $path; ?>girls" class="header__nav-link">
            <img src="<?php echo $path; ?>assets/img/girls-icon.png" alt="女の子一覧">
            <span>女の子一覧</span></a>
        </li>
        <li class="header__nav-item">
          <a href="<?php echo $path; ?>schedule" class="header__nav-link">
            <img src="<?php echo $path; ?>assets/img/schedule-icon.png" alt="出勤情報">
            <span>出勤情報</span></a>
        </li>
        <li class="header__nav-item">
          <a href="<?php echo $path; ?>diary.php" class="header__nav-link">
            <img src="<?php echo $path; ?>assets/img/diary-icon.png" alt="写メ日記">
            <span>写メ日記</span></a>
        </li>
        <li class="header__nav-item">
          <a href="<?php echo $path; ?>about" class="header__nav-link">
            <img src="<?php echo $path; ?>assets/img/store-icon.png" alt="当店について">
            <span>当店について</span></a>
        </li>
        <li class="header__nav-item">
          <a href="<?php echo $path; ?>system" class="header__nav-link">
            <img src="<?php echo $path; ?>assets/img/system-icon.png" alt="システム">
            <span>システム</span></a>
        </li>
        <li class="header__nav-item">
          <a href="<?php echo $path; ?>access" class="header__nav-link">
            <img src="<?php echo $path; ?>assets/img/access-icon.png" alt="アクセス">
            <span>アクセス</span></a>
        </li>
      </ul>
    </div>

    <button class="header__tabNav-hamburger-menu tab" type="button" aria-label="メニューを開く" aria-expanded="false">
      <span class="header__tabNav-hamburger-menu-line"></span>
      <span class="header__tabNav-hamburger-menu-line"></span>
      <span class="header__tabNav-hamburger-menu-line"></span>
      <span class="header__tabNav-hamburger-menu-text"><span class="header__tabNav-hamburger-menu-text-open">MENU</span><span class="header__tabNav-hamburger-menu-text-close">CLOSE</span></span>
    </button>

    <div class="header__tabNav-overlay tab">
      <div class="header__tabNav-content">
        <ul class="header__tabNav-list">
          <li class="header__tabNav-item">
            <a href="<?php echo $path; ?>index.php" class="header__tabNav-link">
              <img src="<?php echo $path; ?>assets/img/top-icon.png" alt="">
              <span>トップ</span>
            </a>
          </li>
          <li class="header__tabNav-item">
            <a href="<?php echo $path; ?>girls" class="header__tabNav-link">
              <img src="<?php echo $path; ?>assets/img/girls-icon.png" alt="">
              <span>女の子一覧</span>
            </a>
          </li>
          <li class="header__tabNav-item">
            <a href="<?php echo $path; ?>schedule" class="header__tabNav-link">
              <img src="<?php echo $path; ?>assets/img/schedule-icon.png" alt="">
              <span>出勤情報</span>
            </a>
          </li>
          <li class="header__tabNav-item">
            <a href="<?php echo $path; ?>diary.php" class="header__tabNav-link">
              <img src="<?php echo $path; ?>assets/img/diary-icon.png" alt="">
              <span>写メ日記</span>
            </a>
          </li>
          <li class="header__tabNav-item">
            <a href="<?php echo $path; ?>about" class="header__tabNav-link">
              <img src="<?php echo $path; ?>assets/img/store-icon.png" alt="">
              <span>当店について</span>
            </a>
          </li>
          <li class="header__tabNav-item">
            <a href="<?php echo $path; ?>system" class="header__tabNav-link">
              <img src="<?php echo $path; ?>assets/img/system-icon.png" alt="">
              <span>システム</span>
            </a>
          </li>
          <li class="header__tabNav-item">
            <a href="<?php echo $path; ?>access" class="header__tabNav-link">
              <img src="<?php echo $path; ?>assets/img/access-icon.png" alt="">
              <span>アクセス</span>
            </a>
          </li>
        </ul>
      </div>
    </div>



    <div class="authModal" aria-hidden="true">
      <div class="authModal__overlay" data-modal-close></div>
      <div class="authModal__content" role="dialog" aria-modal="true" aria-labelledby="authModalTitle">
        <button class="authModal__close" type="button" data-modal-close aria-label="閉じる"></button>
        <div class="authModal__head">
          <p class="authModal__label">MEMBER SERVICE</p>
          <h2 class="authModal__title" id="authModalTitle">会員メニュー</h2>
          <p class="authModal__lead">会員登録いただくと、<br>ご予約や出勤情報の確認をスムーズにご利用いただけます。</p>
        </div>

        <div class="authModal__tabs">
          <button class="authModal__tab" type="button" data-auth-tab="login">ログイン</button>
          <button class="authModal__tab" type="button" data-auth-tab="register">新規会員登録</button>
        </div>

        <form class="authModal__form" data-auth-panel="login">
          <label class="authModal__field">
            <span>電話番号 または メールアドレス</span>
            <input type="text" placeholder="09012345678">
          </label>
          <label class="authModal__field">
            <span>パスワード</span>
            <input type="password" placeholder="password">
          </label>
          <label class="authModal__check">
            <input type="checkbox">
            <span>ログイン状態を保持する</span>
          </label>
          <button class="authModal__submit" type="submit">ログインする</button>
          <p class="authModal__status" aria-live="polite"></p>
        </form>

        <form class="authModal__form" data-auth-panel="register">
          <label class="authModal__field">
            <span>お名前（ニックネーム可）</span>
            <input type="text" placeholder="山田 太郎">
          </label>
          <label class="authModal__field">
            <span>電話番号</span>
            <input type="tel" placeholder="09012345678">
          </label>
          <label class="authModal__field">
            <span>メールアドレス</span>
            <input type="email" placeholder="sample@example.com">
          </label>
          <label class="authModal__field">
            <span>パスワード</span>
            <input type="password" placeholder="半角英数字8文字以上">
          </label>
          <label class="authModal__check">
            <input type="checkbox">
            <span>利用規約とプライバシーポリシーに同意する</span>
          </label>
          <button class="authModal__submit" type="submit">無料で会員登録する</button>
          <p class="authModal__status" aria-live="polite"></p>
        </form>
      </div>
    </div>
  </header>