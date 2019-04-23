<?php 
//notifikasi input error
echo validation_errors('<div class="alert alert-danger"><i class="fa fa-warning"></i>','</div>');
//open form
echo form_open(base_url('kasir/penjualan/transaksi/addobat'));

if ($this->session->flashdata('sukses')) {
    echo '<div class="alert alert-danger"><i class="fa fa-warning"></i> ';
    echo $this->session->flashdata('sukses');
    echo '</div>';
}
?>

<div class="col-md-6">
    <div class="form-group">
        <label>Nama Obat</label><br/>
        <input list="obat" name="namaobat" class="form-control" placeholder="Nama Obat" value="<?php echo set_value('namaobat') ?>" >
    </div>
</div>

<div class="col-md-6">
   <div class="form-group">
        <label>Jumlah</label><br/>
        <input type="text" name="jumlah" class="form-control" placeholder="Jumlah" value="<?php echo set_value('jumlah') ?>" >
    </div>
</div>

<div class="col-md-6">
    <div class="form-group">
        <input type="submit" name="submit" class="btn btn-success btn-lg" value="Tambah">
    </div>
</div>


<?php 
// form close
echo form_close();
?>
<datalist id="obat">
    <?php 
        foreach ($obat as $o) {
            echo "<option value='$o->nama_obat'>";
        }
     ?>
    <option value=""></option>
</datalist>


<table class="table table-striped table-bordered ">
    <thead>
        <tr>
            <th>#</th>
            <th>Nama Obat</th>
            <th>Jumlah</th>
            <th>Harga</th>
            <th>Subtotal</th>
            <th>hapus</th>
        </tr>
    </thead>
    <tbody>
        <?php $i=1; foreach ($belanja as $belanja) {?>
        <tr>
            <td> <?php echo $i; ?></td>
            <td>
                <?php
                    $this->load->model('transaksi_model');
                    $obat = $this->transaksi_model->getnamaobat($belanja->id_obat);
                    echo $obat->nama_obat;
                ?>
            </td>
            <td><?php echo $belanja->jumlah ?></td>
            <td><?php echo $belanja->hargasatuan ?></td>
            <td><?php echo $belanja->jumlah * $belanja->hargasatuan ?></td> 
            <td>
                <a href="<?php echo base_url('kasir/penjualan/transaksi/hapusobat/'.$belanja->id) ?>" class="btn btn-danger"><i class="fa fa-trash-o"></i> Hapus</a>
            </td>
        </tr>
        <?php $i++; } ?>

<?php 
//open form
echo form_open(base_url('kasir/penjualan/transaksi/addtransaksi'));
?>

        <tr>
            <td colspan="4" align="right">Total</td>
            <td colspan="2">
                <input class="form-control" id="total" type='text' name="total"  readonly value='<?php echo $total; ?>' size='23' maxlength='300' onFocus="startCalc();" onBlur="stopCalc();"  />
            </td>
        </tr>
        <tr>
            <td colspan="4" align="right">Bayar</td>
            <td colspan="2">
                <input type="text" id="bayar" name="bayar" class="form-control" placeholder="Uang yang dibayar"  value="<?php echo set_value('bayar') ?>" onFocus="startCalc();" onBlur="stopCalc();" onchange="countChange()"/>
            </td>
        </tr>
        <tr>
            <td colspan="4" align="right">Kembalian</td>
            <td colspan="2">
                <input readonly id="kembali" type="text" value="0" name="kembali" class="form-control" placeholder="Kembalian" onchange="tryNumberFormat(this.form.thirdBox);">
            </td>
        </tr>
        <tr>
            <td colspan="6" align="center"><input type="submit" name="submit" class="btn btn-primary btn-lg" value="Selesai"></td>
        </tr>
<?php 
// form close
echo form_close();
?>
    </tbody>
</table>

<script type="text/javascript">
    function countChange(){
        var inputBayar = document.getElementById('bayar');
        var inputTotal = document.getElementById('total');
        var inputChange = document.getElementById('kembali');

        var change = inputBayar.value - inputTotal.value;
        inputChange.value = change;
    }
</script>
