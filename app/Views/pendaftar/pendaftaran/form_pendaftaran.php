<?= $this->extend('templates/template_pendaftar'); ?>

<?= $this->section('content'); ?>
<!-- Form pendaftaran -->
<div class="pendaftaran py-5 bglight2">
    <div class="container">
        <div class="d-flex align-items-xl-center align-items-baseline mb-5">
            <a href="<?= base_url(); ?>/home_pendaftar/pendaftaran" class="fw-bold blue fs20 me-3"><i
                    class="fa-solid fa-arrow-left-long"></i></a>
            <h3 class="biru fw-bold fs28">Form Pendaftaran Bantuan Biaya Pendidikan Bagi
                <?= ($id_peserta == 1) ? 'SMA/SMK/MA Sederajat' : (($id_peserta == 2) ? 'Calon Mahasiswa' : 'Mahasiswa'); ?></span>
            </h3>
        </div>
        <div id="smartwizard" class="">
            <ul class="nav p-3 bdblue bgwhite br25 mb-3">
                <li class="nav-item">
                    <a class="nav-link fw-bold fs14" href="#step-1" id="1">
                        Tahap 1 <br>
                        <span>Lengkapi Identitas Diri </span>
                    </a>
                </li>
                <li class="nav-item mt-3 mt-md-0">
                    <a class="nav-link fw-bold fs14" href="#step-2" id="2">
                        Tahap 2 <br>
                        <span>Lengkapi Data Orang Tua</span>
                    </a>
                </li>
                <li class="nav-item mt-3 mt-md-0">
                    <a class="nav-link fw-bold fs14" href="#step-3" id="3">
                        Tahap 3 <br>
                        <span>Lengkapi Dokumen</span>
                    </a>
                </li>
                <li class="nav-item mt-3 mt-md-0">
                    <a class="nav-link fw-bold fs14" href="#step-4">
                        Tahap 4 <br>
                        <span>Kirim Ulang Formulir</span>
                    </a>
                </li>
                <li class="nav-item mt-3 mt-md-0">
                    <a class="nav-link fw-bold fs14" href="#step-5">
                        Tahap 5 <br>
                        <span>Cek Data</span>
                    </a>
                </li>
            </ul>

            <div class="tab-content bgwhite bdblue br25 p-4 p-sm-5">
                <!-- Form identitas -->
                <div id="step-1" class="tab-pane p-0" role="tabpanel" aria-labelledby="step-1">
                    <?= $this->include('pendaftar/pendaftaran/form_identitas') ?>
                </div>
                <!-- End form identitas -->

                <!-- form keluarga -->
                <div id="step-2" class="tab-pane p-0" role="tabpanel" aria-labelledby="step-2">
                    <?= $this->include('pendaftar/pendaftaran/form_keluarga') ?>

                </div>
                <!-- end form keluarga -->

                <!-- form lampiran -->
                <div id="step-3" class="tab-pane p-0" role="tabpanel" aria-labelledby="step-3">
                    <?= $this->include('pendaftar/pendaftaran/form_lampiran') ?>
                </div>
                <!-- end form lampiran -->

                <!-- kirim ulang form pendaftaran -->
                <div id="step-4" class="tab-pane p-0" role="tabpanel" aria-labelledby="step-4">
                    <?= $this->include('pendaftar/pendaftaran/form_kirim_pendaftaran') ?>
                </div>
                <!-- end kirim ulang form pendaftaran -->

                <!-- review pendaftaran -->
                <div id="step-5" class="tab-pane p-0" role="tabpanel" aria-labelledby="step-5">
                    <?= $this->include('pendaftar/pendaftaran/review_pendaftaran') ?>
                </div>
                <!-- end review pendaftaran -->
            </div>

            <!-- Selanjutnya  Modal -->
            <div class="modal fade" id="selanjutnya_modal" tabindex="-1" aria-labelledby="saveModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Anda harus mengisi form dan menyimpannya terlebih dahulu.
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-bs-dismiss="modal">
                                Oke
                            </button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- End form pendaftaran -->

<!-- Wizard -->
<script type="text/javascript">
// alert invalid form fields
<?php if ($keluarga != null) : ?>
<?php if ($identitas['id_status_peserta'] == 1) : ?>
const scan_lampiran = [
    "kk",
    "kartu_pelajar",
    "pas_foto",
    "raport_smt",
    "raport",
    "sktm",
    "file_prestasi_1",
];
const invalid_scan_lampiran = [
    "kk-invalid",
    "kartu-pelajar-invalid",
    "pas-foto-invalid",
    "raport-smt-invalid",
    "raport-invalid",
    "sktm-invalid",
    "file-prestasi-invalid-1",
];
<?php elseif ($identitas['id_status_peserta'] == 2) : ?>
const scan_lampiran = [
    "kk",
    "ktp",
    "kartu_pelajar",
    "pas_foto",
    "diterima_pt",
    "proposal",
    "sktm",
    "file_prestasi_1",
];
const invalid_scan_lampiran = [
    "kk-invalid",
    "ktp-invalid",
    "kartu-pelajar-invalid",
    "pas-foto-invalid",
    "diterima-pt-invalid",
    "proposal-invalid",
    "sktm-invalid",
    "file-prestasi-invalid-1",
];
<?php else : ?>
const scan_lampiran = [
    "kk",
    "ktp",
    "kartu_pelajar",
    "pas_foto",
    "akreditasi_pt",
    "proposal",
    "sktm",
    "file_prestasi_1",
];
const invalid_scan_lampiran = [
    "kk-invalid",
    "ktp-invalid",
    "kartu-pelajar-invalid",
    "pas-foto-invalid",
    "akreditasi-pt-invalid",
    "proposal-invalid",
    "sktm-invalid",
    "file-prestasi-invalid-1",
];
<?php endif ?>
<?php endif ?>
<?php if ($keluarga != null && $file == null) : ?>
scan_lampiran.forEach((scan_change, index) => {
    $("#" + scan_change).change(function(e) {
        $('#' + invalid_scan_lampiran[index]).css('display', 'none');
    });
});
<?php elseif ($file != null) : ?>
$("#formulir_pendaftaran").change(function(e) {
    $('#formulir-pendaftaran-invalid').css('display', 'none');
    $('.pesan-gagal').hide();
});
<?php endif ?>
// }

$('form').on('submit', function(e) {
    //validasi file
    // form lampiran
    <?php if ($keluarga != null && $file == null) : ?>
    let i = 0;
    scan_lampiran.forEach((file_scan) => {
        var input = document.getElementById(file_scan);
        if (!input.files[0]) {
            var invalid = $('#' + invalid_scan_lampiran[i]).css('display', 'block');
            $('.pesan-gagal').show();
        } else {
            $('.pesan-gagal').hide();
        }
        i++;
    });

    // form kirim ulang pendaftaran
    <?php elseif ($file != null) : ?>
    var input = document.getElementById('formulir_pendaftaran');
    if (!input.files[0]) {
        var invalid = $('#formulir-pendaftaran-invalid').css('display', 'block');
        $('.pesan-gagal').show();
    } else {
        $('.pesan-gagal').hide();
    }
    <?php endif ?>

    // menampilkan loader
    // review pendaftaran
    <?php if ($file != null && $file['formulir_pendaftaran'] != null && $keluarga != null && $identitas != null) : ?>
            $("#btn_submit_review").empty();
            $('<div class="lds-ring"><div></div><div></div><div></div><div></div></div>').appendTo(
                "#btn_submit_review");
            <?php endif ?>
    $(document).ready(function() {
        var numItems = $('.invalid-feedback').filter(function() {
            return $(this).css('display') != 'none';
        }).length;
        console.log(numItems);
        if (numItems >= 1) {
            $('.pesan-gagal').show();
        } else {
            // menampilkan loader
            <?php if ($identitas == null) : ?>
                // form identitas
            $("#btn_submit_identitas").empty();
            $('<div class="lds-ring"><div></div><div></div><div></div><div></div></div>').appendTo(
                "#btn_submit_identitas");
            <?php elseif ($keluarga == null && $identitas != null) : ?>
                // form keluarga
            $("#btn_submit_keluarga").empty();
            $('<div class="lds-ring"><div></div><div></div><div></div><div></div></div>').appendTo(
                "#btn_submit_keluarga");
            <?php elseif ($file == null && $keluarga != null && $identitas != null) : ?>
                // form lampiran
            $("#btn_submit_lampiran").empty();
            $('<div class="lds-ring"><div></div><div></div><div></div><div></div></div>').appendTo(
                "#btn_submit_lampiran");
            <?php elseif ($file != null && $file['formulir_pendaftaran'] == null && $keluarga != null && $identitas != null) : ?>
            // form kirim ulang formulir
                $("#btn_submit_formulir").empty();
            $('<div class="lds-ring"><div></div><div></div><div></div><div></div></div>').appendTo(
                "#btn_submit_formulir");
            <?php endif ?>

        }
    });
});
// jika terdapat error dalam input prestasi 2
<?php if ($validation->getError('scan_prestasi_2') != null || $validation->getError('nama_prestasi_2') != null || $validation->getError('kategori_2') != null || $validation->getError('tahun_prestasi_2') != null) : ?>
$(document).ready(function() {
    $("#prestasi_2").show();
    // $("#prestasi_2_modal").show();
    $("#icon-tambah-1").hide();
    $("#label-tambah-1").hide();
});
<?php else : ?>
$(document).ready(function() {
    $("#prestasi_2").hide();
    // $("#prestasi_2_modal").show();
    $("#icon-tambah-1").show();
    $("#label-tambah-1").show();
});
<?php endif ?>

// jika terdapat error dalam input prestasi 3
<?php if ($validation->getError('scan_prestasi_3') != null || $validation->getError('nama_prestasi_3') != null || $validation->getError('kategori_3') != null || $validation->getError('tahun_prestasi_3') != null) : ?>
$(document).ready(function() {
    // pretasi 3
    $("#prestasi_3").show();
    // $("#prestasi_2_modal").show();
    $("#icon-tambah-2").hide();
    $("#label-tambah-2").hide();

    // prestasi 2
    $("#prestasi_2").show();
    // $("#prestasi_2_modal").show();
    $("#icon-tambah-1").hide();
    $("#label-tambah-1").hide();
});
<?php else : ?>
$(document).ready(function() {
    $("#prestasi_3").hide();
    // $("#prestasi_2_modal").show();
    $("#icon-tambah-2").show();
    $("#label-tambah-2").show();
});
<?php endif ?>

// Smartwizard
$(document).ready(function() {
    $('#smartwizard').smartWizard({
        selected: 0, // Initial selected step, 0 = first step
        theme: 'dots', // theme for the wizard, related css need to include for other than default theme
        justified: true, // Nav menu justification. true/false
        darkMode: false, // Enable/disable Dark Mode if the theme supports. true/false
        autoAdjustHeight: true, // Automatically adjust content height
        cycleSteps: false, // Allows to cycle the navigation of steps
        backButtonSupport: true, // Enable the back button support
        enableURLhash: true, // Enable selection of the step based on url hash
        transition: {
            animation: 'none', // Effect on navigation, none/fade/slide-horizontal/slide-vertical/slide-swing
            speed: '400', // Transion animation speed
            easing: '' // Transition animation easing. Not supported without a jQuery easing plugin
        },
        anchorSettings: {
            anchorClickable: true, // Enable/Disable anchor navigation
            enableAllAnchors: false, // Activates all anchors clickable all times
            markDoneStep: true, // Add done state on navigation
            markAllPreviousStepsAsDone: true, // When a step selected by url hash, all previous steps are marked done
            removeDoneStepOnNavigateBack: false, // While navigate back done step after active step will be cleared
            enableAnchorOnDoneStep: true // Enable/Disable the done steps navigation
        },
        keyboardSettings: {
            keyNavigation: false, // Enable/Disable keyboard navigation(left and right keys are used if enabled)
            keyLeft: [37], // Left key code
            keyRight: [39] // Right key code
        },
        lang: { // Language variables for button
            next: 'Selanjutnya',
            previous: 'Sebelumnya'
        },
        // form identitas belum diisi
        <?php if ($identitas == null) : ?>
        toolbarSettings: {
            toolbarPosition: 'bottom', // none, top, bottom, both
            toolbarButtonPosition: 'right', // left, right, center
            showNextButton: true, // show/hide a Next button
            showPreviousButton: true, // show/hide a Previous button
            toolbarExtraButtons: [
                $(
                    `<button type="button" data-bs-toggle="modal" data-bs-target="#save_modal" class="simpan"></button>`
                )
                .text('Simpan')
                .addClass('btn btn-success btn-simpan')
            ] // Extra buttons to show on toolbar, array of jQuery input/buttons elements
        },
        disabledSteps: [2, 3, 4, 5], // Array Steps disabled

        // form keluarga belum diisi dan identitas sudah diisi
        <?php elseif ($keluarga == null && $identitas != null) : ?>
        toolbarSettings: {
            toolbarPosition: 'bottom', // none, top, bottom, both
            toolbarButtonPosition: 'right', // left, right, center
            showNextButton: true, // show/hide a Next button
            showPreviousButton: true, // show/hide a Previous button
            toolbarExtraButtons: [
                $(
                    `<button type="button" data-bs-toggle="modal" data-bs-target="#save_modal_keluarga" class="simpan"></button>`
                )
                .text('Simpan')
                .addClass('btn btn-success btn-simpan')
            ] // Extra buttons to show on toolbar, array of jQuery input/buttons elements
        },
        disabledSteps: [3, 4, 5], // Array Steps disabled

        // form lampiran
        <?php elseif ($file == null && $keluarga != null && $identitas != null) : ?>
        toolbarSettings: {
            toolbarPosition: 'bottom', // none, top, bottom, both
            toolbarButtonPosition: 'right', // left, right, center
            showNextButton: true, // show/hide a Next button
            showPreviousButton: true, // show/hide a Previous button
            toolbarExtraButtons: [
                $(
                    `<button type="button" data-bs-toggle="modal" data-bs-target="#save_modal_lampiran" class="simpan"></button>`
                )
                .text('Simpan')
                .addClass('btn btn-success btn-simpan')
            ] // Extra buttons to show on toolbar, array of jQuery input/buttons elements
        },
        disabledSteps: [4, 5], // Array Steps disabled

        // form kirim ulang formulir pendaftaran
        <?php elseif ($file != null && $file['formulir_pendaftaran'] == null && $keluarga != null && $identitas != null) : ?>
        toolbarSettings: {
            toolbarPosition: 'bottom', // none, top, bottom, both
            toolbarButtonPosition: 'right', // left, right, center
            showNextButton: true, // show/hide a Next button
            showPreviousButton: true, // show/hide a Previous button
            toolbarExtraButtons: [
                $(
                    `<button type="button" data-bs-toggle="modal" data-bs-target="#save_formulir_modal" class="simpan"></button>`
                )
                .text('Simpan')
                .addClass('btn btn-success btn-simpan')
            ] // Extra buttons to show on toolbar, array of jQuery input/buttons elements
        },
        disabledSteps: [5], // Array Steps disabled

        // review pendaftaran
        <?php elseif ($file != null && $file['formulir_pendaftaran'] != null && $keluarga != null && $identitas != null) : ?>
        toolbarSettings: {
            toolbarPosition: 'bottom', // none, top, bottom, both
            toolbarButtonPosition: 'right', // left, right, center
            showNextButton: true, // show/hide a Next button
            showPreviousButton: true, // show/hide a Previous button
            toolbarExtraButtons: [
                $(
                    `<button type="button" data-bs-toggle="modal" data-bs-target="#ajukan_modal" class="simpan"></button>`
                )
                .text('Ajukan')
                .addClass('btn btn-success btn-simpan')
            ] // Extra buttons to show on toolbar, array of jQuery input/buttons elements
        },
        disabledSteps: [], // Array Steps disabled
        <?php endif ?>
        errorSteps: [], // Highlight step with errors
        hiddenSteps: [] // Hidden steps
    });

    // form identitas belum diisi
    <?php if ($identitas == null) : ?>
    $('.sw-btn-next').attr({
        "data-bs-toggle": "modal",
        "data-bs-target": "#selanjutnya_modal"
    });
    // Initialize the leaveStep event
    $("#smartwizard").on("leaveStep", function(e, anchorObject, currentStepIndex, nextStepIndex,
        stepDirection) {
        if (stepDirection == 'forward') {
            return false;
        }
    });
    // form keluarga belum diisi dan identitas sudah diisi
    <?php elseif ($keluarga == null && $identitas != null) : ?>
    // Go to step 1
    $('#smartwizard').smartWizard("next");
    $('.sw-btn-next').attr({
        "data-bs-toggle": "modal",
        "data-bs-target": "#selanjutnya_modal"
    });
    $("#smartwizard").on("leaveStep", function(e, anchorObject, currentStepIndex, nextStepIndex,
        stepDirection) {
        if (stepDirection == 'forward') {
            $(".simpan").show();
            $('.sw-btn-next').attr({
                "data-bs-toggle": "modal",
                "data-bs-target": "#selanjutnya_modal"
            });
            if (nextStepIndex == 2) {
                return false;
            } else {
                return true
            }
        } else if (stepDirection == 'backward' && currentStepIndex == 2) {
            $('.sw-btn-next').attr({
                "data-bs-toggle": "modal",
                "data-bs-target": "#selanjutnya_modal"
            });
            return true
        } else if (stepDirection == 'backward') {
            $('.sw-btn-next').attr({
                "data-bs-target": "#bukan_selanjutnya_modal"
            });
            $(".simpan").hide();
            return true
        } else {
            $(".simpan").hide();
        }
    });
    // form lampiran belum diisi
    <?php elseif ($file == null && $keluarga != null && $identitas != null) : ?>
    // Go to step 2
    $('#smartwizard').smartWizard("next");
    $('#smartwizard').smartWizard("next");
    $('.sw-btn-next').attr({
        "data-bs-toggle": "modal",
        "data-bs-target": "#selanjutnya_modal"
    });
    $("#smartwizard").on("leaveStep", function(e, anchorObject, currentStepIndex, nextStepIndex,
        stepDirection) {
        // jika masuk ke tahap 3
        if (stepDirection == 'forward' && nextStepIndex == 2) {
            $(".simpan").show();
            $('.sw-btn-next').attr({
                "data-bs-toggle": "modal",
                "data-bs-target": "#selanjutnya_modal"
            });
        } else if (stepDirection == 'forward' && nextStepIndex == 3) {
            return false;
        } else if (stepDirection == 'backward' && currentStepIndex == 3) {
            $('.sw-btn-next').attr({
                "data-bs-toggle": "modal",
                "data-bs-target": "#selanjutnya_modal"
            });
            return true
        } else if (stepDirection == 'backward') {
            $('.sw-btn-next').attr({
                "data-bs-target": "#bukan_selanjutnya_modal"
            });
            $(".simpan").hide();
            return true
        } else {
            $(".simpan").hide();
        }
    });
    // form formulir pendaftaran belum diisi
    <?php elseif ($file != null && $file['formulir_pendaftaran'] == null && $keluarga != null && $identitas != null) : ?>
    // Go to step 3
    $('#smartwizard').smartWizard("next");
    $('#smartwizard').smartWizard("next");
    $('#smartwizard').smartWizard("next");
    $('.sw-btn-next').attr({
        "data-bs-toggle": "modal",
        "data-bs-target": "#selanjutnya_modal"
    });
    $("#smartwizard").on("leaveStep", function(e, anchorObject, currentStepIndex, nextStepIndex,
        stepDirection) {
        // jika masuk ke tahap 3
        if (stepDirection == 'forward' && nextStepIndex == 3) {
            $(".simpan").show();
            $('.sw-btn-next').attr({
                "data-bs-toggle": "modal",
                "data-bs-target": "#selanjutnya_modal"
            });
        } else if (stepDirection == 'forward' && nextStepIndex == 4) {
            return false;
        } else if (stepDirection == 'backward' && currentStepIndex == 4) {
            $('.sw-btn-next').attr({
                "data-bs-toggle": "modal",
                "data-bs-target": "#selanjutnya_modal"
            });
            return true
        } else if (stepDirection == 'backward') {
            $('.sw-btn-next').attr({
                "data-bs-target": "#bukan_selanjutnya_modal"
            });
            $(".simpan").hide();
            return true
        } else {
            $(".simpan").hide();
        }
    });
    // review pendaftaran
    <?php elseif ($file != null && $file['formulir_pendaftaran'] != null && $keluarga != null && $identitas != null) : ?>
    // Go to step 4
    $('#smartwizard').smartWizard("next");
    $('#smartwizard').smartWizard("next");
    $('#smartwizard').smartWizard("next");
    $('#smartwizard').smartWizard("next");
    $('.sw-btn-next').attr({
        "data-bs-toggle": "modal",
        "data-bs-target": "#selanjutnya_modal"
    });

    $("#smartwizard").on("leaveStep", function(e, anchorObject, currentStepIndex, nextStepIndex,
        stepDirection) {
        // jika masuk ke tahap 3
        if (stepDirection == 'forward' && nextStepIndex == 4) {
            $(".simpan").show();
            $('.sw-btn-next').attr({
                "data-bs-toggle": "modal",
                "data-bs-target": "#selanjutnya_modal"
            });
        } else if (stepDirection == 'forward' && nextStepIndex == 5) {
            return false;
        } else if (stepDirection == 'backward' && currentStepIndex == 5) {
            $('.sw-btn-next').attr({
                "data-bs-toggle": "modal",
                "data-bs-target": "#selanjutnya_modal"
            });
            return true
        } else if (stepDirection == 'backward') {
            $('.sw-btn-next').attr({
                "data-bs-target": "#bukan_selanjutnya_modal"
            });
            $(".simpan").hide();
            return true
        } else {
            $(".simpan").hide();
        }
    });
    <?php endif ?>
});

// dropify upload lampiran penaftaran
$(".scan-lampiran").dropify({
    error: {
        fileSize: "Ukuran gambar terlalu besar ({{ value }} maksimal).",
        fileExtension: "format file tidak diperbolehkan, hanya ({{ value }} yang diperbolehkan).",
    },
    messages: {
        default: "Tarik dan letakkan file disini atau pilih",
        replace: "Tarik dan letakkan atau pilih gambar baru",
        remove: "Hapus",
        error: "Ooops, Terdapat kesalahan.",
    },
});
$(".lampiran-foto-pendaftaran").dropify({
    error: {
        fileSize: "Ukuran gambar terlalu besar ({{ value }} maksimal).",
        fileExtension: "format file tidak diperbolehkan, hanya ({{ value }} yang diperbolehkan).",
    },
    messages: {
        default: "Tarik dan letakkan file disini atau pilih",
        replace: "Tarik dan letakkan atau pilih gambar baru",
        remove: "Hapus",
        error: "Ooops, Terdapat kesalahan.",
    },
});
$(".lampiran-foto-review").dropify({
    error: {
        fileSize: "Ukuran gambar terlalu besar ({{ value }} maksimal).",
        fileExtension: "format file tidak diperbolehkan, hanya ({{ value }} yang diperbolehkan).",
    },
    messages: {
        default: "Tarik dan letakkan file disini atau pilih",
        replace: "Tarik dan letakkan atau pilih gambar baru",
        remove: "Hapus",
        error: "Ooops, Terdapat kesalahan.",
    },
});
</script>
<!-- Garis progress -->
<?php if ($identitas == null) : ?>
<style>
.sw-theme-dots>.nav::before {
    width: 20%;
}
</style>
<?php elseif ($keluarga == null && $identitas != null) : ?>
<style>
.sw-theme-dots>.nav::before {
    width: 40%;
}
</style>
<?php elseif ($file == null && $keluarga != null && $identitas != null) : ?>
<style>
.sw-theme-dots>.nav::before {
    width: 60%;
}
</style>
<?php elseif ($file != null && $file['formulir_pendaftaran'] == null && $keluarga != null && $identitas != null) : ?>
<style>
.sw-theme-dots>.nav::before {
    width: 80%;
}
</style>
<?php elseif ($file != null && $file['formulir_pendaftaran'] != null && $keluarga != null && $identitas != null) : ?>
<style>
.sw-theme-dots>.nav::before {
    width: 100%;
}
</style>

<?php endif ?>


<?= $this->endSection(); ?>