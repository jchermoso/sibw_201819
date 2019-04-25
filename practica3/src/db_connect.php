<?php 
class Connect {
    public function __construct($user,$passwd,$db,$host='localhost') {
        $this->user=$user;
        $this->passwd=$passwd;
        $this->db=$db;
        $this->host=$host;
        
        var_dump($this);
        
        exit();
    }
    protected function connection() {
        return new mysqli($this->host,$this->user,$this->passwd,$this->db);
    }
}


if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

if ($result = $mysqli->query("SELECT DATABASE()")) {
    $row = $result->fetch_row();
    printf("Default database is %s.\n", $row[0]);
    $result->close();
}

$mysqli->close();

?>
