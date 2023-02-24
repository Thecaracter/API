<?php
// koneksi ke database
include "../koneksi.php";

// cek koneksi
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// cek apakah parameter id_kantin ada dalam request
if (isset($_POST['id_kantin'])) {
    $id = $_POST['id_kantin'];
    // Query untuk menampilkan data menu yang sesuai
    $sql = "SELECT * FROM menus WHERE id_kantin = $id;";
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
} else {
    // jika parameter id_kantin tidak ada dalam request, kirimkan response error
    http_response_code(400);
    echo json_encode(array('message' => 'Parameter id_kantin diperlukan'));
}

// menutup koneksi database
mysqli_close($conn);
?>