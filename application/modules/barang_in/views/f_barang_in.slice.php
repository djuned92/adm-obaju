@extends('layouts.backend')

@section('title','Barang In')

@section('css')
    <!-- select2 -->
    <link href="<?=base_url('assets/plugins/select2/dist/css/select2.min.css')?>" rel="stylesheet">
    <link href="<?=base_url('assets/plugins/wysihtml5/wysihtml5.min.css')?>" rel="stylesheet">
@endsection

@section('content')
<div class="page-title">
        <div class="title_left">
            <h3><?=($this->uri->segment(2) == 'add') ? 'Add ' : 'Edit '?>Barang In</h3>
        </div>
        <div class="title_right">
            <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                    <button class="btn btn-default" type="button">Go!</button>
                    </span>
                </div>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2><?=($this->uri->segment(2) == 'add') ? 'Add ' : 'Edit '?>Barang In</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                <i class="fa fa-wrench"></i>
                            </a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="#">Settings 1</a>
                                </li>
                                <li><a href="#">Settings 2</a>
                                </li>
                            </ul>
                        </li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <form class="form-horizontal form-label-left" id="myForm">
                        
                        <?php if($this->uri->segment(2) == 'update'): ?>
                        <input type="hidden" name="id" value="<?=$this->uri->segment(3)?>">
                        <?php endif ?>
                        <div class="form-group">
                            <label class="control-label col-md-2 col-sm-2 col-xs-12">Produk <span class="required">*</span></label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <input type="text" name="produk" class="form-control" placeholder="Produk ..." 
                                value="<?=isset($produk['produk'])?$produk['produk']:set_value('produk');?>" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-2 col-sm-2 col-xs-12">Detail Produk <span class="required">*</span></label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <textarea name="detail_produk" class="form-control" id="wysihtml5" required><?=isset($produk['detail_produk'])?html_entity_decode($produk['detail_produk']):set_value('detail_produk');?></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-2 col-sm-2 col-xs-12">Images <?=($this->uri->segment(2) == 'add') ? '<span class="required">*</span>':'';?></label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <input type="file" class="form-control" name="userfiles[]" multiple <?=($this->uri->segment(2) == 'add') ? 'required':'';?>>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-2 col-sm-2 col-xs-12">Qty <span class="required">*</span></label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <input type="text" name="qty" class="form-control" placeholder="Qty ..." 
                                value="<?=isset($produk['qty'])?$produk['qty']:set_value('qty');?>" required>
                            </div>
                        </div>

                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-2">
                                <a href="<?=base_url('barang_in')?>">
                                    <button type="button" class="btn btn-primary">Back</button>
                                </a>
                                <button type="submit" class="btn btn-success" id="save">Save</button>
                            </div>
                        </div>

                    </form>      
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
<!-- select2 -->
<script src="<?=base_url('assets/plugins/select2/dist/js/select2.min.js')?>"></script>
<!-- add update js -->
<script src="<?=base_url('assets/js/add-update.js')?>"></script>
<script src="<?=base_url('assets/plugins/wysihtml5/toolbars.min.js')?>"></script>
<script src="<?=base_url('assets/plugins/wysihtml5/handlebars.min.js')?>"></script>
<script src="<?=base_url('assets/plugins/wysihtml5/wysihtml5.min.js')?>"></script>

<script>
	$(document).ready(function() {
        $('#wysihtml5').wysihtml5();

        $('#kategori_id').select2({
            width: 'resolve',
            data: <?php echo $kategori; ?>
        });

        <?php if($this->uri->segment(2) == 'update'): ?>
            <?php $kategori_id = isset($produk['kategori_id']) ? $produk['kategori_id'] : ''; ?>
            $('#kategori_id').val(<?=$kategori_id?>).trigger('change');
        <?php endif ?>
    });
</script>
@endsection