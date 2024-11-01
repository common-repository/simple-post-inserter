=== Simple Post Inserter ===
 * Plugin Name:       Simple Post Inserter
 * Description:       Insert content directly into your posts at your desired location.
 * Tags:              posts, insert, ads, embed, content, post filter, insert content, post insert
 * Version:           1.0
 * Stable tag:        5.2.3
 * Tested up to:      5.2.3
 * Requires at least: 5.2
 * Requires PHP:      5.6
 * Contributors:      tljorgensen
 * Plugin URI:        https://codexi.io/simple-post-inserter
 * Author URI:        https://codexi.io
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Donate link:       https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=EVLK2BEHS59T4&source=url


Simple post inserter does what it sounds like. Insert some content into a post at your desired location.

== Description ==

Simple Post Inserter takes various inputs through the settings page and determines three things:

The content you wish to display in your posts, could be plain text, could be some HTML code.
By default the admin of the site is responsible for any of the content submitted.

The location where the content should be displayed within the post. 

Post restrictions. By default if no other setting but the content and location are declared,
the plugin will insert the content in all of the posts available on the site. This may not be what you
desire, but you can filter by post type, category, and ID.

Currently the only parameter for placement inside the posts is based off of total paragraphs in a post. 
This will likely change in a future update to something a little more sensible such as: lines of text or character counts.

== Installation ==

1. Upload the entire `simple-post-inserter` folder to the `/wp-content/plugins/` directory.
1. Activate the plugin through the 'Plugins' menu in WordPress.

Can be set up by going to Settings(in the admin panel) -> Simple Post Inserter.

== Frequently Asked Questions ==

= What are some of the use cases for Simple Post Inserter? =

    A. Simple Post Inserter by nature is designed to be flexible. This means that the admin will have complete
    control over what is displayed. This could be just some text or some html containing an embedded video. It is up to the
    discretion of the admin.

= Can I style my embedded HTML? =

    A. Yes, styling can be done through inserting an inline style script with the HTML or by using already defined elements
    within your theme. If you are the sits developer you can declare the class, label of the element inside the settings page
    and retroactively add the style into your style.css file.

= My content is not displaying where I requested it to show, what is wrong? =

    A. The display filters for Simple Post Inserter follow a general hierarchy. If a post ID is entered into the settings
    it will ignore your filters for post type and categories and only apply to that post ID. Then the category will be checked, 
    then the post type.

    In addition there should be error messages thrown if you enter an invalid slug into one of the filters. This will not stop the
    plugin from working, but the filter will be ignored. 

    If your content is still not displaying and you are unsure why. Submit a ticket to the developer through [contact](https://codexi.io/contact)

= Can I add multiple inserts per post? =

    A. At this time, no that is not possible with this plugin. It may or may not be implemented in the future.

= How do I insert my content to the top or bottom of a post? =

    A. Use the insert paragraph setting. Set the value to 0 to put it on top of all of the post paragraphs. 
    Set the value to a high number, that exceeds the total amount of paragraphs in any of your posts to put it at the bottom.
    i.e. "999" should be a large enough number to put it on the bottom of most if not all posts (assuming you do not have very long content).


= The middle option isn't working correctly, what is wrong? =

    A. The middle option counts all the paragraph tags in the post. Sometimes there are paragraph tags that are empty for whatever reason.
    Go to the page and inspect it to see all the paragraph tags and what they are holding, you may find paragraphs that are holding nothing.
    
    The middle option also does not account for the length of each paragraph, or other pieces of content such as images, headings, etc.
    Which will likely make it seem that the content you inserted isn't directly balanced in the middle. There may or may not be future updates
    to balance based of other parameters, such as character count.

    Lastly, for posts with odd numbered amounts of paragraphs the content will have a tendency toward the bottom based on the rounding used.
    For example a post with 7 paragraphs will have 4 on the top of your content and 3 on the bottom.


== Changelog ==

= 1.0 =
* Released


== Upgrade Notice ==

== Screenshots ==