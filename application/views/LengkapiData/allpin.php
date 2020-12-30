<?
foreach ($nu as $key => $value) :?>
        <ul>
            <li>
                <p>judul = <?= $value['Judul_Buku']; ?> </p>
            </li>
            <li><a href="<?= base_url('Pinjam?buku=' . $value['ID_BUKU'] . '&peminjam=' . $_SESSION['id']); ?>">pinjam</a></li>
        </ul><br>
<?endforeach; ?>