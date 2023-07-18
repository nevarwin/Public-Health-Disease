<div class="row mb-2">
    <label for="" class='col-sm-4 form-label font-weight-bold'>Outcome</label>
    <div class="col-sm-6">
        <p><?php echo ucfirst($outcome); ?>
        </p>
    </div>
</div>
<?php if ($outcome !== 'alive') { ?>
    <div class="row mb-2">
        <label for="" class='col-sm-4 form-label font-weight-bold'>Date Died</label>
        <div class="col-sm-6">
            <p><?php echo $dateDied; ?></p>
        </div>
    </div>
<?php } ?>