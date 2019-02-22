<?php

// $siswa = [
// 	[
// 		"nama" => "Faza Iman Imron",
// 		"nis" => "16830",
// 		"email" => "cincaumyself@gmail.com",
// 	],
// 	[
// 		"nama" => "Armananda Maulana",
// 		"nis" => "16820",
// 		"email" => "n.armanada@gmail.com",
// 	]
// ];

$dbh = new PDO('mysql:host=localhost;dbname=phpdasar', 'root', '');

$db = $dbh->prepare('SELECT * FROM siswa');
$db->execute();
$siswa = $db->fetchAll(PDO::FETCH_ASSOC);

$data = json_encode($siswa);
echo $data;

?>