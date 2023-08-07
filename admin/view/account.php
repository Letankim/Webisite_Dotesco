<!--main content start-->
<section id="main-content">
	<section class="wrapper">
		<div class="table-agile-info">
      <div class="panel panel-default">
        <button class = "btn btn-primary btn-show-form-add">Thêm mới</button>
        <div class="panel-body form-add">
          <div class="panel-heading">
            Thêm tài khoản
          </div>
          <div class="position-center">
            <form enctype="multipart/form-data" method = "post" action = "index.php?page=addAccount" role="form">
                <div class="form-group">
                    <label for="email">Email: (Ví dụ: abc@gmail.com) </label>
                    <input pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" required type="email" id="email" name="email" class="form-control">
                </div>
                <div class="form-group">
                    <label for="username">Username: (Từ 5 đến 30 kí tự(Không cách)) </label>
                    <input pattern="[a-zA-Z.@#$%&^*()]{5,30}" required type="text" id="username" name="username" class="form-control">
                </div>
                <div class="form-group">
                    <label for="password">Password: (Từ 8 đến 30 kí tự (Không cách)) </label>
                    <input pattern="[a-zA-Z.@#$%&^*()]{8,30}" required type="text" id="password" name="password" class="form-control">
                </div>
                <div class="form-group">
                    <label for="role">Role</label>
                    <select name="role" id="role">
                        <option value="0">Vai trò</option>
                        <option value="0">Người dùng</option>
                        <option value="1">Admin</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="status">Status</label>
                    <select name="status" id="status">
                        <option value="1">Trạng thái</option>
                        <option value="0">Không hoạt động</option>
                        <option value="1">Hoạt động</option>
                    </select>
                </div>
                <button type="submit" name = "addAccount" class="btn btn-info">Thêm</button>
            </form>
          </div>
        </div>
        <div class="panel-heading">
          Tất cả tài khoản
        </div>
        <span style="color:red;"><?=$message?></span>
        <div class="row w3-res-tb">
          <div class="col-sm-5 m-b-xs">
             <form action="index.php?page=filterByAccount" method="post">
                <select name="status" class="input-sm form-control w-sm inline v-middle">
                  <option value="1">Đang hoạt động</option>
                  <option value="0">Đang tắt</option>
                </select>
                <button class="btn btn-sm btn-default" type="submit" name="filter">Lọc theo trạng thái</button>
             </form>                
          </div>
          <div class="col-sm-4">
          </div>
          <div class="col-sm-3">
            <form action="index.php?page=searchAccount" method="post">
              <div class="input-group">
                  <input type="text" name = "key" class="input-sm form-control" placeholder="Search">
                  <span class="input-group-btn">
                    <button class="btn btn-sm btn-default" type="submit" name="search">Search</button>
                  </span>
              </div>
            </form>
          </div>
        </div>
        <div class="table-responsive">
            <table class="table table-striped b-t b-light">
              <thead>
                <tr>
                  <th style="width:20px;">STT</th>
                  <th>Username</th>
                  <th>Email</th>
                  <th>Ngày tạo</th>
                  <th>Status</th>
                  <th>Vai trò</th>
                  <th>Xử lí</th>
                  <th style="width:30px;"></th>
                </tr>
              </thead>
              <tbody>
                <?php echo showAccount($allAccount)?>
              </tbody>
            </table>
        </div>
        <footer class="panel-footer">
          <div class="row">
            <div class="col-sm-5 text-center">
              <small class="text-muted inline m-t-sm m-b-sm">Hiển thị <?=$page?> - <?=($page+20)?></small>
            </div>
            <div class="col-sm-7 text-right text-center-xs">                
              <ul class="pagination pagination-sm m-t-none m-b-none">
                <?php
                  if($pageNumber != 1) {
                    echo "<li>
                    <a href='index.php?page=account&trang='".($pageNumber - 1)."''>
                      <i class='fa fa-chevron-left'></i>
                    </a>
                    </li>";
                  }
                ?>
                <?php
                  for($i = 1; $i <= $pages; $i++) {
                      echo "<li><a href='index.php?page=account&trang=".$i."'>".$i."</a></li>";
                  } 
                ?>
                <?php
                  if($pageNumber != $pageNumber) {
                    echo "<li><a href='index.php?page=account&trang='".($pageNumber + 1)."''>
                      <i class='fa fa-chevron-right'></i>
                      </a>
                    </li>";
                  }
                ?>
              </ul>
            </div>
          </div>
        </footer>
      </div>
  </div>
</section>
</section>
<!--main content end-->
</section>