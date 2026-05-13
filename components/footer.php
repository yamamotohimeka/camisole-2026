  <footer class="footer">
    <div class="container">
      <div class="footer__nav">
        <ul class="footer__nav-list">
          <li class="footer__nav-item">
            <a href="<?php echo $path; ?>index.php" class="footer__nav-link">
              <img src="<?php echo $path; ?>assets/img/top-icon.png" alt="CAMISOLE">
              <span>トップ</span>
            </a>
          </li>
          <li class="footer__nav-item">
            <a href="<?php echo $path; ?>girls" class="footer__nav-link">
              <img src="<?php echo $path; ?>assets/img/girls-icon.png" alt="女の子一覧">
              <span>女の子一覧</span>
            </a>
          </li>
          <li class="footer__nav-item">
            <a href="<?php echo $path; ?>schedule" class="footer__nav-link">
              <img src="<?php echo $path; ?>assets/img/schedule-icon.png" alt="出勤情報">
              <span>出勤情報</span>
            </a>
          </li>
          <li class="footer__nav-item">
            <a href="<?php echo $path; ?>about" class="footer__nav-link">
              <img src="<?php echo $path; ?>assets/img/store-icon.png" alt="当店について">
              <span>当店について</span>
            </a>
          </li>
          <li class="footer__nav-item">
            <a href="<?php echo $path; ?>system" class="footer__nav-link">
              <img src="<?php echo $path; ?>assets/img/system-icon.png" alt="システム">
              <span>システム</span>
            </a>
          </li>
          <li class="footer__nav-item">
            <a href="<?php echo $path; ?>access" class="footer__nav-link">
              <img src="<?php echo $path; ?>assets/img/access-icon.png" alt="アクセス">
              <span>アクセス</span>
            </a>
          </li>
        </ul>

        <ul class="footer__tabNav-list">
          <li class="footer__tabNav-item">
            <a href="tel:0120960547" target="_blank">
              <img src="<?php echo $path; ?>assets/img/tel-footer-icon.png" alt="TEL">
            </a>
          </li>


          <li class="footer__tabNav-item">
            <button class="header__btn-modal" type="button" data-modal-open="login">
              <img src="<?php echo $path; ?>assets/img/login-footer-icon.png" alt="ログイン">
            </button>
          </li>
          <li class="footer__tabNav-item">
            <button class="header__btn-modal" type="button" data-modal-open="register">
              <img src="<?php echo $path; ?>assets/img/register-footer-icon.png" alt="会員登録">
            </button>
          </li>
          <li class="footer__tabNav-item">
            <a href="<?php echo $path; ?>recruit/index.php" target="_blank"><img src="<?php echo $path; ?>assets/img/recruit-footer-icon.png" alt="女子求人"></a>
          </li>

        </ul>
      </div>

      <div class="footer__logo pc">
        <a href="<?php echo $path; ?>index.php"><img src="<?php echo $path; ?>assets/img/footer-logo.png" alt="CAMISOLE"></a>
      </div>

      <div class="footer__copyright pc">
        <p>&copy; 2026 CAMISOLE. All rights reserved.</p>
      </div>
    </div>
  </footer>
  </body>
  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
  <script src="<?php echo $path; ?>assets/js/index.js"></script>

  </html>