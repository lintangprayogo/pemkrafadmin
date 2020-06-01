<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Rapat Sekbid-Bidang</title>

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
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Kalender  Rapat Sekbid-Bidang</h6>
            </div>
               <div class="response" style="margin: 10px"></div>
               <div id='calendar' style="margin: 10px"></div>  
          </div>

        </div>
    
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
    <div class="modal fade" id="ajax-crud-modal" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
    <div class="modal-header">
        <h4 class="modal-title" id="userCrudModal">Rapat Kadis</h4>
    </div>
    <div class="modal-body">
        <form id="rapatForm" name="rapatForm" class="form-horizontal" enctype="multipart/form-data">
           <input type="hidden" name="rapat_id" id="rapat_id">
           <input type="hidden" name="kind" id="kind" >
            <div class="form-group">
                <label for="name" class="col-sm-6 control-label">Judul Rapat</label>
                <div class="col-sm-12">
                    <input type="text" class="form-control" id="name" name="name" placeholder="Masukan Judul Rapat" value="" maxlength="50" disabled>
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
                  <input type="date" required class="form-control"  name="tgl_rapat" id="tgl_rapat" disabled>
              
                </div>
            </div>
            

            <div class="form-group">
                <label for="name" class="col-sm-6 control-label">Agenda Rapat</label>
                <div class="col-sm-12">
                  <textarea  required class="form-control"  name="agenda" id="agenda"  rows="5" disabled>
                  </textarea>
                </div>
            </div>

            <div class="form-group">
                <label for="name" class="col-sm-6 control-label">Peserta</label>
                <div class="col-sm-12">
                  <select required class="form-control"  name="participant" id="participant" disabled>
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
                  <select required class="form-control"  name="kind" id="jenis" disabled>
                    <option value="">Pilih Sifat/Jenis</option>
                    <option value="umum">Umum</option>
                    <option value="rahasia">Rahasia</option>
                  </select>
                </div>
            </div>
          
             <div class="form-group" id="foto-content">
                <label class="col-sm-2 control-label">Notulensi/Rapat</label>
                 <div class="col-sm-12">
                    <a href="#" id="notulensi">Klik Untuk Notulensi/Report</a>
                </div>
            </div>

            <div class="form-group" id="foto-content">
                <label class="col-sm-12 control-label">Url Dokumentasi:</label><br>
                <div class="col-sm-12">
                    <a href="#" id="url">Klik Untuk Tautan</a>
                </div>
            </div>


            <div class="form-group">
                <label for="name" class="col-sm-6 control-label">Sumber Data</label>
                <div class="col-sm-12">
                  <input type="text"  class="form-control"  name="data_source" id="data_source" disabled>
              
                </div>
            </div>

            <div class="modal-footer">
             <button type="button" class="btn btn-danger" id="btn-close-form" data-dismiss="modal">Tutup</button>
            </div>


        </form>
    </div>

  
        </div>
        </div>
    </div>

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

 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js" integrity="sha256-4iQZ6BVL4qNKlQ27TExEhBN1HFPvAvAMbFavKKosSWQ=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

 
 
    
  <script type="text/javascript">
     $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
    });
 
  $(document).ready(function() {
   var calendar = $('#calendar').fullCalendar({
    editable:true,
    header:{
     left:'prev,next today',
     center:'title',
     right:'month'
    },
    events: "{{ URL::to('/rapat/kadis/load') }}",
    selectable:false,
    selectHelper:false,
    editable:true,
    eventClick:function(event)
    {
      var id = event.id;
       popUp(id);
    },

   });
  });


function popUp(id) {
      $('#rapatForm').trigger("reset");
      $.get('{{ URL::to("/rapat/profile/") }}/'+id, function (data) {
          $('#ajax-crud-modal').modal('show');
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

    
      });
   }
  </script>
</body>

</html>
