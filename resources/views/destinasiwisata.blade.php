<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Destinasi Wisata</title>

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

           @role("pariwisata")
        <button type="button" class="btn btn-primary"  id="create-new-destinasi" style="margin: 10px">
          <i class="fa fa-plus"></i> Tambah
        </button>
       
       <button type="button" class="btn btn-info"  id="upload" data-toggle="modal" data-target="#destinasiUpload" style="margin: 10px">
          <i class="fa fa-upload"></i> Upload
        </button>
        @endrole


          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Data Destinasi</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="myTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th width="10%">Foto</th>
                      <th width="20%">Nama</th>
                      <th width="10%">Kategori</th>
                      <th width="25%">Alamat</th>
                      @role("pariwisata")
                      <th width="10%">Action</th>
                      @endrole
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th width="10%">Foto</th>
                      <th width="20%">Nama</th>
                      <th width="10%">Kategori</th>
                      <th width="25%">Alamat</th>
                      @role("pariwisata")
                      <th width="10%">Action</th>
                      @endrole
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



<div class="modal fade" id="destinasiUpload" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
    <div class="modal-header">
        <h4 class="modal-title" id="Upload Excel">Upload Excel</h4>
    </div>
    <div class="modal-body">
        <form  id="excelForm" name="excelForm" action="{{ URL::to('/destinasiwisata/upload') }}" class="form-horizontal" enctype="multipart/form-data" method="post">
           {{ csrf_field() }}
            <div class="form-group">
                <label for="name" class="col-sm-2 control-label">File</label>
                <div class="col-sm-12">
                    <input type="File" id="file" name="file" placeholder="File"  required="required" accept="application/vnd.ms-excel,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet">
                </div>
            </div>
           
            <div class="modal-footer">
            <button type="submit" class="btn btn-primary" id="btn-upload" value="create">Upload</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
            </div>
          </form>
      </div> 
    </div>
    
</div>
</div>

<div class="modal fade" id="ajax-crud-modal" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
    <div class="modal-header">
        <h4 class="modal-title" id="userCrudModal"></h4>
    </div>
    <div class="modal-body">
        <form id="destinationForm" name="destinationForm" class="form-horizontal" enctype="multipart/form-data">
           <input type="hidden" name="destination_id" id="destination_id">
            <div class="form-group">
                <label for="name" class="col-sm-2 control-label">Nama</label>
                <div class="col-sm-12">
                    <input type="text" class="form-control  form-control-user" id="name" name="name" placeholder="Masukan Nama " value="" maxlength="50" required="true">
                </div>
            </div>
 
           <div class="form-group">
                <label for="name" class="col-sm-2 control-label">Kategori</label>
                <div class="col-sm-12">
            <select required class="form-control"  name="kategori" id="kategori">
                <option value="">Pilih Kategori</option>
                
                @foreach($categories as $category)
                <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach    
              </select>
                </div>
            </div>


            <div class="form-group">
                <label for="name" class="col-sm-6 control-label">Alamat</label>
                <div class="col-sm-12">
                    <textarea class="form-control" rows="5" id="address" name="address" required="required" ></textarea>
                </div>
            </div>
               <div class="form-group">
                <label for="name" class="col-sm-12 control-label">Provinsi</label>
                <div class="col-sm-12">
                  <input type="text" class="form-control  form-control-user" id="provinsi" name="provinsi" placeholder="Masukan Provinsi" value="" maxlength="50" required="true">
                </div>

          <div class="form-group">
                <label for="name" class="col-sm-12 control-label">Kecamatan</label>
                <div class="col-sm-12">
                  <input type="text" class="form-control  form-control-user" id="kecamatan" name="kecamatan" placeholder="Masukan  Kecamatan " value="" maxlength="50" required="true">
                </div>

            <div class="form-group">
                <label for="name" class="col-sm-12 control-label">Desa/Kelurahan</label>
                <div class="col-sm-12">
                  <input type="text" class="form-control  form-control-user" id="kelurahan" name="kelurahan" placeholder="Masukan  Kelurahan " value="" maxlength="50" required="true">
                </div>
            </div>

               
                 
            </div>

             <div class="form-group" id="foto-content">
                <label class="col-sm-2 control-label">Foto</label>
                <div class="col-sm-12">
                    <input type="file" id="photo" name="photo"  onchange="loadFile(event)" value="" >
                </div>
                 <div class="col-sm-12">
                    <img  id="fotodisplay" >
                </div>
            </div>
            <div class="modal-footer">
             <button type="submit" class="btn btn-primary" id="btn-save" value="create">Save changes
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
  
@role("pariwisata")
<script type="text/javascript">
  
    $('#myTable').DataTable({
        processing: true,
        serverSide: true,
          ajax: {
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                },
                url: '{!! route('show.destination') !!}',
                type: 'GET',
            },
        columns: [
             {data: 'photo', name: 'photo', orderable: false,searchable: false,
              render: function( data, type, full, meta ) {
                       if(data==null){
                        data= "{{ URL::to('/gambar/sunbed.png') }}"
                        return "<center><img src='" + data + "' height='100' width='100'  /></center>"
                       }
                     
                        return "<center><img src='{{ URL::to('/gambar/pariwisata/destinasi') }}/" + data + "' height='100' width='100'  /></center>";
                    }

           },
           { data: 'destination_name', name: 'destination_name' },
           { data: 'kategori', name: 'kategori' },
           { data: 'address', name: 'address' },
           {data: 'action', name: 'action', orderable: false},

        ]});


  $('#create-new-destinasi').click(function () {
        $('#umkmForm').trigger("reset");
        $('#fotodisplay').removeProp('src');
        $("#fotodisplay").width(0).height(0);
        $('#btn-save').val("create-destination");
        $('#destination_id').val('');
        $('#destinationForm').trigger("reset");
        $('#userCrudModal').html("Tambah Pariwisata");
        $('#ajax-crud-modal').modal('show');
        $("#btn-save").html('Add');
        $('#fotodisplay').attr('src',"{{ URL::to('/gambar/store.png') }}");
        $('#fotodisplay').width(100).height(100);
        $("#fotodisplay").css('margin', 5 + 'px');            
    });



  if ($("#destinationForm").length > 0) {
      $("#destinationForm").validate({
       submitHandler: function(form) {
      var actionType = $('#btn-save').val();
      var actionURL ="{{ URL::to('/destinasiwisata/edit') }}";
      var msg ="Data Berhasil Diubah";
        var msgError ="Data Gagal Diubah";
         if(actionType=="create-destination"){
         actionURL="{{ URL::to('/destinasiwisata/create') }}";
         msg="Data Berhasil Diinput";
         msgError ="Data Gagal Dinput";
         }
      $('#btn-save').html('Sending..');
     

      $.ajax({
          data: new FormData($("#destinationForm")[0]),
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


  
var loadFile = function(event) {
    var reader = new FileReader();
    reader.onload = function(){
      var output = document.getElementById('fotodisplay');
      output.src = reader.result;
        $("#fotodisplay").width(100).height(100);
    };
    reader.readAsDataURL(event.target.files[0]);
  };

 var deleteDestination = function(id) { 
  swal({
  title: "Apa Anda Yakin?",
  text: "Data akan dihapus dan tidak bisa dikembalikan!!",
  icon: "warning",
  buttons: true,
  dangerMode: true,
})
.then((willDelete) => {
  if (willDelete) {
         console.log(id);
       $.ajax({
            url: "{{ URL::to('/destinasiwisata/delete')}}/"+id,
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


 /* When click edit destinasi */
    $('body').on('click', '.edit-destination', function () {
      var id = $(this).data('id');
      $('#pameranForm').trigger("reset");
      $.get('{{ URL::to("/destinasiwisata/profile/") }}/'+id, function (data) {
          $('#userCrudModal').html("Edit Destinasi Wisata");
          $('#btn-save').val("edit-pameran");
          $('#ajax-crud-modal').show();
          $('#destination_id').val(data.id);
          $('#name').val(data.destination_name);
          $('#mulai').val(data.start_date);
          $('#kategori').val(data.destination_category_id);
          $('#deskripsi').val(data.description);
          $('#address').text(data.address);
          $("#provinsi").val(data.provinsi);
          $("#kecamatan").val(data.kecamatan);
          $("#kelurahan").val(data.kelurahan);
          if(data.poster==null){
             data.poster="{{ URL::to('/gambar/sunbed.png') }}"
          }else{
            data.poster="{{ URL::to('/gambar/destinasiwisata') }}/"+data.poster;
          }
  
          $('#fotodisplay').attr('src',data.poster);
          $('#fotodisplay').width(100).height(100);
          $("#fotodisplay").css('margin', 5 + 'px');
          $('#btn-save').html('Simpan');
          console.log(data);
      });
   });

  $( ".pariwisata" ).addClass( "active" );
      </script>
@else
<script type="text/javascript">
      $('#myTable').DataTable({
        processing: true,
        serverSide: true,
          ajax: {
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                },
                url: '{!! route('show.destination') !!}',
                type: 'GET',
            },
        columns: [
             {data: 'photo', name: 'photo', orderable: false,searchable: false,
              render: function( data, type, full, meta ) {
                       if(data==null){
                        data= "{{ URL::to('/gambar/sunbed.png') }}"
                        return "<center><img src='" + data + "' height='100' width='100'  /></center>"
                       }
                     
                        return "<center><img src='{{ URL::to('/gambar/pariwisata/destinasi') }}/" + data + "' height='100' width='100'  /></center>";
                    }

           },
           { data: 'destination_name', name: 'destination_name' },
           { data: 'kategori', name: 'kategori' },
           { data: 'address', name: 'address' },

        ]});
</script>
      
@endrole

</body>

</html>
