<?php

namespace user;

class User
{
    static $dsn = 'sqlite:sql/baza_user.db';
    protected static $db;
    private $sth;

    function __construct()
    {
        session_start();
        self::$db = new PDO(self::$dsn);
        self::$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function _save($obj)
    {
        $this->sth = self::$db->prepare('INSERT INTO uzytkownik VALUES ( :fname, :lname, :email, :pass)');
        $this->sth->bindValue(':fname', $obj->fname, PDO::PARAM_STR);
        $this->sth->bindValue(':lname', $obj->lname, PDO::PARAM_STR);
        $this->sth->bindValue(':email', $obj->email, PDO::PARAM_STR);
        $this->sth->bindValue(':pass', md5($obj->pass), PDO::PARAM_STR);
        $resp = ($this->sth->execute() ? 'true' : 'false');
        return $resp;
    }

    public function _login($obj)
    {
        $access = 'false';
        $this->sth = self::$db->prepare('SELECT pass FROM uzytkownik WHERE email=:email');
        $this->sth->bindValue(':email', $obj->email, PDO::PARAM_STR);

        $this->sth->execute();
        $resp = ($this->sth->fetch());

        if ($resp['pass'] == md5($obj->pass))
        {
            $_SESSION['auth'] = 'OK';
            $_SESSION['uzytkownik'] = $email;
            $access = 'true';
        }

        return $access;
    }

    function _is_logged()
    {
        return (isset($_SESSION['auth']) && ($_SESSION['auth'] == 'OK'));
    }

    function _logout()
    {
        unset($_SESSION);
        session_destroy();
        echo "<p><a href='index.php'>Back to main menu</a></p>";
        // $text = 'User logged out.';
        return 'User logged out.';
    }

}

?>
