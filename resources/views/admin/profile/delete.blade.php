@extends('layouts.app')
@section('title', '退会について')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 mt-3">
            <h1 class="post-h1 title">管理ユーザー 退会について</h1>
            <div class="delete-message">
                <p>この度はFightなびをご利用いただき誠にありがとうございます。<br>
                退会についてのご確認ですが、退会処理を完了されますと今までに作成したジムのデータや一般ユーザーが投稿してくれたレビュー、お気に入り登録などのデータが全て削除され、元の状態に戻ることができません。</p>
            </div>
            <div class="center-btn">
                <button type="button" class="btn btn-success delete-btn" onclick=history.back()>戻る</button>

                <button type="button" class="btn btn-danger delete-btn" data-toggle="modal" data-target="#exampleModalCenter">退会する</button>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title" id="exampleModalCenterTitle">退会確認画面</h2>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  退会処理を完了しますか？
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">閉じる</button>
                    <a href="{{ route('admin.destroy') }}" class="btn btn-danger">退会する</a>
                </div>
            </div>
        </div>
    </div>


</div>

@endsection
