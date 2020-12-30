<?
foreach ($allBuku as $key => $value) :
    if (!($value['OutSide'] == $value['Stok'])) : ?>
        <ul>
            <li>
                <p>judul = <?= $value['Judul_Buku']; ?> </p>
            </li>
            <li><a href="<?= base_url('Pinjam?buku=' . $value['ID_BUKU'] . '&peminjam=' . $_SESSION['id']); ?>">pinjam</a></li>
        </ul><br>
<? endif;
endforeach; ?>