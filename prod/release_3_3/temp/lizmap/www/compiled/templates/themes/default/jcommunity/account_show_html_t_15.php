<?php 
if (jApp::config()->compilation['checkCacheFiletime'] &&
filemtime('C:\webserver\lizmap\prod\release_3_3\lizmap/var/themes/default/jcommunity/account_show.tpl') > 1582985478){ return false;
} else {
 require_once('C:\webserver\lizmap\prod\release_3_3\lib\jelix/plugins/tpl/html/function.jlocale.php');
 require_once('C:\webserver\lizmap\prod\release_3_3\lib\jelix/plugins/tpl/html/function.ctrl_label.php');
 require_once('C:\webserver\lizmap\prod\release_3_3\lib\jelix/plugins/tpl/html/function.ctrl_value.php');
 require_once('C:\webserver\lizmap\prod\release_3_3\lib\jelix/plugins/tpl/html/function.jurl.php');
function template_meta_18a6ca5d675ac78217d6290167b9ba69($t){

}
function template_18a6ca5d675ac78217d6290167b9ba69($t){
?><div class="jcommunity-box jcommunity-account">
    <h1><?php jtpl_function_html_jlocale( $t,'account.profile.of', array($t->_vars['user']->login));?></h1>
    <div class="jforms-table form-horizontal">
        <?php if($t->_vars['himself']):?>
            <?php  $t->_privateVars['__form'] = $t->_vars['form'];
    $t->_privateVars['__formViewMode'] = 1;
    $t->_privateVars['__formbuilder'] = $t->_privateVars['__form']->getBuilder( 'htmlbootstrap');
    $t->_privateVars['__formbuilder']->setOptions(array());
$t->_privateVars['__displayed_ctrl'] = array();
?>
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
            <div class="control-group">
                <?php jtpl_function_html_ctrl_label( $t);?>
                <div class="controls"><?php jtpl_function_html_ctrl_value( $t);?></div>
            </div>
            <?php }} $t->_privateVars['__ctrlref']='';?>
            <?php 
unset($t->_privateVars['__form']);
unset($t->_privateVars['__formbuilder']);
unset($t->_privateVars['__formViewMode']);
unset($t->_privateVars['__displayed_ctrl']);?>
        <?php else:?>
            <?php  $t->_privateVars['__form'] = $t->_vars['form'];
    $t->_privateVars['__formViewMode'] = 1;
    $t->_privateVars['__formbuilder'] = $t->_privateVars['__form']->getBuilder( 'htmlbootstrap');
    $t->_privateVars['__formbuilder']->setOptions(array());
$t->_privateVars['__displayed_ctrl'] = array();
?>
            <?php if(is_array($t->_vars['publicProperties'])){
                $ctrls_to_display = $t->_vars['publicProperties'];
                $ctrls_notto_display = null;
            }
            else {
                $t->_privateVars['__form'] = $t->_vars['publicProperties'];
                $ctrls_to_display=null;
                $ctrls_notto_display = null;
            }
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
                <div class="control-group">
                    <?php jtpl_function_html_ctrl_label( $t);?>
                    <div class="controls"><?php jtpl_function_html_ctrl_value( $t);?></div>
                </div>
            <?php }} $t->_privateVars['__ctrlref']='';?>
            <?php 
unset($t->_privateVars['__form']);
unset($t->_privateVars['__formbuilder']);
unset($t->_privateVars['__formViewMode']);
unset($t->_privateVars['__displayed_ctrl']);?>
        <?php endif;?>
        <?php foreach($t->_vars['otherInfos'] as $t->_vars['label']=>$t->_vars['value']):?>
            <div class="control-group">
                <label class="jforms-label control-label"><?php echo htmlspecialchars($t->_vars['label']); ?></label>
                <div class="controls"><span class="jforms-value jforms-value-input"><?php echo htmlspecialchars($t->_vars['value']); ?></span></div>
            </div>
        <?php endforeach;?>

    </div>
    <?php echo $t->_vars['additionnalContent']; ?>


    <?php if($t->_vars['himself']):?>
        <ul class="crud-links-list unstyled">
            <?php if($t->_vars['changeAllowed']):?><li><a href="<?php jtpl_function_html_jurl( $t,'jcommunity~account:prepareedit', array('user'=>$t->_vars['user']->login));?>" class="crud-link btn"><?php echo jLocale::get('jcommunity~account.link.profile.edit'); ?></a></li><?php endif;?>
            <?php if($t->_vars['passwordChangeAllowed']):?><li><a href="<?php jtpl_function_html_jurl( $t,'jcommunity~password:index', array('user'=>$t->_vars['user']->login));?>" class="crud-link btn"><?php echo jLocale::get('jcommunity~account.link.account.change.password'); ?></a></li><?php endif;?>
            <?php if($t->_vars['destroyAllowed']):?><li><a href="<?php jtpl_function_html_jurl( $t,'jcommunity~account:destroy', array('user'=>$t->_vars['user']->login));?>" class="crud-link btn"><?php echo jLocale::get('jcommunity~account.link.account.delete'); ?></a></li><?php endif;?>
            <?php foreach($t->_vars['otherPrivateActions'] as $t->_vars['link']=>$t->_vars['label']):?>
                <li><a href="<?php echo $t->_vars['link']; ?>"  class="crud-link btn"><?php echo htmlspecialchars($t->_vars['label']); ?></a></li>
            <?php endforeach;?>

        </ul>
    <?php endif;?>
</div><?php 
}
return true;}
