$(function () {
    
    
       const myMdal='#categoryModal';
    

    
    
    // 登録もしくは編集ボタン押下時
    $('[data-toggle=modal]').on('click', function() {
        var target_category_id = $(this).attr('data-id');

        // 既存カテゴリーならフォームに値をセット
        if (target_category_id) {
            var target_object = $('tr[data-id=' + target_category_id + ']');
            var target_value = {
                category_id   : target_category_id,
                name          : target_object.find('span.name').text(),
                display_order : target_object.find('span.display_order').text()
            };
            $('input[name=category_id]').val(target_value.category_id);
            $('input[name=name]').val(target_value.name);
            $('input[name=display_order]').val(target_value.display_order);
        }
    });

    // モーダルが閉じられるとき、アラートを消し、フォームを空にしておく
    $(myMdal).on('hidden.bs.modal', function() {
        $('#api_result').html('').removeClass().addClass('hidden');
        $('input[name=category_id]').val(null);
        $('input[name=name]').val(null);
        $('input[name=display_order]').val(null);
        location.reload();

    });


});