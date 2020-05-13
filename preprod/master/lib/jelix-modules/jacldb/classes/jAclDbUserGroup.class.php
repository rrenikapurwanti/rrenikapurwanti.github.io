<?php
/**
* @package     jelix
* @subpackage  acl
* @author      Laurent Jouanneau
* @copyright   2006-2009 Laurent Jouanneau
* @link        http://www.jelix.org
* @licence     http://www.gnu.org/licenses/lgpl.html GNU Lesser General Public Licence, see LICENCE file
* @since 1.0a3
*/

/**
 * Use this class to register or unregister users in the acl system, and to manage user groups.
 *  Works only with db driver of jAcl.
 * @package     jelix
 * @subpackage  acl
 * @static
 */
class jAclDbUserGroup {

    /**
     * @internal The constructor is private, because all methods are static
     */
    private function __construct (){ }

    /**
     * Indicates if the current user is a member of the given user group
     * @param int $groupid The id of a group
     * @return boolean true if it's ok
     * @since 1.0b3
     */
    public static function isMemberOfGroup ($groupid){
        $groups = self::getGroups();
        return in_array($groupid, $groups);
    }

    /**
     * Retrieve the list of group the current user is member of
     * @return array list of group id
     * @since 1.0b3
     */
    public static function getGroups(){
        static $groups = null;

        if(!jAuth::isConnected())
            return array();

        // load the groups
        if($groups === null){
            $dao = jDao::get('jacldb~jaclusergroup', 'jacl_profile');
            $gp = $dao->getGroupsUser(jAuth::getUserSession()->login);
            $groups = array();
            foreach($gp as $g){
                $groups[]=intval($g->id_aclgrp);
            }
        }
        return $groups;
    }


    /**
     * get the list of the users of a group
     * @param int $groupid  id of the user group
     * @return array a list of users object (dao records)
     */
    public static function getUsersList($groupid){
        $dao = jDao::get('jacldb~jaclusergroup', 'jacl_profile');
        return $dao->getUsersGroup($groupid);
    }

    /**
     * register a user in the acl system
     *
     * For example, this method is called by the acl module when responding
     * to the event generated by the auth module when a user is created.
     * When a user is registered, a private group is created.
     * @param string $login the user login
     * @param boolean $defaultGroup if true, the user become the member of default groups
     */
    public static function createUser($login, $defaultGroup=true){
        $daousergroup = jDao::get('jacldb~jaclusergroup','jacl_profile');
        $daogroup = jDao::get('jacldb~jaclgroup','jacl_profile');
        $usergrp = jDao::createRecord('jacldb~jaclusergroup','jacl_profile');
        $usergrp->login =$login;

        // if $defaultGroup -> assign the user to the default group(s)
        if($defaultGroup){
            $defgrp = $daogroup->getDefaultGroups();
            foreach($defgrp as $group){
                $usergrp->id_aclgrp = $group->id_aclgrp;
                $daousergroup->insert($usergrp);
            }
        }

        // create a personal group
        $persgrp = jDao::createRecord('jacldb~jaclgroup','jacl_profile');
        $persgrp->name = $login;
        $persgrp->grouptype = 2;
        $persgrp->ownerlogin = $login;

        $daogroup->insert($persgrp);
        $usergrp->id_aclgrp = $persgrp->id_aclgrp;
        $daousergroup->insert($usergrp);
    }

    /**
     * add a user into a group
     *
     * (a user can be a member of several groups)
     * @param string $login the user login
     * @param int $groupid the group id
     */
    public static function addUserToGroup($login, $groupid){
        $daousergroup = jDao::get('jacldb~jaclusergroup','jacl_profile');
        $usergrp = jDao::createRecord('jacldb~jaclusergroup','jacl_profile');
        $usergrp->login =$login;
        $usergrp->id_aclgrp = $groupid;
        $daousergroup->insert($usergrp);
    }

    /**
     * remove a user from a group
     * @param string $login the user login
     * @param int $groupid the group id
     */
    public static function removeUserFromGroup($login,$groupid){
        $daousergroup = jDao::get('jacldb~jaclusergroup','jacl_profile');
        $daousergroup->delete($login,$groupid);
    }

    /**
     * unregister a user in the acl system
     * @param string $login the user login
     */
    public static function removeUser($login){
        $daogroup = jDao::get('jacldb~jaclgroup','jacl_profile');
        $daoright = jDao::get('jacldb~jaclrights','jacl_profile');
        $daousergroup = jDao::get('jacldb~jaclusergroup','jacl_profile');

        // get the private group
        $privategrp = $daogroup->getPrivateGroup($login);
        if(!$privategrp) return;

        // delete the rights on the private group (jacl_rights)
        $daoright->deleteByGroup($privategrp->id_aclgrp);

        // remove the user's personal group (jacl_group)
        $daogroup->delete($privategrp->id_aclgrp);

        // remove from all the groups (jacl_users_group)
        $daousergroup->deleteByUser($login);
    }

    /**
     * create a new group
     * @param string $name its name
     * @return int the id of the new group
     */
    public static function createGroup($name){
        $group = jDao::createRecord('jacldb~jaclgroup','jacl_profile');
        $group->name=$name;
        $group->grouptype=0;
        $daogroup = jDao::get('jacldb~jaclgroup','jacl_profile');
        $daogroup->insert($group);
        return $group->id_aclgrp;
    }

    /**
     * set a group to be default (or not)
     *
     * there can have several default group. A default group is a group
     * where a user is assigned to during its registration
     * @param int $groupid the group id
     * @param boolean $default true if the group is to be default, else false
     */
    public static function setDefaultGroup($groupid, $default=true){
        $daogroup = jDao::get('jacldb~jaclgroup','jacl_profile');
        if($default)
            $daogroup->setToDefault($groupid);
        else
            $daogroup->setToNormal($groupid);
    }

    /**
     * change the name of a group
     * @param int $groupid the group id
     * @param string $name the new name
     */
    public static function updateGroup($groupid, $name){
        $daogroup = jDao::get('jacldb~jaclgroup','jacl_profile');
        $daogroup->changeName($groupid,$name);
    }

    /**
     * delete a group from the acl system
     * @param int $groupid the group id
     */
    public static function removeGroup($groupid){
        $daogroup = jDao::get('jacldb~jaclgroup','jacl_profile');
        $daoright = jDao::get('jacldb~jaclrights','jacl_profile');
        $daousergroup = jDao::get('jacldb~jaclusergroup','jacl_profile');
        // remove all the rights attached to the group
        $daoright->deleteByGroup($groupid);
        // remove the users from the group
        $daousergroup->deleteByGroup($groupid);
        // remove the group itself
        $daogroup->delete($groupid);
    }

    /**
     * return a list of group.
     *
     * if a login is given, it returns only the groups of the user.
     * Else it returns all groups (except private groups)
     * @param string $login an optional login
     * @return array a list of groups object (dao records)
     */
    public static function getGroupList($login=''){
        if ($login === '') {
            $daogroup = jDao::get('jacldb~jaclgroup','jacl_profile');
            return $daogroup->findAllPublicGroup();
        }else{
            $daogroup = jDao::get('jacldb~jaclgroupsofuser','jacl_profile');
            return $daogroup->getGroupsUser($login);
        }
    }
}
