<?php

/**
 * Plugin Name:       Simple Post Inserter
 * Description:       Insert content directly into your posts at your desired location.
 * Tags:              posts, insert, ads, embed, content, post filter, insert content, post insert
 * Version:           1.0
 * Stable tag:        5.2.3
 * Requires at least: 5.2
 * Requires PHP:      5.6
 * Contributors:      tljorgensen
 * Plugin URI:        https://codexi.io/simple-post-inserter
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 */

defined('ABSPATH') or die();

if (!class_exists('SPI_Main')) {
    class SPI_Main
    {
        //init the admin panel
        public static function spi_init_admin()
        {
            require 'includes/admin-panel.php';
        }

        //insert content into posts
        public static function spi_insert()
        {
            require 'includes/inserter.php';
        }
    }


    //Running the class functions
    SPI_Main::spi_init_admin();
    SPI_Main::spi_insert();
}
