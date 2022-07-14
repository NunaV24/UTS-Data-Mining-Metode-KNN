<?php

require 'function.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Boostrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <title>Algoritma K-NN</title>
</head>

<body>
    <div class="container mt-3">
        <center><h1>Sistem Perhitungan Metode K-Nearest Neighboars</h1></center>
        <br>
        <center>Klasifikasi mengenai Gemuk atau Ideal nya tubuh seseorang yang dihitung dengan Tinggi, Berat, 
            Lebar Perut, Lebar Panggul dan Lemak dalam tubuh </center>
        <br>
        <a class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Input Kasus</a>
        <br>
        <?php
        $view = array("no", "nama", "tinggi", "berat", "l_perut", "l_panggul", "lemak", "label");
        view(data(), $view); ?>

        <?php
        if (isset($_POST["submit"])) { ?>
            <div class="row">
                <br>
                <h4>DATA TESTING</H4>
                <table border="3" class="table table-striped">
                    <thead class="bg-info text-white">
                        <tr>
                            <th>Nama</th>
                            <th>tinggi</th>
                            <th>berat</th>
                            <th>Lebar perut</th>
                            <th>Lebar panggul</th>
                            <th>lemak</th>
                            <th>label</th>
                        </tr>
                    </thead>
                    <tr>
                        <td><?= $_POST["nama"] ?></td>
                        <td><?= $_POST["tinggi"] ?></td>
                        <td><?= $_POST["berat"] ?></td>
                        <td><?= $_POST["l_perut"] ?></td>
                        <td><?= $_POST["l_panggul"] ?></td>
                        <td><?= $_POST["lemak"] ?></td>
                        <td><?= $_POST["k"] ?></td>
                    </tr>
                </table>
                <?php
                $eucData = eucData(data(), $_POST);
                $view = array("no", "nama", "tinggi", "berat", "l_perut", "l_panggul", "lemak", "label", "jarak");
                view($eucData, $view);
                array_multisort(array_column($eucData, 'jarak'), SORT_ASC, $eucData);
                array_push($view, "urutan");
                view($eucData, $view);

                $uK = count($eucData);
                $k = $_POST["k"];
                for ($i = 0; $i < ((int) $uK - (int) $k); $i++) {
                    array_pop($eucData);
                }
                $res = view($eucData, $view);
                $v = array_unique($res);
                $result = array_count_values($res);
                $mayoritas = array_slice(array_keys($result), 0, 1, true);
                $max = 0;
                foreach ($v as $v) {
                    if ($result[$v] > $max) {
                        $mayoritas = $v;
                        $max = $result[$v];
                    }
                }
                ?>
                <h4>Berdasarkan dari perhitungan menggunakan algoritma
                    Euclidean Distance maka kasus dengan nama <?= $_POST["nama"] ?> adalah <?= $mayoritas ?></h4>
            <?php }
            ?>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Modal Title</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="" method="post">
                            <div class="modal-body">
                                <div class="form-group row">
                                    <label for="nama" class="col-sm-3 col-form-label">Nama</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="tinggi" class="col-sm-3 col-form-label">tinggi</label>
                                    <div class="col-sm-9">
                                        <input type="number" class="form-control" name="tinggi" id="tinggi" placeholder="tinggi">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="berat" class="col-sm-3 col-form-label">berat</label>
                                    <div class="col-sm-9">
                                        <input type="number" class="form-control" name="berat" id="berat" placeholder="berat">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="l_perut" class="col-sm-3 col-form-label">Lebar perut</label>
                                    <div class="col-sm-9">
                                        <input type="number" class="form-control" name="l_perut" id="l_perut" placeholder="l_perut">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="l_panggul" class="col-sm-3 col-form-label">Lebar panggul</label>
                                    <div class="col-sm-9">
                                        <input type="number" class="form-control" name="l_panggul" id="l_panggul" placeholder="l_panggul">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="lemak" class="col-sm-3 col-form-label">lemak</label>
                                    <div class="col-sm-9">
                                        <input type="number" class="form-control" name="lemak" id="lemak" placeholder="lemak">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="k" class="col-sm-3 col-form-label">K</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="k" id="k" placeholder="K">
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>


            <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.6/dist/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.2.1/dist/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</body>

</html>