<section id="main-content">
	<section class="wrapper">
		<div class="table-agile-info">
            <div class="panel panel-default">
                <div class="panel-body form-add active">
                    <div class="panel-heading">
                        Chỉnh sửa tài khoản
                    </div>
                    <div class="position-center">
                        <form enctype="multipart/form-data" method = "post" action = "index.php?page=updatedAccount" role="form">
                            <div class="form-group">
                                <label for="username">Username: </label>
                                <span class = "show_more"><?=$currentAccount['username']?></span>
                            </div>
                            <div class="form-group">
                                <label for="email">Email: (Ví dụ: abc@gmail.com) </label>
                                <input value="<?=$currentAccount['email']?>" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" required type="email" id="email" name="email" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="password">Password: (Từ 8 đến 30 kí tự (Không cách)) </label>
                                <input pattern="[a-zA-Z.@#$%&^*()]{8,30}" type="text" id="password" name="password" class="form-control">
                                <input type="hidden" name="id" value="<?=$currentAccount['id']?>">
                            </div>
                            <div class="form-group">
                                <label for="role">Role</label>
                                <select name="role" id="role">
                                    <?php
                                        if($currentAccount['role'] == 1) {
                                            echo "<option value='0'>Người dùng</option>
                                            <option value='1' selected>Admin</option>";
                                        } else {
                                            echo "<option value='0' selected>Người dùng</option>
                                            <option value='1'>Admin</option>";
                                        }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="status">Status</label>
                                <select name="status" id="status">
                                    <?php
                                        if($currentAccount['status'] == 1) {
                                            echo "<option value='0'>Không hoạt động</option>
                                            <option value='1' selected>Hoạt động</option>";
                                        } else  {
                                            echo "<option value='0' selected>Không hoạt động</option>
                                            <option value='1'>Hoạt động</option>";
                                        }
                                    ?>
                                </select>
                            </div>
                            <button type="submit" name = "updateAccount" class="btn btn-info">Chỉnh sửa</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
</section>
</section>
<!--main content end-->
</section>