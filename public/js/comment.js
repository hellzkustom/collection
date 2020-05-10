$(function () {
    // メタタグに設定したトークンを使って、全リクエストヘッダにCSRFトークンを追加
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // 登録もしくは編集ボタン押下時
  //  $('[data-toggle=modal]').on('click', function() {
    //    var target_comment_id = $(this).attr('data-id');

        // 既存カテゴリーならフォームに値をセット
      //  if (target_comment_id) {
        //    var target_object = $('tr[data-id=' + target_comment_id + ']');
          //  var target_value = {
    //            category_id   : target_category_id,
      //          name          : target_object.find('span.name').text(),
        //        display_order : target_object.find('span.display_order').text()
          //  };
    //        $('input[name=category_id]').val(target_value.category_id);
      //      $('input[name=name]').val(target_value.name);
        //    $('input[name=display_order]').val(target_value.display_order);
//        }
  //  });

    // モーダルが閉じられるとき、アラートを消し、フォームを空にしておく
    $('#commentModal').on('hidden.bs.modal', function() {
        $('#api_result').html('').removeClass().addClass('hidden');
        $('input[name=article_id]').val(null);
        $('input[name=name]').val(null);
        $('input[name=body]').val(null);
        location.reload();
    });

    // 保存ボタン押下時
    $('#comment_submit').on('click', function() {

        var article_id = $('input[name=article_id]').val();
        article_id = (article_id) ? article_id : null;
    
        var data = {
            id          : article_id,
            name        : $('input[name=name]').val(),
            body        : $('textarea[name=body]').val(),
            
        };
    
        // APIを呼び出してDBに保存
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
        
            type : 'POST',
            url : '../../comment/post',
            data : data,
            dataType: 'json',
        
  })
        .done(function(data, textStatus, jqXHR) {
            // 正常時 結果表示
            $('#api_result').html('<span>正常に処理が完了しました</span>')
                .removeClass()
                .addClass('alert alert-success show');
            // 少しせこいが、リロードして変更が反映された画面を表示する
         //   location.reload();  


        })
　　.fail(function(xhr, textStatus, errorThrown) {

            var error_message = '';
            
            $.each(xhr.responseJSON.errors, function(element, message_array) {
                $.each(message_array, function(index, message) {
                    
                  error_message += message + '<br>';
               });
            });
            

             //エラーメッセージ表示
            $('#api_result').html('<span>' + error_message + '</span>')
               .removeClass()
                .addClass('alert alert-danger show');
        });

    });

    // 削除ボタン押下時
    $('#category_delete').on('click', function() {
        var data = {
            id : $('input[name=category_id]').val(),
        };

        // APIを呼び出して削除
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type : 'POST',
            url : 'category/delete',
            data : data,

        }).done(function(data, textStatus, jqXHR) {
            // 正常時 結果表示
            $('#api_result').html('<span>削除しました</span>')
                .removeClass()
                .addClass('alert alert-success show');
            // リロード
          //  location.reload();    

        }).fail(function(xhr, textStatus, errorThrown) {
            // エラー時 エラーメッセージ表示
            $('#api_result').html('<span>削除に失敗しました</span>')
                .removeClass()
                .addClass('alert alert-danger show');
        });
    });
    
});