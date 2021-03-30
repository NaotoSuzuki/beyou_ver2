$(function() {


    // 小問番号
    var btn_clone = $('.btn-clone-smallNum');  // 追加ボタン
    var btn_remove = $('.btn-remove-smallNum');  // 削除ボタン

    // clone
    btn_clone.click(function() {

        var smalls = $('.smalls').last();  // 最後尾にあるinput

        smalls
          .clone()  // クローン
          .val('')  // valueもクローンされるので削除する
          .insertAfter(smalls);  // inputを最後尾に追加

        if ($('.smalls').length >= 2) {
            $(btn_remove).show();  // inputが2つ以上あるときに削除ボタンを表示
        }

    });

    // remove
    btn_remove.click(function() {

        $('.smalls').last().remove();

        if ($('.smalls').length < 2) {
            btn_remove.hide();  // inputが2つ未満のときに削除ボタンを非表示
        }

    });

    // // 小問内容
    // var btn_clone = $('.btn-clone-question');  // 追加ボタン
    // var btn_remove = $('.btn-remove-question');  // 削除ボタン
    //
    // // clone
    // btn_clone.click(function() {
    //
    //     var text = $('.question').last();  // 最後尾にあるinput
    //
    //     text
    //       .clone()  // クローン
    //       .val('')  // valueもクローンされるので削除する
    //       .insertAfter(small_question_num);  // inputを最後尾に追加
    //
    //     if ($('.question').length >= 2) {
    //         $(btn_remove).show();  // inputが2つ以上あるときに削除ボタンを表示
    //     }
    //
    // });
    //
    // // remove
    // btn_remove.click(function() {
    //
    //     $('.question').last().remove();
    //
    //     if ($('.question').length < 2) {
    //         btn_remove.hide();  // inputが2つ未満のときに削除ボタンを非表示
    //     }
    //
    // });
    //
    // // 答え
    // var btn_clone = $('.btn-clone-answer');  // 追加ボタン
    // var btn_remove = $('.btn-remove-answer');  // 削除ボタン
    //
    // // clone
    // btn_clone.click(function() {
    //
    //     var text = $('.answer').last();  // 最後尾にあるinput
    //
    //     text
    //       .clone()  // クローン
    //       .val('')  // valueもクローンされるので削除する
    //       .insertAfter(small_question_num);  // inputを最後尾に追加
    //
    //     if ($('.answer').length >= 2) {
    //         $(btn_remove).show();  // inputが2つ以上あるときに削除ボタンを表示
    //     }
    //
    // });
    //
    // // remove
    // btn_remove.click(function() {
    //
    //     $('.answer').last().remove();
    //
    //     if ($('.answer').length < 2) {
    //         btn_remove.hide();  // inputが2つ未満のときに削除ボタンを非表示
    //     }
    //
    // });
    //
    // // // remove
    // // btn_remove.click(function() {
    // //
    // //     $('.text').last().remove();
    // //
    // //     if ($('.text').length < 2) {
    // //         btn_remove.hide();  // inputが2つ未満のときに削除ボタンを非表示
    // //     }
    // //
    // // });
    // //
    // // // button
    // // var btn_clone = $('.btn-clone');  // 追加ボタン
    // // var btn_remove = $('.btn-remove');  // 削除ボタン
    // //
    // // // clone
    // // btn_clone.click(function() {
    // //
    // //     var text = $('.text').last();  // 最後尾にあるinput
    // //
    // //     text
    // //       .clone()  // クローン
    // //       .val('')  // valueもクローンされるので削除する
    // //       .insertAfter(text);  // inputを最後尾に追加
    // //
    // //     if ($('.text').length >= 2) {
    // //         $(btn_remove).show();  // inputが2つ以上あるときに削除ボタンを表示
    // //     }
    // //
    // // });
    // //
    // // // remove
    // // btn_remove.click(function() {
    // //
    // //     $('.text').last().remove();
    // //
    // //     if ($('.text').length < 2) {
    // //         btn_remove.hide();  // inputが2つ未満のときに削除ボタンを非表示
    // //     }
    // //
    // // });











});
