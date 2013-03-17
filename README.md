nanas
=====

Simplest MVC php Framework

<h1>How It Works</h1>
=======
Simplest MVC php Framework.

Nanas framework dibangunkan atas tujuan memudahkan pengaturcaraan PHP dengan konsep MVC (Model View Controller). MVC adalah satu konsep OOP (object oriented programming) dalam PHP. Dengan adanya MVC, satu pengaturcaraan PHP dapat dibangunkan dengan mudah dah teratur.

Bagi sesiapa yang baru mengenali MVC, penggunaan Nanas amatlah sesuai kerana Nanas tidak mengandungi struktur yang kompleks. 

<h1>Asas Nanas</h1>

Asas bagi MVC adalah:

<h3>M : Model</h3>
- Model merupakan kelas yang mengawal logik data. Seperti PHP framework yg lain model Nanas tertujuaan untuk menghubungkan sistem dengan database. Dengan adanya model, pengurusan data akan lebih teratur.

<h3>V : View</h3>
- View merupakan kumpulan fail paparan ataupun class yang mengawal paparan (interface). View didalam framework Nanas merupakan pengaturcaraan asas laman sesawang seperti HTML, JS, CSS. Jika anda biasa dengan pengaturcaraan laman sesawang pastinya anda tahu untuk mengawal fail-fail ini. Didalam Nanas fail HTML tidak dipanggil terus dari URL sebaliknya ditukar ke fail PHP kemudian dibaca oleh Controller.

<h3>C: Controller</h3>
- Controller seperti dalam terjemahan merupakan ketua atau pengawal segala pengaturcaraan didalam Nanas. Controller merupakan nadi dalam MVC. Controller tertujuan untuk memanggil kelas Model untuk mendapatkan data dan memanggil kelas View untuk dipaparkan kepada pengguna.

<h2>MYSQLI</h2>
- Setakat ini nanas hanya pernah dibangunkan dengan database MYSQL. Ini kerana Nanas menggunakan MySQLi didalam Model. Tetapi database lain juga boleh digunakan tetapi anda perlu mengubah fail Model dalam libs.

<h2>FIXHEADER</h2>
- Fixheader adalah satu cara dimana semua link esset didalam fail view tidak perlu diubah. Fixheader wajib diletakkan didalam dead setiap fail view, code fixheader ialah <?= $this->fixheaderl ?>

<h2>Bonus</h2>

A: Ajaxs
- Ajax adalah satu cara dimana sistem dalam membuat permintaan ke server tanpa menggangu paparan pengguna. Didalam nanas ajax dapat diaturcara berasingan dengan javascript paparan kerana Nanas terdapat folder Ajax berasingan. Untuk nanas, pengguna ajax dapat dilakukan dengan membuat fail javascript dengan nama sama seperti file view, contoh: 

Fail view: index.php
Fail ajax: index_ajax.js

-kemudian tambah code php ini <?= $ajax; ?> dalam fail view. Dengan ini fail ajax tersebut akan dipangil didalam fail view.

<h1>Cara Penggunaan</h1>

Clone atau zip nanas kedalam komputer anda. Copy nanas didalam folder website seperti htdocs atau www. Pastikan anda mengubah file configure.php didalam folder libs.Untuk pembangunan localhost, anda digalakkan menggunakan IP didalam configure FIXHEADER. Ini kerana ajaxs tidak akan berfungsi tanpa IP. Pastikan database configure diubah mengikut database anda.

Cara penggunaan akan dikemaskini 