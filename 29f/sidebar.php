<?php
/**
 * The Sidebar 
 *
 * @package 29th Floor
 * @subpackage 29F
 * @since 29F 1.0
 */
?>

<aside id="sidebar" role="complimentary">
<a href="http://feeds.feedburner.com/29f" class="rss">Subscribe to 29th Floor Blog</a>
<div class="subscribe">
<form action="http://feedburner.google.com/fb/a/mailverify" method="post" target="popupwindow" onsubmit="window.open('http://feedburner.google.com/fb/a/mailverify?uri=29F', 'popupwindow', 'scrollbars=yes,width=550,height=520');return true">
<h2>Get updates by email</h2>
<input type="text" name="email"/> <input type="submit" value="Subscribe" />
<input type="hidden" value="29F" name="uri"/>
<input type="hidden" name="loc" value="en_US"/>
</form>
</div>
<?php
$tags = get_tags();
$html = '<div class="tags-list"><h5>Tags</h5><ul>';
foreach ($tags as $tag){
	$tag_link = get_tag_link($tag->term_id);
			
	$html .= "<li><a href='{$tag_link}' title='Posts tagged {$tag->name}' class='{$tag->slug}'>";
	$html .= "{$tag->name}</a></li>";
}
$html .= '</ul></div>';
echo $html;
?>
<ul class="links">
	<?php wp_list_bookmarks('title_before=<h5>&title_after=</h5>&orderby=id'); ?>
</ul>
</aside>