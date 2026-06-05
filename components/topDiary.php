<?php

/**
 * トップページ用 写メ日記プレビュー
 * 事前に $topDiaryEntries, $path をセットして include すること
 */

if (empty($topDiaryEntries)) {
  return;
}

?>
<div class="top__diary__panel">
  <div class="top__diary__scroll" tabindex="0" aria-label="写メ日記一覧（縦スクロール）">
    <ul class="top__diary__list">
      <?php foreach ($topDiaryEntries as $entry) : ?>
        <li class="top__diary__item">
          <article class="top__diary__card">
            <a class="top__diary__card-img" href="<?php echo $path; ?>diary.php">
              <img
                src="<?php echo $path; ?>assets/img/diary/<?php echo htmlspecialchars($entry['img'], ENT_QUOTES, 'UTF-8'); ?>"
                alt="<?php echo htmlspecialchars($entry['name'], ENT_QUOTES, 'UTF-8'); ?>の写メ"
                loading="lazy">
            </a>
            <div class="top__diary__card-body">
              <div class="top__diary__card-meta">
                <button class="top__diary__card-name" type="button" data-modal-open="login">
                  <?php echo htmlspecialchars($entry['name'], ENT_QUOTES, 'UTF-8'); ?>
                </button>
                <time class="top__diary__card-date" datetime="<?php echo date('c', $entry['posted_at']); ?>">
                  <?php echo htmlspecialchars($entry['posted_at_display'], ENT_QUOTES, 'UTF-8'); ?>
                </time>
              </div>
              <p class="top__diary__card-text"><?php echo nl2br(htmlspecialchars($entry['body'], ENT_QUOTES, 'UTF-8')); ?></p>
            </div>
          </article>
        </li>
      <?php endforeach; ?>
    </ul>
  </div>
</div>
