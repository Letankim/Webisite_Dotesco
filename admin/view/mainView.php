<section id="main-content">
	<section class="wrapper">
		<!-- //market-->
		<div class="market-updates">
			<div class="col-md-3 market-update-gd">
				<div class="market-update-block clr-block-2">
					<div class="col-md-4 market-update-right">
                        <i style="font-size: 50px; color: #fff;" class='bx bx-cabinet'></i>
					</div>
					<div class="col-md-8 market-update-left">
						<h4>Danh mục</h4>
						<h3><?=count($allCategory)?></h3>
				  	</div>
				  <div class="clearfix"></div>
				</div>
			</div>
			<div class="col-md-3 market-update-gd">
				<div class="market-update-block clr-block-1">
					<div class="col-md-4 market-update-right">
                    <i style="font-size: 50px; color: #fff;" class='bx bx-world'></i>
					</div>
					<div class="col-md-8 market-update-left">
						<h4>Nhà sản xuất</h4>
						<h3><?=count($allOrigin)?></h3>
					</div>
				  <div class="clearfix"> </div>
				</div>
			</div>
			<div class="col-md-3 market-update-gd">
				<div class="market-update-block clr-block-3">
					<div class="col-md-4 market-update-right">
                        <i style="font-size: 50px; color: #fff;" class='bx bxs-package'></i>
					</div>
					<div class="col-md-8 market-update-left">
						<h4>Sản phẩm</h4>
						<h3><?=count($allProduct)?></h3>
					</div>
				  <div class="clearfix"> </div>
				</div>
			</div>
			<div class="col-md-3 market-update-gd">
				<div class="market-update-block clr-block-4">
					<div class="col-md-4 market-update-right">
                        <i style="font-size: 50px; color: #fff;" class='bx bxs-user' ></i>
					</div>
					<div class="col-md-8 market-update-left">
						<h4>Tài khoản</h4>
						<h3><?=count($allAccount)?></h3>
					</div>
				  <div class="clearfix"> </div>
				</div>
			</div>
		   <div class="clearfix"> </div>
		</div>
		<div class="agileits-w3layouts-stats">
			<div class="col-md-7 stats-info widget">
				<div class="stats-info-agileits">
					<div class="stats-title">
						<h4 class="title">Đơn hàng mới</h4>
					</div>
					<div class="stats-body">
						<ul class="list-unstyled">
							<?php
								if(count($allNewBill) > 0) {
									foreach($allNewBill as $item) {
							?>
							<li>
								<a href="index.php?page=detail-bill&id=<?=$item->getId()?>">
									<?=$item->getName()?> vừa đặt đơn hàng mới
								</a>
								<span class="pull-right">Đặt lúc <?=$item->getCreateAt()?></span>  
							</li>
							<?php
									}
								}
							?>
						</ul>
					</div>
				</div>
			</div>
			<div class="clearfix"> </div>
		</div>
		<div class="col-md-4 stats-info widget">
			<div class="stats-info-agileits">
				<div class="stats-title">
					<h4 class="title">Thống kê đơn hàng</h4>
				</div>
				<div class="stats-body">
					<ul class="list-unstyled">
						<li>Đơn hàng mới<span style="font-size: 13px" class="pull-right label label-info"><?=count($allNewBill)?> đơn</span>  
						</li>
						<li>Đơn hàng đã xác nhận<span style="font-size: 13px" class="pull-right label label-default"><?=count($allBillAccept)?> đơn</span>  
						</li>
						<li>Đơn hàng đã chuẩn bị<span style="font-size: 13px" class="pull-right label label-success"><?=count($allBillPrepare)?> đơn</span>  
						</li>
						<li>Đơn hàng đã gửi đi<span style="font-size: 13px" class="pull-right label label-warning"><?=count($allBillTransfer)?> đơn</span>  
						</li>
						<li>Đơn hàng hoàn thành<span style="font-size: 13px" class="pull-right label label-success"><?=count($allBillFinish)?> đơn</span>  
						</li>
						<li>Đơn hàng đã hủy<span style="font-size: 13px" class="pull-right label label-danger"><?=count($allBillCancel)?> đơn</span>  
						</li>
					</ul>
				</div>
			</div>
		</div>
		<div class = "col-md-8 chart_agile_top">
			<div class="stats-title">
				<h4 class="title">Thống kê doanh thu</h4>
			</div>
			<div class="form-group">
				<label for="status">Từ ngày</label>
				<input type="date" id="form">
				<label for="status">Đến ngày</label>
				<input type="date" id="to">
				<button onclick="changeThongKe()">Lọc</button>
				<span id="total-doanhthu" class="label label-primary"></span>
            </div>
			<div id="myfirstchart" style="height: 250px;"></div>
		</div>
	</section>
</section>
<!--main content end-->
</section>
<script>
	var today = new Date();
	var formattedDate = today.toISOString().substr(0, 10);
	document.getElementById('to').value = formattedDate;
	document.getElementById('form').value = formattedDate;
	const chartLine = new Morris.Bar({
		element: 'myfirstchart',
		xkey: 'date',
		ykeys: ['soluongdonhang', 'doanhthu'],
		labels: ['Đơn hàng', 'Doanh Thu']
	});
	changeThongKe();
	function changeThongKe() {
		const form = document.getElementById("form").value,
			to = document.getElementById("to").value;
		$.ajax({
			url: "./model/ajaxThongKe.php",
			type: "POST",
			dataType: "JSON",
			data: {
				form: form,
				to: to
			},
			success: function (data) {
				console.log(data);
				let total = 0;
				data.forEach((item)=>{
					total+= parseFloat(item['doanhthu']);
				});
				$("#total-doanhthu").html(`Tổng danh thu của kết quả này là: ${formatNumber(total)} vnd`);
				chartLine.setData(data);
			},
			error: function(xhr, status, error) {
				// Xử lý khi có lỗi xảy ra trong AJAX request
				console.error(xhr.responseText); // Log lỗi vào console
				alert("Đã xảy ra lỗi khi tải dữ liệu!");
			}
		})
	}
	function formatNumber(number) {
    return number.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
	}
</script>