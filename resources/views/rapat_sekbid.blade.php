<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Rapat sekbid-bidang</title>

   <!-- Custom fonts for this template-->
  <link href="{{ URL::to('/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet"type="text/css">

  <!-- Page level plugin CSS-->
  <link href="{{ URL::to('/vendor/datatables/dataTables.bootstrap4.css') }}" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="{{ URL::to('/css/sb-admin-2.css') }}" rel="stylesheet">
  <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
  @include("sidebar")
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
       @include("topbar")
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">
        @hasanyrole('super|ekraf|pariwisata|budaya')    
        <button type="button" class="btn btn-primary"  id="create-new-rapat" style="margin: 10px">
          <i class="fa fa-plus"></i> Tambah
        </button>
        @endhasanyrole
 

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Data Rapat Sekbid-Bidang</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="myTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      
                      <th width="5%"><center>Judul Rapat</center></th>
                      <th width="5%"><center>Inisiator Rapat</center></th>
                      <th width="10%"><center>Tanggal Rapat</center></th>
                      <th width="10%"><center>Agenda Rapat</center></th>
                      <th width="10%"><center>Sifat/Jenis Rapat</center></th>
                      <th width="15%"><center>Peserta</center></th>
                      <th width="15%"><center>Sumber Data</center></th>
                      <th width="15%"><center>Notulensi/Laporan</center></th>
                      <th width="15%"><center>URL Dokementasi Rapat</center></th>
                      <th width="25%">Action</th>
                     
                    </tr>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th width="5%"><center>Judul Rapat</center></th>
                      <th width="5%"><center>Inisiator Rapat</center></th>
                      <th width="10%"><center>Tanggal Rapat</center></th>
                      <th width="10%"><center>Agenda Rapat</center></th>
                      <th width="10%"><center>Sifat/Jenis Rapat</center></th>
                      <th width="15%"><center>Peserta</center></th>
                      <th width="15%"><center>Sumber Data</center></th>
                      <th width="15%"><center>Notulensi/Laporan</center></th>
                      <th width="15%"><center>URL Dokementasi Rapat</center></th>
                      <th width="25%">Action</th>                     
                    </tr>
                  </tfoot>
             
                </table>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Lintang  Prayogo 2019</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>


<div class="modal fade" id="ajax-crud-modal" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
    <div class="modal-header">
        <h4 class="modal-title" id="userCrudModal"></h4>
    </div>
    <div class="modal-body">
        <form id="rapatForm" name="rapatForm" class="form-horizontal" enctype="multipart/form-data">
           <input type="hidden" name="rapat_id" id="rapat_id">
           <input type="hidden" name="kind" id="kind" >
            <div class="form-group">
                <label for="name" class="col-sm-6 control-label">Judul Rapat</label>
                <div class="col-sm-12">
                    <input type="text" class="form-control" id="name" name="name" placeholder="Masukan Judul Rapat" value="" maxlength="50" required="">
                </div>
            </div>

            <div class="form-group">
                <label for="name" class="col-sm-6 control-label">Inisiator Rapat</label>
                <div class="col-sm-12">
                    <input type="text" class="form-control" id="initiator" name="initiator" value="{{Auth::user()->name}}" disabled >
                </div>
            </div>


            <div class="form-group">
                <label for="name" class="col-sm-6 control-label">Tanggal Rapat</label>
                <div class="col-sm-12">
                  <input type="date" required class="form-control"  name="tgl_rapat" id="tgl_rapat">
              
                </div>
            </div>
            

            <div class="form-group">
                <label for="name" class="col-sm-6 control-label">Agenda Rapat</label>
                <div class="col-sm-12">
                   <textarea  required class="form-control"  name="agenda" id="agenda"  rows="5">
                  </textarea>
              
                </div>
            </div>

            <div class="form-group">
                <label for="name" class="col-sm-6 control-label">Peserta</label>
                <div class="col-sm-12">
                  <select required class="form-control"  name="participant" id="participant">
                    <option value="">Pilih Peserta</option>
                    <option value="Admin Ekraf">Admin Ekraf</option>
                    <option value="Admin Pariwisata">Admin Pariwisata</option>
                    <option value="Admin Budaya">Admin Budaya</option>
                    <option value="Semua">Semua</option>
                  </select>
                </div>
            </div>
                 <div class="form-group">
                <label for="name" class="col-sm-6 control-label">Sifat/Jenis Rapat</label>
                <div class="col-sm-12">
                  <select required class="form-control"  name="kind" id="jenis" >
                    <option value="">Pilih Sifat/Jenis</option>
                    <option value="umum">Umum</option>
                    <option value="rahasia">Rahasia</option>
                  </select>
                </div>
            </div>
          
             <div class="form-group" id="foto-content">
                <label class="col-sm-2 control-label">Notulensi/Rapat</label>
                <div class="col-sm-12">
                    <input type="file" id="notulensi" name="notulensi"  value="" accept=".docx, .doc, .xls, .xlsx">
                </div>
            </div>

            <div class="form-group" id="foto-content">
                <label class="col-sm-6 control-label">Url Dokumentasi</label>
                <div class="col-sm-12">
                    <input class="form-control"  type="url" id="url" name="url"  value="" >
                </div>
            </div>


            <div class="form-group">
                <label for="name" class="col-sm-6 control-label">Sumber Data</label>
                <div class="col-sm-12">
                  <input type="text"  class="form-control"  name="data_source" id="data_source" required>
              
                </div>
            </div>

            <div class="modal-footer">
             <button type="submit" class="btn btn-primary" id="btn-save" value="create">Simpan
             </button>
             <button type="button" class="btn btn-danger" id="btn-close-form" data-dismiss="modal">Tutup</button>
            </div>


        </form>
    </div>

  
        </div>
        </div>
    </div>

    

     
    <!-- Bootstrap core JavaScript-->

  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <!-- Custom scripts for all pages-->

  <script src="//code.jquery.com/jquery.js"></script>
   <!-- DataTables -->
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
  <link  href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
  <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script src="{{ URL::to('js/sb-admin-2.min.js') }}"></script>
@hasanyrole('super|ekraf|pariwisata|budaya')   
<script type="text/javascript">
  $('#myTable').DataTable({
        processing: true,
        serverSide: true,
          ajax: {
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                },
                url: '{!! route('show.sekbid') !!}',
                type: 'GET',
            },
        columns: [
           { data: "meeting_name", name: "meeting_name" },
           { data: "initiator", name: "initiator" },
           { data: "meeting_date", name: "meeting_date"},
           { data: "meeting_agenda", name: "meeting_agenda" },
           { data: "kind", name:"kind" },
           { data: "participant", name:"participant"},
           { data: "data_source", name:"data_source"},
           { data: "documentation_report", name: "documentation_report", render: function( data, type, full, meta ) {
                       if(data==null){
                        return "Tidak Ada Notulensi/Report"
                       }
                        data ="{{ URL::to('rapat/dokumen') }}/"+data;
                        return "<a href='"+data+"'>Notulensi/Report</a>";
                    }
           }, 
           { data: "documentation_url", name: "documentation_url", render: function( data, type, full, meta ) {
                       if(data==null){
                        return "Tidak Ada Link"
                       }

                        return "<a href='"+data+"'>tautan</a>";
                    }
           },
           {data: 'action', name: 'action', orderable: false},
        ]});


  $('#create-new-rapat').click(function () {
        $('#ajax-crud-modal').modal('show');
        $('#rapatForm').trigger("reset");
        $('#fotodisplay').removeProp('src');
        $("#fotodisplay").width(0).height(0);
        $('#btn-save').val("create-new-rapat");
        $('#destination_id').val('');
        $('#destinationForm').trigger("reset");
        $('#userCrudModal').html("Tambah Rapat Sekbid");
        $("#btn-save").html('Add');
        $('#fotodisplay').attr('src',"{{ URL::to('/gambar/rapat/hotel.png') }}");
        $('#fotodisplay').width(100).height(100);
        $("#fotodisplay").css('margin', 5 + 'px');            
    });

   if ($("#rapatForm").length > 0) {
      $("#rapatForm").validate({
       submitHandler: function(form) {
      var actionType = $('#btn-save').val();
      var actionURL ="{{ URL::to('/rapat/sekbid/edit') }}";
      var msg ="Data Berhasil Diubah";
        var msgError ="Data Gagal Diubah";
         if(actionType=="create-new-rapat"){
         actionURL="{{ URL::to('/rapat/sekbid/create') }}";
         msg="Data Berhasil Diinput";
         msgError ="Data Gagal Dinput";
         }
      $('#btn-save').html('Sending..');
      console.log(actionURL);
      $.ajax({
          data: new FormData($("#rapatForm")[0]),
          url: actionURL ,
          type: "POST",
          headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                },
          dataType: 'json',
           async: false,
          cache: false,
          contentType: false,
          enctype: 'multipart/form-data',
           processData: false,
          success: function (data) {
            console.log(data);
              $('#btn-save').html('Simpan');
              var oTable = $('#myTable').dataTable();
              oTable.fnDraw(false);
              swal("Berhasil!",msg, "success");
              $('#ajax-crud-modal').trigger('click');
          },
          error: function (data) {
              console.log(data);
              swal("Gagal!", msgError, "error");
              $('#btn-save').html('Simpan');
              $('#ajax-crud-modal').trigger('click');

          }
      });
      }
    })
  }

var deleteSekbid = function(id) { swal({
  title: "Apa Anda Yakin?",
  text: "Data akan dihapus dan tidak bisa dikembalikan!!",
  icon: "warning",
  buttons: true,
  dangerMode: true,
})
.then((willDelete) => {
  if (willDelete) {
       $.ajax({
            url: "{{ URL::to('/rapat/sekbid/delete')}}/"+id,
             type: "delete",
             dataType: 'json',

             headers: { 'X-CSRF-TOKEN': "{{ csrf_token() }}"},
            success: function (data) {
            var oTable = $('#myTable').dataTable(); 
            oTable.fnDraw(false);
              swal("Selesai!", "Data Telah Berhasil Dihapus!", "success");
            },
            error: function (data) {
              console.log(data);
                  swal("Gagal!", "Gagal Menghapus Data!", "error");
            }
        });
  } 
});
}


   /* When click edit sekbid */
    $('body').on('click', '.edit-rapat', function () {
      var id = $(this).data('id');
      $('#rapatForm').trigger("reset");
      $.get('{{ URL::to("/rapat/profile/") }}/'+id, function (data) {
          $("#initiator").val(data.initiator);
          $("#tgl_rapat").val(data.meeting_date);
          $("#name").val(data.meeting_name);
          $("#participant").val(data.participant);
          $("#agenda").val(data.meeting_agenda);
          $("#jenis").val(data.kind);
          $("#data_source").val(data.data_source);
          $("#rapat_id").val(data.id);
          $("#url").val(data.documentation_url);
          $('#btn-save').html('Simpan');
    
      })
   });


var loadFile = function(event) {
    var reader = new FileReader();
    reader.onload = function(){
      var output = document.getElementById('fotodisplay');
      output.src = reader.result;
        $("#fotodisplay").width(100).height(100);
    };
    reader.readAsDataURL(event.target.files[0]);
  };
 
  $( ".rapat" ).addClass( "active" );
      </script>
@endhasanyrole

</body>

</html>
