<?php
// Set header type konten.
header("Content-Type: application/json; charset=UTF-8");

require 'functions.php';

// Deklarasi variable keyword sub_bidang.
$deskripsi_arsip = $_GET["query"];

// Query ke database.
$query  = $koneksi->query("SELECT * FROM kode_arsip WHERE deskripsi_arsip LIKE '%$deskripsi_arsip%' ORDER BY deskripsi_arsip DESC");
$result = $query->fetch_all(MYSQLI_ASSOC);

// Format bentuk data untuk autocomplete.
foreach($result as $data) {
    $output['suggestions'][] = [
        'value' => $data['deskripsi_arsip'],
        'deskripsi_arsip'  => $data['deskripsi_arsip']
    ];
}

if (! empty($output)) {
    // Encode ke format JSON.
    echo json_encode($output);
}else{
	$output['suggestions'] = '';
	echo json_encode($output);
}