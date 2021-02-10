window._ = require('lodash');

/**
 * We'll load jQuery and the Bootstrap jQuery plugin which provides support
 * for JavaScript based Bootstrap features such as modals and tabs. This
 * code may be modified to fit the specific needs of your application.
 */

try {
    window.Popper = require('popper.js').default;
    window.$ = window.jQuery = require('jquery');

    require('bootstrap');
} catch (e) {}

/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */

window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */

// import Echo from 'laravel-echo';

// window.Pusher = require('pusher-js');

// window.Echo = new Echo({
//     broadcaster: 'pusher',
//     key: process.env.MIX_PUSHER_APP_KEY,
//     cluster: process.env.MIX_PUSHER_APP_CLUSTER,
//     encrypted: true
// });
//index.bladeの解説表示モーダル用
$('#myModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget);
    var title_data = button.data('title');
    var content_data = button.data('content');

    var modal = $(this);
    modal.find('.modal-title').text(title_data);
    modal.find('.modal-body').text(content_data);
  })


  $('#exampleModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) //モーダルを呼び出すときに使われたボタンを取得
    var recipient = button.data('whatever') //data-whatever の値を取得
  console.log(recipient);
    //Ajaxの処理はここに

    var modal = $(this)  //モーダルを取得
    modal.find('.modal-title').text('New message to ' + recipient) //モーダルのタイトルに値を表示
    modal.find('.modal-body input#recipient-name').val(recipient) //inputタグにも表示
  })
