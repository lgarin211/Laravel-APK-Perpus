<?
if (!empty($allBuku)) :
    foreach ($allBuku as $key => $value) :
        if (($nu[$key]['kembali'] == 0)) : ?>
            <ul>
                <li>
                    <p>judul = <?= $value['Judul_Buku']; ?> </p>
                </li>
                <li><a href="<?= base_url('Kembali?buku=' . $value['ID_BUKU'] . '&peminjam=' . $nu[$key]['ID_Peminjam'] . '&Barcode=' . $nu[$key]['Barcode_Buku']); ?>">Kembalikan</a></li>

            </ul><br>
<?      endif;
    endforeach;
else : redirect('/');
endif; ?>