
<?php
function GetAllProduct($filename = "data/data_B2.csv"): array
{
    $lines = explode("\n", file_get_contents($filename));
    array_shift($lines);
    
    $data = [];
    foreach ($lines as $line) {
        $a = explode(",", $line);
        $data = [...$data, new Product((float)$a[0], $a[1], (float)$a[2], $a[3])];
    }
    return $data;
}
function GetOneProductById($data, $id)
{
    foreach ($data as $row) {
        if ($row["id"] == $id) {

            return $row;
        }
    }
}
