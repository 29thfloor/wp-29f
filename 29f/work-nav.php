<?php if(!is_archive()){
	$viewallclass = "view-all-cat current-cat";
} else {
	$viewallclass = "view-all-cat";
}
?>
<ul id="work-nav" class="work-type"><li class="<? echo $viewallclass; ?>"><a href="/work">All</a></li><?php wp_list_categories( array('show_option_all' => '', 'title_li' => '', 'taxonomy' => '29f_worktype', 'current_category' => 0)); ?>
</ul>