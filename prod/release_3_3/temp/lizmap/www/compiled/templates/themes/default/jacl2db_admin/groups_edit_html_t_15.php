<?php 
if (jApp::config()->compilation['checkCacheFiletime'] &&
filemtime('C:\webserver\lizmap\prod\release_3_3\lizmap/var/themes/default/jacl2db_admin/groups_edit.tpl') > 1582985478){ return false;
} else {
 require_once('C:\webserver\lizmap\prod\release_3_3\lib\jelix/plugins/tpl/html/meta.html.php');
 require_once('C:\webserver\lizmap\prod\release_3_3\lib\jelix/plugins/tpl/html/function.jurl.php');
 require_once('C:\webserver\lizmap\prod\release_3_3\lib\jelix/plugins/tpl/html/function.formurl.php');
 require_once('C:\webserver\lizmap\prod\release_3_3\lib\jelix/plugins/tpl/html/function.formurlparam.php');
function template_meta_7158b5fa80c2faa490e672fea9508a6b($t){
jtpl_meta_html_html( $t,'css',$t->_vars['j_jelixwww'].'design/jacl2.css');

}
function template_7158b5fa80c2faa490e672fea9508a6b($t){
?>

<h1><?php echo jLocale::get('jacl2db_admin~acl2.groups.title'); ?></h1>

<?php  if(jAcl2::check('acl.group.modify')):?>


<p><a href="<?php jtpl_function_html_jurl( $t,'jacl2db_admin~groups:rights');?>" class="btn"><?php echo jLocale::get('jacl2db_admin~acl2.groups.change.rights.link'); ?></a></p>

<form action="<?php jtpl_function_html_formurl( $t,'jacl2db_admin~groups:setdefault');?>" method="post" class="form-inline">
<fieldset><legend><?php echo jLocale::get('jacl2db_admin~acl2.groups.new.users.title'); ?></legend>
<?php jtpl_function_html_formurlparam( $t,'jacl2db_admin~groups:setdefault');?>
    <?php foreach($t->_vars['groups'] as $t->_vars['group']):?>
       <label class="checkbox inline"><input type="checkbox" name="groups[]" value="<?php echo $t->_vars['group']->id_aclgrp; ?>" <?php if($t->_vars['group']->grouptype > 0):?>checked="checked"<?php endif;?>/> <?php echo $t->_vars['group']->name; ?> (<?php echo $t->_vars['group']->id_aclgrp; ?>)</label>
    <?php endforeach;?>

  <div class="form-actions">
    <input type="submit" value="<?php echo jLocale::get('jacl2db_admin~acl2.setdefault.button'); ?>" class="btn"/>
  </div>
</fieldset>
</form>

<form action="<?php jtpl_function_html_formurl( $t,'jacl2db_admin~groups:changename');?>" method="post" class="form-horizontal">
<fieldset><legend><?php echo jLocale::get('jacl2db_admin~acl2.change.name.title'); ?></legend>
<?php jtpl_function_html_formurlparam( $t,'jacl2db_admin~groups:changename');?>

  <div class="control-group">
    <div class="controls">
    <select name="group_id">
    <?php foreach($t->_vars['groups'] as $t->_vars['group']):?>
        <?php if($t->_vars['group']->id_aclgrp != '__anonymous'):?><option value="<?php echo $t->_vars['group']->id_aclgrp; ?>"><?php echo $t->_vars['group']->name; ?></option><?php endif;?>
    <?php endforeach;?>
    </select>
    </div>
  </div>

  <div class="control-group">
    <label class="control-label" for="newname"><?php echo jLocale::get('jacl2db_admin~acl2.new.name.label'); ?></label>
    <div class="controls">
    <input id="newname" name="newname" />
    </div>
  </div>

  <div class="form-actions">
    <input type="submit" value="<?php echo jLocale::get('jacl2db_admin~acl2.rename.button'); ?>" class="btn"/>
  </div>
</fieldset>
</form>
<?php  endif; ?>


<?php  if(jAcl2::check('acl.group.create')):?>
<form action="<?php jtpl_function_html_formurl( $t,'jacl2db_admin~groups:newgroup');?>" method="post" class="form-horizontal">
<fieldset><legend><?php echo jLocale::get('jacl2db_admin~acl2.create.group'); ?></legend>
<?php jtpl_function_html_formurlparam( $t,'jacl2db_admin~groups:newgroup');?>
  <div class="control-group">
    <label class="control-label" for="newgroup"><?php echo jLocale::get('jacl2db_admin~acl2.group.name.label'); ?></label>
    <div class="controls">
    <input id="newgroup" name="newgroup" />
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="newgroupid"><?php echo jLocale::get('jacl2db_admin~acl2.group.name.id'); ?></label>
    <div class="controls">
    <input id="newgroupid" name="newgroupid" />
    </div>
  </div>
  <div class="form-actions">
    <input type="submit" value="<?php echo jLocale::get('jacl2db_admin~acl2.save.button'); ?>" class="btn"/>
  </div>
</fieldset>
</form>
<?php  endif; ?>


<?php  if(jAcl2::check('acl.group.delete')):?>
<form action="<?php jtpl_function_html_formurl( $t,'jacl2db_admin~groups:delgroup');?>" method="post" class="form-horizontal">
<fieldset><legend><?php echo jLocale::get('jacl2db_admin~acl2.delete.group'); ?></legend>
<?php jtpl_function_html_formurlparam( $t,'jacl2db_admin~groups:delgroup');?>
  <div class="control-group">
    <div class="controls">
    <select name="group_id">
    <?php foreach($t->_vars['groups'] as $t->_vars['group']):?>
        <?php if($t->_vars['group']->id_aclgrp != '__anonymous'):?><option value="<?php echo $t->_vars['group']->id_aclgrp; ?>"><?php echo $t->_vars['group']->name; ?></option><?php endif;?>
    <?php endforeach;?>
     </select>
    </div>
  </div>

  <div class="form-actions">
    <input type="submit" value="<?php echo jLocale::get('jacl2db_admin~acl2.delete.button'); ?>" class="btn"/>
  </div>
</fieldset>
</form>
<?php  endif; ?>


<?php 
}
return true;}
