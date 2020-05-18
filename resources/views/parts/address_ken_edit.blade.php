<option value="">都道府県を選択してください</option>
@php
    $address_ken = [

        'tohoku' => [
            '北海道', '青森県', '秋田県', '山形県', '岩手県', '宮城県', '福島県',
        ],

        'kanto' => [
            '茨城県', '栃木県', '群馬県', '埼玉県', '千葉県', '東京都', '神奈川県',
        ],

        'chubu' => [
            '新潟県', '富山県', '石川県', '福井県', '山梨県', '長野県', '岐阜県', '静岡県', '愛知県',
        ],

        'kinki' => [
            '三重県', '滋賀県', '京都府', '大阪府', '兵庫県', '奈良県', '和歌山県',
        ],

        'chugoku' => [
            '鳥取県', '島根県', '岡山県', '広島県', '山口県',
        ],

        'shikoku' => [
            '徳島県', '香川県', '愛媛県', '高知県',
        ],

        'kyushu' => [
            '福岡県', '佐賀県', '長崎県', '熊本県', '大分県', '宮崎県', '鹿児島県', '沖縄県',
        ],

    ];
@endphp

@foreach ($address_ken as $chihou)
    @foreach ($chihou as $ken)
        <option value="{{ $ken }}" {{ $shop->address_ken == $ken ? 'selected="selected"' : '' }}>{{ $ken }}</option>
    @endforeach
@endforeach
