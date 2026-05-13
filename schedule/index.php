<?php
$path = '../';
$title = 'スケジュール';
$templete = 'schedule';
include $path . 'components/header.php';
?>
<main class="schedule">
  <div class="container">

    <h2><img src="<?php echo $path; ?>assets/img/sche-ttl.png" alt="出勤情報"></h2>

    <div class="schedule__btn">
      <ul class="schedule__btn__list">
        <?php
        $weekKeys = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];
        $weekLabels = ['日', '月', '火', '水', '木', '金', '土'];

        for ($i = 0; $i < 7; $i++) :
          $timestamp = strtotime("+{$i} day");
          $weekIndex = (int)date('w', $timestamp);
          $activeClass = $i === 0 ? ' dateActive' : '';
        ?>
          <li class="schedule__btn__list-item">
            <button class="schedule__btn__list-link<?php echo $activeClass; ?>" type="button" data-schedule-day="<?php echo $weekKeys[$weekIndex]; ?>">
              <span class="schedule__btn__list-date"><?php echo date('m/d', $timestamp); ?> (<?php echo $weekLabels[$weekIndex]; ?>)</span>
            </button>
          </li>
        <?php endfor; ?>
      </ul>
    </div>

    <nav class="schedule__nav">
      <ul class="schedule__nav__list">
        <?php include $path . 'components/girlCard.php'; ?>
      </ul>
    </nav>



  </div>
</main>

<?php include $path . 'components/footer.php'; ?>