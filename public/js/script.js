$(function () {
  // ↓ヘッダーメニュー
  $('.bi-chevron-up').click(function () {
    $('.bi-chevron-up').toggleClass('add');
  });
  // ↑ヘッダーメニュー

  // ↓投稿編集モーダル（カリキュラムコピペ）
  $('.js-modal-open').on('click', function () {
    // モーダルの中身(class="js-modal")の表示
    $('.js-modal').fadeIn();
    // 押されたボタンから投稿内容を取得し変数へ格納
    //（↓thisは.js-modal-openのことでここからpostを取得し格納したという意味）
    var post = $(this).attr('post');
    // 押されたボタンから投稿のidを取得し変数へ格納（どの投稿を編集するか特定するのに必要な為）
    var post_id = $(this).attr('post_id');

    // 取得した投稿内容をモーダルの中身へ渡す
    $('.modal_post').text(post);
    // 取得した投稿のidをモーダルの中身へ渡す
    $('.modal_id').val(post_id);
    return false;
  });
  // ↑投稿編集モーダル（カリキュラムコピペ）

});
