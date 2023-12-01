// buat variable
let nama = "uci";
console.log(nama);

// buat array
let angka = [1, 2, 3, 4, 5];
console.log(angka);
console.log(angka.length);

// buat object
let mahasiswa = {
  // key:value
  nama: "Rifky",
  nim: "0110222017",
  jurusan: "TI",
};
console.log(mahasiswa);
console.log(mahasiswa.jurusan);

// if else
let nilai = 20;
if (nilai > 80) {
  console.log("Lulus");
} else {
  console.log("Gagal");
}

// looping
// ada 3 parameter (start, end, step)
for (let i = 1; i <= 3; i++) {
  console.log(i);
}

// function
function tambah(a, b) {
  return a + b;
}
console.log(tambah(3, 2));
