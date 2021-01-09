    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <div class="container card">
        <div class="col-md-12 text-center">
            <div id="nor2">
                <button class="btn btn-primary" onclick="nos()">Cari Buku</button>
            </div>
            <div id="nor1">
                <div class="card">
                    <ul class="list-group">
                        <li class="list-group-item">
                            <form class="d-flex">
                                <input class="form-control me-2" type="search" placeholder="ISBN" onkeyup="domdom('ISBN')" id="ISBN" aria-label="Search">
                                <!-- <button class="btn btn-outline-success" type="submit">Search</button> -->
                            </form>
                        </li>
                        <li class="list-group-item">
                            <form class="d-flex">
                                <input class="form-control me-2" type="search" placeholder="JUDUL BUKU" onkeyup="domdom('JUDUL_BUKU')" id="JUDUL_BUKU" aria-label="Search">
                                <!-- <button class="btn btn-outline-success" type="submit">Search</button> -->
                            </form>
                        </li>
                        <li class="list-group-item">
                            <form class="d-flex">
                                <input class="form-control me-2" type="search" placeholder="Penulis" onkeyup="domdom('Penulis')" id="Penulis" aria-label="Search">
                                <!-- <button class="btn btn-outline-success" type="submit">Search</button> -->
                            </form>
                        </li>
                        <li class="list-group-item">
                            <form class="d-flex">
                                <input class="form-control me-2" type="search" placeholder="Penerbit" onkeyup="domdom('Penerbit')" id="Penerbit" aria-label="Search">
                                <!-- <button class="btn btn-outline-success" type="submit">Search</button> -->
                            </form>
                        </li>
                        <li class="list-group-item">
                            <form class="d-flex">
                                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                                <!-- <button class="btn btn-outline-success" type="submit">Search</button> -->
                            </form>
                        </li>
                        <li class="list-group-item">
                            <button class="btn btn-success" onclick="cas()">Batal</button>
                        </li>
                    </ul>
                </div>
            </div>
            <script>
                var a1 = document.getElementById('nor1').innerHTML
                var b2 = document.getElementById('nor2').innerHTML
                document.getElementById('nor1').innerHTML = '';

                function nos() {
                    document.getElementById('nor1').innerHTML = a1
                    document.getElementById('nor2').innerHTML = ''
                }

                function cas() {
                    document.getElementById('nor2').innerHTML = b2
                    document.getElementById('nor1').innerHTML = ''

                }
            </script>
            <input type="hidden" id="nosi" value="<?= base_url('/Buku/like?tebel_query=BUKU&key=') ?>">
            <script>
                // const as=document.querySelector('.fint_JUDUL_BUKU');
                var base_url = document.getElementById('nosi').value;

                //event add 
                function domdom(si) {
                    var keywpr = document.getElementById(si);
                    var contain = document.getElementById('dows');
                    var link_query = base_url + keywpr.value + '&mog=z&sampel=' + si
                    // alert(link_query)
                    fetch(link_query)
                        .then((response) => response.text())
                        .then((response) => (contain.innerHTML = response));
                    //val ajax Kurian WPU Eps13

                }
            </script>
        </div>
        <div class="col-md-12 card text-center">
            <table class="table">
                <thead>
                    <tr>
                        <? if (!empty($_SESSION['role_id'])) : ?>
                            <th scope="col"><small>id</small></th>
                        <? endif ?>
                        <th scope="col">Judul</th>
                        <th scope="col">ISBN</th>
                        <th scope="col">view</th>
                        <? if (!empty($_SESSION['role_id'])) : ?>
                            <th scope="col">Action</th>
                        <? endif ?>
                    </tr>
                </thead>
                <tbody class="" id="dows">
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
                                            <? if (empty($_SESSION['role_id'])) : ?>
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
                                            <? if (!empty($_SESSION['role_id'])) : ?>
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
                </tbody>
            </table>
        </div>
    </div>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
    -->