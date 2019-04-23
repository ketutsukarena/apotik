<table class="table table-striped ">
    <tbody>
        <tr>
            <td style="width: 20%;">Nama - Level</td>
            <td><?php echo $datauser->nama_user." - ". $datauser->level_user ?> </td>
        </tr>
        <tr>
            <td>Username</td>
            <td><?php echo $datauser->username ?></td>
        </tr>
        <tr>
            <td>Alamat</td>
            <td><?php echo $datauser->alamat_user ?></td>
        </tr>
        <tr>
            <td>Tanggal Lahir</td>
            <td><?php echo $datauser->tgllahir_user ?></td>
        </tr>
        <tr>
            <td>Jenis Kelamin</td>
            <td><?php
                    if($datauser->jeniskelamin_user == "l"){
                        echo "Laki-laki";
                    }else{
                        echo "Perempuan";
                    } 
            ?></td>
        </tr>
        <tr>
            <td colspan="2" ><a href="<?php echo base_url('kasir/dasbor/editprofile/'.$datauser->id_user) ?>" class="btn btn-success btn-lg">Edit Profile</a></td>
        </tr>
    </tbody>
</table>