<?php

return [

    /**
     * Set your Paypal credential
     */
    'client_id' => 'AanBLGI8sjnoyQKtNpeEG4brPJUAQ-ZaHaFYzT1puCegYQYsfGUb_uY6QrPowwu51fZinx2Z_2OqQN51',
    'secret' => 'EN4T152DDj9_e366ozYtZ3KO7Bi8XrOZAZQa9C6RwSRpGg1LL3UglGeM9FTNvzQ3NiRn1RBIRsf18amy',

    /**
     * SDK configuration
     */
    'settings' => [

        /**
         * Available option 'sandbox' or 'live'
         */
        'mode' => 'sandbox',

        /**
         * Specify the max request time in seconds
         */
        'http.ConnectionTimeOut' => 30,

        /**
         * Whether want to log to a file
         */
        'log.LogEnabled' => true,

        /**
         * Specify the file that want to write on
         */
        'log.FileName' => storage_path() . '/logs/paypal.log',

        /**
         * Available option 'FINE', 'INFO', 'WARN' or 'ERROR'
         *
         * Logging is most verbose in the 'FINE' level and decreases as you
         * proceed towards ERROR
         */
        'log.LogLevel' => 'FINE'
    ]
];