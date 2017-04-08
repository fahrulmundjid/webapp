    <html>
      <head>
       <title>Daftar User</title>  
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet"> 
      </head>
    <body>
    <div class="container">
    <div class="panel panel-primary">
     <div class="panel-heading">Daftar User
     <button id="btn_add" name="btn_add" class="btn btn-default pull-right">Create User</button>
        </div>
          <div class="panel-body"> 
           <table class="table">
            <thead>
              <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Actions</th>
              </tr>
             </thead>
             <tbody id="webusers-list" name="webusers-list">
               <?php foreach($webusers as $webuser): ?>
                <tr id="webuser<?php echo e($webuser->id); ?>">
                 <td><?php echo e($webuser->id); ?></td>
                 <td><?php echo e($webuser->nama); ?></td>
                 <td><?php echo e($webuser->alamat); ?></td>
                  <td>
                  <button class="btn btn-warning btn-detail open_modal" value="<?php echo e($webuser->id); ?>">Edit</button>
                  <button class="btn btn-danger btn-delete delete-webuser" value="<?php echo e($webuser->id); ?>">Delete</button>
                  </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
            </table>
           </div>
           </div>
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
               <div class="modal-content">
                 <div class="modal-header">
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                 <span aria-hidden="true">&times;</span></button>                  
                    <h4 class="modal-title" id="myModalLabel">Users</h4>
                </div>
                <div class="modal-body">
                <form id="frmWebusers" name="frmWebusers" class="form-horizontal" novalidate="">
                    <div class="form-group error">
                     <label for="inputName" class="col-sm-3 control-label">Name</label>
                       <div class="col-sm-9">
                        <input type="text" class="form-control has-error" id="nama" name="nama" placeholder="Nama Lengkap" value="">
                       </div>
                       </div>
                     <div class="form-group">
                     <label for="inputDetail" class="col-sm-3 control-label">Alamat</label>
                        <div class="col-sm-9">
                        <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat " value="">
                        </div>
                    </div>
                </form>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="btn-save" value="add">Submit</button>
                <input type="hidden" id="webuser_id" name="webuser_id" value="0">
                </div>
            </div>
          </div>
      </div>
    </div>
        <meta name="_token" content="<?php echo csrf_token(); ?>" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <script src="<?php echo e(asset('js/ajaxscript.js')); ?>"></script>
    </body>
    </html>