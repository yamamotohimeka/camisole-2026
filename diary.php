<?php

$path = './';

$title = '写メ日記';

$templete = 'diary';

include $path . 'components/header.php';

require_once $path . 'hooks/diary.php';



$currentPage = isset($_GET['page']) ? (int) $_GET['page'] : 1;

$diaryData = getPaginatedDiaryEntries($currentPage, 5);

$diaryEntries = $diaryData['entries'];

$totalPages = $diaryData['totalPages'];

$currentPage = $diaryData['page'];

?>

<main class="diary">

  <div class="container">

    <h2><img src="<?php echo $path; ?>assets/img/diary-ttl.png" alt="写メ日記"></h2>



    <ul class="diary__list">

      <?php foreach ($diaryEntries as $entry) : ?>

        <li class="diary__item">

          <article class="diary__card">

            <div class="diary__card-img">

              <img

                src="<?php echo $path; ?>assets/img/diary/<?php echo htmlspecialchars($entry['img'], ENT_QUOTES, 'UTF-8'); ?>"

                alt="<?php echo htmlspecialchars($entry['name'], ENT_QUOTES, 'UTF-8'); ?>の写メ"

                loading="lazy">

            </div>

            <div class="diary__card-body">

              <div class="diary__card-meta">

                <button class="diary__card-name" type="button" data-modal-open="login">
                  <?php echo htmlspecialchars($entry['name'], ENT_QUOTES, 'UTF-8'); ?>
                </button>

                <time class="diary__card-date" datetime="<?php echo date('c', $entry['posted_at']); ?>">

                  <?php echo htmlspecialchars($entry['posted_at_display'], ENT_QUOTES, 'UTF-8'); ?>

                </time>

              </div>

              <p class="diary__card-text"><?php echo nl2br(htmlspecialchars($entry['body'], ENT_QUOTES, 'UTF-8')); ?></p>

            </div>

          </article>

        </li>

      <?php endforeach; ?>

    </ul>



    <?php if ($totalPages > 1) : ?>

      <nav class="diary__pager" aria-label="写メ日記ページネーション">

        <ul class="diary__pager-list">

          <?php if ($currentPage > 1) : ?>

            <li class="diary__pager-item">

              <a class="diary__pager-link diary__pager-link--prev" href="<?php echo $path . getDiaryPageUrl($currentPage - 1); ?>">前へ</a>

            </li>

          <?php endif; ?>



          <?php for ($i = 1; $i <= $totalPages; $i++) : ?>

            <?php $isActive = $i === $currentPage; ?>

            <li class="diary__pager-item">

              <?php if ($isActive) : ?>

                <span class="diary__pager-link diary__pager-link--active" aria-current="page"><?php echo $i; ?></span>

              <?php else : ?>

                <a class="diary__pager-link" href="<?php echo $path . getDiaryPageUrl($i); ?>"><?php echo $i; ?></a>

              <?php endif; ?>

            </li>

          <?php endfor; ?>



          <?php if ($currentPage < $totalPages) : ?>

            <li class="diary__pager-item">

              <a class="diary__pager-link diary__pager-link--next" href="<?php echo $path . getDiaryPageUrl($currentPage + 1); ?>">次へ</a>

            </li>

          <?php endif; ?>

        </ul>

      </nav>

    <?php endif; ?>

  </div>

</main>

<?php include $path . 'components/footer.php'; ?>


