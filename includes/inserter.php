<?php

defined('ABSPATH') or die();


//primary filter
add_filter('the_content', 'spi_insert_post_content');
function spi_insert_post_content($content)
{
    if (!wp_verify_nonce($_REQUEST['spi_nonce'], 'spi_settings_update')) {
        $p_choice = get_option('spi-paragraph-choice');            //paragraph choice from options
        $c_choice = get_option('spi-insert-content');      //content choice from options
        $middle_check = get_option('spi-middle-choice');   //option for a middle insert

        //content insert is the resource to be put into posts
        $content_insert = $c_choice;

        $post_type = get_option('spi-post-type');          //post type from options
        $post_id = get_option('spi-post-id');              //post id from options
        $post_category = get_option('spi-post-category');  //post category from options


        //Running the script
        if (is_single() && !is_admin()) {

            // ---------   SCRIPT LOGIC   ----------

            //This will run if post type is set, middle unchecked, category, id not set
            if ($post_type != '' && get_post_type() == $post_type && $middle_check == '' && $post_category == '' && $post_id == '') {
                return spi_insert_after_paragraph($content_insert, $p_choice, $content);
            }

            //This will run if post type is set, middle checked, category, id not set
            else if ($post_type != '' && get_post_type() == $post_type && $middle_check == '1' && $post_category == '' && $post_id == '') {
                return spi_insert_in_middle($content_insert, $content);  //Do middle insert, check val = 1
            }

            //This will run if post category is set, middle unchecked, post id not set / overrides any post type being set
            else if ($post_category != '' && in_category($post_category) && $middle_check == ''  && $post_id == '') {
                return spi_insert_after_paragraph($content_insert, $p_choice, $content);
            }

            //This will run if post category is set, middle checked, post id not set / overrides any post type being set
            else if ($post_category != '' && in_category($post_category) && $middle_check == '1'  && $post_id == '') {
                return spi_insert_in_middle($content_insert, $content);  //Do middle insert, check val = 1
            }

            //This will only apply to one post, the id that is entered, overrides all other rules
            else if ($post_id != '' && get_the_ID() == $post_id && $middle_check == '') {
                return spi_insert_after_paragraph($content_insert, $p_choice, $content);
            }

            //Same as previous but for a middle insert
            else if ($post_id != '' &&  get_the_ID() == $post_id && $middle_check == '1') {
                return spi_insert_in_middle($content_insert, $content);  //Do middle insert, check val = 1
            }

            //Nothing but middle or paragraph is set, applies to all posts on site
            else if ($post_type == '' && $middle_check == '' && $post_category == '' && $post_id == '') {
                return spi_insert_after_paragraph($content_insert, $p_choice, $content);
            }

            //Same as before but for a middle insert
            else if ($post_type == '' && $middle_check == '1'  && $post_category == '' && $post_id == '') {
                return spi_insert_in_middle($content_insert, $content);  //Do middle insert, check val = 1
            }
        }
        return $content;
    }
}

//Insert the content in the post after certain number of paragraphs
function spi_insert_after_paragraph($content_insert, $p_choice, $content)
{
    $closing_p = '</p>';
    $paragraphs = explode($closing_p, $content);
    $total_paragraphs = count($paragraphs);

    //loop through the paragraphs
    if ($p_choice == 0 && $p_choice!='') {          //case for beginning
        $content = $content_insert . $content;
        return $content;
    } else if ($p_choice >= $total_paragraphs){      //case for end
        $content = $content . $content_insert;
        return $content;
    } else {
        foreach ($paragraphs as $index => $paragraph) {
            if (trim($paragraph)) {
                $paragraphs[$index] .= $closing_p; //add closing tag
            }
            if ($p_choice == $index + 1) {
                $paragraphs[$index] .= $content_insert; //add the content option
            }
        }
    }
    return implode('', $paragraphs);
}


//Insert the content in the post in the middle
function spi_insert_in_middle($content_insert, $content)
{
    $closing_p = '</p>';
    $paragraphs = explode($closing_p, $content);

    //The middle of content based off paragraphs
    $paragraph_id = round(count($paragraphs) / 2);

    //Loop through the paragraphs
    foreach ($paragraphs as $index => $paragraph) {
        if (trim($paragraph)) {
            $paragraphs[$index] .= $closing_p;
        }
        if ($paragraph_id == $index + 1) {
            $paragraphs[$index] .= $content_insert;
        }
    }
    return implode('', $paragraphs);
}
