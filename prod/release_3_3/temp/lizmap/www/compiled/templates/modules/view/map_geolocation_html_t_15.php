<?php 
if (jApp::config()->compilation['checkCacheFiletime'] &&
filemtime('C:\webserver\lizmap\prod\release_3_3\lizmap/modules/view/templates/map_geolocation.tpl') > 1584482039){ return false;
} else {
function template_meta_7594b35a9b08e369ca44b2d338b543f0($t){

}
function template_7594b35a9b08e369ca44b2d338b543f0($t){
?><div class="geolocation">
  <h3>
    <span class="title">
      <button class="btn-geolocation-close btn btn-mini btn-error btn-link" title="<?php echo jLocale::get('view~map.toolbar.content.stop'); ?>">×</button>
      <span class="icon"></span>
      <span class="text">&nbsp;<?php echo jLocale::get('view~map.geolocate.toolbar.title'); ?>&nbsp;</span>
    </span>
  </h3>
  <div class="menu-content">
    <div class="button-bar">
      <button id="geolocation-center" class="btn btn-small btn-primary" disabled="disabled"><span class="icon"></span>&nbsp;<?php echo jLocale::get('view~map.geolocate.toolbar.center'); ?></button>
      <button id="geolocation-bind" class="btn btn-small btn-primary" disabled="disabled"><span class="icon"></span>&nbsp;<?php echo jLocale::get('view~map.geolocate.toolbar.bind'); ?></button>
      <button id="geolocation-stop" class="btn btn-small btn-primary" disabled="disabled"><span class="icon"></span>&nbsp;<?php echo jLocale::get('view~map.geolocate.toolbar.stop'); ?></button>
    </div>
    <?php if($t->_vars['hasEditionLayers']):?>

    <div id="geolocation-edition-group" style="display:none; margin-top:5px;">
      <table>
          <tr>
              <td style="vertical-align: top;">
      <span id="geolocation-edition-title" style="font-weight:bold"><?php echo jLocale::get('view~edition.geolocate.toolbar.title'); ?>&nbsp;</span>
              </td>
              <td>
      <label id="geolocation-edition-linked-label" class="checkbox"><input id="geolocation-edition-linked" type="checkbox" value="1" disabled="disabled"><?php echo jLocale::get('view~edition.point.coord.geolocation.label'); ?></label>
      <button id="geolocation-edition-add" class="btn btn-small btn-primary" disabled="disabled"><span class="icon"></span>&nbsp;<?php echo jLocale::get('view~edition.point.coord.add.label'); ?></button>
      <button id="geolocation-edition-submit" class="btn btn-small btn-primary" disabled="disabled"><span class="icon"></span>&nbsp;<?php echo jLocale::get('view~edition.point.coord.finalize.label'); ?></button>
              </td>
          </tr>
      </table>
    </div>
    <?php endif;?>

  </div>
</div>
<?php 
}
return true;}
