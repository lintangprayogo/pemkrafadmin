<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Penginapan</title>

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
        <button type="button" class="btn btn-primary"  id="create-new-penginapan" style="margin: 10px">
          <i class="fa fa-plus"></i> Tambah
        </button>
       
       <button type="button" class="btn btn-info"  id="upload" data-toggle="modal" data-target="#penginapanUpload" style="margin: 10px">
          <i class="fa fa-upload"></i> Upload
        </button>
        @endrole
 

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Data Penginapan</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="myTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th width="5%"><center>Photo</center></th>
                      <th width="10%"><center>Nama Hotel/Villa</center></th>
                      <th width="10%"><center>Bintang/Melati</center></th>
                      <th width="10%"><center>Kategori</center></th>
                      <th width="15%"><center>Lokasi</center></th>
                      @role("pariwisata")
                      <th width="20%">Action</th>
                      @endrole
                    </tr>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th width="5%"><center>Photo</center></th>
                      <th width="10%"><center>Nama Hotel/Villa</center></th>
                      <th width="10%"><center>Bintang/Melati</center></th>
                      <th width="10%"><center>Kategori</center></th>
                      <th width="15%"><center>Lokasi</center></th>
                      @role("pariwisata")
                      <th width="20%">Action</th>
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


<div class="modal fade" id="ajax-crud-modal" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
    <div class="modal-header">
        <h4 class="modal-title" id="userCrudModal"></h4>
    </div>
    <div class="modal-body">
        <form id="penginapanForm" name="penginapanForm" class="form-horizontal" enctype="multipart/form-data">
           <input type="hidden" name="penginapan_id" id="penginapan_id">
           <input type="hidden" name="kind" id="kind" >
            <div class="form-group">
                <label for="name" class="col-sm-6 control-label">Nama Hotel/Vila</label>
                <div class="col-sm-12">
                    <input type="text" class="form-control" id="name" name="name" placeholder="Masukan Nama Hotel/Vila" value="" maxlength="50" required="">
                </div>
            </div>

            <div class="form-group">
                <label for="name" class="col-sm-6 control-label">Bintang/Melati</label>
                <div class="col-sm-12">
                    <input type="text" class="form-control" id="star" name="star"  value="" maxlength="50" required="">
                </div>
            </div>


            <div class="form-group">
                <label for="name" class="col-sm-6 control-label">Kategori</label>
                <div class="col-sm-12">
                  <select required class="form-control"  name="kategori" id="kategori">
                <option value="">Pilih Kategori</option>

                  @foreach($accommodation_categories as $category)
                <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach   
                
                
                </select>
                </div>
            </div>
          
         

          <div class="form-group">
                <label for="name" class="col-sm-6 control-label">Lokasi</label>
                <div class="col-sm-12">
                    <textarea class="form-control" rows="5" id="location" name="location" required="required" ></textarea>
                </div>
            </div>

            <div class="form-group">
                <label for="name" class="col-sm-6 control-label">Provinsi</label>
                <div class="col-sm-12">
                     <input type="text" class="form-control" id="provinsi" name="provinsi" value="Jawa Barat" maxlength="50" disabled="">
                </div>
            </div>

          <div class="form-group">
                <label for="name" class="col-sm-6 control-label">Kabupaten</label>
                <div class="col-sm-12">
                     <input type="text" class="form-control" id="kabupaten" name="kabupaten" value="Bandung Barat" value="" maxlength="50" disabled="">
                </div>
            </div>

              <div class="form-group">
                <label for="name" class="col-sm-6 control-label">Kecamatan</label>
                <div class="col-sm-12">
                  <select  class="form-control"  name="kecamatan" id="kecamatan">
                    <option value="">Pilih kecamatan</option>
                    <option value="Baleendah">Baleendah</option>
                    <option value="Bojongsoang">Bojongsoang</option>
                    <option value="Cicalengka">Cicalengka</option>
                    <option value="Cileunyi">Cileunyi</option>
                    <option value="Margaasih">Margaasih</option>
                    <option value="Soreang">Soreang</option>
                    <option value="Lembang">Lembang</option>
                    <option value="Parongpong">Parongpong</option>
                    <option value="Cikole">Cikole</option>
                    <option value="Sukasari">Sukasari</option>
                    <option value="Sagalaherang">Sagalaherang</option>
                  </select>
                </div>
            </div>
          
          

            <div class="form-group">
                <label for="name" class="col-sm-6 control-label">Desa/Lurah</label>
                <div class="col-sm-12">
                <input type="text" name="kelurahan" id="kelurahan" class="form-control">
                </div>
            </div>



    

             <div class="form-group" id="foto-content">
                <label class="col-sm-2 control-label">Photo</label>
                <div class="col-sm-12">
                    <input type="file" id="photo" name="photo"  onchange="loadFile(event)" value="" >
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

     <div class="modal fade" id="penginapanUpload" aria-hidden="true">
      <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
              <h4 class="modal-title" id="Upload Excel">Upload Excel</h4>
          </div>
          <div class="modal-body">
              <form  id="excelForm" name="excelForm" action="{{ URL::to('/penginapan/upload') }}" class="form-horizontal" enctype="multipart/form-data" method="post">
                 {{ csrf_field() }}
                  <div class="form-group">
                      <label for="name" class="col-sm-2 control-label">File</label>
                      <div class="col-sm-12">
                          <input type="File" id="file" name="file" placeholder="File"  required="required" accept="application/vnd.ms-excel,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet">
                      </div>
                  </div>
                 
                  <div class="modal-footer">
                  <button type="submit" class="btn btn-primary" id="btn-upload" value="create">Upload</button>
                  <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
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
                url: '{!! route('show.penginapan') !!}',
                type: 'GET',
            },
        columns: [
           
            {data: 'photo', name: 'photo', orderable: false,
              render: function( data, type, full, meta ) {
                       if(data==null){
                        data= "{{ URL::to('/gambar/default.jpg') }}";
                       }else{
                         data= "{{ URL::to('/gambar/penginapan') }}/"+data;
                       }

                        return "<center><img src='" + data + "' height='100' width='100'  /></center>";
                    }

           },
           { data: 'accommodation_name', name: 'accommodation_name' },
           { data: 'star', name: 'star' },
           { data: 'category', name: 'category' },
           { data: 'location', name: 'location' },
           {data: 'action', name: 'action', orderable: false},
        ]});
 

  $('#create-new-penginapan').click(function () {
        $('#ajax-crud-modal').modal('show');
        $('#penginapanForm').trigger("reset");
        $('#fotodisplay').removeProp('src');
        $("#fotodisplay").width(0).height(0);
        $('#btn-save').val("create-new-penginapan");
        $('#destination_id').val('');
        $('#destinationForm').trigger("reset");
        $('#userCrudModal').html("Tambah Pariwisata");
        $("#btn-save").html('Add');
        $('#fotodisplay').attr('src',"{{ URL::to('/gambar/penginapan/hotel.png') }}");
        $('#fotodisplay').width(100).height(100);
        $("#fotodisplay").css('margin', 5 + 'px');            
    });

   if ($("#penginapanForm").length > 0) {
      $("#penginapanForm").validate({
       submitHandler: function(form) {
      var actionType = $('#btn-save').val();
      var actionURL ="{{ URL::to('/penginapan/edit') }}";
      var msg ="Data Berhasil Diubah";
        var msgError ="Data Gagal Diubah";
         if(actionType=="create-new-penginapan"){
         actionURL="{{ URL::to('/penginapan/create') }}";
         msg="Data Berhasil Diinput";
         msgError ="Data Gagal Dinput";
         }
      $('#btn-save').html('Sending..');
      console.log(actionURL);
      $.ajax({
          data: new FormData($("#penginapanForm")[0]),
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

var deletePenginapan = function(id) { swal({
  title: "Apa Anda Yakin?",
  text: "Data akan dihapus dan tidak bisa dikembalikan!!",
  icon: "warning",
  buttons: true,
  dangerMode: true,
})
.then((willDelete) => {
  if (willDelete) {
       $.ajax({
            url: "{{ URL::to('/penginapan/delete')}}/"+id,
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


   /* When click edit peginapan */
    $('body').on('click', '.edit-penginapan', function () {
      var id = $(this).data('id');
      $('#penginapanForm').trigger("reset");
      $.get('{{ URL::to("/penginapan/profile/") }}/'+id, function (data) {
          $("#name").val(data.accommodation_name);
          $("#star").val(data.star);
          $("#kategori").val(data.accommodation_category_id);
          $("#location").val(data.location);
          $("#kelurahan").val(data.kelurahan);
           $("#penginapan_id").val(data.id);
          if(data.photo==null){
             data.photo="{{ URL::to('/gambar/penginapan/hotel.png') }}";
          }else{
             data.photo="{{ URL::to('/gambar/penginapan') }}/"+data.photo;
          }
          $("#kecamatan").val(data.kecamatan); 
          $('#fotodisplay').attr('src',data.photo);
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
  };
 
  $( ".pariwisata" ).addClass( "active" );
      </script>
@else
<script 
type="text/javascript">
  $('#myTable').DataTable({
        processing: true,
        serverSide: true,
          ajax: {
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                },
                url: '{!! route('show.penginapan') !!}',
                type: 'GET',
            },
        columns: [
           
            {data: 'photo', name: 'photo', orderable: false,
              render: function( data, type, full, meta ) {
                       if(data==null){
                        data= "{{ URL::to('/gambar/default.jpg') }}";
                       }else{
                         data= "{{ URL::to('/gambar/penginapan') }}/"+data;
                       }

                        return "<center><img src='" + data + "' height='100' width='100'  /></center>";
                    }

           },
           { data: 'accommodation_name', name: 'accommodation_name' },
           { data: 'star', name: 'star' },
           { data: 'category', name: 'category' },
           { data: 'location', name: 'location' }
  
      
      
      
     
        ]});
 
  $( ".pariwisata" ).addClass( "active" );
      </script>        
@endrole

</body>

</html>
