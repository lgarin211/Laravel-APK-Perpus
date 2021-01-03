<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <title>Hello, world!</title>
</head>

<body>
    <div class="bg-warning row">
        <div class="col-md-4 text-center">
            <div id="ida"></div>
            <div id="nor"></div>
            <div id="nor2">
                <button class="btn btn-primary" onclick="nos()">Cari Buku</button>
            </div>
            <div class="card" id="nor1">
                <ul class="list-group">
                    <li>
                        <form class="d-flex list-group-item">
                            <input class="form-control me-2" type="search" placeholder="ISBN" id="fintISBN" aria-label="Search">
                            <!-- <button class="btn btn-outline-success" type="submit">Search</button> -->
                        </form>
                    </li>
                    <li>
                        <form class="d-flex list-group-item">
                            <input class="form-control me-2" type="search" placeholder="JUDUL BUKU" onkeyup="domdom()" class="fint_JUDUL_BUKU" id="fint_JUDUL_BUKU" aria-label="Search">
                            <button class="btn btn-outline-success" type="submit">Search</button>
                        </form>
                    </li>
                    <li>
                        <form class="d-flex list-group-item">
                            <input class="form-control me-2" type="search" placeholder="Penulis" aria-label="Search">
                            <button class="btn btn-outline-success" type="submit">Search</button>
                        </form>
                    </li>
                    <li>
                        <form class="d-flex list-group-item">
                            <input class="form-control me-2" type="search" placeholder="Penerbit" aria-label="Search">
                            <button class="btn btn-outline-success" type="submit">Search</button>
                        </form>
                    </li>
                    <li>
                        <form class="d-flex list-group-item">
                            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                            <button class="btn btn-outline-success" type="submit">Search</button>
                        </form>
                    </li>
                    <li class="list-group-item">
                        <button class="btn btn-success" onclick="cas()">Batal</button>
                    </li>
                </ul>
            </div>
            <script>
                var a1 = document.getElementById('nor1').innerHTML
                var b2 = document.getElementById('nor2').innerHTML
                document.getElementById('nor1').innerHTML = '';

                function nos() {
                    document.getElementById('nor').innerHTML = a1
                    document.getElementById('nor2').innerHTML = ''
                }

                function cas() {
                    document.getElementById('nor').innerHTML = b2

                }
            </script>
            <input type="hidden" id="nosi" value="<?= base_url('/Buku/like?mog=m&key=') ?>">
            <script>
                // const as=document.querySelector('.fint_JUDUL_BUKU');
                var base_url = document.getElementById('nosi').value;

                //event add 
                function domdom() {
                    var keywpr = document.getElementById('fint_JUDUL_BUKU');
                    var contain = document.getElementById('dows');

                    fetch(base_url +
                            keywpr.value)
                        .then((response) => response.text())
                        .then((response) => (contain.innerHTML = response));
                    //val ajax Kurian WPU Eps13

                }
            </script>
        </div>
        <div class="col-md-8">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">Judul</th>
                        <th scope="col">ISBN</th>
                        <th scope="col">view</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody class="" id="dows">
                    <? foreach ($res as $key => $value) : if (!($value['OutSide'] == $value['Stok'])) : ?>
                        <tr>
                            <th scope="row"><?= $value['ID_BUKU'] ?></th>
                            <td><?= $value['Judul_Buku'] ?></td>
                            <td><?= $value['ISNB'] ?></td>
                            <td>@mdo</td>
                            <td><a class="btn btn-primary" href="<?= base_url('Pinjam?buku=' . $value['ID_BUKU'] . '&peminjam=' . $_SESSION['id']); ?>">pinjam</a></td>
                        </tr>
                    <?endif; endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

    <script>
        var cs = document.getElementById('dows').innerHTML
    </script>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
    -->
</body>

</html>