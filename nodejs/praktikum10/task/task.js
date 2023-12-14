/**
 * Fungsi untuk menampilkan hasil download
 * @param {string} result - Nama file yang didownload
 
function showDownload(result) {
    console.log("Download selesai");
    console.log("Hasil Download: " + result);
  }
  */

const showDownload = (result) => {
  console.log("Download berhasil");
  console.log(`Hasil Download: ${result}`);
};

/**
   * Fungsi untuk download file
   * @param {function} callback - Function callback show
   
  function download(callShowDownload) {
    setTimeout(function () {
      const result = "windows-10.exe";
      callShowDownload(result);
    }, 3000);
  }
  */

const download = (showDownload) => {
  return new Promise(function () {
    setTimeout(function () {
      showDownload("windows-10.exe");
    }, 3000);
  });
};

const main = async () => {
  console.log(await download(showDownload));
};
main();

/**
download(showDownload);


 * TODO:
 * - Refactor callback ke Promise atau Async Await
 * - Refactor function ke ES6 Arrow Function
 * - Refactor string ke ES6 Template Literals
 */
