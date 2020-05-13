<?php 
if (jApp::config()->compilation['checkCacheFiletime'] &&
filemtime('C:\webserver\lizmap\prod\release_3_3\lizmap/modules/admin/templates/config.tpl') > 1584482039){ return false;
} else {
 require_once('C:\webserver\lizmap\prod\release_3_3\lizmap/plugins/tpl/html/function.jmessage_bootstrap.php');
 require_once('C:\webserver\lizmap\prod\release_3_3\lib\jelix/plugins/tpl/html/function.ctrl_label.php');
 require_once('C:\webserver\lizmap\prod\release_3_3\lib\jelix/plugins/tpl/html/function.ctrl_value.php');
 require_once('C:\webserver\lizmap\prod\release_3_3\lib\jelix/plugins/tpl/html/function.jurl.php');
function template_meta_3b7dfae80c6f46b2d12d26adc8d692dd($t){

}
function template_3b7dfae80c6f46b2d12d26adc8d692dd($t){
?><?php jtpl_function_html_jmessage_bootstrap( $t);?>

  <h1><?php echo jLocale::get('admin~admin.configuration.h1'); ?></h1>


  <div>
    <h2><?php echo jLocale::get('admin~admin.generic.h2'); ?></h2>
    <dl>
      <dt><?php echo jLocale::get('admin~admin.generic.version.number.label'); ?></dt><dd><?php echo $t->_vars['version']; ?></dd>
    </dl>
  </div>

  <?php  if(jAcl2::check('lizmap.admin.services.view')):?>

  <!--Services-->
  <div>
    <h2><?php echo jLocale::get('admin~admin.configuration.services.label'); ?></h2>
    <?php  $t->_privateVars['__form'] = $t->_vars['servicesForm'] ;
    $t->_privateVars['__formViewMode'] = 1;
    $t->_privateVars['__formbuilder'] = $t->_privateVars['__form']->getBuilder('htmlbootstrap');
    $t->_privateVars['__formbuilder']->setOptions( array());
$t->_privateVars['__displayed_ctrl'] = array();
?>

    <table class="table services-table">
      <?php $ctrls_to_display=null;$ctrls_notto_display=null;
if (!isset($t->_privateVars['__formbuilder'])) {
    $t->_privateVars['__formViewMode'] = 1;
    $t->_privateVars['__formbuilder'] = $t->_privateVars['__form']->getBuilder('html');
}
if (!isset($t->_privateVars['__displayed_ctrl'])) {
    $t->_privateVars['__displayed_ctrl'] = array();
}
$t->_privateVars['__ctrlref']='';

foreach($t->_privateVars['__form']->getRootControls() as $ctrlref=>$ctrl){
    if(!$t->_privateVars['__form']->isActivated($ctrlref)) continue;
    if($ctrl->type == 'reset' || $ctrl->type == 'hidden') continue;
if($ctrl->type == 'submit' && $ctrl->standalone) continue;
            if($ctrl->type == 'captcha' || $ctrl->type == 'secretconfirm') continue;
if(!isset($t->_privateVars['__displayed_ctrl'][$ctrlref])
       && (  ($ctrls_to_display===null && $ctrls_notto_display === null)
          || ($ctrls_to_display===null && !in_array($ctrlref, $ctrls_notto_display))
          || (is_array($ctrls_to_display) && in_array($ctrlref, $ctrls_to_display) ))) {
        $t->_privateVars['__ctrlref'] = $ctrlref;
        $t->_privateVars['__ctrl'] = $ctrl;
?>
        <tr>
        <?php  if(isset($t->_privateVars['__ctrlref'])&&($t->_privateVars['__ctrlref']=='requestProxyEnabled')):?>
          <?php  if(isset($t->_privateVars['__ctrlref'])&&$t->_privateVars['__form']->getData($t->_privateVars['__ctrlref']) == '0'):?>
            <th><?php jtpl_function_html_ctrl_label( $t);?></th><td><?php jtpl_function_html_ctrl_value( $t);?></td>
          <?php else:?>
            <td colspan="2">
              <?php jtpl_function_html_ctrl_value( $t);?>
            </td>
          <?php  endif; ?>
        <?php else:?>
        <th><?php jtpl_function_html_ctrl_label( $t);?></th><td><?php jtpl_function_html_ctrl_value( $t);?></td>
        <?php  endif; ?>
      </tr>

      <?php }} $t->_privateVars['__ctrlref']='';?>
    </table>
    <?php 
unset($t->_privateVars['__form']);
unset($t->_privateVars['__formbuilder']);
unset($t->_privateVars['__formViewMode']);
unset($t->_privateVars['__displayed_ctrl']);?>
    <!-- Modify -->
    <?php  if(jAcl2::check('lizmap.admin.services.update')):?>
    <div class="form-actions">
    <a class="btn" href="<?php jtpl_function_html_jurl( $t,'admin~config:modifyServices');?>">
      <?php echo jLocale::get('admin~admin.configuration.button.modify.service.label'); ?>
    </a>
    </div>
    <?php  endif; ?>
  </div>
  <?php  endif; ?>

  <?php  if(jAcl2::check('lizmap.admin.repositories.view')):?>
  <!--Repositories-->



  <div>
  <h2><?php echo jLocale::get('admin~admin.configuration.repository.label'); ?></h2>

  <!--Add a repository-->
  <?php  if(jAcl2::check('lizmap.admin.repositories.create')):?>

  <div style="margin:20px 0px;">
  <a class="btn" href="<?php jtpl_function_html_jurl( $t,'admin~config:createSection');?>"><?php echo jLocale::get('admin~admin.configuration.button.add.repository.label'); ?></a>
  </div>
  <?php  endif; ?>


  <?php foreach($t->_vars['repositories'] as $t->_vars['repo']):?>

    <legend><?php echo $t->_vars['repo']->getKey(); ?></legend>

    <dl><dt><?php echo jLocale::get('admin~admin.form.admin_section.data.label'); ?></dt>
      <dd>
        <table class="table">
      <?php $t->_vars['section'] = 'repository:'.$t->_vars['repo']->getKey();?>

      <?php $t->_vars['properties'] = $t->_vars['repo']->getProperties();?>
      <?php $t->_vars['rootRepositories'] = $t->_vars['services']->getRootRepositories();?>
      <?php foreach($t->_vars['properties'] as $t->_vars['prop']):?>
      <tr>
        <?php if($t->_vars['prop'] == 'path' && $t->_vars['rootRepositories'] != ''):?>
            <?php if(substr($t->_vars['repo']->getPath(), 0, strlen($t->_vars['rootRepositories'])) === $t->_vars['rootRepositories']):?>
            <?php $t->_vars['d'] = substr($t->_vars['repo']->getPath(), strlen($t->_vars['rootRepositories']));?>
            <th><?php echo jLocale::get('admin~admin.form.admin_section.repository.'.$t->_vars['prop'].'.label'); ?></th><td><?php echo $t->_vars['d']; ?></td>
            <?php endif;?>

        <?php else:?>
        <th><?php echo jLocale::get('admin~admin.form.admin_section.repository.'.$t->_vars['prop'].'.label'); ?></th><td><?php echo $t->_vars['repo']->getData($t->_vars['prop']); ?></td>
        <?php endif;?>

      </tr>
      <?php endforeach;?>
        </table>
      </dd>
    </dl>

    <dl><dt><?php echo jLocale::get('admin~admin.form.admin_section.groups.label'); ?></dt>
      <dd>
        <table class="table">
      <?php foreach($t->_vars['subjects'] as $t->_vars['s']):?>

      <?php if(property_exists($t->_vars['data'][$t->_vars['repo']->getKey()], $t->_vars['s'])):?>
      <tr>
        <th><?php echo $t->_vars['labels'][$t->_vars['s']]; ?></th><td><?php echo $t->_vars['data'][$t->_vars['repo']->getKey()]->{$t->_vars['s']}; ?></td>
      </tr>
      <?php endif;?>

      <?php endforeach;?>
        </table>
      </dd>
    </dl>

      <div class="form-actions">
        <!-- View repository page -->
        <?php  if(jAcl2::check('lizmap.repositories.view', $t->_vars['repo']->getKey())):?>
        <a class="btn" href="<?php jtpl_function_html_jurl( $t,'view~default:index', array('repository'=>$t->_vars['repo']->getKey()));?>" target="_blank"><?php echo jLocale::get('admin~admin.configuration.button.view.repository.label'); ?></a>
        <?php  endif; ?>
        <!-- Modify -->
        <?php  if(jAcl2::check('lizmap.admin.repositories.update')):?>
        <a class="btn" href="<?php jtpl_function_html_jurl( $t,'admin~config:modifySection', array('repository'=>$t->_vars['repo']->getKey()));?>"><?php echo jLocale::get('admin~admin.configuration.button.modify.repository.label'); ?></a>
        <?php  endif; ?>
        <!-- Remove -->
        <?php  if(jAcl2::check('lizmap.admin.repositories.delete')):?>
        <a class="btn" href="<?php jtpl_function_html_jurl( $t,'admin~config:removeSection', array('repository'=>$t->_vars['repo']->getKey()));?>" onclick="return confirm('<?php echo jLocale::get('admin~admin.configuration.button.remove.repository.confirm.label'); ?>')"><?php echo jLocale::get('admin~admin.configuration.button.remove.repository.label'); ?></a>
        <?php  endif; ?>
        <?php  if(jAcl2::check('lizmap.admin.repositories.delete')):?>
        <a class="btn" href="<?php jtpl_function_html_jurl( $t,'admin~config:removeCache', array('repository'=>$t->_vars['repo']->getKey()));?>" onclick="return confirm('<?php echo jLocale::get('admin~admin.cache.button.remove.repository.cache.confirm.label'); ?>')"><?php echo jLocale::get('admin~admin.cache.button.remove.repository.cache.label'); ?></a>
        <?php  endif; ?>
      </div>

  <?php endforeach;?>
  </div>
  <?php  endif; ?>

<!--Add a repository-->
<?php if(count($t->_vars['repositories'])):?>
<?php  if(jAcl2::check('lizmap.admin.repositories.create')):?>
<a class="btn" href="<?php jtpl_function_html_jurl( $t,'admin~config:createSection');?>"><?php echo jLocale::get('admin~admin.configuration.button.add.repository.label'); ?></a>
<?php  endif; ?>
<?php endif;?>
<?php 
}
return true;}
