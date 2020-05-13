<?php 
if (jApp::config()->compilation['checkCacheFiletime'] &&

filemtime('C:\webserver\lizmap\prod\release_3_3\lizmap/modules/lizmap/forms/account.form.xml') > 1582985478){ return false;
}else{

class cForm_lizmap_Jx_account extends jFormsBase {
 public function __construct($sel, &$container, $reset = false){
          parent::__construct($sel, $container, $reset);
$ctrl= new jFormsControloutput('login');
$ctrl->label=jLocale::get('jcommunity~account.form.login');
$this->addControl($ctrl);
$ctrl= new jFormsControlinput('email');
$ctrl->datatype= new jDatatypeemail();
$ctrl->required=true;
$ctrl->label=jLocale::get('jcommunity~account.form.email');
$this->addControl($ctrl);
$ctrl= new jFormsControlinput('firstname');
$ctrl->datatype->addFacet('maxLength',100);
$ctrl->label=jLocale::get('view~user.form.firstname.label');
$this->addControl($ctrl);
$ctrl= new jFormsControlinput('lastname');
$ctrl->datatype->addFacet('maxLength',100);
$ctrl->label=jLocale::get('view~user.form.lastname.label');
$this->addControl($ctrl);
$ctrl= new jFormsControlinput('organization');
$ctrl->datatype->addFacet('maxLength',100);
$ctrl->label=jLocale::get('view~user.form.organization.label');
$this->addControl($ctrl);
$ctrl= new jFormsControlinput('phonenumber');
$ctrl->datatype->addFacet('maxLength',20);
$ctrl->label=jLocale::get('view~user.form.phonenumber.label');
$this->addControl($ctrl);
$ctrl= new jFormsControlinput('street');
$ctrl->datatype->addFacet('maxLength',150);
$ctrl->label=jLocale::get('view~user.form.street.label');
$this->addControl($ctrl);
$ctrl= new jFormsControlinput('postcode');
$ctrl->datatype->addFacet('maxLength',10);
$ctrl->label=jLocale::get('view~user.form.postcode.label');
$this->addControl($ctrl);
$ctrl= new jFormsControlinput('city');
$ctrl->datatype->addFacet('maxLength',150);
$ctrl->label=jLocale::get('view~user.form.city.label');
$this->addControl($ctrl);
$ctrl= new jFormsControlinput('country');
$ctrl->datatype->addFacet('maxLength',100);
$ctrl->label=jLocale::get('view~user.form.country.label');
$this->addControl($ctrl);
$ctrl= new jFormsControltextarea('comment');
$ctrl->datatype->addFacet('maxLength',300);
$ctrl->label=jLocale::get('admin~user.form.comment.label');
$this->addControl($ctrl);
$ctrl= new jFormsControlsubmit('acc_submit');
$ctrl->label=jLocale::get('jcommunity~account.form.submit');
$ctrl->datasource= new jFormsStaticDatasource();
$this->addControl($ctrl);
  }
}
 return true;}