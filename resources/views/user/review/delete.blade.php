@extends('layouts.app')
@section('title', 'レビューの削除')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-12">
                <h5 class="text-center">レビューの削除</h5>
                <div class="card">
                    <div class="card-body">

                        <div class="form-group row">
                            <div class="col-md-12 ml-5 my-3">
                                <div>
                                    <img src="{{ asset('image/macOS-Guest-user-logo-icon.jpg') }}" alt="name" width="60">
                                    <p>TakahiroTsukida</p>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="ml-3">
                                <h6>レビュー</h6>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="ml-3">
                                <p> GYM_name / adress / city </p>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="ml-3">
                                <p>ジャンル： type </p>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="resson" class="col-sm-3 col-form-label">レッスン</label>
                            <select name="resson" class="col-sm-9 form-control">
                                <option value="">１〜５で評価を選んでください</option>
                                <option value="1">１　レッスン内容に不満がある</option>
                                <option value="2">２　あまり内容が充実していない</option>
                                <option value="3">３　どちらとも言えない</option>
                                <option value="4">４　レッスンに魅力を感じる</option>
                                <option value="5">５　非常に魅力を感じて大変満足している</option>
                            </select>
                        </div>

                        <div class="form-group row">
                            <label for="price" class="col-sm-3 col-form-label">値段</label>
                            <select name="price" class="col-sm-9 form-control">
                                <option value="">１〜５で評価を選んでください</option>
                                <option value="1">１　内容の割に値段が高い</option>
                                <option value="2">２　値段がやや高い気がする</option>
                                <option value="3">３　内容に見合う値段だと感じる</option>
                                <option value="4">４　内容に見合う値段の安さを感じる</option>
                                <option value="5">５　内容の割に非常に安いと感じる</option>
                            </select>
                        </div>



                        <div class="form-group row">
                            <label for="clean" class="col-sm-3 col-form-label">清潔さ</label>
                            <select name="clean" class="col-sm-9 form-control">
                                <option value="">１〜５で評価を選んでください</option>
                                <option value="1">１　清潔感を感じられない</option>
                                <option value="2">２　掃除がやや行き届いていない</option>
                                <option value="3">３　どちらとも言えない</option>
                                <option value="4">４　ややキレイな方だと感じる</option>
                                <option value="5">５　非常にキレイで安心して利用できる</option>
                            </select>
                        </div>

                        <div class="form-group row">
                            <label for="service" class="col-sm-3 col-form-label">接客</label>
                            <select name="service" class="col-sm-9 form-control">
                                <option value="">１〜５で評価を選んでください</option>
                                <option value="1">１　不親切</option>
                                <option value="2">２　あまり良いとは思えない</option>
                                <option value="3">３　どちらとも言えない</option>
                                <option value="4">４　親切に接客している</option>
                                <option value="5">５　とても丁寧な対応だと感じる</option>
                            </select>
                        </div>

                        <div class="form-group row">
                            <label for="atmosphere" class="col-sm-3 col-form-label">雰囲気</label>
                            <select name="price" class="col-sm-9 form-control">
                                <option value="">１〜５で評価を選んでください</option>
                                <option value="1">１　会話が全くない</option>
                                <option value="2">２　多少会話はするが黙々とトレーニングする雰囲気</option>
                                <option value="3">３　仲間と一緒にトレーニングに打ち込む雰囲気</option>
                                <option value="4">４　和気あいあいとした雰囲気</option>
                                <option value="5">５　非常に楽しい雰囲気で大変満足している</option>
                            </select>
                        </div>

                        <div class="form-group row">
                            <label for="impression" class="col-sm-3 col-form-label">感想</label>
                            <div class="col-sm-12">
                                <textarea rows="10" cols="200" name="impression" class="form-control" placeholder="ご自由にお書きください"></textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-4">
                                <p>更新日時</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <p class="text-center">本当にこの内容を削除しても良いですか？</p>
                    </div>
                </div>

                <div class="form-group row justify-content-center">
                    <div>
                        <input type="submit" class="btn btn-success mx-3 mt-5 mb-3 px-5 rounded-pill" value="戻る">
                        <input type="submit" class="btn btn-danger mx-3 mt-5 mb-3 px-5 rounded-pill" value="削除">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
