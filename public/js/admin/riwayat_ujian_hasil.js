/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!***************************************************!*\
  !*** ./resources/js/admin/riwayat_ujian_hasil.js ***!
  \***************************************************/
var table = $('#table').DataTable({
  processing: true,
  serverSide: true,
  ajax: {
    url: URL_ADMIN + "/riwayat-ujian/" + ujianId
  },
  columns: [{
    data: 'index',
    name: 'id'
  }, {
    data: 'siswa.nama',
    name: 'siswa.nama'
  }, {
    data: 'mulai',
    name: 'mulai'
  }, {
    data: 'selesai',
    name: 'selesai'
  }, {
    data: 'nilai',
    name: 'nilai'
  }, {
    data: 'opsi',
    name: 'id'
  }]
}); // hasil ujian

var modalHasil = $('#modalHasil');
table.on('click', '.btn-hasil', function () {
  var data = $(this).data();
  var tableHasil = $('#tableHasil').DataTable({
    destroy: true,
    serverSide: true,
    processing: true,
    ajax: {
      url: URL_ADMIN + "/riwayat-ujian/hasil",
      data: {
        id: data.id
      }
    },
    columns: [{
      data: 'index',
      name: 'id',
      className: 'text-center'
    }, {
      data: 'soal.pertanyaan',
      name: 'soal.pertanyaan'
    }, {
      data: 'jawaban',
      name: 'jawaban'
    }, {
      data: 'status',
      name: 'status',
      className: 'text-center'
    }]
  });
  modalHasil.modal('show');
}); // refresh table

$('#refreshTable').on('click', function () {
  $('#iconRefresh').addClass('fa-spin');
  table.draw();
  setTimeout(function () {
    $("#iconRefresh").removeClass('fa-spin');
  }, 1000);
});
/******/ })()
;