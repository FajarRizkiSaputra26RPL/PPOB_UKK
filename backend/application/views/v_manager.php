<div class="panel">
    <div class="panel-heading">
        <h3>Data Daftar Manager</h3><br>
        <a href="#tambah" class="btn btn-primary" data-toggle="modal"><span class="glyphicon glyphicon-plus"></span>Add</a><br>
    </div>
      <div class="panel-body">
     <table  class="table table-bordered table-striped" id="datatables">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Username</th>
                  <th>Nama Manager</th>
                  <th>Level</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                      <?php
                              $no=0;
                              foreach ($data_admin as $dt_adm) {
                                $no++;
                                echo '<tr>
                                <td>'.$no.'</td>
                                <td>'.$dt_adm->username.'</td>
                                <td>'.$dt_adm->nama_admin.'</td>
                                <td>'.$dt_adm->nama_level.'</td>
                                <td>
                                <a href="#update_manager" class="btn btn-warning" data-toggle="modal" onclick="tm_detail('.$dt_adm->id_admin.')">Update</a> 
                                <a href="'.base_url('index.php/Manager/hapus_manager/'.$dt_adm->id_admin).'" class="btn btn-danger" data-toggle="modal" onclick="return confirm(\'anda yakin?\')">Delete</a>
                               
                                </td>
            
                                </tr>';
                              }
                      ?>
                </tbody>
              </table>
                </div>
              </div> 

          <?php 
         $pesan =$this->session->flashdata('pesan');
         if($pesan != NULL){
           echo '
           <div class="alert alert-success">'.$pesan.'</div>
           ';
         }
         
         ?>       

  <div class="modal fade" id="tambah">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Add Manager</h4>
      </div>
      <div class="modal-body">
        <form action="<?=base_url('index.php/Manager/tambah_manager')?>" method="post">
             Username
             <input type="text" name="username" class="form-control"><br>
             Password
             <input type="password" name="password" class="form-control"><br>
             Nama Manager
             <input type="text" name="nama_admin" class="form-control"><br>
             Level
             <select name="id_level" class="form-control">
        <?php
        foreach ($data_level as $lvl) {
          echo "<option value= '".$lvl->id_level."'>
          ".$lvl->nama_level."
          </option>";
        }
         ?>
       </select><br>
             <input type="submit" name="simpan" value="Simpan" class="btn btn-success">
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="update_manager">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Update Manager</h4>
      </div>
      <div class="modal-body">
        <form action="<?=base_url('index.php/Manager/update_manager')?>" method="post">
                <input type="hidden" name="id_admin" id="id_admin">  
                Username
                <input type="text" id="username" name="username" class="form-control"><br>
                Password
                <input type="password" id="password" name="password" class="form-control"><br>
                Nama Manager
                <input type="text" id="nama_admin" name="nama_admin" class="form-control"><br>
                Level
                <select name="id_level" id="id_level" class="form-control">
                   <?php
                   foreach ($data_level as $lvl) {
                       echo "<option value= '".$lvl->id_level."'>
                       ".$lvl->nama_level."
                       </option>";
                   }
                    ?>
                </select><br>

                <input type="submit" name="simpan" value="Simpan" class="btn btn-success">
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
           
<script>

function tm_detail(id_lev) {
  $.getJSON("<?=base_url()?>index.php/Manager/get_detail_admin/"+id_lev,function(data){
    $("#id_admin").val(data['id_admin']);
    $("#username").val(data['username']);
    $("#password").val(data['password']);
    $("#nama_admin").val(data['nama_admin']);
    $("#id_level").val(data['id_level']);

  });
}
</script>
