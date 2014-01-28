<?php
/**
 * tidy_sns_array
 * @param   none
 * @return  Array
 */
function tidy_customizer_array() {
	$customizer_key = array(
		'logo_toggle',
		'logo_image',
		'header_text',
		'copyright',
		'favicon',
		'header_bg_color',
		'header_text_color',
		'header_anchor_color',
		'header_border_color',
		'header_widget_bg_color',
		'header_widget_text_color',
		'header_widget_anchor_color',
		'main_bg_color',
		'main_text_color',
		'main_anchor_color',
		'main_border_color',
		'widget_bg_color',
		'widget_title_color',
		'widget_text_color',
		'widget_anchor_color',
		'widget_border_color',
		'footer_bg_color',
		'footer_title_color',
		'footer_text_color',
		'footer_anchor_color',
		'footer_border_color',
		'footer_category_bg_color',
		'footer_category_title_color',
		'footer_category_text_color',
		'footer_category_anchor_color',
		'footer_category_border_color',
		'copyright_bg_color',
		'copyright_text_color',
		'copyright_anchor_color'
	);
	return $customizer_key;
}

/**
 * A unique identifier is defined to store the options in the database and reference them from the theme.
 * By default it uses the theme name, in lowercase and without spaces, but this can be changed if needed.
 * If the identifier changes, it'll appear as if the options have been reset.
 */

function optionsframework_option_name() {

	// This gets the theme name from the stylesheet
	$themename = wp_get_theme();
	$themename = preg_replace("/\W/", "_", strtolower($themename) );

	$optionsframework_settings = get_option( 'optionsframework' );
	$optionsframework_settings['id'] = $themename;
	update_option( 'optionsframework', $optionsframework_settings );
}

/**
 * Defines an array of options that will be used to generate the settings page and be saved in the database.
 * When creating the 'id' fields, make sure to use all lowercase and no spaces.
 *
 * If you are making your theme translatable, you should replace 'tidy'
 * with the actual text domain for your theme.  Read more:
 * http://codex.wordpress.org/Function_Reference/load_theme_textdomain
 */

function optionsframework_options() {

	// tidy_default_array
	$tidy_default = tidy_default_array();

	// Icon array
	$icon_array = array(
		'home' => __('Home', 'tidy'),
		'home2' => __('Home2', 'tidy'),
		'home3' => __('Home3', 'tidy'),
		'office' => __('Office', 'tidy'),
		'newspaper' => __('Newspaper', 'tidy'),
		'pencil' => __('Pencil', 'tidy'),
		'pencil2' => __('Pencil2', 'tidy'),
		'quill' => __('Quill', 'tidy'),
		'pen' => __('Pen', 'tidy'),
		'blog' => __('Blog', 'tidy'),
		'droplet' => __('Droplet', 'tidy'),
		'paint-format' => __('Paint Format', 'tidy'),
		'image' => __('Image', 'tidy'),
		'image2' => __('Image2', 'tidy'),
		'images' => __('Images', 'tidy'),
		'camera' => __('Camera', 'tidy'),
		'music' => __('Music', 'tidy'),
		'headphones' => __('Headphones', 'tidy'),
		'play' => __('Play', 'tidy'),
		'film' => __('Film', 'tidy'),
		'camera2' => __('Camera2', 'tidy'),
		'dice' => __('Dice', 'tidy'),
		'pacman' => __('Pacman', 'tidy'),
		'spades' => __('Spades', 'tidy'),
		'clubs' => __('Clubs', 'tidy'),
		'diamonds' => __('Diamonds', 'tidy'),
		'pawn' => __('Pawn', 'tidy'),
		'bullhorn' => __('Bullhorn', 'tidy'),
		'connection' => __('Connection', 'tidy'),
		'podcast' => __('Podcast', 'tidy'),
		'feed' => __('Feed', 'tidy'),
		'book' => __('Book', 'tidy'),
		'books' => __('Books', 'tidy'),
		'library' => __('Library', 'tidy'),
		'file' => __('File', 'tidy'),
		'profile' => __('Profile', 'tidy'),
		'file2' => __('File2', 'tidy'),
		'file3' => __('File3', 'tidy'),
		'file4' => __('File4', 'tidy'),
		'copy' => __('Copy', 'tidy'),
		'copy2' => __('Copy2', 'tidy'),
		'copy3' => __('Copy3', 'tidy'),
		'paste' => __('Paste', 'tidy'),
		'paste2' => __('Paste2', 'tidy'),
		'paste3' => __('Paste3', 'tidy'),
		'stack' => __('Stack', 'tidy'),
		'folder' => __('Folder', 'tidy'),
		'folder-open' => __('Folder Open', 'tidy'),
		'tag' => __('Tag', 'tidy'),
		'tags' => __('Tags', 'tidy'),
		'barcode' => __('Barcode', 'tidy'),
		'qrcode' => __('Qrcode', 'tidy'),
		'ticket' => __('Ticket', 'tidy'),
		'cart' => __('Cart', 'tidy'),
		'cart2' => __('Cart2', 'tidy'),
		'cart3' => __('Cart3', 'tidy'),
		'coin' => __('Coin', 'tidy'),
		'credit' => __('Credit', 'tidy'),
		'calculate' => __('Calculate', 'tidy'),
		'support' => __('Support', 'tidy'),
		'phone' => __('Phone', 'tidy'),
		'phone-hang-up' => __('Phone Hang Up', 'tidy'),
		'address-book' => __('Address Book', 'tidy'),
		'notebook' => __('Notebook', 'tidy'),
		'envelope' => __('Envelope', 'tidy'),
		'pushpin' => __('Pushpin', 'tidy'),
		'location' => __('Location', 'tidy'),
		'location2' => __('Location2', 'tidy'),
		'compass' => __('Compass', 'tidy'),
		'map' => __('Map', 'tidy'),
		'map2' => __('Map2', 'tidy'),
		'history' => __('History', 'tidy'),
		'clock' => __('Clock', 'tidy'),
		'clock2' => __('Clock2', 'tidy'),
		'alarm' => __('Alarm', 'tidy'),
		'alarm2' => __('Alarm2', 'tidy'),
		'bell' => __('Bell', 'tidy'),
		'stopwatch' => __('Stopwatch', 'tidy'),
		'calendar' => __('Calendar', 'tidy'),
		'calendar2' => __('Calendar2', 'tidy'),
		'print' => __('Print', 'tidy'),
		'keyboard' => __('Keyboard', 'tidy'),
		'screen' => __('Screen', 'tidy'),
		'laptop' => __('Laptop', 'tidy'),
		'mobile' => __('Mobile', 'tidy'),
		'mobile2' => __('Mobile2', 'tidy'),
		'tablet' => __('Tablet', 'tidy'),
		'tv' => __('Tv', 'tidy'),
		'cabinet' => __('Cabinet', 'tidy'),
		'drawer' => __('Drawer', 'tidy'),
		'drawer2' => __('Drawer2', 'tidy'),
		'drawer3' => __('Drawer3', 'tidy'),
		'box-add' => __('Box Add', 'tidy'),
		'box-remove' => __('Box Remove', 'tidy'),
		'download' => __('Download', 'tidy'),
		'upload' => __('Upload', 'tidy'),
		'disk' => __('Disk', 'tidy'),
		'storage' => __('Storage', 'tidy'),
		'undo' => __('Undo', 'tidy'),
		'redo' => __('Redo', 'tidy'),
		'flip' => __('Flip', 'tidy'),
		'flip2' => __('Flip2', 'tidy'),
		'undo2' => __('Undo2', 'tidy'),
		'redo2' => __('Redo2', 'tidy'),
		'forward' => __('Forward', 'tidy'),
		'reply' => __('Reply', 'tidy'),
		'bubble' => __('Bubble', 'tidy'),
		'bubbles' => __('Bubbles', 'tidy'),
		'bubbles2' => __('Bubbles2', 'tidy'),
		'bubble2' => __('Bubble2', 'tidy'),
		'bubbles3' => __('Bubbles3', 'tidy'),
		'bubbles4' => __('Bubbles4', 'tidy'),
		'user' => __('User', 'tidy'),
		'users' => __('Users', 'tidy'),
		'user2' => __('User2', 'tidy'),
		'users2' => __('Users2', 'tidy'),
		'user3' => __('User3', 'tidy'),
		'user4' => __('User4', 'tidy'),
		'quotes-left' => __('Quotes Left', 'tidy'),
		'busy' => __('Busy', 'tidy'),
		'spinner' => __('Spinner', 'tidy'),
		'spinner2' => __('Spinner2', 'tidy'),
		'spinner3' => __('Spinner3', 'tidy'),
		'spinner4' => __('Spinner4', 'tidy'),
		'spinner5' => __('Spinner5', 'tidy'),
		'spinner6' => __('Spinner6', 'tidy'),
		'binoculars' => __('Binoculars', 'tidy'),
		'search' => __('Search', 'tidy'),
		'zoom-in' => __('Zoom In', 'tidy'),
		'zoom-out' => __('Zoom Out', 'tidy'),
		'expand' => __('Expand', 'tidy'),
		'contract' => __('Contract', 'tidy'),
		'expand2' => __('Expand2', 'tidy'),
		'contract2' => __('Contract2', 'tidy'),
		'key' => __('Key', 'tidy'),
		'key2' => __('Key2', 'tidy'),
		'lock' => __('Lock', 'tidy'),
		'lock2' => __('Lock2', 'tidy'),
		'unlocked' => __('Unlocked', 'tidy'),
		'wrench' => __('Wrench', 'tidy'),
		'settings' => __('Settings', 'tidy'),
		'equalizer' => __('Equalizer', 'tidy'),
		'cog' => __('Cog', 'tidy'),
		'cogs' => __('Cogs', 'tidy'),
		'cog2' => __('Cog2', 'tidy'),
		'hammer' => __('Hammer', 'tidy'),
		'wand' => __('Wand', 'tidy'),
		'aid' => __('Aid', 'tidy'),
		'bug' => __('Bug', 'tidy'),
		'pie' => __('Pie', 'tidy'),
		'stats' => __('Stats', 'tidy'),
		'bars' => __('Bars', 'tidy'),
		'bars2' => __('Bars2', 'tidy'),
		'gift' => __('Gift', 'tidy'),
		'trophy' => __('Trophy', 'tidy'),
		'glass' => __('Glass', 'tidy'),
		'mug' => __('Mug', 'tidy'),
		'food' => __('Food', 'tidy'),
		'leaf' => __('Leaf', 'tidy'),
		'rocket' => __('Rocket', 'tidy'),
		'meter' => __('Meter', 'tidy'),
		'meter2' => __('Meter2', 'tidy'),
		'dashboard' => __('Dashboard', 'tidy'),
		'hammer2' => __('Hammer2', 'tidy'),
		'fire' => __('Fire', 'tidy'),
		'lab' => __('Lab', 'tidy'),
		'magnet' => __('Magnet', 'tidy'),
		'remove' => __('Remove', 'tidy'),
		'remove2' => __('Remove2', 'tidy'),
		'briefcase' => __('Briefcase', 'tidy'),
		'airplane' => __('Airplane', 'tidy'),
		'truck' => __('Truck', 'tidy'),
		'road' => __('Road', 'tidy'),
		'accessibility' => __('Accessibility', 'tidy'),
		'target' => __('Target', 'tidy'),
		'shield' => __('Shield', 'tidy'),
		'lightning' => __('Lightning', 'tidy'),
		'switch' => __('Switch', 'tidy'),
		'power-cord' => __('Power Cord', 'tidy'),
		'signup' => __('Signup', 'tidy'),
		'list' => __('List', 'tidy'),
		'list2' => __('List2', 'tidy'),
		'numbered-list' => __('Numbered List', 'tidy'),
		'menu' => __('Menu', 'tidy'),
		'menu2' => __('Menu2', 'tidy'),
		'tree' => __('Tree', 'tidy'),
		'cloud' => __('Cloud', 'tidy'),
		'cloud-download' => __('Cloud Download', 'tidy'),
		'cloud-upload' => __('Cloud Upload', 'tidy'),
		'download2' => __('Download2', 'tidy'),
		'upload2' => __('Upload2', 'tidy'),
		'download3' => __('Download3', 'tidy'),
		'upload3' => __('Upload3', 'tidy'),
		'globe' => __('Globe', 'tidy'),
		'earth' => __('Earth', 'tidy'),
		'link' => __('Link', 'tidy'),
		'flag' => __('Flag', 'tidy'),
		'attachment' => __('Attachment', 'tidy'),
		'eye' => __('Eye', 'tidy'),
		'eye-blocked' => __('Eye Blocked', 'tidy'),
		'eye2' => __('Eye2', 'tidy'),
		'bookmark' => __('Bookmark', 'tidy'),
		'bookmarks' => __('Bookmarks', 'tidy'),
		'brightness-medium' => __('Brightness Medium', 'tidy'),
		'brightness-contrast' => __('Brightness Contrast', 'tidy'),
		'contrast' => __('Contrast', 'tidy'),
		'star' => __('Star', 'tidy'),
		'star2' => __('Star2', 'tidy'),
		'star3' => __('Star3', 'tidy'),
		'heart' => __('Heart', 'tidy'),
		'heart2' => __('Heart2', 'tidy'),
		'heart-broken' => __('Heart Broken', 'tidy'),
		'thumbs-up' => __('Thumbs Up', 'tidy'),
		'thumbs-up2' => __('Thumbs Up2', 'tidy'),
		'happy' => __('Happy', 'tidy'),
		'happy2' => __('Happy2', 'tidy'),
		'smiley' => __('Smiley', 'tidy'),
		'smiley2' => __('Smiley2', 'tidy'),
		'tongue' => __('Tongue', 'tidy'),
		'tongue2' => __('Tongue2', 'tidy'),
		'sad' => __('Sad', 'tidy'),
		'sad2' => __('Sad2', 'tidy'),
		'wink' => __('Wink', 'tidy'),
		'wink2' => __('Wink2', 'tidy'),
		'grin' => __('Grin', 'tidy'),
		'grin2' => __('Grin2', 'tidy'),
		'cool' => __('Cool', 'tidy'),
		'cool2' => __('Cool2', 'tidy'),
		'angry' => __('Angry', 'tidy'),
		'angry2' => __('Angry2', 'tidy'),
		'evil' => __('Evil', 'tidy'),
		'evil2' => __('Evil2', 'tidy'),
		'shocked' => __('Shocked', 'tidy'),
		'shocked2' => __('Shocked2', 'tidy'),
		'confused' => __('Confused', 'tidy'),
		'confused2' => __('Confused2', 'tidy'),
		'neutral' => __('Neutral', 'tidy'),
		'neutral2' => __('Neutral2', 'tidy'),
		'wondering' => __('Wondering', 'tidy'),
		'wondering2' => __('Wondering2', 'tidy'),
		'point-up' => __('Point Up', 'tidy'),
		'point-right' => __('Point Right', 'tidy'),
		'point-down' => __('Point Down', 'tidy'),
		'point-left' => __('Point Left', 'tidy'),
		'warning' => __('Warning', 'tidy'),
		'notification' => __('Notification', 'tidy'),
		'question' => __('Question', 'tidy'),
		'info' => __('Info', 'tidy'),
		'info2' => __('Info2', 'tidy'),
		'blocked' => __('Blocked', 'tidy'),
		'cancel-circle' => __('Cancel Circle', 'tidy'),
		'checkmark-circle' => __('Checkmark Circle', 'tidy'),
		'spam' => __('Spam', 'tidy'),
		'close' => __('Close', 'tidy'),
		'checkmark' => __('Checkmark', 'tidy'),
		'checkmark2' => __('Checkmark2', 'tidy'),
		'spell-check' => __('Spell Check', 'tidy'),
		'minus' => __('Minus', 'tidy'),
		'plus' => __('Plus', 'tidy'),
		'enter' => __('Enter', 'tidy'),
		'exit' => __('Exit', 'tidy'),
		'play2' => __('Play2', 'tidy'),
		'pause' => __('Pause', 'tidy'),
		'stop' => __('Stop', 'tidy'),
		'backward' => __('Backward', 'tidy'),
		'forward2' => __('Forward2', 'tidy'),
		'play3' => __('Play3', 'tidy'),
		'pause2' => __('Pause2', 'tidy'),
		'stop2' => __('Stop2', 'tidy'),
		'backward2' => __('Backward2', 'tidy'),
		'forward3' => __('Forward3', 'tidy'),
		'first' => __('First', 'tidy'),
		'last' => __('Last', 'tidy'),
		'previous' => __('Previous', 'tidy'),
		'next' => __('Next', 'tidy'),
		'eject' => __('Eject', 'tidy'),
		'volume-high' => __('Volume High', 'tidy'),
		'volume-medium' => __('Volume Medium', 'tidy'),
		'volume-low' => __('Volume Low', 'tidy'),
		'volume-mute' => __('Volume Mute', 'tidy'),
		'volume-mute2' => __('Volume Mute2', 'tidy'),
		'volume-increase' => __('Volume Increase', 'tidy'),
		'volume-decrease' => __('Volume Decrease', 'tidy'),
		'loop' => __('Loop', 'tidy'),
		'loop2' => __('Loop2', 'tidy'),
		'loop3' => __('Loop3', 'tidy'),
		'shuffle' => __('Shuffle', 'tidy'),
		'arrow-up-left' => __('Arrow Up Left', 'tidy'),
		'arrow-up' => __('Arrow Up', 'tidy'),
		'arrow-up-right' => __('Arrow Up Right', 'tidy'),
		'arrow-right' => __('Arrow Right', 'tidy'),
		'arrow-down-right' => __('Arrow Down Right', 'tidy'),
		'arrow-down' => __('Arrow Down', 'tidy'),
		'arrow-down-left' => __('Arrow Down Left', 'tidy'),
		'arrow-left' => __('Arrow Left', 'tidy'),
		'arrow-up-left2' => __('Arrow Up Left2', 'tidy'),
		'arrow-up2' => __('Arrow Up2', 'tidy'),
		'arrow-up-right2' => __('Arrow Up Right2', 'tidy'),
		'arrow-right2' => __('Arrow Right2', 'tidy'),
		'arrow-down-right2' => __('Arrow Down Right2', 'tidy'),
		'arrow-down2' => __('Arrow Down2', 'tidy'),
		'arrow-down-left2' => __('Arrow Down Left2', 'tidy'),
		'arrow-left2' => __('Arrow Left2', 'tidy'),
		'arrow-up-left3' => __('Arrow Up Left3', 'tidy'),
		'arrow-up3' => __('Arrow Up3', 'tidy'),
		'arrow-up-right3' => __('Arrow Up Right3', 'tidy'),
		'arrow-right3' => __('Arrow Right3', 'tidy'),
		'arrow-down-right3' => __('Arrow Down Right3', 'tidy'),
		'arrow-down3' => __('Arrow Down3', 'tidy'),
		'arrow-down-left3' => __('Arrow Down Left3', 'tidy'),
		'arrow-left3' => __('Arrow Left3', 'tidy'),
		'tab' => __('Tab', 'tidy'),
		'checkbox-checked' => __('Checkbox Checked', 'tidy'),
		'checkbox-unchecked' => __('Checkbox Unchecked', 'tidy'),
		'checkbox-partial' => __('Checkbox Partial', 'tidy'),
		'radio-checked' => __('Radio Checked', 'tidy'),
		'radio-unchecked' => __('Radio Unchecked', 'tidy'),
		'crop' => __('Crop', 'tidy'),
		'scissors' => __('Scissors', 'tidy'),
		'filter' => __('Filter', 'tidy'),
		'filter2' => __('Filter2', 'tidy'),
		'font' => __('Font', 'tidy'),
		'text-height' => __('Text Height', 'tidy'),
		'text-width' => __('Text Width', 'tidy'),
		'bold' => __('Bold', 'tidy'),
		'underline' => __('Underline', 'tidy'),
		'italic' => __('Italic', 'tidy'),
		'strikethrough' => __('Strikethrough', 'tidy'),
		'omega' => __('Omega', 'tidy'),
		'sigma' => __('Sigma', 'tidy'),
		'table' => __('Table', 'tidy'),
		'table2' => __('Table2', 'tidy'),
		'insert-template' => __('Insert Template', 'tidy'),
		'pilcrow' => __('Pilcrow', 'tidy'),
		'left-toright' => __('Left Toright', 'tidy'),
		'right-Toleft' => __('Right Toleft', 'tidy'),
		'paragraph-left' => __('Paragraph Left', 'tidy'),
		'paragraph-center' => __('Paragraph Center', 'tidy'),
		'paragraph-right' => __('Paragraph Right', 'tidy'),
		'paragraph-justify' => __('Paragraph Justify', 'tidy'),
		'paragraph-left2' => __('Paragraph Left2', 'tidy'),
		'paragraph-center2' => __('Paragraph Center2', 'tidy'),
		'paragraph-right2' => __('Paragraph Right2', 'tidy'),
		'paragraph-justify2' => __('Paragraph Justify2', 'tidy'),
		'indent-increase' => __('Indent Increase', 'tidy'),
		'indent-decrease' => __('Indent Decrease', 'tidy'),
		'new-tab' => __('New Tab', 'tidy'),
		'embed' => __('Embed', 'tidy'),
		'code' => __('Code', 'tidy'),
		'console' => __('Console', 'tidy'),
		'share' => __('Share', 'tidy'),
		'mail' => __('Mail', 'tidy'),
		'mail2' => __('Mail2', 'tidy'),
		'mail3' => __('Mail3', 'tidy'),
		'mail4' => __('Mail4', 'tidy'),
		'google' => __('Google', 'tidy'),
		'google-plus' => __('Google Plus', 'tidy'),
		'google-plus2' => __('Google Plus2', 'tidy'),
		'google-plus3' => __('Google Plus3', 'tidy'),
		'google-plus4' => __('Google Plus4', 'tidy'),
		'google-drive' => __('Google Drive', 'tidy'),
		'facebook' => __('Facebook', 'tidy'),
		'facebook2' => __('Facebook2', 'tidy'),
		'facebook3' => __('Facebook3', 'tidy'),
		'instagram' => __('Instagram', 'tidy'),
		'twitter' => __('Twitter', 'tidy'),
		'twitter2' => __('Twitter2', 'tidy'),
		'twitter3' => __('Twitter3', 'tidy'),
		'feed2' => __('Feed2', 'tidy'),
		'feed3' => __('Feed3', 'tidy'),
		'feed4' => __('Feed4', 'tidy'),
		'youtube' => __('Youtube', 'tidy'),
		'youtube2' => __('Youtube2', 'tidy'),
		'vimeo' => __('Vimeo', 'tidy'),
		'vimeo2' => __('Vimeo2', 'tidy'),
		'vimeo3' => __('Vimeo3', 'tidy'),
		'lanyrd' => __('Lanyrd', 'tidy'),
		'flickr' => __('Flickr', 'tidy'),
		'flickr2' => __('Flickr2', 'tidy'),
		'flickr3' => __('Flickr3', 'tidy'),
		'flickr4' => __('Flickr4', 'tidy'),
		'picasa' => __('Picasa', 'tidy'),
		'picasa2' => __('Picasa2', 'tidy'),
		'dribbble' => __('Dribbble', 'tidy'),
		'dribbble2' => __('Dribbble2', 'tidy'),
		'dribbble3' => __('Dribbble3', 'tidy'),
		'forrst' => __('Forrst', 'tidy'),
		'forrst2' => __('Forrst2', 'tidy'),
		'deviantart' => __('Deviantart', 'tidy'),
		'deviantart2' => __('Deviantart2', 'tidy'),
		'steam' => __('Steam', 'tidy'),
		'steam2' => __('Steam2', 'tidy'),
		'github' => __('Github', 'tidy'),
		'github2' => __('Github2', 'tidy'),
		'github3' => __('Github3', 'tidy'),
		'github4' => __('Github4', 'tidy'),
		'github5' => __('Github5', 'tidy'),
		'wordpress' => __('Wordpress', 'tidy'),
		'wordpress2' => __('Wordpress2', 'tidy'),
		'joomla' => __('Joomla', 'tidy'),
		'blogger' => __('Blogger', 'tidy'),
		'blogger2' => __('Blogger2', 'tidy'),
		'tumblr' => __('Tumblr', 'tidy'),
		'tumblr2' => __('Tumblr2', 'tidy'),
		'yahoo' => __('Yahoo', 'tidy'),
		'tux' => __('Tux', 'tidy'),
		'apple' => __('Apple', 'tidy'),
		'finder' => __('Finder', 'tidy'),
		'android' => __('Android', 'tidy'),
		'windows' => __('Windows', 'tidy'),
		'windows8' => __('Windows8', 'tidy'),
		'soundcloud' => __('Soundcloud', 'tidy'),
		'soundcloud2' => __('Soundcloud2', 'tidy'),
		'skype' => __('Skype', 'tidy'),
		'reddit' => __('Reddit', 'tidy'),
		'linkedin' => __('Linkedin', 'tidy'),
		'lastfm' => __('Lastfm', 'tidy'),
		'lastfm2' => __('Lastfm2', 'tidy'),
		'delicious' => __('Delicious', 'tidy'),
		'stumbleupon' => __('Stumbleupon', 'tidy'),
		'stumbleupon2' => __('Stumbleupon2', 'tidy'),
		'stackoverflow' => __('Stackoverflow', 'tidy'),
		'pinterest' => __('Pinterest', 'tidy'),
		'pinterest2' => __('Pinterest2', 'tidy'),
		'xing' => __('Xing', 'tidy'),
		'xing2' => __('Xing2', 'tidy'),
		'flattr' => __('Flattr', 'tidy'),
		'foursquare' => __('Foursquare', 'tidy'),
		'foursquare2' => __('Foursquare2', 'tidy'),
		'paypal' => __('Paypal', 'tidy'),
		'paypal2' => __('Paypal2', 'tidy'),
		'paypal3' => __('Paypal3', 'tidy'),
		'yelp' => __('Yelp', 'tidy'),
		'libreoffice' => __('Libreoffice', 'tidy'),
		'file-pdf' => __('File Pdf', 'tidy'),
		'file-openoffice' => __('File Openoffice', 'tidy'),
		'file-word' => __('File Word', 'tidy'),
		'file-excel' => __('File Excel', 'tidy'),
		'file-zip' => __('File Zip', 'tidy'),
		'file-powerpoint' => __('File Powerpoint', 'tidy'),
		'file-xml' => __('File Xml', 'tidy'),
		'file-css' => __('File Css', 'tidy'),
		'html5' => __('Html5', 'tidy'),
		'html52' => __('Html52', 'tidy'),
		'css3' => __('Css3', 'tidy'),
		'chrome' => __('Chrome', 'tidy'),
		'firefox' => __('Firefox', 'tidy'),
		'ie' => __('Ie', 'tidy'),
		'opera' => __('Opera', 'tidy'),
		'safari' => __('Safari', 'tidy'),
		'icomoon' => __('Icomoon', 'tidy')
	);

	// posts_per_page
	$posts_per_page = get_option( 'posts_per_page' );

	// Select Column Number
	$column_array = array(
		1 => 1,
		2 => 2,
		3 => 3,
		4 => 4
	);

	// Multicheck Array
	$multicheck_array = array(
		'one' => __('French Toast', 'tidy'),
		'two' => __('Pancake', 'tidy'),
		'three' => __('Omelette', 'tidy'),
		'four' => __('Crepe', 'tidy'),
		'five' => __('Waffle', 'tidy')
	);

	// Multicheck Defaults
	$multicheck_defaults = array(
		'one' => '1',
		'five' => '1'
	);

	// Background Defaults
	$background_defaults = array(
		'color' => '',
		'image' => '',
		'repeat' => 'repeat',
		'position' => 'top center',
		'attachment'=>'scroll' );

	// Typography Defaults
	$typography_defaults = array(
		'size' => '15px',
		'face' => 'georgia',
		'style' => 'bold',
		'color' => '#bada55' );

	// Typography Options
	$typography_options = array(
		'sizes' => array( '6','12','14','16','20' ),
		'faces' => array( 'Helvetica Neue' => 'Helvetica Neue','Arial' => 'Arial' ),
		'styles' => array( 'normal' => 'Normal','bold' => 'Bold' ),
		'color' => false
	);

	// Pull all the categories into an array
	$options_categories = array();
	$options_categories_obj = get_categories();
	foreach ($options_categories_obj as $category) {
		$options_categories[$category->cat_ID] = $category->cat_name;
	}

	// Pull all tags into an array
	$options_tags = array();
	$options_tags_obj = get_tags();
	foreach ( $options_tags_obj as $tag ) {
		$options_tags[$tag->term_id] = $tag->name;
	}

	// Pull all the pages into an array
	$options_pages = array();
	$options_pages_obj = get_pages('sort_column=post_parent,menu_order');
	$options_pages[''] = 'Select a page:';
	foreach ($options_pages_obj as $page) {
		$options_pages[$page->ID] = $page->post_title;
	}

	// If using image radio buttons, define a directory path
	$imagepath = get_template_directory_uri() . '/admin/images/';

	$options = array();

	/**
	 * section for About.
	 */
	$options[] = array(
		'name' => __( 'About', 'tidy' ),
		'icon' => 'info',
		'type' => 'heading'
	);

	// About this Theme
	$options[] = array(
		'name' => __( 'About this Theme', 'tidy' ),
		'desc' => __( '<p>This is a highly customizable, clean, modern, and responsive WordPress theme. originally developed plugin is included and it enables higher usability and easier production of stylish site and customization. It can be used in wide variation from private to business use. Give it a try and enjoy our beautiful theme.</p><p><strong>Features</strong></p><ul><li>Responsive</li><li>Social setting</li><li>Easy web advertisement setting</li><li>Portfolio</li><li>Icon menu</li><li>Easy tracking code &amp; Web mastertool setting</li><li>Color customization</li><li>Web fonts &amp; icon fonts</li><li>Wide variety of theme layouts</li><li>Stylish slider &quot;Classic Slider&quot;</li></ul>', 'tidy' ),
		'id' => 'about-this-theme',
		'class' => 'about-this-theme',
		'type' => 'info');

	// About WP Shop
	$options[] = array(
		'name' => __( 'About WP Shop', 'tidy' ),
		'desc' => sprintf( __( '<p class="about-photo"><img src="%1$s" alt="*"></p><p>WP Shop is a social marketplace for buying and selling WordPress themes, while providing a platform to showcase and share Asian design.</p><p>We connect buyers and sellers of digital contents for WordPress by offering more than just a marketplace.</p><p>WP Shop only offers safe and high quality themes produced according to the guidelines issued by wordpress.org and tested based on _s(underscores) provided by Automattic Inc. or default themes as a standard.</p><p class="shop_link"><a href="https://wpshop.com/signup" target="_blank" class="shop_btn"><span class="shop_name">Join WP Shop</span><span class="shop_dec">Starting from $0 / theme</span></a></p>', 'tidy' ), $imagepath . 'about-image.jpg' ),
		'id' => 'about-wp-shop',
		'class' => 'about-wp-shop',
		'type' => 'info');

	// WP Shop Headline News
	$options[] = array(
		'name' => __( 'WP Shop Headline News', 'tidy' ),
		'desc' => '',
		'url' => 'http://news.wpshop.com/?feed=rss2',
		'item' => 5,
		'id' => 'wp-shop-news',
		'class' => 'wp-shop-news',
		'type' => 'feed');

	$options[] = array(
		'name' => __( 'What\'s happennig at WordPress?', 'tidy' ),
		'desc' => '',
		'url' => 'http://wp.wpshop.com/?feed=rss2',
		'item' => 5,
		'id' => 'wp-happennig-news',
		'class' => 'wp-happennig-news',
		'type' => 'feed');

	/**
	 * General Settings.
	 */
	$options[] = array(
		'name' => __('General Settings', 'tidy'),
		'icon' => 'admin-generic',
		'type' => 'heading');

	// Header logo toggle
	$options[] = array(
		'name' => __( 'Show Header logo', 'tidy' ),
		'desc' => '',
		'id' => 'logo_toggle',
		'std' => '1',
		'type' => 'toggle');

	// Header logo image
	$options[] = array(
		'name' => __( 'Header logo image', 'tidy' ),
		'desc' => '',
		'id' => 'logo_image',
		'std' => $tidy_default['logo_image'],
		'type' => 'upload');

	// Favicon
	$options[] = array(
		'name' => __( 'Favicon', 'tidy' ),
		'desc' => 'Please upload .ico image.',
		'id' => 'favicon',
		'std' => '',
		'type' => 'upload');

	// Site title
	$options[] = array(
		'name' => __( 'Site Title', 'tidy' ),
		'desc' => '',
		'id' => 'general-header-site-title',
		'std' => get_bloginfo( 'name' ),
		'type' => 'text');

	// Tagline
	$options[] = array(
		'name' => __( 'Tagline', 'tidy' ),
		'desc' => '',
		'id' => 'general-header-site-tagline',
		'std' => get_bloginfo( 'description' ),
		'type' => 'text');

	// Text Input for Header text
	$options[] = array(
		'name' => __( 'Header text', 'tidy' ),
		'desc' => '',
		'id' => 'header_text',
		'std' => $tidy_default['header_text'],
		'type' => 'text');

	// Text Input for About text
	$options[] = array(
		'name' => __( 'About text', 'tidy' ),
		'desc' => '',
		'id' => 'about_text',
		'std' => '',
		'type' => 'textarea');

	// Copyright
	$options[] = array(
		'name' => __( 'Copyright', 'tidy' ),
		'desc' => '',
		'id' => 'copyright',
		'std' => $tidy_default['copyright'],
		'type' => 'text');

	/**
	 * Color Settings.
	 */
	$options[] = array(
		'name' => __( 'Color Settings', 'tidy' ),
		'icon' => 'admin-appearance',
		'type' => 'heading');

	// Header color settings (info)
	$options[] = array(
		'name' => __( 'Header color settings', 'tidy' ),
		'type' => 'info');

	// = Color Picker for header background color.
	$options[] = array(
		'name' => __( 'Header background color', 'tidy' ),
		'desc' => '',
		'id' => 'header_bg_color',
		'std' => $tidy_default['header_bg_color'],
		'class' => 'customcolor',
		'type' => 'color' );

	// = Color Picker for header text color.
	$options[] = array(
		'name' => __( 'Header text color', 'tidy' ),
		'desc' => '',
		'id' => 'header_text_color',
		'std' => $tidy_default['header_text_color'],
		'class' => 'customcolor',
		'type' => 'color' );

	// = Color Picker for header anchor color.
	$options[] = array(
		'name' => __( 'Header anchor color', 'tidy' ),
		'desc' => '',
		'id' => 'header_anchor_color',
		'std' => $tidy_default['header_anchor_color'],
		'class' => 'customcolor',
		'type' => 'color' );

	// = Color Picker for header border color.
	$options[] = array(
		'name' => __( 'Header border color', 'tidy' ),
		'desc' => '',
		'id' => 'header_border_color',
		'std' => $tidy_default['header_border_color'],
		'class' => 'customcolor',
		'type' => 'color' );

	// = Color Picker for header widget background color.
	$options[] = array(
		'name' => __( 'Header widget background color', 'tidy' ),
		'desc' => '',
		'id' => 'header_widget_bg_color',
		'std' => $tidy_default['header_widget_bg_color'],
		'class' => 'customcolor',
		'type' => 'color' );

	// = Color Picker for header widget text color.
	$options[] = array(
		'name' => __( 'Header widget text color', 'tidy' ),
		'desc' => '',
		'id' => 'header_widget_text_color',
		'std' => $tidy_default['header_widget_text_color'],
		'class' => 'customcolor',
		'type' => 'color' );

	// = Color Picker for header widget anchor color.
	$options[] = array(
		'name' => __('Header widget anchor color', 'tidy'),
		'desc' => '',
		'id' => 'header_widget_anchor_color',
		'std' => $tidy_default['header_widget_anchor_color'],
		'class' => 'customcolor',
		'type' => 'color' );

	// Main color Settings (info)
	$options[] = array(
		'name' => __( 'Main color settings', 'tidy' ),
		'type' => 'info');

	// = Color Picker for main background color.
	$options[] = array(
		'name' => __( 'Main background color', 'tidy' ),
		'desc' => '',
		'id' => 'main_bg_color',
		'std' => $tidy_default['main_bg_color'],
		'class' => 'customcolor',
		'type' => 'color' );

	// = Color Picker for main text color.
	$options[] = array(
		'name' => __('Main text color', 'tidy'),
		'desc' => '',
		'id' => 'main_text_color',
		'std' => $tidy_default['main_text_color'],
		'class' => 'customcolor',
		'type' => 'color' );

	// = Color Picker for main anchor color.
	$options[] = array(
		'name' => __('Main anchor color', 'tidy'),
		'desc' => '',
		'id' => 'main_anchor_color',
		'std' => $tidy_default['main_anchor_color'],
		'class' => 'customcolor',
		'type' => 'color' );

	// = Color Picker for main border color.
	$options[] = array(
		'name' => __('Main border color', 'tidy'),
		'desc' => '',
		'id' => 'main_border_color',
		'std' => $tidy_default['main_border_color'],
		'class' => 'customcolor',
		'type' => 'color' );

	// Image hover Settings (info)
	$options[] = array(
		'name' => __( 'Image hover settings', 'tidy' ),
		'type' => 'info');

	// = Color Picker for image hover color.
	$options[] = array(
		'name' => __('Image hover color', 'tidy'),
		'desc' => '',
		'id' => 'image_hover_color',
		'std' => $tidy_default['image_hover_color'],
		'class' => 'customcolor',
		'type' => 'color' );

	// = Image hover opacity.
	$options[] = array(
		'name' => __('Image hover opacity', 'tidy'),
		'desc' => '',
		'id' => 'image_hover_opacity',
		'std' => $tidy_default['image_hover_opacity'],
		'class' => 'mini',
		'type' => 'text' );

/*
	// = Color Picker for image hover text.
	$options[] = array(
		'name' => __('Image hover text color', 'tidy'),
		'desc' => '',
		'id' => 'image_hover_text',
		'std' => $tidy_default['image_hover_text'],
		'class' => 'customcolor',
		'type' => 'color' );
*/

	// Widget color Settings (info)
	$options[] = array(
		'name' => __( 'Widget color settings', 'tidy' ),
		'type' => 'info');

	// = Color Picker for widget background color.
	$options[] = array(
		'name' => __( 'Widget background color', 'tidy' ),
		'desc' => '',
		'id' => 'widget_bg_color',
		'std' => $tidy_default['widget_bg_color'],
		'class' => 'customcolor',
		'type' => 'color' );

	// = Color Picker for widget title color.
	$options[] = array(
		'name' => __('Widgte title color', 'tidy'),
		'desc' => '',
		'id' => 'widget_title_color',
		'std' => $tidy_default['widget_title_color'],
		'class' => 'customcolor',
		'type' => 'color' );

	// = Color Picker for widget text color.
	$options[] = array(
		'name' => __('Widget text color', 'tidy'),
		'desc' => '',
		'id' => 'widget_text_color',
		'std' => $tidy_default['widget_text_color'],
		'class' => 'customcolor',
		'type' => 'color' );

	// = Color Picker for widget anchor color.
	$options[] = array(
		'name' => __('Widget anchor color', 'tidy'),
		'desc' => '',
		'id' => 'widget_anchor_color',
		'std' => $tidy_default['widget_anchor_color'],
		'class' => 'customcolor',
		'type' => 'color' );

	// = Color Picker for widget border color.
	$options[] = array(
		'name' => __('Widget border color', 'tidy'),
		'desc' => '',
		'id' => 'widget_border_color',
		'std' => $tidy_default['widget_border_color'],
		'class' => 'customcolor',
		'type' => 'color' );

	// Footer color Settings (info)
	$options[] = array(
		'name' => __( 'Footer color settings', 'tidy' ),
		'type' => 'info');

	// = Color Picker for footer background color.
	$options[] = array(
		'name' => __('Footer background color', 'tidy'),
		'desc' => '',
		'id' => 'footer_bg_color',
		'std' => $tidy_default['footer_bg_color'],
		'class' => 'customcolor',
		'type' => 'color' );

	// = Color Picker for footer title color.
	$options[] = array(
		'name' => __('Footer title color', 'tidy'),
		'desc' => '',
		'id' => 'footer_title_color',
		'std' => $tidy_default['footer_title_color'],
		'class' => 'customcolor',
		'type' => 'color' );

	// = Color Picker for footer text color.
	$options[] = array(
		'name' => __('Footer text color', 'tidy'),
		'desc' => '',
		'id' => 'footer_text_color',
		'std' => $tidy_default['footer_text_color'],
		'class' => 'customcolor',
		'type' => 'color' );

	// = Color Picker for footer anchor color.
	$options[] = array(
		'name' => __('Footer anchor color', 'tidy'),
		'desc' => '',
		'id' => 'footer_anchor_color',
		'std' => $tidy_default['footer_anchor_color'],
		'class' => 'customcolor',
		'type' => 'color' );

	// = Color Picker for footer border color.
	$options[] = array(
		'name' => __('Footer border color', 'tidy'),
		'desc' => '',
		'id' => 'footer_border_color',
		'std' => $tidy_default['footer_border_color'],
		'class' => 'customcolor',
		'type' => 'color' );

	// = Color Picker for footer all categories background color.
	$options[] = array(
		'name' => __('All categories background color', 'tidy'),
		'desc' => '',
		'id' => 'footer_category_bg_color',
		'std' => $tidy_default['footer_category_bg_color'],
		'class' => 'customcolor',
		'type' => 'color' );

	// = Color Picker for footer all categories title color.
	$options[] = array(
		'name' => __('All categories title color', 'tidy'),
		'desc' => '',
		'id' => 'footer_category_title_color',
		'std' => $tidy_default['footer_category_title_color'],
		'class' => 'customcolor',
		'type' => 'color' );

	// = Color Picker for footer all categories text color.
	$options[] = array(
		'name' => __('All categories text color', 'tidy'),
		'desc' => '',
		'id' => 'footer_category_text_color',
		'std' => $tidy_default['footer_category_text_color'],
		'class' => 'customcolor',
		'type' => 'color' );

	// = Color Picker for footer all categories anchor color.
	$options[] = array(
		'name' => __('All categories anchor color', 'tidy'),
		'desc' => '',
		'id' => 'footer_category_anchor_color',
		'std' => $tidy_default['footer_category_anchor_color'],
		'class' => 'customcolor',
		'type' => 'color' );

	// = Color Picker for footer all categories border color.
	$options[] = array(
		'name' => __('All categories border color', 'tidy'),
		'desc' => '',
		'id' => 'footer_category_border_color',
		'std' => $tidy_default['footer_category_border_color'],
		'class' => 'customcolor',
		'type' => 'color' );

	// = Color Picker for copyright background color.
	$options[] = array(
		'name' => __('Copyright background color', 'tidy'),
		'desc' => '',
		'id' => 'copyright_bg_color',
		'std' => $tidy_default['copyright_bg_color'],
		'class' => 'customcolor',
		'type' => 'color' );

	// = Color Picker for copyright text color.
	$options[] = array(
		'name' => __('Copyright text color', 'tidy'),
		'desc' => '',
		'id' => 'copyright_text_color',
		'std' => $tidy_default['copyright_text_color'],
		'class' => 'customcolor',
		'type' => 'color' );

	/**
	 * Layout Settings.
	 */
	$options[] = array(
		'name' => __('Layout Settings', 'tidy'),
		'icon' => 'welcome-widgets-menus',
		'type' => 'heading');

	// Responsive
	$options[] = array(
		'name' => __( 'Responsive', 'tidy' ),
		'desc' => '',
		'id' => 'responsive_style',
		'std' => '1',
		'type' => 'toggle');
		
	
	// tab head
	$layouttabs = array(
		__( 'Home Layout', 'tidy' ),
		__( 'All Blog Layout', 'tidy' ),
		__( 'All Portfolio Layout', 'tidy' ),
		__( 'Archive and Search result', 'tidy' ),
		__( 'Pages Layout', 'tidy' ),
		__( 'Contact Layout', 'tidy' )
	);
	$options[] = array(
		'id' => 'layout-tab-head',
		'tab' => $layouttabs,
		'type' => 'tabhead'
	);

	// Home Layout (info)
	$options[] = array(
		'id' => 'ltab-0',
		'class' => "start",
		'type' => 'tabcontent'
	);

	$options[] = array(
		'name' => __( 'Select layout', 'tidy' ),
		'desc' => '',
		'id' => "home_c",
		'std' => "cont_s2",
		'type' => "images",
		'options' => array(
			'cont_c1' => $imagepath . '1col.png',
			'cont_s1' => $imagepath . '2cl.png',
			'cont_s2' => $imagepath . '2cr.png'
		)
	);
	
	$options[] = array(
		'name' => __( 'Blog area', 'tidy' ),
		'desc' => '',
		'type' => 'info'
	);

	$options[] = array(
		'name' => __( 'Number to display', 'tidy' ),
		'id' => 'home_blog_num',
		'std' => $posts_per_page,
		'class' => 'mini',
		'type' => 'text');

	$options[] = array(
		'name' => __( 'Title', 'tidy' ),
		'id' => 'home_blog_title',
		'std' => __( 'Blog', 'tidy' ),
		'type' => 'text');

	$options[] = array(
		'name' => __('Icon', 'tidy'),
		'desc' => '',
		'id' => 'home_blog_icon',
		'std' => 'pencil',
		'type' => 'select',
		'class' => 'mnicon mini arc_icon',
		'options' => $icon_array);

	$options[] = array(
		'name' => __( 'Portfolio area', 'tidy' ),
		'desc' => '',
		'type' => 'info'
	);

	$options[] = array(
		'name' => __( 'Number to display', 'tidy' ),
		'id' => 'home_port_num',
		'std' => $posts_per_page,
		'class' => 'mini',
		'type' => 'text');

	$options[] = array(
		'name' => __( 'Title', 'tidy' ),
		'id' => 'home_port_title',
		'std' => __( 'Portfolio', 'tidy' ),
		'type' => 'text');

	$options[] = array(
		'name' => __('Icon', 'tidy'),
		'desc' => '',
		'id' => 'home_port_icon',
		'std' => 'notebook',
		'type' => 'select',
		'class' => 'mnicon mini arc_icon',
		'options' => $icon_array);

	$options[] = array(
		'id' => 'ltab-0',
		'class' => "end",
		'type' => 'tabcontent'
	);


	// Blog Archive Layout (info)
	$options[] = array(
		'id' => 'ltab-1',
		'class' => "start",
		'type' => 'tabcontent'
	);

	$options[] = array(
		'name' => __( 'Select layout', 'tidy' ),
		'desc' => '',
		'id' => "blog_c",
		'std' => "cont_s2",
		'type' => "images",
		'options' => array(
			'cont_c1' => $imagepath . '1col.png',
			'cont_s1' => $imagepath . '2cl.png',
			'cont_s2' => $imagepath . '2cr.png'
		)
	);


	$options[] = array(
		'name' => __( 'Select text location', 'tidy' ),
		'desc' => '',
		'id' => "blog_type",
		'std' => "typeA",
		'type' => "images",
		'options' => array(
			'typeA' => $imagepath . 'typeA.png',
			'typeB' => $imagepath . 'typeB.png',
		)
	);


	$options[] = array(
		'id' => 'ltab-1',
		'class' => "end",
		'type' => 'tabcontent'
	);

	// All Portfolio Layout (info)
	$options[] = array(
		'id' => 'ltab-2',
		'class' => "start",
		'type' => 'tabcontent'
	);
	
	$options[] = array(
		'name' => __( 'Select archive layout', 'tidy' ),
		'desc' => '',
		'id' => "port_c",
		'std' => "cont_s2",
		'type' => "images",
		'options' => array(
			'cont_c1' => $imagepath . '1col.png',
			'cont_s1' => $imagepath . '2cl.png',
			'cont_s2' => $imagepath . '2cr.png'
		)
	);

	$options[] = array(
		'name' => __('Select Column Number', 'tidy'),
		'desc' => '',
		'id' => 'port_cont_c',
		'std' => '1',
		'type' => 'select',
		'class' => 'mini',
		'options' => $column_array);

	$options[] = array(
		'name' => __( 'Select display pattern', 'tidy' ),
		'desc' => '',
		'id' => "port_d",
		'std' => "normal",
		'type' => "images",
		'options' => array(
			'normal' => $imagepath . 'normal.png',
			'grid' => $imagepath . 'grid.png'
		)
	);

	$options[] = array(
		'name' => __('Select display pattern', 'tidy'),
		'id' => 'port_content',
		'std' => 'type1',
		'type' => 'radio',
		'options' => array(
			'type1' => __('Only image', 'tidy'),
			'type2' => __('Image with title', 'tidy'),
			'type3' => __('Image with title and text', 'tidy')
		)
	);
	$options[] = array(
		'name' => __('Number to display', 'tidy'),
		'id' => 'port_num',
		'std' => $posts_per_page,
		'class' => 'mini',
		'type' => 'text');

	$options[] = array(
		'name' => __('Title', 'tidy'),
		'id' => 'port_title',
		'std' => __( 'Portfolio', 'tidy' ),
		'type' => 'text');

	$options[] = array(
		'name' => __('Icon', 'tidy'),
		'desc' => '',
		'id' => 'port_icon',
		'std' => 'notebook',
		'type' => 'select',
		'class' => 'mnicon mini arc_icon',
		'options' => $icon_array);

	$options[] = array(
		'id' => 'ltab-2',
		'class' => "end",
		'type' => 'tabcontent'
	);

	// Archive and Search result Layout (info)
	$options[] = array(
		'id' => 'ltab-3',
		'class' => "start",
		'type' => 'tabcontent'
	);

	$options[] = array(
		'name' => __( 'Select layout', 'tidy' ),
		'desc' => '',
		'id' => "arc_c",
		'std' => "cont_s2",
		'type' => "images",
		'options' => array(
			'cont_c1' => $imagepath . '1col.png',
			'cont_s1' => $imagepath . '2cl.png',
			'cont_s2' => $imagepath . '2cr.png'
		)
	);
	
	$options[] = array(
		'name' => __('Number to display', 'tidy'),
		'id' => 'arc_num',
		'std' => $posts_per_page,
		'class' => 'mini',
		'type' => 'text');
	
	$options[] = array(
		'name' => __('Archive title', 'tidy'),
		'id' => 'arc_title',
		'std' => __( 'Blog Archive', 'tidy' ),
		'type' => 'text');

	$options[] = array(
		'name' => __('Icon', 'tidy'),
		'desc' => '',
		'id' => 'arc_icon',
		'std' => 'pencil',
		'type' => 'select',
		'class' => 'mnicon mini arc_icon',
		'options' => $icon_array);

	$options[] = array(
		'name' => __('Search Result title', 'tidy'),
		'id' => 'ser_title',
		'desc' => '%s : Search keywords.',
		'std' => __( 'Search Results for: %s', 'tidy' ),
		'type' => 'text');

	$options[] = array(
		'name' => __('Icon', 'tidy'),
		'desc' => '',
		'id' => 'ser_icon',
		'std' => 'search',
		'type' => 'select',
		'class' => 'mnicon mini arc_icon',
		'options' => $icon_array);

	$options[] = array(
		'id' => 'ltab-3',
		'class' => "end",
		'type' => 'tabcontent'
	);

	// Posts and Pages Layout (info)
	$options[] = array(
		'id' => 'ltab-4',
		'class' => "start",
		'type' => 'tabcontent'
	);

	$options[] = array(
		'name' => __( 'Select layout', 'tidy' ),
		'desc' => '',
		'id' => "post_c",
		'std' => "cont_s2",
		'type' => "images",
		'options' => array(
			'cont_c1' => $imagepath . '1col.png',
			'cont_s1' => $imagepath . '2cl.png',
			'cont_s2' => $imagepath . '2cr.png'
		)
	);

	$options[] = array(
		'id' => 'ltab-4',
		'class' => "end",
		'type' => 'tabcontent'
	);

	// Contact Layout (info)
	$options[] = array(
		'id' => 'ltab-5',
		'class' => "start",
		'type' => 'tabcontent'
	);

	$options[] = array(
		'name' => __( 'Select layout', 'tidy' ),
		'desc' => __( 'A = page content area.', 'tidy' ),
		'id' => "cont_c",
		'std' => "cont_c1",
		'type' => "images",
		'options' => array(
			'cont_c1' => $imagepath . 'cont_c1.png',
			'cont_c2' => $imagepath . 'cont_c2.png',
			'cont_c3' => $imagepath . 'cont_c3.png',
			'cont_s1' => $imagepath . 'cont_s1.png',
			'cont_s2' => $imagepath . 'cont_s2.png'
		)
	);

	/**
	 * For $settings options see:
	 * http://codex.wordpress.org/Function_Reference/wp_editor
	 *
	 * 'media_buttons' are not supported as there is no post to attach items to
	 * 'textarea_name' is set by the 'id' you choose
	 */

	$wp_editor_settings = array(
		'wpautop' => true, // Default
		'textarea_rows' => 5,
		'tinymce' => array( 'plugins' => 'wordpress' )
	);

	$options[] = array(
		'name' => __('Area B', 'tidy'),
		'desc' => '',
		'id' => 'cont_b',
		'type' => 'info'
	);
	$options[] = array(
		'name' => __('Area B Title', 'tidy'),
		'desc' => '',
		'id' => 'cont_b_title',
		'type' => 'text'
	);
	$options[] = array(
		'name' => __('Area B conents', 'tidy'),
		'desc' => '',
		'id' => 'cont_b_text',
		'type' => 'editor',
		'settings' => $wp_editor_settings );

	$options[] = array(
		'name' => __('Area C', 'tidy'),
		'desc' => '',
		'id' => 'cont_c',
		'type' => 'info'
	);
	$options[] = array(
		'name' => __('Area C Title', 'tidy'),
		'desc' => '',
		'id' => 'cont_c_title',
		'type' => 'text'
	);
	$options[] = array(
		'name' => __('Area C conents', 'tidy'),
		'desc' => '',
		'id' => 'cont_c_text',
		'type' => 'editor',
		'settings' => $wp_editor_settings );

	$options[] = array(
		'id' => 'ltab-5',
		'class' => "end",
		'type' => 'tabcontent'
	);


/*
	$options[] = array(
		'name' =>  __('Example Background', 'tidy'),
		'desc' => __('Change the background CSS.', 'tidy'),
		'id' => 'example_background',
		'std' => $background_defaults,
		'type' => 'background' );

	$options[] = array(
		'name' => __('Multicheck', 'tidy'),
		'desc' => __('Multicheck description.', 'tidy'),
		'id' => 'example_multicheck',
		'std' => $multicheck_defaults, // These items get checked by default
		'type' => 'multicheck',
		'options' => $multicheck_array);


	$options[] = array( 'name' => __('Typography', 'tidy'),
		'desc' => __('Example typography.', 'tidy'),
		'id' => "example_typography",
		'std' => $typography_defaults,
		'type' => 'typography' );

	$options[] = array(
		'name' => __('Custom Typography', 'tidy'),
		'desc' => __('Custom typography options.', 'tidy'),
		'id' => "custom_typography",
		'std' => $typography_defaults,
		'type' => 'typography',
		'options' => $typography_options );

	$options[] = array(
		'name' => __('Input Text Mini', 'tidy'),
		'desc' => __('A mini text input field.', 'tidy'),
		'id' => 'example_text_mini',
		'std' => 'Default',
		'class' => 'mini',
		'type' => 'text');

	$options[] = array(
		'name' => __('Input Text', 'tidy'),
		'desc' => __('A text input field.', 'tidy'),
		'id' => 'example_text',
		'std' => 'Default Value',
		'type' => 'text');


	$options[] = array(
		'name' => __('Input Select Small', 'tidy'),
		'desc' => __('Small Select Box.', 'tidy'),
		'id' => 'example_select',
		'std' => 'three',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'options' => $test_array);

	$options[] = array(
		'name' => __('Input Select Wide', 'tidy'),
		'desc' => __('A wider select box.', 'tidy'),
		'id' => 'example_select_wide',
		'std' => 'two',
		'type' => 'select',
		'options' => $test_array);

	if ( $options_categories ) {
	$options[] = array(
		'name' => __('Select a Category', 'tidy'),
		'desc' => __('Passed an array of categories with cat_ID and cat_name', 'tidy'),
		'id' => 'example_select_categories',
		'type' => 'select',
		'options' => $options_categories);
	}

	if ( $options_tags ) {
	$options[] = array(
		'name' => __('Select a Tag', 'options_check'),
		'desc' => __('Passed an array of tags with term_id and term_name', 'options_check'),
		'id' => 'example_select_tags',
		'type' => 'select',
		'options' => $options_tags);
	}

	$options[] = array(
		'name' => __('Select a Page', 'tidy'),
		'desc' => __('Passed an pages with ID and post_title', 'tidy'),
		'id' => 'example_select_pages',
		'type' => 'select',
		'options' => $options_pages);

	$options[] = array(
		'name' => __('Input Radio (one)', 'tidy'),
		'desc' => __('Radio select with default options "one".', 'tidy'),
		'id' => 'example_radio',
		'std' => 'one',
		'type' => 'radio',
		'options' => $test_array);

	$options[] = array(
		'name' => __('Input Checkbox', 'tidy'),
		'desc' => __('Example checkbox, defaults to true.', 'tidy'),
		'id' => 'example_checkbox',
		'std' => '1',
		'type' => 'checkbox');
*/

	/**
	 * Merit Box Settings.
	 */
	$options[] = array(
		'name' => __('Merit Box Settings', 'tidy'),
		'icon' => 'images-alt2',
		'type' => 'heading');

	$options[] = array(
		'name' => __('Number of box to show ', 'tidy'),
		'desc' => __('Default:4, Min:1, Max:4.', 'tidy'),
		'id' => 'merit-box-num',
		'std' => 1,
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'options' => array(
			1 => 1,
			2 => 2,
			3 => 3,
			4 => 4
		)
	);

	// Merit box %s
	for ($i = 1; $i <= 4; $i++) {

		$options[] = array(
			'name' => sprintf( __('Merit box %s', 'tidy') , $i),
			'id' => 'merit-box-' . $i . '-head',
			'class' => 'merit-box-' . $i,
			'type' => 'info');

		$options[] = array(
			'name' => __('Title', 'tidy'),
			'id' => 'merit-box-' . $i . '-title',
			'std' => 'merit-box-' . $i . '-title',
			'class' => 'merit-box-' . $i,
			'type' => 'text');

		$options[] = array(
			'name' => __('Textarea', 'tidy'),
			'desc' => '',
			'id' => 'merit-box-' . $i . '-description',
			'std' => 'merit-box-' . $i . '-description',
			'class' => 'merit-box-' . $i,
			'type' => 'textarea');
	
		$options[] = array(
			'name' => __('Icon', 'tidy'),
			'desc' => '',
			'id' => 'merit-box-' . $i . '-icon',
			'std' => 'copy',
			'type' => 'select',
			'class' => 'mnicon mini merit-box-' . $i,
			'options' => $icon_array);
	
		$options[] = array(
			'name' => __('Image', 'tidy'),
			'desc' => __('Image will override any icon.', 'tidy'),
			'id' => 'merit-box-' . $i . '-image',
			'class' => 'merit-box-' . $i,
			'type' => 'upload');

		$options[] = array(
			'name' => __('URL', 'tidy'),
			'id' => 'merit-box-' . $i . '-url',
			'std' => '',
			'class' => 'merit-box-' . $i,
			'type' => 'text');
	}

	/**
	 * Social Settings.
	 */
	$options[] = array(
		'name' => __('Social Settings', 'tidy'),
		'icon' => 'share',
		'type' => 'heading');

	$options[] = array(
		'name' => __('Social Icon setting', 'tidy'),
		'desc' => '',
		'id' => 'sns-icon',
		'std' => '',
		'type' => 'info');

	$options[] = array(
		'name' => __('Frame', 'tidy'),
		'desc' => '',
		'id' => 'sns-icon-frame',
		'std' => '1',
		'type' => 'toggle');

	$options[] = array(
		'name' => __('Header icon color', 'tidy'),
		'desc' => '',
		'id' => 'sns-icon-color-header',
		'std' => '#0058AE',
		'type' => 'color' );

	$options[] = array(
		'name' => __('Footer icon color', 'tidy'),
		'desc' => '',
		'id' => 'sns-icon-color-footer',
		'std' => '#ffffff',
		'type' => 'color' );

	$options[] = array(
		'name' => __('Display location', 'tidy'),
		'desc' => '',
		'id' => 'sns-location',
		'std' => '',
		'type' => 'info');

	$options[] = array(
		'name' => __('Header', 'tidy'),
		'desc' => '',
		'id' => 'sns-location-header',
		'std' => '1',
		'type' => 'toggle');

	$options[] = array(
		'name' => __('Footer', 'tidy'),
		'desc' => '',
		'id' => 'sns-location-footer',
		'std' => '1',
		'type' => 'toggle');

	$options[] = array(
		'name' => __('You\'re SNS address', 'tidy'),
		'desc' => '',
		'id' => 'sns-addr',
		'std' => '',
		'type' => 'info');

	$options[] = array(
		'name' => __('E-mail', 'tidy'),
		'desc' => __('You\'re E-mail address.', 'tidy'),
		'id' => 'email',
		'std' => '',
		'type' => 'email');

	$sns_array = tidy_sns_array();
	if ( ! empty( $sns_array )) {
		foreach( $sns_array as $key=>$val ) {
			$options[] = array(
				'name' => $key,
				'desc' => sprintf( __('You\'re %s address.', 'tidy'), $key ),
				'id' => $val,
				'account' => '',
				'toggle' => false,
				'type' => 'sns');
		}
	}

	return $options;
}

// overwride
add_action( 'optionsframework_after_validate', 'optionsframework_after_validate_overwride' );
function optionsframework_after_validate_overwride( $clean ) {
	$customizer_key = tidy_customizer_array();
	foreach( $clean as $k => $v ){
		if ( $k == 'general-header-site-title' ) {
			update_option( 'blogname', $v );
		} elseif ( $k == 'general-header-site-tagline' ) {
			update_option( 'blogdescription', $v );
		} elseif ( in_array( $k, $customizer_key ) ) {
			set_theme_mod( $k, $v );
		}
	}
	return $clean;
}

add_filter( 'optionsframework_std', 'tidy_optionsframework_std', 10, 3);
function tidy_optionsframework_std( $option_name, $value, $val ) {
	if ( ! array_key_exists( 'id', $value ) )
		return $val;

	$customizer_key = tidy_customizer_array();

	if ( $value['id'] == 'general-header-site-title' ) {
		$val = get_bloginfo( 'name' );
	} elseif ( $value['id'] == 'general-header-site-tagline' ) {
		$val = get_bloginfo( 'description' );
	} elseif ( in_array( $value['id'], $customizer_key ) ) {
		$val = $value['std'];
		$d = get_theme_mods();
		$val = (isset($d[$value['id']])) ? $d[$value['id']] : $value['std'];
	}

	return $val;
}

// favicon
add_action( 'wp_head', 'tidy_favicon' );
add_action( 'admin_head', 'tidy_favicon' );
function tidy_favicon() {
	$favicon = get_theme_mod( 'favicon' );
	if ( $favicon ) {
		$link = '<link rel="Shortcut Icon" type="image/x-icon" href="%s" />'."\n";
		printf( $link, esc_url( $favicon ) );
	}
}
