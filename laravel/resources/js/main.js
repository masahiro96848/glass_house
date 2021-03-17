// ハンバーガーメニュー
$('.p-menu--button').on('click', function() {
  if( $(this).hasClass('active')){
    $(this).removeClass('active');
    $('.p-menu--wrap').addClass('close').removeClass('open');
  }else {
    $(this).addClass('active');
    $('.p-menu--wrap').addClass('open').removeClass('close');
  }
});


//チェックボックスの活性・非活性
$(function() {
  $('.p-profile--professional').click(function() {
    // チェックカウント用変数
  var check_count = 0;
  // 箇所チェック数カウント
  $('.p-profile--professional').each(function() {
    var parent_checkbox = $(this).children("input[type='checkbox']");
    if(parent_checkbox.prop('checked')) {
      check_count = check_count+1;
    }
  });
  // 0個のとき(チェックが全て外れたとき)
  if(check_count == 0) {
    $('.p-profile--professional').each(function() {
      $(this).children("input[type='checkbox']").prop('disabled', false);
      $(this).removeClass('locked');
    });
  // 1個以上のとき  
  }else if(check_count == 1){
    $('.p-profile--professional').each(function(){
      // チェックされていないチェックボックスはロックする
      if(!$(this).children("input[type='checkbox']").prop('checked')) {
        $(this).children("input[type='checkbox']").prop('disabled', true);
        $(this).addClass('locked');
      }else if(!$(this).children("input[type='checkbox']:checked")) {
        $(this).ready(function() {
          $(this).children("input[type='checkbox']").prop('disabled', true);
          $(this).addClass('locked');
        });
      }
    });
  }else{
    $('.p-profile--professional').each(function(){
      // チェックされていないチェックボックスを選択可能にする
      if(!$(this).children("input[type='checkbox']").prop('checked')) {
        $(this).children("input[type='checkbox']").prop('disabled', false);
        $(this).removeClass('locked');
      }
    });
  }
  });
  // ページが読み込まれたときにもチェックボックス非活性を発火
  $(function() {
      $('.p-profile--professional').each(function(){
      // チェックされていないチェックボックスはロックする
      if(!$(this).children("input[type='checkbox']").prop('checked')) {
        $(this).children("input[type='checkbox']").prop('disabled', true);
        $(this).addClass('locked');
      }
    });
    }
  )
});


  // return false;
// }
