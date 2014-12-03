<!DOCTYTPE HTML>
<html>
	<head>
		<title>Benvenuto!</title>
		<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
		<link href="<?php echo base_url('/assets/css/home.css'); ?>" rel="stylesheet">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<script src='//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js'></script>
		<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
		<style>
			body
			{
			background: url(../assets/images/background/bg<?=rand(1,3);?>.jpg)  no-repeat center fixed; 
			-webkit-background-size: cover;
			-moz-background-size: cover;
			-o-background-size: cover;
			background-size: cover;
			}
		</style>
		<script>
			$(document).ready(function () {
			
			    (function ($) {
			
			        $('#filter').keyup(function () {
			
			            var rex = new RegExp($(this).val(), 'i');
			            $('.searchable tr').hide();
			            $('.searchable tr').filter(function () {
			                return rex.test($(this).text());
			            }).show();
			
			        })
			
			    }(jQuery));
			    
			
			});
            function removeContact(contactId)
            {
                $.ajax(
                {
                    type: "POST",
                    url: "<?= base_url('index.php/home_c/removeContact'); ?>",
                    data: {'id' : contactId},
                        success: function(msg)
                        {   
                            if(msg == 1)
                            {                    
                                $("#row" + contactId).remove();
                            }
                            else
                            {
                                alert("Data not found: id = " + msg);
                            }
                        },
                        error: function()
                        {
                            alert("Something went wrong!");
                        }
                });
            }

		</script>
	</head>
	<body>
		<!-- Fixed navbar -->
		<div class="navbar navbar-default navbar-fixed-top" role="navigation">
			<div class="container-fluid">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="#">sRubricAPP</a>
				</div>
				<div id="navbar" class="navbar-collapse collapse">
					<ul class="nav navbar-nav">
						<li class="active"><a href="#">Home</a></li>
						<li><a href="#" data-toggle="modal" data-target="#myModal">Add Contact</a></li>
						<li><a href="#about">About</a></li>
					</ul>
					<div class="navbar-form navbar-left" role="search">
						<div class="form-group">
							<input type="text" id="filter" class="form-control" placeholder="Search" id="filter">
						</div>
					</div>
					<ul class="nav navbar-nav navbar-right">
						<li><a href="<?= base_url('/index.php/logout_c'); ?>">Logout</a></li>
						<li class="active"><a href="#"><?= substr($this->session->userdata('logged_in')['email'], 0, strpos($this->session->userdata('logged_in')['email'], '@')); ?></a></li>
					</ul>
				</div>
				<!--/.nav-collapse -->
			</div>
		</div>
		<div class="container main-background">
		<h2>Ecco la tua rubrica:</h2>
		<div class="table-responsive">
			<table class="table table-striped">
				<thead>
					<tr>
						<th>#</th>
						<th>Name</th>
						<th>Surname</th>
						<th>Email</th>
						<th>Address</th>
						<th>Zip Code</th>
						<th>City</th>
						<th>Mobile Phone</th>
						<th>Home Phone</th>
						<th>Edit</th>
					</tr>
				</thead>
				<tbody class="searchable">
					<?php
						if(sizeof($contacts) < 1)
						    echo ("<td>#</td><td>#</td><td>#</td><td>#</td><td>#</td><td>#</td><td>#</td><td>#</td><td>#</td>");
						$value=1;
						foreach($contacts as $single) : ?>
					<tr id="row<?= $single->id; ?>">
						<td><?= $value ?></td>
						<td><?php echo $single->nome; ?></td>
						<td><?php echo $single->cognome; ?></td>
						<td><?php echo $single->email; ?></td>
						<td><?php echo $single->viaindirizzo ; ?></td>
						<td><?php echo $single->viacap!= 0? $single->viacap : ""; ?></td>
						<td><?php echo $single->viacitta; ?></td>
						<td><?php echo $single->numerocell != 0 ? $single->numerocell : ""; ?></td>
						<td><?php echo $single->numerocasa != 0 ? $single->numerocell : ""; ?></td>
						<th><i class="glyphicon glyphicon-cog"></i><a onclick="removeContact(<?= $single->id?>);"><i class="glyphicon glyphicon-trash"></i></a> </td>
					</tr>
					<?php $value++; ?>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
		<!-- Button trigger modal -->
		<!-- Modal -->
		<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
						<h4 class="modal-title" id="myModalLabel">Add a contact</h4>
					</div>
					<div class="form-signin">
						<div class="modal-body">
							<?php
								echo validation_errors();
								echo form_open('home_c/newContact', 'class="form-horizontal" role="form"');?>
							<div class="form-group">
								<label for="inputEmail3" class="col-sm-2 control-label">Name</label>
								<div class="col-sm-10">
									<input type="text" name="nome" class="form-control"  placeholder="Name" required>
								</div>
							</div>
							<div class="form-group">
								<label for="inputEmail3" class="col-sm-2 control-label">Surname</label>
								<div class="col-sm-10">
									<input type="text" name="cognome" class="form-control" placeholder="Surname">
								</div>
							</div>
							<div class="form-group">
								<label for="inputEmail3" class="col-sm-2 control-label">Email</label>
								<div class="col-sm-10">
									<input type="email" name="email" class="form-control" placeholder="Email">
								</div>
							</div>
							<div class="form-group">
								<label for="inputEmail3" class="col-sm-2 control-label">Address</label>
								<div class="col-sm-10">
									<input type="text" name="viaIndirizzo" class="form-control" placeholder="Via">
								</div>
							</div>
							<div class="form-group">
								<label for="inputEmail3" class="col-sm-2 control-label">Zip code</label>
								<div class="col-sm-10">
									<input type="text" name="viaCap" class="form-control" placeholder="Cap">
								</div>
							</div>
							<div class="form-group">
								<label for="inputEmail3" class="col-sm-2 control-label">City</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" name="viaCitta" placeholder="Citt&agrave;">
								</div>
							</div>
							<div class="form-group">
								<label for="inputEmail3" class="col-sm-2 control-label">Home number</label>
								<div class="col-sm-10">
									<input type="tel" class="form-control" placeholder="Numero Casa" name="numeroCasa">
								</div>
							</div>
							<div class="form-group">
								<label for="inputEmail3" class="col-sm-2 control-label">Phone number</label>
								<div class="col-sm-10">
									<input type="tel" class="form-control" placeholder="Numero Cellulare" name="numeroCell">
								</div>
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							<button type="submit" class="btn btn-primary">Add Contact</button>
						</div>
					</div>
				</form>
			</div>
		</div>
		
		
	</body>
</html>