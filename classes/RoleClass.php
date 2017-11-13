<?php
/**
 * Created by PhpStorm.
 * User: praktikant
 * Date: 13.11.2017
 * Time: 10:28
 */

class RoleClass
{
    protected $permissions;

    protected function __construct($DB_con)
    {
        $this->permissions = array();
    }

    //return role with perm
    public static function getRolePerms($roleID)
    {
        $role = new Role();
        $stmt = "SELECT t2.perm_desc FROM role_perm as t1
                JOIN permissions as t2 ON t1.perm_id = t2.perm_id
                WHERE t1.role_id = :role_id";
        $sth = $GLOBALS["DB"]->prepare($stmt);
        $sth->execute(array(":roleID" => $roleID));

        while ($row = $sth->fetch(PDO::FETCH_ASSOC)) {
            $role->permissions[$row["perm_desc"]] = true;
        }
        return $role;

    }

    public function hasPerm($permission) {
        return isset($this->permissions[$permission]);
    }
}