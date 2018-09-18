<?php
use App\Models\Nav;
$topnav = Nav::orderby('level', 'desc')->get();
?>
<?php
foreach ($topnav as $item) {
?>
	<li><a href="<?php echo $item->linkurl; ?>"><?php echo $item->name; ?></a></li>
<?php
}
?>