<?php

defined('ABSPATH') or die();

/*   
*   Check slugs, can be empty
*/

$val_p_choice = get_option('spi-paragraph-choice');
$val_post_type = get_option("spi-post-type");
$val_post_id = get_option('spi-post-id');
$val_post_category = get_option('spi-post-category');
$val_insert_content = get_option('spi-insert-content');
$val_middle_choice = get_option('spi-middle-choice');

//Ensure paragraph choice is greater than 1
if($val_p_choice!='' && $val_p_choice <0){
    echo '<div class="error">Invalid argument, paragraph number needs to be greater than or equal to 0</div>';
}

//Check to see if a post type exists
if($val_post_type != '' && !post_type_exists( $val_post_type )){
    echo '<div class="error">Invalid argument, post type does not exist</div>';
}

//Check to see if post id exists

if($val_post_id != '' && !get_post_status($val_post_id)){
    echo '<div class="error">Invalid argument, post id does not exist</div>';
} 


//Check to see if a category exists
if($val_post_category != '' && !category_exists($val_post_category)){
    echo '<div class="error">Invalid argument, post category does not exist</div>';
} 

//Check to make sure either paragraph choice or middle choice is selected
if($val_p_choice == '' && $val_middle_choice == '' && $val_insert_content==''){
    echo '<div class="setup">To setup up this plugin enter in some content and choose where you want it in your posts!<br><br>
                            <span>
                            You may also enter in some post filters to selectively choose which posts your content <br>
                            appears in. To put the content at the top use 0 for the paragraph number, for the bottom <br>
                            use a large number - such as 999 - that exceeds the paragraph count of your longest <br>
                            post.</span></div>';
} else if($val_p_choice == '' && $val_middle_choice== ''){
    echo '<div class="error">Please choose where to insert your content</div>';
} else if($val_insert_content == ''){
    echo '<div class="error">Please enter in some content</div>';
}
