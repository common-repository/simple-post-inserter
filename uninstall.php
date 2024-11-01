<?php

// if uninstall.php is not called by WordPress, die
if (!defined('WP_UNINSTALL_PLUGIN')) {
    die;
}

//Flushing options from DB
delete_option('spi-paragraph-choice');          //Deleting paragraph choice
delete_option('spi-insert-content');            //Deleting insert content
delete_option('spi-post-type');                 //Deleting post type
delete_option('spi-post-category');             //Deleting post category
delete_option('spi-post-id');                   //Deleting post id
delete_option('spi-middle-choice');             //Deleting middle choice
