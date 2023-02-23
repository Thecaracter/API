<?php

//koneksi ke database
include "../koneksi.php";

// cek koneksi
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
$id = $_POST['id'];
// Query untuk menampilkan data
$sql = "SELECT * FROM menus WHERE id_kantin = 1;";
$result = mysqli_query($conn, $sql);

// membuat array kosong untuk menampung data
$menus = array();

// melakukan loop untuk setiap baris hasil query
while ($row = mysqli_fetch_assoc($result)) {
    // menambahkan data ke dalam array
    $menus[] = $row;
}

// menampilkan hasil dalam format JSON
echo json_encode($menus);

// menutup koneksi database
mysqli_close($conn);

?>