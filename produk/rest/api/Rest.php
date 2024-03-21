<?php
class Rest{
private $host = 'localhost';
private $user = 'root';
private $password = "";
private $database = "produkmakanan";
private $wstTable = 'produk';
private $dbConnect = false;
// skrip fungsi-fungsi letakkan/sisipkan disini
public function __construct(){
    if(!$this->dbConnect){
        $conn = new mysqli($this->host, $this->user, $this->password, $this->database);
        if($conn->connect_error){
            die("Error failed to connect to MySQL: " . $conn->connect_error);
        }else{
            $this->dbConnect = $conn;
        }
    }
}
public function getProduk($wstId) {
    $sqlQuery = '';
    if($wstId) {
            $sqlQuery = "WHERE id_produk = '".$wstId."'";
    }
    $wstQuery = "
            SELECT id_produk, nama, harga, stok, expired
            FROM ".$this->wstTable." $sqlQuery
            ORDER BY id_produk ASC";
    $resultData = mysqli_query($this->dbConnect, $wstQuery);
    $wstData = array();
    while( $wstRecord = mysqli_fetch_assoc($resultData) ) {
            $wstData[] = $wstRecord;
    }
    header('Content-Type: application/json');
    echo json_encode($wstData);
}
public function insertProduk($wstData){
    $wstNama=$wstData["nama"];
    $wstHarga=$wstData["harga"];
    $wstStok=$wstData["stok"];
    $wstExpired=$wstData["expired"];
    
    $wstQuery = "
    INSERT INTO ".$this->wstTable."
    SET nama='".$wstNama."', harga='".$wstHarga."', stok='".$wstStok."', expired='".$wstExpired."'";
    mysqli_query($this->dbConnect, $wstQuery);
    if(mysqli_affected_rows($this->dbConnect) > 0) {
            $message = "produk sukses dibuat.";
            $status = 1;
    } else {
            $message = "produk gagal dibuat.";
            $status = 0;
    }
    $wstResponse = array(
            'status' => $status,
            'status_message' => $message
    );
    header('Content-Type: application/json');
    echo json_encode($wstResponse);
}
public function updateProduk($wstData){
    if($wstData["id"]) {
        $wstNama=$wstData["nama"];
        $wstHarga=$wstData["harga"];
        $wstStok=$wstData["stok"];
        $wstExpired=$wstData["expired"];
        
        $wstQuery="
            UPDATE ".$this->wstTable."
            SET nama='".$wstNama."', harga='".$wstHarga."', stok='".$wstStok."', expired='".$wstExpired."'
            WHERE id_produk = '".$wstData["id"]."'";
        mysqli_query($this->dbConnect, $wstQuery);
        if(mysqli_affected_rows($this->dbConnect) > 0) {
                    $message = "produk sukses diperbaiki.";
                    $status = 1;
                } else {
                    $message = "produk gagal diperbaiki.";
                    $status = 0;
                }
        } else {
                $message = "Invalid request.";
                $status = 0;
        }
        $wstResponse = array(
                'status' => $status,
                'status_message' => $message
        );
        header('Content-Type: application/json');
        echo json_encode($wstResponse);
}
public function deleteProduk($wstId) {
    if($wstId) {
            $wstQuery = "
                    DELETE FROM ".$this->wstTable."
                    WHERE id_produk = '".$wstId."'
                    ORDER BY id_produk DESC";
    mysqli_query($this->dbConnect, $wstQuery);
    if(mysqli_affected_rows($this->dbConnect) > 0) {
                    $message = "produk sukses dihapus.";
                    $status = 1;
            } else {
                    $message = "produk gagal dihapus.";
                    $status = 0;
            }
    } else {
            $message = "Invalid request.";
            $status = 0;
    }
    $wstResponse = array(
            'status' => $status,
            'status_message' => $message
    );
    header('Content-Type: application/json');
    echo json_encode($wstResponse);
}
}
?>