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
/*!**************************************!*\
  !*** ./resources/js/admin/rombel.js ***!
  \**************************************/
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _partials_select_kelas__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../partials/select_kelas */ "./resources/js/partials/select_kelas.js");
/* harmony import */ var _partials_select_kelas__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_partials_select_kelas__WEBPACK_IMPORTED_MODULE_0__);

var table = $('#table').DataTable({
  processing: true,
  serverSide: true,
  ajax: {
    url: URL_ADMIN + '/rombel/datatable'
  },
  columns: [{
    data: 'index',
    name: 'id'
  }, {
    data: 'kelas.nama',
    name: 'kelas.nama'
  }, {
    data: 'nama',
    name: 'nama'
  }, {
    data: 'opsi',
    name: 'id'
  }]
}); // Tambah Rombel

var modalTambah = $('#modalTambah');
$('#formTambah').on('submit', function (e) {
  e.preventDefault();
  var formTambah = $(this);
  var form = new FormData(this);
  $.post({
    url: URL_ADMIN + '/rombel',
    processData: false,
    contentType: false,
    data: form,
    success: function success(res) {
      formTambah.trigger('reset');
      modalTambah.modal('hide');
      Swal.fire('Berhasil', 'Rombel berhasil ditambahkan', 'success');
      table.draw();
    }
  });
}); // Edit Rombel

var modalEdit = $('#modalEdit');
$(document).on('click', '.btn-edit', function () {
  var data = $(this).data();
  var option = new Option(data.kelasNama, data.kelasId, true, true);
  $('#editId').val(data.id);
  $('#editKelas').append(option).trigger('change');
  $('#editNama').val(data.nama);
  modalEdit.modal('show');
});
$('#formEdit').on('submit', function (e) {
  e.preventDefault();
  var form = new FormData(this);
  form.append('_method', 'PUT');
  $.post({
    url: URL_ADMIN + '/rombel/' + $('#editId').val(),
    processData: false,
    contentType: false,
    data: form,
    success: function success(res) {
      Swal.fire('Berhasil', 'Rombongan Belajar berhasil diperbarui', 'success');
      table.draw();
      modalEdit.modal('hide');
    }
  });
}); // Hapus rombel

$(document).on('click', '.btn-hapus', function () {
  var data = $(this).data();
  Swal.fire({
    title: "Hapus Rombongan Belajar?",
    icon: "question",
    html: '<div class="alert alert-danger">Menghapus Rombel akan menghapus data lainnya  yang terkait</div>',
    showCancelButton: true,
    cancelButtonText: "Tidak",
    confirmButtonText: "Ya, hapus!"
  }).then(function (hapus) {
    if (hapus.value) {
      $.ajax({
        url: URL_ADMIN + '/rombel/' + data.id,
        type: 'DELETE',
        success: function success(res) {
          if (res.status) {
            Swal.fire('Berhasil', 'Rombongan Belajar berhasil dihapus', 'success');
            table.draw();
          }
        }
      });
    }
  });
});
})();

/******/ })()
;