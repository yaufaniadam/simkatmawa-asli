<script type="text/javascript" src="<?php echo base_url('assets/js/jquery-3.3.1.min.js'); ?>"></script> 
<!--Main layout-->
<main>

	<!--alert-->
	<?php
	$data=$this->session->flashdata('success');
	if($data!=""){ ?>
		<div class="alert alert-success alert-dismissible fade show" role="alert">
			<strong>Success!</strong> <?=$data;?>
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div><br/>
	<?php } ?>
	<?php
	$data2=$this->session->flashdata('error');
	if($data2!=""){ ?>
		<div class="alert alert-danger alert-dismissible fade show" role="alert">
			<strong>Error!</strong> <?=$data2;?>
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div><br/>
	<?php } ?>
	<!--alert-->
	
	<div class="container-fluid">

		<!--Section: Modals-->
		<section class="mb-5">
		</section>
		<!--Section: Modals-->


		<!--Section: Accordion-->
		<section class="mb-5">

			<!--Accordion wrapper-->
			<div class="md-accordion accordion" id="accordionEx" role="tablist" aria-multiselectable="true">

				<!--aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa-->
				<!-- Accordion card -->
				<div class="card">

					<!-- Card header -->
					<div class="card-header header-card" role="tab" id="headingOne">

						<!-- Heading -->
						<h5 class="mt-1 mb-0" >
							<span >Dosen Pembimbing Pengabdian Masyarakat</span>
							<i class="fas fa-angle-down rotate-icon"></i>
						</h5>
					</a>

				</div>

				<!-- Card body -->
				<div id="collapseOne" class="collapse show" role="tabpanel" aria-labelledby="headingOne">
					<div class="card-body">



						<div class="card-body d-sm-flex justify-content-between">
							
							<div class="container">
								<div class="row">									
									<div class="col-sm">


										<!--Card-->
										<div class="card">

											<!--Card content-->
											<div class="card-body">

												<input type="hidden" id="pengabdian" name="pengabdian" value="<?=$id_pengabdian;?>" class="form-control form-control-sm" readonly>

												<label class="label_dropdown">Search Dosen NIK Atau Nama</label>

												<input type="text" class="form-control form-control-sm" name="search_text" id="search_text" maxlength="30" placeholder="Masukkan NIK Atau Nama" required>



											</div>
										</div>
										<!--/.Card-->


									</div>

								</div>
							</div>
							
						</div>

						<div id="result"></div>
						<div style="clear:both"></div>


					</div>
				</div>
			</div>
			<!-- Accordion card -->
			<!--aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa-->

		</div>
		<!--/.Accordion wrapper-->

	</section>
	<!--Section: Accordion-->

</div>
</main>
<!--Main layout-->

<script type="text/javascript">

	$(document).ready(function(){

    //load_data();

    function load_data(query)
    {
    	var pengabdian = document.getElementById('pengabdian').value;
    	$.ajax({
    		url:"<?php echo base_url(); ?>Transaksi/fetch",
    		method:"POST",
    		data:{query:query, pengabdian:pengabdian},
    		success:function(data){
    			$('#result').html(data);
    		}
    	})
    }

    $('#search_text').change(function(){
    	var search = $(this).val();
    	if(search != '')
    	{
    		load_data(search);
    	}
    	else
    	{
            //load_data();
        }
    });
});

</script>