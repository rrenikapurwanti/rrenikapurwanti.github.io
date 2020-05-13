<?php 
if (jApp::config()->compilation['checkCacheFiletime'] &&
filemtime('C:\webserver\lizmap\prod\release_3_3\lizmap/var/themes/default/jacl2db_admin/users_list.tpl') > 1582985478){ return false;
} else {
 require_once('C:\webserver\lizmap\prod\release_3_3\lib\jelix/plugins/tpl/html/meta.html.php');
 require_once('C:\webserver\lizmap\prod\release_3_3\lib\jelix/plugins/tpl/html/function.formurl.php');
 require_once('C:\webserver\lizmap\prod\release_3_3\lib\jelix/plugins/tpl/html/function.formurlparam.php');
 require_once('C:\webserver\lizmap\prod\release_3_3\lib\jelix/plugins/tpl/html/function.jurl.php');
 require_once('C:\webserver\lizmap\prod\release_3_3\lizmap/plugins/tpl/html/function.pagelinks_bootstrap.php');
function template_meta_b576fe98cb16c30e23abad803244d47f($t){
jtpl_meta_html_html( $t,'css',$t->_vars['j_jelixwww'].'design/jacl2.css');

}
function template_b576fe98cb16c30e23abad803244d47f($t){
?>


<h1><?php echo jLocale::get('jacl2db_admin~acl2.users.title'); ?></h1>

<form action="<?php jtpl_function_html_formurl( $t,'jacl2db_admin~users:rights');?>" method="get" class="form-inline">
    <div>
        <label><?php echo jLocale::get('jacl2db_admin~acl2.user.rights.title'); ?></label>
        <input name="user"></input>
        <button type="submit"><?php echo jLocale::get('jacl2db_admin~acl2.show.button'); ?></button>
    </div>
</form>

<form action="<?php jtpl_function_html_formurl( $t,'jacl2db_admin~users:index');?>" method="get" class="form-inline">
<fieldset><legend><?php echo jLocale::get('jacl2db_admin~acl2.filter.title'); ?></legend>
<?php jtpl_function_html_formurlparam( $t,'jacl2db_admin~users:index');?>

    <label for="user-list-group"><?php echo jLocale::get('jacl2db_admin~acl2.filter.group'); ?></label>
    <select name="grpid" id="user-list-group">
    <?php foreach($t->_vars['groups'] as $t->_vars['group']):?>

        <option value="<?php echo $t->_vars['group']->id_aclgrp; ?>" <?php if($t->_vars['group']->id_aclgrp == $t->_vars['grpid']):?>selected="selected"<?php endif;?>><?php echo $t->_vars['group']->name; ?></option>
    <?php endforeach;?>

     </select>
    <label for="user-list-filter"><?php echo jLocale::get('jacl2db_admin~acl2.filter.word'); ?></label>
    <input type="text" name="filter" value="<?php echo htmlspecialchars($t->_vars['filter']); ?>" id="user-list-filter" />
    <br/><input type="submit" value="<?php echo jLocale::get('jacl2db_admin~acl2.show.button'); ?>"  class="btn"/>
</fieldset>
</form>

<?php if($t->_vars['usersCount'] == 0):?>

<p><?php echo jLocale::get('jacl2db_admin~acl2.no.user.message'); ?></p>
<?php else:?>

<table class="records-list table table-hover table-condensed">
<thead>
    <tr>
        <th><?php echo jLocale::get('jacl2db_admin~acl2.col.users'); ?></th>
        <th><?php echo jLocale::get('jacl2db_admin~acl2.col.groups'); ?></th>
        <th></th>
    </tr>
</thead>
<tbody>
<?php $t->_vars['line'] = true;?>

<?php foreach($t->_vars['users'] as $t->_vars['user']):?>
    <tr class="<?php if($t->_vars['line']):?>odd<?php else:?>even<?php endif;?>">
        <td><?php echo $t->_vars['user']->login; ?></td>
        <td><?php foreach($t->_vars['user']->groups as $t->_vars['group']):?> <?php echo $t->_vars['group']->name; ?> <?php endforeach;?></td>
        <td><a href="<?php jtpl_function_html_jurl( $t,'jacl2db_admin~users:rights', array('user'=>$t->_vars['user']->login));?>" class="btn btn-small"><?php echo jLocale::get('jacl2db_admin~acl2.rights.link'); ?></a></td>
    </tr>
<?php $t->_vars['line'] = !$t->_vars['line'];?>
<?php endforeach;?>
</tbody>
</table>
<?php endif;?>

<?php if($t->_vars['usersCount'] > $t->_vars['listPageSize']):?>
<div class="record-pages-list"><?php echo jLocale::get('jacl2db_admin~acl2.pages.links.label'); ?> <?php jtpl_function_html_pagelinks_bootstrap( $t,'jacl2db_admin~users:index', array('grpid'=>$t->_vars['grpid'], 'filter'=>$t->_vars['filter']), $t->_vars['usersCount'], $t->_vars['offset'], $t->_vars['listPageSize'], 'idx' );?></div>
<?php endif;?>




<?php 
}
return true;}
