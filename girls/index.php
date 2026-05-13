<?php
$path = '../';
$title = '女性一覧';
$templete = 'girls';
include $path . 'components/header.php'; ?>
<main class="girls">
  <div class="container">


    <h2><img src="<?php echo $path; ?>assets/img/girls-ttl.png" alt="女の子一覧"></h2>



    <nav class="girls__nav">
      <ul class="girls__nav__list">
        <?php include $path . 'components/girlCard.php'; ?>
      </ul>
    </nav>



  </div>
</main>

<?php include $path . 'components/footer.php'; ?>