<div class="app-content content container-fluid">
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body"><!-- Stats -->
			<div class="row">
			    <div class="col-xl-12 col-lg-12 col-xs-12">
			        <div class="card">
			            <div class="card-body">
			                <div class="media">
			                    <div class="p-2 text-xs-center bg-danger bg-darken-2 media-left media-middle">
			                        <i class="icon-folder-alt font-large-2 white"></i>
			                    </div>
			                    <div class="p-2 bg-gradient-x-danger white media-body">
			                        <h5>IMPORT DATA CALON RESPONDEN MBR</h5>
			                        <h5 class="text-bold-400">Pastikan data Excel anda sudah benar</h5>
			                    </div>			                    
			                </div>
			            </div>
			        </div>
			    </div>
			</div>
			<!--/ Stats -->
			<div class="row">
			    <div class="col-xl-12 col-lg-12 col-xs-12">
			        <div class="card box-shadow-0 border-primary">
			        	<div class="card-header bg-primary white">
			        		<h4 class="card-title"> Upload FIle Excel (.xls | .xlsx) </h4>
			        	</div>
			            <div class="card-body">
			                <div class="card-block">
			                	<form method="post" class="form" action="<?php echo base_url().'ImportData/Upload'?>" enctype="multipart/form-data">
			                		<div class="form-body">
			                			<div class="row">
			                				<div class="col-xs-12">
			                					<input type="file" name="file_excel" class="form-control" accept=".xls,.xlsx">
			                				</div>
			                			</div>
			                		</div>
			                		<div class="form-actions">
			                			<button type="submit" class="btn btn-primary"> Upload !</button>
			                		</div>
			                	</form>
			                </div>
			            </div>
			        </div>
			    </div>
			</div>
			<!--/ Stats -->							

    	</div>
    </div>
</div>