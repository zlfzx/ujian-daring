(()=>{var a={234:()=>{$(".select-rombel").select2({theme:"bootstrap4",placeholder:"Pilih Rombongan Belajar",ajax:{url:URL_ADMIN+"/rombel/select2",dataType:"json",data:function(a){return{term:a.term}}}})}},e={};function t(n){var r=e[n];if(void 0!==r)return r.exports;var i=e[n]={exports:{}};return a[n](i,i.exports,t),i.exports}t.n=a=>{var e=a&&a.__esModule?()=>a.default:()=>a;return t.d(e,{a:e}),e},t.d=(a,e)=>{for(var n in e)t.o(e,n)&&!t.o(a,n)&&Object.defineProperty(a,n,{enumerable:!0,get:e[n]})},t.o=(a,e)=>Object.prototype.hasOwnProperty.call(a,e),(()=>{"use strict";t(234);var a=$("#table").DataTable({processing:!0,serverSide:!0,ajax:{url:URL_ADMIN+"/siswa/datatable"},columns:[{data:"index",name:"id"},{data:"rombel.nama",name:"rombel.nama",render:function(a,e,t){return t.rombel.kelas.nama+" "+a}},{data:"nama"},{data:"nis"},{data:"jenis_kelamin"},{data:"opsi"}]}),e=$("#modalTambah");$("#formTambah").on("submit",(function(t){t.preventDefault();var n=new FormData(this);$.post({url:URL_ADMIN+"/siswa",processData:!1,contentType:!1,data:n,success:function(t){e.modal("hide"),$(this).trigger("reset"),Swal.fire("Berhasil","Siswa berhasil ditambahkan","success"),a.draw()}})}));var n=$("#modalEdit");$(document).on("click",".btn-edit",(function(){var a=$(this).data();console.log(a);var e=new Option(a.rombelNama,a.rombelId,!0,!0);$("#editId").val(a.id),$("#editRombel").append(e).trigger("change"),$("#editNama").val(a.nama),$("#editNis").val(a.nis),$("#editJenisKelamin").val(a.jenisKelamin).trigger("change"),n.modal("show")})),$("#formEdit").on("submit",(function(e){e.preventDefault();$(this);var t=new FormData(this);t.append("_method","PUT"),$.post({url:URL_ADMIN+"/siswa/"+$("#editId").val(),processData:!1,contentType:!1,data:t,success:function(e){Swal.fire("Berhasil","Siswa berhasil diperbarui","success"),a.draw(),n.modal("hide")}})})),$(document).on("click",".btn-hapus",(function(){var e=$(this).data();Swal.fire({title:"Hapus Siswa",icon:"question",html:'<div class="alert alert-danger">Menghapus siswa akan menghapus data launnya yang terkait</div>',showCancelButton:!0,cancelButtonText:"Tidak",confirmButtonText:"Ya, hapus!"}).then((function(t){t.value&&$.ajax({url:URL_ADMIN+"/siswa/"+e.id,type:"DELETE",success:function(e){Swal.fire("Berhail","Siswa berhasil dihapus","success"),a.draw()}})}))}))})()})();