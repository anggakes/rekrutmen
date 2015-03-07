            <div class="col-sm-8">
                <h3>Selamat Datang </h3>
<hr>
<center><br></center>
<div class='alert alert-info' >
	<table><tr>
<td class='col-sm-2'><img src ='<?php echo base_url("assets/img/attention.png");?>' style='width:50px'/></td>
<td>Harap pastikan data diri dan pendidikan anda sudah<b> terisi</b>. 
<br>Dan pastikan juga data tersebut merupakan data <b>terbaru</b> anda<br>
</td>
</tr>
</table>


</div>
<br><br>
<?php if(count($lowongan)>0){?>
<a href='<?php echo site_url("user/lowongan")?>' class='btn btn-danger pull-right'>Terdapat <?php echo count($lowongan)?> Lowongan pekerjaan !</a>
<?php } ?> 
            </div>