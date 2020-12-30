<form action="<?=base_url('Buku/Lengkapi_data')?>" method="POST">
<input type="number" name="NIP">
<select name="Kelas" id="">
<?foreach ($kelas as $key => $value) :?>
<option value="<?=$value->kelas?>"><?=$value->kelas?></option>
<?endforeach?>
</select>
<button type="submit">kirim</button>
</form>