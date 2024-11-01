<?php
/* wp-content/plugins/wp-filler/wp-filler.php */

/*
Plugin Name: WP-Filler
Plugin URI: http://www.danrice.co.uk/2009/11/wp-filler/
Description: Inserts a set amount of filler text into any page.
Version: 1.0
Author: DanRice
Author URI: http://www.danrice.co.uk/
*/


//plugin default(s)
DEFINE("WPFILLER_PARAGRAPHS", "");

//register the wpfiller shortcode
add_shortcode("wp-filler", "wpfiller_handler");

function wpfiller_handler($incomingfrompost) {
  //process incoming attribute(s) assigning defaults if required
  $incomingfrompost=shortcode_atts(array(
    "paragraphs" => WPFILLER_PARAGRAPHS,          
  ), $incomingfrompost);
  //run function that actually does the work of the plugin
  $wpfillerh_output = wpfiller_function($incomingfrompost);
  //send back text to replace shortcode in post
  return $wpfillerh_output;
}

function wpfiller_function($incomingfromhandler) {

$bank = array(
'<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse convallis nunc eu nisi condimentum posuere. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Vivamus volutpat est a sem varius sagittis. Nulla ullamcorper est id risus ultrices eget consequat dolor viverra. Duis id metus in ligula gravida elementum. Phasellus molestie vestibulum nibh ac suscipit. Nam convallis fringilla nibh in pellentesque. Phasellus adipiscing porttitor arcu, vel varius nulla gravida nec. Ut elementum ipsum et leo sodales nec facilisis urna accumsan. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Curabitur eu neque sapien. Proin ultrices neque euismod odio lobortis et ultrices lorem tempus. Mauris vel sem leo, ut pretium tortor. Etiam faucibus, purus ut commodo porttitor, nisi arcu lobortis turpis, sed pellentesque leo lorem in ipsum. Nullam viverra eleifend ultrices. </p>', 
'<p>Vivamus varius magna eu magna posuere posuere. Quisque sapien leo, auctor vitae tincidunt ut, tincidunt vitae nibh. Duis est leo, fermentum eget lacinia sit amet, tempus ut nisl. Pellentesque et lectus felis. Nullam semper lorem nec est pretium condimentum. Phasellus vel sem eget tellus adipiscing dictum. Nulla volutpat tortor tincidunt libero consequat quis iaculis lorem pretium. Curabitur quis mauris non risus mollis faucibus. Etiam lobortis tristique lobortis. Donec dictum vestibulum lacus, vitae venenatis urna feugiat eu. Vestibulum pretium, odio vel ullamcorper aliquam, ante tortor fermentum lectus, imperdiet adipiscing felis sem eu est. Fusce et tristique purus. Integer consectetur tristique purus, non commodo tortor lobortis id. Nullam fringilla ante id ligula posuere sollicitudin. Praesent egestas lacinia ante, quis luctus sapien dictum at. Nullam dictum vulputate lacinia. Aliquam gravida dolor non justo viverra scelerisque tincidunt tortor iaculis. </p>', 
'<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Curabitur facilisis faucibus nibh, eget sollicitudin mi sagittis quis. Mauris vehicula, velit fermentum gravida ultrices, velit odio cursus odio, non vestibulum nisi lacus laoreet nunc. Praesent sed velit nec orci posuere rhoncus quis eget risus. Sed varius arcu sit amet ligula pretium eu auctor sapien auctor. Morbi id leo sapien. Donec vestibulum pellentesque massa, non iaculis diam semper sit amet. Fusce scelerisque volutpat leo, et convallis est scelerisque quis. Mauris sed augue felis. Quisque suscipit rutrum dui quis sollicitudin. Vestibulum id magna tortor. Ut suscipit convallis quam, non mollis nibh pharetra vitae. </p>',
'<p>Vivamus fermentum magna eu magna gravida et suscipit purus egestas. Sed massa mi, porttitor id lacinia at, pellentesque elementum sem. Aenean fermentum arcu et elit varius condimentum. Sed id eros sem, a eleifend elit. Phasellus feugiat orci molestie augue vestibulum vel eleifend odio eleifend. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas ipsum est, rhoncus sit amet dictum in, tristique at odio. Donec arcu arcu, rutrum in placerat eu, vulputate sit amet tellus. Vestibulum porttitor ligula vitae ipsum semper rutrum. Cras fermentum lobortis justo sed adipiscing. </p>',
'<p>Vivamus non nisl tempor risus condimentum aliquam id eu est. Nulla dignissim ipsum sed mauris dapibus consequat. Suspendisse vestibulum, nisl eget porta dignissim, elit magna fringilla diam, et vehicula nunc leo vel sapien. Vestibulum in massa non ante tempus imperdiet vitae non risus. In quam lorem, facilisis at accumsan et, varius quis metus. Fusce a cursus risus. Maecenas tempor, diam et vestibulum pretium, libero neque gravida libero, vitae aliquam nulla erat ut odio. Donec in feugiat nibh. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Duis fermentum pretium ligula, in blandit neque rutrum sed. In id nulla ut orci auctor lacinia quis ac dolor. Quisque ac ultrices lectus. Morbi viverra tristique turpis in fermentum. In rhoncus euismod neque eget accumsan. Mauris pulvinar, quam non accumsan ultricies, ante nibh hendrerit tellus, sit amet lacinia quam augue fermentum diam. Sed eu libero diam, vitae congue mauris. </p>',
'<p>Ut a est ante, nec dictum eros. Praesent blandit metus sed nisi dapibus ac elementum arcu pulvinar. Nullam laoreet mollis gravida. Proin lacus lacus, porta id commodo ut, lobortis at neque. Nulla ligula dolor, viverra ac pharetra at, suscipit quis leo. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Nam sed urna eget nibh pellentesque elementum sit amet sed nulla. Mauris euismod velit odio. In sollicitudin hendrerit vestibulum. Vestibulum ornare nunc non diam suscipit varius. Nunc pellentesque, tellus eget dictum malesuada, nunc neque venenatis tortor, sed ultrices mauris erat sed tortor. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Donec feugiat ante et velit consequat eget consequat odio pharetra. </p>',
'<p>Etiam faucibus varius nulla non aliquam. Nam sed justo elit. Pellentesque a nisi ipsum, ut luctus diam. Aliquam euismod rhoncus ipsum et convallis. In dui magna, dapibus sit amet luctus vel, ullamcorper suscipit urna. Ut dapibus blandit velit quis volutpat. Etiam eu lectus sit amet ligula aliquet consequat. Vestibulum et risus turpis. Vestibulum dictum venenatis libero. Quisque dictum massa sit amet elit pretium egestas. In in dolor urna, vitae semper mi. Etiam eu justo tortor. Sed tempor mauris sit amet libero sodales mattis sed nec lacus. Sed sed odio a tellus cursus iaculis. Curabitur id enim ante, non placerat mauris. </p>',
'<p>Donec dictum leo sit amet neque facilisis a ornare purus interdum. In luctus nisi id sem ullamcorper ultrices. Nam vitae placerat urna. Donec suscipit massa sit amet sem sollicitudin porta. Nullam nec odio id nisi bibendum scelerisque. Nam nulla nunc, consectetur in mattis at, porta sed lectus. Integer fermentum volutpat eros ullamcorper dictum. Donec in tortor eros. Nulla et interdum massa. Fusce leo magna, fermentum sit amet porta ut, rutrum eu mi. Quisque augue massa, malesuada a viverra vel, volutpat sed nibh. In hendrerit diam ut nunc vehicula sollicitudin. Nam tincidunt neque a elit congue dictum. In pellentesque pulvinar nunc lacinia placerat. </p>',
'<p>Suspendisse eget porttitor dolor. Etiam a nunc eget justo luctus tristique. Suspendisse pulvinar orci mauris. In ac odio eget dui blandit bibendum. Mauris molestie dolor nec nisl congue porttitor. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Pellentesque arcu enim, euismod vitae fringilla at, molestie ut ligula. Praesent id purus non justo elementum placerat. Nulla placerat consectetur ipsum at volutpat. Donec sed libero ac magna fringilla posuere elementum eget lectus. Duis ullamcorper tortor eu libero pretium vestibulum. Sed sed orci id nisi vulputate sagittis id sit amet nulla. Aliquam erat volutpat. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; In porttitor tincidunt volutpat. </p>',
'<p>Nunc sed sagittis est. Aliquam viverra metus vel neque cursus posuere. Phasellus fringilla mi bibendum erat vulputate non lobortis enim tempor. Duis augue felis, gravida id feugiat et, tempor a metus. Sed dolor risus, auctor et suscipit vel, auctor a eros. Integer vel ante at mi luctus interdum quis non odio. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Proin volutpat, urna sed pulvinar scelerisque, nisi nulla malesuada mi, ut rutrum velit tellus vitae est. Maecenas vitae tellus neque, vitae tempor est. Proin bibendum cursus tortor, mattis sodales tellus posuere a. Fusce cursus lorem in mi aliquam rutrum. Etiam vehicula semper arcu, a fermentum lacus dapibus eu. Proin congue, felis eget sagittis sodales, nunc urna consectetur dolor, in aliquet eros turpis id est. </p>',
'<p>Aliquam a eros semper lacus imperdiet viverra. Sed justo leo, faucibus sit amet ultrices sed, molestie sed quam. Nullam quis enim et tortor dictum bibendum. Vestibulum quis libero lacus, sed consequat odio. Mauris ac ante aliquet urna vulputate tincidunt. Sed sagittis luctus velit vel tempor. Pellentesque convallis, erat vel porttitor fermentum, mauris eros sagittis magna, at mollis urna nisl eget elit. Donec cursus neque non metus sollicitudin nec ultricies quam pretium. Sed purus augue, egestas nec suscipit mattis, suscipit vitae ipsum. Mauris pellentesque vehicula mattis. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Maecenas ac commodo neque. Integer facilisis sodales interdum. Vestibulum cursus adipiscing enim, nec faucibus sem tincidunt euismod. Maecenas in lectus ac sem tempus consectetur vel id dui. Donec enim lacus, volutpat et ultricies a, aliquet a nisl. </p>',
'<p>Sed id lacus libero. Ut nec tortor placerat diam aliquam luctus. Etiam sem nisl, tristique id imperdiet vitae, tempor eget metus. Sed nec gravida augue. Donec ultrices, tortor sed euismod pellentesque, est tellus blandit mauris, sit amet sagittis nisl sem non nisl. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nam vulputate auctor nisl et blandit. Morbi et egestas dolor. Quisque diam diam, semper sit amet tincidunt a, malesuada id sapien. Pellentesque et enim at felis laoreet ullamcorper. Aliquam sodales orci id nulla molestie id pharetra est rutrum. Mauris commodo ullamcorper dui, et suscipit lorem elementum sit amet. </p>'
);
$count = count($bank)-1;

  for ($wpfiller_count = 1; $wpfiller_count <= $incomingfromhandler["paragraphs"]; $wpfiller_count++) {
  $wpfiller_output .= $bank[rand(0, $count)];
  
  
  }

  //send back text to calling function
  return $wpfiller_output;
}

//settings for options panel
function wpfiller_menu()
{
    global $wpdb;
    include 'wpfiller-admin.php';
}

function wpfiller_admin_actions()
{
    add_options_page("WP-Filler", "WP-Filler", 1,
"wpfiller-admin.php", "wpfiller_menu");
}

add_action('admin_menu', 'wpfiller_admin_actions');

?>