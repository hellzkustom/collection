<!-- モーダル・ダイアログ -->
    <div class="modal fade" id="commentModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">
                        <span>×</span>
                    </button>
                    <h4 class="modal-title">コメント投稿</h4>
                </div>

                <div class="modal-body">
                    {{--API 通信結果表示部分--}}
                    <div id="api_result" class="hidden"></div>

                    <form class="form-horizontal">
                        <div class="form-group">
                            <label class="col-sm-3 ">コメント投稿者</label>
                             <div class="col-sm-10">
                                 <input class="form_control" name="name" value="" placeholder="名前を入力して下さい。"><br><br>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3">コメント本文</label>
                             <div class="col-sm-10">
                                   <textarea class="form_control" cols="50" rows="15" name="body" placeholder="本文を入力してください。"></textarea>
                             </div>
                        </div>
                    
                    </form>
                </div>

                <div class="modal-footer">
            

                    <button type="button" id="comment_submit" class="btn btn-primary">投稿</button>
                   <input type="hidden" name="article_id" value="{{ isset($article)? $article->id:null }}">

                </div>

            </div>
        </div>
    </div>
   
    