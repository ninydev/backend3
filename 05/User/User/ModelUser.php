<?php

namespace User;

class ModelUser extends ModelBase {

    public function __construct()
    {
        $this->table = "user";
        $this->addFilds = array("email", "pswd");


        $this->funFildsCreate['pswd']['start'] = " MD5(";
        $this->funFildsCreate['pswd']['end'] = ") ";

        $this->funFildsCreate['email']['start'] = " MD5(";
        $this->funFildsCreate['email']['end'] = ") ";


    }




}