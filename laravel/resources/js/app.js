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

const app  = new Vue({
  el: '#app',
  components: {
    CommentStar,
    UserLike,
    JobTagsInput,
  }
});

$('.p-menu--button').on('click', function() {
  if( $(this).hasClass('active')){
    $(this).removeClass('active');
    $('.p-menu--wrap').addClass('close').removeClass('open');
  }else {
    $(this).addClass('active');
    $('.p-menu--wrap').addClass('open').removeClass('close');
  }
});

// フラッシュメッセージ
$(function() {
  $('.u-flash_message').hide().fadeIn('slow').delay('5000').slideUp('slow');
});