<?php

# membuat class Animal
class Animal
{
    # property animals
    public $hewan;
    # method constructor - mengisi data awal
    # parameter: data hewan (array)
    public function __construct($hewan)
    {
        $this->hewan = $hewan;
    }

    # method index - menampilkan data animals
    public function index()
    {
        # gunakan foreach untuk menampilkan data animals (array)
        foreach ($this->hewan as $binatang) {
            # code...
            echo "$binatang <br>";
        }
        return $this;
    }

    # method store - menambahkan hewan baru
    # parameter: hewan baru
    public function store($data)
    {
        # gunakan method array_push untuk menambahkan data baru
        array_push($this->hewan, $data);
    }

    # method update - mengupdate hewan
    # parameter: index dan hewan baru
    public function update($index, $data)
    {
        $this->hewan[$index] = $data;

        return $this;
    }

    # method delete - menghapus hewan
    # parameter: index
    public function destroy($index)
    {
        # gunakan method unset atau array_splice untuk menghapus data array
        unset($this->hewan[$index]);

        return $this;
    }
}

# membuat object
# kirimkan data hewan (array) ke constructor
$animal = new Animal(['badak', 'jerapah']);

echo "Index - Menampilkan seluruh hewan <br>";
$animal->index();
echo "<br>";

echo "Store - Menambahkan hewan baru <br>";
$animal->store('burung');
$animal->index();
echo "<br>";

echo "Update - Mengupdate hewan <br>";
$animal->update(0, 'Kucing Anggora');
$animal->index();
echo "<br>";

echo "Destroy - Menghapus hewan <br>";
$animal->destroy(1);
$animal->index();
echo "<br>";