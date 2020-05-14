<?php

    // ZF\requestmailer\src\RequestMailerProvider.php
    namespace ZF\requestmailer;
    use Illuminate\Support\ServiceProvider;
    class RequestMailerServiceProvider extends ServiceProvider {
        public function boot()
        {
            $this->loadRoutesFrom(__DIR__.'/routes/web.php');
        }
        public function register()
        {
        }
    }
