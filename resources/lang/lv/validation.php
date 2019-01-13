<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
 */

    'accepted' => 'Jums ir jāpiekrīt :attribute.',
    'active_url' => 'Lauks :attribute nav pareiza saite.',
    'after' => 'Laukam :attribute ir jābūt datumam pēc :date.',
    'after_or_equal' => 'Laukam :attribute vajag būt datumam pēc vai vienādam ar :date.',
    'alpha' => 'Lauks :attribute var tikai sastāvēt no burtiem.',
    'alpha_dash' => 'Lauks :attribute var tikai sastāvēt no burtiem, cipariem, svītrām un apakšsvītrām.',
    'alpha_num' => 'Lauks :attribute var tikai sastāvēt no burtiem un cipariem.',
    'array' => 'Laukam :attribute ir jābūt masīvām.',
    'before' => 'Laukam :attribute ir jabūt datumam pirms :date.',
    'before_or_equal' => 'Laukam :attribute ir jābūt datumam pirms vai vienādam ar :date.',
    'between' => [
        'numeric' => 'Laukam :attribute ir jābūt starp :min un :max.',
        'file' => 'Laukam :attribute ir jābūt starp :min un :max kilobaitiem lielam.',
        'string' => 'Laukam :attribute ir jābūt starp :min un :max burtiem garam.',
        'array' => 'Laukam :attribute ir jābūt starp :min un :max priekšmetiem.',
    ],
    'boolean' => 'Laukam :attribute ir jābūt patiesam vai nepatiesam.',
    'confirmed' => 'Laukam :attribute apstiprinājums nesakrīt.',
    'date' => 'Lauks :attribute nav pareizs datums.',
    'date_format' => 'Lauks :attribute nesakrīt ar formātu :format.',
    'different' => 'Laukam :attribute ir jābūt atšķirīgam no lauka :other.',
    'digits' => 'Laukam :attribute ir jābūt :digits cipariem.',
    'digits_between' => 'Laukam :attribute ir jābūt starp :min un :max cipariem.',
    'dimensions' => 'Laukam :attribute ir nederīgi attēla izmēri.',
    'distinct' => 'Laukam :attribute ir dublikāta vērtība.',
    'email' => 'Laukam :attribute ir jābūt derīgai e-pasta adresei.',
    'exists' => 'Izvēlētais lauks :attribute ir nederīgs.',
    'file' => 'Laukam :attribute ir jābūt failam.',
    'filled' => 'Laukam :attribute ir jābūt aizpildītam.',
    'gt' => [
        'numeric' => 'Laukam :attribute ir jābūt lielākam par :value.',
        'file' => 'Laukam :attribute ir jābūt lielākam par :value kilobaitiem.',
        'string' => 'Laukam :attribute ir jābūt garākam par :value rakstzīmēm.',
        'array' => 'Laukam :attribute ir jābūt vairāk par :value priekšmetiem.',
    ],
    'gte' => [
        'numeric' => 'Laukam :attribute ir jabūt lielākam vai vienādam ar :value.',
        'file' => 'Laukam :attribute ir jabūt lielākam vai vienādam par :value kilobaitiem.',
        'string' => 'Laukam :attribute ir jābūt lielākam vai vienādam par :value rakstzīmēm.',
        'array' => 'Laukam :attribute ir jābūt :value priekšmetiem vai vairāk.',
    ],
    'image' => 'Laukam :attribute ir jābūt attēlam.',
    'in' => 'Izvēlētais lauks :attribute ir nederīgs.',
    'in_array' => 'Lauks :attribute neeksistē iekšā :other.',
    'integer' => 'Laukam :attribute ir jābūt veselam skaitlim.',
    'ip' => 'Laukam :attribute ir jābūt pareizai IP adresei.',
    'ipv4' => 'Laukam :attribute ir jābūt pareizai IPv4 adresei.',
    'ipv6' => 'Laukam :attribute ir jābūt pareizai IPv6 adresei.',
    'json' => 'Laukam :attribute ir jābūt pareizai JSON virknei.',
    'lt' => [
        'numeric' => 'Laukam :attribute jābūt mazāk par :value.',
        'file' => 'Laukam :attribute jābūt mazāk par :value kilobaitiem.',
        'string' => 'Laukam :attribute ir jābūt mazāk par :value rakstzīmēm.',
        'array' => 'Laukam :attribute ir jābūt mazāk par :value priekšmetiem.',
    ],
    'lte' => [
        'numeric' => 'Laukam :attribute ir jābūt mazākam vai vienādam par :value.',
        'file' => 'Laukam :attribute ir jābūt mazāk vai vienādam par :value kilobaitiem.',
        'string' => 'Laukam :attribute ir jābūt mazāk vai vienādam par :value rakstzīmem.',
        'array' => 'Laukam :attribute nedrīkst būt vairāk par :value priekšmetiem.',
    ],
    'max' => [
        'numeric' => 'Laukam :attribute nedrīkst būt vairāk par :max.',
        'file' => 'Laukam :attribute nedrīkst būt vairāk par :max kilobaitiem.',
        'string' => 'Laukam :attribute nedrīkst būt vairāk par :max rakstzīmēm.',
        'array' => 'Laukam :attribute nedrīkst būt vairāk par :max priekšmetiem.',
    ],
    'mimes' => 'Laukam :attribute ir jābūt failam no tipa: :values.',
    'mimetypes' => 'Laukam :attribute ir jābūt failam no tipa: :values.',
    'min' => [
        'numeric' => 'Laukam :attribute ir jābūt vismaz :min.',
        'file' => 'Laukam :attribute ir jābūt vismaz :min kilobaitiem.',
        'string' => 'Laukam :attribute ir jābūt vismaz :min rakstzīmēm garam.',
        'array' => 'Laukam :attribute ir jābūt vismaz :min priekšmetiem.',
    ],
    'not_in' => 'Izvēlētais lauks :attribute ir nederīgs.',
    'not_regex' => 'Laukam :attribute formāts ir nederīgs.',
    'numeric' => 'Laukam :attribute ir jābūt skaitlim.',
    'present' => 'Laukam :attribute ir jābūt aizpildītam.',
    'regex' => 'Izvēlētais lauks :attribute ir nederīgs.',
    'required' => 'Lauks :attribute ir nepieciešams.',
    'required_if' => 'Lauks :attribute ir nepieciešams, ja :other ir :value.',
    'required_unless' => 'Lauks :attribute ir nepieciešams, ja vien :other pieder pie :values.',
    'required_with' => 'Lauks :attribute ir nepieciešams, ja :values ir aizpildīts.',
    'required_with_all' => 'Lauks :attribute ir nepieciešams, ja :values ir aizpildīts.',
    'required_without' => 'Lauks :attribute ir nepieciešams, ja :values nav aizpildīts.',
    'required_without_all' => 'Lauks :attribute ir nepieciešams, ja neviens no :values ir aizpildīts.',
    'same' => 'Laukam :attribute un :other ir jāsakrīt.',
    'size' => [
        'numeric' => 'Laukam :attribute ir jābūt :size.',
        'file' => 'Laukam :attribute ir jābūt :size kilobaitiem.',
        'string' => 'Laukam :attribute ir jābūt :size rakstzīmēm.',
        'array' => 'Laukam :attribute ir jāsatur :size priekšmetiem.',
    ],
    'string' => 'Laukam :attribute ir jābūt virknei.',
    'timezone' => 'Laukam :attribute ir jābūt pareizai laika zonai.',
    'unique' => 'Lauka :attribute vērtība ir jau aizņemta.',
    'uploaded' => 'Lauka :attribute failu neizdevās augšupielādēt.',
    'url' => 'Laukam :attribute formāts ir nederīgs.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
     */

    'custom' => [
        'recaptcha' => 'ReCAPTCHA verifikācija neizdevās. Lūdzu mēģiniet atkal.'
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
     */

    'attributes' => [
        'g-recaptcha-response' => 'reCAPTCHA',
        'title' => 'nosaukums',
        'body' => 'apraksts',
        'completed_at' => 'plānotais pabeigšanas datums',
        'teacher_id' => 'vadītājs',
        'work_status_id' => 'darba statuss',
        'section' => 'sekcija',
        'section_title' => 'sekcijas virsraksts',
        'image' => 'attēls',
        'attachment' => 'pielikums',
        'telephone' => 'telefons',
        'email' => 'e-pasts',
        'status' => 'statuss',
        'first_name' => 'vārds',
        'last_name' => 'uzvārds',
        'priority' => 'prioritāte',
        'event_at' => 'pasākuma datums'
    ],

];
