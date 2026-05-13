<?php
$path = './';
$title = 'CAMISOLE';
$templete = 'top';
include $path . 'components/header.php'; ?>
<main class="top">

  <section class="top__slider container">

    <div class="top__slider__bnr bnr-swiper swiper">
      <div class="swiper-wrapper">
        <div class="top__slider__bnr-item swiper-slide">
          <img src="<?php echo $path; ?>assets/img/top-bnr1.png" alt="3Pコース">
        </div>
        <div class="top__slider__bnr-item swiper-slide">
          <img src="<?php echo $path; ?>assets/img/top-bnr2.png" alt="新規割">
        </div>
      </div>
      <div class="swiper-bullets"></div>
    </div>

    <div class="top__slider__newface newface-swiper swiper">
      <div class="swiper-wrapper">
        <?php
        $templete = 'newface';
        include $path . 'components/girlCard.php';
        $templete = 'top';
        ?>
      </div>
      <div class="top__slider__newface-arrow top__slider__newface-arrow--prev"></div>
      <div class="top__slider__newface-arrow top__slider__newface-arrow--next"></div>
    </div>
  </section>

  <section class="top__sche container">
    <h2><img src="<?php echo $path; ?>assets/img/top-ttl.png" alt="本日のスケジュール"></h2>


    <div class="top__sche__day">
      <?php echo date('m月d日'); ?>（<?php $week = ['日', '月', '火', '水', '木', '金', '土'];
                                  echo $week[(int)date('w')]; ?>）
    </div>

    <nav class="top__sche__nav">
      <ul class="top__sche__nav__list">
        <?php include $path . 'components/girlCard.php'; ?>
      </ul>
    </nav>
    <div class="top__sche__btn">
      <a href="<?php echo $path; ?>schedule">出勤情報はコチラから</a>
    </div>

  </section>
</main>
<?php include $path . 'components/footer.php'; ?>