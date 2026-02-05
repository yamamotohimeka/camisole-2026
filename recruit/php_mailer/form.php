<?php
$templete = 'form';

session_start();
$token = sha1(uniqid(rand(), true));
$_SESSION['key'] = $token;

?>


<div class="form">
  <form method="post" class="validationForm" id="the-form">

    <div class="form-box">
      <label class="hissu">ニックネーム</label>
      <input type="text" name="name" value="" class="maxlength required" data-maxlength="10" placeholder="山田 花子">
    </div>
    <div class="form-box">
      <label class="hissu">フリガナ</label>
      <input type="text" name="furigana" value="" class="maxlength required" data-maxlength="10" placeholder="ヤマダ ハナコ">
    </div>

    <div class="form-box">
      <label class="hissu">メールアドレス</label>
      <input type="email" name="email" value="" size="40" id="email" class="required email" placeholder="example@gmail.com">
    </div>

    <div class="form-box">
      <label class="hissu">年齢</label>
      <input type="number" class="age required" name="age" value="" min="18" placeholder="20">
    </div>

    <div class="form-box-radio">
      <div class="form-box-radio-label">
        <label class="hissu">身分証明書</label>
      </div>
      <div class="form-box-radio-inner">
        <input type="radio" name="mibun" value="運転免許証" id="license">
        <label for="license"> 運転免許証</label>
      </div>
      <div class="form-box-radio-inner">
        <input type="radio" name="mibun" value="パスポート" id="passport">
        <label for="passport"> パスポート</label>
      </div>
      <div class="form-box-radio-inner">
        <input type="radio" name="mibun" value="住民基本台帳カード" id="card">
        <label for="card"> 住民基本台帳カード</label>
      </div>
      <div class="form-box-radio-inner">
        <input type="radio" name="mibun" value="戸籍謄本" id="kekokur">
        <label for="kekokur"> 戸籍謄本</label>
      </div>
      <div class="form-box-radio-inner">
        <input type="radio" name="mibun" value="外国人登録証" id="foreigner">
        <label for="foreigner"> 外国人登録証</label>
      </div>
      <div class="form-box-radio-inner">
        <input type="radio" name="mibun" value="本籍記載のある住民票" id="address">
        <label for="address"> 本籍記載のある住民票</label>
      </div>
      <div class="form-box-radio-inner">
        <input type="radio" name="mibun" value="ECT" id="ect">
        <label for="ect"> ECT</label>
      </div>
    </div>

    <div class="form-box-radio">
      <div class="form-box-radio-label">
        <label class="hissu">風俗経験</label>
      </div>
      <div class="form-box-radio-inner">
        <input type="radio" name="keiken" value="あり" id="keiken">
        <label for="keiken"> あり</label>
      </div>
      <div class="form-box-radio-inner">
        <input type="radio" name="keiken" value="なし" id="keiken">
        <label for="keiken"> なし</label>
      </div>
    </div>



    <!-- 希望勤務地 チェックボックス 必須 -->
    <div class="form-box-radio">
      <div class="form-box-radio-label">
        <label class="hissu">ご希望勤務地</label>
      </div>
      <div class="form-box-radio-inner">
        <input type="radio" name="work[]" value="日本橋" id="kinmu1">
        <label for="kinmu1"> 日本橋</label>
      </div>
      <div class="form-box-radio-inner">
        <input type="radio" name="work[]" value="難波" id="kinmu3">
        <label for="kinmu3"> 難波</label>
      </div>
      <div class="form-box-radio-inner">
        <input type="radio" name="work[]" value="天王寺" id="kinmu6">
        <label for="kinmu6"> 天王寺</label>
      </div>
      <div class="form-box-radio-inner">
        <input type="radio" name="work[]" value="谷九" id="kinmu5">
        <label for="kinmu5"> 谷九</label>
      </div>
      <div class="form-box-radio-inner">
        <input type="radio" name="work[]" value="京橋" id="kinmu4">
        <label for="kinmu4"> 京橋</label>
      </div>
      <div class="form-box-radio-inner">
        <input type="radio" name="work[]" value="梅田" id="kinmu2">
        <label for="kinmu2"> 梅田</label>
      </div>
    </div>


    <div class="form-box">
      <label>ご質問等</label>
      <textarea name="text" cols="80" rows="10"></textarea>
    </div>


    <div class="form-submit">
      <input type="submit" value="送信" class="submit-btn" id="submit" value="送信">
      <input type="hidden" name="token" value="<?= $token ?>">
    </div>
  </form>
</div>


<div id="form-load">
  <div class="load">
  </div>
  <div class="load1">
    <br>
    <div class="loader"></div>
    <p>送信中</p>
  </div>
</div>

<!-- 結果メッセージ -->
<div id="result"></div><!-- /#result -->

<script type="module" src="php_mailer/js/form.js"></script>
<script src="https://www.google.com/recaptcha/api.js?render=6Le5LrgiAAAAAJJp2fncKXfGy8LqQ5bIYjDG0SKn"></script>