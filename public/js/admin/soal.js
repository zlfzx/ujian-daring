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
  ajax: {
    url: URL_ADMIN + '/paket-soal/select2',
    dataType: 'json',
    data: function data(params) {
      return {
        term: params.term,
        kelas_id: $('.select-kelas').val(),
        mapel_id: $('.select-mapel').val()
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
/*!************************************!*\
  !*** ./resources/js/admin/soal.js ***!
  \************************************/
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _partials_select_kelas__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../partials/select_kelas */ "./resources/js/partials/select_kelas.js");
/* harmony import */ var _partials_select_kelas__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_partials_select_kelas__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _partials_select_mapel__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../partials/select_mapel */ "./resources/js/partials/select_mapel.js");
/* harmony import */ var _partials_select_mapel__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_partials_select_mapel__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _partials_select_paket_soal__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../partials/select_paket_soal */ "./resources/js/partials/select_paket_soal.js");
/* harmony import */ var _partials_select_paket_soal__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_partials_select_paket_soal__WEBPACK_IMPORTED_MODULE_2__);



var table = $('#table').DataTable({
  processing: true,
  serverSide: true,
  ajax: {
    url: URL_ADMIN + '/soal/datatable',
    data: function data(d) {
      d.kelas_id = $('#selectKelas').val();
      d.mapel_id = $('#selectMapel').val();
      d.paket_soal_id = $('#selectPaket').val();
    }
  },
  columns: [{
    data: 'index',
    name: 'id'
  }, {
    data: 'paket_soal.nama',
    name: 'paketSoal.nama'
  }, {
    data: 'pertanyaan',
    name: 'soal'
  }, {
    data: 'jenis',
    name: 'jenis'
  }, {
    data: 'index',
    name: 'id'
  }, {
    data: 'index',
    name: 'id'
  }]
});
$('.select-filter').on('change', function () {
  table.draw();
});
})();

/******/ })()
;