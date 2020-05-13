<?php 
if (jApp::config()->compilation['checkCacheFiletime'] &&
filemtime('C:\webserver\lizmap\prod\release_3_3\lib/jelix-admin-modules/master_admin/templates/zone_dashboard.tpl') > 1582985478){ return false;
} else {
function template_meta_58e22c5f2cd5cdb82d7d7846ac843201($t){

}
function template_58e22c5f2cd5cdb82d7d7846ac843201($t){
?>
<h1><?php echo jLocale::get('gui.dashboard.title'); ?></h1>
<?php if(!count($t->_vars['widgets'])):?>

<p><?php echo jLocale::get('gui.dashboard.nowidget'); ?>.</p>
<?php else:?>


<?php $t->_vars['nbPerCol'] = ceil(count($t->_vars['widgets'])/2);?>
<div id="dashboard-content">
    <div id="dashboard-left-column">
        <?php for($t->_vars['i']=0; $t->_vars['i']<$t->_vars['nbPerCol'];$t->_vars['i']++):?>
        <div class="dashboard-widget">
            <h2><?php echo htmlspecialchars($t->_vars['widgets'][$t->_vars['i']]->title); ?></h2>
            <div class="dashboard-widget-content"><?php echo $t->_vars['widgets'][$t->_vars['i']]->content; ?></div>
        </div>
        <?php endfor;?>

    </div>
    
    <div id="dashboard-right-column">
        <?php for($t->_vars['i']=$t->_vars['nbPerCol']; $t->_vars['i']<count($t->_vars['widgets']);$t->_vars['i']++):?>
        <div class="dashboard-widget">
            <h2><?php echo htmlspecialchars($t->_vars['widgets'][$t->_vars['i']]->title); ?></h2>
            <div class="dashboard-widget-content"><?php echo $t->_vars['widgets'][$t->_vars['i']]->content; ?></div>
        </div>
        <?php endfor;?>

    </div>
    <div class="dashboard-clear"></div>
</div>
<?php endif;?><?php 
}
return true;}
