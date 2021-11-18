/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!*********************************************!*\
  !*** ./resources/js/admin/riwayat_ujian.js ***!
  \*********************************************/
var table = $('#table').DataTable({
  processing: true,
  serverSide: true,
  ajax: {
    url: URL_ADMIN + '/riwayat-ujian/datatable'
  },
  columns: [{
    data: 'index',
    name: 'id'
  }, {
    data: 'nama'
  }, {
    data: 'rombel.nama'
  }, {
    data: 'paket_soal.nama'
  }, {
    data: 'waktu_mulai'
  }, {
    data: 'opsi',
    name: 'id'
  }]
});
/******/ })()
;