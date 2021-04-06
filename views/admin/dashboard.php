<div class="starter-template text-center mt-5 px-3">
	<h1 class="mb-3">Dashboard</h1>
</div>
<div  id="relative" class="row justify-content-center mt-5">
	<div class="col col-sm-8">
    <p>Nombre de users :</p>
    <div class="progress">
        <div class="progress-bar" role="progressbar" style="width:'<?php echo $_allUser  ;?> '%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="30"><?php echo $_allUser  ;?> </div>
    </div>
    <p>Nombre de posts créer : </p>
    <div class="progress">
        <div class="progress-bar" role="progressbar" style="width:'<?php echo $_allPost;?> '%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="30"><?php echo $_allPost;?> </div>
    </div>
    <p>Nombre de comments créer : </p>
    <div class="progress">
        <div class="progress-bar" role="progressbar" style="width:'<?php echo $_allComment;?> '%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="30"><?php echo $_allComment;?> </div>
    </div>
    <p>Le Post avec le plus de commentaires : </p>
    <div class="progress">
        <div class="progress-bar" role="progressbar" style="width:'<?php print_r($_moreCommentPost) ;?> '%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="30"><?php print_r($_moreCommentPost) ;?> </div>
    </div>
    </div>
</div>



<!-- $barreprogress = new BootstrapProgress;


$barreprogress = BarreProgress(25, ['color' => WARNING]); -->




