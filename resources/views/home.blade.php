<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Admin</title>

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

           @role("super")
        <button type="button" class="btn btn-primary"  id="create-new-admin" style="margin: 10px">
          <i class="fa fa-plus"></i> Tambah
        </button>
       
       <button type="button" class="btn btn-info"  id="upload" data-toggle="modal" data-target="#userUpload" style="margin: 10px">
          <i class="fa fa-upload"></i> Upload
        </button>
        @endrole


          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Data Admin</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="myTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th width="10%">Foto</th>
                      <th width="10%">Nama</th>
                      <th width="15%">Email</th>
                      <th width="10%">Telepon</th>
                      <th width="15%">Alamat</th>
                      <th width="10%">Role</th>
                      @role("super")
                      <th width="20%">Action</th>
                      @endrole
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th width="10%">Foto</th>
                      <th width="10%">Nama</th>
                      <th width="15%">Email</th>
                      <th width="10%">Telepon</th>
                      <th width="15%">Alamat</th>

                      <th width="10%">Role</th>
                      @role("super")
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
        <form id="adminForm" name="adminForm" class="form-horizontal" enctype="multipart/form-data">
           <input type="hidden" name="admin_id" id="admin_id">
            <div class="form-group">
                <label for="name" class="col-sm-2 control-label">Nama</label>
                <div class="col-sm-12">
                    <input type="text" class="form-control  form-control-user" id="name" name="name" placeholder="Masukan Nama" value="" maxlength="50" required="true">
                </div>
            </div>
 
           <div class="form-group">
                <label for="name" class="col-sm-2 control-label">Email</label>
                <div class="col-sm-12">
                    <input type="text" class="form-control" id="email" name="email" placeholder="Masukan Email" value="" maxlength="50" required="required">
                </div>
            </div>


            <div class="form-group">
                <label for="name" class="col-sm-12 control-label">Nomor Telepon</label>
                <div class="col-sm-12">
                    <input type="text" class="form-control" id="phone" name="phone" placeholder="Masukan Nomor Telepon" value="" maxlength="50" required="">
                </div>
            </div>




            <div class="form-group" id="passwordField">
                <label for="name"   class="col-sm-12 control-label" >Password</label>
                <div class="col-sm-12">
                    <input type="password" class="form-control" id="password" name="password" placeholder="Masukan Password" value="" maxlength="50" required="">
                </div>
            </div>

            <div class="form-group">
                <label for="name" class="col-sm-6 control-label">Alamat</label>
                <div class="col-sm-12">
                    <textarea class="form-control" rows="5" id="address" name="address" required="required" ></textarea>
                </div>
            </div>


          <div class="form-group">
                <label for="name" class="col-sm-12 control-label">Role</label>
              <div class="col-sm-12">
                <select required class="form-control"  name="roles" id="roles">
                <option value="">Pilih Peran</option>
                
                @foreach($roles as $role)
                <option value="{{$role->name}}">{{$role->name}}</option>
                @endforeach    
              </select>
              </div>

        </div>
 

             <div class="form-group" id="foto-content">
                <label class="col-sm-2 control-label">Foto</label>
                <div class="col-sm-12">
                    <input type="file" id="foto" name="photo"  onchange="loadFile(event)" value="" >
                </div>
                 <div class="col-sm-12">
                    <img  id="fotodisplay" >
                </div>
            </div>
            <div class="modal-footer">
             <button type="submit" class="btn btn-primary" id="btn-save" value="create">Save changes
             </button>
             <button type="button" class="btn btn-danger" id="btn-close-form" data-dismiss="modal">Close</button>
            </div>
        </form>
    </div>
 
</div>
</div>
</div>



<div class="modal fade" id="userUpload" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
    <div class="modal-header">
        <h4 class="modal-title" id="Upload Excel">Upload Excel</h4>
    </div>
    <div class="modal-body">
        <form  id="excelForm" name="excelForm" action="{{ URL::to('/admin/upload') }}" class="form-horizontal" enctype="multipart/form-data" method="post">
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
@role("super")
<script type="text/javascript">
  $('#myTable').DataTable({
        processing: true,
        serverSide: true,
          ajax: {
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                },
                url: '{!! route('show.admin') !!}',
                type: 'GET',
            },
        columns: [
           
            {data: 'photo', name: 'photo', orderable: false,
              render: function( data, type, full, meta ) {
                       if(data==null){
                        data= "{{ URL::to('/gambar/default.jpg') }}"
                       }
                        return "<center><img src='" + data + "' height='100' width='100'  /></center>";
                    }

           },
           { data: 'name', name: 'name' },
           { data: 'email', name: 'email' },
           { data: 'phone', name: 'phone' },
           { data: 'address', name: 'address' },
           { data: 'role', name: 'role' ,orderable:false},
           {data: 'action', name: 'action', orderable: false},

        ]});
$('#create-new-admin').click(function () {
        $('#adminForm').trigger("reset");
        $('#fotodisplay').removeProp('src');
        $("#fotodisplay").width(0).height(0);
        $('#btn-save').val("create-admin");
        $('#user_id').val('');
        $('#candidateForm').trigger("reset");
        $('#userCrudModal').html("Tambah Admin");
        $('#ajax-crud-modal').modal('show');
        $("#btn-save").html('Add');
        $("#passwordField").show();
        $("#roles").val("").change();
        $("#fotodisplay").css('margin', 0 + 'px');
        $('#fotodisplay').attr('required','required');         
    });

if ($("#adminForm").length > 0) {
      $("#adminForm").validate({
       submitHandler: function(form) {
      var actionType = $('#btn-save').val();
      var actionURL ="{{ URL::to('/admin/edit') }}";
      var msg ="Data Berhasil Diubah";
        var msgError ="Data Gagal Diubah";
         if(actionType=="create-admin"){
         actionURL="{{ URL::to('/admin/create') }}";
         msg="Data Berhasil Diinput";
         msgError ="Data Gagal Dinput";
         }
      $('#btn-save').html('Sending..');
     

      $.ajax({
          data: new FormData($("#adminForm")[0]),
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

var deleteAdmin = function(id) { swal({
  title: "Apa Anda Yakin?",
  text: "Data akan dihapus dan tidak bisa dikembalikan!!",
  icon: "warning",
  buttons: true,
  dangerMode: true,
})
.then((willDelete) => {
  if (willDelete) {
       $.ajax({
            url: "{{ URL::to('/admin/delete')}}/"+id,
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


   /* When click edit user */
    $('body').on('click', '.edit-admin', function () {
      var id = $(this).data('id');
      $('#adminForm').trigger("reset");
      $.get('{{ URL::to("/admin/profile/") }}/'+id, function (data) {
          $('#name-error').hide();
          $('#email-error').hide();
          $('#userCrudModal').html("Edit Admin");
          $('#btn-save').val("edit-user");
          $('#ajax-crud-modal').show();
          $('#admin_id').val(data.id);
          $('#name').val(data.name);
          $('#email').val(data.email);
          $("#phone").val(data.phone)
          if(data.photo==null){
             data.photo="{{ URL::to('/gambar/default.jpg') }}"
          }
          if(data.address!=null){
            $("#address").text(data.address);
          }
          $("#roles").val(data.role).change();
          $("#passwordField").hide();
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
 
  $( ".admin" ).addClass( "active" );
      </script>
@else
<script 
type="text/javascript">$('#myTable').DataTable({
        processing: true,
        serverSide: true,
          ajax: {
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                },
                url: '{!! route('show.admin') !!}',
                type: 'GET',
            },
        columns: [
           
            {data: 'photo', name: 'photo', orderable: false,
              render: function( data, type, full, meta ) {
                       if(data==null){
                        data= "{{ URL::to('/gambar/default.jpg') }}"
                       }
                        return "<center><img src='" + data + "' height='100' width='100'  /></center>";
                    }

           },
           { data: 'name', name: 'name' },
           { data: 'email', name: 'email' },
           { data: 'phone', name: 'phone' },
           { data: 'address', name: 'address' },
           { data: 'role', name: 'role' ,orderable:false},
        ] });
 
  $( ".admin" ).addClass( "active" );
      </script>        
@endrole

</body>

</html>
