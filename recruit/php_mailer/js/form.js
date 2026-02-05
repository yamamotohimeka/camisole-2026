import { validation } from "./validation.js";

validation();

//電話・メールラジオボタン切り替え
document.addEventListener("DOMContentLoaded", () => {
  $("#telephone").val("");
  $('[name="btn"]:radio').change(function () {
    if ($("[id=mailSelect]").prop("checked")) {
      $(".text").css("display", "none");
      $(".text01").css("display", "block");
      $(".mailSelect").attr("checked", "checked");
      $(".telSelect").removeAttr("checked");
      $("#email").val("");
      $("#telephone").val("00000000000");
    } else if ($("[id=telSelect]").prop("checked")) {
      $(".text").css("display", "none");
      $(".text02").css("display", "block");
      $(".telSelect").attr("checked", "checked");
      $(".mailSelect").removeAttr("checked");
      $("#email").val("a@gmail.com");
      $("#telephone").val("");
    }
  });

  $("#the-form").submit(function (event) {
    event.preventDefault();

    //フォームの入力値を変数に格納する
    const form_data = $("form").serialize();

    if ($("span").hasClass("error")) {
      $("#form-load").hide();
    } else {
      //フォームの入力内容をajaxにより送信する
      $.ajax({
        type: "POST", //POST送信
        url: "php_mailer/send.php", //送信先のURL
        data: form_data, //送信するデータを指定
        timeout: 40000, //タイムアウトの設定
        beforeSend: function (xhr, settings) {
          //リクエスト送信前にボタンを非活性化する
          $(".submit-btn").attr("disabled", true);
          //モーダルウィンドウの表示
          $("#form-load").fadeIn();
        },
        complete: function (xhr, textStatus) {
          //モーダルウィンドウを消す
          $("#form-load").fadeOut();
          //リクエスト送信が完了したら、ボタンの非活性化を解除する
          $(".submit-btn").attr("disabled", false);
        },
      })
        .done(function (data, textStatus, jqXHR) {
          //通信成功時の処理
          $("#form-load").hide();
          $("#the-form").hide();
          $("#the-form")[0].reset(); //フォームに入力している値をリセット
          $("#result").html(data); //send_mail.phpから返ってきたメッセージをHTMLに入れて表示する
        })
        .fail(function (jqXHR, textStatus, errorThrown) {
          //通信失敗時の処理
          $("#form-load").hide();
          console.log("XMLHttpRequest : " + XMLHttpRequest.status);
          console.log("textStatus     : " + textStatus);
          console.log("errorThrown    : " + errorThrown.message);
          $("#result").text("送信できませんでした"); //失敗メッセージをHTMLに入れて表示する
        });
    }
  });
});
