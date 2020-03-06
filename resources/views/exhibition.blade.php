<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Ekraf</title>

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

         @role("ekraf")
        <button type="button" class="btn btn-primary"  id="create-new-pameran" style="margin: 10px">
          <i class="fa fa-plus"></i> Tambah
        </button>
       
       <button type="button" class="btn btn-info"  id="upload" data-toggle="modal" data-target="#userUpload" style="margin: 10px">
          <i class="fa fa-upload"></i> Upload
        </button>
        @endrole


          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Data Pameran</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="myTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                         <th width="5%"><center>Poster</center></th>
                      <th width="10%"><center>Nama Acara</center></th>
                      <th width="10%"><center>Tanggal Mulai</center></th>
                      <th width="10%"><center>Tangal Berakhir</center></th>
                      <th width="15%"><center>HTM</center></th>
                      <th width="15%"><center>Action</center></th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th width="5%"><center>Poster</center></th>
                      <th width="10%"><center>Nama Acara</center></th>
                      <th width="10%"><center>Tanggal Mulai</center></th>
                      <th width="10%"><center>Tangal Berakhir</center></th>
                      <th width="15%"><center>HTM</center></th>
                      <th width="15%"><center>Action</center></th>
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
        <form id="pameranForm" name="pameranForm" class="form-horizontal" enctype="multipart/form-data">
           <input type="hidden" name="pameran_id" id="pameran_id">
            <div class="form-group">
                <label for="name" class="col-sm-6 control-label">Nama Pameran</label>
                <div class="col-sm-12">
                    <input type="text" class="form-control" id="pameran" name="pameran" placeholder="Masukan Nama Pameran" value="" maxlength="50" required="">
                </div>
            </div>

            <div class="form-group">
                <label for="name" class="col-sm-6 control-label">Tanggal Mulai</label>
                <div class="col-sm-12">
                    <input type="date" class="form-control" id="mulai" name="mulai" placeholder="Masukan Nama Pameran" value="" maxlength="50" required="">
                </div>
            </div>


            <div class="form-group">
                <label for="name" class="col-sm-6 control-label">Tanggal Berakhir</label>
                <div class="col-sm-12">
                    <input type="date" class="form-control" id="akhir" name="akhir" placeholder="Masukan Nama Pameran" value="" maxlength="50" required="">
                </div>
            </div>
          
            <div class="form-group">
                <label for="name" class="col-sm-6 control-label">Deskripsi</label>
                <div class="col-sm-12">
                    <textarea class="form-control" rows="5" id="deskripsi" name="deskripsi" required="required" ></textarea>
                </div>
            </div>

          <div class="form-group">
                <label for="name" class="col-sm-6 control-label">Lokasi</label>
                <div class="col-sm-12">
                    <textarea class="form-control" rows="5" id="location" name="location" required="required" ></textarea>
                </div>
            </div>



            <div class="form-group">
                <label for="name" class="col-sm-6 control-label">Harga Tiket Masuk</label>
                <div class="col-sm-12">
                     <input type="number" class="form-control" id="price" name="price" placeholder="Masukan Nama Pameran" value="" maxlength="50" required="">
                </div>
            </div>



             <div class="form-group" id="foto-content">
                <label class="col-sm-2 control-label">Poster</label>
                <div class="col-sm-12">
                    <input type="file" id="poster" name="poster"  onchange="loadFile(event)" value="" >
                </div>
                 <div class="col-sm-12">
                    <img  id="fotodisplay" >
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
  <script src="js/sb-admin-2.min.js"></script>
  <script
   type="text/javascript">$('#myTable').DataTable({
        processing: true,
        serverSide: true,
          ajax: {
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                },
                url: '{!! route('show.pameran') !!}',
                type: 'GET',
            },
        columns: [
           
            {data: 'poster', name: 'poster', orderable: false,searchable:false
              render: function( data, type, full, meta ) {
                       if(data==null){
                        data= "{{ URL::to('/gambar/store.png') }}"
                       }

                
                     
                        return "<center><img src=' {{ URL::to('/gambar/umkm/pameran') }}/" + data + "' height='100' width='100'  /></center>";
                    }

           },
           { data: 'exhibition_name', name: 'exhibition_name' },
           { data: 'start_date', name: 'start_date' },
           { data: 'end_date', name: 'end_date' },
           { data: 'price', name: 'price' },
           {data: 'action', name: 'action', orderable: false},

        ]});

      </script>
<script type="text/javascript"></script>


<script type="text/javascript">
     $('#create-new-pameran').click(function () {
        $('#pameranForm').trigger("reset");
        $('#fotodisplay').removeProp('src');
        $("#fotodisplay").width(0).height(0);
        $('#btn-save').val("create-pameran");
        $('#pameran_id').val('');
        $('#candidateForm').trigger("reset");
        $('#userCrudModal').html("Tambah Pameran");
        $('#ajax-crud-modal').modal('show');
        $("#btn-save").html('Tambah');
        $("#passwordField").show();
        $('#fotodisplay').attr('src',"{{ URL::to('/gambar/store.png') }}");
        $('#fotodisplay').width(100).height(100);
        $("#fotodisplay").css('margin', 5 + 'px');            
    });


  if ($("#pameranForm").length > 0) {
      $("#pameranForm").validate({
       submitHandler: function(form) {
      var actionType = $('#btn-save').val();
      var actionURL ="{{ URL::to('/pameran/edit') }}";
      var msg ="Data Berhasil Diubah";
        var msgError ="Data Gagal Diubah";
         if(actionType=="create-pameran"){
         actionURL="{{ URL::to('/pameran/create') }}";
         msg="Data Berhasil Diinput";
         msgError ="Data Gagal Dinput";
        }
      $('#btn-save').html('Sending..');
     

      $.ajax({
          data: new FormData($("#pameranForm")[0]),
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

          }
      });
      }
    })
  }


    var deletePameran = function(id) { swal({
      title: "Apa Anda Yakin?",
      text: "Data akan dihapus dan tidak bisa dikembalikan!!",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {
           $.ajax({
                url: "{{ URL::to('/pameran/delete')}}/"+id,
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



   /* When click edit pameran */
    $('body').on('click', '.edit-pameran', function () {
      var id = $(this).data('id');
      $('#pameranForm').trigger("reset");
      $.get('{{ URL::to("/pameran/profile/") }}/'+id, function (data) {
          $('#userCrudModal').html("Edit Pameran");
          $('#btn-save').val("edit-pameran");
          $('#ajax-crud-modal').show();
          $('#pameran_id').val(data.id);
          $('#pameran').val(data.exhibition_name);
          $('#mulai').val(data.start_date);
          $('#akhir').val(data.end_date);
          $('#deskripsi').val(data.description);
            $('#location').val(data.location);
          $("#price").val(data.price);
          if(data.poster==null){
             data.poster="{{ URL::to('/gambar/store.png') }}"
          }
  
          $('#fotodisplay').attr('src',"{{ URL::to('/gambar/umkm/pameran') }}/"+data.poster);
          $('#fotodisplay').width(100).height(100);
          $("#fotodisplay").css('margin', 5 + 'px');
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
  }



 
  $( ".ekraf" ).addClass( "active" );




</script>

</body>

</html>
