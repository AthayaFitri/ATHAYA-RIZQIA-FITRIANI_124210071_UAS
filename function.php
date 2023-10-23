<?php
    $f = 0 ; $n = 0;
    $conn = mysqli_connect("localhost","root","","myfriendsapp");
    //Check connection
    if(!$conn)
        die("<script> alert('Gagal tersambung dengan database !') </script>");

    function query($sql){
        global $conn;
        $result = mysqli_query($conn, $sql);
        $rows = [];

        while($row = mysqli_fetch_assoc($result)){
            $rows[] = $row;
        }
        
        return $rows;
    }

    function upload(){
        global $f, $n;
        $namaFile = $_FILES['foto']['name'];
        $ukuranFile = $_FILES['foto']['size'];
        $error = $_FILES['foto']['error'];
        $tmpName = $_FILES['foto']['tmp_name'];

        //Cek apakah tidak terdapat gambar yang diupload
        if($error === 4){
            echo "<script> alert('Pilih gambar terlebih dahulu !'); </script>";
            return false;
        }
        //Cek apakah yang diupload adalah images
        $ekstensiGambarValid = ['jpg','jpeg','png'];
        $ekstensiGambar = explode('.', $namaFile);
        $ekstensiGambar = strtolower(end($ekstensiGambar));
        if(!in_array($ekstensiGambar, $ekstensiGambarValid)){
            echo "<script> alert('Format gambar tidak valid ! Format (jpg, jpeg, png).'); </script>";
            return false;
        }
        //Cek jika ukuran terlalu besar
        if($ukuranFile > 5000000){
            echo "<script> alert('Ukuran gambar terlalu besar ! Max 5 mb.'); </script>";
            return false;
        }
        //Lolos pengecekan, gambar siap diupload
        //Generate nama gambar baru
        $namaFileBaru = uniqid();
        $namaFileBaru .= '.';
        $namaFileBaru .= $ekstensiGambar;

        if($f === 1){
            move_uploaded_file($tmpName, 'myFriendsPict/' . $namaFileBaru);
        }
        if($n === 1){
            move_uploaded_file($tmpName, 'myNotesPict/' . $namaFileBaru);
        }
        $f = 0; $n = 0;
        return $namaFileBaru;
    }

    function deleteFoto($id){
        global $conn, $f, $n;
        if($f === 1)
            $img = "SELECT foto FROM myfriends WHERE id = $id";
        if($n === 1)
            $img = "SELECT foto FROM mydays WHERE id = $id";
        $result = $conn->query($img);
        $row = $result->fetch_assoc();
        if($f === 1){
            if(file_exists("myFriendsPict/$row[foto]")){
                unlink("myFriendsPict/$row[foto]");
            }
        }
        if($n === 1){
            if(file_exists("myNotesPict/$row[foto]")){
                unlink("myNotesPict/$row[foto]");
            }
        }
        $f = 0; $n = 0;
    }

    function insertFriend($bio){
        global $conn, $f;
        $f = 1;
        $nama = htmlspecialchars($bio['nama']);
        $nohp = htmlspecialchars($bio['nohp']);
        $alamat = htmlspecialchars($bio['alamat']);
        
        //Upload foto
        $foto = upload();
        if(!$foto){
            return false;
        }

        $query = "INSERT INTO myfriends VALUES ('','$nama','$nohp','$alamat','$foto')";
        mysqli_query($conn, $query);

        return mysqli_affected_rows($conn);
    }

    function editFriend($bio){
        global $conn, $f;
        $f = 1;
        $id = $bio['id'];
        $nama = htmlspecialchars($bio['nama']);
        $nohp = htmlspecialchars($bio['nohp']);
        $alamat = htmlspecialchars($bio['alamat']);
        $prefoto = htmlspecialchars($bio['foto']);

        //Cek apakah user memilih gambar baru
        if($_FILES['foto']['error'] === 4){
            $foto = $prefoto;
        }else{
            deleteFoto($id);
            $f = 1;
            $foto = upload();
        }

        $query = "UPDATE myfriends SET
                id = $id,
                nama = '$nama',
                nohp = '$nohp',
                alamat = '$alamat',
                foto = '$foto'
                WHERE id = $id";
        mysqli_query($conn, $query);

        return mysqli_affected_rows($conn);
    }

    function deleteFriend($id){
        global $conn, $f;
        $f = 1;
        deleteFoto($id);

        $query = "DELETE FROM myfriends WHERE id = $id";
        mysqli_query($conn, $query);

        return mysqli_affected_rows($conn);
    }

    function insertNote($note){
        global $conn, $n;
        $n = 1;
        $tanggal = $note['tanggal'];
        $waktu = $note['waktu'];
        $warna = $note['warna'];
        $judul = htmlspecialchars($note['judul']);
        $catatan = htmlspecialchars($note['catatan']);

        //Upload foto
        if($_FILES['foto']['error'] === 0){
            $foto = upload();
            if(!$foto){
                return false;
            }
        }

        $query = "INSERT INTO mydays VALUES ('','$tanggal','$waktu','$warna','$judul','$catatan','$foto')";
        mysqli_query($conn, $query);

        return mysqli_affected_rows($conn);
    }

    function editNote($note){
        global $conn, $n;
        $n = 1;
        $id = $note['id'];
        $tanggal = $note['tanggal'];
        $waktu = $note['waktu'];
        $warna = $note['warna'];
        $judul = htmlspecialchars($note['judul']);
        $catatan = htmlspecialchars($note['catatan']);
        $prefoto = htmlspecialchars($note['foto']);

        //Cek apakah user memilih gambar baru
        if($_FILES['foto']['error'] === 4){
            $foto = $prefoto;
        }else{
            deleteFoto($id);
            $n = 1;
            $foto = upload();
        }

        $query = "UPDATE mydays SET
                id = $id,
                tanggal = '$tanggal',
                waktu = '$waktu',
                warna = '$warna',
                judul = '$judul',
                catatan = '$catatan',
                foto = '$foto'
                WHERE id = $id";
        mysqli_query($conn, $query);

        return mysqli_affected_rows($conn);
    }

    function deleteNote($id){
        global $conn, $n;
        $n = 1;
        deleteFoto($id);

        $query = "DELETE FROM mydays WHERE id = $id";
        mysqli_query($conn, $query);

        return mysqli_affected_rows($conn);
    }
?>