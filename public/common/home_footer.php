<?php
use App\Models\Nav;
$bottomnav = Nav::orderby('level', 'desc')->where('position', 0)->get();
?>

<li>版权所有copyright © 创意时代2017 津ICP备00056258号</li>
<li>天津市创意时代科技有限公司</li>
<li>
<?php
foreach ($bottomnav as $item) {
?>
	<a href='<?php echo $item->linkurl; ?>' target=_self><?php echo $item->name; ?></a>
<?php
}
?>
</li>