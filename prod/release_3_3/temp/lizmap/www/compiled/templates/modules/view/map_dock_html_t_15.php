<?php 
if (jApp::config()->compilation['checkCacheFiletime'] &&
filemtime('C:\webserver\lizmap\prod\release_3_3\lizmap/modules/view/templates/map_dock.tpl') > 1582985478){ return false;
} else {
function template_meta_c8a8ffd9e42676e338624fb6b4d3c6c6($t){

}
function template_c8a8ffd9e42676e338624fb6b4d3c6c6($t){
?>    <div class="tabbable">
      <ul id="dock-tabs" class="nav nav-tabs">
      <?php foreach($t->_vars['dockable'] as $t->_vars['dock']):?>
        <li id="nav-tab-<?php echo $t->_vars['dock']->id; ?>"><a href="#<?php echo $t->_vars['dock']->id; ?>" data-toggle="tab"><?php echo $t->_vars['dock']->title; ?></a></li>
      <?php endforeach;?>

      </ul>
      <div id="dock-content" class="tab-content">
      <?php foreach($t->_vars['dockable'] as $t->_vars['dock']):?>
        <div class="tab-pane" id="<?php echo $t->_vars['dock']->id; ?>">
          <?php echo $t->_vars['dock']->fetchContent(); ?>

        </div>
      <?php endforeach;?>
      </div>
    </div>

<button id="dock-close"> <?php echo jLocale::get('view~map.bottomdock.toolbar.btn.clear.title'); ?></button>
<?php 
}
return true;}
