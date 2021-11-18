/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!***************************************************!*\
  !*** ./resources/js/admin/riwayat_ujian_hasil.js ***!
  \***************************************************/
var table = $('#table').DataTable(); // hasil ujian

var modalHasil = $('#modalHasil');
$('.btn-hasil').on('click', function () {
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
});
/******/ })()
;