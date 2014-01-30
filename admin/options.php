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
		'home' => _x( 'Home', 'Icon name', 'tidy' ),
		'home2' => _x( 'Home2', 'Icon name', 'tidy' ),
		'home3' => _x( 'Home3', 'Icon name', 'tidy' ),
		'office' => _x( 'Office', 'Icon name', 'tidy' ),
		'newspaper' => _x( 'Newspaper', 'Icon name', 'tidy' ),
		'pencil' => _x( 'Pencil', 'Icon name', 'tidy' ),
		'pencil2' => _x( 'Pencil2', 'Icon name', 'tidy' ),
		'quill' => _x( 'Quill', 'Icon name', 'tidy' ),
		'pen' => _x( 'Pen', 'Icon name', 'tidy' ),
		'blog' => _x( 'Blog', 'Icon name', 'tidy' ),
		'droplet' => _x( 'Droplet', 'Icon name', 'tidy' ),
		'paint-format' => _x( 'Paint Format', 'Icon name', 'tidy' ),
		'image' => _x( 'Image', 'Icon name', 'tidy' ),
		'image2' => _x( 'Image2', 'Icon name', 'tidy' ),
		'images' => _x( 'Images', 'Icon name', 'tidy' ),
		'camera' => _x( 'Camera', 'Icon name', 'tidy' ),
		'music' => _x( 'Music', 'Icon name', 'tidy' ),
		'headphones' => _x( 'Headphones', 'Icon name', 'tidy' ),
		'play' => _x( 'Play', 'Icon name', 'tidy' ),
		'film' => _x( 'Film', 'Icon name', 'tidy' ),
		'camera2' => _x( 'Camera2', 'Icon name', 'tidy' ),
		'dice' => _x( 'Dice', 'Icon name', 'tidy' ),
		'pacman' => _x( 'Pacman', 'Icon name', 'tidy' ),
		'spades' => _x( 'Spades', 'Icon name', 'tidy' ),
		'clubs' => _x( 'Clubs', 'Icon name', 'tidy' ),
		'diamonds' => _x( 'Diamonds', 'Icon name', 'tidy' ),
		'pawn' => _x( 'Pawn', 'Icon name', 'tidy' ),
		'bullhorn' => _x( 'Bullhorn', 'Icon name', 'tidy' ),
		'connection' => _x( 'Connection', 'Icon name', 'tidy' ),
		'podcast' => _x( 'Podcast', 'Icon name', 'tidy' ),
		'feed' => _x( 'Feed', 'Icon name', 'tidy' ),
		'book' => _x( 'Book', 'Icon name', 'tidy' ),
		'books' => _x( 'Books', 'Icon name', 'tidy' ),
		'library' => _x( 'Library', 'Icon name', 'tidy' ),
		'file' => _x( 'File', 'Icon name', 'tidy' ),
		'profile' => _x( 'Profile', 'Icon name', 'tidy' ),
		'file2' => _x( 'File2', 'Icon name', 'tidy' ),
		'file3' => _x( 'File3', 'Icon name', 'tidy' ),
		'file4' => _x( 'File4', 'Icon name', 'tidy' ),
		'copy' => _x( 'Copy', 'Icon name', 'tidy' ),
		'copy2' => _x( 'Copy2', 'Icon name', 'tidy' ),
		'copy3' => _x( 'Copy3', 'Icon name', 'tidy' ),
		'paste' => _x( 'Paste', 'Icon name', 'tidy' ),
		'paste2' => _x( 'Paste2', 'Icon name', 'tidy' ),
		'paste3' => _x( 'Paste3', 'Icon name', 'tidy' ),
		'stack' => _x( 'Stack', 'Icon name', 'tidy' ),
		'folder' => _x( 'Folder', 'Icon name', 'tidy' ),
		'folder-open' => _x( 'Folder Open', 'Icon name', 'tidy' ),
		'tag' => _x( 'Tag', 'Icon name', 'tidy' ),
		'tags' => _x( 'Tags', 'Icon name', 'tidy' ),
		'barcode' => _x( 'Barcode', 'Icon name', 'tidy' ),
		'qrcode' => _x( 'Qrcode', 'Icon name', 'tidy' ),
		'ticket' => _x( 'Ticket', 'Icon name', 'tidy' ),
		'cart' => _x( 'Cart', 'Icon name', 'tidy' ),
		'cart2' => _x( 'Cart2', 'Icon name', 'tidy' ),
		'cart3' => _x( 'Cart3', 'Icon name', 'tidy' ),
		'coin' => _x( 'Coin', 'Icon name', 'tidy' ),
		'credit' => _x( 'Credit', 'Icon name', 'tidy' ),
		'calculate' => _x( 'Calculate', 'Icon name', 'tidy' ),
		'support' => _x( 'Support', 'Icon name', 'tidy' ),
		'phone' => _x( 'Phone', 'Icon name', 'tidy' ),
		'phone-hang-up' => _x( 'Phone Hang Up', 'Icon name', 'tidy' ),
		'address-book' => _x( 'Address Book', 'Icon name', 'tidy' ),
		'notebook' => _x( 'Notebook', 'Icon name', 'tidy' ),
		'envelope' => _x( 'Envelope', 'Icon name', 'tidy' ),
		'pushpin' => _x( 'Pushpin', 'Icon name', 'tidy' ),
		'location' => _x( 'Location', 'Icon name', 'tidy' ),
		'location2' => _x( 'Location2', 'Icon name', 'tidy' ),
		'compass' => _x( 'Compass', 'Icon name', 'tidy' ),
		'map' => _x( 'Map', 'Icon name', 'tidy' ),
		'map2' => _x( 'Map2', 'Icon name', 'tidy' ),
		'history' => _x( 'History', 'Icon name', 'tidy' ),
		'clock' => _x( 'Clock', 'Icon name', 'tidy' ),
		'clock2' => _x( 'Clock2', 'Icon name', 'tidy' ),
		'alarm' => _x( 'Alarm', 'Icon name', 'tidy' ),
		'alarm2' => _x( 'Alarm2', 'Icon name', 'tidy' ),
		'bell' => _x( 'Bell', 'Icon name', 'tidy' ),
		'stopwatch' => _x( 'Stopwatch', 'Icon name', 'tidy' ),
		'calendar' => _x( 'Calendar', 'Icon name', 'tidy' ),
		'calendar2' => _x( 'Calendar2', 'Icon name', 'tidy' ),
		'print' => _x( 'Print', 'Icon name', 'tidy' ),
		'keyboard' => _x( 'Keyboard', 'Icon name', 'tidy' ),
		'screen' => _x( 'Screen', 'Icon name', 'tidy' ),
		'laptop' => _x( 'Laptop', 'Icon name', 'tidy' ),
		'mobile' => _x( 'Mobile', 'Icon name', 'tidy' ),
		'mobile2' => _x( 'Mobile2', 'Icon name', 'tidy' ),
		'tablet' => _x( 'Tablet', 'Icon name', 'tidy' ),
		'tv' => _x( 'Tv', 'Icon name', 'tidy' ),
		'cabinet' => _x( 'Cabinet', 'Icon name', 'tidy' ),
		'drawer' => _x( 'Drawer', 'Icon name', 'tidy' ),
		'drawer2' => _x( 'Drawer2', 'Icon name', 'tidy' ),
		'drawer3' => _x( 'Drawer3', 'Icon name', 'tidy' ),
		'box-add' => _x( 'Box Add', 'Icon name', 'tidy' ),
		'box-remove' => _x( 'Box Remove', 'Icon name', 'tidy' ),
		'download' => _x( 'Download', 'Icon name', 'tidy' ),
		'upload' => _x( 'Upload', 'Icon name', 'tidy' ),
		'disk' => _x( 'Disk', 'Icon name', 'tidy' ),
		'storage' => _x( 'Storage', 'Icon name', 'tidy' ),
		'undo' => _x( 'Undo', 'Icon name', 'tidy' ),
		'redo' => _x( 'Redo', 'Icon name', 'tidy' ),
		'flip' => _x( 'Flip', 'Icon name', 'tidy' ),
		'flip2' => _x( 'Flip2', 'Icon name', 'tidy' ),
		'undo2' => _x( 'Undo2', 'Icon name', 'tidy' ),
		'redo2' => _x( 'Redo2', 'Icon name', 'tidy' ),
		'forward' => _x( 'Forward', 'Icon name', 'tidy' ),
		'reply' => _x( 'Reply', 'Icon name', 'tidy' ),
		'bubble' => _x( 'Bubble', 'Icon name', 'tidy' ),
		'bubbles' => _x( 'Bubbles', 'Icon name', 'tidy' ),
		'bubbles2' => _x( 'Bubbles2', 'Icon name', 'tidy' ),
		'bubble2' => _x( 'Bubble2', 'Icon name', 'tidy' ),
		'bubbles3' => _x( 'Bubbles3', 'Icon name', 'tidy' ),
		'bubbles4' => _x( 'Bubbles4', 'Icon name', 'tidy' ),
		'user' => _x( 'User', 'Icon name', 'tidy' ),
		'users' => _x( 'Users', 'Icon name', 'tidy' ),
		'user2' => _x( 'User2', 'Icon name', 'tidy' ),
		'users2' => _x( 'Users2', 'Icon name', 'tidy' ),
		'user3' => _x( 'User3', 'Icon name', 'tidy' ),
		'user4' => _x( 'User4', 'Icon name', 'tidy' ),
		'quotes-left' => _x( 'Quotes Left', 'Icon name', 'tidy' ),
		'busy' => _x( 'Busy', 'Icon name', 'tidy' ),
		'spinner' => _x( 'Spinner', 'Icon name', 'tidy' ),
		'spinner2' => _x( 'Spinner2', 'Icon name', 'tidy' ),
		'spinner3' => _x( 'Spinner3', 'Icon name', 'tidy' ),
		'spinner4' => _x( 'Spinner4', 'Icon name', 'tidy' ),
		'spinner5' => _x( 'Spinner5', 'Icon name', 'tidy' ),
		'spinner6' => _x( 'Spinner6', 'Icon name', 'tidy' ),
		'binoculars' => _x( 'Binoculars', 'Icon name', 'tidy' ),
		'search' => _x( 'Search', 'Icon name', 'tidy' ),
		'zoom-in' => _x( 'Zoom In', 'Icon name', 'tidy' ),
		'zoom-out' => _x( 'Zoom Out', 'Icon name', 'tidy' ),
		'expand' => _x( 'Expand', 'Icon name', 'tidy' ),
		'contract' => _x( 'Contract', 'Icon name', 'tidy' ),
		'expand2' => _x( 'Expand2', 'Icon name', 'tidy' ),
		'contract2' => _x( 'Contract2', 'Icon name', 'tidy' ),
		'key' => _x( 'Key', 'Icon name', 'tidy' ),
		'key2' => _x( 'Key2', 'Icon name', 'tidy' ),
		'lock' => _x( 'Lock', 'Icon name', 'tidy' ),
		'lock2' => _x( 'Lock2', 'Icon name', 'tidy' ),
		'unlocked' => _x( 'Unlocked', 'Icon name', 'tidy' ),
		'wrench' => _x( 'Wrench', 'Icon name', 'tidy' ),
		'settings' => _x( 'Settings', 'Icon name', 'tidy' ),
		'equalizer' => _x( 'Equalizer', 'Icon name', 'tidy' ),
		'cog' => _x( 'Cog', 'Icon name', 'tidy' ),
		'cogs' => _x( 'Cogs', 'Icon name', 'tidy' ),
		'cog2' => _x( 'Cog2', 'Icon name', 'tidy' ),
		'hammer' => _x( 'Hammer', 'Icon name', 'tidy' ),
		'wand' => _x( 'Wand', 'Icon name', 'tidy' ),
		'aid' => _x( 'Aid', 'Icon name', 'tidy' ),
		'bug' => _x( 'Bug', 'Icon name', 'tidy' ),
		'pie' => _x( 'Pie', 'Icon name', 'tidy' ),
		'stats' => _x( 'Stats', 'Icon name', 'tidy' ),
		'bars' => _x( 'Bars', 'Icon name', 'tidy' ),
		'bars2' => _x( 'Bars2', 'Icon name', 'tidy' ),
		'gift' => _x( 'Gift', 'Icon name', 'tidy' ),
		'trophy' => _x( 'Trophy', 'Icon name', 'tidy' ),
		'glass' => _x( 'Glass', 'Icon name', 'tidy' ),
		'mug' => _x( 'Mug', 'Icon name', 'tidy' ),
		'food' => _x( 'Food', 'Icon name', 'tidy' ),
		'leaf' => _x( 'Leaf', 'Icon name', 'tidy' ),
		'rocket' => _x( 'Rocket', 'Icon name', 'tidy' ),
		'meter' => _x( 'Meter', 'Icon name', 'tidy' ),
		'meter2' => _x( 'Meter2', 'Icon name', 'tidy' ),
		'dashboard' => _x( 'Dashboard', 'Icon name', 'tidy' ),
		'hammer2' => _x( 'Hammer2', 'Icon name', 'tidy' ),
		'fire' => _x( 'Fire', 'Icon name', 'tidy' ),
		'lab' => _x( 'Lab', 'Icon name', 'tidy' ),
		'magnet' => _x( 'Magnet', 'Icon name', 'tidy' ),
		'remove' => _x( 'Remove', 'Icon name', 'tidy' ),
		'remove2' => _x( 'Remove2', 'Icon name', 'tidy' ),
		'briefcase' => _x( 'Briefcase', 'Icon name', 'tidy' ),
		'airplane' => _x( 'Airplane', 'Icon name', 'tidy' ),
		'truck' => _x( 'Truck', 'Icon name', 'tidy' ),
		'road' => _x( 'Road', 'Icon name', 'tidy' ),
		'accessibility' => _x( 'Accessibility', 'Icon name', 'tidy' ),
		'target' => _x( 'Target', 'Icon name', 'tidy' ),
		'shield' => _x( 'Shield', 'Icon name', 'tidy' ),
		'lightning' => _x( 'Lightning', 'Icon name', 'tidy' ),
		'switch' => _x( 'Switch', 'Icon name', 'tidy' ),
		'power-cord' => _x( 'Power Cord', 'Icon name', 'tidy' ),
		'signup' => _x( 'Signup', 'Icon name', 'tidy' ),
		'list' => _x( 'List', 'Icon name', 'tidy' ),
		'list2' => _x( 'List2', 'Icon name', 'tidy' ),
		'numbered-list' => _x( 'Numbered List', 'Icon name', 'tidy' ),
		'menu' => _x( 'Menu', 'Icon name', 'tidy' ),
		'menu2' => _x( 'Menu2', 'Icon name', 'tidy' ),
		'tree' => _x( 'Tree', 'Icon name', 'tidy' ),
		'cloud' => _x( 'Cloud', 'Icon name', 'tidy' ),
		'cloud-download' => _x( 'Cloud Download', 'Icon name', 'tidy' ),
		'cloud-upload' => _x( 'Cloud Upload', 'Icon name', 'tidy' ),
		'download2' => _x( 'Download2', 'Icon name', 'tidy' ),
		'upload2' => _x( 'Upload2', 'Icon name', 'tidy' ),
		'download3' => _x( 'Download3', 'Icon name', 'tidy' ),
		'upload3' => _x( 'Upload3', 'Icon name', 'tidy' ),
		'globe' => _x( 'Globe', 'Icon name', 'tidy' ),
		'earth' => _x( 'Earth', 'Icon name', 'tidy' ),
		'link' => _x( 'Link', 'Icon name', 'tidy' ),
		'flag' => _x( 'Flag', 'Icon name', 'tidy' ),
		'attachment' => _x( 'Attachment', 'Icon name', 'tidy' ),
		'eye' => _x( 'Eye', 'Icon name', 'tidy' ),
		'eye-blocked' => _x( 'Eye Blocked', 'Icon name', 'tidy' ),
		'eye2' => _x( 'Eye2', 'Icon name', 'tidy' ),
		'bookmark' => _x( 'Bookmark', 'Icon name', 'tidy' ),
		'bookmarks' => _x( 'Bookmarks', 'Icon name', 'tidy' ),
		'brightness-medium' => _x( 'Brightness Medium', 'Icon name', 'tidy' ),
		'brightness-contrast' => _x( 'Brightness Contrast', 'Icon name', 'tidy' ),
		'contrast' => _x( 'Contrast', 'Icon name', 'tidy' ),
		'star' => _x( 'Star', 'Icon name', 'tidy' ),
		'star2' => _x( 'Star2', 'Icon name', 'tidy' ),
		'star3' => _x( 'Star3', 'Icon name', 'tidy' ),
		'heart' => _x( 'Heart', 'Icon name', 'tidy' ),
		'heart2' => _x( 'Heart2', 'Icon name', 'tidy' ),
		'heart-broken' => _x( 'Heart Broken', 'Icon name', 'tidy' ),
		'thumbs-up' => _x( 'Thumbs Up', 'Icon name', 'tidy' ),
		'thumbs-up2' => _x( 'Thumbs Up2', 'Icon name', 'tidy' ),
		'happy' => _x( 'Happy', 'Icon name', 'tidy' ),
		'happy2' => _x( 'Happy2', 'Icon name', 'tidy' ),
		'smiley' => _x( 'Smiley', 'Icon name', 'tidy' ),
		'smiley2' => _x( 'Smiley2', 'Icon name', 'tidy' ),
		'tongue' => _x( 'Tongue', 'Icon name', 'tidy' ),
		'tongue2' => _x( 'Tongue2', 'Icon name', 'tidy' ),
		'sad' => _x( 'Sad', 'Icon name', 'tidy' ),
		'sad2' => _x( 'Sad2', 'Icon name', 'tidy' ),
		'wink' => _x( 'Wink', 'Icon name', 'tidy' ),
		'wink2' => _x( 'Wink2', 'Icon name', 'tidy' ),
		'grin' => _x( 'Grin', 'Icon name', 'tidy' ),
		'grin2' => _x( 'Grin2', 'Icon name', 'tidy' ),
		'cool' => _x( 'Cool', 'Icon name', 'tidy' ),
		'cool2' => _x( 'Cool2', 'Icon name', 'tidy' ),
		'angry' => _x( 'Angry', 'Icon name', 'tidy' ),
		'angry2' => _x( 'Angry2', 'Icon name', 'tidy' ),
		'evil' => _x( 'Evil', 'Icon name', 'tidy' ),
		'evil2' => _x( 'Evil2', 'Icon name', 'tidy' ),
		'shocked' => _x( 'Shocked', 'Icon name', 'tidy' ),
		'shocked2' => _x( 'Shocked2', 'Icon name', 'tidy' ),
		'confused' => _x( 'Confused', 'Icon name', 'tidy' ),
		'confused2' => _x( 'Confused2', 'Icon name', 'tidy' ),
		'neutral' => _x( 'Neutral', 'Icon name', 'tidy' ),
		'neutral2' => _x( 'Neutral2', 'Icon name', 'tidy' ),
		'wondering' => _x( 'Wondering', 'Icon name', 'tidy' ),
		'wondering2' => _x( 'Wondering2', 'Icon name', 'tidy' ),
		'point-up' => _x( 'Point Up', 'Icon name', 'tidy' ),
		'point-right' => _x( 'Point Right', 'Icon name', 'tidy' ),
		'point-down' => _x( 'Point Down', 'Icon name', 'tidy' ),
		'point-left' => _x( 'Point Left', 'Icon name', 'tidy' ),
		'warning' => _x( 'Warning', 'Icon name', 'tidy' ),
		'notification' => _x( 'Notification', 'Icon name', 'tidy' ),
		'question' => _x( 'Question', 'Icon name', 'tidy' ),
		'info' => _x( 'Info', 'Icon name', 'tidy' ),
		'info2' => _x( 'Info2', 'Icon name', 'tidy' ),
		'blocked' => _x( 'Blocked', 'Icon name', 'tidy' ),
		'cancel-circle' => _x( 'Cancel Circle', 'Icon name', 'tidy' ),
		'checkmark-circle' => _x( 'Checkmark Circle', 'Icon name', 'tidy' ),
		'spam' => _x( 'Spam', 'Icon name', 'tidy' ),
		'close' => _x( 'Close', 'Icon name', 'tidy' ),
		'checkmark' => _x( 'Checkmark', 'Icon name', 'tidy' ),
		'checkmark2' => _x( 'Checkmark2', 'Icon name', 'tidy' ),
		'spell-check' => _x( 'Spell Check', 'Icon name', 'tidy' ),
		'minus' => _x( 'Minus', 'Icon name', 'tidy' ),
		'plus' => _x( 'Plus', 'Icon name', 'tidy' ),
		'enter' => _x( 'Enter', 'Icon name', 'tidy' ),
		'exit' => _x( 'Exit', 'Icon name', 'tidy' ),
		'play2' => _x( 'Play2', 'Icon name', 'tidy' ),
		'pause' => _x( 'Pause', 'Icon name', 'tidy' ),
		'stop' => _x( 'Stop', 'Icon name', 'tidy' ),
		'backward' => _x( 'Backward', 'Icon name', 'tidy' ),
		'forward2' => _x( 'Forward2', 'Icon name', 'tidy' ),
		'play3' => _x( 'Play3', 'Icon name', 'tidy' ),
		'pause2' => _x( 'Pause2', 'Icon name', 'tidy' ),
		'stop2' => _x( 'Stop2', 'Icon name', 'tidy' ),
		'backward2' => _x( 'Backward2', 'Icon name', 'tidy' ),
		'forward3' => _x( 'Forward3', 'Icon name', 'tidy' ),
		'first' => _x( 'First', 'Icon name', 'tidy' ),
		'last' => _x( 'Last', 'Icon name', 'tidy' ),
		'previous' => _x( 'Previous', 'Icon name', 'tidy' ),
		'next' => _x( 'Next', 'Icon name', 'tidy' ),
		'eject' => _x( 'Eject', 'Icon name', 'tidy' ),
		'volume-high' => _x( 'Volume High', 'Icon name', 'tidy' ),
		'volume-medium' => _x( 'Volume Medium', 'Icon name', 'tidy' ),
		'volume-low' => _x( 'Volume Low', 'Icon name', 'tidy' ),
		'volume-mute' => _x( 'Volume Mute', 'Icon name', 'tidy' ),
		'volume-mute2' => _x( 'Volume Mute2', 'Icon name', 'tidy' ),
		'volume-increase' => _x( 'Volume Increase', 'Icon name', 'tidy' ),
		'volume-decrease' => _x( 'Volume Decrease', 'Icon name', 'tidy' ),
		'loop' => _x( 'Loop', 'Icon name', 'tidy' ),
		'loop2' => _x( 'Loop2', 'Icon name', 'tidy' ),
		'loop3' => _x( 'Loop3', 'Icon name', 'tidy' ),
		'shuffle' => _x( 'Shuffle', 'Icon name', 'tidy' ),
		'arrow-up-left' => _x( 'Arrow Up Left', 'Icon name', 'tidy' ),
		'arrow-up' => _x( 'Arrow Up', 'Icon name', 'tidy' ),
		'arrow-up-right' => _x( 'Arrow Up Right', 'Icon name', 'tidy' ),
		'arrow-right' => _x( 'Arrow Right', 'Icon name', 'tidy' ),
		'arrow-down-right' => _x( 'Arrow Down Right', 'Icon name', 'tidy' ),
		'arrow-down' => _x( 'Arrow Down', 'Icon name', 'tidy' ),
		'arrow-down-left' => _x( 'Arrow Down Left', 'Icon name', 'tidy' ),
		'arrow-left' => _x( 'Arrow Left', 'Icon name', 'tidy' ),
		'arrow-up-left2' => _x( 'Arrow Up Left2', 'Icon name', 'tidy' ),
		'arrow-up2' => _x( 'Arrow Up2', 'Icon name', 'tidy' ),
		'arrow-up-right2' => _x( 'Arrow Up Right2', 'Icon name', 'tidy' ),
		'arrow-right2' => _x( 'Arrow Right2', 'Icon name', 'tidy' ),
		'arrow-down-right2' => _x( 'Arrow Down Right2', 'Icon name', 'tidy' ),
		'arrow-down2' => _x( 'Arrow Down2', 'Icon name', 'tidy' ),
		'arrow-down-left2' => _x( 'Arrow Down Left2', 'Icon name', 'tidy' ),
		'arrow-left2' => _x( 'Arrow Left2', 'Icon name', 'tidy' ),
		'arrow-up-left3' => _x( 'Arrow Up Left3', 'Icon name', 'tidy' ),
		'arrow-up3' => _x( 'Arrow Up3', 'Icon name', 'tidy' ),
		'arrow-up-right3' => _x( 'Arrow Up Right3', 'Icon name', 'tidy' ),
		'arrow-right3' => _x( 'Arrow Right3', 'Icon name', 'tidy' ),
		'arrow-down-right3' => _x( 'Arrow Down Right3', 'Icon name', 'tidy' ),
		'arrow-down3' => _x( 'Arrow Down3', 'Icon name', 'tidy' ),
		'arrow-down-left3' => _x( 'Arrow Down Left3', 'Icon name', 'tidy' ),
		'arrow-left3' => _x( 'Arrow Left3', 'Icon name', 'tidy' ),
		'tab' => _x( 'Tab', 'Icon name', 'tidy' ),
		'checkbox-checked' => _x( 'Checkbox Checked', 'Icon name', 'tidy' ),
		'checkbox-unchecked' => _x( 'Checkbox Unchecked', 'Icon name', 'tidy' ),
		'checkbox-partial' => _x( 'Checkbox Partial', 'Icon name', 'tidy' ),
		'radio-checked' => _x( 'Radio Checked', 'Icon name', 'tidy' ),
		'radio-unchecked' => _x( 'Radio Unchecked', 'Icon name', 'tidy' ),
		'crop' => _x( 'Crop', 'Icon name', 'tidy' ),
		'scissors' => _x( 'Scissors', 'Icon name', 'tidy' ),
		'filter' => _x( 'Filter', 'Icon name', 'tidy' ),
		'filter2' => _x( 'Filter2', 'Icon name', 'tidy' ),
		'font' => _x( 'Font', 'Icon name', 'tidy' ),
		'text-height' => _x( 'Text Height', 'Icon name', 'tidy' ),
		'text-width' => _x( 'Text Width', 'Icon name', 'tidy' ),
		'bold' => _x( 'Bold', 'Icon name', 'tidy' ),
		'underline' => _x( 'Underline', 'Icon name', 'tidy' ),
		'italic' => _x( 'Italic', 'Icon name', 'tidy' ),
		'strikethrough' => _x( 'Strikethrough', 'Icon name', 'tidy' ),
		'omega' => _x( 'Omega', 'Icon name', 'tidy' ),
		'sigma' => _x( 'Sigma', 'Icon name', 'tidy' ),
		'table' => _x( 'Table', 'Icon name', 'tidy' ),
		'table2' => _x( 'Table2', 'Icon name', 'tidy' ),
		'insert-template' => _x( 'Insert Template', 'Icon name', 'tidy' ),
		'pilcrow' => _x( 'Pilcrow', 'Icon name', 'tidy' ),
		'left-toright' => _x( 'Left Toright', 'Icon name', 'tidy' ),
		'right-Toleft' => _x( 'Right Toleft', 'Icon name', 'tidy' ),
		'paragraph-left' => _x( 'Paragraph Left', 'Icon name', 'tidy' ),
		'paragraph-center' => _x( 'Paragraph Center', 'Icon name', 'tidy' ),
		'paragraph-right' => _x( 'Paragraph Right', 'Icon name', 'tidy' ),
		'paragraph-justify' => _x( 'Paragraph Justify', 'Icon name', 'tidy' ),
		'paragraph-left2' => _x( 'Paragraph Left2', 'Icon name', 'tidy' ),
		'paragraph-center2' => _x( 'Paragraph Center2', 'Icon name', 'tidy' ),
		'paragraph-right2' => _x( 'Paragraph Right2', 'Icon name', 'tidy' ),
		'paragraph-justify2' => _x( 'Paragraph Justify2', 'Icon name', 'tidy' ),
		'indent-increase' => _x( 'Indent Increase', 'Icon name', 'tidy' ),
		'indent-decrease' => _x( 'Indent Decrease', 'Icon name', 'tidy' ),
		'new-tab' => _x( 'New Tab', 'Icon name', 'tidy' ),
		'embed' => _x( 'Embed', 'Icon name', 'tidy' ),
		'code' => _x( 'Code', 'Icon name', 'tidy' ),
		'console' => _x( 'Console', 'Icon name', 'tidy' ),
		'share' => _x( 'Share', 'Icon name', 'tidy' ),
		'mail' => _x( 'Mail', 'Icon name', 'tidy' ),
		'mail2' => _x( 'Mail2', 'Icon name', 'tidy' ),
		'mail3' => _x( 'Mail3', 'Icon name', 'tidy' ),
		'mail4' => _x( 'Mail4', 'Icon name', 'tidy' ),
		'google' => _x( 'Google', 'Icon name', 'tidy' ),
		'google-plus' => _x( 'Google Plus', 'Icon name', 'tidy' ),
		'google-plus2' => _x( 'Google Plus2', 'Icon name', 'tidy' ),
		'google-plus3' => _x( 'Google Plus3', 'Icon name', 'tidy' ),
		'google-plus4' => _x( 'Google Plus4', 'Icon name', 'tidy' ),
		'google-drive' => _x( 'Google Drive', 'Icon name', 'tidy' ),
		'facebook' => _x( 'Facebook', 'Icon name', 'tidy' ),
		'facebook2' => _x( 'Facebook2', 'Icon name', 'tidy' ),
		'facebook3' => _x( 'Facebook3', 'Icon name', 'tidy' ),
		'instagram' => _x( 'Instagram', 'Icon name', 'tidy' ),
		'twitter' => _x( 'Twitter', 'Icon name', 'tidy' ),
		'twitter2' => _x( 'Twitter2', 'Icon name', 'tidy' ),
		'twitter3' => _x( 'Twitter3', 'Icon name', 'tidy' ),
		'feed2' => _x( 'Feed2', 'Icon name', 'tidy' ),
		'feed3' => _x( 'Feed3', 'Icon name', 'tidy' ),
		'feed4' => _x( 'Feed4', 'Icon name', 'tidy' ),
		'youtube' => _x( 'Youtube', 'Icon name', 'tidy' ),
		'youtube2' => _x( 'Youtube2', 'Icon name', 'tidy' ),
		'vimeo' => _x( 'Vimeo', 'Icon name', 'tidy' ),
		'vimeo2' => _x( 'Vimeo2', 'Icon name', 'tidy' ),
		'vimeo3' => _x( 'Vimeo3', 'Icon name', 'tidy' ),
		'lanyrd' => _x( 'Lanyrd', 'Icon name', 'tidy' ),
		'flickr' => _x( 'Flickr', 'Icon name', 'tidy' ),
		'flickr2' => _x( 'Flickr2', 'Icon name', 'tidy' ),
		'flickr3' => _x( 'Flickr3', 'Icon name', 'tidy' ),
		'flickr4' => _x( 'Flickr4', 'Icon name', 'tidy' ),
		'picasa' => _x( 'Picasa', 'Icon name', 'tidy' ),
		'picasa2' => _x( 'Picasa2', 'Icon name', 'tidy' ),
		'dribbble' => _x( 'Dribbble', 'Icon name', 'tidy' ),
		'dribbble2' => _x( 'Dribbble2', 'Icon name', 'tidy' ),
		'dribbble3' => _x( 'Dribbble3', 'Icon name', 'tidy' ),
		'forrst' => _x( 'Forrst', 'Icon name', 'tidy' ),
		'forrst2' => _x( 'Forrst2', 'Icon name', 'tidy' ),
		'deviantart' => _x( 'Deviantart', 'Icon name', 'tidy' ),
		'deviantart2' => _x( 'Deviantart2', 'Icon name', 'tidy' ),
		'steam' => _x( 'Steam', 'Icon name', 'tidy' ),
		'steam2' => _x( 'Steam2', 'Icon name', 'tidy' ),
		'github' => _x( 'Github', 'Icon name', 'tidy' ),
		'github2' => _x( 'Github2', 'Icon name', 'tidy' ),
		'github3' => _x( 'Github3', 'Icon name', 'tidy' ),
		'github4' => _x( 'Github4', 'Icon name', 'tidy' ),
		'github5' => _x( 'Github5', 'Icon name', 'tidy' ),
		'wordpress' => _x( 'Wordpress', 'Icon name', 'tidy' ),
		'wordpress2' => _x( 'Wordpress2', 'Icon name', 'tidy' ),
		'joomla' => _x( 'Joomla', 'Icon name', 'tidy' ),
		'blogger' => _x( 'Blogger', 'Icon name', 'tidy' ),
		'blogger2' => _x( 'Blogger2', 'Icon name', 'tidy' ),
		'tumblr' => _x( 'Tumblr', 'Icon name', 'tidy' ),
		'tumblr2' => _x( 'Tumblr2', 'Icon name', 'tidy' ),
		'yahoo' => _x( 'Yahoo', 'Icon name', 'tidy' ),
		'tux' => _x( 'Tux', 'Icon name', 'tidy' ),
		'apple' => _x( 'Apple', 'Icon name', 'tidy' ),
		'finder' => _x( 'Finder', 'Icon name', 'tidy' ),
		'android' => _x( 'Android', 'Icon name', 'tidy' ),
		'windows' => _x( 'Windows', 'Icon name', 'tidy' ),
		'windows8' => _x( 'Windows8', 'Icon name', 'tidy' ),
		'soundcloud' => _x( 'Soundcloud', 'Icon name', 'tidy' ),
		'soundcloud2' => _x( 'Soundcloud2', 'Icon name', 'tidy' ),
		'skype' => _x( 'Skype', 'Icon name', 'tidy' ),
		'reddit' => _x( 'Reddit', 'Icon name', 'tidy' ),
		'linkedin' => _x( 'Linkedin', 'Icon name', 'tidy' ),
		'lastfm' => _x( 'Lastfm', 'Icon name', 'tidy' ),
		'lastfm2' => _x( 'Lastfm2', 'Icon name', 'tidy' ),
		'delicious' => _x( 'Delicious', 'Icon name', 'tidy' ),
		'stumbleupon' => _x( 'Stumbleupon', 'Icon name', 'tidy' ),
		'stumbleupon2' => _x( 'Stumbleupon2', 'Icon name', 'tidy' ),
		'stackoverflow' => _x( 'Stackoverflow', 'Icon name', 'tidy' ),
		'pinterest' => _x( 'Pinterest', 'Icon name', 'tidy' ),
		'pinterest2' => _x( 'Pinterest2', 'Icon name', 'tidy' ),
		'xing' => _x( 'Xing', 'Icon name', 'tidy' ),
		'xing2' => _x( 'Xing2', 'Icon name', 'tidy' ),
		'flattr' => _x( 'Flattr', 'Icon name', 'tidy' ),
		'foursquare' => _x( 'Foursquare', 'Icon name', 'tidy' ),
		'foursquare2' => _x( 'Foursquare2', 'Icon name', 'tidy' ),
		'paypal' => _x( 'Paypal', 'Icon name', 'tidy' ),
		'paypal2' => _x( 'Paypal2', 'Icon name', 'tidy' ),
		'paypal3' => _x( 'Paypal3', 'Icon name', 'tidy' ),
		'yelp' => _x( 'Yelp', 'Icon name', 'tidy' ),
		'libreoffice' => _x( 'Libreoffice', 'Icon name', 'tidy' ),
		'file-pdf' => _x( 'File Pdf', 'Icon name', 'tidy' ),
		'file-openoffice' => _x( 'File Openoffice', 'Icon name', 'tidy' ),
		'file-word' => _x( 'File Word', 'Icon name', 'tidy' ),
		'file-excel' => _x( 'File Excel', 'Icon name', 'tidy' ),
		'file-zip' => _x( 'File Zip', 'Icon name', 'tidy' ),
		'file-powerpoint' => _x( 'File Powerpoint', 'Icon name', 'tidy' ),
		'file-xml' => _x( 'File Xml', 'Icon name', 'tidy' ),
		'file-css' => _x( 'File Css', 'Icon name', 'tidy' ),
		'html5' => _x( 'Html5', 'Icon name', 'tidy' ),
		'html52' => _x( 'Html52', 'Icon name', 'tidy' ),
		'css3' => _x( 'Css3', 'Icon name', 'tidy' ),
		'chrome' => _x( 'Chrome', 'Icon name', 'tidy' ),
		'firefox' => _x( 'Firefox', 'Icon name', 'tidy' ),
		'ie' => _x( 'Ie', 'Icon name', 'tidy' ),
		'opera' => _x( 'Opera', 'Icon name', 'tidy' ),
		'safari' => _x( 'Safari', 'Icon name', 'tidy' ),
		'icomoon' => _x( 'Icomoon', 'Icon name', 'tidy' )
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
		'desc' => __( 'Please upload .ico image.', 'tidy' ),
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
		'desc' => __( 'About widget text', 'tidy' ),
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
		'std' => '3',
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
		'desc' => __('%s : Search keywords.', 'tidy'),
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
		'id' => "cont_l",
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

	$options[] = array(
		'name' => __('Page Title', 'tidy'),
		'desc' => '',
		'std' => 'About',
		'id' => 'cont_a_title',
		'type' => 'text'
	);
	$options[] = array(
		'name' => __('Icon', 'tidy'),
		'desc' => '',
		'id' => 'cont_a_icon',
		'std' => 'quill',
		'type' => 'select',
		'class' => 'mnicon mini arc_icon',
		'options' => $icon_array);

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
		'std' => 'Area B Title',
		'id' => 'cont_b_title',
		'type' => 'text'
	);
	$options[] = array(
		'name' => __('Area B conents', 'tidy'),
		'std' => 'Area B conents',
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
		'std' => 'Area C Title',
		'id' => 'cont_c_title',
		'type' => 'text'
	);
	$options[] = array(
		'name' => __('Area C conents', 'tidy'),
		'std' => 'Area C conents',
		'id' => 'cont_c_text',
		'type' => 'editor',
		'settings' => $wp_editor_settings );

	$options[] = array(
		'id' => 'ltab-5',
		'class' => "end",
		'type' => 'tabcontent'
	);

	/**
	 * Merit Box Settings.
	 */
	$options[] = array(
		'name' => __('Merit Box Settings', 'tidy'),
		'icon' => 'images-alt2',
		'type' => 'heading');

	$options[] = array(
		'name' => __('Number of box to show ', 'tidy'),
		'desc' => __('Default:1, Min:1, Max:4.', 'tidy'),
		'id' => 'merit-box-num',
		'std' => 4,
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
		'std' => 'info@example.com',
		'type' => 'email');

	$sns_array = tidy_sns_array();
	if ( ! empty( $sns_array )) {
		foreach( $sns_array as $key=>$val ) {
			$options[] = array(
				'name' => $key,
				'desc' => sprintf( __('You\'re %s address.', 'tidy'), $key ),
				'id' => $val[0],
				'account' => $val[1],
				'toggle' => 1,
				'type' => 'sns');
		}
	}

	// for restore
	$options[] = array(
		'name' => 'restore',
		'id' => 'restore_hidden',
		'std' => '0',
		'class' => 'hidden',
		'type' => 'text');

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

add_filter( 'optionsframework_std', 'tidy_optionsframework_std', 10, 4);
function tidy_optionsframework_std( $option_name, $value, $val , $restore) {
	if ( ! array_key_exists( 'id', $value ) )
		return $val;

	$customizer_key = tidy_customizer_array();

	if ( $value['id'] == 'general-header-site-title' ) {
		$val = get_bloginfo( 'name' );
	} elseif ( $value['id'] == 'general-header-site-tagline' ) {
		$val = get_bloginfo( 'description' );
	} elseif ( in_array( $value['id'], $customizer_key ) ) {
		$d = get_theme_mods();
		if ( $restore === true ) {
			$val = $value['std'];
			set_theme_mod( $value['id'], $val );
		} else {
			$val = (isset($d[$value['id']])) ? $d[$value['id']] : $value['std'];
		}
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

// restore
add_filter( 'of_sanitize_text', 'tidy_of_sanitize_hidden_orverwride', 10, 2);
function tidy_of_sanitize_hidden_orverwride( $std, $option ) {
	if ( $option['id'] == 'restore_hidden' ) {
		if ( isset( $_POST['reset'] ) ) {
			$std = 1;
		} else {
			$std = 0;
		}
	}
	return $std;
}
