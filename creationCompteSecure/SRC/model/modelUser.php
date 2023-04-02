<?php


class User {
    private int $id_user;
    private string $name_user;
    private string $surname_user;
    private string $email_user;
    private string $password_user;
    private int $id_rights;
    private int $status_user;
    private string $emailLog_user;
    
    
public function getId():int{
   return $this->id_user;
    }
    
public function setId(int $newId):void{
    $this->id_user= $newId;
    }
public function getName():string{
    return $this->name_user;
}

public function setName(string $newName):void{
    $this->name_user=$newName;
}

public function getSurname():string{
    return $this->surname_user;
}

public function setSurname(string $newSurname):void{
    $this->surname_user = $newSurname;
}

public function getEmail():string{
    return $this->email_user;
}

public function setEmail(string $newEmail):void{
    $this->email_user = $newEmail;
}

public function getPassword():string{
    return $this->password_user;
}

public function setPassword(string $newPassword):void{
    $this->password_user = $newPassword;
}

public function getIdRights():int{
    return $this->id_rights;
}

public function setIdRights(int $newRight):void{
    $this->id_rights = $newRight;
}

public function getStat():int{
    return $this->status_user;
}

public function setStat(int $statusU):void{
    $this->status_user=$statusU;
}

public function getHash():string{
    return $this->emailLog_user;
}

public function setHash(string $newHash):void{
    $this->emailLog_user = $newHash;
}
}



?>