<?php

    // VladNicu\requestmailer\src\RequestMailerProvider.php
    namespace VladNicu\requestmailer;
    use Illuminate\Support\ServiceProvider;
    class RequestMailerServiceProvider extends ServiceProvider {
        public function boot()
        {
            $this->loadRoutesFrom(__DIR__.'/routes/web.php');
            $this->loadViewsFrom(__DIR__.'/resources/views', 'requestmailer');
        }
        public function register()
        {
        }
    }
