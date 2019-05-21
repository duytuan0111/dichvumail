	<?php require_once APPPATH.'/views/admin/header.php' ?>
	<!-- page content -->
	<div class="right_col" role="main">
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="dashboard_graph">

					<div class="row x_title">
						<div class="col-md-6">
							<h3><?php echo $page_title; ?></h3>
						</div>
					</div>
					<div class="add-new text-right">
						<a href="<?php echo base_url() ?>admin/admin/export_user" class="btn btn-success">Xuất Excel</a>
						<button  onclick="add_pay()"  class="btn btn-primary"><i class="fa fa-plus"></i> Thêm </button>
						<button  onclick="reload_table()" class="btn btn-default"><i class="fa fa-exchange"></i></i> Tải lại</button>
					</div>
				</div>
				<div class="dashboard_graph">
					<table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%">
						<thead>
							<tr>
								<th>ID</th>
								<th>Tên phương thức</th>
								<th>Mô tả</th>
								<th>Ngày tạo</th>
								<th>Ngày sửa</th>
								<th>Hành động</th>
							</tr>
						</thead>
						<tbody>
						</tbody>

						<tfoot>
							<tr>
								<th>ID</th>
								<th>Tên phương thức</th>
								<th>Mô tả</th>
								<th>Ngày tạo</th>
								<th>Ngày sửa</th>
								<th>Hành động</th>
							</tr>
						</tfoot>
					</table>
				</div>

			</div>				
		</div>
		<div class="row">
			<div class="modal fade " id="modal_form">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							<h4 class="modal-title" id="modal-title">Form thêm , sửa người dùng</h4>
						</div>
						<div class="modal-body form">
							<?php echo validation_errors(); ?>
							<?php echo form_open('',['id'=>'form','class'=>'']) ?>
							<input type="hidden" name="id">
							<div class="alert alert-danger" style="display:none">

							</div>
							<div class="form-group">
								<label for="name">Kiểu phương thức*</label>
								<select class="form-control" name="name">
									<option value="0"><i class="fa fa-cc-paypal"></i> Thanh toán Paypal</option>
									<option value="1"><i class="fa fa-cc-stripe"></i> Thanh toán Stripe</option>
									<option value="2"><i class="fa fa-cc-visa"></i> Thanh toán Visa</option>
								</select>
							</div>
							<div class="form-group">
								<label for="description">Mô tả</label>
								<textarea class="form-control" name="description" placeholder="Mô tả..."></textarea>
							</div>
							
							<?php echo form_close() ?>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
							<button type="button" id="btnsave" onclick="save()" class="btn btn-primary">Lưu</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- /page content -->
	<?php require_once APPPATH.'views/admin/footer.php' ?>