<?php

namespace User;

class ModelUser extends ModelBase {

    public function __construct()
    {
        $this->table = "users";
        $this->addFilds = array("email", "pswd");


        $this->funFildsCreate['pswd']['start'] = " MD5(";
        $this->funFildsCreate['pswd']['end'] = ") ";

        $this->funFildsCreate['email']['start'] = " MD5(";
        $this->funFildsCreate['email']['end'] = ") ";

        $this->hasMany('ModelPostAdress', 'user_id', 'id');
        $this->manyToMany('ModelRoles', 'id', 'id',
            'user_roles', 'roles_id', 'user_id' );


    }




}