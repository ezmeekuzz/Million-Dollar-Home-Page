<?=$this->include('templates/header');?>
<section class="home-1">
    <input type="hidden" name="image_coordinate_id" id="image_coordinate_id" value="<?=$image_coordinate_id;?>" />
    <div id="pixel-container"></div>
    <div id="overlay"></div>
</section>
<script src="<?=base_url();?>assets/js/custom/edit.js"></script>
<?=$this->include('templates/footer');?>