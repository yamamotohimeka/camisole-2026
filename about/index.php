<?php
$path = '../';
$title = '当店について';
$templete = 'about';
include $path . 'components/header.php'; ?>
<main class="about">
  <div class="container">
    <h2><img src="<?php echo $path; ?>assets/img/about-ttl.png" alt="当店について"></h2>


    <div class="about__img pc">
      <img src="<?php echo $path; ?>assets/img/about.png" alt="当店の説明">
    </div>
    <div class="about__img tab">
      <img src="<?php echo $path; ?>assets/img/about-sp.png" alt="当店の説明">
    </div>
</main>
<?php include $path . 'components/footer.php'; ?>