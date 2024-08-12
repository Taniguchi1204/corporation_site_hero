@component('mail::message')
# お問い合わせ内容

以下の内容でお問い合わせがありました。

- お名前: {{ $data['name'] }}
- 電話番号: {{ $data['tel'] }}
- メールアドレス: {{ $data['mail'] }}
- 会社名: {{ $data['company'] }}
- 住所: {{ $data['address'] }}
- お問い合わせ内容: {{ $data['message'] }}

@endcomponent