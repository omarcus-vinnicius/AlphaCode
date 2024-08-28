<?php

namespace App\Models\BD;

use App\Database\Database;

class ModelUser extends Database
{

  public function __construct()
  {
    parent::__construct();
  }


  public function getUsers()
  {
    $res = $this->pdo->query("SELECT id, name, mail, birthday, phone, occupation, cellphone, actived FROM contacts WHERE actived=1 order by id desc")->fetchAll(\PDO::FETCH_ASSOC);

    if (count($res) === 0)
      return null;

    return $res;

  }

  public function getUsers_Id($id)
  {
    $res = $this->pdo->query("SELECT id, name, mail, birthday, phone, occupation, cellphone, actived FROM contacts WHERE id=$id;")->fetchAll(\PDO::FETCH_ASSOC);

    if (count($res) === 0)
      return null;

    return $res;

  }



  public function getContactByMail($mail)
  {
    $query = $this->pdo->prepare('SELECT mail FROM contacts WHERE actived = 1 AND mail = ?');
    $query->execute([$mail]);

    $result = $query->fetchAll(\PDO::FETCH_ASSOC);

    return $result;
  }

  public function getContactByPhone($phone)
  {
    $query = $this->pdo->prepare('SELECT phone FROM contacts WHERE actived = 1 AND phone = ?');
    $query->execute([$phone]);

    $result = $query->fetchAll(\PDO::FETCH_ASSOC);

    return $result;
  }



  public function getContactByMailUpdate($id, $mail)
  {
    $query = $this->pdo->prepare('SELECT mail FROM contacts WHERE actived = 1 AND id != ?  AND mail = ?');
    $query->execute([$id,$mail]);

    $result = $query->fetchAll(\PDO::FETCH_ASSOC);

    return $result;
  }

  public function getContactByPhoneUpdate($id, $phone)
  {
    $query = $this->pdo->prepare('SELECT phone FROM contacts WHERE actived = 1 AND id != ? AND  phone = ?');
    $query->execute([$id, $phone]);

    $result = $query->fetchAll(\PDO::FETCH_ASSOC);

    return $result;
  }




  public function createUsers($newuser)
  {
    date_default_timezone_set('America/Sao_Paulo');
    try {

      $statement = $this->pdo
        ->prepare("INSERT INTO contacts (name, mail, birthday, occupation, phone, cellphone, send_wpp, send_mail_permission, send_sms_permission, actived, created_at, updated_at)
      value (:name, :mail, :birthday, :occupation, :phone, :cellphone, :send_wpp, :send_mail_permission, :send_sms_permission, :actived, :created_at, :updated_at);");

      $statement->execute([
        'name' => $newuser['name'],
        'mail' => $newuser['mail'],
        'birthday' => $newuser['birthday'],
        'occupation' => $newuser['occupation'],
        'phone' => $newuser['phone'],
        'cellphone' => $newuser['cellphone'],
        'send_wpp' => $newuser['send_wpp'],
        'send_mail_permission' => $newuser['send_mail_permission'],
        'send_sms_permission' => $newuser['send_sms_permission'],
        'actived' => 1,
        'created_at' =>  date("Y-m-d H:i:s"),
        'updated_at' => null,
      ]);

      return true;

    } catch (\PDOException $pDOException) {
      $res = ['statuSql' => $pDOException->getCode(), 'msg' => $pDOException->getMessage()];
      return $res;

    }


  }

  public function updateUsers($id, $userupdate)
  {
    date_default_timezone_set('America/Sao_Paulo');
    try {

      $statement = $this->pdo
        ->prepare("UPDATE contacts 
        set name=:name, 
        mail=:mail,
        birthday=:birthday, 
        occupation=:occupation,
        phone=:phone,
        cellphone=:cellphone, 
        send_wpp=:send_wpp,
        send_mail_permission=:send_mail_permission,
        send_sms_permission=:send_sms_permission,
        updated_at=:updated_at
        WHERE id=:id;");


      $statement->execute([
        'id' => $id,
        'name' => $userupdate['name'],
        'mail' => $userupdate['mail'],
        'birthday' => $userupdate['birthday'],
        'occupation' => $userupdate['occupation'],
        'phone' => $userupdate['phone'],
        'cellphone' => $userupdate['cellphone'],
        'send_wpp' => $userupdate['send_wpp'],
        'send_mail_permission' => $userupdate['send_mail_permission'],
        'send_sms_permission' => $userupdate['send_sms_permission'],
        'updated_at' => date("Y-m-d H:i:s")
      ]);

      return true;

    } catch (\PDOException $pDOException) {
      $res = ['statuSql'=>$pDOException->getCode(),'msg' =>$pDOException->getMessage()];
      return $res;

    }
  }


  public function deleteUsers($id)
  {

      $statement = $this->pdo
        ->prepare("UPDATE contacts 
        set actived=:actived
        WHERE id=:id;");

      $statement->execute([
        'id' => $id,
        'actived' => 0
      ]);

      return true;


  }


}





?>