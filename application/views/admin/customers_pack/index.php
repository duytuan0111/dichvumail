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
						<button  onclick="add_cus_pack()"  class="btn btn-primary"><i class="fa fa-plus"></i> Thêm </button>
						<button  onclick="reload_table()" class="btn btn-default"><i class="fa fa-exchange"></i></i> Tải lại</button>
					</div>
				</div>
				<div class="dashboard_graph">
					<table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%">
						<thead>
							<tr>
								<th>ID</th>
								<th>Tên người dùng</th>
								<th>Gói dịch vụ</th>
								<th>Sử dụng trong</th>
								<th>Hành động</th>
							</tr>
						</thead>
						<tbody>
						</tbody>

						<tfoot>
							<tr>
								<th>ID</th>
								<th>Tên người dùng</th>
								<th>Gói dịch vụ</th>
								<th>Sử dụng trong</th>
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
								<label for="customer_id">Họ và tên*</label>
								<select name="customer_id" class="form-control">
									<?php foreach ($all_cus as $key ) { ?>
									<option value=" <?php echo $key['id'] ?> "><?php echo $key['name'] ?></option>
									<?php } ?>
								</select>
							</div>
							<div class="form-group">
								<label for="package_id">Tên gói dịch vụ*</label>
								<select name="package_id" class="form-control">
									<?php foreach ($all_pack as $key ) { ?>
									<option value=" <?php echo $key['id'] ?> "><?php echo $key['name'] ?></option>
									<?php } ?>
								</select>
							</div>
							<div class="form-group">
								<label for="usage">Sử dụng trong*</label>
								<input type="number" min="0" class="form-control" name="usage" placeholder="Sử dụng trong..." >
							
							
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