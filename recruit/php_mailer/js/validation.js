export const validation = () => {
  //.validationForm を指定した最初の form 要素を取得
  const validationForm = document.querySelector(".validationForm");
  //.validationForm を指定した form 要素が存在すれば
  if (validationForm) {
    //エラーを表示する span 要素に付与するクラス名（エラー用のクラス）
    const errorClassName = "error";
    const maxlengthElems = document.querySelectorAll(".maxlength");
    const emailElems = document.querySelectorAll(".email");
    const lineElems = document.querySelectorAll(".line");
    const telElems = document.querySelectorAll(".telephone");
    const ageElems = document.querySelectorAll(".age");
    const requiredElems = document.querySelectorAll(".required");
    const checkElems = document.querySelectorAll(".check");

    //エラーメッセージを表示する span 要素を生成して親要素に追加する関数
    //elem ：対象の要素
    //errorMessage ：表示するエラーメッセージ
    const createError = (elem, errorMessage) => {
      const errorSpan = document.createElement("span");
      errorSpan.classList.add(errorClassName);
      errorSpan.setAttribute("aria-live", "polite");
      errorSpan.textContent = errorMessage;
      elem.parentNode.appendChild(errorSpan);
    };

    //送信時の処理（form 要素の submit イベント）
    validationForm.addEventListener("submit", (e) => {
      //エラーを表示する要素を全て取得して削除（初期化）
      const errorElems = validationForm.querySelectorAll("." + errorClassName);
      errorElems.forEach((elem) => {
        //エラーを表示する要素を削除
        elem.remove();
      });

      //.maxlength を指定した要素を検証
      maxlengthElems.forEach((elem) => {
        const maxlength = elem.dataset.maxlength;
        if (elem.value !== "") {
          if (elem.value.length > maxlength) {
            createError(elem, maxlength + "文字以内でご入力ください");
          }
        }
      });

      // .email を指定した要素を検証
      emailElems.forEach((elem) => {
        const pattern =
          /^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/iu;
        if (elem.value !== "" && document.querySelector('input[name="contact_type"]:checked').value === "メールアドレス") {
          if (!pattern.test(elem.value)) {
            createError(elem, "Email アドレスの形式が正しくないようです。");
          }
        }
      });

      //.telephone を指定した要素を検証
      telElems.forEach((elem) => {
        const pattern =
          /^\(?\d{2,5}\)?[-(\.\s]{0,2}\d{1,4}[-)\.\s]{0,2}\d{3,4}$/;
        if (elem.value !== "") {
          if (!pattern.test(elem.value)) {
            createError(elem, "電話番号の形式が正しくないようです。");
          }
        }
      });

      //.age を指定した要素を検証
      ageElems.forEach((elem) => {
        const pattern = /^\d{2}$/;
        if (elem.value !== "") {
          if (!pattern.test(elem.value)) {
            createError(elem, "年齢の形式が正しくないようです。");
          }
        }
      });

      //.required を指定した要素を検証
      requiredElems.forEach((elem) => {
        //値（value プロパティ）の前後の空白文字を削除
        const elemValue = elem.value.trim();
        //値が空の場合はエラーを表示してフォームの送信を中止
        if (elemValue.length === 0) {
          //その要素が select 要素の場合
          if (elem.tagName === "SELECT") {
            createError(elem, "選択してください");
          } else {
            //その要素が select 要素以外の場合
            createError(elem, "入力は必須です");
          }
        }
      });

      checkElems.forEach((elem) => {
        const checkBoxList = document.querySelectorAll(
          "input[type='checkbox']"
        );
        let checkedCount = 0;
        for (let i = 0; i < checkBoxList.length; i++) {
          if (checkBoxList[i].checked === true) {
            checkedCount++;
          }
        }
        if (checkedCount === 0) {
          createError(elem, "少なくとも1つを選択してください");
        }
      });
    });
  }
};
