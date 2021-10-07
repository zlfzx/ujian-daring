/******/ (() => { // webpackBootstrap
/******/ 	var __webpack_modules__ = ({

/***/ "./resources/js/partials/select_rombel.js":
/*!************************************************!*\
  !*** ./resources/js/partials/select_rombel.js ***!
  \************************************************/
/***/ (() => {

var selectRombel = $('.select-rombel').select2({
  theme: 'bootstrap4',
  placeholder: 'Pilih Rombongan Belajar',
  ajax: {
    url: URL_ADMIN + '/rombel/select2',
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
/*!*************************************!*\
  !*** ./resources/js/admin/siswa.js ***!
  \*************************************/
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _partials_select_rombel__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../partials/select_rombel */ "./resources/js/partials/select_rombel.js");
/* harmony import */ var _partials_select_rombel__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_partials_select_rombel__WEBPACK_IMPORTED_MODULE_0__);

var table = $('#table').DataTable({
  processing: true,
  serverSide: true,
  ajax: {
    url: URL_ADMIN + '/siswa/datatable'
  },
  columns: [{
    data: 'index',
    name: 'id'
  }, {
    data: 'rombel.nama',
    name: 'rombel.nama'
  }, {
    data: 'nama'
  }, {
    data: 'nis'
  }, {
    data: 'jenis_kelamin'
  }, {
    data: 'opsi'
  }]
}); // Tambah Siswa

var modalTambah = $('#modalTambah');
$('#formTambah').on('submit', function (e) {
  e.preventDefault();
  var form = new FormData(this);
  $.post({
    url: URL_ADMIN + '/siswa',
    processData: false,
    contentType: false,
    data: form,
    success: function success(res) {
      modalTambah.modal('hide');
      $(this).trigger('reset');
      Swal.fire('Berhasil', 'Siswa berhasil ditambahkan', 'success');
      table.draw();
    }
  });
}); // Edit Siswa

var modalEdit = $('#modalEdit');
$(document).on('click', '.btn-edit', function () {
  var data = $(this).data();
  console.log(data);
  var option = new Option(data.rombelNama, data.rombelId, true, true);
  $('#editId').val(data.id);
  $('#editRombel').append(option).trigger('change');
  $('#editNama').val(data.nama);
  $('#editNis').val(data.nis);
  $('#editJenisKelamin').val(data.jenisKelamin).trigger('change');
  modalEdit.modal('show');
});
$('#formEdit').on('submit', function (e) {
  e.preventDefault();
  var formEdit = $(this);
  var form = new FormData(this);
  form.append('_method', 'PUT');
  $.post({
    url: URL_ADMIN + '/siswa/' + $('#editId').val(),
    processData: false,
    contentType: false,
    data: form,
    success: function success(res) {
      Swal.fire('Berhasil', 'Siswa berhasil diperbarui', 'success');
      table.draw();
      modalEdit.modal('hide');
    }
  });
}); // Hapus Siswa

$(document).on('click', '.btn-hapus', function () {
  var data = $(this).data();
  Swal.fire({
    title: "Hapus Siswa",
    icon: 'question',
    html: '<div class="alert alert-danger">Menghapus siswa akan menghapus data launnya yang terkait</div>',
    showCancelButton: true,
    cancelButtonText: "Tidak",
    confirmButtonText: "Ya, hapus!"
  }).then(function (hapus) {
    if (hapus.value) {
      $.ajax({
        url: URL_ADMIN + '/siswa/' + data.id,
        type: 'DELETE',
        success: function success(res) {
          Swal.fire('Berhail', 'Siswa berhasil dihapus', 'success');
          table.draw();
        }
      });
    }
  });
});
})();

/******/ })()
;