<? foreach ($res as $key => $value) : if (!($value['OutSide'] == $value['Stok'])) : ?>
        <tr>
            <th scope="row"><?= $value['ID_BUKU'] ?></th>
            <td><?= $value['Judul_Buku'] ?></td>
            <td><?= $value['ISNB'] ?></td>
            <td>@mdo</td>
            <td><a class="btn btn-primary" href="<?= base_url('Pinjam?buku=' . $value['ID_BUKU'] . '&peminjam=' . $_SESSION['id']); ?>">pinjam</a></td>
        </tr>
<? endif;
endforeach; ?>