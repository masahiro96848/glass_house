import $ from 'jquery';

window.$ = window.jQuery = require('jquery');

Vue.config.devtools = true;
// require('./bootstrap');
require('./main');
import './bootstrap'
import './main'

window.Vue  = require('vue');
window.$ = require('jquery');


import Vue from 'vue'
import CommentStar from './components/CommentStar'
import UserLike from './components/UserLike'
import JobTagsInput from './components/JobTagsInput'
import ProfileImg from './components/ProfileImg'

const app  = new Vue({
  el: '#app',
  components: {
    CommentStar,
    UserLike,
    JobTagsInput,
    ProfileImg,
  }
});

// 検索モーダル
// $(function() {
//   $('.c-search--category--icon').on('click', function(){
//     if($(this).hasClass('active')) {
//       $(this).removeClass('active');
//       $('.c-search--modal').addClass('close').removeClass('open');
//     }else{
//       $(this).addClass('active');
//       $('.c-search--modal').addClass('open').removeClass('close');
//     }
//   });
// })

// フラッシュメッセージ
$(function() {
  $('.u-flash_message').hide().fadeIn('slow').delay('6000').slideUp('slow');
});

// モーダル
$(function() {
  $('.c-modal--open').on('click', function() {
    $('.c-modal--js').fadeIn();
    return false;
  });
  $('.c-modal--close').on('click', function() {
    $('.c-modal--js').fadeOut();
    
  });
})

// 検索モーダル
$(function() {
  $('.c-search--modal--open').on('click', function() {
    $('.c-search--modal').fadeIn();
    return false;
  });
  $('.c-search--modal--display').on('click', function() {
    $('.c-search--modal').fadeOut();
  })
})


// $(function() {
//   $('.c-search--modal--open').on('click', function() {
//     if($('.c-search--modal').hasClass('active')) {
//       $('.c-search--modal--display').fadeOut('fast'); 
//       $('.c-search--modal').removeClass('active');
//     }else {
//       $('.c-search--modal--display').fadeIn('fast');
//       $('.c-search--modal').addClass('active');
//     }
//     return false;
//   });
// });

