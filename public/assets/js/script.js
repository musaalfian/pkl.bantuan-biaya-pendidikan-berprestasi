/*********  Navbar  **********/
/* When the user scrolls down, hide the navbar. When the user scrolls up, show the navbar */
var prevScrollpos = window.pageYOffset;
window.onscroll = function () {
  var currentScrollPos = window.pageYOffset;
  if (prevScrollpos > currentScrollPos) {
    document.getElementById("navbar").style.top = "0";
  } else {
    document.getElementById("navbar").style.top = "-75px";
  }
  prevScrollpos = currentScrollPos;
};

/**  validation   **/
// Example starter JavaScript for disabling form submissions if there are invalid fields
(function () {
  "use strict";

  // Fetch all the forms we want to apply custom Bootstrap validation styles to
  var forms = document.querySelectorAll(".needs-validation");

  // Loop over them and prevent submission
  Array.prototype.slice.call(forms).forEach(function (form) {
    form.addEventListener(
      "submit",
      function (event) {
        if (!form.checkValidity()) {
          event.preventDefault();
          event.stopPropagation();
        }

        form.classList.add("was-validated");
      },
      false
    );
  });
})();

// active pendaftar
$(document).ready(function () {
  if (document.title == "Beasiswa Batang | Beranda") {
    $("#nav__beranda").addClass("active");
    console.log("beranda");
  } else if (document.title == "Beasiswa Batang | Informasi") {
    $("#nav__informasi").addClass("active");
  } else if (document.title == "Beasiswa Batang | Daftar Beasiswa") {
    $("#nav__beasiswa").addClass("active");
  } else if (document.title == "Beasiswa Batang | Pengumuman Beasiswa") {
    $("#nav__beasiswa").addClass("active");
  }
});

/*** ADMIN ***/

// active admin
$(document).ready(function () {
  if (document.title == "Beasiswa Batang | Dashboard Admin") {
    $(".nav_admin_dashboard").addClass("active-menu");
  } else if (document.title == "Beasiswa Batang | Data Pendaftar Admin") {
    $(".nav_admin_data_pendaftaran").addClass("active-menu");
  } else if (document.title == "Beasiswa Batang | Data Penerimaa Admin") {
    $(".nav_admin_data_penerima").addClass("active-menu");
  } else if (document.title == "Beasiswa Batang | Download Admin") {
    $(".nav_admin_download").addClass("active-menu");
  } else if (
    document.title == "Beasiswa Batang | Informasi Pendaftaran Admin"
  ) {
    $(".nav_admin_informasi_pendaftaran").addClass("active-menu");
  } else if (document.title == "Beasiswa Batang | Informasi Terbaru Admin") {
    $(".nav_admin_informasi_terbaru").addClass("active-menu");
  }
});

//Datatables
$(document).ready(function () {
  // Add Row
  $("#table_data_pendaftaran").DataTable({
    pageLength: 10,
    language: {
      info: "Menampilkan _END_ dari _TOTAL_ baris",
      infoEmpty: "Menampilkan 0 sampai 0 of 0 baris",
      infoFiltered: "(filtered from _MAX_ total entries)",
      infoPostFix: "",
      thousands: ",",
      lengthMenu: "Menampilkan _MENU_ baris",
      loadingRecords: "Tunggu...",
      processing: "Memproses...",
      search: "Cari:",
      zeroRecords: "Tidak ada data yang ditemukan",
      paginate: {
        first: "Pertama",
        last: "Terakhir",
        next: "Selanjutnya",
        previous: "Sebelumnya",
      },
    },
  });
});

/** Detail pendaftaran **/
// mengambil nilai awal dari status pendaftaran(dropdown)
// jika status pendaftaran memenuhi syarat
if ($("#ubah_status_pendaftaran").find(":selected").val() == 1) {
  $("#ubah_status_final").show();
} else {
  $("#ubah_status_final").hide();
}
// jika status pendaftaran perbaikan data
// if ($("#ubah_status_pendaftaran").find(":selected").val() == 3) {
//   $("#pesan").prop("disabled", false);
// } else {
//   $("#pesan").prop("disabled", true);
// }
// jika ada perubahan status pendaftaran
$("#ubah_status_pendaftaran").change(function (e) {
  // jika status pendaftaran memenuhi syarat
  if (this.value == 1) {
    $("#ubah_status_final").show();
  } else {
    $("#ubah_status_final").hide();
  }
  // jika status pendaftaran perbaikan data
  // if (this.value == 3) {
  //   $("#pesan").prop("disabled", false);
  // } else {
  //   $("#pesan").val("");
  //   $("#pesan").prop("disabled", true);
  // }
});

/** Download file **/
// mengambil nilai awal dari tahap pendaftaran
if ($('input[name="tahap_pendaftaran"]:checked').val == "penerima") {
  $("#status_pendaftaran").hide();
  $("#status_final").show();
} else {
  $("#status_final").hide();
}
//jika ada perubahan tahap pendaftaran
$('input[name="tahap_pendaftaran"]').change(function () {
  // console.log(this.value);
  if (this.value == "penerima") {
    $("#status_pendaftaran").hide();
    $("#status_final").show();
  } else {
    $("#status_pendaftaran").show();
    $("#status_final").hide();
  }
});
/** ADmin informasi **/
// mengganti nama file ketika edit informasi
// file informasi terbaru
$(document).ready(function () {
  $("#file_informasi_terbaru").change(function (e) {
    var file = e.target.files[0].name;
    $("label[for='file_informasi_terbaru']").empty();
    $("label[for='file_informasi_terbaru']").append(
      '<a class="btn btn-secondary">Pilih File</a>'
    );
    $("label[for='file_informasi_terbaru']").append(file);
  });
});
// gambar informasi terbaru
$(document).ready(function () {
  $("#gambar_informasi_terbaru").change(function (e) {
    var gambar = e.target.files[0].name;
    $("label[for='gambar_informasi_terbaru']").empty();
    $("label[for='gambar_informasi_terbaru']").append(
      '<a class="btn btn-secondary">Pilih File</a>'
    );
    $("label[for='gambar_informasi_terbaru']").append(gambar);
  });
});
// maks file upload
$("#file_informasi_terbaru").change(function () {
  // 2 MB
  if (this.files[0].size > 15728640) {
    $(this).addClass("is-invalid");
    this.value = "";
  } else {
    $(this).removeClass("is-invalid");
    $(this).addClass("is-valid");
  }
});
/***********************************************************************************************************************/
/*                                    Pendaftar                                                                        */
/***********************************************************************************************************************/
/**************************** Identitas ****************************/

$('input[name="pernah_menerima_bantuan"]').change(function () {
  console.log($('input[name="pernah_menerima_bantuan"]:checked').val());
  // console.log("adgwryhsfh");
  //   console.log($('input[name="pernah_menerima_bantuan"]:checked').val());
  if ($('input[name="pernah_menerima_bantuan"]:checked').val() == "ya") {
    $("#menerima_bantuan_dari").prop("disabled", false);
  } else {
    $("#menerima_bantuan_dari").prop("disabled", true);
  }
});
if ($('input[name="pernah_menerima_bantuan"]:checked').val() == "tidak") {
  $("#menerima_bantuan_dari").prop("disabled", true);
}
/**************************** Form lampiran ****************************/
// kategori
for (let index = 1; index <= 3; index++) {
  $("#kategori_" + index).change(function () {
    if (
      $(this).val() == "hafidz" ||
      $(this).val() == "KHS" ||
      $(this).val() == "ujian sekolah" ||
      $(this).val() == "lainnya"
    ) {
      $("#tingkat_" + index).prop("disabled", true);
      $("#juara_" + index).prop("disabled", true);
    } else {
      $("#tingkat_" + index).prop("disabled", false);
      $("#juara_" + index).prop("disabled", false);
    }
  });
}
// <!-- script tambah prestasi -->
$(document).ready(function () {
  $("#prestasi_2").hide();
  $("#prestasi_2_modal").hide();
  $("#prestasi_3").hide();
  $("#prestasi_3_modal").hide();
});
function tambah_prestasi_2() {
  $("#prestasi_2").show();
  // $("#prestasi_2_modal").show();
  $("#icon-tambah-1").hide();
  $("#label-tambah-1").hide();
}

function tambah_prestasi_3() {
  $("#prestasi_3").show();
  // $("#prestasi_3_modal").show();
  $("#icon-tambah-2").hide();
  $("#label-tambah-2").hide();
}

/****** validasi ukuran file lampiran *****/
// scan prestasi 1
$("#file_prestasi_1").change(function () {
  // 2 MB
  if (this.files[0].size > 2097152) {
    console.log("asdfasf");
    $(this).addClass("is-invalid");
    this.value = "";
  } else {
    console.log("popo");
    $(this).removeClass("is-invalid");
    $(this).addClass("is-valid");
  }
});
// scan prestasi 2
$("#file_prestasi_2").change(function () {
  $("#nama_prestasi_2").prop("required", true);
  $("#kategori_2").prop("required", true);
  $("#tahun_prestasi_2").prop("required", true);
  // 2 MB
  if (this.files[0].size > 2097152) {
    $(this).addClass("is-invalid");
    this.value = "";
    $("#nama_prestasi_2").prop("required", false);
    $("#kategori_2").prop("required", false);
    $("#tahun_prestasi_2").prop("required", false);
  } else {
    $(this).removeClass("is-invalid");
    $(this).addClass("is-valid");
  }
});
// scan prestasi 3
$("#file_prestasi_3").change(function () {
  $("#nama_prestasi_3").prop("required", true);
  $("#kategori_3").prop("required", true);
  $("#tahun_prestasi_3").prop("required", true);
  // 2 MB
  if (this.files[0].size > 2097152) {
    $(this).addClass("is-invalid");
    this.value = "";
    $("#nama_prestasi_3").prop("required", false);
    $("#kategori_3").prop("required", false);
    $("#tahun_prestasi_3").prop("required", false);
  } else {
    $(this).removeClass("is-invalid");
    $(this).addClass("is-valid");
  }
});
// kategori 1 hafidz
$("#kategori_1").change(function () {
  if (this.value == "hafidz") {
    $("#tingkat_1").val("");
    $("#juara_1").val("");
  }
});
// kategori 2 hafidz
$("#kategori_2").change(function () {
  if (this.value == "hafidz") {
    $("#tingkat_2").val("");
    $("#juara_2").val("");
  }
});
// kategori 3 hafidz
$("#kategori_3").change(function () {
  if (this.value == "hafidz") {
    $("#tingkat_3").val("");
    $("#juara_3").val("");
  }
});
// scan scan kk
$("#kk").change(function () {
  // 2 MB
  if (this.files[0].size > 2097152) {
    $(this).addClass("is-invalid");
    this.value = "";
  } else {
    $(this).removeClass("is-invalid");
    $(this).addClass("is-valid");
  }
});
// scan scan ktp
$("#ktp").change(function () {
  // 2 MB
  if (this.files[0].size > 2097152) {
    $(this).addClass("is-invalid");
    this.value = "";
  } else {
    $(this).removeClass("is-invalid");
    $(this).addClass("is-valid");
  }
});
// scan scan kartu_pelajar
$("#kartu_pelajar").change(function () {
  // 2 MB
  if (this.files[0].size > 2097152) {
    $(this).addClass("is-invalid");
    this.value = "";
  } else {
    $(this).removeClass("is-invalid");
    $(this).addClass("is-valid");
  }
});
// scan scan pas_foto
$("#pas_foto").change(function () {
  // 2 MB
  if (this.files[0].size > 2097152) {
    $(this).addClass("is-invalid");
    this.value = "";
  } else {
    $(this).removeClass("is-invalid");
    $(this).addClass("is-valid");
  }
});
// scan scan raport_smt
$("#raport_smt").change(function () {
  // 2 MB
  if (this.files[0].size > 2097152) {
    $(this).addClass("is-invalid");
    this.value = "";
  } else {
    $(this).removeClass("is-invalid");
    $(this).addClass("is-valid");
  }
});
// scan scan raport
$("#raport").change(function () {
  // 2 MB
  if (this.files[0].size > 2097152) {
    $(this).addClass("is-invalid");
    this.value = "";
  } else {
    $(this).removeClass("is-invalid");
    $(this).addClass("is-valid");
  }
});
// scan scan sktm
$("#sktm").change(function () {
  // 2 MB
  if (this.files[0].size > 2097152) {
    $(this).addClass("is-invalid");
    this.value = "";
  } else {
    $(this).removeClass("is-invalid");
    $(this).addClass("is-valid");
  }
});
// scan scan diterima_pt
$("#diterima_pt").change(function () {
  // 2 MB
  if (this.files[0].size > 2097152) {
    $(this).addClass("is-invalid");
    this.value = "";
  } else {
    $(this).removeClass("is-invalid");
    $(this).addClass("is-valid");
  }
});
// scan scan proposal
$("#proposal").change(function () {
  // 2 MB
  if (this.files[0].size > 2097152) {
    $(this).addClass("is-invalid");
    this.value = "";
  } else {
    $(this).removeClass("is-invalid");
    $(this).addClass("is-valid");
  }
});
// scan scan akreditasi_pt
$("#akreditasi_pt").change(function () {
  // 2 MB
  if (this.files[0].size > 2097152) {
    $(this).addClass("is-invalid");
    this.value = "";
  } else {
    $(this).removeClass("is-invalid");
    $(this).addClass("is-valid");
  }
});
// scan scan formulir_pendaftaran
$("#formulir_pendaftaran").change(function () {
  // 2 MB
  if (this.files[0].size > 8388608) {
    $(this).addClass("is-invalid");
    this.value = "";
  } else {
    $(this).removeClass("is-invalid");
    $(this).addClass("is-valid");
  }
});

// ************** edit prestasi ******************* //
$(document).ready(function () {
  for (let index = 1; index <= 3; index++) {
    if (
      $("#kategori_" + index).val() == "hafidz" ||
      $("#kategori_" + index).val() == "ujian sekolah" ||
      $("#kategori_" + index).val() == "lainnya" ||
      $("#kategori_" + index).val() == "KHS"
    ) {
      // $("#scan_prestasi_" + index).prop("disabled", true);
      $("#tingkat_" + index).prop("disabled", true);
      $("#juara_" + index).prop("disabled", true);
    } else {
      // $("#scan_prestasi_" + index).prop("disabled", false);
      $("#tingkat_" + index).prop("disabled", false);
      $("#juara_" + index).prop("disabled", false);
    }
  }
});
// prestasi
$(document).ready(function () {
  for (let index_prestasi = 1; index_prestasi <= 3; index_prestasi++) {
    $("#file_prestasi_" + index_prestasi).change(function (e) {
      var file = e.target.files[0].name;
      console.log(file);
      $("label[for='file_prestasi_" + index_prestasi + "']").empty();
      $("label[for='file_prestasi_" + index_prestasi + "']").append(
        '<a class="btn btn-secondary">Pilih File</a>'
      );
      $("label[for='file_prestasi_" + index_prestasi + "']").append(file);
    });
  }
});
const scan = [
  "kk",
  "ktp",
  "kartu_pelajar",
  "sktm",
  "raport_smt",
  "raport_legalisasi",
  "pas_foto",
  "proposal",
  "diterima_pt",
  "akreditasi_pt",
  "formulir_pendaftaran",
];
// scan lampiran
$(document).ready(function () {
  scan.forEach((file_scan) => {
    $("#" + file_scan).change(function (e) {
      var file = e.target.files[0].name;
      $("label[for='" + file_scan + "']").empty();
      $("label[for='" + file_scan + "']").append(
        '<a class="btn btn-secondary">Pilih File</a>'
      );
      $("label[for='" + file_scan + "']").append(file);
    });
  });
});

// Show/hide password
var state = false;

function toogle() {
  if (state) {
    document.getElementById("sandi").setAttribute("type", "password");
    document.getElementById("eye").style.color = "#000";
    state = false;
  } else {
    document.getElementById("sandi").setAttribute("type", "text");
    document.getElementById("eye").style.color = "#006AC2";
    state = true;
  }
}

function toogle2() {
  if (state) {
    document.getElementById("ulangiSandi").setAttribute("type", "password");
    document.getElementById("eye2").style.color = "#000";
    state = false;
  } else {
    document.getElementById("ulangiSandi").setAttribute("type", "text");
    document.getElementById("eye2").style.color = "#006AC2";
    state = true;
  }
}

// End show/hide password
