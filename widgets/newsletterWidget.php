<?php

class NewsletterWidget extends WP_Widget {
    public function __construct()
    {
        parent::__construct('newsletter_widget', 'Newsletter Widget');
    }

    public function widget($args, $instance) {
        echo 'Bonjour';
    }

    public function  form($instance) {

    }

    public function update($newInstance, $oldInstance) {
        return [];
    }
}