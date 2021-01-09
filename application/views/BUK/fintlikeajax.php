<? foreach ($res as $key => $value) : if (!($value['OutSide'] == $value['Stok'])) : ?>
        <tr>
            <? if (!empty($_SESSION['role_id'])) : ?>
                <th scope="row"><small><?= $value['ID_BUKU'] ?></small></th>
            <? endif ?>

            <td><?= $value['Judul_Buku'] ?></td>
            <td><?= $value['ISBN'] ?></td>
            <td>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal<?= $value['ID_BUKU'] ?>">
                    info
                </button>
            </td>
            <? if (!empty($_SESSION['role_id'])) : ?>
                <td>
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <a class="btn btn-primary" href="<?= base_url('Pinjam?buku=' . $value['ID_BUKU'] . '&peminjam=' . $_SESSION['id']); ?>">pinjam</a>
                        <? if (!empty($_SESSION['role_id'])) : if ($_SESSION['role_id'] == 1) : ?>
                                <a class="btn btn-primary" href="<?= base_url('Pinjam?buku=' . $value['ID_BUKU'] . '&peminjam=' . $_SESSION['id']); ?>">Edit</a>
                                <a class="btn btn-primary" href="<?= base_url('Pinjam?buku=' . $value['ID_BUKU'] . '&peminjam=' . $_SESSION['id']); ?>">Hapus</a>
                        <? endif;
                        endif; ?>
                    </div>
                </td>
            <? endif; ?>
        </tr>
        <!-- Button trigger modal -->


        <!-- Modal -->
        <div class="modal fade" id="exampleModal<?= $value['ID_BUKU'] ?>" tabindex="-1" aria-labelledby="exampleModal<?= $value['ID_BUKU'] ?>Label" aria-hidden="true">
            <div class="modal-dialog modal-fullscreen">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModal<?= $value['ID_BUKU'] ?>Label"><?= $value['Judul_Buku'] ?></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <? if (empty($_SESSION)) : ?>
                            <div class="card mb-3" class="mx-auto">
                                <div class="row g-0">
                                    <div class="col-md-4">
                                        <img src="https://cdn4.buysellads.net/uu/1/3386/1525189943-38523.png" width="100%" alt="horeho" title="horegore">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <h5 class="card-title">Buku berjudul : <strong><?= $value['Judul_Buku'] ?></strong> <small> dengan Isbn </small> <strong><?= $value['ISBN'] ?></strong></h5>
                                            <p class="card-text">Diterbitkan Oleh : <strong><?= $value['Penerbit'] ?></strong></p>
                                            <p class="card-text">Ditulis Oleh : <strong><?= $value['Penulis'] ?></strong></p>
                                            <p class="card-text">Gendre : <strong><?= $value['Gendre'] ?></strong></p>
                                            <p class="card-text">Sinopsis : <br><strong><?= $value['Sinopsis'] ?></strong></p>
                                            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <? endif; ?>
                        <? if (!empty($_SESSION['role_id'] == 1)) : ?>
                            <div class="card mb-3" class="mx-auto">
                                <div class="row g-0">
                                    <div class="col-md-4">
                                        <img src="https://cdn4.buysellads.net/uu/1/3386/1525189943-38523.png" width="100%" alt="...">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <h1 class="text-center card-title">Admin View</h1>
                                            <ul class="list-group row">
                                                <? foreach ($value as $key2 => $value2) : ?>
                                                    <li class="list-group-item ">
                                                        <form action="<?= base_url('/Buku/editDataBuku') ?>" method="POST">
                                                            <div class="input-group mb-3">
                                                                <input type="hidden" name="ID_BUKU" value="<?= $value['ID_BUKU'] ?>">
                                                                <input type="hidden" name="dos" value="<?= $key2 ?>">
                                                                <span class="input-group-text col-md-3" id="basic-addon1"><?= $key2 ?></span>
                                                                <input type="text" class="col-md-8 input-group-text" name="pasing" value="<?= $value2 ?>">
                                                                <button type="submit" class="btn btn-primary">kirim</button>
                                                            </div>
                                                        </form>
                                                    </li>
                                                <? endforeach ?>
                                            </ul>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        <? endif; ?>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <a class="btn btn-primary" href="<?= base_url('Pinjam?buku=' . $value['ID_BUKU'] . '&peminjam=' . $_SESSION['id']); ?>">Pinjam</a>
                    </div>
                </div>
            </div>
        </div>
<? endif;
endforeach; ?>