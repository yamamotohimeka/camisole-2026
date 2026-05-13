<?php require(dirname(__FILE__) . "/../hooks/girls.php"); ?>


<?php

$week = [
  'sun', //0
  'mon', //1
  'tue', //2
  'wed', //3
  'thu', //4
  'fri', //5
  'sat', //6
];
$today = $week[(int)date('w')];

if ($templete == "newface") {
  shuffle($girls);
} elseif ($templete !== "girls") {
  // $girlsをtimeの降順で並び替え
  $times = array_column($girls, 'time');
  array_multisort($times, SORT_NATURAL, $girls);
};
$i = 0;
foreach ($girls as $girl):

  if ($templete == "newface" && !$girl['newface']) {
    continue;
  };

  if ($templete == "top") {
    if (!$girl[$today]) {
      continue;
    };
    $i++;
  };
?>


  <li class="girlCard none
    <?php if ($girl['sun']) echo 'Sun'; ?>
    <?php if ($girl['mon']) echo 'Mon'; ?>
    <?php if ($girl['tue']) echo 'Tue'; ?>
    <?php if ($girl['wed']) echo 'Wed'; ?>
    <?php if ($girl['thu']) echo 'Thu'; ?>
    <?php if ($girl['fri']) echo 'Fri'; ?>
    <?php if ($girl['sat']) echo 'Sat'; ?>
        <?php if ($templete == 'girls') {
          echo "block girlsData";
        } elseif ($templete == 'top') {
          echo "block";
        } elseif ($templete == 'schedule' && $girl[$today]) {
          echo "block";
        } elseif ($templete == 'newface') {
          echo "block top__slider__newface-item swiper-slide";
        } ?>
">


    <div class="girlCard-inner">


      <div class="girlCard-img">
        <button class="girlCard-imgBtn" type="button" data-modal-open="login" aria-label="<?php echo $girl['name']; ?>の詳細を見る">
          <img src="<?php echo $path; ?>assets/img/girl_<?php echo $girl['img']; ?>.png" alt="CAMISOLEの女の子の画像">
        </button>
        <span class="girlCard-newface <?php if ($girl['newface']) echo 'block'; ?>"><img src="<?php echo $path; ?>assets/img/newface.png" alt="新人アイコン"></span>
      </div>

      <div class="girlCard-info">
        <p class="girlCard-name">
          <?php echo $girl['name']; ?>(<?php echo $girl['age']; ?>)
        </p>

        <p class="girlCard-size">
          T<?php echo $girl['tall']; ?>・B<?php echo $girl['bust']; ?>・W<?php echo $girl['waist']; ?>・H<?php echo $girl['hip']; ?>
        </p>

        <p class="girlCard-nominal">
          特別指名料<?php echo $girl['nominal']; ?>円
        </p>

        <?php if ($templete !== 'girls') : ?>
          <p class=" girlCard-time">
            <?php echo $girl['time']; ?>
          </p>
        <?php endif; ?>

      </div>
    </div>
  </li>


<?php endforeach; ?>