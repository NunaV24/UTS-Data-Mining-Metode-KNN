<?php

$conn = mysqli_connect('localhost', 'root', '', 'tugas');

function data()
{
    global $conn;
    $query = "SELECT * FROM knn";
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function view($data, $view)
{   ?>
    <div class="row">
        <br>
        <h4>DATA TRAINING</H4>
        <table border="3" class="table table-striped">
            <thead class="bg-info text-white">
                <tr>
                    <?php foreach ($view as $v) {  ?>
                        <th><?= ucfirst($v) ?></th>
                        <?php
                    if ($v == 'urutan') {
                        $i = 1;
                    }
                } ?>
            </tr>
        </thead>
            <tbody>
                <?php
                $mayoritas = [];
                foreach ($data as $data) { ?>
                    <tr>
                        <?php foreach ($view as $v) {
                            if ($v == 'urutan') { ?>
                                <td><?= $i++ ?></td>
                            <?php }elseif ($v == 'label') {
                                array_push($mayoritas, $data[$v]); ?>
                                <td><?= $data[$v] ?></td>
                            <?php }else{ ?>
                                <td><?= $data[$v] ?></td>
                            <?php }
                        } ?>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <br>
    </div>
<?php
    return $mayoritas;
}

function temp_euc($a, $b)
{
    $temp = ($a - $b);
    return pow($temp, 2);
}

function eucData($data, $input)
{
    foreach ($data as $dt) {
        $c = array ("tinggi", "berat", "l_perut", "l_panggul", "lemak");
        $temp_euc = 0;
        foreach ($c as $c) {
            $a = $dt[$c];
            $b = $input[$c];
            $temp_euc = $temp_euc + temp_euc($a, $b);
        }
        $euc = sqrt($temp_euc);
        $eucData[] = [
            "no"         => $dt["no"],
            "nama"       => $dt["nama"],
            "tinggi" => $dt["tinggi"],
            "berat"   => $dt["berat"],
            "l_perut"  => $dt["l_perut"],
            "l_panggul"    => $dt["l_panggul"],
            "lemak"    => $dt["lemak"],
            "label" => $dt["label"],
            "jarak"      => $euc
        ];
    }
    return $eucData;
}
