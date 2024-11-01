<?php


defined('ABSPATH') or die();

/* 
    Adding the options page to settings menu
*/
add_action('admin_menu', 'spi_plugin_menu');
function spi_plugin_menu()
{
    add_options_page('Simple Post Inserter', 'Simple Post Inserter', 'manage_options', 'spi_options', 'spi_inserter_options');
}


/* 
    Setting registration
*/
function spi_register_my_setting()
{
    register_setting('spi_options_group', 'spi-paragraph-choice');
    register_setting('spi_options_group', 'spi-middle-choice');
    register_setting('spi_options_group', 'spi-insert-content');
    register_setting('spi_options_group', 'spi-post-type');
    register_setting('spi_options_group', 'spi-post-category');
    register_setting('spi_options_group', 'spi-post-id');
}
add_action('admin_init', 'spi_register_my_setting');

/*
    Inserter options
    This is where the html form is
*/
function spi_inserter_options()
{
    //User validation
    if (!current_user_can('manage_options')) {
        wp_die(__('You do not have sufficient permissions to access this page.'));
    } else {
    ?>
    <div class="wrap">
        <h1>Simple Post Inserter</h1>
        <style>
            .control {
                display: flex;
                flex-direction: column;
                align-items: flex-start;
            }

            span {
                margin: 5px 0 5px 0;
            }

            .error {
                color:red;
                margin: 5px 0 5px 0;
            }

            .setup {
                color:green;
                margin: 10px 0 10px 0;
                font-size:18px;
                background-color:lightgray;
                padding:5px;
                
            }

            .setup span {
                font-size: 16px;
                
            }

        </style>
        <form class="control" name="spi-inserter-control" action="options.php" method="post">
            <?php
                settings_fields("spi_options_group");
                do_settings_sections('spi_options');
                include 'validator.php';
                ?>
            <!-- PARAGRAPH OPTION -->
            <span>Choose which paragraph to insert your content after</span>
            <input name="spi-paragraph-choice" id="spi-paragraph-choice" type="number" placeholder="Paragraph Number" value="<?php echo esc_attr(get_option('spi-paragraph-choice')); ?>">
            <br>
            
            <!-- MIDDLE OPTION -->
            <span>Insert content into middle of posts (overrides paragraph option if selected)</span>
            <input name="spi-middle-choice" id="spi-middle-choice" type="checkbox" value="1" <?php checked('1', get_option('spi-middle-choice')); ?>>
            <br>

            <!-- CONTENT OPTION -->
            <span>Enter your HTML content</span>
            <textarea name="spi-insert-content" id="inset-content" rows="10" cols="50"><?php echo esc_attr(get_option('spi-insert-content')); ?></textarea>
            <br>

            <!-- POST TYPE OPTION -->
            <span>Enter a custom post type to insert content into - leave blank if not applicable</span>
            <input name="spi-post-type" id="spi-post-type" type="text" placeholder="Post Type Slug" value="<?php echo esc_attr(get_option('spi-post-type')); ?>">
            <br>

            <!-- POST CATEGORY OPTION -->
            <span>Enter a custom post category to insert content into - leave blank if not applicable</span>
            <input name="spi-post-category" id="spi-post-category" type="text" placeholder="Post Category Slug" value="<?php echo esc_attr(get_option('spi-post-category')); ?>">
            <br>

            <!-- POST ID OPTION -->
            <span>Enter a post id to insert content into - leave blank if not applicable<br></span>
            <input name="spi-post-id" id="spi-post-id" type="number" placeholder="Post ID Slug" value="<?php echo esc_attr(get_option('spi-post-id')); ?>">
            <br>
            <?php wp_nonce_field( 'spi_nonce','spi_settings_update' ); ?>
            <?php submit_button(); ?>
        </form>
    </div>
    <?php 
    }
    ?>
<?php
}
?>