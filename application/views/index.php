
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Dashboard</h1>
          </div>
          <div class="row">
         
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-primary">
                  <i class="fas fa-user"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Tunggakan SPP</h4>
                  </div>
                  <div class="card-body">
                  Rp. <?php echo number_format($spp['spp'],0,',','.');?>
                  </div>
                </div>
              </div>
            </div> 
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-danger">
                  <i class="fas fa-database"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Tunggakan OSIS</h4>
                  </div>
                  <div class="card-body">
                 Rp. <?php echo number_format($osis['osis'],0,',','.');?>
                  </div>
                </div>
              </div>
            </div> 
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-success">
                  <i class="fas fa-building"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Tunggakan Ekskul</h4>
                  </div>
                  <div class="card-body">
               Rp. <?php echo number_format($eks['eks'],0,',','.');?>
                  </div>
                </div>
              </div>
            </div> 
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-warning">
                  <i class="fas fa-file"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Total</h4>
                  </div>
                  <div class="card-body">
                  <?php $total=0;
                  $total=$spp['spp']+$osis['osis']+$eks['eks'];
            echo "Rp. ".number_format($total,0,',','.');
                  ?>
                  </div>
                </div>
              </div>
            </div> 
          </div>  

          <div class="row">
            <div class="col-md-12">
            <div class="card">
              <div class="card-header" style="text-align:center;">
                <h3>Selamat Datang <?=$_SESSION['nama_siswa']?></h3>  
              </div>
            </div>
            </div>
          </div>
        
        </section>
      </div>
      
      