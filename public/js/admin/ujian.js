/******/ (() => { // webpackBootstrap
/******/ 	var __webpack_modules__ = ({

/***/ "./resources/js/partials/select_kelas.js":
/*!***********************************************!*\
  !*** ./resources/js/partials/select_kelas.js ***!
  \***********************************************/
/***/ (() => {

var selectKelas = $('.select-kelas').select2({
  theme: 'bootstrap4',
  placeholder: 'Pilih Kelas',
  allowClear: true,
  ajax: {
    url: URL_ADMIN + '/kelas/select2',
    dataType: 'json',
    data: function data(params) {
      return {
        term: params.term
      };
    }
  }
});

/***/ }),

/***/ "./resources/js/partials/select_mapel.js":
/*!***********************************************!*\
  !*** ./resources/js/partials/select_mapel.js ***!
  \***********************************************/
/***/ (() => {

var selectMapel = $('.select-mapel').select2({
  theme: "bootstrap4",
  placeholder: "Pilih Mata Pelajaran",
  allowClear: true,
  ajax: {
    url: URL_ADMIN + '/mapel/select2',
    data: function data(params) {
      return {
        term: params.term
      };
    }
  }
});

/***/ }),

/***/ "./resources/js/partials/select_paket_soal.js":
/*!****************************************************!*\
  !*** ./resources/js/partials/select_paket_soal.js ***!
  \****************************************************/
/***/ (() => {

var selectPaketSoal = $('.select-paket-soal').select2({
  theme: 'bootstrap4',
  placeholder: 'Pilih Paket Soal',
  allowClear: true,
  ajax: {
    url: URL_ADMIN + '/paket-soal/select2',
    dataType: 'json',
    data: function data(params) {
      return {
        term: params.term,
        kelas_id: $('.select-kelas').val(),
        mapel_id: $('.select-mapel').val(),
        type: $('.select-paket-soal').data('type')
      };
    }
  }
});

/***/ }),

/***/ "./resources/js/partials/select_rombel.js":
/*!************************************************!*\
  !*** ./resources/js/partials/select_rombel.js ***!
  \************************************************/
/***/ (() => {

var selectRombel = $('.select-rombel').select2({
  theme: 'bootstrap4',
  placeholder: 'Pilih Rombongan Belajar',
  allowClear: true,
  ajax: {
    url: URL_ADMIN + '/rombel/select2',
    dataType: 'json',
    data: function data(params) {
      return {
        term: params.term,
        kelas_id: $('.select-kelas').val()
      };
    },
    processResults: function processResults(data) {
      console.log(data);
      var results = [];
      data.results.forEach(function (item, index) {
        results.push({
          id: item.id,
          text: item.kelas.nama + ' ' + item.text
        });
      });
      return {
        results: results
      };
    }
  }
});

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	// The module cache
/******/ 	var __webpack_module_cache__ = {};
/******/ 	
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/ 		// Check if module is in cache
/******/ 		var cachedModule = __webpack_module_cache__[moduleId];
/******/ 		if (cachedModule !== undefined) {
/******/ 			return cachedModule.exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = __webpack_module_cache__[moduleId] = {
/******/ 			// no module.id needed
/******/ 			// no module.loaded needed
/******/ 			exports: {}
/******/ 		};
/******/ 	
/******/ 		// Execute the module function
/******/ 		__webpack_modules__[moduleId](module, module.exports, __webpack_require__);
/******/ 	
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/ 	
/************************************************************************/
/******/ 	/* webpack/runtime/compat get default export */
/******/ 	(() => {
/******/ 		// getDefaultExport function for compatibility with non-harmony modules
/******/ 		__webpack_require__.n = (module) => {
/******/ 			var getter = module && module.__esModule ?
/******/ 				() => (module['default']) :
/******/ 				() => (module);
/******/ 			__webpack_require__.d(getter, { a: getter });
/******/ 			return getter;
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/define property getters */
/******/ 	(() => {
/******/ 		// define getter functions for harmony exports
/******/ 		__webpack_require__.d = (exports, definition) => {
/******/ 			for(var key in definition) {
/******/ 				if(__webpack_require__.o(definition, key) && !__webpack_require__.o(exports, key)) {
/******/ 					Object.defineProperty(exports, key, { enumerable: true, get: definition[key] });
/******/ 				}
/******/ 			}
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/hasOwnProperty shorthand */
/******/ 	(() => {
/******/ 		__webpack_require__.o = (obj, prop) => (Object.prototype.hasOwnProperty.call(obj, prop))
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/make namespace object */
/******/ 	(() => {
/******/ 		// define __esModule on exports
/******/ 		__webpack_require__.r = (exports) => {
/******/ 			if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 				Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 			}
/******/ 			Object.defineProperty(exports, '__esModule', { value: true });
/******/ 		};
/******/ 	})();
/******/ 	
/************************************************************************/
var __webpack_exports__ = {};
// This entry need to be wrapped in an IIFE because it need to be in strict mode.
(() => {
"use strict";
/*!*************************************!*\
  !*** ./resources/js/admin/ujian.js ***!
  \*************************************/
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _partials_select_kelas__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../partials/select_kelas */ "./resources/js/partials/select_kelas.js");
/* harmony import */ var _partials_select_kelas__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_partials_select_kelas__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _partials_select_mapel__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../partials/select_mapel */ "./resources/js/partials/select_mapel.js");
/* harmony import */ var _partials_select_mapel__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_partials_select_mapel__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _partials_select_rombel__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../partials/select_rombel */ "./resources/js/partials/select_rombel.js");
/* harmony import */ var _partials_select_rombel__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_partials_select_rombel__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _partials_select_paket_soal__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ../partials/select_paket_soal */ "./resources/js/partials/select_paket_soal.js");
/* harmony import */ var _partials_select_paket_soal__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(_partials_select_paket_soal__WEBPACK_IMPORTED_MODULE_3__);




var table = $('#table').DataTable({
  processing: true,
  serverSide: true,
  ajax: {
    url: URL_ADMIN + '/ujian/datatable'
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
    data: 'id'
  }]
});
var addWaktuMulai = $('#addWaktu').daterangepicker({
  singleDatePicker: true,
  timePicker: true,
  timePicker24Hour: true,
  startDate: new Date(),
  minDate: new Date(),
  locale: {
    format: 'D-M-Y hh:mm'
  }
});
$('#tes').daterangepicker(); // form tambah

var formTambah = $('#formTambah');
formTambah.on('submit', function (e) {
  e.preventDefault();
  var form = new FormData(this);
  $.post({
    url: URL_ADMIN + '/ujian',
    processData: false,
    contentType: false,
    data: form,
    success: function success(res) {
      console.log(res);
    }
  });
});
})();

/******/ })()
;