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
  <style type="text/css">
    .data_year {
   display: none;
}
  </style>
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
        <button type="button" class="btn btn-primary"  id="create-new-umkm" style="margin: 10px">
          <i class="fa fa-plus"></i> Tambah
        </button>
       
       <button type="button" class="btn btn-info"  id="upload" data-toggle="modal" data-target="#userUpload" style="margin: 10px">
          <i class="fa fa-upload"></i> Upload
        </button>
        @endrole


          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Data UMKM</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="myTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                         <th width="5%"><center>Logo</center></th>
                      <th width="10%"><center>Nama</center></th>
                      <th width="10%"><center>Sektor</center></th>
                      <th width="10%"><center>Telepon</center></th>
                      <th width="15%"><center>Alamat</center></th>
                      <th width="15%"><center>Action</center></th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th width="5%"><center>Logo</center></th>
                      <th width="10%"><center>Nama</center></th>
                      <th width="10%"><center>Sektor</center></th>
                      <th width="10%"><center>Telepon</center></th>
                      <th width="15%"><center>Alamat</center></th>
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

 <div class="modal fade" id="userUpload" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
    <div class="modal-header">
        <h4 class="modal-title" id="Upload Excel">Upload Excel</h4>
    </div>
    <div class="modal-body">
        <form  id="excelForm" name="excelForm" action="{{ URL::to('/umkm/upload') }}" class="form-horizontal" enctype="multipart/form-data" method="post">
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
<div class="modal fade" id="ajax-crud-modal" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
    <div class="modal-header">
        <h4 class="modal-title" id="userCrudModal"></h4>
    </div>
    <div class="modal-body">
        <form id="umkmForm" name="umkmForm" class="form-horizontal" enctype="multipart/form-data">
           <input type="hidden" name="umkm_id" id="umkm_id">
            <div class="form-group">
                <label for="name" class="col-sm-6 control-label">Nama UMKM</label>
                <div class="col-sm-12">
                    <input type="text" class="form-control" id="umkm" name="umkm" placeholder="Masukan Nama UMKM" value="" maxlength="50" required="">
                </div>
            </div>



          <div class="form-group">
                <label for="name" class="col-sm-6 control-label">Pemilik</label>
                <div class="col-sm-12">
                    <input type="text" class="form-control" id="owner" name="owner" placeholder="Masukan Pemilik" value="" maxlength="50" required="">
                </div>
            </div>


            <div class="form-group">
                <label for="name" class="col-sm-6 control-label">Nama Izin Usaha</label>
                <div class="col-sm-12">
                    <input type="text" class="form-control" id="permission_name" name="permission_name" placeholder="Masukan Nama Izin Usaha" value="" maxlength="50" >
                </div>
            </div>



            <div class="form-group">
                <label for="name" class="col-sm-6 control-label">Nomor Izin Usaha </label>
                <div class="col-sm-12">
                    <input type="text" class="form-control" id="permission_number" name="permission_number" placeholder="Masukan Nomor Izin Usaha" value="" maxlength="50">
                </div>
            </div>





         <div class="form-group">
                <label for="name" class="col-sm-6 control-label">Tanggal  Mulai Usaha</label>
                <div class="col-sm-12">
                  <input type="date" class="form-control" id="year" name="year" placeholder="Masukan Tanggal Mulai Usaha" value="" maxlength="50" >
                </div>
            </div>

          


          <div class="form-group">
                <label for="name" class="col-sm-6 control-label">Alamat</label>
                <div class="col-sm-12">
                    <textarea class="form-control" rows="5" id="address" name="address" required="required" ></textarea>
                </div>
            </div>


         <div class="form-group">
                <label for="name" class="col-sm-6 control-label">RT</label>
                <div class="col-sm-12">
                  <input type="Text" class="form-control" id="RT" name="RT" placeholder="Masukan RT" value="" maxlength="50" required="">
                </div>
            </div>


         <div class="form-group">
                <label for="name" class="col-sm-6 control-label">RW</label>
                <div class="col-sm-12">
                  <input type="Text" class="form-control" id="RW" name="RW" placeholder="Masukan RW" value="" maxlength="50" required="">
                </div>
            </div>

     


          <div class="form-group">
                <label for="name" class="col-sm-6 control-label">Kecamatan</label>
                <div class="col-sm-12">
                  <input type="Text" class="form-control" id="kecamatan" name="kecamatan" placeholder="Masukan Kecamatan" value="" maxlength="50" >
                </div>
            </div>

           <div class="form-group">
                <label for="name" class="col-sm-6 control-label">Kabupaten/Kota</label>
                <div class="col-sm-12">
                  <input type="Text" class="form-control" id="kabupaten" name="kabupaten" placeholder="Masukan Kabupaten" value="" maxlength="50" 
                </div>
            </div>


        <div class="form-group">
                <label for="name" class="col-sm-6 control-label">Provinsi/DI</label>
                <div class="col-sm-12">
                  <input type="Text" class="form-control" id="provinsi" name="provinsi" placeholder="Masukan Provinsi" value="" maxlength="50" >
                </div>
            </div>



        <div class="form-group">
                <label for="name" class="col-sm-6 control-label">Kode Pos</label>
                <div class="col-sm-12">
                  <input type="Text" class="form-control" id="pos" name="pos" placeholder="Masukan Kode Pos" value="" maxlength="50" required="">
                </div>
            </div>
      



         <div class="form-group">
                <label for="name" class="col-sm-6 control-label">Nomor Telepon</label>
                <div class="col-sm-12">
                    <input type="tel" class="form-control" id="phone" name="phone" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" placeholder="Masukan Nomor Telepon" value="" maxlength="50" required="">
                </div>
            </div>
         

             <div class="form-group">
                <label for="name" class="col-sm-6 control-label">Fax</label>
                <div class="col-sm-12">
                  <input type="Text" class="form-control" id="fax" name="fax" placeholder="Masukan Fax" value="" maxlength="50" required="">
                </div>
            </div>


             <div class="form-group">
                <label for="name" class="col-sm-6 control-label">Email</label>
                <div class="col-sm-12">
                  <input type="Text" class="form-control" id="email" name="email" placeholder="Masukan email" value="" maxlength="50" >
                </div>
            </div>


          <div class="form-group">
                <label for="name" class="col-sm-6 control-label">Website</label>
                <div class="col-sm-12">
                  <input type="url" class="form-control" id="website" name="website" placeholder="Masukan website" value="" maxlength="50" >
                </div>
            </div>
   
   
   
   
 
          <div class="form-group">
                <label for="name" class="col-sm-6 control-label">Bentuk  Usaha</label>
                <div class="col-sm-12">
                    <input type="text" class="form-control" id="business_form" name="business_form" placeholder="Masukan Bidang Bisnis" value="" maxlength="50" required="">
                </div>
            </div>

         

 
          <div class="form-group">
                <label for="name" class="col-sm-6 control-label">Sektor Usaha</label>
                <div class="col-sm-12">
                    <input type="text" class="form-control" id="business_sector" name="business_sector" placeholder="Masukan Bidang Bisnis" value="" maxlength="50" >
                </div>
            </div>


              <div class="form-group">
                <label for="name" class="col-sm-6 control-label">Tahun Data</label>
                <div class="col-sm-12">
                    <input class="form-control" id="data_year" name="data_year" placeholder="Masukan Bidang Bisnis" value="" maxlength="50" >
                </div>
            </div>




          <div class="form-group">
                <label for="name" class="col-sm-6 control-label">Karyawan Pria</label>
                <div class="col-sm-12">
                    <input type="number" class="form-control" id="male_employe" name="male_employe" placeholder="Masukan Karyawan Pria" value="" maxlength="50">
                </div>
            </div>

                    <div class="form-group">
                <label for="name" class="col-sm-6 control-label">Karyawan Wanita</label>
                <div class="col-sm-12">
                    <input type="number" class="form-control" id="female_employe" name="female_employe" placeholder="Masukan Karyawan Pria" value="" maxlength="50">
                </div>
            </div>





          <div class="form-group">
                <label for="name" class="col-sm-6 control-label">Tenaga Kerja Pria</label>
                <div class="col-sm-12">
                    <input type="number" class="form-control" id="male_labour" name="male_labour" placeholder="Masukan Karyawan Pria" value="" maxlength="50">
                </div>
            </div>

            <div class="form-group">
                <label for="name" class="col-sm-6 control-label">Tenaga Kerja Wanita</label>
                <div class="col-sm-12">
                    <input type="number" class="form-control" id="female_labour" name="female_labour" placeholder="Masukan Tenaga Kerja Wanita" value="" maxlength="50">
                </div>
            </div>


          <div class="form-group">
                <label for="name" class="col-sm-6 control-label">Kapasitas</label>
                <div class="col-sm-12">
                    <input type="text" class="form-control" id="capacity" name="capacity" placeholder="Masukan Omset" value="" maxlength="50">
                </div>
            </div>


          <div class="form-group">
                <label for="name" class="col-sm-6 control-label">Omset</label>
                <div class="col-sm-12">
                    <input type="number" class="form-control" id="turnover" name="turnover" placeholder="Masukan Omset" value="" maxlength="50">
                </div>
            </div>

            <div class="form-group">
                <label for="name" class="col-sm-6 control-label">Modal Sendiri</label>
                <div class="col-sm-12">
                    <input type="number" class="form-control" id="independent_capital" name="independent_capital" placeholder="Masukan Modal Sendiri" value="" maxlength="50">
                </div>
            </div>


             <div class="form-group">
                <label for="name" class="col-sm-6 control-label">Modal Luar</label>
                <div class="col-sm-12">
                    <input type="number" class="form-control" id="external_capital" name="external_capital" placeholder="Masukan Modal Luar" value="" maxlength="50">
                </div>
            </div>
  

       <div class="form-group">
                <label for="name" class="col-sm-6 control-label">Sumber Data</label>
                <div class="col-sm-12">
                    <input type="name" class="form-control" id="data_source" name="data_source" placeholder="Masukan Sumber Data" value="" maxlength="50">
                </div>
            </div>








         


 

             <div class="form-group" id="foto-content">
                <label class="col-sm-2 control-label">Foto</label>
                <div class="col-sm-12">
                    <input type="file" id="logo" name="logo"  onchange="loadFile(event)" value="" >
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

   


      
   

  <!-- Core plugin JavaScript-->
  <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

   <!-- Bootstrap core JavaScript-->
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
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
                url: '{!! route('show.umkm') !!}',
                type: 'GET',
            },
        columns: [
           
            {data: 'logo', name: 'photo', orderable: false,searchable: false,
              render: function( data, type, full, meta ) {
                       if(data==null){
                        data= "{{ URL::to('/gambar/store.png') }}"
                       }
                         data="{{ URL::to('/gambar/umkm') }}/"+data;
                        return "<center><img src='" + data + "' height='100' width='100'  /></center>";
                    }

           },
           { data: 'umkm_name', name: 'umkm_name' },
           { data: 'business_sector', name: 'business_sector' },
           { data: 'phone', name: 'phone' },
           { data: 'address', name: 'address' },
           {data: 'action', name: 'action', orderable: false},

        ]});

      </script>
<script type="text/javascript"></script>


<script type="text/javascript">
     $('#create-new-umkm').click(function () {
        $('#umkmForm').trigger("reset");
        $('#fotodisplay').removeProp('src');
        $("#fotodisplay").width(0).height(0);
        $('#btn-save').val("create-umkm");
        $('#umkm_id').val('');
        $('#candidateForm').trigger("reset");
        $('#userCrudModal').html("Tambah UMKM");
        $('#ajax-crud-modal').modal('show');
        $("#btn-save").html('Add');
        $("#passwordField").show();
        $('#fotodisplay').attr('src',"{{ URL::to('/gambar/store.png') }}");
        $('#fotodisplay').width(100).height(100);
        $("#fotodisplay").css('margin', 5 + 'px');            
    });


  if ($("#umkmForm").length > 0) {
      $("#umkmForm").validate({
       submitHandler: function(form) {
      var actionType = $('#btn-save').val();
      var actionURL ="{{ URL::to('/umkm/edit') }}";
      var msg ="Data Berhasil Diubah";
        var msgError ="Data Gagal Diubah";
         if(actionType=="create-umkm"){
         actionURL="{{ URL::to('/umkm/create') }}";
         msg="Data Berhasil Diinput";
         msgError ="Data Gagal Dinput";
         }
      $('#btn-save').html('Sending..');
     

      $.ajax({
          data: new FormData($("#umkmForm")[0]),
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


    var deleteUMKM = function(id) { swal({
      title: "Apa Anda Yakin?",
      text: "Data akan dihapus dan tidak bisa dikembalikan!!",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {
           $.ajax({
                url: "{{ URL::to('/umkm/delete')}}/"+id,
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
    $('body').on('click', '.edit-umkm', function () {
      var id = $(this).data('id');
      $('#umkmForm').trigger("reset");
      $.get('{{ URL::to("/umkm/profile/") }}/'+id, function (data) {
          console.log(data);
          $('#userCrudModal').html("Edit UMKM");
          $('#btn-save').val("edit-umkm");
          $('#ajax-crud-modal').show();
          $('#umkm_id').val(data.id);
          $('#umkm').val(data.umkm_name);
          $('#address').val(data.address);
          $("#phone").val(data.phone);
          $("#website").val(data.website);
          $("#email").val(data.email);
          $("#fax").val(data.fax);
          $("#owner").val(data.owner);
          $("#business_form").val(data.business_form);
          $("#business_sector").val(data.business_sector);
          $("#year").val(data.year);
          $("#RT").val(data.RT);
          $("#RW").val(data.RW);
          $("#kelurahan").val(data.kelurahan);
          $("#kecamatan").val(data.kecamatan);
          $("#provinsi").val(data.provinsi);
          $("#pos").val(data.postal_code);
          $("#kabupaten").val(data.kabupaten);
          $("#data_year").val(data.data_year);
          if(data.logo==null){
             data.logo="{{ URL::to('/gambar/store.png') }}"
          }            
          $("#permission_number").val(data.umkm_permission_number);
          $("#permission_name").val(data.umkm_permission_name);
          $("#capacity").val(data.capacity);
          $("#male_employe").val(data.male_employe);
          $("#female_employe").val(data.female_employe);
          $("#male_labour").val(data.male_labour);
          $("#female_labour").val(data.female_labour);
          $("#turnover").val(data.omset);
          $("#external_capital").val(data.external_capital);
          $("#independent_capital").val(data.independent_capital);
          $("#data_source").val(data.data_resource);
          $("#turnover").val(data.omset);
          $("#independent_capital").val(data.independent_capital);
          $("#external_capital").val(data.external_capital);
          $('#fotodisplay').attr('src',data.logo);
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



  $( ".nav-item" ).removeClass( "active" );
  $( ".ekraf" ).addClass( "active" );




</script>

</body>

</html>
