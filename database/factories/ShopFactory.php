<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Admin\Shop;
use Faker\Generator as Faker;
use Illuminate\Support\Str;
use Carbon\Carbon;

$factory->define(Shop::class, function (Faker $faker) {

    $adminIDs  = App\Admin\Admin::pluck('id')->all();

    $name = [
        'キックボクシングジム',
        'ボクシングジム',
        'MMA',
        'キックボクシング道場',
        'フィットネスボクシング',

    ];
    
    $closes = [
        '毎月第３水曜日',
        '毎週月曜日',
        '毎月５日',
        '毎週日曜日',
        '毎月第２火曜日',
        '祝日',
    ];

    $trials = [
        '無料',
        '有料',
        'なし',
        '不明',
    ];
    
    $trial_price = [
        '1000',
        '2000',
        '500',
    ];

    $search_address_ken = [
        '北海道', '青森県', '秋田県', '山形県', '岩手県', '宮城県', '福島県',
        '茨城県', '栃木県', '群馬県', '埼玉県', '千葉県', '東京都', '神奈川県',
        '新潟県', '富山県', '石川県', '福井県', '山梨県', '長野県', '岐阜県', '静岡県', '愛知県',
        '三重県', '滋賀県', '京都府', '大阪府', '兵庫県', '奈良県', '和歌山県',
        '鳥取県', '島根県', '岡山県', '広島県', '山口県',
        '徳島県', '香川県', '愛媛県', '高知県',
        '福岡県', '佐賀県', '長崎県', '熊本県', '大分県', '宮崎県', '鹿児島県', '沖縄県',
    ];

    $description = [
        'キックボクシング、MMA、グラップリング、柔術など幅広い分野でのレッスンを実施しておりトレーナーも豊富に在籍しているため、本格的に格闘技を始めてみたい方や、いろんな格闘技術を身に着けたい方にはオススメのジムです。',
        '『大人の部活』というキャッチフレーズそのままに、新しい仲間との出会いも活発なジムです。
        インストラクターも業界では有名な方や、現役選手などたくさんの方が在籍をしていますので、レッスンのクオリティーなどを求める方にオススメなジムです。',
        '「スポーツ感覚で通える」格闘技の総合ジムです。
        キックボクシング、空手、カポエイラ、ブラジリアン柔術など幅広く学ぶことができます。いろんな格闘技をしてみたいという好奇心旺盛な方にはおすすめのジムです。',
        '日本初のムエタイジムとして世界レベルの選手を多く輩出してきた歴史あるジムです。本国でもごく僅かしかいない一流のトレーナーをかかえています。2014年に札幌のジムがオープンしました。専門トレーニングをご希望のプロ志望の方はもちろん、初心者やお子様でも安心してフィットネスや体力作りができます。',
        '「フィットネス」「運動不足解消」「ストレス発散」「アマチュア試合出場」「プロファイター志望」「キッズ向けクラス」「女性向け」「初心者」「ダイエット」などさまざまな目的をお持ちの方々が汗を流しています。中でもフィットネス目的の会員の方が多く、子供からご年配の方まで安心して通えるジムです。また各クラス練習では、現役プロファイターが、親切、丁寧、楽しいトレーニングを行なっており、初心者からプロ選手まで幅広い層の方が参加しています。初心者から経験者まで安心して通えるジムです。',
        '女性の方でも安心して運動できるボクササイズプログラムや、栄養指導などのスポーツカウンセリングを取り入れ、無理のないダイエット・シェイプアップ・ボディメイクができます。',
        '月会費など料金が低設定のため、気軽に始めてみたい方や体験などもオススメです。',
    ];

    $tax = [
        '0',
        '1',
    ];

    return [
        'admin_id' => $faker->randomElement($adminIDs),
        'name' => $faker->randomElement($name),
        'tel' => $faker->isbn10,
        'address_number' => $faker->postcode,
        // 'address_ken' => $faker->prefecture,
        'address_ken' => $faker->randomElement($search_address_ken),
        'address_city' => $faker->city,
        'address_other' => $faker->streetAddress,
        // 'open' => $faker->randomElement($opens),
        'close' => $faker->randomElement($closes),
        'web' => $faker->url,
        'trial' => $faker->randomElement($trials),
        'trial_price' => $faker->randomElement($trial_price),
        'description' => $faker->randomElement($description),
        'tax' => $faker->randomElement($tax),
        'created_at' => $faker->datetime($max = 'now', $timezone = date_default_timezone_get()),
    ];
});
