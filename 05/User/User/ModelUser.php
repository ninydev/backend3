<?php

namespace User;

class ModelUser extends ModelBase {

    public function __construct()
    {
        $this->table = "user";
        $this->addFilds = array("email", "pswd");
    }




}