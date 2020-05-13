$(function () {
    // メタタグに設定したトークンを使って、全リクエストヘッダにCSRFトークンを追加
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

 

    // モーダルが閉じられるとき、アラートを消し、フォームを空にしておく
    $('#commentModal').on('hidden.bs.modal', function() {
        $('#api_result').html('').removeClass().addClass('hidden');
        $('input[name=article_id]').val(null);
        $('input[name=name]').val(null);
        $('input[name=body]').val(null);
        location.reload();
    });

});