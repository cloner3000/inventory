<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link rel="stylesheet" type="text/css" href="mycss/retur.css">
<link rel="stylesheet" type="text/css" href="jquery_easyui/themes/default/easyui.css">
<link rel="stylesheet" type="text/css" href="jquery_easyui/themes/icon.css">
<link rel="stylesheet" type="text/css" href="jquery_easyui/themes/style.css">
<script type="text/javascript" src="jquery_easyui/jquery.min.js"></script>
<script type="text/javascript" src="jquery_easyui/jquery.easyui.min.js"></script>
<script type="text/javascript" src="jquery_easyui/jquery.form.js"></script>
<script type="text/javascript" src="libs_js/retur_keluar.js"></script>
</head>

<body>
<div id="cari">
<form action="transaksi/retur_barang/search_faktur_barang_keluar.php" method="post" id="form_cari">
  Ketik Kode Faktur : 
    <input name="cari_id_faktur" type="text" id="cari_id_faktur" />
  <input type="submit" name="button_cari" id="button_cari" value="Cari" />
</form>
</div>
<div id="hasil_cari">
<table width="400" border="1" align="center" cellpadding="0" cellspacing="0" id="tabel_item">
    <tr class="tr_item">
      <td align="center">KODE FAKTUR</td>
      <td align="center">TGL KELUAR</td>
      <td align="center">ID USER</td>
      <td align="center">ID OUTLET</td>
      <td align="center">PILIH</td>
    </tr>
   
    <form action="retur_keluar.php"  method="post" name="form_item" id="form_item">   
     <tr>
      <td><input name="id_keluar" type="text" disabled="disabled" id="id_keluar" size="15" readonly="readonly" /></td>
      <td><input name="tgl_keluar" type="text" disabled="disabled" id="tgl_keluar" size="15" readonly="readonly" /></td>
      <td><label for="id_user"></label>
        <input name="id_user" type="text" disabled="disabled" id="id_user" size="8" readonly="readonly" /></td>
      <td><label for="id_outlet"></label>
        <input name="id_outlet" type="text" disabled="disabled" id="id_outlet" size="10" readonly="readonly" /></td>
      <td><input type="submit" name="retur" id="retur" value="Buat Retur" /></td>
    </tr>
    </form>
    
  </table>
</div>
<div id="data">
<table id="dgKeluar" title="DATA BARANG KELUAR" class="easyui-datagrid" style="height:250px" toolbar="#toolbarKeluar" pagination="true" url="transaksi/retur_barang/get_item_barang.php?id_trx=<?php echo $_POST['id_keluar']; ?>&tr=out" rownumbers="true" fitColumns="true" singleSelect="true">
		<thead>
			<tr>
            	<th field="id_barang" width="50">ID BARANG</th>
				<th field="nm_barang" width="70">NAMA BARANG</th>
				<th field="id_jenis" width="30">ID JENIS</th>
                <th field="jml_keluar" width="30">JUMLAH KELUAR</th>
				<th field="hrg_beli" width="50">HARGA BELI</th>
                <th field="sub_total" width="50">SUB TOTAL</th>
			</tr>
		</thead>
  </table>
<div id="toolbarKeluar"><a href="#" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="addRetur()">Tambah Item Retur</a> </div>	
<div id="dlgKeluar" class="easyui-dialog" style="width:400px;height:340px;padding:10px 20px" closed="true" buttons="#dlg-buttons">
		<div class="ftitle">Tambah Item Retur Barang</div>
		<form id="fmKeluar" method="post" novalidate>
			<div class="fitem">
				<label>Id Barang:</label>
			  	<input name="id_barang" id="id_barang" class="easyui-validatebox" required="true">
			</div>
		    <div class="fitem">
				<label>Nama Barang:</label>
			  	<input name="nm_barang" id="nm_barang" class="easyui-validatebox" required="true" readonly="readonly">
			</div>
          <div class="fitem">
			<label>Jml Keluar:</label>
		  	  <input name="jml_keluar" class="easyui-numberbox" required="true" readonly="readonly" >
		  </div>
            <div class="fitem">
			<label>Harga Beli:</label>
		  	  <input name="hrg_beli" class="easyui-numberbox" required="true" readonly="readonly">
			</div>
            <div class="fitem">
			<label>Jumlah Retur:</label>
		  	  <input name="jml_retur" class="easyui-numberbox" required="true" >
			</div>
		</form>
  </div>
	<div id="dlg-buttons">
		<a href="#" class="easyui-linkbutton" iconCls="icon-ok" onclick="saveRetur()">Save</a>
		<a href="#" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlgKeluar').dialog('close')">Cancel</a>
	</div>
</div>

<div id="detail_request">
<table id="dgRetur" title="DATA RETUR BARANG" class="easyui-datagrid" style="height:250px"toolbar="#toolbarRetur" pagination="true" url="transaksi/retur_barang/get_item_retur.php?id_trx=<?php echo $_POST['id_keluar']; ?>"

			rownumbers="true" fitColumns="true" singleSelect="true">
		<thead>
			<tr>
            	<th field="id_barang" width="50">ID BARANG</th>
				<th field="nm_barang" width="50">NAMA BARANG</th>
				<th field="id_jenis" width="50">ID JENIS</th>
                <th field="jml" width="50">JUMLAH RETUR</th>
				<th field="hrg_beli" width="50">HARGA BELI</th>
                <th field="sub_total" width="50">SUB TOTAL</th>
			</tr>
		</thead>
  </table>
	<div id="toolbarRetur">
		<a href="#" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="editRetur()">Edit Data</a>
		<a href="#" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="removeRetur()">Hapus Data</a>
	</div>
    
    <div id="dlgRetur" class="easyui-dialog" style="width:400px;height:250px;padding:10px 20px"
			closed="true" buttons="#dlg-buttons">
		<div class="ftitle">Edit Item Retur Barang</div>
		<form id="fmRetur" method="post" novalidate>
			<div class="fitem">
				<label>Id Barang:</label>
			  	<input name="id_barang" id="id_barang" class="easyui-validatebox" required="true">
			</div>
		    <div class="fitem">
				<label>Nama Barang:</label>
			  	<input name="nm_barang" id="nm_barang" class="easyui-validatebox" required="true" readonly="readonly">
			</div>
             <div class="fitem">
				<label>Harga Beli:</label>
			  	<input name="hrg_beli" id="hrg_beli" class="easyui-validatebox" required="true" readonly="readonly">
			</div>
          <div class="fitem">
			<label>Jml Retur:</label>
		  	  <input name="jml" id="jml" class="easyui-numberbox" required="true" >
		  </div>
            
		</form>
	</div>
	<div id="dlg-buttons">
		<a href="#" class="easyui-linkbutton" iconCls="icon-ok" onclick="saveEditRetur()">Save</a>
		<a href="#" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlgRetur').dialog('close')">Cancel</a>
	</div>
    
    <div id="proses">
    <input type='checkbox' name='term' onClick="Javascript:disab(this, 1);"/>Selesai Menambahkan<br /><br />

<form action="transaksi/retur_barang/proses_retur_barang_keluar.php" method="post" id="form_proses" style="display:none">
<label>Id Retur:</label>
<input name="id_trx" type="text" id="id_trx" readonly="readonly" />
<label>Id Transaksi Keluar:</label>
<input name="id_keluar" type="text" id="id_keluar" value="<?php echo $_POST['id_keluar'] ?>" readonly="readonly" />
<input type="submit" name="proses_request" id="proses_request" value="Proses Transaksi " disabled="disabled" />
  </form>
</div>
</div>
</body>
</html>