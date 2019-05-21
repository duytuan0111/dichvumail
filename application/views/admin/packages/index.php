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
						<button  onclick="add_pack()"  class="btn btn-primary"><i class="fa fa-plus"></i> Thêm </button>
						<button  onclick="reload_table()" class="btn btn-default"><i class="fa fa-exchange"></i></i> Tải lại</button>
					</div>
				</div>
				<div class="dashboard_graph">
					<table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%">
						<thead>
							<tr>
								<th>ID</th>
								<th>Tên gói dịch vụ</th>
								<th>Mô tả</th>
								<th>Giới hạn</th>
								<th>Kiểu gói tin</th>
								<th>Giá</th>
								<th>Trạng thái</th>
								<th>Ngày tạo</th>
								<th>Ngày sửa</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
						</tbody>

						<tfoot>
							<tr>
								<th>ID</th>
								<th>Tên gói dịch vụ</th>
								<th>Mô tả</th>
								<th>Giới hạn</th>
								<th>Kiểu gói tin</th>
								<th>Giá</th>
								<th>Trạng thái</th>
								<th>Ngày tạo</th>
								<th>Ngày sửa</th>
								<th>Action</th>
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
								<label for="name">Tên gói dịch vụ*</label>
								<input type="text" name="name" class="form-control" placeholder="Tên gói dịch vụ...">
							</div>
							<div class="form-group">
								<label for="password">Mô tả</label>
								<textarea class="form-control" name="description" placeholder="Mô tả..."></textarea>
							</div>
							<div class="form-group">
								<label for="quota">Giới hạn*</label>
								<input type="number" class="form-control" name="quota" placeholder="Hạn ngạch..." >
							</div>
							<div class="form-group">
								<label for="quota_type">Kiểu gói tin*</label>
								<select class="form-control" name="quota_type">
									<option value="0">Không lặp lại</option>
									<option value="1">Theo ngày</option>
									<option value="2">Theo tháng</option>
								</select>
							</div>
							<div class="form-group">
								<label for="price">Giá*</label>
								<input type="number" class="form-control" name="price" min="0" placeholder="Giá...">
							</div>
							<div class="form-group">
								<label for="status">Trạng thái</label> <br>
								<label class="switch">
									<input type="checkbox" class="form-control" name="status" value="1">
									<span class="slider round"></span>
								</label>

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