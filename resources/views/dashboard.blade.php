<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Dashboard</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

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

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
            
          </div>

          <!-- Content Row -->
          <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Jumlah Pengguna</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">100</div>
                    </div>
                    <div class="col-auto">
                    <img src="{{ URL::to('/gambar/dashboard/user.png') }}" style="width: 72px; height: 72px">
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- UMKM Card -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-purple shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-purple text-uppercase mb-1">UMKM</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">{{$umkm}}</div>
                    </div>
                    <div class="col-auto">
                      <img src="{{ URL::to('/gambar/dashboard/business.png') }}" style="width: 72px; height: 72px">
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
              <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-pink shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-pink text-uppercase mb-1">Situs Budaya</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">{{$culturesites}}</div>
                    </div>
                    <div class="col-auto">
                         <img src="{{ URL::to('/gambar/dashboard/monument.png') }}" style="width: 72px; height: 72px">
                    </div>
                  </div>
                </div>
              </div>
            </div>

           

            <!-- Pending Requests Card Example -->
             <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-orange shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-orange text-uppercase mb-1">Destinasi Wisata</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">{{$destinations}}</div>
                    </div>
                    <div class="col-auto">
                          <img src="{{ URL::to('/gambar/dashboard/travel.png') }}" style="width: 72px; height: 72px">
                    </div>
                  </div>
                </div>
              </div>
            </div>
           <!-- Pending Requests Card Example -->
             <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-rose shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-rose text-uppercase mb-1">Events</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">{{$events}}</div>
                    </div>
                    <div class="col-auto">
                        <img src="{{ URL::to('/gambar/dashboard/event.png') }}" style="width: 72px; height: 72px">
                    </div>
                  </div>
                </div>
              </div>
            </div>


      <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Penginapan</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">{{$accommodations}}</div>
                    </div>
                    <div class="col-auto">
                        <img src="{{ URL::to('/gambar/dashboard/hotel.png') }}" style="width: 72px; height: 72px">
                    </div>
                  </div>
                </div>
              </div>
            </div>






          </div>

          <!-- Content Row -->

          <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-8 col-lg-7">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Jumlah Pengunna</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  <div class="chart-area">
                    <canvas id="myAreaChart"></canvas>
                  </div>
                </div>
              </div>
            </div>

            <!-- Pie Chart -->
            <div class="col-xl-4 col-lg-5">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Events</h6>
             
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  <div class="chart-pie pt-4 pb-2">
                    <canvas id="myPieChart"></canvas>
                  </div>
                  <div class="mt-4 text-center small">
                    <span class="mr-2" id="eventOne">
                      <i class="fas fa-circle text-primary" ></i>
                    </span>
                    <span class="mr-2" id="eventTwo">
                      <i class="fas fa-circle text-success" ></i> 
                    </span>
                    <span class="mr-2" id="eventThree">
                      <i class="fas fa-circle text-info" ></i>
                    </span>
                  </div>
                </div>
              </div>
            </div>


             <!-- Area Chart -->
            <div class="col-xl-6 col-lg-7">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Penginapan</h6>
              
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  <div class="chart-bar">
                    <canvas id="hotelSectorChart"></canvas>
                  </div>
                   <div class="chart-bar" style="margin-top: 30px;">
                    <canvas id="hotelKindChart"></canvas>
                  </div>
                </div>
              </div>
            </div>

           <div class="col-xl-6 col-lg-7">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Rapat Kadis</h6>
              
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  <div class="chart-bar">
                    <canvas id="rapatKadisSourceChart"></canvas>
                  </div>
                   <div class="chart-bar" style="margin-top: 30px;">
                    <canvas id="rapatKadisKindChart"></canvas>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-xl-6 col-lg-7">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Rapat Sekbid-Bindang</h6>
              
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  <div class="chart-bar">
                    <canvas id="rapatSekbidSourceChart"></canvas>
                  </div>
                   <div class="chart-bar" style="margin-top: 30px;">
                    <canvas id="rapatSekbidKindChart"></canvas>
                  </div>
                </div>
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
            <span>Copyright &copy; Your Website 2019</span>
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

 >
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
  <script src="vendor/chart.js/Chart.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/chart-area-demo.js"></script>
 <script type="text/javascript">
  $.get('{{ URL::to("/dashboard/eventCount") }}/', function (data) {
           $("#eventOne").append(data[0].name);
           $("#eventTwo").append(data[1].name);
           $("#eventThree").append(data[2].name);

           // Set new default font family and font color to mimic Bootstrap's default styling
          Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
          Chart.defaults.global.defaultFontColor = '#858796';

          // Pie Chart Example
          var ctx = document.getElementById("myPieChart");
          var myPieChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
              labels: [data[0].name, data[1].name, data[2].name],
              datasets: [{
                data: [data[0].total, data[1].total, data[2].total],
                backgroundColor: ['#4e73df', '#1cc88a', '#36b9cc'],
                hoverBackgroundColor: ['#2e59d9', '#17a673', '#2c9faf'],
                hoverBorderColor: "rgba(234, 236, 244, 1)",
              }],
            },
            options: {
              maintainAspectRatio: false,
              tooltips: {
                backgroundColor: "rgb(255,255,255)",
                bodyFontColor: "#858796",
                borderColor: '#dddfeb',
                borderWidth: 1,
                xPadding: 15,
                yPadding: 15,
                displayColors: false,
                caretPadding: 10,
              },
              legend: {
                display: false
              },
              cutoutPercentage: 80,
            },
          });
      });



  $.get('{{ URL::to("/dashboard/kindCount") }}/', function (data) {
      // Bar Chart Example
      var ctx = document.getElementById("hotelKindChart");

      var myBarChart = new Chart(ctx, {
        type: 'bar',
        data: {
          labels: data.label,
          datasets: [{
            label: "Jumlah Hotel/Villa",
            backgroundColor: "#4e73df",
            hoverBackgroundColor: "#2e59d9",
            borderColor: "#4e73df",
            data: data.total,
          }],
         },options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
         }
         });
       });



    $.get('{{ URL::to("/dashboard/sectorCount") }}/', function (data) {
      // Bar Chart Example
      var ctx = document.getElementById("hotelSectorChart");
 
      var myBarChart = new Chart(ctx, {
        type: 'bar',
        data: {
          labels: data.label,
          datasets: [{
            label: "Penginapan Di Setiap Kecamatan",
            backgroundColor: "#4e73df",
            hoverBackgroundColor: "#2e59d9",
            borderColor: "#4e73df",
            data: data.total,
          }],
         },options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
         }
         });
       });

   


    $.get('{{ URL::to("/dashboard/sekbid/rapatsourceCount") }}/', function (data) {
      var ctx = document.getElementById("rapatSekbidSourceChart");
      var myBarChart = new Chart(ctx, {
        type: 'bar',
        data: {
          labels: data.label,
          datasets: [{
            label: "Sumber Data",
            backgroundColor: "#4e73df",
            hoverBackgroundColor: "#2e59d9",
            borderColor: "#4e73df",
            data: data.total,
          }],

         },options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
                
    });
  });

      $.get('{{ URL::to("/dashboard/sekbid/rapatkindCount") }}/', function (data) {
      var ctx = document.getElementById("rapatSekbidKindChart");
      var myBarChart = new Chart(ctx, {
        type: 'bar',
        data: {
          labels: data.label,
          datasets: [{
            label: "Jenis/Sifat Rapat",
            backgroundColor: "#4e73df",
            hoverBackgroundColor: "#2e59d9",
            borderColor: "#4e73df",
            data: data.total,
          }],

         },options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
                
    });
  });  


    $.get('{{ URL::to("/dashboard/kadis/rapatsourceCount") }}/', function (data) {
      var ctx = document.getElementById("rapatKadisSourceChart");
      var myBarChart = new Chart(ctx, {
        type: 'bar',
        data: {
          labels: data.label,
          datasets: [{
            label: "Sumber Data",
            backgroundColor: "#4e73df",
            hoverBackgroundColor: "#2e59d9",
            borderColor: "#4e73df",
            data: data.total,
          }],

         },options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
                
    });
  });

      $.get('{{ URL::to("/dashboard/kadis/rapatkindCount") }}/', function (data) {
      var ctx = document.getElementById("rapatKadisKindChart");
      var myBarChart = new Chart(ctx, {
        type: 'bar',
        data: {
          labels: data.label,
          datasets: [{
            label: "Jenis/Sifat Rapat",
            backgroundColor: "#4e73df",
            hoverBackgroundColor: "#2e59d9",
            borderColor: "#4e73df",
            data: data.total,
          }],

         },options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
                
    });
  });  



 $( ".dashboard" ).addClass( "active" );


 </script>
</body>

</html>
