<?php
// @include('vendor/autoload.php')

@servers(['daniel' => 'danielalamo.com', 'web-2' => '192.168.1.2'])

@setup
    $now = new DateTime(); 
    $environment = isset($env) ? $env : "testing";
    $branch = 'master';
@endsetup

@task('deploy', ['on' => ['daniel',], 'parallel' => true])
    cd /var/www/html
    pwd
    git pull #origin {{ $branch }}
    #php artisan migrate
@endtask

@finished
    #@slack('webhook-url', '#bots')
@endfinished
