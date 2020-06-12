## Fightなび

実在する全国の格闘技ジムを検索、レビューできるwebアプリケーションです。
当サイトは実際に稼働しているものとは別に転職用のポートフォリオとして、簡単ログイン機能などを実装したものになります。

## 開発の経緯

私は前職では格闘技の業界で仕事をしており、プロキックボクサーとして活動もしていましたが怪我をして引退を気に退職いたしました。
興味があり、他県のジムなどを検索することもありましたが、その際に非常に数が多く、目当ての情報に行き着くまでにすごく時間がかかり、もう少し簡単に情報がまとまったものがあれば良いなと思っていました。
ですので、それらのジムの情報をまとめて検索＋レビューができるものを作りました。

## 機能
  - ログインせずに使える機能
    - ジムの検索
      - キーワード、ジャンル、都道府県、市区群名検索
      - 評価点順、お気に入り数順、レビュー総数順の並び替え検索
    - レビューの閲覧（総お気に入り数も表示）

  - 一般ユーザー（ログイン）
    - プロフィール作成、編集（非公開も可）
    - ジムのお気に入り登録
    - ジムのレビュー作成、編集、削除（匿名投稿も可）
    - レビューしたユーザーのプロフィール閲覧
    - 退会

  - 管理ユーザー
    - プロフィール作成、編集
    - ジムの登録、編集、削除
    - 退会


## URL

- [https://fightnavi-portfolio.net/](https://fightnavi-portfolio.net/)
トップページの簡単ログイン機能でお試しログインできます。
    - 一般ユーザー
    - 管理ユーザー

- 実際に稼働中のサイトはこちらです [https://fightgymnavi.com](https://fightgymnavi.com)


## 使用技術
- フロント
  - SCSS
  - Bootstrap 4
- バックエンド
  - PHP 7.2
  - Laravel 7.4
- サーバー
  - nginx 1.17
- DB
  - MySQL 8.0 (ローカル)
  - RDS (AWS)
- インフラ
  - Docker
    - docker-compose （ローカル環境でdockerを用いて開発するため）
  - AWS
    - VPC
    - IAM
    - ALB
    - Route53
    - EC2
    - RDS (MySQL)
  - CircleCI

## インフラ構成図
<p align="center"><img src="https://user-images.githubusercontent.com/59963646/84474857-8601fa00-acc6-11ea-9c55-5f6210529d0f.jpg" width="95%"></p>
