<?php 
if (jApp::config()->compilation['checkCacheFiletime'] &&
filemtime('C:\webserver\lizmap\prod\release_3_3\lizmap/modules/view/templates/popup.tpl') > 1582985478){ return false;
} else {
function template_meta_03e481a04d94d7bce3983d4fdc058739($t){

}
function template_03e481a04d94d7bce3983d4fdc058739($t){
?><h4><?php echo $t->_vars['layerTitle']; ?></h4>

<div class="lizmapPopupDiv">
<?php echo $t->_vars['popupContent']; ?>

</div>
<?php 
}
return true;}
