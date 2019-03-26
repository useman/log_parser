<?php

return [

    /**
     * Analytics
     */
    "analytics" => [
        \App\Analytics\ViewAnalytic::class,
        \App\Analytics\URLAnalytic::class,
        \App\Analytics\TrafficAnalytic::class,
        \App\Analytics\CrawlerAnalytic::class,
        \App\Analytics\HTTPCodeAnalytic::class,
    ],


    /**
     * Format
     */
    "format" => \App\Formats\JSONFormat::class

];