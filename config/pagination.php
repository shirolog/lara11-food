<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default Pagination View
    |--------------------------------------------------------------------------
    |
    | This value determines the default pagination view that will be used by
    | the paginator. You are free to set this value to any view that is
    | supported by your application. A sensible default is provided.
    |
    */

    'default' => 'tailwind',

    /*
    |--------------------------------------------------------------------------
    | Pagination View Paths
    |--------------------------------------------------------------------------
    |
    | Here you may define the paths to the pagination views that will be used
    | when generating pagination links. The default view paths use the
    | Tailwind CSS framework, but you may customize these if needed.
    |
    */

    'views' => [
        'default' => 'pagination::tailwind',
        'bootstrap' => 'pagination::bootstrap-4',
    ],

];
