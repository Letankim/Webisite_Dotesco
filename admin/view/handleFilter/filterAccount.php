<!--main content start-->
<section id="main-content">
	<section class="wrapper">
		<div class="table-agile-info">
            <div class="panel panel-default">
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
                        <th>Avatar</th>
                        <th>Ngày tạo</th>
                        <th>Status</th>
                        <th>Vai trò</th>
                        <th>Xử lí</th>
                        <th style="width:30px;"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php echo showAccount($filterAccount)?>
                    </tbody>
                    </table>
                </div>
            </div>
        </div>
</section>
</section>
<!--main content end-->
</section>