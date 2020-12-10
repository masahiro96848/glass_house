import $ from 'jquery';

window.$ = window.jQuery = require('jquery');

// require('./bootstrap');
require('./main');
import './bootstrap'
import './main'

window.$ = require('jquery');

$('.p-menu--button').on('click', function() {
  if( $(this).hasClass('active')){
    $(this).removeClass('active');
    $('.p-menu--wrap').addClass('close').removeClass('open');
  }else {
    $(this).addClass('active');
    $('.p-menu--wrap').addClass('open').removeClass('close');
  }
});