  <div class="panel">
    <div class="panel-heading">
        <h3>Data Level</h3>
    </div>
      <div class="panel-body">
     <table class="table table-bordered table-striped" id="datatables">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Nama Level</th>
                </tr>
                </thead>
                <tbody>
                     <?php
                              $no=0;
                              foreach ($data_level as $dt_lvl) {
                                $no++;
                                echo '<tr>
                                <td>'.$no.'</td>
                                <td>'.$dt_lvl->nama_level.'</td>
            
                                </tr>';
                              }
                      ?>

                </tbody>
              </table>
                </div>
              </div>            
