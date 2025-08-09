<?php
class Database
{
  private $host = DB_HOST;
  private $user = DB_USER;
  private $pass = DB_PASS;
  private $db_name = DB_NAME;

  // database handler
  private $dbh;
  // statement query
  private $stmt;

  public function __construct()
  {
    //database source name
    $dsn = "mysql:host=" . $this->host . ";dbname=" . $this->db_name;

    // optimasi ke databse
    $option = [
      // membuat supaya koneksi ke database terjaga selalu
      PDO::ATTR_PERSISTENT => true,
      //menampilkan error mode dari koneksi database dengan exception
      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ];

    try {
      $this->dbh = new PDO($dsn, $this->user, $this->pass, $option);
    } catch (PDOException $error) {
      die($error->getMessage());
    }
  }

  //mempersiapkan query untuk digunakan crud
  public function query($query)
  {
    $this->stmt = $this->dbh->prepare($query);
  }

  public function bind($param, $value, $type = null)
  {
    if (is_null($type)) {
      switch (true) {
        case is_int($value):
          $type = PDO::PARAM_INT;
          break;
        case is_bool($value):
          $type = PDO::PARAM_BOOL;
          break;
        case is_null($value):
          $type = PDO::PARAM_NULL;
          break;
        default:
          $type = PDO::PARAM_STR;
      }
    }
    $this->stmt->bindValue($param, $value, $type);
  }

  public function execute()
  {
    $this->stmt->execute();
  }

  public function resultSet()
  {
    $this->execute();
    return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public function single()
  {
    $this->execute();
    return $this->stmt->fetch(PDO::FETCH_ASSOC);
  }

  //untuk cek ada berapa baris yang ditambah,edit atau hapus dengan method ini
  public function rowCount()
  {
    //rowCount() milik PDO
    return $this->stmt->rowCount();
  }
}